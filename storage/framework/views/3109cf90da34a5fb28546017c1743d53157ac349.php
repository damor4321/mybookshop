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
		<a href="/home">Home</a> &nbsp; <a href="javascript:history.back()">Back</a>
	    <br/><br/><br/>
	    
		<h2>New order:</h2>

		<form action="/purchases/" method="POST" role="create">
		<?php echo e(csrf_field()); ?>

		
		<input type="hidden" name="book_id" value="<?php echo e($book->id); ?>">
		<input type="hidden" name="title" value="<?php echo e($book->title); ?>">
		<input type="hidden" name="author" value="<?php echo e($book->author); ?>">
		<input type="hidden" name="editor" value="<?php echo e($book->editor); ?>">
		<input type="hidden" name="price" value="<?php echo e($book->price); ?>">		
		<input type="hidden" name="copies" value="<?php echo e($copies); ?>">		
		<input type="hidden" name="total" value="<?php echo e($book->price * $copies); ?>">
		
		
		<div class="panel panel-default">
		
			<div class="panel-heading">
			<h4>Order data</h4>
			</div>			
			
			<div class="panel-body">
			<br/>			
			<table>

			<tr>
				<td>
				Title:
				</td>
				<td>
				<?php echo e($book->title); ?> 
				</td>
			</tr>

			<tr>
				<td>
				Author:
				</td>
				<td>
				<?php echo e($book->author); ?> 
				</td>
			</tr>
			
			<tr>
				<td>
				Editor:
				</td>
				<td>
				<?php echo e($book->editor); ?> 
				</td>
			</tr>

			<tr>
				<td>
				Unit price:
				</td>
				<td>
				<?php echo e($book->price); ?> 
				</td>
			</tr>
		
			<tr>
				<td>
				Purchased copies:
				</td>
				<td>
				<?php echo e($copies); ?> 
				</td>
			</tr>

			<tr>
				<td>
				<br/>
				<b>TOTAL:</b>
				</td>
				<td>
				<br/>
				&nbsp; <b><?php echo e($book->price * $copies); ?></b> 
				</td>
			</tr>
			
			</table>			
			</div>
			
			<br/><br/><br/>
			
			<div class="panel-heading">
			<h4>Delivery address</h4>
			</div>
			
			<div class="panel-body">			
			<table>
			<tr>
				<td>
				Address:
				</td>
				<td>
				<?php echo e($address->address); ?>

				</td>
			</tr>

			<tr>
				<td>
				Postal code:
				</td>
				<td>
				<?php echo e($address->code); ?>

				</td>
			</tr>
			
			<tr>
				<td>
				City:
				</td>
				<td>
				<?php echo e($address->city); ?>

				</td>
			</tr>

			<tr>
				<td>
				Contact phone:
				</td>
				<td>
				<?php echo e($address->phone); ?>

				</td>
			</tr>			
			</table>

			<br/><br/>
			
			<table>
			<tr>
    			<td>
    			</td>
				<td>
				&nbsp; <button type="submit" class="btn btn-default">
        		<span class="glyphicon glyphicon-search">Confirm Order</span>
     			</button>
    			</td>
			</tr>
			</table> 				                    
            </div>
		</div>            			
	</form>
			
	</div>	
</body>

</html>
<?php /**PATH /var/www/html/laravel/mybookshop/resources/views/purchases/create.blade.php ENDPATH**/ ?>