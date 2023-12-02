let result = document.querySelector('.opt_main_containers_container_opt_one')

let btn_back = document.querySelector('.btn_main_containers_container_back')
btn_back.onclick = function () {
    document.location.href = '../../html/auth/auth.html'
}


let btn_enter = document.querySelector('.btn_main_containers_container_continue')
btn_enter.onclick = function () {
    if (result.value === 'teacher') {
        document.location.href = '../../html/auth/register_teacher_step.html'
    } else if (result.value === 'student') {
        document.location.href = '../../html/auth/register_student_step.html'
    } else {
        alert("Вы должны выбрать один из вариантов")
    }
}