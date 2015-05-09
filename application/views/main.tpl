<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product Management System</title>
    <meta charset="UTF-8">
    <meta name="author" content="Agranov Alexander-agranov.paka@gmail.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">

    <!-- custom css-->
    <link href="{$url}public/css/style.css" rel="stylesheet" media="screen">
    <link href="{$url}public/css/general.css" rel="stylesheet" media="screen">
</head>
<body>

{nocache}

<div class="container">


    <div class="row top-row">
        <div class="col-sm-7 ">

            <h1>Product Management System</h1>

        </div>

        <div class="col-sm-5">

            <ul class="list-unstyled list-inline top-nav pull-right">
                <li><b>Hello Admin</b></li>
                <li><a href="{$url}login/logout">Log Out</a></li>
            </ul>

        </div>
    </div><hr><br>

    {block name=body}{/block}

</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
{* jquery ui js*}
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<!-- defenition of CI_ROOT -->
<script type="text/javascript"> var baseURL="{$url}"; </script>
{*  ---- custom js ----*}
<script src="{$url}public/js/script.js"></script>

{/nocache}
</body>
</html>