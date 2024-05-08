<?php
require_once "Classification.php";

class Subcategory extends Classification{
    
    protected $numberOfAnswers;
    protected $ownerUsername;
    protected $questions; // of question objs
    protected $categoryId;

    public function __construct($name, $ownerUsername, $Category_id) {
        $this->name = $name;
        $this->ownerUsername = $ownerUsername;
        $this->categoryId = $Category_id;
        $this->numberOfAnswers = 0;
    }

    public function getnumberOfAnswers(){
        return $this->numberOfAnswers;
    }

    public function getownerusername(){
        return $this->ownerUsername;
    }

    public function getnumberOfreports(){
        return $this->numberOfreports;
   }

/*   public function getQuestions(){
    return $this-> Category_id ;
    return $this-> SubCategory_id ;
   }
*/
   public function getnumberOfQuestions(){
    return $this->numberOfQuestions;
   }
   public function getCategoryId(){
    return $this->categoryId;
   }
}
