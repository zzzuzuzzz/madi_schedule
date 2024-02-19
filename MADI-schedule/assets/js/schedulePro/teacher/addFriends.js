$('.pChat').click(function () {
    document.location.href = '../../../../php/schedulePro/teacher/chatTeacher.php'
})

$('.sqlResultButtonFromList').click(function (event) {

    let id = this.id

    $.ajax({
        url: '../../../../vendor/schedulePro/teacher/addFriends.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id
        },
        success (data) {

            if (data.status) {
                alert('Запрос успешно одобрен.')
            } else {
                if (data.type === 1) {
                    alert('Ошибка. Напишите в службу поддержки.')
                } else if (data.type === 2) {
                    alert('Пользователь уже у вас в друзьях.')
                }
            }
        }
    });
});