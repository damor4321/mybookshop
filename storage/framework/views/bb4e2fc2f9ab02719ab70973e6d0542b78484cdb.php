<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/css/app.css">
	<title>My Book Shop</title>
</head>

<body>
	<div class="container">
	    <br/>
		<a href="/home">Home</a> &nbsp; <a href="/addresses">Back</a>
	    <br/><br/><br/>
	    
		<h2>Edit address:</h2>
		<br/>
		<form action="update" method="POST" role="edit">
			<?php echo e(csrf_field()); ?>

			
			<input type="hidden" name="address_id" value="<?php echo e($address->id); ?>">			
			
			<table>
			<tr>
				<td>
				Address:
				</td>
				<td>
				<input type="text" name="address" value="<?php echo e($address->address); ?>" 
				required class="form-control" placeholder="Address" aria-describedby="basic-addon1">
				</td>
			</tr>

			<tr>
				<td>
				Postal code:
				</td>
				<td>
				<input type="text" name="code" value="<?php echo e($address->code); ?>" 
				required class="form-control" placeholder="Postal Code" aria-describedby="basic-addon1">
				</td>
			</tr>
			
			<tr>
				<td>
				City:
				</td>
				<td>
				<input type="text" name="city" value="<?php echo e($address->city); ?>" 
				required class="form-control" placeholder="City" aria-describedby="basic-addon1">
				</td>
			</tr>

			<tr>
				<td>
				Phone:
				</td>
				<td>
				<input type="text" name="phone" value="<?php echo e($address->phone); ?>" 
				required class="form-control" placeholder="Phone" aria-describedby="basic-addon1">
				</td>
			</tr>

			</table>
			
			<br/>
			
			<div class="checkbox">
    		<label>
        	<input type="checkbox" name="is_main_address" <?php if($address->main == "1"): ?> checked="checked" <?php endif; ?>>Is my main address
    		</label>
			</div>

			<br/>
             <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search">Submit</span>
             </button>
				
		</form>		
		
	</div>	
</body>

</html>
<?php /**PATH /var/www/html/laravel/mybookshop/resources/views/addresses/edit.blade.php ENDPATH**/ ?>