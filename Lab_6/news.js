let formData = new FormData();
let btnPage = document.querySelectorAll(".news-nav button");
let input = document.querySelector(".search-news input[type='search']");
formData.append("type", "news");
let news = document.querySelector(".news");

//Sort
document.querySelector("#sort-news").onclick = function () { sortState = !sortState; };
document.getElementById("search-news").onclick = function () { btnPage[1].onclick() };

let titleArr = [];
let bodyArr = [];

//Close modal
let modalCloseBtns = document.querySelectorAll(".close-modal")
modalCloseBtns.forEach(item => {
    item.onclick = function () {
        let modals = document.querySelectorAll(`.modal`)
        modals.forEach(modal => {
            modal.classList.add("hidden-modal")
        })
    }
})

//Read cookie
if (document.cookie.length != 0) {
    document.cookie.split(";").forEach(function (c) {
        if (c.includes("title")) titleArr.push(c.split("=")[1]);
        else if (c.includes("body")) bodyArr.push(c.split("=")[1]);
    });

    for (let index = 0; index < titleArr.length; index++) {
        news.innerHTML +=
            `
                         <div class="news-item">
                                <div class="news-header cookie">
                                    <h3 class="cookie">${titleArr[index]}</h3>
                                </div>

                                <div class="news-body">
                                    <p>${bodyArr[index]}</p>
                                </div>
                                <div class="news-footer">
                                    <button class="open-modal" data-for="first-modal">Press me</button>
                                </div>
                        </div>
            `;
    }

    document.querySelectorAll(".open-modal").forEach(item => {
        item.onclick = function () {
            document.cookie.split(";").forEach(function (e) {
                if (e.split("=")[1] == item.parentElement.parentElement.querySelector('.news-header h3').textContent)
                    document.cookie.split(";").forEach(function (c) {
                        if (c.split("=")[0].replace(/\s/g, '') == `modal${e.split("=")[0].replace(/\s/g, '').match(/\d+/)[0]}`)
                            document.querySelector('.modal-body').innerHTML = `<h3>${c.split("=")[1]}</h3>`;
                    });
            });

            let name = this.getAttribute("data-for")
            let modal = document.querySelector(`[data-name='${name}']`)
            modal.classList.toggle("hidden-modal")
        }
    })
}

//Add function a page button
for (let i = 1; i < btnPage.length - 1; i++) {
    btnPage[i].onclick = function () {
        fetch('/ajax.php', {
            method: 'POST',
            body: formData
        })
            .then((response) => {
                return response.json()
            })
            .then((jsonArray) => {
                let tmp = '';

                btnPage.forEach(btn => btn.classList.remove('current'));
                this.classList.add('current');

                let btnValue = parseInt(btnPage[i].value, 10);

                if (sortState) jsonArray = jsonArray.sort((a, b) => a.title.localeCompare(b.title));

                if (jsonArray.filter(item => input.value.includes(item.title)).length != 0)
                    jsonArray = jsonArray.filter(item => input.value.includes(item.title));

                let j = 1;
                deleteAllCookies();
                jsonArray.slice(btnValue * 5 - 5, btnValue * 5).forEach(item => {
                    tmp += `
                     <div class="news-item">
                                <div class="news-header">
                                    <h3>${item.title}</h3>
                                </div>
    
                                <div class="news-body">
                                    <p>${item.body}</p>
                                </div>
                                <div class="news-footer">
                                    <button class="open-modal" data-for="first-modal">Press me</button>
                                </div>
                            </div>
                    `

                    document.cookie = `title${j}=${item.title}`;
                    document.cookie = `body${j}=${item.body}`;
                    document.cookie = `modal${j}=${item.modal}`;
                    j += 1;
                })

                news.innerHTML = tmp;

                document.querySelectorAll(".open-modal").forEach(item => {
                    item.onclick = function () {
                        fetch('/ajax.php', {
                            method: 'POST',
                            body: formData
                        }).then((response) => { return response.json() }).then((jsonArray) => {
                            jsonArray.forEach(item => {
                                if (item.title == this.parentElement.parentElement.querySelector('.news-header h3').textContent)
                                    document.querySelector('.modal-body').innerHTML = `<h3>${item.modal}</h3>`;
                            });
                        })

                        let name = this.getAttribute("data-for")
                        let modal = document.querySelector(`[data-name='${name}']`)
                        modal.classList.toggle("hidden-modal")
                    }
                })
            })
    }
}

btnPage[0].onclick = function () {
    let cur = document.querySelector(".current");
    if (parseInt(cur.value, 10) - 1 > 0) btnPage[parseInt(cur.value, 10) - 1].onclick();
}

btnPage[btnPage.length - 1].onclick = function () {
    let cur = document.querySelector(".current");
    if (parseInt(cur.value, 10) + 1 < btnPage.length - 1) btnPage[parseInt(cur.value, 10) + 1].onclick();
}

function deleteAllCookies() {
    const cookies = document.cookie.split(";");

    for (let i = 0; i < cookies.length; i++) {
        const cookie = cookies[i];
        const eqPos = cookie.indexOf("=");
        const name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}