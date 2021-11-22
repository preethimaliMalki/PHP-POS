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
                        <form id="customerForm" method="post" class="row g-3">
                            <div class="col-md-6">
                                <label for="txtid" class="form-label">Customer ID</label>
                                <input type="number" class="form-control" name="CusID" id="txtid" placeholder="Customer ID">
                            </div>
                            <div class="col-md-6">
                                <label for="txtname" class="form-label">Name</label>
                                <input type="text" class="form-control" name="Name" id="txtname" placeholder="Name">
                            </div>
                            <div class="col-12">
                                <label for="txtaddress" class="form-label fm-1">Address</label>
                                <input type="text" class="form-control fm-1" name="Address" id="txtaddress" placeholder="1234 Main St">
                            </div>
                            <div class="col-12">
                                <label for="txtsalary" class="form-label fm-1">Salary</label>
                                <input type="text" class="form-control fm-1" name="Salary" id="txtsalary" placeholder="00.00">
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
                        <h2>View Customers</h2>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <form action="">
                        <div class="form-row">
                            <div class="form-group col-3 float-left">
                                <input type="search" class="form-control" name="" id="search-form" placeholder="Search by Name/ID">
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table id="tbl" class="table table-striped table-bordered table-hover" style="border-color: rgba(46, 167, 235, 0.18)!important;">
                            <thead class="cus-table-head">
                                <tr style="border-radius: 5px;">
                                    <th class="table-head-text">CusID</th>
                                    <th class="table-head-text">Name</th>
                                    <th class="table-head-text">Address</th>
                                    <th class="table-head-text">Salary</th>
                                </tr>
                            </thead>
                            <tbody id="tblBody" style="text-align: center;">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!--<script src="../assets/js/jquery-1.10.2.js"></script>-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <script>
        $('#update').hide();
        $('#delete').hide();

        $('#add').click(function() {
            var formData = $('#customerForm').serialize();
            $.ajax({
                url: "../controllers/customer/create.php",
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
            var formdata = $('#customerForm').serialize();
            $.ajax({
                url: "../controllers/customer/update.php",
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
            var CusID = $('#txtid').val().trim();
            console.log(CusID);
            $.ajax({
                url: "../controllers/customer/delete.php",
                method: "POST",
                async: true,
                data: {
                    CusID: CusID
                }
            }).done(function(resp) {
                alert(resp);
                location.reload();
            });
        })

        $('#search-form').keyup(function() {
            var CusID = $(this).val().trim();
            console.log(CusID);
            if (CusID != "") {
                $("#update").show();
                $("#cancel").show();
                $("#delete").show();
                $("#add").hide();
                $.ajax({
                    url: "../controllers/customer/search.php",
                    method: "POST",
                    async: true,
                    dataType: 'json',
                    data: {
                        CusID: CusID
                    }
                }).done(function(response) {
                    console.log(response);
                    $('#txtid').val(response.CusID);
                    $('#txtname').val(response.Name);
                    $('#txtaddress').val(response.Address);
                    $('#txtsalary').val(response.Salary);
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
                url: "../controllers/customer/read.php",
                method: "GET",
                async: true,
                dataType: 'json'
            }).done(function(response) {
                console.log(response);
                var cusTable = "";
                for (var customer in response) {
                    cusTable += "<tr>" +
                        "<td>" + response[customer].CusID + "</td>" +
                        "<td>" + response[customer].Name + "</td>" +
                        "<td>" + response[customer].Address + "</td>" +
                        "<td>" + response[customer].Salary + "</td>" +
                        "</tr>";
                }
                $(cusTable).appendTo($("#tblBody"));

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