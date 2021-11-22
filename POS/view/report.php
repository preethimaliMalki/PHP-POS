<?php
?>

<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />

    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <link href="../assets/css/customerM.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">MP POS</a>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><a href="#" class="btn btn-danger square-btn-adjust">Logout</a> </div>

        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="../assets/img/find_user.png" class="user-image img-responsive" />
                    </li>
                    <li>
                        <a class="active-menu" href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="customer.php"><i class="fa fa-users fa-3x"></i> Customers</a>
                    </li>
                    <li>
                        <a href="item.php"><i class="fa fa-sitemap fa-3x"></i> Items</a>
                    </li>
                    <li>
                        <a href="order.php"><i class="fa fa-folder-o fa-3x"></i> Order</a>
                    </li>
                    <li>
                        <a href="report.php"><i class="fa fa-bar-chart-o fa-3x"></i> Reports</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Order Details</h2>
                    </div>
                </div>

                <hr />
                <div class="row">
                    <form action="">
                        <div class="form-row">
                            <div class="form-group col-3 float-left">
                                <input type="search" class="form-control" name="" id="search-form" placeholder="Search by ID">
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" style="border-color: rgba(46, 167, 235, 0.18)!important;">
                            <thead class="cus-table-head">
                                <tr>
                                    <th class="table-head-text">OrderID</th>
                                    <th class="table-head-text">CustomerID</th>
                                    <th class="table-head-text">Date</th>
                                    <th class="table-head-text">Item codes</th>
                                    <th class="table-head-text">QTY</th>
                                    <th class="table-head-text">UnitPrice</th>
                                </tr>
                            </thead>
                            <tbody id="tblBody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            getAll();
        });

        function getAll() {
            $.ajax({
                url: "../controllers/order/read.php",
                method: "GET",
                async: true,
                dataType: 'json'
            }).done(function(response) {
                console.log(response);
                var orderTable = "";
                for (var order in response) {
                    orderTable += "<tr>" +
                        "<td>" + response[order].oid + "</td>" +
                        "<td>" + response[order].CusID + "</td>" +
                        "<td>" + response[order].date + "</td>" +
                        "<td>" + response[order].ItemCode + "</td>" +
                        "<td>" + response[order].buy_qty + "</td>" +
                        "<td>" + response[order].price + "</td>" +
                        "</tr>";
                }
                $(orderTable).appendTo($("#tblBody"));
            });
        }
    </script>

</body>

</html>