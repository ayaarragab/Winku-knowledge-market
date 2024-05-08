<?php
//require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\auth\Authenticator.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\auth\Authenticator.php';
require_once 'userMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Models\User.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Models\User.php';
class UserAuthenticator extends Authenticator{
    public static function valueAssociativeArr($arr)
    {
        foreach ($arr as $value) {
            if (!empty($value)) {
                return false; // If any value is empty, return true
            }
        }
        return true;
    }
    public static function registerErr($Rname , $Rusername , $Rgender ,$Remail , $Rpass)
    {
        $arr_Err=array("nameErr"=>"" , "usernameErr"=>"" , "emailErr"=>"" , "passErr"=>"" );
        if(empty($Rname ))
        {
            $arr_Err["nameErr"]="* Name is requird";
        }else{
            $Rname = self::checkInput($Rname );
            if(!preg_match("/^[a-zA-Z-' ]*$/",$Rname))
            {
                $arr_Err["nameErr"] = "* Only letters and white space allowed";
            }
        }

        if(empty($Rusername))
        {
            $arr_Err["usernameErr"]="* Username is requird";
        }

        if(empty($Remail)){
            $arr_Err["emailErr"] = "* Email is required";
        }elseif(!filter_var( self::checkInput($Remail) , FILTER_VALIDATE_EMAIL)){
            $arr_Err["emailErr"] = "* Invalid email format";
        }


        if(empty($Rpass)){
            $arr_Err["passErr"] = "* Password is required";
        }else{
            if(strlen($Rpass)<8){
                $arr_Err["passErr"] = "* It is too short";
            }elseif(!empty($Remail))
            {
                $emailParts = explode('@', $Remail);
                $password = self::checkinput($Rpass);
                $hashp = password_hash($password,PASSWORD_DEFAULT);
                if($emailParts[0]==$Rpass)
                {
                    $arr_Err["passErr"] = "* Error: Password cannot be the same as the email address.";
                }elseif (!password_verify($password,$hashp)) {
                    $arr_Err["passErr"] = "* Invalid password";
                }
            }
        }
            return $arr_Err;
    }
    public static function register($Rname , $Rusername , $Rgender ,$Remail , $Rpass)
    {
        if($Rgender=='no')
		{
			$Rgender=0;
		}elseif($_POST['gender']=='yes'){
			
			$Rgender=1;
		}
            $Rname =  self::checkInput($Rname);
            $Remail = self::checkInput($Remail);
            $Rpass = self::checkInput($Rpass);
            $Rpass = sha1($Rpass);
            $Rusername = self::checkInput($Rusername);
            if($Rname && $Remail && $Rpass && $Rusername){
                // my edit -Aya-
                
                $isduplicateEamil = UserMapper::searchAttribute($Remail,'email');
                $isduplicateName = UserMapper::searchAttribute($Rusername,'username');
                if ($isduplicateEamil) {
                    echo 'duplicate email';
                }
                else if ($isduplicateName) {
                    echo 'duplicate username';
                }
                else{
                        $user = new User($Rname, $Rusername, $Rgender, $Remail, $Rpass);
                        $check = UserMapper::add($user->builder);
                        if($check){
                            return "success";
                        }else{
                            return "somethingWrong";
                        }
                }
            }else{
                return "missingError";
            }
    }
}