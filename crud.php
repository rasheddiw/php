 <?php
	$conn = mysqli_connect("localhost","root","","stdpro");
	if(isset($_POST['btn'])){
		$student_name = $_POST['name'];
		$student_age = $_POST['age'];
		
		if(!empty($student_name) && !empty($student_age)){
			$query = "INSERT INTO student(name,age) VALUE('$student_name','$student_age')";
			
		$createquery = mysqli_query($conn, $query);
		if($createquery){
				echo "Your Data submitted";
			}
		}
		else{
			echo "field should not be empty";
		}
	}


 ?>
 <?php 
 if(isset($_GET['delete'])){
	 $stdid = $_GET['delete'];
	 $query = "DELETE FROM student WHERE id={$stdid}";
	 $deletequery= mysqli_query($conn, $query);
	 if($deletequery){
		 echo "Data Removed";
	 }
 }
 ?>
  
 
 <!DOCTYPE html>
  <html>
  <head>
  <title></title>
  <meta charset="utf-8">
	<title>Signup Page</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  
  </head>
  <body>
  

<div class="container shadow m-5" p-3">
	<form action="" method="post" class="d-flex justify-content-around">
	<input class="form-control" type="text" name="name" placeholder="writeusrname">
	</input>
	<input type="number" name="age" class="form-control" placeholder="enterregnum">
	</input>
	<input type="submit" value="send" name="btn" class="btn btn-success">
	
	</form>

</div>
<div class="container shadow m-5" p-3">
	<form action="" method="post" class="d-flex justify-content-around">
	<?php 
		if(isset($_GET['update'])){
			$stdid = $_GET['update'];
			$query = "SELECT * FROM student WHERE id={$stdid}";
			$getdata = mysqli_query($conn, $query);
			while($rx=mysqli_fetch_assoc($getdata)){
				$stdid = $rx['id'];
				$stdname = $rx['name'];
				$stdage = $rx['age'];
		
	?>
	<input class="form-control" type="text" name="name" value="<?php echo $stdname ?>">
	</input>
	<input type="number" name="age" class="form-control" value="<?php echo $stdage ?>">
	</input>
	<input type="submit" value="Update" name="update_btn" class="btn btn-primary">
	<?php }} ?>
	<?php 
		if(isset($_POST['update_btn'])){
			$stdname = $_POST['name'];
			$stdage = $_POST['age'];
			
			$query = "UPDATE student SET name='$stdname', age=$stdage WHERE id=$stdid";
			$updatequery = mysqli_query($conn, $query);
			if($updatequery){
			echo "Data Updated";	
		}
		}
	?>
	
	
	</form>

</div>
<div class="container">
	<table class="table table-bordered">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Age</th>
			<th></th>
			<th></th>
		</tr>
		<?php 
		
		$query = "SELECT * FROM student";
		$poro = mysqli_query($conn,$query);
		if($poro->num_rows > 0){
		while($rd = mysqli_fetch_assoc($poro)){
				$stdid = $rd['id'];
				$stdname = $rd['name'];
				$stdage = $rd['age'];
		
		?>
		<tr>
			<td><?php echo $stdid; ?></td>
			<td><?php echo $stdname; ?></td>
			<td><?php echo $stdage; ?></td>
			<td><a href="practice.php?update=<?php echo $stdid; ?>" class="btn btn-info">Update</a></td>
			<td><a href="practice.php?delete=<?php echo $stdid; ?>" class="btn btn-danger">Delete</a></td>
			
		</tr>
		<?php
		}
		} 
		else{
			echo "No Data found";
		}
		?>
	
	</table>
</div>
</body>
</html>

