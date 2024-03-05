$('.sqlResultFriends').click(function (event) {
    event.preventDefault();

    let id = this.id

    $.ajax({
        url: '../../../vendor/schedulePro/contact/addDialog.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id
        },
        success (data) {

            if (data.status) {
                document.location.href = '../../../php/schedulePro/chat.php'
            } else {
                if (data.type === 1) {
                    alert('Произошла неизвестная ошибка, повторите попытку позже.')
                }
            }
        }
    });
});