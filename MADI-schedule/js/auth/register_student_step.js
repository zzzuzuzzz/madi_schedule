let btn_back = document.querySelector('.btn_main_containers_container_back')
btn_back.onclick = function () {
    document.location.href = '../../html/auth/register_1_step.html'
}

let result = document.querySelector('.opt_main_containers_container_opt_one')

let btn_enter = document.querySelector('.btn_main_containers_container_continue')
btn_enter.onclick = function () {
    if (result.value === 'unvalue') {
        alert('Вы должны выбрать один из вариантов')
    } else {
        document.location.href = '../../html/auth/register_final_step.html'
    }
}





// function next_doc(){document.location.href = '../../html/auth/register_final_step.html'}
//
// let form = document.querySelector('.main_containers_container')
// form.addEventListener('submit', next_doc)