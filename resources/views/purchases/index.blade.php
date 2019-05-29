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
		@foreach ($purchases as $purchase)
		<div class="panel panel-default">
			<div class="panel-body">
			<tr>
				<td>
				{{ $purchase->updated_at }} 
				</td>	
				<td>
				 &nbsp; {{ $purchase->title }} 
				</td>
				<td>
				 &nbsp; <a href="/purchases/{{ $purchase->id }}">Details</a>
				</td>
			</tr>
			</div>		
		</div>		
		@endforeach
		</table>
	</div>	
</body>

</html>
