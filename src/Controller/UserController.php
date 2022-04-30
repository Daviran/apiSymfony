<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\DBAL\Driver\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class UserController extends ApiController
{
    /**
     * @Route("/api/register", name="app_register", methods={"POST"})
     */
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator): Response
    {
        $user = new User();

        $request = $this->transformJsonBody($request);

        $email = $request->get('email', '');
        $login = $request->get('login', '');
        $password = $request->get('password', '');
        $firstname = $request->get('firstname', '');
        $lastname = $request->get('lastname', '');

        if (empty($email) || empty($login) || empty($password)){
            return $this->respondValidationError("Invalid Credentials.");
        }
        $user->setLogin($login);
        $user->setEmail($email);
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        $user->setPassword($userPasswordHasher->hashPassword($user, $password));
        $entityManager = $this->getDoctrine()->getManager();

        try {
            $entityManager->persist($user);
            $entityManager->flush();
        } catch (Exception $e) {
            return $this->respondValidationError($e->getMessage());
        }

        $serializer = $this->container->get('serializer');
        $reports = $serializer->serialize($user, 'json');

        return $this->respondWithSuccess(sprintf('User %s  created', $user->getEmail()));
    }
    /**
     * @Route("/api/users", name="app_user_show", methods={"GET"})
     */
    public function show(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator): Response
    {
        return new Response('users information');
    }
    /**
     * @Route("/api/users", name="app_user_update", methods={"PUT"})
     */
    public function update(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator): Response
    {
        $request = $this->transformJsonBody($request);
        $email = $request->get('email', '');
        $login = $request->get('login', '');
        $firstname = $request->get('firstname', '');
        $lastname = $request->get('lastname', '');

        return new Response('Update of user:  ' . $email . $login ."firstname: ".$firstname . "\n lastname:" .$lastname );
    }
}