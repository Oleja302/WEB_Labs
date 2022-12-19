let tabNavItems = document.querySelectorAll(".tabs .tabs-nav ul li a")

tabNavItems.forEach(item=>{
    item.onclick = function (){


        if (this.parentNode.hasAttribute("disabled"))
        {
            console.log("disabled")
            return;
        }

        let href = this.href.split("#")
        console.log("test", href[1])

        let tabNavItems2 = document.querySelectorAll(".tabs .tabs-nav ul li a")
        tabNavItems2.forEach(sub=>{
            sub.classList.remove("active")
            console.log("We are here")
        })

        let tabItems = document.querySelectorAll(".tabs .tabs-content .tab-item")
        tabItems.forEach(sub=>{
            sub.classList.remove("active")
            sub.classList.add("hidden")
            console.log("We are here")
        })

        let activeTab = document.querySelector("#"+href[1])


        activeTab.classList.remove("hidden")
        activeTab.classList.add("active")
        this.classList.add("active")

    }
})