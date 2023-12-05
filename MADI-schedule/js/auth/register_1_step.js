let result = document.querySelector('.opt_main_containers_container_opt_one')

let btn_back = document.querySelector('.btn_main_containers_container_back')
btn_back.onclick = function () {
    document.location.href = '../../html/auth/auth.html'
}


let form = document.querySelector('.main_containers_container')

form.addEventListener('submit', () => {
    if (result.value === '') {
        alert("Вы должны выбрать один из вариантов")
    }
})