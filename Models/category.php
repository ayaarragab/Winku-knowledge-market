<?php
require_once "Classification.php";
require_once '../Models/Classification.php';
class Category extends Classification{


protected $numOfSubcategories;
protected $describtion;
protected $Category_id;


public function __construct($name, $NumberOfQuestions, $numberOfreports, $numOfSubcategories, $describtion) {
  $this->name = $name;
  $this->numberOfQuestions = $NumberOfQuestions;
  $this->numberOfreports = $numberOfreports;
  $this->numOfSubcategories = $numOfSubcategories;
  $this->describtion = $describtion;
}

public function getNumOfSubcategories(){
    return $this->numOfSubcategories;
}

public function getDescribtion(){
    return $this->describtion;
}

public function setDescribtion($describtion){
    $this -> describtion = $describtion;
}

  /*public function getSubcategories(){
    return $this->Category_id;
 }*/

public function getNumberOfQuestions(){
  return $this->numberOfQuestions;
}

public function getNumberOfreports(){
  return $this->numberOfreports;
}
}