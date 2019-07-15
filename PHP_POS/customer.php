<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css/semantic.min.css">
    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="js/semantic.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/customerStyle.css">
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>


<?php
    include "dbConnection.php";
?>
<?php
$SQL = "SELECT * FROM customer";
$resultset = mysqli_query($connection,$SQL);
?>
<?php
include "dbConnection.php";
$query = "select * from customer";
$ressult = mysqli_query($connection,$query);
?>

<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" id="header" >
                <div class="row">
                    <div class="col-md-3">
                        <div id="title" >POS System</div>
                    </div>
                    <div class="col-md-1">
                        <div class="nav-item" >Home</div>
                    </div>
                    <div class="col-md-1">
                        <div class="nav-item" >AboutUS</div>
                    </div>
                    <div class="col-md-1">
                        <div class="nav-item" >services</div>
                    </div>
                    <div class="col-md-6">
                        <div id="log-out" ><button class="ui blue button">Log Out</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<aside >
    <div class="row">
        <div class="col-md-2"  >
            <div class="row">
                <div>
                    <div id="admin" class="item">
                        <img src="images/admin.jpg" alt="" id="img-admin">
                        <lable id="label-admin">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAdmin User</lable>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="aside_one">
                    <div class="item"><label class="side-item"><a href="index.php" style="color: white;text-decoration: none">Dash Board</a></label></div>
                </div>
            </div>
            <div class="row">
                <div class="aside_one">
                    <div class="item"><label class="side-item"><a href="customer.php" style="color: white;text-decoration: none"><i class="users"></i> Customer</a></label></div>
                </div>
            </div>
            <div class="row">
                <div class="aside_one">
                    <div class="item"><label class="side-item"><a href="item.php" style="color: white;text-decoration: none"><i class="boxes"></i>Item</a></label></div>
                </div>
            </div>
            <div class="row">
                <div class="aside_one">
                    <div class="item"><label class="side-item"><a href="order.php" style="text-decoration: none;color: white"><i class="shopping-cart"></i>Order</a></label></div>
                </div>
            </div>
            <div class="row">
                <div class="aside_one">
                    <div class="item"><label class="side-item"><a href="#" style="color: white;text-decoration: none"><i class="chart-line"></i> Report</a></label></div>
                </div>
            </div>
            <div class="row">
                <div class="aside_one">
                    <div class="item" style="height: 300px;border-bottom: none"><label class="side-item"></label></div>
                </div>
            </div>
        </div>

        <div class="col-md-10"  style="margin-left: 0px;padding-left: 0px" >
            <br><br><br>
            <form id="customer_form">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-2">

                    <label class="label">Customer ID</label>
                </div>
                <div class="col-md-5">
                    <input type="text" id="cid" name="cid" style="width: 620px;height: 50px; border-radius: 10px;font-size: 16px;font-weight: bold;border-color:#0f6674;">
                </div>
                <div class="col-md-2">
                    <button class="crud-btn" style="background-color: #1e77ba;border-color:#1e77ba">Search</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <label class="label">Customer Name</label>
                </div>
                <div class="col-md-6">
                    <input type="text" id="name" name="name" class="cus_input">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <label class="label">Customer Address</label>
                </div>
                <div class="col-md-6">
                    <input type="text" id="address" name="address" class="cus_input">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <label class="label">E-mail Address</label>
                </div>
                <div class="col-md-6">
                    <input type="text" id="email" name="email" class="cus_input">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <label class="label">Credit Limit</label>
                </div>
                <div class="col-md-6">
                    <input type="text" id="credit" name="credit" class="cus_input">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2"></div>
                <div>
                    <button class="crud-btn" style="background-color: rebeccapurple;border-color: #5a30b5" id="save_btn" >Save</button>
                    <button class="crud-btn" style="background-color: darkgreen;border-color: green" id="update_btn">Update</button>
                    <button class="crud-btn" style="background-color: #ac0013;border-color: #a71d2a " id="delete_btn">Delete</button>
                </div>
            </div>
            </form>
            <br><br>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <table id="table" width="90%">
                        <thead>
                        <tr>
                            <th>&nbsp&nbsp&nbsp&nbsp&nbspCustomer ID</th>
                            <th>&nbsp&nbsp&nbsp&nbsp&nbspCustomer Name</th>
                            <th>&nbsp&nbsp&nbsp&nbsp&nbspCustomer Address</th>
                            <th>&nbsp&nbsp&nbsp&nbsp&nbspE-mail Address</th>
                            <th>&nbsp&nbsp&nbsp&nbsp&nbspCredit Limit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                         while ($rowdata = $resultset->fetch_assoc()):?>
                        <tr>
                            <td ><?php echo $rowdata['cid '] ?></td>
                            <td><?php echo $rowdata['name'] ?></td>
                            <td><?php echo $rowdata['address'] ?></td>
                            <td><?php echo $rowdata['email'] ?></td>
                            <td><?php echo $rowdata['credit'] ?></td>
                        </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <footer  >
            <div class="row">
                <div class="col-md-2" style="background-color: #0d71bb;"></div>
                <div class="col-md-10" id="footer" style="background-color:#0d71bb;padding: 6px ">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="btn-footer">
                                <button class="ui facebook button">
                                    <img src="images/fb.JPG" alt="" class="img-social">
                                    Facebook
                                </button>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="btn-footer" style="width: 340px">
                                <button class="ui youtube button">
                                    <img src="images/ut.JPG" alt="" class="img-social">
                                    YouTube
                                </button>
                            </div>
                        </div>
                        <div class="col-md-2" style="width: 340px">
                            <div class="btn-footer">
                                <button class="ui google plus button">
                                    <img src="images/gl.JPG" alt="" class="img-social">
                                    Google Plus
                                </button>
                            </div>
                        </div>
                        <div class="col-md-2" style="width: 340px">
                            <div class="btn-footer">
                                <button class="ui linkedin button">
                                    <img src="images/li.JPG" alt="" class="img-social">
                                    LinkedIn
                                </button>
                            </div>
                        </div>
                        <div class="col-md-2" style="width: 340px">
                            <div class="btn-footer">
                                <button class="ui linkedin button" id="whtapp">
                                    <img src="images/wp.JPG" alt="" class="img-social">
                                    WhatsApp
                                </button>
                            </div>
                        </div>
                        <div class="col-md-2" style="width: 340px">
                            <div class="btn-footer">
                                <button class="ui linkedin button">
                                    <img src="images/tw.JPG" alt="" class="img-social">
                                    Twitter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
</aside>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="customerManage/saveCustomer.js"></script>
<script src="customerManage/updateCustomer.js"></script>
<script src="customerManage/deleteCustomer.js"></script>
</body>
</html>