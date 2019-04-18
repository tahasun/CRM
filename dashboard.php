<?php 
    include('..\private\setup.php');
    // echo $page["title"];
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="..\private\d_style.css" />
    <script src="dashboard.js"></script>
</head>

<body>

<!-- grid template -->
<section class="the-grid">
    <div class="dec">  </div>
    <div class="header"> Dashboard </div>

    <!-- left navigation bar -->
    <div class="leftbar"> 
    <ul>
        <li class="nav">
        <a href="dashboard.php"><img src="..\private\icons\home.png"> Dashboard </a>
        <!-- <img src="..\private\icons\home.png">     -->
        </li>
        <li class="nav">    
        <a href="order_details/orders.php"><img class="m" src="..\private\icons\orders.png"> Orders </a></li>

        <li class="nav">    
        <a href="order_details/orders.php"><img class="small" src="..\private\icons\employee.svg"> Employee </a>
        </li>

        <li class="nav">
        <a href="supplier_details/purchase_orders.php"><img class="m" src="..\private\icons\purchase_orders.svg"> Purchase Orders </a></li>

        <li class="nav">    
        <a href="order_details/orders.php"><img class="m" src="..\private\icons\faq.svg"> FAQ </a>
        </li>

        
        <li class="nav">    
        <a href="order_details/orders.php"><img src="..\private\icons\support.svg"> Support </a>
        </li> 

        <li class="nav">    
        <a href="order_details/orders.php"><img src="..\private\icons\logout.svg"> Logout </a>
        </li> 

    </ul>   
    </div>

    <!-- common tasks -->
    <div class="neworder">
        <a class="task" href="customer_details/c_exist.php">
        <img class="icon" src="..\private\icons\add_order.svg"> New Order</a>
    </div>
   

    <div class="supplier"> 
        <a class="task" href="supplier_details/create_order.php">
        <img class="icon" src="..\private\icons\cart.svg"> Create Supplier Purchase Order
        </a>
    </div>

    <div class="customers">
        <a class="task" href="customer_details/customers.php">
        <img class="icon" src="..\private\icons\customers.svg"> Customers
        </a>
    </div>

    <div class="stats"> 
        <a class="task" href="">
        <img class="icon" id="small" src="..\private\icons\trends.svg"> Insigts 
        </a>
    </div>

    <div class="inventory"> 
        <a class="task" href="">
        <img class="icon" src="..\private\icons\warehouse.svg"> Inventory
        </a>
    </div>

    <div class="delivered"> 
        <a class="task" href="">
        <img class="icon" src="..\private\icons\check.svg"> Check off orders 
        </a>
    </div> 

    <div class="footer"> Copy right 2018 </div> 
</section>

</body>

</html>