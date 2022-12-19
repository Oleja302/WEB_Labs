let accItem = document.getElementsByClassName('accordionItem');
let accHD = document.getElementsByClassName('accordionItemHeading');

let btnSort = document.querySelector('.accordionNav .sort');
btnSort.addEventListener("click", sort);

let btnRev = document.querySelector('.accordionNav .reverse');
btnRev.addEventListener("click", function () { document.querySelector('.accordionItems').classList.toggle('reverse'); });

for (i = 0; i < accHD.length; i++) {
	accHD[i].addEventListener('click', toggleItem, false);
}

function toggleItem() {
	let itemClass = this.parentNode.className;
	for (i = 0; i < accItem.length; i++) {
		accItem[i].className = 'accordionItem close';
	}
	if (itemClass == 'accordionItem close') {
		this.parentNode.className = 'accordionItem open';
	}
}

function sort() {
	let sortedItems = Array.prototype.slice.call(accItem).sort(function (a, b) {
		if (a.textContent < b.textContent) { return -1; }
		if (a.textContent > b.textContent) { return 1; }
		return 0;
	});

	for (i = 0; i < sortedItems.length - 1; i++) {
		for (j = i + 1; j < sortedItems.length; j++) { sortedItems[i].after(sortedItems[j]); }
	}
}