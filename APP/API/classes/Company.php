<?php

class Company {
    private $NIF;
    private $companyName;
    
    public function __construct($NIF, $companyName) {
        $this->NIF = $NIF;
        $this->companyName = $companyName;
    }

    public function getNIF() {
        return $this->NIF;
    }

    public function setNIF($NIF) {
        $this->NIF = $NIF;
    }

    public function getCompanyName() {
        return $this->companyName;
    }

    public function setCompanyName($companyName) {
        $this->companyName = $companyName;
    }

    public function __toString() {
        return "NIF: " . $this->NIF . ", Company Name: " . $this->companyName;
    }
}

?>
