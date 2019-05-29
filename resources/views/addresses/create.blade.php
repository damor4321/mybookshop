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
		<a href="/home">Home</a> &nbsp; <a href="/addresses">Back</a>
	    </br></br></br>
		
		<h2>Add address:</h2>
		</br>
			<form action="/addresses" method="POST" role="add">
			{{ csrf_field() }}
						
			<table>
			<tr>
				<td>
				Address:
				</td>
				<td>
				<input type="text" name="address" 
				required class="form-control" placeholder="Address" aria-describedby="basic-addon1">
				</td>
			</tr>

			<tr>
				<td>
				Postal code:
				</td>
				<td>
				<input type="text" name="code" 
				required class="form-control" placeholder="Postal Code" aria-describedby="basic-addon1">
				</td>
			</tr>
			
			<tr>
				<td>
				City:
				</td>
				<td>
				<input type="text" name="city"  
				required class="form-control" placeholder="City" aria-describedby="basic-addon1">
				</td>
			</tr>

			<tr>
				<td>
				Phone:
				</td>
				<td>
				<input type="text" name="phone"  
				required class="form-control" placeholder="Phone" aria-describedby="basic-addon1">
				</td>
			</tr>

			</table>
			
			</br>
			<div class="checkbox">
    		<label>
        	<input type="checkbox" value="0" name="is_main_address">Is the main address
    		</label>
			</div>

			</br>
             <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search">Submit</span>
             </button>
				
		</form>		
		
	</div>	
</body>

</html>
