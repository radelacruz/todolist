<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>To-Do List Activity</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<script
  	src="https://code.jquery.com/jquery-3.3.1.min.js"
  	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  	crossorigin="anonymous"></script>

</head>
<body>

	<h1>To-Do List App</h1>
	<!-- <form action="../app/controllers/add_task.php" method="POST"> -->
	<form>
		<input id="new-task" type="text" placeholder="Enter new task" name="name">
		<button id="addTaskBtn" class="btn btn-primary">Add New Task</button>
	</form>
	<br>

<!-- 	<form>
		<div>
		<span id="Display"></span>
		<button class="btn btn-success" type="submit">Done</button>
		<button class="btn btn-danger" type="submit">Remove</button>
		</div>
	</form> -->
	<h2>Task List</h2>
	<ul id="taskList">

	<?php

	require_once 'app/controllers/connection.php';

	$sql = "SELECT * FROM tasks";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) { ?>
			<li data-id="<?php echo $row['id'] ; ?>">
				<!-- <?php// echo $row['name'] . "is task number" . $row['id'] ; ?> -->
				<?php echo $row['name'] ; ?>
				<!-- <button id="doneBtn" class="btn btn-success doneBtn" type="submit">Done</button> -->
				<button class="removeBtn">Remove</button>
			</li>

	<?php } ?>
	</ul>

	<h2>Done Tasks</h2>

	<!-- add task -->
	<script>
		$("#addTaskBtn").click( () => {
			const newTask = $('#new-task').val();

			$.ajax({
				method : 'GET',
				url : 'app/controllers/add_task.php',
				data : {name: newTask},
			}).done(
				console.log('added task')
			);
		});
	</script>

	<script>
		$("#taskList").on('click','.removeBtn',function() {
			const task_id = $(this).parent().attr('data-id');
			$.ajax({
				method : 'post',
				url : 'app/controllers/remove_task.php',
				data : {task_id: task_id}
			}).done( data => {
				$(this).parent().fadeOut();
			});
		});
		
	</script>

</body>
</html>