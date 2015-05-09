{extends file="main.tpl"}

{block name=body}

    <div class="row">

        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-add-product"><span class="glyphicon glyphicon-plus"></span> Add Product</button><br>
        {include file="template/addProduct.tpl"}
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
            {if isset($products) or !empty($products)}

            {foreach $products as $prod}
                <tr id="row-{$prod.id}">
                    <td>{$prod.id}</td>
                    <td>{$prod.title}</td>
                    <td>{$prod.price}$</td>
                    <td>{$prod.qty}</td>
                    <td>
                        <button type="button" class="btn btn-default edit-product" data-id="{$prod.id}"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger delete-product" data-id="{$prod.id}"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                    </td>
                </tr>

             {/foreach}


            {else}
                <tr>
                    <td>
                        <h2>No Products in Data Base</h2>
                    </td>
                </tr>
            {/if}
            </tbody>
        </table>



    </div>
{/block}