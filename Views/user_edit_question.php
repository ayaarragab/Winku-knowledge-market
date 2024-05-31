<?php
session_start();
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\categoryUser\categoryusersMapper.php';
require_once 'assests/header.php'; 
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\subcategoryUser\SubCategoryUsersMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\subcategoryControllers\SubCategoryMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\questionControllers\questionMapper.php';
if ($_GET['questionId']) {
    $question = QuestionMapper::selectObjectAsArray($_GET['questionId'], 'id');
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $user = unserialize($_SESSION['user']);
    $newValues = array();
    $newValues['title'] = $_POST['title'];
    $newValues['body'] = $_POST['body'];
    $newValues['tags'] = $_POST['tags'];
	$newValues['subcategoryId'] = intval($_POST['subcategoryId']);
	QuestionMapper::edit($_GET['questionId'], $newValues, 'id');
    $success = 1;
}
?>
	<section>
			<div class="gap gray-bg">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="row" id="page-contents">
								<div class="col-lg-3">
									<aside class="sidebar static">
										<div class="widget">
											<?php require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Views\followed_categories_or_all_categories.php' ?>
										</div><!-- Shortcuts -->										
									</aside>
								</div><!-- sidebar -->
								<div class="col-lg-6 ask">
                                    <h3 style="color: black; font-weight: bold;" >Edit your question</h3>
									<div class="central-meta">
										<div class="new-postbox">
											<div class="newpst-input">
												<form action="" method="POST">
                                                    <h5 style="color: black; font-weight: bold;">Edit the question title</h5>
													<textarea name="title" rows="1" style="font-size: large;" placeholder="e.g. What are the princiles of industry today?"><?php echo $question[0]['title'] ?></textarea>
                                                    <h5 style="color: black; font-weight: bold;" >Edit the question body</h5>
													<textarea  name="body" rows="4" style="font-size: large;" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt molestiae temporibus, earum nihil dolorum odio illo. Blanditiis eligendi ipsum quam sequi corrupti, est expedita explicabo aliquam, porro qui repudiandae minus."><?php echo $question[0]['body'] ?></textarea>
													<div class="attachments">
														<ul>
															<li>
																<i class="fa fa-image"></i>
																<label class="fileContainer">
																	<input type="file">
																</label>
															</li>
														</ul>
													</div>
													<h5 style="color: black; font-weight: bold;" >Tags</h5>
													<textarea name="tags" rows="1" style="font-size: large;" placeholder="e.g. #web #python #oop"><?php echo $question[0]['tags'] ?></textarea>
													<h5 style="color: black; font-weight: bold;">Edit Subcategory</h5>
													<select name="subcategoryId">
													<?php
													$subcategories = SubCategoryUsersMapper::getUserJoinedSubategories($_SESSION['id']);
                                                    if ($subcategories) {
                                                        foreach ($subcategories as $subcategory) {
                                                            if ($subcategory['subcategoryId'] == $question['subcategoryId']) {
                                                                echo '<option value=' . $subcategory['id'] . '" selected>' . $subcategory['name'] . '</option>';
                                                                continue;
                                                            }
                                                            echo '<option value=' . $subcategory['id'] . '">' . $subcategory['name'] . '</option>';
                                                        }      
                                                        echo '<option value="">Not to specific subcategory</option>';                                             
                                                    }
                                                    else{
                                                        echo '<option value="">Not to specific subcategory</option>';
                                                    }
														?>	
														<!-- <option value="1">Normal Question</option>
														<option value="2">Mobile App Development</option>
														<option value="3">Web Development</option> -->
														<!-- Add more options for other subcategories -->
													</select>
                                                    <button style="border-radius: 10px;" name="submit" class="mt-4" type="submit">Edit</button>
												</form>
											</div>
										</div>
									</div><!-- add post new box -->
								</div>
								<div class="col-lg-3"></div>
								</div><!-- centerl meta -->
							</div>	
						</div>
					</div>
			</div>
	
	</section>
<?php
include('assests/footer.php')
?>