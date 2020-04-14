@extends("layout")

@section("content")

	<form action="{{ route('biodata.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">

		<!-- tipe request bermacam - macam -->
		<!-- Application/json -> tidak bisa kirim data -->
		<!-- form/wwware -> tidak bisa kirim data -->

		@csrf
		<!-- laraveel v5.5 ke bawah -->
		<!-- {{ csrf_field() }} -->

		<div class="form-group">
			<label class="control-label">Nama</label>
			<input type="text" name="name" class="form-control" required>
		</div>
		<div class="form-group">
			<label class="control-label">NIM</label>
			<input type="text" name="nim" class="form-control" required>
		</div>
		<div class="form-group">
			<label class="control-label">Alamat</label>
			<textarea class="form-control" name="address" rows="10" required></textarea>
		</div>
		<div class="form-group">
			<label class="control-label">Foto</label>
			<input type="file" name="photo">
		</div>
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Simpan</button>
			<a href="{{ route('biodata.index') }}" class="btn btn-danger">Batal</a>
		</div>
	</form>

@endsection