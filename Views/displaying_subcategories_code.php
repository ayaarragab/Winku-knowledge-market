<?php
										if (isset($_GET['function']) && $_GET['function'] == 'deleteSubCategory') {
											if(isset($_GET['categoryName'])){
												$admin = new Admin('admin', 'admin', 'admin');
												$admin->AdminToSubcategory->deleteSubCategory($_GET['subcategoryName'], $_GET['categoryName']);
											}
											}
										if (isset($_GET['adminOrNot'])) {
												$subcategories = SubCategoryMapper::getSubcategoriesInCategory($_GET['categoryId']);
												if($subcategories){
												for ($i=0; $i < count($subcategories); $i++) { 
													echo '<tr>';
													echo '<td>';
													echo '<div class="catName-and-follow-button d-flex m-0 p-0">';
													echo '<a href="subcategory.php?subcategoryId='.$subcategories[$i]['id'].'&subcategoryName='.$subcategories[$i]['name'].'">'.$subcategories[$i]['name'].'</a>';
														
													echo '<a class="addnewforum d-block p-1 follow-cat" style="margin-left:20px" href="subcategories.php?adminOrNot='.$_GET['adminOrNot'].'&subcategoryName=';
													echo $subcategories[$i]['name'].'&categoryId='.$subcategories[$i]['categoryId'].'&function=deleteSubCategory&subcategoryId='.$subcategories[$i]['id'].'">';
													echo '<span style="color:white">delete</span></a></div>';
													
													echo '<div class="icon-and-starter d-flex"><i class="fa fa-comments"></i><h6 class="m-0 p-0" >Started by: <a href="#" title="">';
													echo $subcategories[$i]['ownerUsername'].'</a></h6></div>';
													echo '</td>';
													echo '<td>'.$subcategories[$i]['numberOfQuestions'].'</td>';
													echo '<td>'.$subcategories[$i]['numberOfAnswers'].'</td>';
													echo '<td>'.$subcategories[$i]['numberOfreports'].'</td>';
													echo '<td>'.SubCategoryUsersMapper::getNumMembersPerSubcategory($subcategories[$i]['id']).'</td>';
													echo '</tr>';
											}
										}
											// echo '<a class="addnewforum p-1 follow-cat"  href="execute.php?function=&categoryId=&categoryName=" title=""><span style="color:white">Delete</span></a>';
										}
										elseif (isset($_SESSION['id'])){
											if (isset($_SESSION['id'])) {
												$user = UserMapper::retrieveObject('id', $_SESSION['id']);
												if(isset($_GET['function']) && (isset($_GET['subcategoryId']) || isset($_GET['subcategoryName']))) {
													// Get the value of the 'function' parameter
													$functionToExecute = $_GET['function'];
												
													if ($functionToExecute == 'joinSubcategory') {
													   $user->userToSubcategory->joinSubcategory($_GET['subcategoryId'], $_SESSION['id']);
													}
													elseif ($functionToExecute == 'leaveSubcategory') {
														$user->userToSubcategory->leaveSubcategory($_GET['subcategoryId'], $_SESSION['id']);
													}
													elseif ($functionToExecute == 'reportSubcategory') {
														if (SubCategoryUsersMapper::isJoined($_SESSION['id'], $_GET['subcategoryId'])) {
															$user->userToSubcategory->reportSubcategory($_GET['subcategoryName']);
														}
														else {
															echo "You cannot report it as you did not join it";
														}
													}
												}
											}
												if (isset($_GET['categoryId'])) {
													$subcategories = SubCategoryMapper::getSubcategoriesInCategory($_GET['categoryId']);
													if($subcategories!==false)
													for ($i=0; $i < count($subcategories); $i++) { 
															echo '<tr>';
															echo '<td>';
															echo '<div class="catName-and-follow-button d-flex m-0 p-0">';
															echo '<a href="subcategory.php?subcategoryId='.$subcategories[$i]['id'].'&subcategoryName='.$subcategories[$i]['name'].'">'.$subcategories[$i]['name'].'</a>';
															if (SubCategoryUsersMapper::isJoined($_SESSION['id'], $subcategories[$i]['id'])) {
																echo '<a class="addnewforum me-2  p-1 unfollow-cat" style="margin-left:20px" href="subcategories.php?subcategoryId=';
																echo $subcategories[$i]['id'].'&function=leaveSubcategory&categoryId='.$subcategories[$i]['categoryId'].'">';
																echo '<span style="color:white">Leave</span></a>';
															}
															else {
																echo '<a class="addnewforum d-block p-1 follow-cat" style="margin-left:20px" href="subcategories.php?subcategoryId=';
																echo $subcategories[$i]['id'].'&function=joinSubcategory&categoryId='.$subcategories[$i]['categoryId'].'">';
																echo '<span style="color:white">Join</span></a>';								
																}
	
																// report button
																echo '<a class="addnewforum d-block p-1 follow-cat" style="margin-left:20px" href="subcategories.php?subcategoryName=';
																echo $subcategories[$i]['name'].'&function=reportSubcategory&subcategoryId='.$subcategories[$i]['id'].'&categoryId='.$subcategories[$i]['categoryId'].'">';
																echo '<span style="color:white">Report</span></a></div>';
															echo '<div class="icon-and-starter d-flex"><i class="fa fa-comments"></i><h6 class="m-0 p-0" >Started by: <a href="#" title="">';
															echo $subcategories[$i]['ownerUsername'].'</a></h6></div>';
															echo '</td>';
															echo '<td>'.$subcategories[$i]['numberOfQuestions'].'</td>';
															echo '<td>'.$subcategories[$i]['numberOfAnswers'].'</td>';
															echo '<td>'.SubCategoryUsersMapper::getNumMembersPerSubcategory($subcategories[$i]['id']).'</td>';
															echo '</tr>';
													}
												}
										} 
