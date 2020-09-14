<?php
    //他的一個對象實例就表示Admin表的一條紀錄
    class Admin{
         private $id;
         private $name;
         private $passwore;
        /**
         * @return the $id
         */
        public function getId()
        {
            return $this->id;
        }
    
        /**
         * @return the $name
         */
        public function getName()
        {
            return $this->name;
        }
    
        /**
         * @return the $passwore
         */
        public function getPasswore()
        {
            return $this->passwore;
        }
    
        /**
         * @param field_type $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }
    
        /**
         * @param field_type $name
         */
        public function setName($name)
        {
            $this->name = $name;
        }
    
        /**
         * @param field_type $passwore
         */
        public function setPasswore($passwore)
        {
            $this->passwore = $passwore;
        }
    
        
    }
?>