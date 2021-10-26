function sendToAjax(selector){
    $(selector).submit(function(event) {
        event.preventDefault();
        let formData =  $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '/wp-admin/admin-ajax.php',
            data:  formData,
            success: function(result) {
                alert(result)
            },
            error: function (result) {
                alert(result)
            }
        });
    });
}

sendToAjax('.js__send-from');