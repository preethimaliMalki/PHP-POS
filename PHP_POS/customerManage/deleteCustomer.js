$("#delete_btn").click(function () {
    var customerDelete = $("#customer_form");
    $.ajax({
        url : "customerManage/deleteCustomer.php",
        method : "POST",
        async : true,
        data : customerDelete
    }).done(function (res) {
        alert(res);
    })
});