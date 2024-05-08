<?php
class SubCategory_Users {

    protected $SubCategory_id;
    protected $userid;

    public function __construct($SubCategory_id, $userid) {

        $this->SubCategory_id = $SubCategory_id;
        $this->userid = $userid;
    }

      
    public function getuserid(){
        return $this->userid;
    }


    public function getSubCategoryid(){
        return $this->SubCategory_id;
    }


}
