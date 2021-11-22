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
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <link href="../assets/css/customerM.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<style>
    /* .form_input {
        border: none;
    } */
</style>

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
                        <a href="report.php"><i class="fa fa-bar-chart-o fa-3x"></i> Report</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>MP POS - Place Order</h2>
                    </div>
                </div>
                <hr />
                <div class="m_content">
                    <div class="m_card">
                        <form id="order_form" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="form-label" style="margin-top: 3px!important;">OrderID</label>
                                    <input type="text" name="oid" id="oid" class="form-control" placeholder="Order ID">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" style="margin-top: 3px!important;">Select Customer</label>
                                    <select id="cid" name="cid" class="form-control">
                                        <option selected>Choose Customer...</option>
                                    </select>
                                </div>
                            </div>
                            <div class=" form-row">
                                <div class="form-group col-md-6">
                                    <label class="form-label" style="margin-top: 3px!important;">Select Item</label>
                                    <select id="item" class="form-control" name="code">
                                        <option selected>Choose ITEM...</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" style="margin-top: 3px!important;">ItemName</label>
                                    <input id="itemName" type="text" class="form-control" disabled placeholder="ItemName">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="form-label" style="margin-top: 3px!important;">Avilable Qty</label>
                                    <input id="avi_qty" type="text" disabled class="form-control" placeholder="Qty">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" style="margin-top: 3px!important;">Unit Price</label>
                                    <input id="price" type="text" class="form-control" placeholder="Price" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" style="margin-top: 3px!important;">Buying Qty</label>
                                    <input id="qty" type="text" class="form-control" placeholder="Qty">
                                </div>
                                <div class="form-group col-12">
                                    <button id="addToCart" class="btn btn-success" type="button" style="height: 47px; margin-left: 22px;width: 148px!important;">Add To Cart</button>
                                    <button id="cancel" type="button" class="btn btn-secondary cancel" style="background-color: rgba(165, 69, 165, 0.87);color: whitesmoke;height: 47px;width: 120px!important;">CANCEL</button>
                                </div>
                            </div>
                            <hr>
                            <br>
                            <table id="tbl" class="table table-hover" style="border: none !important;width: 95%;">
                                <thead style="text-align: center; background-color: black;color: whitesmoke;height: 45px;">
                                    <div class="row">
                                        <th class="col-md-3">ItemCode</th>
                                        <th class="col-md-3">ItemName</th>
                                        <th class="col-md-2">Qty</th>
                                        <th class="col-md-3">UnitPrice</th>
                                    </div>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <div class="form-row bg-secondary">
                                <h3 id="tot" style="font-weight: bold;margin-left: 19px; font-size: 25px;">Total : 00.00</h3>
                            </div>
                            <div class="form-group" style="padding-top: 10px">
                                <button type="button" id="place_order" class="btn btn-primary float-right" style="height: 47px; margin-left: 22px;width: 148px!important;">Place Order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script>
        getCustomers();
        getItems();

        var avilable_qty;
        var buy_qty;
        var ItemCode;
        var qty;

        function getCustomers() {
            $.ajax({
                url: "../controllers/customer/read_single.php",
                method: "GET",
                async: true,
                dataType: "json"
            }).done(function(response) {
                console.log(response);
                for (var customer in response) {
                    $('#cid').append("<option>" + response[customer].CusID + "</option>");
                }
            });
        }

        function getItems() {
            $.ajax({
                url: "../controllers/item/read.php",
                method: "GET",
                async: true,
                dataType: "json"
            }).done(function(response) {
                console.log(response);
                for (var item in response) {
                    $('#item').append("<option>" + response[item].ItemCode + "</option>");
                }
            });
        }
        $('#item').change(function() {
            ItemCode = $(this).val().trim();
            console.log(ItemCode);
            if (ItemCode != "") {
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
                    avilable_qty = Number.parseInt(response.QTY);
                    $('#itemName').val(response.ItemName);
                    $('#avi_qty').val(response.QTY);
                    console.log(avilable_qty);
                    $('#price').val(response.UnitPrice);
                })
            }
        });
        $('#qty').keyup(function() {
            buy_qty = Number.parseInt($('#qty').val());
            console.log(buy_qty);
            if (avilable_qty < buy_qty) {
                alert("sorry we can suply" + avilable_qty + " items only ");
            }
        });

        $('#addToCart').click(function() {
            // var bol = false;
            // var row;
            // var newQ = Number.parseInt($('#qty').val());

            // $('#table tbody tr').each(function() {
            //     if ($(this).find("fd:first").text() == $("#item").val()) {
            //         bol = true;
            //         row = $(this);
            //         return;
            //     }
            // });
            // if (bol) {
            //     var oldQ = Number.parseInt($(row).find("td:eq(2)").text());
            //     $(row).find("td:eq(2)").text(newQ + oldQ);
            // } else
            if (avilable_qty <= buy_qty) {
                alert("sorry we can suply" + avilable_qty + " items only ");

            } else {
                qty = avilable_qty - buy_qty;
                $.ajax({
                    url: "../controllers/item/updateQty.php",
                    method: "POST",
                    async: true,
                    data: {
                        ItemCode: ItemCode,
                        qty: qty
                    }
                }).done(function(resp) {
                    alert(resp);
                });
                $('#tbl tbody').append(
                    "<tr>" +
                    "<td>" + $('#item').val() + "</td>" +
                    "<td>" + $('#itemName').val() + "</td>" +
                    "<td>" + $('#qty').val() + "</td>" +
                    "<td>" + $('#price').val() + "</td>" +
                    "</tr>"
                );
            }

            countTotal();
            clearCartData();
        });
        $('#tbl tbody').on('click', 'tr', function() {
            $('#item').val($(this).find("td:eq(0)").text());
            $('#itemName').val($(this).find("td:eq(1)").text());
            $('#qty').val($(this).find("td:eq(2)").text());
            $('#price').val($(this).find("td:eq(3)").text());
        });

        function countTotal() {
            var tot = 0;
            $("#tbl tbody tr").each(function() {
                var qty = parseInt($(this).find("td:eq(2)").text());
                var price = parseFloat($(this).find("td:eq(3)").text());

                tot += qty * price;
            });
            $("#tot").text("Total : " + tot);
        }
        $('#place_order').click(function() {
            var ItemCode = [];
            var buy_qty = [];
            var priceU = [];
            $('#tbl tbody tr').each(function() {
                var code = parseInt($(this).find("td:eq(0)").text());
                var qty = parseInt($(this).find("td:eq(2)").text());
                var price = parseFloat($(this).find("td:eq(3)").text());
                ItemCode.push(
                    code,
                );
                buy_qty.push(
                    qty,
                );
                priceU.push(
                    price,
                );
            });
            var oid = $('#oid').val();
            var CusID = $('#cid').val();
            $.ajax({
                url: "../controllers/order/create.php",
                method: "POST",
                async: true,
                data: {
                    oid: oid,
                    CusID: CusID,
                    ItemCode: ItemCode,
                    buy_qty: buy_qty,
                    price: priceU
                }
            }).done(function(res) {
                alert(res);
                clearAll();
                location.reload();
            })
        });

        function clearAll() {
            $('input').val("");
            $("#cid").val("");
            $('#tbl tbody').html("");
            $('#tot').text("Total : 00.00");
        }

        function clearCartData() {
            $('#item').val("");
            $('#itemName').val("");
            $('#avi_qty').val("");
            $('#price').val("");
            $('#qty').val(" ");
        }
    </script>
</body>

</html>