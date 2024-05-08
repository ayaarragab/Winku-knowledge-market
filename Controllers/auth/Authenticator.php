<?php
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Models\Admin.php';
class Authenticator{
    public static function login($loginUsername, $loginPass){
        $loginUsername = self::checkInput($loginUsername) ;
        $loginPass = self::checkInput($loginPass);
        echo '<br>'.$loginPass.'<br>';
        if($loginUsername && $loginPass)
        {
            $hashPassword = sha1($loginPass);
            $data1 = UserMapper::searchAttribute($loginUsername,'username');
            if($data1)
            {
                $data2 = UserMapper::searchAttributeWithOther($hashPassword,'password',$loginUsername,'username');
                if($data2)
                {
                    $objArr = UserMapper::selectObjectAsArray($loginUsername, 'username');
                    echo "You are logged in";
                    if (isset($objArr[0]['adminOrNot']) && $objArr[0]['adminOrNot'] == 1) {
                        $admin =new Admin($objArr[0]['username'], $objArr[0]['email'],$objArr[0]['password']);
                    }
                    else {
                        $userlogged=new User($objArr[0]['fullName'],$objArr[0]['username'],$objArr[0]['gender'],$objArr[0]['email'],$objArr[0]['password']);
                        $userlogged->builder->loginObject($objArr[0]['id'], $objArr[0]['numQuestions'], $objArr[0]['privilgedOrNot'], $objArr[0]['numberOfReports'], $objArr[0]['numOfBadges'], $objArr[0]['badges'], $objArr[0]['reputations'], $objArr[0]['suggestedCategory']);
                    }
                    //print_r($userlogged);
                    // session_unset();
                    session_start();
                    session_destroy();
                    session_start();
                    $_SESSION['id'] = $objArr[0]['id'];
                    $_SESSION['username'] = $objArr[0]['username'];
                    if (!isset($objArr[0]['adminOrNot']) || $objArr[0]['adminOrNot'] == 0) {
                        $_SESSION['user'] = serialize($userlogged);
                        header('Location: ..\Views\index.php');
                    }
                    if (isset($objArr[0]['adminOrNot']) && $objArr[0]['adminOrNot'] == 1) {
                        $_SESSION['adminOrNot'] = 1;
                        header('Location: ..\Views\admin_dashboard.php');
                    }
                } else {
                    return "passError";
                }
            }else{
                return "usernameError";
            }
        }else{
            return "Please enter your email and password";
        }
    }    
    public static function check_login(){
        if(!isset($_SESSION['id'])) {
            header('Location: landing.php');
            exit(); // Optional: exit script to prevent further execution
        }
    }
    public static function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    public static function validateInput($username, $password) {
        if (empty($username) || empty($password)) {
            return false;
        }
        return true;
    }
}