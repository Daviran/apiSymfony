<?php

namespace App\Controller;

use App\Repository\UserRepository;
use \Firebase\JWT\JWT;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends ApiController
{
    /**
     * @Route("/api/login", name="app_login", methods={"POST"})
     */
    public function login(Request $request, UserRepository $userRepository, UserPasswordHasherInterface $encoder)
    {
        $request = $this->transformJsonBody($request);
        $user = $userRepository->findOneBy([
        'email' => $request->get('email'),
        ]);
    if (!$user || !$encoder->isPasswordValid($user, $request->get('password'))) {
        return $this->json([
            'message' => 'Wrong credentials',
        ]);
    }
    $payload = [
        "user" => $user->getEmail(),
        "exp" => (new \DateTime())->modify("+5 minutes")->getTimestamp(),
    ];
    $jwt = JWT::encode($payload, $this->getParameter('jwt_secret'), 'HS256');
    return $this->json([
        'token' => $jwt,
    ]);
    }       
    
}
