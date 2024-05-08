<?php
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\subcategoryUser\SubCategory_Users.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\subcategoryUser\SubCategoryUsersMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Models\Subcategory.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\subcategoryControllers\SubCategoryMapper.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\associativeClasses\subcategoryUser\SubCategory_Users.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\associativeClasses\subcategoryUser\SubCategoryUsersMapper.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Models\Subcategory.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\subcategoryControllers\SubCategoryMapper.php';
class UserToSubcategory{
    public function addQuestionToSubcategory($content, $categoryId, $subcategoryId)
    {
        // Add logic to add the question to the specified subcategory
    }

    public function deleteQuestionOfSubcategory($questionId, $categoryId, $subcategoryId)
    {
        // Add logic to delete the question from the specified subcategory
    }
    public function joinSubcategory($subcategoryId, $userId)
    {
        //  if ( $_SESSION || !$_SESSION['username']) {
        //     session_start();
        //   } 
                // $SubCategory_id = SubCategoryMapper::selectSpecificAttr($subcategoryname, 'name', 'id');

                // Create a new subcategory membership for the user
                $subCategoryMembership = new SubCategory_Users($subcategoryId, $userId);

                // Store the subcategory membership in the Subcategoryusers table
                SubCategoryUsersMapper::add($subCategoryMembership); // $subCategoryMembership is an object
        
                // echo "User joined the subcategory successfully."; //display subcategory page
    }
        
    

    public function createSubcategory($subname, $categoryname, $username){
        // if ( $_SESSION || !$_SESSION['username']) {
        //     session_start();
        // }

            $Category_id = CategoryMapper::selectSpecificAttr($categoryname, 'name', 'id');
             // Create a new subcategory for the user
            $subCategory = new Subcategory($subname, $username, intval($Category_id));
            // Store the subcategory in the Subcategoryusers table
            SubCategoryMapper::add($subCategory);
        }
    


    public function leaveSubcategory($subcategoryId, $userId)
    {
        // if ( $_SESSION || !$_SESSION['username']) {
        //     session_start();
        //   }                
                // Remove the user from the subcategory
         SubCategoryUsersMapper::delete($userId, $subcategoryId);
    }
            
        
    public function reportSubcategory($subcategoryname)
    {
            $rep =SubCategoryMapper::selectSpecificAttr($subcategoryname, 'name', 'numberOfreports');
            $newrep = $rep + 1;
            $arr = array("numberOfreports" => $newrep);
            $result = SubCategoryMapper::edit($subcategoryname, $arr, 'name');
            // if ($result) {
            //     echo "subcategory reported successfully";
            // } else {
            //     echo "Error reporting subCategory";
            // }
            
        }
    }

