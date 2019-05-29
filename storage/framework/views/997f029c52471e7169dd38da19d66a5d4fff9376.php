<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/css/app.css">
	<title>My Book Shop</title>
</head>

<body>
	</br>
	<div class="container">
		<a href="/home">Home</a>
		</br></br></br>
		<h2>Purchase history</h2>

		<table>
		<?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="panel panel-default">
			<div class="panel-body">
			<tr>
				<td>
				<?php echo e($purchase->updated_at); ?> 
				</td>	
				<td>
				 &nbsp; <?php echo e($purchase->title); ?> 
				</td>
				<td>
				 &nbsp; <a href="/purchases/<?php echo e($purchase->id); ?>">Details</a>
				</td>
			</tr>
			</div>		
		</div>		
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</table>
	</div>	
</body>

</html>
<?php /**PATH /var/www/html/laravel/mybookshop/resources/views/purchases/index.blade.php ENDPATH**/ ?>