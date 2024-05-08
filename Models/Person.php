<?php
class Person{
    private $id;
    private $fullName;
    private $username;
    private $gender;
    private $email;
    private $password;
    private $numAnswers;
    private $numFollowers;
    private $numFollowings;
    private $profilePhoto;
    private $bio;
    private $country;
    private $professionalTitle;
    public function __construct($fullName, $username, $gender, $email, $password) {
        $this->gender = $gender;
        $this->fullName = $fullName;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->numAnswers = 0;
        $this->numFollowers = 0;
        $this->numFollowings = 0;
        $this->profilePhoto = 'no photos added yet';
        $this->bio = 'no bio added yet';
        $this->country = 'no country specified yet';
        $this->professionalTitle = 'no title specified yet';
    }
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getGender(){
        return $this->gender;
    }

    public function setgender($gender){
        $this->gender = $gender;
    }

    public function getFullName(){
        return $this->fullName;
    }

    public function setfullName($fullName){
        $this->fullName = $fullName;
    }


    public function getUsername(){
        return $this->username;
    }

    public function setusername($username){
        $this->username = $username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword( $password) {
        $this->password = $password;
    }

    public function getNumAnswers(){
        return $this->numAnswers;
    }

    public function setNumAnswers( $numAnswers){
        $this->numAnswers = $numAnswers;
    }

    public function getNumFollowers($id){
        $result =userfollowermapper::numOfRow($id,'followerId');
        return $result;
    }

    public function setnumFollowers($numFollowers) {
        $this->numFollowers = $numFollowers;
    }

    public function getNumFollowings($id){
        $result =userfollowermapper::numOfRow($id,'userId');
        return $result;
    }

    public function setNumFollowings($numFollowings) {
        $this->numFollowings = $numFollowings;
    }

    public function getProfilePhoto(){
        return $this->profilePhoto;
    }

    public function setprofilePhoto($profilePhoto){
        $this->profilePhoto = $profilePhoto;
    }

    public function getBio() {
        return $this->bio;
    }

    public function setBio( $bio){
        $this->bio = $bio;
    }

    public function getCountry(){
        return $this->country;
    }

    public function setCountry($country){
        $this->country = $country;
    }

    public function getProfessionalTitle() {
        return $this->professionalTitle;
    }

    public function setProfessionalTitle( $professionalTitle){
        $this->professionalTitle = $professionalTitle;
    }
    // public function AnswerQuestion($questionId, $answerContent): bool {
    //     # هنرجعلها
    // }
}