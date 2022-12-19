function setLabelValue(label, input) {
	label.innerHTML = `${input.value}`;
}

function setStartValueCustomSlider(inputStart, inputEnd, pseudoEl, range) {
	const maximum = Math.min(parseInt(inputStart.value), parseInt(inputEnd.value) - 1);
	const percent = ((maximum - inputStart.min) / (inputStart.max - inputStart.min)) * 100;
	pseudoEl.style.left = percent + '%';
	range.style.left = percent + '%';

	if (Math.ceil(100 - parseInt(thumbRight.style.right)) == Math.ceil(percent)) {
		thumbRight.style.right = 100 - percent - 5 + '%';
		range.style.right = 100 - percent - 5 + '%';
		labelMax.innerHTML = parseInt(150 - (150 / 100 * (100 - percent - 5)));
		inputEnd.value = parseInt(150 - (150 / 100 * (100 - percent - 6)));
	}
}

function setEndValueCustomSlider(inputEnd, inputStart, pseudoEl, range) {
	const minimun = Math.max(parseInt(inputEnd.value), parseInt(inputStart.value) + 1);
	const percent = ((minimun - inputEnd.min) / (inputEnd.max - inputEnd.min)) * 100;
	pseudoEl.style.right = 100 - percent + '%';
	range.style.right = 100 - percent + '%';

	if (parseInt(thumbLeft.style.left) + 1 == Math.ceil(percent)) {
		thumbLeft.style.left = percent - 5 + '%';
		range.style.left = percent - 5 + '%';
		labelMin.innerHTML = parseInt(150 / 100 * (percent - 5));
		inputStart.value = parseInt(150 / 100 * (percent - 6));
	}
}


function setEvents(
	inputStart,
	inputEnd,
	thumbLeft,
	thumbRight,
	labelMin,
	labelMax,
	rangeBetween,
) {
	inputStart.addEventListener('input', () => {
		setStartValueCustomSlider(inputStart, inputEnd, thumbLeft, rangeBetween);
		setLabelValue(labelMin, inputStart);
	});

	inputEnd.addEventListener('input', () => {
		setEndValueCustomSlider(inputEnd, inputStart, thumbRight, rangeBetween);
		setLabelValue(labelMax, inputEnd);
	});
}

const slider = document.querySelector(".range-slider");
const inputs = slider.querySelectorAll('input');

const thumbLeft = slider.querySelector('.thumb.left');
const thumbRight = slider.querySelector('.thumb.right');
const rangeBetween = slider.querySelector('.range-between');
const labelMin = slider.querySelector('.range-label-start');
const labelMax = slider.querySelector('.range-label-end');

const [inputStart, inputEnd] = inputs;
const min = parseInt(inputStart.value);
const max = parseInt(inputEnd.value);

// setStartValueCustomSlider(inputStart, inputEnd, thumbLeft, rangeBetween);
// setEndValueCustomSlider(inputEnd, inputStart, thumbRight, rangeBetween);

setEvents(inputStart, inputEnd, thumbLeft, thumbRight, labelMin, labelMax, rangeBetween);