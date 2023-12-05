let btn_back = document.querySelector('.btn_main_containers_container_back')
btn_back.onclick = function () {
    document.location.href = '../../html/auth/auth.html'
}

let result = document.querySelector('.ipt_main_containers_container_email')

let btn_forgot = document.querySelector('.btn_main_containers_container_continue')
btn_forgot.onclick = function () {
    if (result.value === '') {
        alert('Введите почту')
    } else {
        document.location.href = '../../html/auth/forgot_2_step.html'
    }
}