<?php namespace Library\Model\Store\Cart;

use Library\Model\DBase\BaseDatabaseContext;

class CartManager  extends BaseDatabaseContext
{
    public function GetUserCart(string $userIdentifier): ?array
    {
        if(!isset($userIdentifier)) return null;
        return null;

        $query = "SELECT P.Identifier, Label, Price, Amount, ThumbnailRelativePath FROM ".
                 "Cart LEFT JOIN Products P on Cart.Identifier = P.Identifier AND Cart.UserIdentifier = :userIdentifier";

        $preparedQuery = $this->DBContext->prepare($query);

        $preparedQuery->execute(array(":userIdentifier" => $userIdentifier));

        return $preparedQuery->rowCount() > 0 ? $this->ConvertCartToCartItemDisplay($preparedQuery->fetchAll()) : null;
    }

    public function RemoveProductFromCart(string $productIdentifier, string $userIdentifier):bool
    {
        if(!isset($userIdentifier) || !isset($productIdentifier)) return false;

        $query = "DELETE FROM Cart WHERE ProductIdentifier = :productIdentifier AND UserIdentifier = :userIdentifier";

        $preparedQuery = $this->DBContext->prepare($query);

        $preparedQuery->execute(array(":productIdentifier" => $productIdentifier, ":userIdentifier" => $userIdentifier));

        return $preparedQuery->rowCount() > 0;
    }

    public function AddProductToCart(string $productIdentifier, string $userIdentifier):bool
    {
        return false;
    }

    public function GetCartTotalPrice(string $userIdentifier):float
    {
        return 0;
    }

    private function ConvertCartToCartItemDisplay(array $cartItems): ?array
    {
        if(!isset($cartItems)) return null;

        $allCartItems = array();

        foreach ($cartItems as $cartItem)
        {
            $cartItemDisplay = new CartDisplayItemDisplay();

            $cartItemDisplay->Identifier = $cartItem["Identifier"];
            $cartItemDisplay->Label = $cartItem["Label"];
            $cartItemDisplay->Price = $cartItem["Price"];
            $cartItemDisplay->Amount = $cartItem["Amount"];
            $cartItemDisplay->ThumbnailRelativePath = $cartItem["ThumbnailRelativePath"];

            array_push($allCartItems, $cartItemDisplay);
        }

        return $allCartItems;
    }
}
