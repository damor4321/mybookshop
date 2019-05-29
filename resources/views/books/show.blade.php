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
		{{ csrf_field() }}
		
		<input type="hidden" name="book_id" value="{{ $book->id }}">
		
		<div class="panel panel-default">
			<div class="panel-heading">
			<h4>{{ $book->title }}</h4>
			</div>
			<div class="panel-body">
			
			<table>
			<tr>
				<td>
				Author:
				</td>
				<td>
				{{ $book->author }} 
				</td>
			</tr>

			<tr>
				<td>
				Editor:
				</td>
				<td>
				{{ $book->editor }} 
				</td>
			</tr>
			
			<tr>
				<td>
				Price:
				</td>
				<td>
				{{ $book->price }} 
				</td>
			</tr>

			<tr>
				<td>
				Available copies:
				</td>
				<td>
				{{ $book->quantity }} 
				</td>
			</tr>

             @if($book->available == "1")
    			<tr>
    				<td>
 					</br>
    				<select class="form-control" name="copies">
    				@if ($book->quantity > 0)
        			@for ($i = 1; $i < $book->quantity+1; $i++)
            			<option value="{{ $i }}" {{ $i == 1 ? 'selected="selected"' : '' }}>{{ $i }}</option>
            		@endfor    
    				@endif
    				</select>
    				</td>
    				<td>
    					</br>
    					&nbsp; <button type="submit" class="btn btn-default">
                		<span class="glyphicon glyphicon-search">Buy</span>
             			</button>
    				</td>			
    			</tr>
              @else
    			<tr>
    				<td>
    				</br>
    				Currently not available...
    				</td>			
    				<td>    				
    				</td>
    			</tr>
              @endif
			</table>	
			
			</form>
			
			</div>		
		</div>		
		
	</div>	
</body>

</html>
