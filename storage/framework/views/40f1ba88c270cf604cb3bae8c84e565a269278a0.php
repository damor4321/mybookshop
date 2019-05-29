<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/css/app.css">
	<title>My Books Shop</title>
</head>

<body>
	</br>
	<div class="container">

		<?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<a href="/home">Home</a>
		</br></br></br>
		<h2>My Addresses</h2>
		

		<table>
		<?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="panel panel-default">
			<div class="panel-body">
			<tr>
				<td>
				<?php echo e($address->address); ?> 
				</td>

				<td>
				&nbsp; <a href="/addresses/<?php echo e($address->id); ?>">Edit</a>
				</td>

				<td>
				&nbsp; <a href="/addresses/<?php echo e($address->id); ?>/delete">Delete !!!</a>
				</td>

			</tr>
			</div>		
		</div>		
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</table>
	</div>
	</br>
	<div class="container">
		<div class="panel-body">
		<a href="/addresses/create">Add address</a>
		</div>
	</div>
	
</body>

</html>
<?php /**PATH /var/www/html/laravel/mybookshop/resources/views/addresses/index.blade.php ENDPATH**/ ?>