<?php 
    include '..\..\private\setup.php';
    // echo $_GET["id"];
    $q = "SELECT * FROM orders WHERE id= $_GET[id]";
    $r = mysqli_query($dbc, $q);
    // echo $q;
    // var_dump($r);
    $order = mysqli_fetch_assoc($r);
    // echo '<pre>'; var_dump($order); echo '</pre>';
    // echo $order["add_info"];

    $q1 = "SELECT * FROM customer WHERE id= $order[customer_id]";
    $r1 = mysqli_query($dbc, $q1);
    $customer = mysqli_fetch_assoc($r1);
    // echo '<pre>'; var_dump($customer); echo '</pre>';
    
    $q2 = "SELECT * FROM order_items WHERE order_id= $_GET[id]";
    $r2 = mysqli_query($dbc, $q2);
    $items = mysqli_fetch_all($r2);
    // $items = mysqli_fetch_assoc($r2);
    // echo '<pre>'; var_dump($items); echo '</pre>';
    // $num = count($items); echo $num;
    // echo $items[0][1];
    // $q3 = "SELECT * FROM order_items WHERE order_id= $_GET[id]";
    // $r3 = mysqli_query($dbc, $q3);
    // $items = mysqli_fetch_assoc($r3);
    // echo '<pre>'; var_dump($items); echo '</pre>';
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Order Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="..\..\private\mainstyle.css" />
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <?php 
    // $name = $order["name"];
    // $date = $order["date"];
    // $email = $order["email"];
    // $contact = $order["contact_no"];
    // echo strlen($order["address"]);
    $last = strripos($order["address"], ',');
    // echo $last;
    $city = substr($order["address"], $last+2);
    $rest1 = substr($order["address"], 0 , $last);

    $area = substr($rest1, strripos($rest1, ',')+2);
    // $rest2 = substr($rest1, 0, strripos($rest1, ',')+2);
    // echo $rest2;
    // echo $city;
    // echo $area;
    
    // echo $rest1;
    $house = substr($rest1, 0, strripos($rest1, ',')+2);
    // $block = substr($order["address"], strlen($house)+2);
    
    
    // $info = $order["info"];
    ?>
    
    <section class="this-grid">
        <div class="dec"> dec</div>
        <div class="topnav">
            <a href="..\dashboard.php"><img src="..\..\private\icons\home.svg">Dashboard</a>
            <a href="orders.php"><img src="..\..\private\icons\order.svg">Orders</a>
            <a href="..\customer_details\customers.php"><img src="..\..\private\icons\customers.svg">Customers</a>
            <a href="..\faq.php"><img src="..\..\private\icons\faq.svg">FAQ</a>
            <a href=""><img src="..\..\private\icons\logout.svg"> Logout </a>
        </div>
        <div class="header"> Order Details</div>
        
        <section class="content">
        
        <h1> Order #<?php echo $_GET["id"]?></h1>
        <table class="orders_info">
            <div>
            <tr class="header">
                <th class="normal" id="left">Product</th>
                <th class="normal">Quantity</th>
                <th class="normal">Price</th>
            </tr>
            <?php 
            $i = 0;
            $total_price = 0;
            $total = 0;

            while ($i< count($items)){
                echo '<div class="items">'; 
                echo '<tr class="normal">'; 
                echo '<td class="item">'; echo $items[$i][2]; echo '</td>';
                echo '<td class="item" id="center">'; echo $items[$i][3]; echo '</td>';
                echo '<td class="item" id="center">'; echo $items[$i][4]; echo '</td>';
                echo '</tr>';
                echo '</div>';
                $total += $items[$i][3];
                $total_price += $items[$i][4];
                $i++;
            }

            ?>
            <div class = "total">
            <tr class="total">
                <th> Additional Info </th>
                <td class="normal" colspan=2> <?php echo $order["add_info"]?> </td> 
                <!-- <td class="normal" id="center"> &nbsp; </td> -->
            </tr>

            <tr class="total">
                <th> TAX / VAT </th>
                <td class="normal" id="center"> &nbsp; </td> 
                <td class="normal" id="center"> &nbsp; </td>
            </tr>

            <tr class="total">
                <th>Delivery Fees</th>
                <td class="normal" id="center"> &nbsp; </td> 
                <td class="normal" id="center"> &nbsp; </td>
            </tr>
            
            <tr class="total">
                <th>Order Total</th>
                <td class="normal" id="center"> <?php echo $total;?> </td>
                <td class="normal" id="center"> <?php echo $total_price;?></td>
            </tr>
            </div>
            </div>
        </table>
        
        <!-- <table> 
            <tr><th>Delivery Fees</th></tr>
            <tr><th>Order Total</th><td> <?php echo $total_price;?></td></tr>
        </table> -->
        <table class=customer_info >
            <div>
            
            <tr class="normal">
                <th class= "big"> Customer Details </th>
                <th class= "big"> Delivery Address </th>
            </tr>
            <tr class="normal">
                <!-- <th>Customer ID</th> -->
                <td class="normal">Customer #<?php echo $customer["id"];?></td>
                <td class="normal"><?php echo $house; ?> </td>
            </tr> 
                
            <tr class="normal">
                <!-- <th>Customer Name</th> -->
                <td class="normal">Name: <?php echo $customer["name"];?></td>
                <td class="normal"><?php  echo $area; ?></td>
            </tr> 
            
            <!-- <h2> Contact Details</h2> -->
            <tr class="normal">
                <td class="normal"> Phone: <?php echo $customer["phone"]; ?></td>
                <td class="normal"><?php  echo $city; ?></td>
            </tr>
            <tr><td class="normal">Email: <?php  echo $customer["email"]; ?></td></tr> 
        <!-- </table> -->
        
        <!-- <h1> Delivery Address</h1> -->
          
        </table>
        <br>
        
            <br> <br>
            <!-- <div class="buttons">
                <button type="submit" value="submit" id="submit"> Confirm </button>
                
                <a href="order_form.php" id="reset"> Cancel </a>
            </div> -->
        
        </section>
        <div class="footer"> Copy right 2018</div>
    </section> 
</body>
</html>