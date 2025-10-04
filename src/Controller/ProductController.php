<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class ProductController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    #[IsGranted('ROLE_USER')]
    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();
        
        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route('/api/products', name: 'api_products', methods: ['GET'])]
    #[IsGranted('ROLE_USER')]
    public function apiProducts(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();
        
        $productsData = [];
        foreach ($products as $product) {
            $productsData[] = [
                'id' => $product->getId(),
                'asin' => $product->getAsin(),
                'title' => $product->getTitle(),
                'price' => [
                    'value' => (float) $product->getPrice(),
                    'currency' => $product->getCurrency(),
                    'symbol' => $product->getPriceSymbol()
                ],
                'image' => $product->getImage(),
                'url' => $product->getUrl(),
                'description' => $product->getDescription(),
                'category' => $product->getCategory(),
                'availability' => $product->getAvailability(),
                'brand' => $product->getBrand(),
                'features' => $product->getFeatures(),
                'rating' => [
                    'score' => (float) $product->getRatingScore(),
                    'stars' => (float) $product->getRatingStars(),
                    'text' => $product->getRatingText()
                ]
            ];
        }
        
        return $this->json($productsData);
    }
}
