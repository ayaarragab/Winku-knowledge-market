<?php
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\associativeClasses\userFollower\userFollower.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\Mapper\mapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\userFollower\userFollower.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\Mapper\mapper.php';
require_once '../Controllers/questionControllers/questionToUser.php';
require_once 'userControllersHelper.php';
class UserToUser{
    public static function reportUser($username)
    {
        UserControllerHelper::incrementDataDB($username,  'username','numberOfReports');
    }

    public static function followUser($id)
    {
        UserControllerHelper::incrementData($_SESSION['id'], 'id', 'numFollowings');
        $userfollower = new UserFollower($_SESSION['id'], $id);
        print_r($userfollower);
        $adding = userfollowermapper::add($userfollower);
        return $adding;
    }
    public static function unfollowUser($id)
    {
        if(userfollowermapper::searchAttributeWithOther($_SESSION['id'],'userId',$id,'followerId')){
            UserControllerHelper::decreaseData($_SESSION['id'], 'id', 'numFollowings');
            userfollowermapper::deletesAsociationClass($_SESSION['id'],'userId',$id,'followerId');
        }

    }
    public static function removefollowUser($id)
    {
        if(userfollowermapper::searchAttributeWithOther($id,'userId',$_SESSION['id'],'followerId')){
            UserControllerHelper::decreaseData($_SESSION['id'], 'id', 'numFollowers');
            userfollowermapper::deletesAsociationClass($id,'userId',$_SESSION['id'],'followerId');
        }
    }
    public static function getUserFollowers($id)
    {
        $result =userfollowermapper::selectObjectAsArray($id,'followerId');
        if($result){
            foreach ($result as $key => $value) {
                $objFollower=Usermapper::selectObjectAsArray($value['userId'],'id');
                $followers[$key]=$objFollower[0];
            }
            return $followers;
        }else{
            return false;
        }
    }

    public static function getUserFollowings($id)
    {
        $result =userfollowermapper::selectObjectAsArray($id,'userId');
        if($result){
            foreach ($result as $key => $value) {
                $objFollowing=Usermapper::selectObjectAsArray($value['followerId'],'id');
                $followings[$key]=$objFollowing[0];
            }
            return $followings;
        }else{
            return false;
        }
        
    }

    public static function viewFollowings($id){
        $followings=self::getUserFollowings($id);
        if($followings){
        for($i=count($followings)-1;$i>=0;$i--)
        {
        ?>
        <li>
            <div class="nearly-pepls">
                <figure>
                    <a href="<?php echo $followings[$i]['profilePhoto']; ?>" title=""><img src="<?php echo $followings[$i]['profilePhoto']; ?>" alt=""></a>
                </figure>
                <div class="pepl-info">
                    <h4><a href="userProfile.php?id=<?php echo $followings[$i]['id']?>" title=""><?php echo $followings[$i]['username']; ?></a></h4>
                    <span>ftv model</span>
                    <?php if($_GET['id']==$_SESSION['id']){?>
                        <form method ="post" action ="user-followings.php?id=<?php echo $_SESSION['id']; ?>">
                        <input type="hidden" name="id" value="<?php echo $followings[$i]['id']; ?>">
                        <button name="unfollow" class="add-butn more-action" type="submit" >Unfollow</button>
                        </form>
                    <?php }?>
                    <!-- <a href="#" title="" class="add-butn more-action" data-ripple="">Unfollow</a> -->
                    <!-- <a href="#" title="" class="add-butn" data-ripple="">Confirm</a> -->
                </div>
            </div>
        </li>
        <?php
        }
        }

    }
    public static function viewFollowers($id){
        $followers=self::getUserFollowers($id);
        if($followers){
        for($i=count($followers)-1;$i>=0;$i--)
        {
        ?>
        <li>
            <div class="nearly-pepls">
                <figure>
                    <a href="<?php echo $followers[$i]['profilePhoto']; ?>" title=""><img src="<?php echo $followers[$i]['profilePhoto']; ?>" alt=""></a>
                </figure>
                <div class="pepl-info">
                    <h4><a href="userProfile.php?id=<?php echo $_SESSION['id']; ?>" title=""><?php echo $followers[$i]['username']; ?></a></h4>
                    <span>ftv model</span>
                    <?php if($_GET['id']==$_SESSION['id']){?>
                        <form method ="post" action ="user-followers.php?id=<?php echo $_SESSION['id']; ?>">
                        <input type="hidden" name="id" value="<?php echo $followers[$i]['id']; ?>">
                        <button name="RemoveFollower" class="add-butn more-action" type="submit" >Remove Follower</button>
                        </form>
                    <?php }?>
                    <!-- <a href="#" title="" class="add-butn more-action" data-ripple="">Unfollow</a> -->
                    <!-- <a href="#" title="" class="add-butn" data-ripple="">Confirm</a> -->
                </div>
            </div>
        </li>
        <?php
        }
        }

    }
    public function pushNotification($userid)
    {
            $messege="You have new follower".$_SESSION['username'];
            //$notification =new Notification($messege,$userid);
            //NotificationMapper::add($notification);
        }
    
        public function pullNotification()
        {
            //NotificationMapper::selectNotification($_SESSION['id']);
    
        }

}

?>
