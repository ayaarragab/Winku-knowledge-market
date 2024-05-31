<?php require_once 'userMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Models\User.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\database\dbConnection.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\questionControllers\questionMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\userReactsQuestion\UserReactsQuestionMapper.php';

// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Models\User.php';
class UserToSystem{
    public static function verifyMyAccount($email)
    {
        
        $ending=array('.edu','.ac.uk','edu.sa','edu.eg','edu.ar');

        for($i=0;$i<5;++$i)
        {
            $lastCharacters = substr($email, -strlen($ending[$i]));
            if($ending[$i]==$lastCharacters)
            {
                UserControllerHelper::incrementData($_SESSION['id'],'id','privilgedOrNot');
                return true;
            }
        }
        return false;
    }
    public static function shere()
    {
        
    }
    public static function getReputations($username)
    {
        $sum=0;
        $question=QuestionMapper::selectObjectAsArray($username,'username');
        if($question!==false){
        foreach ($question as $key => $value) {
            $numofup = UserReactsQ::numOfRowforattr($value['id'],'questionId','upVote');
            $sum =$sum+$numofup['num'];
        }
    }
        $numR = (int)($sum/1);
        return $numR;
   
    }
    public static function getBages($username)
    {   $badges=array('Code Maestro Badge','Bug Squasher Badge','Algorithm Guru Badge','Tech Savant Badge','Syntax Sensei Badge','Privileged Developer Badge');
        $num=self::getReputations($username);
        if($num<10){
            $badge=0;
        }elseif($num<20 && $num>=10){
            $badge=1;
        }elseif($num<30 && $num>=20){
            $badge=2;
        }elseif($num<40 && $num>=30){
            $badge=3;
        }elseif($num<50 && $num>=40){
            $badge=4;
        }elseif($num<60 && $num>=50){
            $badge=5;
        }elseif($num>=60){
            $badge=6;
        }

        if($badge>0)
        {
            $i=0;
            for($badge;$badge>0;--$badge){
                echo '<img style ="width: 200px; height: 200px;" src="images\badges\badge'.$badge.'.png" alt="'.$badges[$i].'"><br>';
                echo $badges[$i]."<br>";
                $i++;

            }
        }



    }
}
?>