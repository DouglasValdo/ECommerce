<?php namespace Library\View;


use JetBrains\PhpStorm\Pure;

class StoreView
{
    #[Pure] public function UserCart(array|null $cartDisplay) : string
    {
        if($cartDisplay == null) return "";
        $total = null;

        foreach ($cartDisplay as $item)
        {
            if($item == null) continue;
            $total += $item->Price;
        }

        return "<div class='ui labeled button button-cart' tabindex='0'>
                            <div class='ui  button button-cart-icon'>
                                <i class='cart icon'></i>".sizeof($cartDisplay)."</div>
                            <a class='ui basic left pointing label button-cart-price'>
                                {$total}
                            </a>
                    </div>";
    }

    public function GetAllProducts(array $products):string
    {
        $toReturn = '<ul class="ul-products">';

        foreach ($products as $product)
        {
            if($product == null) continue;

            $toReturn .= "<li class='li-product-item'>
                        <div class='product-item-display'>
                            <div class='product-header'>
                                <button class='circular ui icon button show-product-button'>
                                    <i class='icon expand'></i>
                                </button>
                                <button class='circular ui icon button add-cart-button'>
                                    <i class='icon cart'></i>
                                </button>
                            </div>
                            <div class='product-body'>
                                <img src='../Web/img/Products/{$product?->Thumbnail}' class='product-thumbnail'alt='image {$product->Label}'>
                            </div>
                            <div class='product-footer'>
                                <p class='product-price'>€{$product?->Price}</p>
                            </div>
                        </div>
                    </li>";
        }

        $toReturn .= '</ul>';

        return $toReturn;
    }
}