@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data Perusahaan
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('lowongan.update',$lowongan->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('') ? ' has-error' : '' }}">
			  			<label class="control-label"></label>	
			  			<input type="text" name="nama_lowongan" value="{{ $lowongan-> }}" class="form-control"  required>
			  			@if ($errors->has('nama_lowongan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_lowongan') }}</strong>
                            </span>
                        @endif
			  		</div>

					<div class="form-group {{ $errors->has('tanggal_mulai') ? ' has-error' : '' }}">
			  			<label class="control-label">tanggal_mulai</label>	
			  			<input type="date" name="tanggal_mulai" value="{{ $lowongan->tanggal_mulai }}" class="form-control"  required>
			  			@if ($errors->has('tanggal_mulai'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tanggal_mulai') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group {{ $errors->has('lokasi') ? ' has-error' : '' }}">
			  			<label class="control-label">lokasi</label>	
			  			<input type="text" name="lokasi" value="{{ $lowongan->lokasi }}" class="form-control"  required>
			  			@if ($errors->has('lokasi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lokasi') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('gaji') ? ' has-error' : '' }}">
			  			<label class="control-label">gaji</label>	
			  			<input type="text" name="gaji" value="{{ $lowongan->gaji }}" class="form-control"  required>
			  			@if ($errors->has('gaji'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gaji') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('deskripsi_iklan') ? ' has-error' : '' }}">
			  			<label class="control-label">deskripsi_iklan</label>	
			  			<input type="text" name="deskripsi_iklan" value="{{ $lowongan->deskripsi_iklan }}" class="form-control"  required>
			  			@if ($errors->has('deskripsi_iklan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('deskripsi_iklan') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		
			  		
			  		<div class="form-group {{ $errors->has('perusahaan_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Deskripsi</label>	
			  			<select name="perusahaan_id" class="form-control">
			  				@foreach($p as $data)
			  				<option value="{{ $data->id }}">{{ $data->deskripsi }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('perusahaan_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('perusahaan_id') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Simpan</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection
