<?php namespace Library\Controller;


use JetBrains\PhpStorm\Pure;
use Library\Model\Store\Cart\CartManager;
use Library\Model\Store\Products\ProductsManager;
use Library\View\StoreView;

class StoreController
{

    #[Pure] public function GetUserCart(string $userIdentifier):?string
    {
        $cart = new CartManager();
        $storeView = new StoreView();

        return $storeView->UserCart($cart->GetUserCart($userIdentifier)??array(null));
    }

    public function GetAllProducts():string
    {
        $productManager = new ProductsManager();
        $storeView = new StoreView();

        return  $storeView->GetAllProducts($productManager->GetAllProducts());
    }
}