<?php


namespace App\Controller;


use App\Entity\Parentt;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(AuthenticationUtils $authenticationUtils) : Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('invit/connexion.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);

    }

    /**
     * @Route("/forgot" ,name="app_oublipassword")
     */
    public function forgotpassword(Request $request, TokenGeneratorInterface $tokenGenerator, UserPasswordEncoderInterface $encoder, \Swift_Mailer $mailer)
    {
        if ($request->isMethod('POST')){
            $email = $request->request->get('mail');

            //On défnit notre variable user avec email
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository(Parentt::class)->findOneBy(['email' => $email]);

            //Si l'utilisateurs a rentré un mauvais email
            if ($user === null){
                $this->addFlash('danger', 'Email Inconnu');
                return $this->redirectToRoute('indexsite');
            }
            $token = $tokenGenerator->generateToken();

            try{
                //On génère notre token
                $user->setToken($token);
                $em->flush();
                //Si cela ne se fait pas on établi un message d'execption
            } catch (\Exception $exception){
                $this->addFlash('warning', $exception->getMessage());
                return $this->redirectToRoute('indexsite');
            }

            //On définit la route à prendre si soumission validé
            $url = $this->generateUrl('app_reset_password', ['token' => $token], UrlGeneratorInterface::ABSOLUTE_PATH);

            $message = (new \Swift_Message('Mot de passe oublié'))
                ->setFrom('lesptitspoussinss@gmail.com')
                ->setTo($user->getMail())
                ->setBody('Voici le lien pour réinitialiser votre mot de passe : ' . $url, 'text/html');

            $mailer->send($message);

            $this->addFlash('notice', 'Mail envoyé');

            return $this->redirectToRoute('indexsite');
        }
        return $this->render('security/emailmotdepasse.html.twig');
    }

    /**
     * @Route("/resetpassword/{token}", name="app_reset_password")
     */
    public function resetpassword(Request $request, string $token, UserPasswordEncoderInterface $passwordEncoder)
    {
        if ($request->isMethod('POST')){
            $em = $this->getDoctrine()->getManager();

            //on va cherche l'utilisateur selon le token
            $user = $em->getRepository(Parentt::class)->findOneBy(['token' => $token]);

            //si le token est faux
            if ($user === null){
                $this->addFlash('danger', 'Token Inconnu');
                return $this->redirectToRoute('indexsite');
            }

            $user->setToken(null);
            $user->setPassword($passwordEncoder->encodePassword($user, $request->request->get('password')));
            $em->flush();

            $this->addFlash('notice', 'Mot de passe changé');

            return $this->redirectToRoute('indexsite');
        }else{
            return $this->render('security/resetpassword.html.twig', ['token' => $token]);
        }

    }

    /**
     * @Route("/logout")
     */
    public function logout()
    {
        return $this->redirectToRoute('indexsite');
    }

}