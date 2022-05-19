<form action method="post">
	Enter Number: <input type="text" name="num"/>
	<input type="submit" value="Submit" name="submit"/>
	
</form>


<?php 
if(isset($_POST['submit'])){
	$num = $_POST['num'];
	$prime = 1;
	for ($i=2; $i<$num; $i++){
		if($num%$i==0){
			$prime=0;
			break;
		}
	}
	if($prime==1){
		print "The number is prime";
	}
	else{
		print "The number is not prime";
	}
	}	

?>