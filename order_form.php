<?php 
include '..\..\private\setup.php';
?>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Place order</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="..\..\private\mainstyle.css" />
    <!-- <script src="..\..\private\shared\main.js"></script> -->
</head>

<body>  
        <?php
        // check whether customer exists
        if(isset($_GET["name"]) AND isset($_GET["phone"])){
            $name=$_GET["name"]; $phone=$_GET["phone"]; 
            // echo $phone; echo $name;
            // retrive data from database
            $q = "SELECT * FROM customer WHERE phone= $_GET[phone]";
            $r = mysqli_query($dbc, $q);
            $info= mysqli_fetch_assoc($r);
            // echo '<pre>'; var_dump($info); echo '</pre>';
        }
        ?> 

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script>
        $(document).ready(function() {
            var max_fields      = 6;
            var wrapper         = $(".container1");
            var add_button      = $(".add_form_field");
          
            var x = 1;
            
            $(add_button).click(function(e){
                e.preventDefault();
                if( x < max_fields ) {
                    x++;
                    console.log('order' + x);
                    //add input box
                    $(wrapper).append('<div>\
                        <label for="order' + x + '"> Product name/ Code number*</label> \
                        <input name = "order' + x + '" type="text" id= "order' + x + ' "> \
                        <label for="quantity' + x + '"> Quantity*</label>\
                        <input name="quantity' + x + '" type="number" min=0 id="quantity' + x + '" > \
                        <label for="price' + x + '"> Price*</label>\
                        <input name = "price' + x + '" type="number" min=0 id="price' + x + '"> \
                        <a href="#" class="delete">Delete</a></div>'); 
                }
                else
                {
                    alert('You Reached the limits');
                }
            });
          
            $(wrapper).on("click",".delete", function(e){
                e.preventDefault(); 
                $(this).parent('div').remove(); x--;
            });
        });
        </script>
        
    <section class="this-grid">
        <div class="dec"> dec</div>
        <div class="topnav">
            <a href="..\dashboard.php"><img src="..\..\private\icons\home.svg">Dashboard</a>
            <a href="orders.php"><img src="..\..\private\icons\order.svg">Orders</a>
            <a href="..\customer_details\customers.php"><img src="..\..\private\icons\customers.svg">Customers</a>
            <a href="..\faq.php"><img src="..\..\private\icons\faq.svg">FAQ</a>
            <a href=""><img src="..\..\private\icons\logout.svg"> Logout </a>
        </div>
        <div class="header"> New Order</div>
        <section class="content">
        <?php 
        if(isset($_POST["submitted"]) == 1) {
            // echo '<pre>';var_dump($_POST);echo '</pre>';
            $address = "$_POST[house], $_POST[block], $_POST[area], $_POST[city]";
            $address = mysqli_real_escape_string($dbc, $address);
            // echo $address;

            // insert data in customer table
            if (isset($info)){
                // then this is an existing customer, tel and email doesnt change
                // use their existing id
                $customer_id = $info["id"];
            }
            else {
                $query_customer = "INSERT INTO customer (name, phone, email)
                VALUES ('$_POST[name]', '$_POST[contact]', '$_POST[email]')";
            
                $result = mysqli_query($dbc, $query_customer);
                $customer_id = mysqli_insert_id( $dbc );
            }
            
            $customer_id = mysqli_real_escape_string($dbc, $customer_id);
            // echo $customer_id;
            // insert data in orders table
            $query_order = "INSERT INTO orders (customer_id, date, address, add_info) VALUES ( $customer_id, '$_POST[date]', '$address', '$_POST[info]')";
            // echo $query_order;
            $result = mysqli_query($dbc, $query_order);
            // echo $result;
            $orders = mysqli_fetch_assoc($result);
            // echo '<pre>';var_dump($orders);echo '</pre>';
            $orders_id = mysqli_insert_id( $dbc );

            // insert data in order_items table
            $keys = array_keys($_POST); 
            $i = 0; 

            while ($i < count($keys)){
                if (substr($keys[$i], 0, 5)== "order"){
                    // insert into database

                    // find the right keys
                    $order = $keys[$i]; $quantity = $keys[$i+1]; $price = $keys[$i+2];
                    
                    $query_orderi = "INSERT INTO order_items (order_id, product ,quantity, price)
                        VALUES ($orders_id, '$_POST[$order]', '$_POST[$quantity]', '$_POST[$price]')";

                    $result = mysqli_query($dbc, $query_orderi) or mysqli_error($dbc);
                }
                $i++;
            }
            header( 'Location: order_profile.php?id='.$orders_id );
            
            
        }             
        ?>
            <a href=""></a>
            <form name="order_form" action="" method="POST" role="form">
                <div class="name">
                    <!-- if customer exists, pull data from database -->
                    <!-- else take new data -->
                <?php 
                if (isset($info["name"])){
                    echo "<label for='name'> Customer Name* </label> <br>";
                    echo '<input name="name" type="text" id="name" value="' . $info["name"] . '"> <br>';
                }
                else {
                    echo "<label for='name'> Customer Name* </label> <br>";
                    echo "<input name='name' type='text' id='name' required>"; echo "<br>";
                }
                ?>
                </div>

                <label for="date"> Date ordered* </label> <br>
                <input name="date" type="date" id="date" required> <br> 
                
                <?php
                if (isset($info["email"])){
                    echo "<label for='email'> E-mail </label> <br>";
                    echo '<input name="email" type="email" id="email" value="' . $info["email"] . '"> <br>';
                }
                else {
                    echo "<label for='email'> E-mail </label> <br>";
                    echo "<input name='email' type='email' id='email'> <br>";
                }
                ?>

                <?php
               if (isset($info["phone"])){
                    echo "<label for='contact'> Contact number* </label> <br>";
                    echo "<input name='contact' type='tel' id='contact' value='" . $info["phone"] ."'> <br>";
                }
                else {
                    echo "<label for='contact'> Contact number* </label> <br>";
                    echo "<input name='contact' type='tel' id='contact'> <br>";
                }
                ?>
                <!-- address -->
                <div class="address">
                    Delivery Address <br>
                    <label for="house" required> </label>
                    <input name="house" type="text" id="house" placeholder="House/Plot number"> <br> 
                    <label for="block" required> </label>
                    <input name="block" type="text" id="block" placeholder="Road number/Block"> <br>
                                            
                    <input name="area" type="text" id="area" placeholder="Area"> 
                    <label for="area" required> * </label> <br>
                        
                    <input name="city" type="text" id="city" placeholder="City/Town"> 
                    <label for="city" required> * </label> <br>
                </div>
                <!-- orders -->
                <div class="orders">
                Orders <br>
                <label for="order"> Product name/ Code number*</label>
                <input name="order" type="text" id="order" required> 
                <label for="quantity"> Quantity*</label>
                <input name="quantity" type="number" min=0 id="quantity" required> 
                <label for="price" required=""> Price*</label>
                <input name="price" type="number" min=0 id="price"> 
                <br>
                
                <div class="container1">
                    <button type="button" class="add_form_field">Add New Field &nbsp; <span style="font-size:16px; font-weight:bold;">+ </span></button>
                </div>
                </div>

                <label for="info"> Additional Information </label>
                <textarea name="info" type="text" rows=4 id="info"> </textarea><br>
                
                <div class="buttons">
                <button type="submit" value="submit" id="submit"><strong>Place Order</strong></button>
                <input type="hidden" name="submitted" value="1">

                <button type="reset" value="reset" id="reset"> Reset </button>
                </div>

            </form>
            
        </section>
        <div class="footer"> Copy right 2018</div>
    </section>
</body>
</html>

