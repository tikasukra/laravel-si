@extends("layout.app")

@section("content")

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
			<h1 class="m-0 text-dark">Edit Data Mahasiswa</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="#">Kelola Mahasiswa</a></li>
				<li class="breadcrumb-item"><a href="{{ route('biodata.index') }}">Daftar Mahasiswa</a></li>
				<li class="breadcrumb-item active">Edit Mahasiswa</li>
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
				</div>
			</div>
		</div>
	</section>

@endsection