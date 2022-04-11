<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }
    /**
     * @Route("/api/user", name="user_show")
     */
    public function show(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'UserName?',
        ]);
    }
    /**
     * @Route("/product/user", name="user_edit", methods={"PUT"})
     */
    // public function edit(Request $request, string $user): Response
    // {
    //     $entityManager = $this->getDoctrine()->getManager();
    //     $user = $entityManager->getRepository(Product::class)->find($user);
 
    //     if (!$product) {
    //         return $this->json('Error :'.' No product found for id' . $id, 404);
    //     }
 
    //     $product->setName($request->request->get('name'));
    //     $product->setDescription($request->request->get('description'));
    //     $product->setPhoto($request->request->get('photo'));
    //     $product->setPrice($request->request->get('price'));

    //     $entityManager->flush();
 
    //     $data =  [
    //         'id' => $product->getId(),
    //         'name' => $product->getName(),
    //         'description' => $product->getDescription(),
    //         'photo' => $product->getPhoto(),
    //         'price' => $product->getPrice(),
    //     ];
         
    //     return $this->json($data);
    // }
}
