<?php
    class Section{

        private int $sectionID;
        private int $warehouseID;
        private string $sectionName;



        public function __construct(int $sectionID, int $warehouseID, string $sectionName){
                $this->sectionID = $sectionID;
                $this->warehouseID = $warehouseID;
                $this->sectionName = $sectionName;
        }


        /* ---------------------     GETTERS      ---------------------*/

        /**
         * Get the value of sectionID
         */ 
        public function getSectionID() : int
        {
                return $this->sectionID;
        }

        /**
         * Get the value of warehouseID
         */ 
        public function getWarehouseID() : int
        {
                return $this->warehouseID;
        }

         /**
         * Get the value of sectionName
         */ 
        public function getSectionName() : string
        {
                return $this->sectionName;
        }



        /* ---------------------     SETTERS      ---------------------*/
        

        /**
         * Set the value of sectionID
         *
         * @return  self
         */ 
        public function setSectionID(int $sectionID) : Section
        {
                $this->sectionID = $sectionID;

                return $this;
        }
        
        
        /**
         * Set the value of WarehouseID
         *
         * @return  self
         */ 
        public function setWarehouseID(int $warehouseID) : Section
        {
                $this->warehouseID = $warehouseID;

                return $this;
        }


        /**
         * Set the value of sectionName
         *
         * @return  self
         */ 
        public function setSectionName(string $sectionName) : Section
        {
                $this->sectionName = $sectionName;

                return $this;
        }
    }

?>