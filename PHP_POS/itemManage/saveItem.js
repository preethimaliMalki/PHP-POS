$("#save_btn").click(function () {
    var addItem = $("#item_form").serialize();
    $.ajax({
        url : "itemManage/saveItem.php",
        method : "POST",
        async : true,
        data : addItem
    }).done(function (res) {
        alert(res);
    })
});