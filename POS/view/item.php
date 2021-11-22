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
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Customer Management</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <div class="row">
                    <div class="cus_shadow">
                        <form id="itemForm" method="POST" class="row g-3">
                            <div class="col-12">
                                <label class="form-label fm-1">Item Code</label>
                                <input type="text" class="form-control fm-1" name="ItemCode" id="txtid" placeholder="Item Code">
                            </div>
                            <div class="col-12">
                                <label class="form-label fm-1">Item Name</label>
                                <input type="text" class="form-control fm-1" name="ItemName" id="txtname " placeholder="Item Name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Item QTY</label>
                                <input type="email" class="form-control" name="QTY" id="txtqty" placeholder="Quantity">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Unit Price</label>
                                <input type="number" class="form-control" name="UnitPrice" id="txtprice" placeholder=".00">
                            </div>
                            <div class="col-12">
                                <button id="add" type="button" class="btn btn-primary new-btn" style="margin-left: 15px">Add</button>
                                <button id="update" type="button" class="btn btn-success new-btn">UPDATE</button>
                                <button id="cancel" type="button" class="btn btn-secondary new-btn cancel" style="background-color: rgba(165, 69, 165, 0.87);color: whitesmoke;">CANCEL</button>
                                <button id="delete" type="button" class="btn btn-danger new-btn">DELETE</button>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <h2>View Items</h2>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <form action="">
                        <div class="form-row">
                            <div class="form-group col-3 float-left">
                                <input type="search" class="form-control" name="" id="search-form" placeholder="Search by Name/code">
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" style="border-color: rgba(46, 167, 235, 0.18)!important;">
                            <thead class="cus-table-head">
                                <tr>
                                    <th class="table-head-text">ItemCode</th>
                                    <th class="table-head-text">ItemName</th>
                                    <th class="table-head-text">QTY</th>
                                    <th class="table-head-text">UnitPrice</th>
                                </tr>
                            </thead>
                            <tbody id="tblBody" style="text-align: center;">
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
        $('#update').hide();
        $('#delete').hide();

        $('#add').click(function() {
            var formData = $('#itemForm').serialize();
            $.ajax({
                url: "../controllers/item/create.php",
                method: "POST",
                async: true,
                data: formData
            }).done(function(resp) {
                console.log(resp);
                alert(resp);
                clearAll();
                location.reload();
            });
        });

        $('#update').click(function() {
            var formdata = $('#itemForm').serialize();
            $.ajax({
                url: "../controllers/item/update.php",
                method: "POST",
                async: true,
                data: formdata
            }).done(function(resp) {
                alert(resp);
                clearAll();
                location.reload();
            });
        });

        $('#delete').click(function() {
            var ItemCode = $('#txtid').val().trim();
            console.log(ItemCode);
            $.ajax({
                url: "../controllers/item/delete.php",
                method: "POST",
                async: true,
                data: {
                    ItemCode: ItemCode
                }
            }).done(function(resp) {
                alert(resp);
                location.reload();
            });
        })

        $('#search-form').keyup(function() {
            var ItemCode = $(this).val().trim();
            console.log(ItemCode);
            if (ItemCode != "") {
                $("#update").show();
                $("#cancel").show();
                $("#delete").show();
                $("#add").hide();
                $.ajax({
                    url: "../controllers/item/search.php",
                    method: "POST",
                    async: true,
                    dataType: 'json',
                    data: {
                        ItemCode: ItemCode
                    }
                }).done(function(response) {
                    console.log(response);
                    $('#txtid').val(response.ItemCode);
                    $('#txtname').val(response.ItemName);
                    $('#txtqty').val(response.QTY);
                    $('#txtprice').val(response.UnitPrice);
                })
            } else {
                clearAll();
                $('#update').hide();
                $('#delete').hide();
                $("#add").show();
            }
        })

        function getAll() {
            $.ajax({
                url: "../controllers/item/read.php",
                method: "GET",
                async: true,
                dataType: 'json'
            }).done(function(response) {
                console.log(response);
                var itemTable = "";
                for (var item in response) {
                    itemTable += "<tr>" +
                        "<td>" + response[item].ItemCode + "</td>" +
                        "<td>" + response[item].ItemName + "</td>" +
                        "<td>" + response[item].QTY + "</td>" +
                        "<td>" + response[item].UnitPrice + "</td>" +
                        "</tr>";
                }
                $(itemTable).appendTo($("#tblBody"));
            });
        }

        $(document).ready(function() {
            getAll();
            $("table tbody").on("click", 'tr', function(e) {
                var row = $(this);
                $("#update").show();
                $("#cancel").show();
                $("#delete").show();
                $("#add").hide();
                displayRow(row);
            });
            $('#cancel').click(function() {
                cancelFunc();
                location.reload();
            });
        });

        function cancelFunc() {
            $("#update").hide();
            $("#delete").hide();
            $("#cancel").show();
            $("#add").show();
            clearAll();
        }

        function displayRow(x) {
            var cols = $(x).children("td");
            var i = 0;
            $("input").each(function(e) {
                $(this).val($(cols[i]).text());
                i++;
            });
        }

        function clearAll() {
            $('input').each(function(e) {
                $(this).val("")
            })
        };
    </script>
</body>

</html>