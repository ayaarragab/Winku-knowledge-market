<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<title>Winku Social Network Toolkit</title>
	<link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">
	<script src="js/jquery-3.7.1.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<link rel="stylesheet" href="css/main.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/mine.css">
	<link rel="stylesheet" href="css/color.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/all.min.css">

</head>
<body>
	<!--<div class="se-pre-con"></div>-->
	<div class="theme-layout">
		<div class="responsive-header">
			<div class="mh-head first Sticky">
				<span class="mh-btns-left">
					<a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
				</span>
				<span class="mh-text">
					<a href="index.php" title=""><img src="images/logo2.png" alt=""></a>
				</span>
				<span class="mh-btns-right">
					<a class="fa fa-sliders" href="#shoppingbag"></a>
				</span>
			</div>
			<div class="mh-head second">
				<form class="mh-form">
					<input placeholder="search" />
					<a href="#/" class="fa fa-search"></a>
				</form>
			</div>
			<nav id="menu" class="res-menu">
				<ul>
					<li>
						<a href="index.php" title="">Home</a>
					</li>
					<li>
						<a href="forum.php" title="">Categroies</a>
					</li>
					<li>
					<a href="userProfile.php?id=<?php echo $_SESSION['id'];?>" title="">Profile</a>
					</li>
					<li>
						<a href="add-question.php" title=""
							style="text-decoration: underline; font-weight: bold; font-size: 1rem;">Add a question</a>
					</li>
				</ul>
			</nav>
			<nav id="shoppingbag">
				<div>
					<div class="">
						<form method="post">
							<div class="setting-row">
								<span>use night mode</span>
								<input type="checkbox" id="nightmode" />
								<label for="nightmode" data-on-label="ON" data-off-label="OFF"></label>
							</div>
							<div class="setting-row">
								<span>Notifications</span>
								<input type="checkbox" id="switch2" />
								<label for="switch2" data-on-label="ON" data-off-label="OFF"></label>
							</div>
							<div class="setting-row">
								<span>Notification sound</span>
								<input type="checkbox" id="switch3" />
								<label for="switch3" data-on-label="ON" data-off-label="OFF"></label>
							</div>
							<div class="setting-row">
								<span>My profile</span>
								<input type="checkbox" id="switch4" />
								<label for="switch4" data-on-label="ON" data-off-label="OFF"></label>
							</div>
							<div class="setting-row">
								<span>Show profile</span>
								<input type="checkbox" id="switch5" />
								<label for="switch5" data-on-label="ON" data-off-label="OFF"></label>
							</div>
						</form>
						<h4 class="panel-title">Account Setting</h4>
						<form method="post">
							<div class="setting-row">
								<span>Sub users</span>
								<input type="checkbox" id="switch6" />
								<label for="switch6" data-on-label="ON" data-off-label="OFF"></label>
							</div>
							<div class="setting-row">
								<span>personal account</span>
								<input type="checkbox" id="switch7" />
								<label for="switch7" data-on-label="ON" data-off-label="OFF"></label>
							</div>
							<div class="setting-row">
								<span>Business account</span>
								<input type="checkbox" id="switch8" />
								<label for="switch8" data-on-label="ON" data-off-label="OFF"></label>
							</div>
							<div class="setting-row">
								<span>Show me online</span>
								<input type="checkbox" id="switch9" />
								<label for="switch9" data-on-label="ON" data-off-label="OFF"></label>
							</div>
							<div class="setting-row">
								<span>Delete history</span>
								<input type="checkbox" id="switch10" />
								<label for="switch10" data-on-label="ON" data-off-label="OFF"></label>
							</div>
							<div class="setting-row">
								<span>Expose author name</span>
								<input type="checkbox" id="switch11" />
								<label for="switch11" data-on-label="ON" data-off-label="OFF"></label>
							</div>
						</form>
					</div>
				</div>
			</nav>
		</div><!-- responsive header (نفس الحجات الي فالhome بس دا جزء الresponsive مش تكرار)-->
		<div class="topbar stick">
			<div class="container">
				<div class="logo">
					<a title="" href="index.php"><img src="images/logo.png" alt=""></a>
				</div>

				<div class="top-area">
					<ul class="main-menu">
						<li>
							<a href="index.php" title="">Home</a>
						</li>
						<li>
							<a href="categories.php" title="">Categroies</a>
						</li>
						<li>
							<?php
							if (isset($_SESSION['id'])) {
								echo '<a href="userProfile.php?id='.$_SESSION['id'].'" title="">Profile</a>';
								
							}
							else{
								echo '<a href="landing.php" title="">Log in now!</a>';
							}
							 ?>
						</li>
						<li>
							<a href="add-question.php" title=""
								style="text-decoration: underline; font-weight: bold; font-size: 1rem;">Add a
								question</a>
						</li>
					</ul>
					<ul class="setting-area mt-3 d-flex">
						<li>
							<a href="#" title="Home" data-ripple=""><i class="ti-search"></i></a>
							<div class="searched">
								<form method="post" class="form-search">
									<input type="text" placeholder="Search Friend">
									<button data-ripple><i class="ti-search"></i></button>
								</form>
							</div>
						</li>
						<?php
						if (isset($_SESSION['id'])) {
							echo '						<li>
							<a href="#" title="Notification" data-ripple="">
								<i class="ti-bell"></i><span>20</span>
							</a>
							<div class="dropdowns">
								<span>4 New Notifications</span>
								<ul class="drops-menu">
									<li>
										<a href="notifications.php" title="">
											<img src="images/resources/thumb-1.jpg" alt="">
											<div class="mesg-meta">
												<h6>sarah Loren</h6>
												<span>Hi, how r u dear .?</span>
												<i>2 min ago</i>
											</div>
										</a>
										<span class="tag green">New</span>
									</li>
									<li>
										<a href="notifications.php" title="">
											<img src="images/resources/thumb-2.jpg" alt="">
											<div class="mesg-meta">
												<h6>Jhon doe</h6>
												<span>Hi, how r u dear .?</span>
												<i>2 min ago</i>
											</div>
										</a>
										<span class="tag red">Reply</span>
									</li>
									<li>
										<a href="notifications.php" title="">
											<img src="images/resources/thumb-3.jpg" alt="">
											<div class="mesg-meta">
												<h6>Andrew</h6>
												<span>Hi, how r u dear .?</span>
												<i>2 min ago</i>
											</div>
										</a>
										<span class="tag blue">Unseen</span>
									</li>
									<li>
										<a href="notifications.php" title="">
											<img src="images/resources/thumb-4.jpg" alt="">
											<div class="mesg-meta">
												<h6>Tom cruse</h6>
												<span>Hi, how r u dear .?</span>
												<i>2 min ago</i>
											</div>
										</a>
										<span class="tag">New</span>
									</li>
									<li>
										<a href="notifications.php" title="">
											<img src="images/resources/thumb-5.jpg" alt="">
											<div class="mesg-meta">
												<h6>Amy</h6>
												<span>Hi, how r u dear .?</span>
												<i>2 min ago</i>
											</div>
										</a>
										<span class="tag">New</span>
									</li>
								</ul>
								<a href="notifications.php" title="" class="more-mesg">view more</a>
							</div>
						</li>
						<li>
							<a href="#" title="Messages" data-ripple=""><i class="ti-comment"></i><span>12</span></a>
							<div class="dropdowns">
								<span>5 New Messages</span>
								<ul class="drops-menu">
									<li>
										<a href="notifications.php" title="">
											<img src="images/resources/thumb-1.jpg" alt="">
											<div class="mesg-meta">
												<h6>sarah Loren</h6>
												<span>Hi, how r u dear .?</span>
												<i>2 min ago</i>
											</div>
										</a>
										<span class="tag green">New</span>
									</li>
									<li>
										<a href="notifications.php" title="">
											<img src="images/resources/thumb-2.jpg" alt="">
											<div class="mesg-meta">
												<h6>Jhon doe</h6>
												<span>Hi, how r u dear .?</span>
												<i>2 min ago</i>
											</div>
										</a>
										<span class="tag red">Reply</span>
									</li>
									<li>
										<a href="notifications.php" title="">
											<img src="images/resources/thumb-3.jpg" alt="">
											<div class="mesg-meta">
												<h6>Andrew</h6>
												<span>Hi, how r u dear .?</span>
												<i>2 min ago</i>
											</div>
										</a>
										<span class="tag blue">Unseen</span>
									</li>
									<li>
										<a href="notifications.php" title="">
											<img src="images/resources/thumb-4.jpg" alt="">
											<div class="mesg-meta">
												<h6>Tom cruse</h6>
												<span>Hi, how r u dear .?</span>
												<i>2 min ago</i>
											</div>
										</a>
										<span class="tag">New</span>
									</li>
									<li>
										<a href="notifications.php" title="">
											<img src="images/resources/thumb-5.jpg" alt="">
											<div class="mesg-meta">
												<h6>Amy</h6>
												<span>Hi, how r u dear .?</span>
												<i>2 min ago</i>
											</div>
										</a>
										<span class="tag">New</span>
									</li>
								</ul>
								<a href="messages.php" title="" class="more-mesg">view more</a>
							</div>
						</li>';
						}
						 ?>
					<?php require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Views\assests\logout_part.php' ?>
					<span style="margin-left: 100px;" class="ti-menu main-menu" data-ripple=""></span>

					</ul>
				</div>
			</div><!-- topbar -->
		</div>