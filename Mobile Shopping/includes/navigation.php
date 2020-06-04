
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
   rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php 

  require_once $_SERVER['DOCUMENT_ROOT'].'/Mobile Shopping/core/init.php';
  $sql = "SELECT * FROM categories WHERE parent=0";
  $pquery = $db->query($sql); 
  ?>

<nav class="navbar navbar-expand-md  navbar-dark fixed-top" style="background-color: black">

  <a class="navbar-brand" href="home.php">
    <img src="images/logo.png" class="logo">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <?php while ($parent = mysqli_fetch_assoc($pquery)) : ?>
        <?php $parent_id = $parent['id'];
        $sql2= "SELECT * FROM categories WHERE parent = '$parent_id'";
        $cquery = $db->query($sql2); 
    ?>

<!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="color: white">
        <?php echo $parent['category']; ?>
      </a>
     
      <ul class="dropdown-menu" role="menu">
        <?php while ($child = mysqli_fetch_assoc($cquery)) : ?>
        <li><a class="dropdown-item" href="<?php echo $child['category'];?>.php"><?php echo $child['category'];?></a></li>
        <?php endwhile; ?>
   
      </ul>
    </li>
<?php endwhile; ?>
</div>  
  <?php 
session_start();
//  print_r($_SESSION["mail"]);
if (isset($_SESSION["mail"])){
  
  echo "<a href='update.php'><button class='btn btn-tertiary'>Update Info</button></a>";
  echo"<form >

<button class='btn btn-tertiary'>";
echo $_SESSION["mail"];
echo"</button>  
</form>
<form action='logout.php'>
<button class='btn btn-tertiary'>Logout</button>  

</form>" ;
echo "<a href='widgets/shopping_cart.php'><i class='fa fa-shopping-cart' style='font-size:36px'></i></a>";
}
else{
  echo "<a class='btn btn-xs btn-default' href='widgets/shopping_cart.php'><i class='material-icons'>shopping_cart</i></a>";
echo "<form action='login.php'>
<button class='btn btn-tertiary'>Sign In</button>  
</form>
<form action='signup.php'>
 <button class='btn btn-tertiary'>Sign Up</button>  
</form>" ;

}

?>

<form action="search.php" method="POST">
	<a class="btn btn-xs btn-default" href= search.php>
	<i class="material-icons">search</i></a>
	</form>

<!--<input type ="text" name="search" placeholder="Search">
	
 -->
</nav> 


