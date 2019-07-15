
$("#save_btn").click(function () {
    var customerAdd = $("#customer_form").serialize();
    $.ajax({
        url:"customerManage/saveCustomer.php",
        method : "POST",
        async : true,
        data : customerAdd
    }).done(function (res) {
        alert(res);
    })
});