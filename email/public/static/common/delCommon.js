function delData(id, url) {
    $.ajax({
        type: "POST",
        url: url,
        data: {
            id: id
        },
        dataType: "json",
        success: function (res) {

        }, error: function (xhl) {
            return xhl.responseText();
        }
    });
}