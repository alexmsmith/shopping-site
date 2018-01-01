<?php
session_start();

$connect = mysqli_connect('localhost', 'root', '', 'shopping');
if(isset($_POST['add_to_cart'])) {
	if(isset($_SESSION['shopping_cart'])) {
		$item_array_id = array_column($_SESSION['shopping_cart'], 'item_id');
		if(!in_array($_GET['id'], $item_array_id)) {
			$count = count($_SESSION['shopping_cart']);
			$item_array = array(
					'item_id'               =>     $_GET["id"],
          'item_name'               =>     $_POST["hidden_name"],
          'item_price'          =>     $_POST["hidden_price"],
          'item_quantity'          =>     $_POST["quantity"]
			);
			$_SESSION['shopping_cart'][$count] = $item_array;
		}
		else {
			echo '<script>alert("Item Already Added")</script>';
			echo '<script>window.location="shopping.php"</script>';
		}
	}
	else {
			$item_array = array(
      	'item_id'               =>     $_GET["id"],
        'item_name'               =>     $_POST["hidden_name"],
        'item_price'          =>     $_POST["hidden_price"],
        'item_quantity'          =>     $_POST["quantity"]
      );
      $_SESSION["shopping_cart"][0] = $item_array;
	}
}
if(isset($_GET["action"]))
{
     if($_GET["action"] == "delete")
     {
          foreach($_SESSION["shopping_cart"] as $keys => $values)
          {
               if($values["item_id"] == $_GET["id"])
               {
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>alert("Item Removed")</script>';
                    echo '<script>window.location="basket.php"</script>';
               }
          }
     }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--<a class="navbar-brand" href="#">WebSiteName</a>-->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="#">Home</a></li>
        <li class="active"><a href="#">Shopping</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Calculator</a></li>
        <li><a href="#">Basket</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <!-- Header -->
  <div class="row">
    <div class="col-sm-12" style="padding-top: 10px;">
      <h1><img src="../images/circuit_board_logo.png" alt="logo" id="logo">
        <i>The-Tech-Store<span style="font-size: 24px;">.co.uk</span></i>
      </h1>
    </div>
  </div>
  <!-- Main -->
  <div class="row">
    <div class="col-sm-12">
      <?php
       $query = "SELECT * FROM tbl_product ORDER BY id ASC";
       $result = mysqli_query($connect, $query);
       if(mysqli_num_rows($result) > 0)
       {
            while($row = mysqli_fetch_array($result))
            {
       ?>
       <form method="post" action="shopping.php?action=add&id=<?php echo $row["id"]; ?>">
          <div id="col-md-4" style="padding:16px;">
              <table id="store">
                  <tr>
                      <td id="img">
                        <!-- Display product images -->
                        <img src="<?php echo $row["img"]; ?>" id="product_image" />
                      </td>
                      <td id="imgContent">
                        <h3><?php echo $row["name"]; ?></h3>
                        <p id="text-info">
                          <?php echo $row["description"]; ?></br></br>
                          <b>Price:</b> £<?php echo $row["price"]; ?></br></br>
                          Quantity: <input type="text" name="quantity" class="form-control" value="1" /></br></br>
                          <input type="submit" name="add_to_cart" id="btn-success" value="Add to Cart" />
                        </p>
                      </td>
                  </tr>
              </table>
                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
          </div>
       </form>
       <?php
            }
       }
       ?>
       <div style="clear:both"></div>
       <br />
    </div>
  </div>
</div>

</body>
</html>
