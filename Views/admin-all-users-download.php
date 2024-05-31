<?php
require_once 'assests/admin-all-users-header.php';
require_once '../Controllers/UserControllers/userMapper.php';
require_once '../Controllers/adminControllers/adminToUsers.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>manage users - Bootdey.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<section style="margin-top:20px">
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <div class="card">
    <div class="card-body d-flex flex-column justify-content-center align-content-center w-100">
    <h5 class="card-title text-uppercase mb-0">All users dashboard</h5>
    <form id="pdfForm" action="generate_pdf.php" method="post">
        <input type="submit" value="Convert to PDF" class="btn btn-danger">
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
    <tbody>
	<?php
		$users = UserMapper::selectAllUsers();
		for ($i=0; $i < count($users); $i++) { 
			echo '<tr>';
			echo '<td>'.$users[$i]['id'].'</td>';
			echo '<td><h5 class="font-medium mb-0">'.$users[$i]['fullName'].'</h5>';
			echo '<span class="text-muted">'.$users[$i]['country'].'</span></td>';
			echo '<td><span class="text-muted">'.$users[$i]['username'].'</span></td>';
			echo '<td><span class="text-muted">'.$users[$i]['email'].'</span></td>';
			echo '<td><span class="text-muted">'.$users[$i]['reputations'].'</span></td>';
			echo '<td><span class="text-muted">'.$users[$i]['numQuestions'].'</span></td>';
			echo '<td><span class="text-muted">'.$users[$i]['numberOfReports'].'</span></td>';
			echo '<td><a href="admin-all-users.php?function=deleteUser&userId='.$users[$i]['id'].'"><button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-trash"></i></button></a></td>';

		}
		if (isset($_GET['function']) && $_GET['function'] == ) {
			# I'll put this
		}
	 ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</section>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="main.js"></script>
</script>
</body>
</html>