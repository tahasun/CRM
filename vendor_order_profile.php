<?php 
include '..\..\private\setup.php';
?>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vendor Order Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="..\..\private\mainstyle.css" />
    
</head>

<body>
    <section class="this-grid">
        <div class="dec"> dec</div>
        <div class="topnav">
            <a href="..\dashboard.php"><img src="..\..\private\icons\home.svg">Dashboard</a>
            <a href="orders.php"><img src="..\..\private\icons\order.svg">Orders</a>
            <a href="..\customer_details\customers.php"><img src="..\..\private\icons\customers.svg">Customers</a>
            <a href="..\faq.php"><img src="..\..\private\icons\faq.svg">FAQ</a>
            <a href=""><img src="..\..\private\icons\logout.svg"> Logout </a>
        </div>
        <div class="header">Vendor Order Details</div>
        <section class="content">

        <table>
        <tr><td>Date: </td></tr>
        <tr><td>Vendor Order # </td></tr>

        <!-- Vendor details -->
        <tr><th>About Vendor</th></tr>
        <tr><td>Name: </td></tr>
        <tr><td>Address: </td></tr>
        <tr><td>Contact: </td></tr>
        </table>

        <table>
        <tr>
        <th> Quantity</th>
        <th> Item</th>
        <th>Description</th>
        </tr>

        <tr></tr>
        <tr></tr>
        <tr></tr>
        </table>

        </section>
        <div class="footer"> Copy right 2018</div>
    </section>
    
</body>
</html>