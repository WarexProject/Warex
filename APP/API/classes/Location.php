<?php
    class Location{

        private int $warehousID;
        private int $productID;
        private int $sectionID;
        private int $shelfID;
        private int $totalProductQuantity;



        public function __construct(int $warehousID, int $productID, int $sectionID, int $shelfID, int $totalProductQuantity){
            $this->warehousID = $warehousID;
            $this->productID = $productID;
            $this->sectionID = $sectionID;
            $this->shelfID = $shelfID;
            $this->totalProductQuantity = $totalProductQuantity;
        }


        /* ---------------------     GETTERS      ---------------------*/
        /**
         * Get the value of warehousID
         */ 
        public function getWarehousID() : int
        {
                return $this->warehousID;
        }

        /**
         * Get the value of productID
         */ 
        public function getProductID() : int
        {
                return $this->productID;
        }

        /**
         * Get the value of sectionID
         */ 
        public function getSectionID() : int
        {
                return $this->sectionID;
        }

        /**
         * Get the value of shelfID
         */ 
        public function getShelfID() : int
        {
                return $this->shelfID;
        }

         /**
         * Get the value of totalProductQuantity
         */ 
        public function getTotalProductQuantity() : int
        {
                return $this->totalProductQuantity;
        }



        /* ---------------------     SETTERS      ---------------------*/
        /**
         * Set the value of warehousID
         *
         * @return  self
         */ 
        public function setWarehousID($warehousID) : Location
        {
                $this->warehousID = $warehousID;

                return $this;
        }

        /**
         * Set the value of productID
         *
         * @return  self
         */ 
        public function setProductID($productID) : Location
        {
                $this->productID = $productID;

                return $this;
        }

        /**
         * Set the value of sectionID
         *
         * @return  self
         */ 
        public function setSectionID($sectionID) : Location
        {
                $this->sectionID = $sectionID;

                return $this;
        }
        
        /**
         * Set the value of shelfID
         *
         * @return  self
         */ 
        public function setShelfID($shelfID) : Location
        {
                $this->shelfID = $shelfID;

                return $this;
        }

        /**
         * Set the value of totalProductQuantity
         *
         * @return  self
         */ 
        public function setTotalProductQuantity($totalProductQuantity) : Location
        {
                $this->totalProductQuantity = $totalProductQuantity;

                return $this;
        }
    }

?>