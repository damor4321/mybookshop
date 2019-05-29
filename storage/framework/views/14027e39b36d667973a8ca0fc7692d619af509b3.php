<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/css/app.css">
	<title>My Book Shop</title>
</head>

<body>
	<div class="container">
	
	    </br>
		<a href="/home">Home</a> &nbsp; <a href="javascript:history.back()">Back</a>
	    </br></br></br>
	    
		<h2>Book details:</h2>

		<form action="/purchases/create" method="POST" role="create">
		<?php echo e(csrf_field()); ?>

		
		<input type="hidden" name="book_id" value="<?php echo e($book->id); ?>">
		
		<div class="panel panel-default">
			<div class="panel-heading">
			<h4><?php echo e($book->title); ?></h4>
			</div>
			<div class="panel-body">
			
			<table>
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
				Price:
				</td>
				<td>
				<?php echo e($book->price); ?> 
				</td>
			</tr>

			<tr>
				<td>
				Available copies:
				</td>
				<td>
				<?php echo e($book->quantity); ?> 
				</td>
			</tr>

             <?php if($book->available == "1"): ?>
    			<tr>
    				<td>
 					</br>
    				<select class="form-control" name="copies">
    				<?php if($book->quantity > 0): ?>
        			<?php for($i = 1; $i < $book->quantity+1; $i++): ?>
            			<option value="<?php echo e($i); ?>" <?php echo e($i == 1 ? 'selected="selected"' : ''); ?>><?php echo e($i); ?></option>
            		<?php endfor; ?>    
    				<?php endif; ?>
    				</select>
    				</td>
    				<td>
    					</br>
    					&nbsp; <button type="submit" class="btn btn-default">
                		<span class="glyphicon glyphicon-search">Buy</span>
             			</button>
    				</td>			
    			</tr>
              <?php else: ?>
    			<tr>
    				<td>
    				</br>
    				Currently not available...
    				</td>			
    				<td>    				
    				</td>
    			</tr>
              <?php endif; ?>
			</table>	
			
			</form>
			
			</div>		
		</div>		
		
	</div>	
</body>

</html>
<?php /**PATH /var/www/html/laravel/mybookshop/resources/views/books/show.blade.php ENDPATH**/ ?>