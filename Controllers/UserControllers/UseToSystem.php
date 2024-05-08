<?php require_once 'userMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Models\User.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Models\User.php';
class UserToSystem{
    public static function verifyMyAccount($email)
    {
        
        $ending=array('.edu','.ac.uk','edu.sa','edu.eg','edu.ar');
        for($i=0;$i<5;$i)
        {
            $lastCharacters = substr($email, -strlen($ending[$i]));
            if($ending===$lastCharacters)
            {
                UserControllerHelper::incrementData($_SESSION['id'],'id','privilgedOrNot');
                return true;
            }
        }
        return false;
    }
}
?>