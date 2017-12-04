<!DOCTYPE html>
<html>
<head>
	<title>Task CRUD AJAX</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<style type="text/css">
	.white-color {
		color: white;
	}

</style>
<body style="background: url('https://cdn-images-1.medium.com/max/1920/1*lmD7FIkUL4t5P-swMEPH7Q.jpeg');">
		<center>
			<h1 class="white-color">Laravel Ajax To do App</h1>
		</center>
		
			<!-- <input type="hidden" name="_token" value="{{ csrf_field() }}" /> -->
			<div class="row">
				<div class="col-md-4">
									</div>
				<div class="col-md-4" >
					<form id="add-actor">
						<meta name="csrf-token" content="{{ csrf_token() }}">  
						<div class="form-group">
							<label><h3 class="white-color">Task Name : </h3></label>
							<input type="text" name="name" class="form-control" id="task-name">
						</div>
						<input type="submit" name="submit" class="btn btn-primary form-control" id="submit" value="Add">
					</form>
					<div id="display-tasks">
						@if(count($data)==0)
							<h3 class="white-color">No Tasks found</h3>
						@else
						@foreach($data as $task)
							<h2 class="white-color" id="one">{{ $task['name'] }}
							
								<span style="float: right;">
									<button class ="delete" onclick="taskDelete({{$task['id']}})">
										<!-- <input type="hidden" name="task_id" class ="task_id" value="{{$task['id']}}"> -->
										<span class="glyphicon glyphicon-trash text-danger"></span>
									</button>
								</span>
							</h2>
						@endforeach
						@endif
					</div>
				</div>
				<div class="col-md-3">
					<div class="alert alert-success alert-dismissable" style="display: none;" id="message">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
					    <strong>Success!</strong> <p id="alert-message"></p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="alert alert-danger alert-dismissable" style="display: none;" id="error-message">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
					    <strong>Delete!</strong> <p id="alert-message"></p>
					</div>
				</div>
			</div>
		


</body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$('#add-actor').on('submit',function(e){
	    $.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
    	e.preventDefault(e);

	    $.ajax({

	        type:"POST",
	        url:'tasks',
	        data:$(this).serialize(),
	        dataType: 'json',
	        success: function(data){
	        	if (data.status = true) {
	        	document.getElementById("alert-message").innerHTML = data.message;
	        	$("#task-name").val(" ");
	        	$("#display-tasks").load(" #display-tasks");
	        	$("#message").fadeIn(50);
	        	$("#message").hide(3000);

	            console.log(data);
	           } else {
	           	  alert('failed');
	           }
	        },
	        error: function(data){
	        	alert("ajax failed");
	        }
	    })
	});

	function taskDelete(id){
		var a = 'tasks-delete/' + id;
		$.ajax({

	        type:"GET",
	        url : a,
	        data: a,
	        dataType: 'json',
	        success: function(data){
	        	if (data.status = true) {
	        	document.getElementById("alert-message").innerHTML = data.message;
	        	$("#display-tasks").load(" #display-tasks");
	        	$("#error-message").fadeIn(50);
	        	$("#error-message").hide(3000);

	            console.log(data);
	           } else {
	           	  alert('failed');
	           }
	        },
	        error: function(data){
	        	alert("ajax failed");
	        }
	    })
	}
	// $(".delete").click(function(){
	// 	$('#task_id').each(function (index, value){
	// 	  console.log(value);
	// 	});
	// 	// var task = $(this).closest("delete").find('.task_id').val();     
	// 	// alert(task);
	  
	// });
</script>
