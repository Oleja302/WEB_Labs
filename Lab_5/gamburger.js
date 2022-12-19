let buttonCloses = document.querySelectorAll(".button-close")
buttonCloses.forEach(item => {

    item.onclick = function () {
        let modal = document.querySelector(".modal-window")
        modal.classList.add("hidden")

        let buttons = document.querySelectorAll(".button-open")
        buttons.forEach(item => {
            item.classList.remove("hidden")
        })
    }
})

let buttonOpens = document.querySelectorAll(".button-open")
buttonOpens.forEach(item => {
    item.onclick = function () {
        this.classList.add("hidden")
        let modal = document.querySelector(".modal-window")
        modal.classList.remove("hidden")
    }
})
