$("#save_btn").click(function () {
    var updateItem = $("#item_form").serialize();
    $.ajax({
        url : "itemManage/updateItem.php",
        method : "POST",
        async : true,
        data : updateItem
    }).done(function (res) {
        alert(res);
    })
});