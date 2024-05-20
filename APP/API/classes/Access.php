<?php 

class Access {
    private $DNI;
    private $name;
    private $lastName;
    private $userName;
    private $permissions; // Puede ser READ o ALL, por defecto READ
    private $idCompany;
    private $password;
    
    public function __construct($DNI, $name, $lastName, $userName, $idCompany, $password, $permissions = "READ") {
        $this->DNI = $DNI;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->userName = $userName;
        $this->permissions = $permissions;
        $this->idCompany = $idCompany;
        $this->password = $password;
    }

    public function getDNI() {
        return $this->DNI;
    }

    public function setDNI($DNI) {
        $this->DNI = $DNI;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function getPermissions() {
        return $this->permissions;
    }

    public function setPermissions($permissions) {
        $this->permissions = $permissions;
    }

    public function getIdCompany() {
        return $this->idCompany;
    }

    public function setIdCompany($idCompany) {
        $this->idCompany = $idCompany;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function __toString() {
        return "DNI: " . $this->DNI . ", Name: " . $this->name . ", Last Name: " . $this->lastName . ", Username: " . $this->userName . ", Permissions: " . $this->permissions . ", Company ID: " . $this->idCompany;
    }
}

?> 