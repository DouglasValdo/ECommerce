<?php namespace Library\Model\Store\Products;

use Library\Model\DBase\BaseDatabaseContext;

class ProductsManager extends BaseDatabaseContext
{
    public function GetAllProducts(): ?array
    {
        $query = "SELECT DISTINCT Products.* FROM Products order by Label";

        $preparedQuery = $this->DBContext->prepare($query);

        $preparedQuery->execute();

        return $this->ConvertProductsToProductsDisplay($preparedQuery->fetchAll());

    }

    public function GetProductsByLabel(string $label) : ?array
    {
        $query = "SELECT DISTINCT Products.* FROM Products WHERE Label LIKE :label";

        $preparedQuery = $this->DBContext->prepare($query);

        $preparedQuery->execute(array(":label" => '%'.$label."%"));

        return $this->ConvertProductsToProductsDisplay($preparedQuery->fetchAll());
    }

    public function GetProductsByCategory(string $category): ? array
    {
        $query = "SELECT DISTINCT Products.* FROM Products WHERE Categories = :category";

        $preparedQuery = $this->DBContext->prepare($query);

        $preparedQuery->execute(array(":label" => $category));

        return $this->ConvertProductsToProductsDisplay($preparedQuery->fetchAll());
    }

    public function GetProductsByPagination(int $offset, int $limit = 10): ?array
    {
        $query = "SELECT DISTINCT Products.* FROM Products LIMIT :limit OFFSET :offset";

        $preparedQuery = $this->DBContext->prepare($query);

        $preparedQuery->execute(array(":limit" => $limit, ":offset" => $offset));

        return $this->ConvertProductsToProductsDisplay($preparedQuery->fetchAll());
    }

    private function GetProductImages(string $productIdentifier): ?array
    {
        $query = "SELECT FileRelativePath FROM ProductsImage WHERE ProductIdentifier = :productIdentifier";

        $preparedQuery = $this->DBContext->prepare($query);

        $preparedQuery->execute(array(":productIdentifier" => $productIdentifier));

        return ($preparedQuery->rowCount())?
            $preparedQuery->fetchAll(): null;
    }

    private function ConvertProductsToProductsDisplay(array $products):?array
    {
        $listOfProductDisplay = array(null);

        if($products == null) return $listOfProductDisplay;

        foreach ($products as $product)
        {
            $productDisplay = new ProductDisplay();

            $productDisplay->Identifier         = $product["Identifier"];
            $productDisplay->Label              = $product["Label"];
            $productDisplay->Categories         = $this->ConvertCategoryToCategories($product["Categories"]);
            $productDisplay->Reference          = $product["Reference"];
            $productDisplay->Amount             = $product["Amount"];
            $productDisplay->Price              = $product["Price"];
            $productDisplay->Description        = $product["Description"];
            $productDisplay->Thumbnail          = $product["ThumbnailRelativePath"];
            $productDisplay->Images             = $this->GetProductImages($product["Identifier"]);

            array_push($listOfProductDisplay, $productDisplay);
        }

        return $listOfProductDisplay;
    }

    private function ConvertCategoryToCategories(string $categories): array
    {
        $categoriesToReturn = array(null);

        foreach (explode(';', $categories) as $category)
        {
            array_push($categoriesToReturn, $category);
        }

        return $categoriesToReturn;
    }

}
