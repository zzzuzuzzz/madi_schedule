$('.btnBye').click(function (event) {
    event.preventDefault();

    $(`input`).removeClass('error')

    let text = $('input[name="email"]').val();

    $.ajax({
        url: '../../vendor/bye.php',
        type: 'POST',
        dataType: 'json',
        data: {
            text: text
        },
        success (data) {
            if (data.status) {
                alert('Спасибо за отзыв. Мы станем лучше!')
                document.location.href = '../../index.php'
            }
        }
    });
});