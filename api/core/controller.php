<?php
    class controller {
        public function model($model){
            require_once "./api/models/".$model.".php";
            return new $model;
        }
        
    }
?>