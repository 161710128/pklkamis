@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Perusahaan 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama Perusahaan</label>	
			  			<input type="text" name="nama_perusahaan" class="form-control" value="{{ $perusahaan->nama_perusahaan }}"  readonly>
			  		</div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">logo</label>	
			  			<input type="img" name="logo" class="form-control" value="{{ $perusahaan->logo }}"  readonly>
			  		</div>
				<div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">deskripsi</label>	
			  			<input type="text" name="deskripsi" class="form-control" value="{{ $perusahaan->deskripsi }}"  readonly>
			  		</div>
			  		<div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">kategori</label>	
			  			<input type="text" name="kategori" class="form-control" value="{{ $perusahaan->kategori }}"  readonly>
			  		</div>
			  		<div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">subkategori</label>	
			  			<input type="text" name="subkategori" class="form-control" value="{{ $perusahaan->subkategori }}"  readonly>
			  		</div>
			  		<div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">judul</label>	
			  			<input type="text" name=judul" class="form-control" value="{{ $perusahaan->judul }}"  readonly>
			  		</div>
			  		<div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">gaji</label>	
			  			<input type="number" name="gaji" class="form-control" value="{{ $perusahaan->gaji }}"  readonly>
			  		</div>
			  		<div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">tanggal_mulai</label>	
			  			<input type="date" name="tanggal_mulai" class="form-control" value="{{ $perusahaan->tanggal_mulai }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">email</label>	
			  			<input type="text" name="email" class="form-control" value="{{ $perusahaan->email }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">telepon</label>	
			  			<input type="number" name="telepon" class="form-control" value="{{ $perusahaan->telepon }}"  readonly>
			  		</div>
        			
			  		<div class="form-group">
			  			<label class="control-label">user</label>	
			  			<input type="text" name="user_id" class="form-control" value="{{ $perusahaan->User->email }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection