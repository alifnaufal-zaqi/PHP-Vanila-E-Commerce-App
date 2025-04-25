<?php

namespace App\controllers;

use App\models\ProductsModel;
use PDO;

class LandingController
{

    protected $productModel;

    public function __construct(PDO $pdo)
    {
        $this->productModel = new ProductsModel($pdo);
    }

    public function index()
    {
        $products = $this->productModel->getNewProducts();
        $faq = [
            [
                'question' => 'How do I buy products on E-Commerce?',
                'answer' => 'You can buy products by adding items to your shopping cart, then checking out and choosing an available payment method.',
            ],
            [
                'question' => 'Do I need to create an account to shop?',
                'answer' => 'Yes, you need have an account for shooping in E-Commerce',
            ],
            [
                'question' => 'What payment methods are available?',
                'answer' => 'We accept payments via bank transfer, e-wallet (OVO, GoPay, Dana), and credit and debit cards.',
            ],
            [
                'question' => 'Can I cancel or change my order after making a payment?',
                'answer' => 'Orders that have been processed cannot be cancelled. If you want to change your order, please contact our customer service within 1 hour after payment.',
            ]
        ];
        include(__DIR__ . '/../views/landing.php');
    }
}
