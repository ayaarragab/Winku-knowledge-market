<?php
session_start();
include_once('assests/header.php');
require_once '../Controllers/UserControllers/userMapper.php';
require_once '../Controllers/categoryControllers/CategoryMapper.php';
require_once '../Models/User.php';
require_once '../Controllers/associativeClasses/categoryUser/Category_Users.php';
require_once '../Controllers/associativeClasses/categoryUser/categoryusersMapper.php';
?>	
	<section>
		<div class="gap100">
			<div class="container">
				<div class="row">
					<div class="col-lg-9">
						<div class="forum-warper">
							<?php if (isset($_SESSION['id'])) {
								$user = UserMapper::selectObjectAsArray($_SESSION['id'], 'id');
								if ($user[0]['privilgedOrNot'] == 1) {
									echo '<a class="addnewforum" style="" href="recommend_category.php?id="'.$user[0]['id'].'" title=""><i class="fa fa-plus"></i> Recommend a new category</a>';
								}
								else {
									echo '<a class="addnewforum" style="" href="be_a_privileged_user.php?id="'.$user[0]['id'].'"title=""><i class="fa fa-plus"></i> Be a priviliged user</a>';
								}
							}?>
							
						</div>
						<div class="forum-list">
    <h3 style="color: black; font-weight: bold;">Categories</h3>
    <table class="table table-responsive">
        <thead>
            <tr>
                <th scope="col">Categories</th>
                <th scope="col">Subcategories</th>
                <th scope="col">Questions</th>
				<th scope="col">Followers</th>
            </tr>
        </thead>
        <tbody>
            <!-- Repeat this block for each category -->
            
					<?php
					if (isset($_SESSION['id'])) {
						$user = UserMapper::retrieveObject('id',$_SESSION['id']);
						if(isset($_GET['function']) && isset($_GET['categoryId'])) {
							// Get the value of the 'function' parameter
							$functionToExecute = $_GET['function'];
						
							if ($functionToExecute == 'followCategory') {
							   $user->userToCategory->followCategory($_GET['categoryId'], $_SESSION['id']);
							}
							elseif ($functionToExecute == 'unfollowCategory') {
								$user->userToCategory->unfollowCategory($_GET['categoryId'], $_SESSION['id']);
							}
						}
						$categories = CategoryMapper::selectall();
						if ($categories) {
							for ($i=0; $i < count($categories); $i++) { 
								echo '<tr>';
								echo '<td>';
								echo '<div class="catName-and-follow-button d-flex m-0 p-0">';
								echo '<a href="subcategories.php?categoryId='.$categories[$i]['id'].'">'.$categories[$i]['name'].'</a>';

								if (CategoryusersMapper::isFollowed($_SESSION['id'], $categories[$i]['id'])) {
									echo '<a class="addnewforum me-2  p-1 unfollow-cat" style="margin-right:20px" href="categories.php?categoryId=';
									echo $categories[$i]['id'].'&function=unfollowCategory">';
									echo '<span style="color:white">unfollow</span></a></div>';
								}
								else {
									echo '<a class="addnewforum d-block p-1 follow-cat" style="margin-right:10px" href="categories.php?categoryId=';
									echo $categories[$i]['id'].'&function=followCategory">';
									echo '<span style="color:white">Follow</span></a></div>';								
							}
								echo '<p class="p-0 m-0" >'.$categories[$i]['description'].'</p>';
								echo '</td>';
								echo '<td>'.$categories[$i]['numOfSubcategories'].'</td>';
								echo '<td>'.$categories[$i]['numberOfQuestions'].'</td>';
								echo '<td>'.CategoryusersMapper::getNumFollowersPerCategory($categories[$i]['id']).'</td>';
								echo '</tr>';
						}
						}
						else{
							echo "Categories are deleted currently!";
						}
					}
					else {
						$categories = CategoryMapper::selectall();
						if ($categories) {
							for ($i=0; $i < count($categories); $i++) { 
								echo '<tr>';
								echo '<td>';
								echo '<div class="catName-and-follow-button d-flex m-0 p-0">';
								echo '<a href="subcategories.php?categoryId='.$categories[$i]['id'].'">'.$categories[$i]['name'].'</a>';

								echo '<a class="addnewforum d-block p-1 follow-cat" style="margin-right:10px" href="landing.php">';
								echo '<span style="color:white">Follow</span></a></div>';								
	
								echo '<p class="p-0 m-0" >'.$categories[$i]['description'].'</p>';
								echo '</td>';
								echo '<td>'.$categories[$i]['numOfSubcategories'].'</td>';
								echo '<td>'.$categories[$i]['numberOfQuestions'].'</td>';
								echo '<td>'.CategoryusersMapper::getNumFollowersPerCategory($categories[$i]['id']).'</td>';
								echo '</tr>';
						}						}
					}
					 ?>
            <!-- End of category block -->
            <!-- Repeat similar blocks for other categories -->
        </tbody>
    </table>
						</div>

					</div>
					<div class="col-lg-3">
						<aside class="sidebar full-style">
							<div class="widget" style="display: none;">
								<div class="singin">
									<h4 class="widget-title">Login</h4>
									<form method="post">
										<input type="text" placeholder="User Name">
										<input type="password" placeholder="Password">
										<div class="checkbox">
										  <label>
											<input type="checkbox" checked="checked"><i class="check-box"></i>
											 <span>Remember Me</span>
										  </label>
										</div>
										<button type="submit">Log In</button>
									</form>
								</div>	
							</div>
							<div class="widget">
								<h4 class="widget-title">Forum Statistics</h4>
								<ul class="forum-static">
									<li>
										<a href="#" title="">Categories</a>
										<span>13</span>
									</li>
									<li>
										<a href="#" title="">Users</a>
										<span>50</span>
									</li>
									<li>
										<a href="#" title="">Subcategories</a>
										<span>14</span>
									</li>
									<li>
										<a href="#" title="">Questions</a>
										<span>32</span>
									</li>
									<li>
										<a href="#" title="">Tags</a>
										<span>50</span>
									</li>
								</ul>
							</div>
							<div class="widget">
								<h4 class="widget-title">Recent Topics</h4>
								<ul class="recent-topics">
									<li>
										<a href="#" title="">The new Goddess of War trailer was launched at E3!</a>
										<span>2 hours, 16 minutes ago</span>
										<i>The Community</i>
									</li>
									<li>
										<a href="#" title="">The new Goddess of War trailer was launched at E3!</a>
										<span>2 hours, 16 minutes ago</span>
										<i>The Community</i>
									</li>
									<li>
										<a href="#" title="">The new Goddess of War trailer was launched at E3!</a>
										<span>2 hours, 16 minutes ago</span>
										<i>The Community</i>
									</li>
								</ul>
							</div>
							<div class="widget">
								<h4 class="widget-title">Featured Topics</h4>
								<ul class="feature-topics">
									<li>
										<i class="fa fa-star"></i>
										<a href="#" title="">What is your favourit season in summer?</a>
										<span>2 hours, 16 minutes ago</span>
									</li>
									<li>
										<i class="fa fa-star"></i>
										<a href="#" title="">The new Goddess of War trailer was launched at E3!</a>
										<span>2 hours, 16 minutes ago</span>
									</li>
									<li>
										<i class="fa fa-star"></i>
										<a href="#" title="">Summer is Coming! Picnic in the east boulevard park</a>
										<span>2 hours, 16 minutes ago</span>
									</li>
								</ul>
							</div>
						</aside>	
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section>
		<div class="getquot-baner">
			<span>Want to join our awesome forum and start interacting with others?</span>
			<a href="landing.php" title="">Sign up</a>
		</div>
	</section>
	<?php
include('assests/footer.php')
?>	