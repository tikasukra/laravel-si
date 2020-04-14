@extends("layout")

@section("content")

	@if($errors->any())
		<div class="alert alert-danger alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>	
		</div>

	@endif

	<form action="{{ route('biodata.update', ['id' => $data->id]) }}" method="POST" class="form-horizontal">

		@csrf
		<!-- laraveel v5.5 ke bawah -->
		<!-- {{ csrf_field() }} -->

		<div class="form-group">
			<label class="control-label">Nama</label>
			<input type="text" name="name" class="form-control" value="{{ $data->name }}">
		</div>
		<div class="form-group">
			<label class="control-label">NIM</label>
			<input type="text" name="nim" class="form-control" value="{{ $data->nim }}">
		</div>
		<div class="form-group">
			<label class="control-label">Alamat</label>
			<textarea class="form-control" name="address" rows="10">{{ $data->address }}</textarea>
		</div>
		<div class="form-group">
			<button class="btn brn-primary" type="submit">Simpan</button>
			<a href="{{ route('biodata.index') }}" class="btn btn-danger">Batal</a>
		</div>
	</form>

@endsection