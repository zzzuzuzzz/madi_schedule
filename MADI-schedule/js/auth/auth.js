let btn_forgot_password = document.querySelector('.btn_main_containers_container_forgot_password')
btn_forgot_password.onclick = function () {
    document.location.href = 'forgot.html'
}
let btn_register = document.querySelector('.btn_main_containers_container_register')
btn_register.onclick = function () {
    document.location.href = 'register_1_step.html'
}
let form = document.querySelector('.main_containers_container')
form.addEventListener('submit', function (event) {
    event.defaultPrevented
    alert('ready')
})