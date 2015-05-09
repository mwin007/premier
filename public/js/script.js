/**js document */


/* draggable modal*/

$("#modal-add-product").draggable({
    handle: ".modal-dialog"
});

/*  -------------------------------------------------------------------- */
/*  -------------------  submit forms  --------------------- */
/*  -------------------------------------------------------------------- */

$('.message,.message2').hide();

/*  -------------------  add product ------------------  */

$('#addProductForm').submit(function(){

        var form_data = {
            // csrf protection
            csrf_test_name:$("input[name=csrf_test_name]").val(),
            title: $('input[name=title]').val().trim(),
            price: $('input[name=price]').val().trim(),
            qty: $('input[name=qty]').val().trim()

        };
        console.log(form_data);

        $.ajax({
            url: baseURL + "Products/add_product",
            method: "post",
            dataType: "json",
            data: form_data,
            success: function (data) {

                if (data.success){

                    //update the table of products
                    updateTable();

                    //reset form and show success message
                    document.getElementById("addProductForm").reset();
                    $('.message').show().removeClass('error').addClass('success').html(data.message);

                    //close modal and hide feedback after 4 sec
                    setTimeout(function(){
                        $('.message').hide();
                    },4000)


                }else{

                    //show error message
                    $('.message').show().removeClass('success').addClass('error').html(data.message);

                }
            },
            error:function(){

                //show error message
                $('.message').show().removeClass('success').addClass('error').html('Some technical problems, try later!');
            }
        });

        return false;
    }

);


/* -------------------    delete product    --------------------- */


$(document).on('click','button.delete-product',function(){

    //get id of the product
    var id=$(this).data('id');
    console.log(id);
    //get the name of the product
    $.get( baseURL+"Products/get_product_title", { id: id },function(name){

        var conf=confirm('Are you sure that you want to delete '+name+' ?');

        if(conf){
            //delete product
            $.get( baseURL+"Products/delete_product", { id: id },function( data ) {

                    if(data){
                        //update table
                        updateTable();

                        //message od successful operation
                        $('.message2').show().removeClass('error').addClass('success').html(
                            '<span class="glyphicon glyphicon-ok"></span> '+name+' was successfully deleted!');


                    }else{
                        //message od error
                            $('.message2').show().removeClass('success').addClass('error').html(
                                'Any technical problem, try later!');

                    }
            //hide message
            setTimeout(function(){
                $('.message2').hide();
            },3000);

            });//second $.get
        }//if

    });//first get


});//.on


/* -------------------    edit product    --------------------- */

