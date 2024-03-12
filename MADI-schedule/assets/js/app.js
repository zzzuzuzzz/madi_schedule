if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('assets/js/sw.js')
        .then(()=> console.log("Зарегестрировали"))
        .catch(()=> console.log("Произошла ошибка"));
}