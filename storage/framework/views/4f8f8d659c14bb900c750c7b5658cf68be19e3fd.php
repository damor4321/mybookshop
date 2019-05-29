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
		<h2>Found books</h2>

		<table>
		<?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="panel panel-default">
			<div class="panel-body">
			<tr>
				<td>
				<?php echo e($book->title); ?> 
				</td>
				<td>
				 &nbsp; <a href="books/<?php echo e($book->id); ?>">Details</a>
				</td>
			</tr>
			</div>		
		</div>		
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</table>
	</div>	
</body>

</html>
<?php /**PATH /var/www/html/laravel/mybookshop/resources/views/books/index.blade.php ENDPATH**/ ?>