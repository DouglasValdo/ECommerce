<?php namespace Library\Model\StoreManager;

require_once "../../../vendor/autoload.php";

use Library\Model\DBase\DBaseContext;
use PDO;
use Exception;

class Store
{
    private PDO $DBContext;

    public function __construct()
    {
        $this->DBContext = DBaseContext::GetContext();

        if($this->DBContext == null)
            throw new Exception("No valid DataBaseConnection");
    }

    public function GetAllProducts(): ?array
    {
        $query = "SELECT DISTINCT Products.* FROM Products order by Label";

        $preparedQuery = $this->DBContext->prepare($query);

        $preparedQuery->execute();

        $products = $preparedQuery->fetchAll();

        $listOfProductDisplay = array();

        //set products images
        foreach ($products as $product)
        {
            $productDisplay = new ProductDisplay();

            $productDisplay->Identifier         = $product["Identifier"];
            $productDisplay->Label              = $product["Label"];
            $productDisplay->Category           = $product["Category"];
            $productDisplay->Reference          = $product["Reference"];
            $productDisplay->Amount             = $product["Amount"];
            $productDisplay->Description        = $product["Description"];
            $productDisplay->DisplayImagePath   = $product["DisplayImagePath"];
            $productDisplay->Images             = $this->GetProductImages($product["Identifier"]);

            array_push($listOfProductDisplay, $productDisplay);
        }

        return $listOfProductDisplay;
    }

    private function GetProductImages(string $productIdentifier): ?array
    {
        $query = "SELECT FileRelativePath FROM ProductsImage WHERE ProductIdentifier = :productIdentifier";

        $preparedQuery = $this->DBContext->prepare($query);

        $preparedQuery->execute(array(":productIdentifier" => $productIdentifier));

        return ($preparedQuery->rowCount())?
            $preparedQuery->fetchAll(): null;
    }

}

$store = new Store();

echo "<pre>";
var_dump($store->GetAllProducts());