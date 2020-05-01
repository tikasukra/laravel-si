@extends("layout.app")

@section("content")

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
			<h1 class="m-0 text-dark">Tambah Mahasiswa</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="#">Kelola Mahasiswa</a></li>
				<li class="breadcrumb-item active">Tambah Mahasiswa</li>
			</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
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
				</div>
			</div>
		</div>
	</section>



@endsection