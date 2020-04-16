@extends("layout")

@section("content")

	<h1>Daftar Mahasiswa</h1>

	<div class="col-md-12">
		<a href="{{ route('biodata.create') }}" class="btn btn-primary"> 
			<span class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp</span>
			Create</a></br></br>
	
		<a href="{{ route('biodata.excel') }}" class="btn btn-success">
			<span class="glyphicon glyphicon-export" aria-hidden="true">&nbsp</span>Export to Excel</a></br></br>
	</div>
	

	<table class="table table-bordered table-striped table-hover" id="datatable">
		<thead>
			<tr>
				<th><center>ID</center></th>
				<th><center>NAMA</center></th>
				<th><center>NIM</center></th>
				<th><center>ACTION</center></th>
			</tr>
		</thead>
		<tbody>
			@forelse ($mahasiswa as $data)
			<tr>
				<td align="center">{{ $data->id }}</td>
				<td>{{ $data->name }}</td>
				<td align="center">{{ $data->nim }}</td>
				<td align="center">
					<a href="{{ route('biodata.show', ['id' => $data->id]) }}" class="btn btn-success">Detail</a>
					<a href="{{ route('biodata.edit', ['id' => $data->id]) }}" class="btn btn-warning">Edit</a>
					<a onclick="return confirm('Apakah Anda yakin?');"  href="{{ route('biodata.destroy', ['id' => $data->id]) }}" class="btn btn-danger">Delete</a>
				</td>
			</tr>
				
			@empty

			<tr>
				<td colspan="4">Data belum tersedia!</td>
			</tr>	
			@endforelse

		</tbody>
	</table>

</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!-- J-Query -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<!-- Bootstrap script -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#datatable').DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					url: {{ route('biodata.index') }},
				},
				columns: [
					{
						data: "name",
						name: "name",
					}
					{
						data: "nim",
						name: "nim",
					}
					{
						data: "action",
						name: "action",
						orderable: false
					}
				]
			});
		});
	</script>

@endsection