$(document).on('click','button.edit-product',function(){

    var id=$(this).data('id')
    //console.log(id);

    $.get( baseURL+"Products/get_product", { id: id },function(data){

        var prod = JSON.parse(data);
        prod=prod[0];

        $('tr#row-'+prod.id).html(

            '<td>'+prod.id+'</td>'+
            '<td><input type="text"  id="title-'+prod.id+'" value="'+prod.title+'" '+
            'class="form-control" style="min-width: 500px;" autocomplete="off">'+'</td>'+
            '<td><input type="text"  id="price-'+prod.id+'" value="'+prod.price+'" '+
            'class="form-control" style="max-width: 100px;" autocomplete="off">'+
            '</td>'+
            '<td><input type="number"  id="qty-'+prod.id+'" value="'+prod.qty+'" '+
            'class="form-control" style="max-width: 100px;" autocomplete="off">'+
            '</td>'+
            '<td><button class="btn btn-primary" id="save-'+prod.id+'"><span class="glyphicon glyphicon-floppy-disk"></span> Save Changes</button></td>'+
            '<td><button class="btn btn-default pull-right" id="cancel-'+prod.id+'">Cancel</button></td>'
        );

        //if pushed cancel button - > go back to previous view

        $('#cancel-'+prod.id).on('click',function() {

            $('tr#row-' + prod.id).html(

                "<td>" + prod.id + "</td>" +
                "<td>" + prod.title + "</td>" +
                "<td>" + prod.price + "$</td>" +
                "<td>" + prod.qty + "</td>" +
                "<td>" + '<button type="button" class="btn btn-default edit-product" data-id="' + prod.id +
                '"><span class="glyphicon glyphicon-pencil"></span> Edit</button>' + "</td>" +
                "<td>" + '<button type="button" class="btn btn-danger delete-product" data-id="' + prod.id +
                '"><span class="glyphicon glyphicon-trash"></span> Delete</button>' + "</td>");

        });

        // save data in DB (save Changes)
        $('#save-'+prod.id).on('click',function(){

            var prod_data={
                id: prod.id,
                title: $('#title-'+prod.id).val().trim(),
                price: $('#price-'+prod.id).val().trim(),
                qty: $('#qty-'+prod.id).val().trim()
            };

            console.log('before:');
            console.log(prod_data);

            $.ajax({
                url: baseURL + "Products/edit_product",
                method: "get",
                dataType: "json",
                data: prod_data,

                success: function (data) {

                    console.log(data);

                    //if validation was successful
                    if (data.success){

                        //hide error popover if exist
                        $('#save-'+prod.id).popover('hide');

                        //update row
                        $('tr#row-'+prod_data.id).html(
                        "<td>" + prod_data.id + "</td>" +
                        "<td>" + prod_data.title + "</td>" +
                        "<td>" + data.price + "$</td>" +
                        "<td>" + prod_data.qty + "</td>" +
                        "<td>" + '<button type="button" class="btn btn-default edit-product" data-id="'+prod_data.id+
                        '"><span class="glyphicon glyphicon-pencil"></span> Edit</button>' + "</td>" +
                        "<td>" + '<button type="button" class="btn btn-danger delete-product" data-id="'+prod_data.id+
                        '"><span class="glyphicon glyphicon-trash"></span> Delete</button>' + "</td>")

                        //if data was saved and changed - show message
                        if(data.message!='not_edited'){

                            $('.message2').show().removeClass('error').addClass('success').html(
                                '<span class="glyphicon glyphicon-ok"></span> '+prod_data.title+' was successfully saved!');

                            setTimeout(function(){
                                $('.message2').hide();
                            },3000);
                        }

                    }else{
                        //popover on validation errors
                        popover($('#save-'+prod.id),data.message);

                    }

                },
                error:function(){
                    //popover on errors
                    popover($('#save-'+prod.id),'The product was not saved, some technical problems, try later!');
                }
            });//$.ajax

        });//.on(click on save button)


    })//$.get


});//.on(click on edit button)


/**
 * activate bootstrap popover on element
 * @param elem - selector of element
 * @param content - content of popover
 */
function popover(elem,content){

    //add popover attributes on element
    elem.attr({
        'data-toggle':"popover",
        'data-html':"true",
        'data-container':"body",
        'data-placement':"top",
        'data-content': content
    });
    elem.popover('show');

    setTimeout(function(){
        elem.popover('hide');
    },2500);


}


/**
 * function that update table after the actions (update,delete,add)
 */
function updateTable(){

    $.get( baseURL+"Products/get_products", function( data ) {
        //console.log(data);

        //convert json string to object
        var items=$.parseJSON(data);

        //buid table
        var output='<tr>'+
        '<th class="col-sm-1">Product ID</th>'+
        '<th class="col-sm-6">Product Title</th>'+
        '<th>Product Price</th>'+
        '<th>Quantity</th>'+
        '<th></th><th></th></tr>';


        $.each(items, function(key, value) {

            output+="<tr id='row-"+value.id+"'>" +
            "<td>" + value.id + "</td>" +
            "<td>" + value.title + "</td>" +
            "<td>" + value.price + "$</td>" +
            "<td>" + value.qty + "</td>" +
            "<td>" + '<button type="button" class="btn btn-default edit-product" data-id="'+value.id+'"><span class="glyphicon glyphicon-pencil"></span> Edit</button>' + "</td>" +
            "<td>" + '<button type="button" class="btn btn-danger delete-product" data-id="'+value.id+'"><span class="glyphicon glyphicon-trash"></span> Delete</button>' + "</td>" +
            "</tr>";

        });//.each

        $( ".table-products tbody").html(output);
    });//.get

}
