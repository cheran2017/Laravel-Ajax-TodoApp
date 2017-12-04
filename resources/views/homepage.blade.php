<!DOCTYPE html>
<html>
<head>
	<title>Laravel 5.5 Curd</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
</head>
<body>
	<!-- <form action="tests/1" method="POST">
		<input type="hidden" name="_method" value="DELETE">
    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="container">
			<div class="row">
				<br><br>
				<div class="col-md-12">
					<div class="form-group">
						<label>Name : </label>
						<input type="text" name="name" class="form-control">
					</div>
					<input type="submit" name="submit" class="btn btn-success">
				</div>
			</div>
		</div>
	</form> -->
	{{ print_r($data) }}
	@foreach($data as $pic)
		<img src="<?php echo asset("storage/app/$pic"); ?>"></img>
	@endforeach()
	
	<form action="/uploadfile" method="post" enctype="multipart/form-data">
	    {{ csrf_field() }}
	    <input type="file" name="image"  />
	    <br /><br />
	    <input type="submit" value="Upload" />
	</form>
</body>
</html>