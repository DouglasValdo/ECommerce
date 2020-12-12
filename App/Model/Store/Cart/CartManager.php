<?php namespace Library\Model\Store\Cart;


class CartManager
{
    public function GetUserCart(string $userIdentifier): ?array
    {
        if($userIdentifier == null) return null;
        return null;
    }

    public function RemoveProductFromCart(string $productIdentifier, string $userIdentifier):bool
    {
        return false;
    }

    public function AddProductToCart(string $productIdentifier, string $userIdentifier):bool
    {
        return false;
    }

    public function GetCartTotalPrice(string $userIdentifier):float
    {
        return 0;
    }



}