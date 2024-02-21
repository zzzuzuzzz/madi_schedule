let avatar = false;

$('input[name="avatar"]').change(function (e) {
    avatar = e.target.files[0];
});

$('.btnSaveAvatar').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let formData = new FormData();
    formData.append('avatar', avatar);

    $.ajax({
        url: '../../vendor/schedulePro/profile/popup.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {

            if (data.status) {
                document.location.href = '../../php/schedulePro/profile.php';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                } else if (data.type === 2) {
                    console.log("ошибка")
                }

                $('.msg').removeClass('none').text(data.message);

            }

        }
    });

});