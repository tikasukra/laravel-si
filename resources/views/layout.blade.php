<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<meta charset="utf-8">
	<!-- CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<title>SI Mahasiswa</title>
</head>
<body>

	<div class="container">
		<div class="col-md-12" style="margin-top: 20px">
				
	<a href="{{ route('logout') }}" class="btn btn-danger" style="margin-bottom: 20px">
		LOGOUT</a>

			@yield("content")
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
			$('#biodata_table').DataTable({
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
</body>
</html>