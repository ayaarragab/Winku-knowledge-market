<?php
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\subcategoryControllers\SubCategoryMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\categoryControllers\CategoryMapper.php';
require_once '../Controllers/UserControllers/userMapper.php'; 
//require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\subcategoryControllers\SubCategoryMapper.php';
//require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\categoryControllers\CategoryMapper.php';
require_once '../Models/Category.php';

class adminToCategory{


    public function addCategory($Categoryname,$description){
        // if ( $_SESSION || !$_SESSION['username']) {
        //     session_start();
        // }
            $category = new Category($Categoryname, 0, 0, 0 ,$description);
            $result = CategoryMapper::add($category);
        //     $Category_table = CategoryMapper::selectall();

        //     if ($result) { 
        //         return $Category_table ;
              
        //     }
        //  else {
        //         echo "Error adding Category";
        //     }
        }
        
    
    public function deleteCategory($categoryname){
            // delete sub first
            /*
         $subcategories = SubCategoryMapper::selectObjectAsArray($categoryId, 'Category_id');
         if ($subcategories !== false) {
             foreach ($subcategories as $subcategory) {
                $subcategoryId = $subcategory['id'];
                SubCategoryMapper::delete($subcategoryId, 'id');
                }
            }*/
            
            // delete category
            $result = CategoryMapper::delete($categoryname, 'name');
        
            // if ($result) {
            //     echo "Category deleted successfully";
            // } else {
            //     echo "Error deleting Category";
            // }
        }
    public function discardCategory($username){
        UserMapper::edit($username, array('suggestedCategory' => 'no categories suggested yet'), 'username');
    }
    }