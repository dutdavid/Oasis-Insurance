 <?php include('server.php') ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Oasis Insurance</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<style>
.note
{
    text-align: center;
    height: 80px;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;
    font-weight: bold;
    line-height: 80px;
}
.form-content
{
    padding: 5%;
    border: 1px solid #ced4da;
    margin-bottom: 2%;
}
.form-control{
    border-radius:1.5rem;
}
.btnSubmit
{
    border:none;
    border-radius:1.5rem;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: #0062cc;
    color: #fff;
}
</style>

<div class="container register-form">
            <div class="form">
                <div class="note">
                    <p>Please Register here as a policy holder.</p>
                </div>

                <div class="form-content">
                    <div class="row">
                        <div class="col-md-12">
                        <form method="post" action="register.php">
                         <?php include('errors.php'); ?>
                            <div class="form-group">
                            <label for="recipient-name" class="col-form-label">First Name</label>
                            <input type="text" class="form-control" placeholder=" Enter First Name" name="first_name" id="recipient-rname"
                                required="">
                        </div>
                        <div class="form-group">
                            <label for="recipient-email" class="col-form-label">Last Name</label>
                            <input type="text" class="form-control" placeholder=" Enter Last Name" name="last_name" value="<?php echo $last_name; ?>" id="recipient-email"
                                required="">
                        </div>
                        <div class="form-group">
                            <label for="user_name" class="col-form-label">User Name</label>
                            <input type="text" class="form-control" placeholder=" Enter User Name" name="user_name" value="<?php echo $user_name; ?>" id="user_name"
                                required="">
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Enter Password " name="password" id="password"
                                required="">
                        </div>
                         <div class="form-group">
                            <label for="policy_number" class="col-form-label">Policy Number</label>
                            <input type="text" class="form-control" placeholder="Enter Policy Number " name="policy_number" id="policy_number"
                                required="">
                        </div>
                    </div>
                    <input type="submit" class="btnSubmit" name="reg_user" value="Register">
                </div>
    <p>
        Already a member? <a href="index.php">Sign in</a>
    </p>

            </div>
        </div>
    </body>
    </html>