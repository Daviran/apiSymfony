<?php

namespace App\Controller;
use App\Controller\ApiController;
use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\AppCustomAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\Driver\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class UserController extends ApiController
{
    
    /**
     * @Route("/api/users", name="user_show", methods={"GET"})
     */
    public function show(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        
        // returns your User object, or null if the user is not authenticated
        // use inline documentation to tell your editor your exact User class
        /** @var \App\Entity\User $user */

        $user = $this->getUser();
        if (!$user) {
 
            return $this->json('Error'.' No user found ');
        }
 
        $data =  [
            'email' => $user->getEmail(),
            'firstname' => $user->getFirstname(),
            'lastname' => $user->getLastname(),
        ];
         
        return $this->json($data);
    }
    /**
     * @Route("/api/users", name="user_show", methods={"PUT"})
     */
    public function edit(Request $request): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $entityManager = $this->getDoctrine()->getManager();

        // returns your User object, or null if the user is not authenticated
        // use inline documentation to tell your editor your exact User class
        /** @var \App\Entity\User $user */

        $user = $this->getUser();
        if (!$user) {
 
            return $this->json('Error'.' No user found ');
        }
        $user->setEmail($request->request->get('email'));
        $user->setFirstname($request->request->get('firstname'));
        $user->setLastname($request->request->get('lastname'));
        $entityManager->flush();

        $data =  [
            'email' => $user->getEmail(),
            'firstname' => $user->getFirstname(),
            'lastname' => $user->getLastname(),
        ];
         
        return $this->json($data);
    }
    /**
     * @Route("/api/register", name="app_register")
     */
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator): Response
    {

        $entityManager = $this->getDoctrine()->getManager();
 
        $user = new User();
        $user->setEmail($request->request->get('email'));
        $user->setLogin($request->request->get('login'));
        $user->setFirstname($request->request->get('firstname'));
        $user->setLastname($request->request->get('lastname'));
        $user->setPassword($userPasswordHasher->hashPassword($user,$request->request->get('password')));

        try {
            $entityManager->persist($user);
            $entityManager->flush();

             } catch (Exception $e) {
                 return $this->respondValidationError($e->getMessage());
        }
        
        $data =  [
            'login' => $user->getLogin(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'firstname' => $user->getFirstname(),
            'lastname' => $user->getLastname(),
        ];

        return $this->json($data);
    
    }
}
