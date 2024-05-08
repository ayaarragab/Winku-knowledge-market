<?php

abstract class Classification{

  protected $id;
  protected $name;
  protected $numberOfQuestions;
  protected $numberOfreports;


   public function getName(){
      return $this->name;
 }

   public function setName($name){
      $this->name=$name;
 }
  abstract public function getNumberOfQuestions();
  abstract public function getNumberOfreports();
}
