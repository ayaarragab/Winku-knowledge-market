<?php
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\associativeClasses\userFollower\userFollower.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\Mapper\mapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\userFollower\userFollower.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\Mapper\mapper.php';

class UserToUser{
    public function reportUser($username)
    {
        UserControllerHelper::incrementDataDB($username,  'username','numberOfReport');
    }

    public function followUser($id)
    {
        UserControllerHelper::incrementData($_SESSION['id'], 'id', 'numFollowings');
        UserControllerHelper::incrementDataDB($id,'id','numFollowers');
        $userfollower = new UserFollower($_SESSION['id'], $id);// implement retrieve by username
        $adding = UserMapper::add($userfollower);
        return $adding;
    }
    public function unfollowUser($id)
    {
        UserControllerHelper::decreaseData($_SESSION['id'], 'id', 'numFollowings');
        UserControllerHelper::decreaseDataDB($id,  'id','numFollowers');
        userfollowermapper::deletesAsociationClass($id,'followerId',$_SESSION['id'],'userId');

    }
    public static function getUserFollowers($id)
    {
        $result =userfollowermapper::selectObjectAsArray($id,'followerId');
        foreach ($result as $key => $value) {
            $followers=$result[$key][$value];
        }
        return $followers;
    }

    public static function getUserFollowings($id)
    {
        $result =userfollowermapper::selectObjectAsArray($id,'$userId');
        foreach ($result as $key => $value) {
            $followings=$result[$key][$value];
        }
        return $followings;
    }


    
}
