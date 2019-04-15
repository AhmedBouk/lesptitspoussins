<?php


namespace App\Controller;


use App\Entity\ProProfil;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityProController extends AbstractController
{

    /**
     * @Route("/pro/loginpro", name="loginpro")
     */
    public function loginpro(AuthenticationUtils $authenticationUtils) : Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/pro/connexionpro.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    /**
     * @Route("/pro/forgotpro", name="app_oublipasswordpro")
     */
    public function forgotpasswordpro(Request $request, TokenGeneratorInterface $tokenGenerator, \Swift_Mailer $mailer, UrlGeneratorInterface $urlGenerator)
    {
        if ($request->isMethod('POST')){
            $email = $request->request->get('mail');

            //On défnit notre variable user avec email
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository(ProProfil::class)->findOneBy(['mail' => $email]);

            //Si l'utilisateurs a rentré un mauvais email
            if ($user === null){
                $this->addFlash('danger', 'Email Inconnu');
                return $this->redirectToRoute('app_oublipassword');
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
            $url = $this->generateUrl('app_reset_passwordpro', ['token' => $token], \Symfony\Component\Routing\Generator\UrlGeneratorInterface::ABSOLUTE_URL);

            $message = (new \Swift_Message('Mot de passe oublié'))
                ->setContentType('text/html', 'utf8')
                ->setFrom('lesptitspoussinss@gmail.com')
                ->setTo($user->getMail())
                ->setBody('Voici le lien pour réinitialiser votre mot de passe : <a href="'.$url.'">Cliquer ici</a>');

            $mailer->send($message);

            $this->addFlash('notice', 'Mail envoyé');

            return $this->redirectToRoute('indexsite');
        }
        return $this->render('security/pro/emailmotdepassepro.html.twig');
    }

    /**
     * @Route("/pro/resetpasswordpro/{token}", name="app_reset_passwordpro")
     */
    public function resetpasswordpro(Request $request, string $token, UserPasswordEncoderInterface $passwordEncoder)
    {
        if ($request->isMethod('POST')){
            $em = $this->getDoctrine()->getManager();

            //on va cherche l'utilisateur selon le token
            $user = $em->getRepository(ProProfil::class)->findOneBy(['token' => $token]);

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
            return $this->render('security/pro/resetpasswordpro.html.twig', ['token' => $token]);
        }
    }
}