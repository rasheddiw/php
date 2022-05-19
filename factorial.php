<form action="" method="post">
	Enter Number: <input type="text" name="num">
	<input type="submit" name="submit" value="Submit">
	
</form>




	<?php

	if(isset($_POST['submit'])){
		$num = $_POST['num'];
		$fact = 1;
		for($i=$num;$i>=1;$i--){
			$fact *=$i;
		}
		print "The Factorial number is:".$fact;
	}
		

	?>