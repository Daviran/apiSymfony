<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\AddToCartType;
use App\Manager\CartManager;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CartController
 * @package App\Controller
 */
class CartController extends AbstractController
{
    // ...

    /**
     * @Route("/api/cart/{productId}", name="add.cart", methods={"POST"})
     */
    public function detail(int $productId, Request $request, CartManager $cartManager)
    {
        // $form = $this->createForm(AddToCartType::class);
        $product = $this->getDoctrine()
        ->getRepository(Product::class)
        ->find($productId);
        // $form->handleRequest($request);

        // if ($form->isSubmitted() && $form->isValid()) {
            // $item = $form->getData();
            // $item->setProduct($product);

            $cart = $cartManager->getCurrentCart();
            $cart
                ->addItem($product)
                ->setUpdatedAt(new \DateTime());

            $cartManager->save($cart);

        return $this->json('Produit ajouté: ' . $product->getId() .':' . $product->getName());
    }
}
