@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard
                	</br>
                	<div class="container">
                		<a href="addresses/">My addresses:</a>
                		</br>
                	</div>

                	<div class="container">
                		<a href="paymentmethods/">My payment methods:</a>
                		</br>
                	</div>

                	<div class="container">
                		<a href="purchases/">My purchase history:</a>
                		</br>
                	</div>

                	<div class="container">
                		Book search:
                		<form action="/books" method="POST" role="search">
                			{{ csrf_field() }}
                			<div class="input-group">
                				<input type="text" class="form-control" name="qtitle"
                					placeholder="Title">
                				
                				<input type="text" class="form-control" name="qauthor"
                					placeholder="Author">
                				
                				<button type="submit" class="btn btn-default">
                					<span class="glyphicon glyphicon-search"></span>
                				</button>
                				</span>
                			</div>
                		</form>                                
                    </div>            
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
