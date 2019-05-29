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
	    
		<h2>Purchase details:</h2>
		
		
		<div class="panel panel-default">
					
			<div class="panel-body">
			<br/>			
			<table>

			<tr>
				<td>
				Date:
				</td>
				<td>
				<?php echo e($purchase->updated_at); ?> 
				</td>
			</tr>

			<tr>
				<td>
				Title:
				</td>
				<td>
				<?php echo e($purchase->title); ?> 
				</td>
			</tr>

			<tr>
				<td>
				Author:
				</td>
				<td>
				<?php echo e($purchase->author); ?> 
				</td>
			</tr>
			
			<tr>
				<td>
				Editor:
				</td>
				<td>
				<?php echo e($purchase->editor); ?> 
				</td>
			</tr>

			<tr>
				<td>
				Unit price:
				</td>
				<td>
				<?php echo e($purchase->price); ?> 
				</td>
			</tr>
		
			<tr>
				<td>
				Purchased copies:
				</td>
				<td>
				<?php echo e($purchase->quantity); ?> 
				</td>
			</tr>

			<tr>
				<td>
				Purchase total:
				</td>
				<td>
				<?php echo e($purchase->total); ?></b> 
				</td>
			</tr>
			
			</table>			
			</div>			
			
	</div>	
</body>

</html>
<?php /**PATH /var/www/html/laravel/mybookshop/resources/views/purchases/show.blade.php ENDPATH**/ ?>