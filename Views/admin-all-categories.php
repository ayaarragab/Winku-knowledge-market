<?php
require_once 'assests/admin-header-few-differences.php';
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
                            <a class="addnewforum" style="" href="admin_add_a_category.php" title=""><i class="fa fa-plus"></i> Add a category</a>
						</div>
						<div class="forum-list">
    <h3 style="color: black; font-weight: bold;">Categories</h3>
    <table class="table table-responsive">
        <thead>
            <tr>
                <th scope="col">Categories</th>
                <th scope="col">Subcategories</th>
				<th scope="col">Followers</th>
                <th scope="col">Questions</th>
                <th scope="col">Reports</th>
            </tr>
        </thead>
        <tbody>
			<?php
			if (isset($_GET['function']) && isset($_GET['categoryName'])) {
				if ($_GET['function'] == 'deleteCategory') {
					$admin = unserialize($_SESSION['admin']);
					$admin->AdminToCategory->deleteCategory($_GET['categoryName']);
				}
			}
			 ?>
            <!-- Repeat this block for each category -->
            <tr>
			<?php
				$categories = CategoryMapper::selectall();
				if ($categories) {
					for ($i=0; $i < count($categories); $i++) { 
						echo '<tr>';
						echo '<td>';
						echo '<div class="catName-and-follow-button d-flex m-0 p-0">';
						echo '<a href="subcategories.php?categoryId='.$categories[$i]['id'].'">'.$categories[$i]['name'].'</a>';
						echo '<a class="addnewforum p-1 follow-cat"  href="admin-all-categories.php?function=deleteCategory&categoryName='.$categories[$i]['name'].'" title=""><span style="color:white">delete</span></a>';
						echo '<p class="p-0 m-0" >'.$categories[$i]['description'].'</p>';
						echo '</td>';
						echo '<td>'.$categories[$i]['numOfSubcategories'].'</td>';
						echo '<td>'.CategoryusersMapper::getNumFollowersPerCategory($categories[$i]['id']).'</td>';
						echo '<td>'.$categories[$i]['numberOfQuestions'].'</td>';
						echo '<td>'.$categories[$i]['numberOfreports'].'</td>';
						echo '</tr>';
			}		}
				?>
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
			<a href="#" title="">Sign up</a>
		</div>
	</section>
	<?php
include('assests/footer.php')
?>	