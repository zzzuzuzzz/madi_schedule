function send() {
    $.ajax({
        method: "POST",
        type: "POST",
        url: "https://raspisanie.madi.ru/tplan/tasks/tableFiller.php",
        header: {  'Access-Control-Allow-Origin': '*' },
        dataType: 'jsonp',
        data: "tab=7&gp_name=1%D0%904&gp_id=9403",
        success: function (data) {
            if (data === 'success'){
                alert('Подключение успешно!')
            }
        }
    })
}