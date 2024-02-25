let avatar = false;

$('input[name="avatar"]').change(function (e) {
    avatar = e.target.files[0];
});

$('.saveLocalFriend').click(function (event) {
    event.preventDefault();

    let email = $('input[name="email"]').val(),
        firstName = $('input[name="firstName"]').val(),
        lastName = $('input[name="lastName"]').val(),
        select = $('select[name="select"]').val();

    let formData = new FormData();
    formData.append('firstName', firstName);
    formData.append('lastName', lastName);
    formData.append('email', email);
    formData.append('select', select);
    formData.append('avatar', avatar);

    $.ajax({
        url: '../../../vendor/schedulePro/contact/addContactLocal.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {

            if (data.status) {
                alert('Контакт успешно сохранен')
                document.location.href = '../../../php/schedulePro/addContactLocal.php'
            } else {
                if (data.type === 1) {
                    alert('Вы не ввели никакие данные. Мы не можем сохранить пустой контакт.')
                } else if (data.type === 2) {
                    alert('Ошибка при загрузки автарки')
                } else {
                    alert('Возникла непредвиденная ошибка. Повторите попытку позже или напишите в службу поддержки.')
                }
            }
        }
    });
});