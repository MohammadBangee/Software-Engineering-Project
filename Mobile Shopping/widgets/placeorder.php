
<!DOCTYPE html>
<html>
<head>
	<title>succesful</title>
</head>
<body>

	<?php 
 require_once $_SERVER['DOCUMENT_ROOT'].'/Mobile Shopping/core/init.php';
	session_start();
	 $mail=$_SESSION['mail'];

	 ?>
 <?php 
 if (empty($mail)) 
 {
 	header("location:../login.php");
 }
 else
 {
  $sql5="SELECT CURDATE();";


      $bill=0;
      $sno=0;
      $total_bill=$_GET['total'];
      echo  $total_bill;
     
      echo $mail;
      $sql=$db->query("SELECT * FROM customer WHERE mail='{$mail}'");
      $result=mysqli_fetch_assoc($sql);
      $Customer_id=$result['Customer_id'];
      echo $Customer_id;
      $shipping_address=$result['Shipping_Address'];
      echo $shipping_address;
      $quer="INSERT INTO orders (Customer_id,total_bill,shipping_address,mail,date) VALUES('$Customer_id','$total_bill','$shipping_address','$mail','$sql5')";
      $output=$db->query($quer);
      $q=$db->insert_id;
      echo "<br>";
      echo $q;

    //  $sql1=$db->query("SELECT * FROM orders WHERE total_bill='{$total_bill}' AND mail='{$mail}'");
    // $result1=mysqli_fetch_assoc($sql1);
      //$order_id=$result1['order_id'];
      //echo $order_id;
     /*var_dump($_SESSION);
      die();*/


     
        foreach ($_SESSION as $products) {
          $pro=0;
          $n=0;
          $i=0;
          $qty=0;
          $id=0;
          
            

//var_dump($_SESSION);
//die();
if (is_array($products) || is_object($products))
{


         foreach ($products as $key => $value) {
        
            #echo $key . "<hr />";

            if ($key == 4) 
            {
           
            $qty=$value;
           echo $qty;
              }
            elseif ($key == 3) {
                   
            $i=$value;  
            //echo $i;
            }
            elseif($key == 2)
            {
              
            $pro=$value;
            
            }
            elseif($key == 1)
            {
              
            $n=$value;
           // echo $n;
            }
            elseif($key == 0)
            {
              $id=$value;
              //echo $id;
            
            }
           
            
        }
        $sql3=$db->query("SELECT * FROM products WHERE product_id=$id");
        $result3=mysqli_fetch_assoc($sql3);
        $quantity=$result3['quantity'];
        $quantity=$quantity - $qty;

        $sql4=("UPDATE products SET quantity=$quantity WHERE product_id=$id");
        $result4=$db->query($sql4);

        $sql2="INSERT INTO order_items (order_id,product_id,quantity,price) VALUES('$q','$id','$qty','$pro')";
            $result2=$db->query($sql2);
            unset($_SESSION[$n]);
    }
    //session_destroy();
		
   }

   header("location:order.php?id=$q");

}
?>
          
 
</body>
</html>