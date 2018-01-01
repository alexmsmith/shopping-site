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
    <meta charset="utf-8">
    <!-- Mobile-first -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <style>
      body {
        margin: 0px;
        background-image: url("../images/christmas.jpg");
      	background-repeat: repeat-y;
      }
      ul.topnav {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
        opacity: 0.8;
      	border-bottom-left-radius: 4px;
      	border-bottom-right-radius: 4px;
      }
      ul.topnav li {float: left;}
      ul.topnav li a {
        font-family: Cambria;
        font-size: 16px;
        display: block;
        color: white;
        text-align: center;
        padding: 11px 13px;
        text-decoration: none;
      }
      ul.topnav li a:hover:not(.active) {background-color: #111; transition-duration: 0.4s;}
      ul.topnav li a.active {background-color: #4CAF50;}
      ul.topnav li.right {float: right;}
      #search {
        float: right;
        width: 30%;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
        background-color: white;
        background-image: url('../images/search.png');
        background-position: 9px 6px;
        background-repeat: no-repeat;
        opacity: 0.6;
        padding: 8px 16px 8px 36px;
        margin-left: 15px;
        margin-top: 8px;
        position: absolute;
        left: 385px;
      }
      h1 {
        margin-top: 18px;
      	font-size: 42px;
      	font-family: Agency FB;
      	color: #5d6470;
      	text-align: left;
      	letter-spacing: 2px;
      	width: 45%;
      }
      #container {
        border-radius: 4px;
        margin: auto;
        background-color: rgba(213,222,239,0.6); border-radius: 4px;
        width: 1720px;
      }
      #col-md-4 {
        width: 666px;
        float: left;
      }
      #logo {
        margin-top: -18px;
      	width: 58px;
      	height: 58px;
      	z-index: -1;
      	float: left;
      }
      #store {
        border-radius: 4px;
        padding: 6px;
        text-align: center;
      }
      #img {
        padding-right: 10px;
      }
      #imgContent {
        /* background-color: #c0cce2; */
        border-bottom: 4px solid #c0cce2;
        border-radius: 6px;
        padding: 10px;
      }
      /* Add text-info to external style sheet */
      #text-info {
        font-family: Agency FB;
        font-size: 18px;
      }
      h3 {
        font-family: Agency FB;
      }
      #btn-success {
        transition-duration: 0.4s;
        border-radius: 7px;
        background-color: #c0cce2;
        color: black;
        padding: 6px;
        font-family: Cambria;
        font-size: 12px;
      }
      #btn-success:hover {
        background-color: #4CAF50;
        color: white;
      }
      /* Media Query */
      @media screen and (max-width: 576px){
        ul.topnav li.right,
        ul.topnav li {float: none;}
        ul.topnav li a {
          font-family: Cambria;
          font-size: 16px;
          display: block;
          color: white;
          text-align: center;
          padding: 0px 0px;
          text-decoration: none;
          border-top: 1px solid white;
        }
        h1 {
          font-size: 25px;
        	font-family: Agency FB;
        	color: #5d6470;
        	letter-spacing: 2px;
        }
        #logo {
          margin-top: -18px;
        	width: 45px;
        	height: 45px;
        	z-index: -1;
        	float: left;
        }
        #container {
          border-radius: 4px;
          margin: auto;
          background-color: rgba(213,222,239,0.6); border-radius: 4px;
        }
        #col-md-4 {
          width: 400px;
          float: none;
        }
        #store {
          border-radius: 4px;
          padding: 6px;
          text-align: center;
        }
        #product_image {
          padding-right: 10px;
          width: 120px;
          height: 230px;
        }
        #imgContent {
          /* background-color: #c0cce2; */
          border-bottom: 4px solid #c0cce2;
          border-radius: 6px;
          padding: 10px;
        }
        /* Add text-info to external style sheet */
        #text-info {
          font-family: Agency FB;
          font-size: 16px;
        }
        h3 {
          font-size: 22px;
        }
      }
</style>
  </head>
  <body>
    <!-- Contains everything within the webpage -->
    <div class="container-fluid">
      <!-- Control the column width, and how they should appear on different devices -->
      <div class="row">
        <div class="col-sm-12">
          <ul class="topnav">
            <li><a class="active" href="#home">Home</a></li>
            <li><a href="#news">Shopping</a></li>
            <li><a href="#contact">About</a></li>
            <li><a href="#about">Contact</a></li>
            <li><a href="login.php">Log-in/Sign-up</a></li>
    				<li><a href="calculate.php">Calculator</a></li>
          </ul>
        </div>
      </div>
      <!-- Header -->
      <div class="row">
        <div class="col-sm-12" style="padding-top: 10px;">
          <h1><img src="../images/circuit_board_logo.png" alt="logo" id="logo"><i>The-Tech-Store<span style="font-size: 24px;">.co.uk</span></i>

  				</h1>
        </div>
      </div>
      <!-- Main -->
      <div class="row">
        <div class="col-sm-12">
          <div id="container">
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
      <!-- Footer -->
      <div class="row">
        <div class="col-sm-12" style="background-color: rgba(213,222,239,0.6); border-radius: 4px;">Footer</div>
      </div>
  </body>
</html>
