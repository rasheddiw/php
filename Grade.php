	<html>
		<body>
			<form method="post" action="">
				Pleas enter your Number:
				<input type="text" name="number">
				<input type="submit" name="submit" value="Submit">
			</form>
		</body>
	</html>

	<?php
		error_reporting(0);
		$number=$_POST["number"];

		if($number>=80){
			echo 'Grade: A+';
		}
		
		elseif($number>=70){
			echo 'Grade: A';
		}
		elseif($number>=60){
			echo 'Grade: A-';
		}
		elseif($number>=50){
			echo 'Grade: B';
		}
		elseif($number>=40){
			echo 'Grade: B-';
		}
		else{
			echo 'Grade: Fail';
		}
	?> 
	