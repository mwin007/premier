<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-08 14:21:43
         compiled from "C:\xampp\htdocs\premier\application\views\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2692554c9c47a00d01-60615700%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2c67a058c1fa58c904433f7db51de72b85f267c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\premier\\application\\views\\login.tpl',
      1 => 1431044430,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2692554c9c47a00d01-60615700',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'validation_errors' => 0,
    'form' => 0,
    'set_value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_554c9c47b65a65_30662114',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_554c9c47b65a65_30662114')) {function content_554c9c47b65a65_30662114($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Students Projects Management System - Login</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
public/css/general.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
public/css/login.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
</head>

<body>

<div class="container">

    <div class="row">
        <h1 class="logo-h1 text-center">Products Management System</h1>
        <hr>
        <img class="img img-responsive img-user center-block" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
public/img/key.svg"
                           alt="logo"/>
    </div>

    <div class="row">

        

        <?php if ($_smarty_tpl->tpl_vars['validation_errors']->value) {?>
            <div class="col-sm-3"></div>
            <div class="error message feedback2 col-sm-6 text-center"><?php echo $_smarty_tpl->tpl_vars['validation_errors']->value;?>
</div>
            <div class="col-sm-3"></div>
        <?php }?>

        <div class="col-sm-12">
            

            <?php echo $_smarty_tpl->tpl_vars['form']->value['open'];?>


            <label for="uname" class="sr-only">User Name:</label>
            <input type="text" id="uname" name="uname" class="form-control" placeholder="User Name"
                   p min="3"  required value="<?php echo $_smarty_tpl->tpl_vars['set_value']->value['name'];?>
"
                   autofocus>
            <label for="pass" class="sr-only">Password</label>
            <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" min="3"
                   maxlength="12"
                   required>

            <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>

            <?php echo $_smarty_tpl->tpl_vars['form']->value['close'];?>


        </div>


    </div>

</div> <!-- /container -->


<!-- Latest compiled and minified JavaScript -->
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-1.11.2.min.js"><?php echo '</script'; ?>
>

<!-- Latest compiled and minified JavaScript -->
<?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"><?php echo '</script'; ?>
>

<!-- js custom files-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
public/js/script.js"><?php echo '</script'; ?>
>


</body>
</html>
<?php }} ?>
