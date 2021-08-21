<?php 
    class User extends Person {
         
        private $name;
        private $id;

        function __construct($name){
            $this->name = $name;
            $this->id = mt_rand(0, 100);
            parent::__construct($name);
        }

        public function get_username(){
            return $this->name.$this->id;
        }

    
    }
?>