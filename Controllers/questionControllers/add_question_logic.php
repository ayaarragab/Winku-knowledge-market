<?php /* 
include_once 'C:\xampp\htdocs\Winku-master\Controllers\questionControllers\questionBuilder.php';
include_once 'questionMapper';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $title = $_POST['title'];
    $body = $_POST['body'];
    $tags = $_POST['tags'];
	//islogged();
	if ($_SESSION && isset($_SESSION['username']) && isset($_SESSION['userId'])) {
        // User is logged in
        $username = $_SESSION['username'];
        $userId = $_SESSION['userId'];	
    }
	echo $title;
	$date = date("Y-m-d");
	// Create an object (assuming your DBController expects an object)
    $question = new Question('ayaragab', $body, $tags ,$subcategoryId,$date , "0", '0', '0', $title);
    
    
    // Insert the object into the database using your DBController
    $result = QuestionMapper::add($question); // Modify this according to your DBController
    
    if ($result) {
        echo "Question added successfully";
		echo $result;
    } else {
        echo "Error adding question";
    }

}*/
// include_once '../controllers/dbControllers.php';
// include_once '../Models/Question.php';
// require_once '../Controllers/userController.php';
// if (isset($_POST['title'])) {
// 	$questionObj = UserController::add_question('ayaragab', $_POST['body'], $_POST['tags'], '0', '0', '0', $_POST['title']);
// }