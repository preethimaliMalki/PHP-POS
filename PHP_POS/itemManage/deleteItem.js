$("#save_btn").click(function () {
    var deleteItem = $("#item_form").serialize();
    $.ajax({
        url : "itemManage/deleteItem.php",
        method : "POST",
        async : true,
        data : deleteItem
    }).done(function (res) {
        alert(res);
    })
});
