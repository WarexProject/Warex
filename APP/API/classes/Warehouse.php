<?php 

class Warehouse {
    private $warehouseID;
    private $companyID;
    private $totalProductQuantity;
    private $RefrigeratingChamber; // true o false, por defecto FALSE 
    
    public function __construct($warehouseID, $companyID, $totalProductQuantity, $RefrigeratingChamber = FALSE) {
        $this->warehouseID = $warehouseID;
        $this->companyID = $companyID;
        $this->totalProductQuantity = $totalProductQuantity;
        $this->RefrigeratingChamber = $RefrigeratingChamber;
    }

    public function getWarehouseID() {
        return $this->warehouseID;
    }

    public function setWarehouseID($warehouseID) {
        $this->warehouseID = $warehouseID;
    }

    public function getCompanyID() {
        return $this->companyID;
    }

    public function setCompanyID($companyID) {
        $this->companyID = $companyID;
    }

    public function getTotalProductQuantity() {
        return $this->totalProductQuantity;
    }

    public function setTotalProductQuantity($totalProductQuantity) {
        $this->totalProductQuantity = $totalProductQuantity;
    }

    public function getRefrigeratingChamber() {
        return $this->RefrigeratingChamber;
    }

    public function setRefrigeratingChamber($RefrigeratingChamber) {
        $this->RefrigeratingChamber = $RefrigeratingChamber;
    }

    public function __toString() {
        return "Warehouse ID: " . $this->warehouseID . ", Company ID: " . $this->companyID . ", Total Product Quantity: " . $this->totalProductQuantity . ", Refrigerating Chamber: " . ($this->RefrigeratingChamber ? "true" : "false");
    }
}

?>