<?php
    class Shelf{

        private int $shelfID;
        private int $sectionID;
        private string $shelfName;



        public function __construct(int $shelfID, int $sectionID, string $shelfName){
                $this->shelfID = $shelfID;
                $this->sectionID = $sectionID;
                $this->shelfName = $shelfName;
        }


        /* ---------------------     GETTERS      ---------------------*/

        /**
         * Get the value of shelfID
         */ 
        public function getShelfID() : int
        {
                return $this->shelfID;
        }

        /**
         * Get the value of sectionID
         */ 
        public function getSectionID() : int
        {
                return $this->sectionID;
        }


         /**
         * Get the value of shelfName
         */ 
        public function getShelfName() : string
        {
                return $this->shelfName;
        }



        /* ---------------------     SETTERS      ---------------------*/
        

        /**
         * Set the value of shelfID
         *
         * @return  self
         */ 
        public function setShelfID(int $shelfID) : Shelf
        {
                $this->shelfID = $shelfID;

                return $this;
        }

        /**
         * Set the value of sectionID
         *
         * @return  self
         */ 
        public function setSectionID(int $sectionID) : Shelf
        {
                $this->sectionID = $sectionID;

                return $this;
        }
        
        

        /**
         * Set the value of shelfName
         *
         * @return  self
         */ 
        public function setShelfName(string $shelfName) : Shelf
        {
                $this->shelfName = $shelfName;

                return $this;
        }
    }

?>