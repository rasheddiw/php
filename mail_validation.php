<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: black;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = "";
$name = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Don't keep it blank";
  } else {
    $name = test_input($_POST["name"]);
   
    if (preg_match("/^[a-zA-Z]{8}$/",$name)) {
      $nameErr = " User name is Ok";
    }
    else{
      $nameErr = "Only letters and keep it within 8 character";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Input your Email";
  } else {
    $email = test_input($_POST["email"]);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Email is ok";
    }
    else{
      $emailErr = "Invalid email format";
    }
  }
    
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }
?>

<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  User Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
//echo "<h2>Your Input:</h2>";
//echo $name;
//echo "<br>";
//echo $email;
?>

</body>
</html> 