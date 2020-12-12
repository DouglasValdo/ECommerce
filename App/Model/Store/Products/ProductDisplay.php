<?php namespace Library\Model\Store\Products;


class ProductDisplay
{
    public string $Identifier;
    public string $Label;
    public array  $Categories;
    public string $Reference;
    public string $Amount;
    public string $Price;
    public string $Description;
    public string $Thumbnail;
    public ?array $Images;
}