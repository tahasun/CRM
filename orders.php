<?php 
include '..\..\private\setup.php';
?>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Orders</title>
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
        <div class="header"> Orders</div>
        <section class="content">

        <form method="GET" action="">
        <table>
        <tr> <p class="h">Sort by Date</p> </tr>
        <tr> 
            <td> 
                <label for="fromdate"> From </label>
                <input type="date" id="fromdate" name="fromdate"> 
            </td>
            <td> 
                <label for="todate"> To </label>
                <input type="date" id="todate" name="todate"> 
            </td>
            <td>
            <button type="submit" value="filter"> Filter </button>
            </td>
        </tr>

        </table>
        </form>

        <table id="orders">
            <tr class="header">
                <th class = "table">Order ID</th>
                <th class = "table">Order Date</th>
                <th class = "table">Customer Name</th>
                <th class = "table">Address</th>
                <td> &nbsp </td>
                <td> &nbsp </td>
                
            </tr>

        <?php 
        if(isset($_GET["fromdate"])){
            // echo '<pre>'; var_dump($_GET); echo '</pre>';
            $from_date = $_GET['fromdate']; $to_date = $_GET['todate'];
            $q = "SELECT * FROM orders WHERE date BETWEEN '" . $from_date . "' AND '" . $to_date . "'";
            $r = mysqli_query($dbc, $q);
            $filtered = mysqli_fetch_all($r);
            // echo '<pre>'; var_dump($filtered); echo '</pre>';
            $num = count($filtered); 
            // echo $num;
            $i = 0;
            while ($i < $num) {
                $customer_id = $filtered[$i][1]; $order_id = $filtered[$i][0];
                // echo $id;
                echo '<tr>';
                echo '<td>'; echo $filtered[$i][0]; echo '</td>';
                echo '<td>'; echo $filtered[$i][2]; echo '</td>';
                // echo '<td>'; echo $orders[$i][2]; echo '</td>';
                
                $query = "SELECT name FROM customer WHERE id = $customer_id";
                // echo $query;
                $result = mysqli_query($dbc, $query);
                $names = mysqli_fetch_assoc($result);
                // echo '<pre>'; var_dump($names); echo '</pre>';
        
                echo '<td>'; echo $names["name"]; echo '</td>';
                echo '<td>'; echo $filtered[$i][3]; echo '</td>';
                echo '<td> <a class="view" href="order_profile.php?id='; echo $order_id; echo '"> View </a> </td>';
                echo '<td> <a class="edit" href="order_form.php?customer_id='; echo $order_id; echo '"> Edit </a> </td>';
                echo '</tr>';
                $i++;
            }
        }
        else {
            $q = "SELECT * FROM orders";
            $r = mysqli_query($dbc, $q);
            $orders = mysqli_fetch_all($r);
            $num = count($orders); 
            // echo $num;
            $i = 0;
            while ($i < $num) {
                $customer_id = $orders[$i][1]; $order_id = $orders[$i][0];
                // echo $id;
                echo '<tr>';
                echo '<td>'; echo $orders[$i][0]; echo '</td>';
                echo '<td>'; echo $orders[$i][2]; echo '</td>';
                // echo '<td>'; echo $orders[$i][2]; echo '</td>';
                
                $query = "SELECT name FROM customer WHERE id = $customer_id";
                // echo $query;
                $result = mysqli_query($dbc, $query);
                $names = mysqli_fetch_assoc($result);
                // echo '<pre>'; var_dump($names); echo '</pre>';
        
                echo '<td>'; echo $names["name"]; echo '</td>';
                echo '<td>'; echo $orders[$i][3]; echo '</td>';
                echo '<td> <a class="view" href="order_profile.php?id='; echo $order_id; echo '"> View </a> </td>';
                echo '<td> <a class="edit" href="order_form.php?customer_id='; echo $order_id; echo '&order_id='; echo $order_id; echo '"> Edit </a> </td>';
                echo '</tr>';
                $i++;
            }
        }
        ?>
    
        </table>
        </section>
        <div class="footer"> Copy right 2018</div>
    </section>
    
</body>
</html>