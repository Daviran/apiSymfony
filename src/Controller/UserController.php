<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\DBAL\Driver\Exception;
use App\Service\UserService;

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

        if (empty($email) || empty($password)){
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

        return $this->json($user);
    }
    /**
     * @Route("/api/users", name="app_user_show", methods={"GET"})
     */
    public function show(Request $request, UserService $userService, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator): Response
    {
        return $this->json($userService->getCurrentUser());
    }
    /**
     * @Route("/api/users", name="app_user_update", methods={"PUT"})
     */
    public function update(Request $request, UserService $userService, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $request = $this->transformJsonBody($request);

        $user = $userService->getCurrentUser();

        $email = $request->get('email', $user->getEmail());
        $login = $request->get('login', $user->getLogin());
        if ($request->getPassword()) {
            $password = $request->get('password', $user->getPassword());
        } else {
            $password = null;
        }
        $firstname = $request->get('firstname', $user->getFirstname());
        $lastname = $request->get('lastname', $user->getLastname());

        $user->setLogin($login);
        $user->setEmail($email);
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        if ($password) {
            $user->setPassword($userPasswordHasher->hashPassword($user, $password));
        }
        $entityManager = $this->getDoctrine()->getManager();
        try {
            $entityManager->persist($user);
            $entityManager->flush();
        } catch (Exception $e) {
            return $this->respondValidationError($e->getMessage());
        }

        return  $this->json($userService->getCurrentUser());
    }
}