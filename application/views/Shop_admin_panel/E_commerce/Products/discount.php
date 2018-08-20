<?php extract((array) $product) ;
if ($discount_price ==null) $discount_price= 0;
if (!empty ($discount_start_date)) 
    $discount_start_date =date_format(date_create($discount_start_date),"m/d/Y");
if (!empty ($discount_end_date)) 
    $discount_end_date =date_format(date_create($discount_end_date),"m/d/Y")?>
<div class="row">
    <div class="form-group col-md-10">
        <h2>Edit Discounts</h2>
        <p> Change Your Product Discount Settings.</p>
    </div>          
</div> 
<hr>

<div class ='col-md-12'>
    <form method ='post' action = "<?=base_url('/index.php/shop_admin_panel_products/update_product_discount')?>" onsubmit="return validateForm()" name='discountForm'>
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox"  id="activate_discount" name="activate_discount" value=1 onclick="triggerActivate()" <?php if ($is_discount) echo "checked"; ?>>
                <h5>Activate Discount</h5>
                <span class="form-check-sign">
                    <span class="check"></span>
                </span>
            </label>
        </div>
        <br>
        <div class="form-group" >    
            <label for="start_date">Start Date</label>            
            <input type="text" data-toggle="datepicker" class="form-control" id="start_date" name="start_date" <?php if (!$is_discount) echo "disabled"; else echo "value ='".$discount_start_date."'";?>>                
        </div>
        <div class="form-group " >    
            <label for="end_date">End Date</label>            
            <input type="text" data-toggle="datepicker" class="form-control" id="end_date" name="end_date" <?php if (!$is_discount) echo "disabled"; else echo "value ='".$discount_end_date."'";?>>                
        </div>

         <div class="form-group">
            <label for="discount_price">Discount Price</label>
            <span style='color :red'> <?php echo form_error('discount_price');?></span>
            <input type="text" class="form-control" id="discount_price" placeholder="Discount Price" name="discount_price" value ='<?=$discount_price?>'  <?php if (!$is_discount) echo "disabled"; ?>>
        </div>

        <input type="hidden" name="id" value ='<?=$id?>'>  
        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>

<script>
    $('[data-toggle="datepicker"]').datepicker({autoHide : true});
    function triggerActivate(){
        var checked = $("#activate_discount").is(":checked");
        var start_date = $('#start_date')
        var end_date = $('#end_date')
        var discount_price = $('#discount_price')
        
        if(!checked){
            start_date.attr('disabled', 'disabled')            
            end_date.attr('disabled', 'disabled')
            discount_price.attr('disabled', 'disabled')            
            start_date.val('')
            end_date.val('')
            discount_price.val(0)
        }else{
            start_date.removeAttr('disabled')
            end_date.removeAttr('disabled')
            discount_price.removeAttr('disabled')
        }
    }
    function validateForm() {
        var x = document.forms["discountForm"]["start_date"].value;
        var start_date = $('#start_date').val()
        var end_date = $('#end_date').val()
        var checked = $("#activate_discount").is(":checked");
        if(checked){
            if (validDateSyntax($('#start_date').val()) == false) { 
                $('#start_date').focus();
                return false;
            }
            if (validDateSyntax($('#end_date').val()) == false) {   
                $('#end_date').focus();         
                return false;
            }

            if (validateDates(start_date,end_date))
            {
                 alert('End Date Must Be After Or Equal To The Starting Date'); 
                 $('#end_date').focus();   
                return false;
            }
        }
    }
    function validDateSyntax(dateString){
        // First check for the pattern
        if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
        {
            alert('Please Enter A Valid Date'); 
            return false;
        }

        // Parse the date parts to integers
        var parts = dateString.split("/");
        var day = parseInt(parts[1], 10);
        var month = parseInt(parts[0], 10);
        var year = parseInt(parts[2], 10);

        // Check the ranges of month and year
        if(year < 1000 || year > 3000 || month == 0 || month > 12)
        { 
            alert('Please Enter a Real Date');
            return false;
        }

        var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

        // Adjust for leap years
        if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
            monthLength[1] = 29;

        // Check the range of the day
        return day > 0 && day <= monthLength[month - 1];
    }
    function validateDates(d1,d2){
        var d1 = new Date(d1);
        var d2 = new Date(d2);
        var result = d1 > d2;
        return result;
    }
</script>