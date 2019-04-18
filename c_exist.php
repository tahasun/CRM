<?php 
include '..\..\private\setup.php';
?>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Customer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="..\..\private\mainstyle.css" />
    
</head>

<body>
        
    <section class="this-grid">
        <div class="dec"> dec</div>
        <div class="topnav">
            <a href="..\dashboard.php"><img src="..\..\private\icons\home.svg">Dashboard</a>
            <a href="..\order_details\orders.php"><img src="..\..\private\icons\order.svg">Orders</a>
            <a href="customers.php"><img src="..\..\private\icons\customers.svg">Customers</a>
            <a href="..\faq.php"><img src="..\..\private\icons\faq.svg">FAQ</a>
            <a href=""><img src="..\..\private\icons\logout.svg"> Logout </a>
        </div>

        <div class="header"> </div>

        <section class="content">
        <table class="single">
        <form action="..\order_details\order_form.php" method="GET">

        <tr> <td ><a class="click" href="..\order_details\order_form.php"> New Customer </a></td> </tr>
        <tr> <td class="exist">Existing Customer?</td> </tr> 
        <tr> <td class="form">
            <label for="name"> Customer name: </label>
            <input name="name" type="text" id="name">
        </td> </tr>
        <tr> <td class="form">
            <label for="phone"> Phone number : </label>
            <input name="phone" type="text" id="phone">
        </td> </tr>
        <tr><td class="submit"><button class="submit" type="submit"> Submit </button></td> </tr>

        </form>       
        </table>
        </section>

        <div class="footer"> Copy right 2018</div>
    </section>

</body>
</html>