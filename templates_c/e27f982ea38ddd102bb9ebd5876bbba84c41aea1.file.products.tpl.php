<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-10 00:42:57
         compiled from "C:\xampp\htdocs\premier\application\views\products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19115554ca833b95903-24020717%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e27f982ea38ddd102bb9ebd5876bbba84c41aea1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\premier\\application\\views\\products.tpl',
      1 => 1431174882,
      2 => 'file',
    ),
    'e2eaeda77c27f7658395a97e001d936069aab545' => 
    array (
      0 => 'C:\\xampp\\htdocs\\premier\\application\\views\\main.tpl',
      1 => 1431207660,
      2 => 'file',
    ),
    '4bb5277051cdf94a99a30cce8283ce8abef7e2d4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\premier\\application\\views\\template\\addProduct.tpl',
      1 => 1431174298,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19115554ca833b95903-24020717',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_554ca833c38128_46568527',
  'variables' => 
  array (
    'url' => 1,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_554ca833c38128_46568527')) {function content_554ca833c38128_46568527($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Product Management System</title>
    <meta charset="UTF-8">
    <meta name="author" content="Agranov Alexander-agranov.paka@gmail.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">

    <!-- custom css-->
    <link href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
public/css/style.css" rel="stylesheet" media="screen">
    <link href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
public/css/general.css" rel="stylesheet" media="screen">
</head>
<body>



<div class="container">


    <div class="row top-row">
        <div class="col-sm-7 ">

            <h1>Product Management System</h1>

        </div>

        <div class="col-sm-5">

            <ul class="list-unstyled list-inline top-nav pull-right">
                <li><b>Hello Admin</b></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
login/logout">Log Out</a></li>
            </ul>

        </div>
    </div><hr><br><br><br>

    

    <div class="row">

        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-add-product"><span class="glyphicon glyphicon-plus"></span> Add Product</button><br>
        <?php /*  Call merged included template "template/addProduct.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("template/addProduct.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '19115554ca833b95903-24020717');
content_554e7f61d1b847_94899788($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "template/addProduct.tpl" */?>
        <br>
        <div class="message2"></div><br>
        <table class="table  table-hover table-products">
            <tbody>
            <tr>
                <th class="col-sm-1">Product ID</th>
                <th class="col-sm-6">Product Title</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th></th>
                <th></th>
            </tr>
            <?php if (isset($_smarty_tpl->tpl_vars['products']->value)||!empty($_smarty_tpl->tpl_vars['products']->value)) {?>

            <?php  $_smarty_tpl->tpl_vars['prod'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['prod']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['prod']->key => $_smarty_tpl->tpl_vars['prod']->value) {
$_smarty_tpl->tpl_vars['prod']->_loop = true;
?>
                <tr id="row-<?php echo $_smarty_tpl->tpl_vars['prod']->value['id'];?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['prod']->value['id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['prod']->value['title'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['prod']->value['price'];?>
$</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['prod']->value['qty'];?>
</td>
                    <td>
                        <button type="button" class="btn btn-default edit-product" data-id="<?php echo $_smarty_tpl->tpl_vars['prod']->value['id'];?>
"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger delete-product" data-id="<?php echo $_smarty_tpl->tpl_vars['prod']->value['id'];?>
"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                    </td>
                </tr>

             <?php } ?>


            <?php } else { ?>
                <tr>
                    <td>
                        <h2>No Products in Data Base</h2>
                    </td>
                </tr>
            <?php }?>
            </tbody>
        </table>



    </div>


</div>

<!-- jQuery -->
<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"><?php echo '</script'; ?>
>
<!-- Bootstrap JavaScript -->
<?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"><?php echo '</script'; ?>
>
<!-- defenition of CI_ROOT -->
<?php echo '<script'; ?>
 type="text/javascript"> var baseURL="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"; <?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
public/js/script.js"><?php echo '</script'; ?>
>


</body>
</html><?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-10 00:42:57
         compiled from "C:\xampp\htdocs\premier\application\views\template\addProduct.tpl" */ ?>
<?php if ($_valid && !is_callable('content_554e7f61d1b847_94899788')) {function content_554e7f61d1b847_94899788($_smarty_tpl) {?><div class="modal" id="modal-add-product" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Add Product</h4>
            </div>

            <?php echo $_smarty_tpl->tpl_vars['form_add']->value['open'];?>


                <div class="modal-body">

                        <div class="message"></div>

                       <fieldset>

                           <div class="col-sm-12">
                            <label for="name">Product Title:*</label>
                            <input type="text" name="title" id="title" value=""
                                   class="form-control" style="min-width: 500px; margin-bottom: 20px;" required autocomplete="off">
                        </div>

                        <div class="col-sm-4">
                            <label for="text">Product Price:*</label>
                            <input type="text" name="price" id="price" value=""
                                   class="form-control" style="max-width: 100px;" autocomplete="off">
                        </div>

                        <div class="col-sm-8">
                            <label for="qty">Quantity:</label>
                            <input type="number" name="qty" id="qty" value=""
                                   class="form-control" style="max-width: 100px;" autocomplete="off">

                        </div>

                       </fieldset>

                </div>

                <div class="modal-footer">

                    <button type="submit"  name="submit" class="btn btn-primary  pull-left btn-lg">Submit</button>
                    <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>

                </div>

            <?php echo $_smarty_tpl->tpl_vars['form_add']->value['close'];?>


        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal --><?php }} ?>
