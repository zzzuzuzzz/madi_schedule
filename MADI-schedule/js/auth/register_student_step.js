let btn_back = document.querySelector('.btn_main_containers_container_back')
btn_back.onclick = function () {
    document.location.href = '../../html/auth/register_1_step.html'
}

function next_doc(){document.location.href = '../../html/auth/register_final_step.html'}

let form = document.querySelector('.main_containers_container')
form.addEventListener('submit', next_doc)