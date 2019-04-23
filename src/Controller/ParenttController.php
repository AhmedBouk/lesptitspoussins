<?php


namespace App\Controller;


use App\Entity\Parentt;
use App\Form\ParenttFormType;
use App\Repository\ParenttRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ParenttController extends AbstractController
{

    /**
     * @Route("/parent/{id}/dashboard", name="dashboardparent")
     */
    public function dashboardparentt(ParenttRepository $parenttRepository, $id, Parentt $parentt)
    {
        $enfants = $parenttRepository->findByEnfant($id);

        $data = array();
        foreach ($enfants as $row){

            $data[] = array(
                'prenom' => $row['prenom'],
                'nom' => $row['nom']
            );
        }
        return $this->render('parent/dashboard.html.twig', [
            'parent' => $parentt,
            'data' => $data,
        ]);
    }

    /**
     * @Route("/parent/{id}/edit", name="editparent")
     */
    public function editparentt(Request $request, Parentt $parentt)
    {
        $form = $this->createForm(ParenttFormType::class, $parentt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dashboardparent', [
                'id' => $parentt->getId(),
            ]);
        }

        return $this->render('parent/profil_parent.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/parent/{id}/modifmotdepasse", name="modifpassword")
     */
    public function modifpassword(Request $request, $id, UserPasswordEncoderInterface $encoder)
    {

        if ($request->isMethod("POST"))
        {
            $em = $this->getDoctrine()->getManager();
            $um = $em->getRepository(Parentt::class)->findOneBy(["id" => $id]);

            $old = $request->request->get('old_password');
            $new = $request->request->get('new_password');
            $confirme = $request->request->get('confirm_new_password');

            if ($encoder->isPasswordValid($um,$old))
            {
                if ($new === $confirme)
                {
                    $um->setPassword($encoder->encodePassword($um, $confirme));

                    $em->flush();

                    $test = $this->addFlash("success", "Votre mot de passe à bien été modifier !");

                    return $this->redirectToRoute("dashboardparent",[
                        'id' => $id,
                        'test'=> $test
                    ]);

                }else
                    {
                    $this->addFlash("danger", "Erreur de confirmation mot de passe");
                }


            }else{
                $this->addFlash("danger", "Erreur de l'ancien mot de passe");
            }



        }
        return $this->render("parent/modifmdp_parent.html.twig");

    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {

    }

}