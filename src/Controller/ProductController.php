<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Product;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="app_product")
     */
    public function index(): Response
    {
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAll();
 
        $data = [];
 
        foreach ($products as $product) {
           $data[] = [
               'id' => $product->getId(),
               'name' => $product->getName(),
               'description' => $product->getDescription(),
               'photo' => $product->getPhoto(),
               'price' => $product->getPrice(),  
           ];
        }
 
 
        return $this->json($data);
    }
    /**
     * @Route("/product", name="project_new", methods={"POST"})
     */
    public function new(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
 
        $product = new Product();
        $product->setName($request->request->get('name'));
        $product->setDescription($request->request->get('description'));
        $product->setPhoto($request->request->get('photo'));
        $product->setPrice($request->request->get('price'));

        $entityManager->persist($product);
        $entityManager->flush();
 
        return $this->json('Produit ajouté: ' . $product->getId() .':' . $product->getName());
    }

    /**
     * @Route("/product/{id}", name="product_show", methods={"GET"})
     */
    public function show(int $id): Response
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($id);
 
        if (!$product) {
 
            return $this->json('No product found for id' . $id, 404);
        }
 
        $data =  [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'description' => $product->getDescription(),
            'photo' => $product->getPhoto(),
            'price' => $product->getPrice(),
        ];
         
        return $this->json($data);
    }
    /**
     * @Route("/product/{id}", name="product_edit", methods={"PUT"})
     */
    public function edit(Request $request, int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);
 
        if (!$product) {
            return $this->json('No product found for id' . $id, 404);
        }
 
        $product->setName($request->request->get('name'));
        $product->setDescription($request->request->get('description'));
        $product->setPhoto($request->request->get('photo'));
        $product->setPrice($request->request->get('price'));

        $entityManager->flush();
 
        $data =  [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'description' => $product->getDescription(),
            'photo' => $product->getPhoto(),
            'price' => $product->getPrice(),
        ];
         
        return $this->json($data);
    }
    /**
     * @Route("/product/{id}", name="product_delete", methods={"DELETE"})
     */
    public function delete(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Project::class)->find($id);
 
        if (!$product) {
            return $this->json('No product found for id' . $id, 404);
        }
 
        $entityManager->remove($product);
        $entityManager->flush();
 
        return $this->json('Deleted a product successfully with id ' . $id);
    }
}
