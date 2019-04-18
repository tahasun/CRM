<?php 
include '..\..\private\setup.php';
?>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Customers</title>
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
        <div class="header"> Customers</div>
        <section class="content">
            
            <input type="text" id="input" onkeyup="search()" placeholder="Search for customers..">

            <script>
            function search() {

            // Declare variables 
                var input, filter, table, tr, td, i;
                input = document.getElementById("input");
                filter = input.value.toUpperCase();
                table = document.getElementById("customers");
                tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1];
                    if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                        tr[i].style.display = "none";
                        }
                    } 
                }
            }
        </script>
            <?php 
            $q = "SELECT * FROM customer";
            $r = mysqli_query($dbc, $q);
            $customers = mysqli_fetch_all($r);
            // echo '<pre>'; var_dump($customers); echo '</pre>';
            // $query = "SELECT id, date FROM orders";
            // $result = mysqli_query($dbc, $query);
            // $orders = mysqli_fetch_all($result);
            // echo '<pre>'; var_dump($orders); echo '</pre>';
            // ?>
            <table id="customers">
                <tr class="header">
                    <th class = normal id="left">Customer ID</th>
                    <th class = normal>Name</th>
                    <th class = normal>Phone</th>
                    <th class = normal> Email</th>
                    <th class = normal>Order ID</th>
                    <th class = normal>Order Date</th>
                </tr>

            <?php 
            $i = 0;
            while ($i < count($customers)) {
                $id = $customers[$i][0];
                // echo $id;
                $query = "SELECT id, date FROM orders WHERE customer_id = $id";
                // echo $query;
                $result = mysqli_query($dbc, $query);
                $orders = mysqli_fetch_all($result);
                $num = count($orders); 
                // echo '<pre>'; var_dump($orders); echo '</pre>';

                echo '<tr>';
                echo '<td class="table" id="left" rowspan='; echo $num; echo '>'; echo $customers[$i][0]; echo '</td>';
                echo '<td class="table" rowspan='; echo $num; echo '>'; echo $customers[$i][1]; echo '</td>';
                echo '<td class="table" rowspan='; echo $num; echo '>'; echo $customers[$i][2]; echo '</td>';
                echo '<td class="table" rowspan='; echo $num; echo '>'; echo $customers[$i][3]; echo '</td>';

                $x=0;
                if ($num==1){
                    echo '<td class="table">'; echo $orders[0][0]; echo '</td>';
                    echo '<td class="table">'; echo $orders[0][1]; echo '</td>';
                    echo '</tr>';
                }else {
                    while ($x < $num){
                        if ($x==0){
                            echo '<td class="table">'; echo $orders[$x][0]; echo '</td>';
                            echo '<td class="table">'; echo $orders[$x][1]; echo '</td>';
                            echo '</tr>';
                        } else{
                            echo '<tr>';
                            echo '<td class="table">'; echo $orders[$x][0]; echo '</td>';
                            echo '<td class="table">'; echo $orders[$x][1]; echo '</td>';
                            echo '</tr>';
                        }
                        $x++;
                    }
                }
                $i++;
            }
            ?>
                <tr> 
                    
                </tr>
            </table>
        </section>
        <div class="footer"> Copy right 2018</div>
    </section>
</body>
</html>