let modalBtns = document.querySelectorAll(".open-modal")
let modalWindow = document.querySelector('.modal-window .modal-header');
let modalWindow2 = document.querySelector('.modal-window');
let cursor_x = -1;
let cursor_y = -1;
let timer;

document.onmousemove = function (event) {
    cursor_x = event.pageX;
    cursor_y = event.pageY;
}

function changePos() {
    modalWindow2.style.left = cursor_x + 'px';
    modalWindow2.style.top = cursor_y + 'px';
}

modalWindow.onmousedown = function (e) {
    if (timer == undefined) timer = setInterval(changePos, 100);
}
document.onmouseup = function (e) {
    clearInterval(timer);
    timer = undefined;
}

modalBtns.forEach(item => {
    item.onclick = function () {
        let name = this.getAttribute("data-for")
        console.log(name)
        let modal = document.querySelector(`[data-name='${name}']`)
        modal.classList.toggle("hidden-modal")
    }
})

let modalCloseBtns = document.querySelectorAll(".close-modal")

modalCloseBtns.forEach(item => {
    item.onclick = function () {
        let modals = document.querySelectorAll(`.modal`)
        modals.forEach(modal => {
            modal.classList.add("hidden-modal")
        })
    }
})