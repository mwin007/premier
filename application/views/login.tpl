<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Agranov Alexander-agranov.paka@gmail.com">

    <title>Product Management System - Login</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="{$url}public/css/general.css" rel="stylesheet">
    <link href="{$url}public/css/login.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

    <div class="row">
        <h1 class="logo-h1 text-center">Product Management System</h1>
        <hr>
        <img class="img img-responsive img-user center-block" src="{$url}public/img/key.svg"
                           alt="logo"/>
    </div>

    <div class="row">

        {* ---------------- messages  ----------------- *}

        {if $validation_errors}
            <div class="col-sm-3"></div>
            <div class="error message feedback2 col-sm-6 text-center">{$validation_errors}</div>
            <div class="col-sm-3"></div>
        {/if}

        <div class="col-sm-12">
            {*<?= form_open(site_url('login/'), array('class' => "form-signin")); ?>*}

            {$form.open}

            <label for="uname" class="sr-only">User Name:</label>
            <input type="text" id="uname" name="uname" class="form-control" placeholder="User Name"
                   p min="3"  required value="{$set_value.name}"
                   autofocus>
            <label for="pass" class="sr-only">Password</label>
            <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" min="3"
                   maxlength="12"
                   required>

            <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>

            {$form.close}

        </div>


    </div>

</div> <!-- /container -->


<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<!-- js custom files-->
<script src="{$url}public/js/script.js"></script>


</body>
</html>
