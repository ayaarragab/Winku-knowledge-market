<?php
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\UserControllers\userMapper.php';
//require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\UserControllers\userMapper.php';
class adminPrintFormat{
    public static $privilegedUsers;
    public static function viewAllPrivilegedUsers(){
        $privilegedUsers = UserMapper::selectPrivilegedUsers();
        for ($i=0; $i < count($privilegedUsers); $i++) { 
            echo '<li><figure>';
            echo '<img src="'.$privilegedUsers[$i]['profilePhoto'].'" alt=""><span class="status f-away"></span></figure><div class="friendz-meta">';
            echo '<a href="user-profile.php?id='.$privilegedUsers[$i]['id'].'">'.$privilegedUsers[$i]['username'].'</a>';
            echo '</div></li>';
        }
    }   
    public static function viewRecommendedCategories(){
        $privilegedUsers = UserMapper::selectPrivilegedUsers();
    
        foreach ($privilegedUsers as $user) {
            if ($user['suggestedCategory'] == 'no categories suggested yet') {
                continue;
            }
            
            list($name, $description) = explode(':', $user['suggestedCategory']);
            $username = $user['username'];
    
            echo '<li>
            <div class="reco-cat-data-and-icons d-flex justify-content-between">
                <div class="reco-cat-data">
                    <span>' . $name . '</span>
                    <small style="color:#088dcd">' . $username . '</small>
                    <p>' . $description . '</p>
                </div>
                <div class="icons-reco d-flex justify-content-between">
                    <a class="pe-1 pl-1 pb-1 pt-1" style="height:fit-content; text-align:center" href="admin_dashboard.php?function=approveCategory&username=' . $username . '&name=' . urlencode($name) . '&description=' . urlencode($description) . '">Approve<i class="fa-solid fa-check" style="font-size:1.1rem"></i></a>
                    <a class="pe-1 pl-1 pb-1 pt-1" style="height:fit-content; text-align:center" href="admin_dashboard.php?function=discardCategory&username=' . $username . '&name=' . urlencode($name) . '&description=' . urlencode($description) . '">Discard<i class="fa-solid fa-check" style="font-size:1.1rem"></i></a>
                </div>
            </div>
        </li>';    
        }
    }
    
    public static function viewLastRegisteredUsers(){
        $lastRegisteredUsers = UserMapper::selectAllUsers();
        for ($i=count($lastRegisteredUsers) - 1; $i > 0; $i--) { 
            echo '<li><figure>';
            echo '<img src="'.$lastRegisteredUsers[$i]['profilePhoto'].'" alt=""><span class="status f-away"></span></figure><div class="friendz-meta">';
            echo '<a href="user-profile.php?id='.$lastRegisteredUsers[$i]['id'].'">'.$lastRegisteredUsers[$i]['username'].'</a>';
            echo '</div></li>';
        }
    }
}
