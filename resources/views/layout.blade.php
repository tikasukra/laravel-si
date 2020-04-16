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
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>SI Mahasiswa</title>
</head>
<body>

	<div class="container">
		<div class="col-md-12" style="margin-top: 20px">
						
			<div align="right">
			<a href="{{ route('logout') }}" class="btn btn-danger"">
				LOGOUT</a></br>
			</div>

			@yield("content")

	

	
</body>
</html>