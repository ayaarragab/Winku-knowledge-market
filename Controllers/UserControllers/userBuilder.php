<?php
require_once '../Models/Person.php';
class UserBuilder extends Person
{
    private $numQuestions;
    private $privilgedOrNot;
    private $numOfReports;
    private $numOfBadges;
    private $badges;
    private $reputations;
    private $suggestedCategory;
    public function __construct($fullName, $username, $gender, $email, $password)
    {
        parent::__construct($fullName, $username, $gender, $email, $password);
        $this->numQuestions = 0;
        /*$this->fullName = $fullName;
        $this->username = $username;
        $this->password = $password;*/
        $this->privilgedOrNot = 0;
        $this->numOfReports = 0;
        $this->numOfBadges = 0;
        $this->reputations = 0;
        $this->suggestedCategory = 'no categories suggested yet';
        $this->badges = 'no badges yet';
    }
    public function setNumQuestions($num)
    {
    }
    public function setNumberOfReports($num)
    {
    }
    public function setNumOfBadges($num)
    {
    }

    public function setReputations($set)
    {
    }

    public function setSuggestedCategory($suggestedCategories)
    {
        $this->suggestedCategory = $suggestedCategories;
    }

    public function getNumQuestions()
    {
        return $this->numQuestions;
    }


    public function isPrivilged()
    {
        return $this->privilgedOrNot;
    }


    public function getNumberOfReports()
    {
        return $this->numOfReports;
    }

    public function getNumOfBadges()
    {
        return $this->numOfBadges;
    }

    public function getBadges()
    {
        return $this->badges;
    }


    public function getReputations()
    {
        return $this->reputations;
    }

    public function getSuggestedCategory()
    {
        return $this->suggestedCategory;
    }
    public function getNumReports()
    {
        return $this->numOfReports;
    }
    public function loginObject($id,$numQuestions, $privilgedOrNot, $numOfReports, $numOfBadges, $badges, $reputations, $suggestedCategory)
    {
        $this->setId($id);
        $this->$numQuestions= $numQuestions;
        $this->$privilgedOrNot= $privilgedOrNot;
        $this->$numOfReports= $numOfReports;
        $this->$numOfBadges=  $numOfBadges;
        $this->$badges= $badges;
        $this->$reputations= $reputations;
        $this->$suggestedCategory= $suggestedCategory;
    }
}
