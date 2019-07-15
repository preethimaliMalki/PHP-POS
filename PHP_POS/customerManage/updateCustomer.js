$("#update_btn").click(function () {
    var customerUpdate = $("#customer_form").serialize();
    $.ajax({
        url : "customerManage/updateCustomer.php",
        method : "POST",
        async : true,
        data : customerUpdate
    }).done(function (res) {
        alert(res);
    })
});