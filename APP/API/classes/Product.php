<?php
class Product {
    private $productID;
    private $productName;
    private $totalProductQuantity;
    private $description;
    private $unitPrice;
    private $expiryDate;
    
    public function __construct($productID, $productName, $totalProductQuantity, $description, $unitPrice, $expiryDate) {
        $this->productID = $productID;
        $this->productName = $productName;
        $this->totalProductQuantity = $totalProductQuantity;
        $this->description = $description;
        $this->unitPrice = $unitPrice;
        $this->expiryDate = $expiryDate;
    }

    public function getProductID() {
        return $this->productID;
    }

    public function setProductID($productID) {
        $this->productID = $productID;
    }

    public function getProductName() {
        return $this->productName;
    }

    public function setProductName($productName) {
        $this->productName = $productName;
    }

    public function getTotalProductQuantity() {
        return $this->totalProductQuantity;
    }

    public function setTotalProductQuantity($totalProductQuantity) {
        $this->totalProductQuantity = $totalProductQuantity;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getUnitPrice() {
        return $this->unitPrice;
    }

    public function setUnitPrice($unitPrice) {
        $this->unitPrice = $unitPrice;
    }

    public function getExpiryDate() {
        return $this->expiryDate;
    }

    public function setExpiryDate($expiryDate) {
        $this->expiryDate = $expiryDate;
    }

    public function __toString() {
        return "Product ID: " . $this->productID . ", Product Name: " . $this->productName . ", Total Product Quantity: " . $this->totalProductQuantity . ", Description: " . $this->description . ", Unit Price: " . $this->unitPrice . ", Expiry Date: " . $this->expiryDate;
    }
}
