@extends("layout")

@section("content")

	<h1>Daftar Mahasiswa</h1>
	<a href="{{ route('biodata.create') }}" class="btn btn-primary"> 
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
		Create</a>

	<table class="table table-bordered table-striped table-hover" id="biodata_table">
		<thead>
			<tr>
				<th>ID</th>
				<th>NAMA</th>
				<th>NIM</th>
				<th>ACTION</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>

@endsection
