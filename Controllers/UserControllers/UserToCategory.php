<?php
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\categoryUser\categoryusersMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\categoryControllers\CategoryMapper.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\associativeClasses\categoryUser\categoryusersMapper.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\categorycontrollers\CategoryMapper.php';
require_once 'userMapper.php';
class UserToCategory{
    public function followCategory($categoryId, $userId)
    {
    //    if ( !$_SESSION || !$_SESSION['userId']) {
    //         session_start();
    //     }
        $cateroryuser = new Category_Users($categoryId , $userId);
        $result = CategoryusersMapper::add($cateroryuser);
        
            // if ($result) {
            //     echo "category followed successfully";
            // } else {
            //     echo "Error follwing Category";
            // }
        }
    
    public function unfollowCategory($userId, $categoryId)
    {
        // if ( !$_SESSION || !$_SESSION['userId']) {
        //     session_start();
        // } 
        $result = CategoryusersMapper::delete($categoryId, $userId);
        // if ($result) {
        //     echo "category unfollowed successfully";
        // } else {
        //     echo "Error unfollwing Category";
        // }
    }
    public function reportCategory($categoryId)
    {
      
        $rep =CategoryMapper::selectSpecificAttr($categoryId, 'id', 'numberOfreports');
        $newrep = $rep + 1;
        $arr = array("numberOfreports" => $newrep);
        $result = CategoryMapper::edit($categoryId, $arr, "id");
        if ($result) {
            echo "category reported successfully";
        } else {
            echo "Error reporting Category";
        }
        
    }
    public function recommendCategory($name, $description, $userId)
    {
        // if (!isset($_SESSION)) {
        //     session_start();
        // }
        $totalrecommendation = $name.": ".$description;
        $arrOfKeyValue = array("suggestedCategory" =>$totalrecommendation);
        $edit =UserMapper::edit($userId, $arrOfKeyValue, "id");
        // if ($edit)
        //     echo "successfull recommendation";
    }
}