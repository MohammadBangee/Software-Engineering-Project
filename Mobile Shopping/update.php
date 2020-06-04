 <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?php
	$db=mysqli_connect('127.0.0.1','root','','items');
	mysqli_select_db($db,'Mobile Shopping');
	
include "includes/navigation.php";	
?>

<?php 
session_start();
$id=$_SESSION['mail'];

?>


<?php 
$sql=$db->query("SELECT * FROM customer WHERE mail='{$id}'");
$result=mysqli_fetch_assoc($sql);
$First_Name=$result['First_Name'];
$Last_Name=$result['Last_Name'];
$Shipping_Address=$result['Shipping_Address'];
$Contact_number=$result['Contact_number'];
$mail=$result['mail'];
$Customer_id=$result['Customer_id'];
$password=$result['password'];
$password = md5($password);
echo $password;



 ?>
 <form method="POST" action="afterupdate.php?id=<?php echo $Customer_id; ?>">
<div class="text-center">
<div  class="row" style="margin-top: 140px;">
<div class="form-group col-md-3" style="margin: auto;"  >
		<label for="First_Name">First_Name:</label>
		<input class="form-control" name="First_Name" id="First_Name" value="<?php echo $First_Name?>">
	</div>
	<div class="form-group col-md-3" style="margin: auto;">
		<label for="Last_Name">Last_Name:</label>
		<input class="form-control" name="Last_Name" id="Last_Name" value="<?php echo $Last_Name?>">
	</div>
	<div class="form-group col-md-3" style="margin: auto;">
		<label for="Shipping_Address">Shipping_Address:</label>
		<input class="form-control" name="Shipping_Address" id="Shipping_Address" value="<?php echo $Shipping_Address?>">
	</div>
		
	
</div>
<div class="text-center">
<div  class="row" style="margin-top: 140px;">
<div class="form-group col-md-3" style="margin: auto;"  >
		<label for="Contact_number">Contact_number:</label>
		<input class="form-control" name="Contact_number" id="Contact_number" value="<?php echo $Contact_number?>">
	</div>
	<div class="form-group col-md-3" style="margin: auto;">
		<label for="mail">mail:</label>
		<input class="form-control" name="mail" id="mail" value="<?php echo $mail?>">
	</div>
	<div class="form-group col-md-3" style="margin: auto;">
		<label for="password">password:</label>
		<input class="form-control" name="password" id="password" type="password" >
	</div>
	
		
	
</div>
<br>
<button class="btn btn-primary">Update</button>
</div>
</div>
</form>
