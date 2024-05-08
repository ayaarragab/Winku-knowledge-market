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
    <th scope="col" class="border-0 text-uppercase font-medium">Name</th>
    <th scope="col" class="border-0 text-uppercase font-medium">Occupation</th>
    <th scope="col" class="border-0 text-uppercase font-medium">Email</th>
    <th scope="col" class="border-0 text-uppercase font-medium">Added</th>
    <th scope="col" class="border-0 text-uppercase font-medium">Category</th>
    <th scope="col" class="border-0 text-uppercase font-medium">Manage</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td class="pl-4">1</td>
    <td>
    <h5 class="font-medium mb-0">Daniel Kristeen</h5>
    <span class="text-muted">Texas, Unitedd states</span>
    </td>
    <td>
    <span class="text-muted">Visual Designer</span><br>
    <span class="text-muted">Past : teacher</span>
    </td>
    <td>
    <span class="text-muted"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="1074717e79757c50677572637964753e737f7d">[email&#160;protected]</a></span><br>
    <span class="text-muted">999 - 444 - 555</span>
    </td>
    <td>
    <span class="text-muted">15 Mar 1988</span><br>
    <span class="text-muted">10: 55 AM</span>
    </td>
    <td>
    <select class="form-control category-select" id="exampleFormControlSelect1">
    <option>Modulator</option>
    <option>Admin</option>
    <option>User</option>
    <option>Subscriber</option>
    </select>
    </td>
    <td>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="fa fa-key"></i> </button>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-trash"></i> </button>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-edit"></i> </button>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-upload"></i> </button>
    </td>
    </tr>
    <tr>
    <td class="pl-4">2</td>
    <td>
    <h5 class="font-medium mb-0">Emma Smith</h5>
    <span class="text-muted">Texas, Unitedd states</span>
    </td>
    <td>
    <span class="text-muted">Visual Designer</span><br>
    <span class="text-muted">Past : teacher</span>
    </td>
    <td>
    <span class="text-muted"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="85e1e4ebece0e9c5f2e0e7f6ecf1e0abe6eae8">[email&#160;protected]</a></span><br>
    <span class="text-muted">999 - 444 - 555</span>
    </td>
    <td>
    <span class="text-muted">15 Mar 1855</span><br>
    <span class="text-muted">10: 00 AM</span>
    </td>
    <td>
    <select class="form-control category-select" id="exampleFormControlSelect1">
    <option>Modulator</option>
    <option>Admin</option>
    <option>User</option>
    <option>Subscriber</option>
    </select>
    </td>
    <td>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="fa fa-key"></i> </button>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-trash"></i> </button>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-edit"></i> </button>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-upload"></i> </button>
    </td>
    </tr>
    <tr>
    <td class="pl-4">3</td>
    <td>
    <h5 class="font-medium mb-0">Olivia Johnson</h5>
    <span class="text-muted">Texas, Unitedd states</span>
    </td>
    <td>
    <span class="text-muted">Visual Designer</span><br>
    <span class="text-muted">Past : teacher</span>
    </td>
    <td>
    <span class="text-muted"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="86e2e7e8efe3eac6f1e3e4f5eff2e3a8e5e9eb">[email&#160;protected]</a></span><br>
    <span class="text-muted">999 - 444 - 555</span>
    </td>
    <td>
    <span class="text-muted">17 Aug 1988</span><br>
    <span class="text-muted">12: 55 AM</span>
    </td>
    <td>
    <select class="form-control category-select" id="exampleFormControlSelect1">
    <option>Modulator</option>
    <option>Admin</option>
    <option>User</option>
    <option>Subscriber</option>
    </select>
    </td>
    <td>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="fa fa-key"></i> </button>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-trash"></i> </button>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-edit"></i> </button>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-upload"></i> </button>
    </td>
    </tr>
    <tr>
    <td class="pl-4">4</td>
    <td>
    <h5 class="font-medium mb-0">Isabella Williams</h5>
    <span class="text-muted">Texas, Unitedd states</span>
    </td>
    <td>
    <span class="text-muted">Visual Designer</span><br>
    <span class="text-muted">Past : teacher</span>
    </td>
    <td>
    <span class="text-muted"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="096d6867606c65497e6c6b7a607d6c276a6664">[email&#160;protected]</a></span><br>
    <span class="text-muted">999 - 444 - 555</span>
    </td>
    <td>
    <span class="text-muted">26 Mar 1999</span><br>
    <span class="text-muted">10: 55 AM</span>
    </td>
    <td>
    <select class="form-control category-select" id="exampleFormControlSelect1">
    <option>Modulator</option>
    <option>Admin</option>
    <option>User</option>
    <option>Subscriber</option>
    </select>
    </td>
    <td>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="fa fa-key"></i> </button>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-trash"></i> </button>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-edit"></i> </button>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-upload"></i> </button>
    </td>
    </tr>
    <tr>
    <td class="pl-4">5</td>
    <td>
    <h5 class="font-medium mb-0">Sophia Jones</h5>
    <span class="text-muted">Texas, Unitedd states</span>
    </td>
    <td>
    <span class="text-muted">Visual Designer</span><br>
    <span class="text-muted">Past : teacher</span>
    </td>
    <td>
    <span class="text-muted"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="177376797e727b57607275647e63723974787a">[email&#160;protected]</a></span><br>
    <span class="text-muted">999 - 444 - 555</span>
    </td>
    <td>
    <span class="text-muted">16 Aug 2001</span><br>
    <span class="text-muted">10: 55 AM</span>
    </td>
    <td>
    <select class="form-control category-select" id="exampleFormControlSelect1">
    <option>Modulator</option>
    <option>Admin</option>
    <option>User</option>
    <option>Subscriber</option>
    </select>
    </td>
    <td>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="fa fa-key"></i> </button>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-trash"></i> </button>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-edit"></i> </button>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-upload"></i> </button>
    </td>
    </tr>
    <tr>
    <td class="pl-4">6</td>
    <td>
    <h5 class="font-medium mb-0">Charlotte Brown</h5>
    <span class="text-muted">Texas, Unitedd states</span>
    </td>
    <td>
    <span class="text-muted">Visual Designer</span><br>
    <span class="text-muted">Past : teacher</span>
    </td>
    <td>
    <span class="text-muted"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="90f4f1fef9f5fcd0e7f5f2e3f9e4f5bef3fffd">[email&#160;protected]</a></span><br>
    <span class="text-muted">999 - 444 - 555</span>
    </td>
    <td>
    <span class="text-muted">15 Mar 1988</span><br>
    <span class="text-muted">10: 55 AM</span>
    </td>
    <td>
    <select class="form-control category-select" id="exampleFormControlSelect1">
    <option>Modulator</option>
    <option>Admin</option>
    <option>User</option>
    <option>Subscriber</option>
    </select>
    </td>
    <td>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="fa fa-key"></i> </button>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-trash"></i> </button>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-edit"></i> </button>
    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-upload"></i> </button>
    </td>
    </tr>
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