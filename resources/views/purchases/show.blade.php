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
				{{ $purchase->updated_at }} 
				</td>
			</tr>

			<tr>
				<td>
				Title:
				</td>
				<td>
				{{ $purchase->title }} 
				</td>
			</tr>

			<tr>
				<td>
				Author:
				</td>
				<td>
				{{ $purchase->author }} 
				</td>
			</tr>
			
			<tr>
				<td>
				Editor:
				</td>
				<td>
				{{ $purchase->editor }} 
				</td>
			</tr>

			<tr>
				<td>
				Unit price:
				</td>
				<td>
				{{ $purchase->price }} 
				</td>
			</tr>
		
			<tr>
				<td>
				Purchased copies:
				</td>
				<td>
				{{ $purchase->quantity }} 
				</td>
			</tr>

			<tr>
				<td>
				Purchase total:
				</td>
				<td>
				{{ $purchase->total }}</b> 
				</td>
			</tr>
			
			</table>			
			</div>			
			
	</div>	
</body>

</html>
