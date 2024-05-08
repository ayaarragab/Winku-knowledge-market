<?php session_start();
if (!isset($_SESSION['id']) && !isset($_SESSION['adminOrNot'])) {
	header('Location: ..\Views\landing.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>manage users - Bootdey.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">


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


<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    	body{
    background: #edf1f5;
    margin-top:20px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: 0;
}
.btn-circle.btn-lg, .btn-group-lg>.btn-circle.btn {
    width: 50px;
    height: 50px;
    padding: 14px 15px;
    font-size: 18px;
    line-height: 23px;
}
.text-muted {
    color: #8898aa!important;
}
[type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
    cursor: pointer;
}
.btn-circle {
    border-radius: 100%;
    width: 40px;
    height: 40px;
    padding: 10px;
}
.user-table tbody tr .category-select {
    max-width: 150px;
    border-radius: 20px;
}

    </style>
</head>
<body>
<div style="margin-top: -20px;" class="theme-layout">	
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
						<a href="admin_dashboard.php" title="">Home</a>
					</li>
					<li>
						<a href="forum.php" title="">Categroies</a>
					</li>
					<li>
						<a href="profile.php" title="">Profile</a>
					</li>
					<li>
						<a href="add-question.php" title="" style="text-decoration: underline; font-weight: bold; font-size: 1rem;">Add a question</a>
					</li>			
				</ul>
			</nav>
			<nav id="shoppingbag">
				<div>
					<div class="">
						<form method="post">
							<div class="setting-row">
								<span>use night mode</span>
								<input type="checkbox" id="nightmode"/> 
								<label for="nightmode" data-on-label="ON" data-off-label="OFF"></label>
							</div>
							<div class="setting-row">
								<span>Notifications</span>
								<input type="checkbox" id="switch2"/> 
								<label for="switch2" data-on-label="ON" data-off-label="OFF"></label>
							</div>
							<div class="setting-row">
								<span>Notification sound</span>
								<input type="checkbox" id="switch3"/> 
								<label for="switch3" data-on-label="ON" data-off-label="OFF"></label>
							</div>
							<div class="setting-row">
								<span>My profile</span>
								<input type="checkbox" id="switch4"/> 
								<label for="switch4" data-on-label="ON" data-off-label="OFF"></label>
							</div>
							<div class="setting-row">
								<span>Show profile</span>
								<input type="checkbox" id="switch5"/> 
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
				<a title="" href="admin_dashboard.php"><img src="images/logo.png" alt=""></a>
			</div>
			
			<div class="top-area">
				<ul class="main-menu">
					<li>
						<a href="admin-all-questions.php" title="">Questions</a>
					</li>
					<li>
						<a href="admin-all-categories.php" title="">Categroies</a>
					</li>
                    <li>
						<a href="admin-all-users.php" title="">Users</a>
					</li>
					<li>
						<a href="admin-profile.php" title="">Profile</a>
					</li>
				</ul>
				<ul class="setting-area mt-3">
					<li>
						<a href="#" title="Home" data-ripple=""><i class="ti-search"></i></a>
						<div class="searched">
							<form method="post" class="form-search">
								<input type="text" placeholder="Search Friend">
								<button data-ripple><i class="ti-search"></i></button>
							</form>
						</div>
					</li>
					<li>
						<a href="#" title="Notification" data-ripple="">
							<i class="ti-bell"></i><span>20</span>
						</a>
						<div class="dropdowns">
							<span>4 New Notifications</span>
							<ul class="drops-menu">
								<li>
									<a  href="notifications.php" title="">
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
									<a  href="notifications.php" title="">
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
					</li>
					<li><a href="#" title="Languages" data-ripple=""><i class="fa fa-globe"></i></a>
						<div class="dropdowns languages">
							<a href="#" title=""><i class="ti-check"></i>English</a>
							<a href="#" title="">Arabic</a>
							<a href="#" title="">Dutch</a>
							<a href="#" title="">French</a>
						</div>
					</li>
					<li><a href="#" title="logout" style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-top: 0.5px;"><i class="ti-power-off"></i><small>logout</small></a></li>
				</ul>
				<span class="ti-menu main-menu" data-ripple=""></span>
			</div>
		</div><!-- topbar -->
		</div>

<section style="margin-top:20px">
    
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-body d-flex flex-column justify-content-center align-content-center w-100">
<h5 class="card-title text-uppercase mb-0">All users dashboard</h5>
<form id="pdfForm" action="generate_pdf.php" method="post">
    <input type="submit" value="Convert to PDF" class="btn btn-info">
</form>
</div>
<div class="table-responsive">
<table class="table no-wrap user-table mb-0">
<thead>
<tr>
<th scope="col" class="border-0 text-uppercase font-medium pl-4">#</th>
<th scope="col" class="border-0 text-uppercase font-medium">Fullname</th>
<th scope="col" class="border-0 text-uppercase font-medium">username</th>
<th scope="col" class="border-0 text-uppercase font-medium">Email</th>
<th scope="col" class="border-0 text-uppercase font-medium">reputations</th>
<th scope="col" class="border-0 text-uppercase font-medium">Questions</th>
<th scope="col" class="border-0 text-uppercase font-medium">Reports</th>
<th scope="col" class="border-0 text-uppercase font-medium">controll</th>
</tr>
</thead>