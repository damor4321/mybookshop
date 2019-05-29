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

		@include('flash-message')

		<a href="/home">Home</a>
		</br></br></br>
		<h2>My Addresses</h2>
		

		<table>
		@foreach ($addresses as $address)
		<div class="panel panel-default">
			<div class="panel-body">
			<tr>
				<td>
				{{ $address->address }} 
				</td>

				<td>
				&nbsp; <a href="/addresses/{{ $address->id }}">Edit</a>
				</td>

				<td>
				&nbsp; <a href="/addresses/{{ $address->id }}/delete">Delete !!!</a>
				</td>

			</tr>
			</div>		
		</div>		
		@endforeach
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
