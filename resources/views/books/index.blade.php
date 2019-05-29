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
		@foreach ($books as $book)
		<div class="panel panel-default">
			<div class="panel-body">
			<tr>
				<td>
				{{ $book->title }} 
				</td>
				<td>
				 &nbsp; <a href="books/{{ $book->id }}">Details</a>
				</td>
			</tr>
			</div>		
		</div>		
		@endforeach
		</table>
	</div>	
</body>

</html>
