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
		<a href="/home">Home</a> &nbsp; <a href="/addresses">Back</a>
	    <br/><br/><br/>
	    
		<h2>Edit address:</h2>
		<br/>
		<form action="update" method="POST" role="edit">
			{{ csrf_field() }}
			
			<input type="hidden" name="address_id" value="{{ $address->id }}">			
			
			<table>
			<tr>
				<td>
				Address:
				</td>
				<td>
				<input type="text" name="address" value="{{ $address->address }}" 
				required class="form-control" placeholder="Address" aria-describedby="basic-addon1">
				</td>
			</tr>

			<tr>
				<td>
				Postal code:
				</td>
				<td>
				<input type="text" name="code" value="{{ $address->code }}" 
				required class="form-control" placeholder="Postal Code" aria-describedby="basic-addon1">
				</td>
			</tr>
			
			<tr>
				<td>
				City:
				</td>
				<td>
				<input type="text" name="city" value="{{ $address->city }}" 
				required class="form-control" placeholder="City" aria-describedby="basic-addon1">
				</td>
			</tr>

			<tr>
				<td>
				Phone:
				</td>
				<td>
				<input type="text" name="phone" value="{{ $address->phone }}" 
				required class="form-control" placeholder="Phone" aria-describedby="basic-addon1">
				</td>
			</tr>

			</table>
			
			<br/>
			
			<div class="checkbox">
    		<label>
        	<input type="checkbox" name="is_main_address" @if ($address->main == "1") checked="checked" @endif>Is my main address
    		</label>
			</div>

			<br/>
             <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search">Submit</span>
             </button>
				
		</form>		
		
	</div>	
</body>

</html>
