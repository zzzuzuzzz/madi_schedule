let popup = document.getElementById('popup'),
    popupToggle = document.getElementById('avatar'),
    popupClose = document.querySelector('.close');

popupToggle.onclick = function () {
    popup.style.display = 'block';
};

popupClose.onclick = function () {
    popup.style.display = 'none';
};

window.onclick = function (e) {
    if (e.target === popup) {
        popup.style.display = 'none'
    }
}

