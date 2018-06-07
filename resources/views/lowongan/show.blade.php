@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Lowongan
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">nama_lowongan</label>	
			  			<input type="text" name="nama_lowongan" class="form-control" value="{{ $lowongan->nama_lowongan }}"  readonly>
			  		</div>
			  		<div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">tanggal_mulai</label>	
			  			<input type="date" name="tanggal_mulai" class="form-control" value="{{ $lowongan->tanggal_mulai }}"  readonly>
			  		</div>
			  		<div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">lokasi</label>	
			  			<input type="text" name="lokasi" class="form-control" value="{{ $lowongan->lokasi }}"  readonly>
			  		</div>
			  		<div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">gaji</label>	
			  			<input type="number" name="gaji" class="form-control" value="{{ $lowongan->gaji }}"  readonly>
			  		</div>
				<div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">deskripsi_iklan</label>	
			  			<input type="text" name="deskripsi_iklan" class="form-control" value="{{ $lowongan->deskripsi_iklan }}"  readonly>
			  		
			  		<div class="form-group">
			  			<label class="control-label">Deskripsi Perusahaan</label>	
			  			<input type="text" name="perusahaan_id" class="form-control" value="{{ $lowongan->Perusahaan->deskripsi }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection