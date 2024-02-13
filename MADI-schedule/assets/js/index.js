$('.btnEnterToAuth').click(function () {
    document.location.href = '../../php/auth/auth.php'
})

$('.btnEnterToScheduleLite').click(function (event) {
    event.preventDefault();

    $(`select`).removeClass('error')

    let select = $('select[name="select"]').val();

    $.ajax({
        url: 'vendor/scheduleLite/cookie.php',
        type: 'POST',
        dataType: 'json',
        data: {
            select: select
        },
        success (data) {

            if (data.status) {
                document.location.href = '../../php/scheduleLite/schedule.php'
            } else {
                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`select[name="${field}"]`).addClass('error')
                    })
                }
                $('.msg').removeClass('none').text(data.message);
            }
        }
    });
});