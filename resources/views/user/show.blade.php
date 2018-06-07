@extends('layouts.admin')
@section('content')
<section class="card">
		<div class="card-body text-secondary">col-lg-12</div>
</section> 
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data User
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Name</label>	
			  			<input type="text" name="name" class="form-control" value="{{ $user->name }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Email</label>	
			  			<input type="text" name="email" class="form-control" value="{{ $user->email }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Password</label>	
			  			<input type="text" name="password" class="form-control" value="{{ $user->password }}"  readonly>
			  		</div>

			  	
			  			</textarea> 
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection