AOS.init();
function validateForm() {
    const responseInputs = document.querySelectorAll('.response__input');
    let responseSelected = false;
    let band = true, focus = false;

    for (var i = 0; i < responseInputs.length; i++) {
        if (responseInputs[i].checked) {
            responseSelected = true;
            break;
        }
    }
    const requiredBox = document.querySelector('.box__response');

    if (!responseSelected) {
        requiredBox.style.border = '1px solid #ff0000';
        const firstInputElement = requiredBox.querySelector('.response__input');
        if (firstInputElement) {
            focus = true;
            firstInputElement.focus();
        }
        band = false;
    }
    const requiredFields = document.querySelectorAll('.form__required');

    for (var i = 0; i < requiredFields.length; i++) {
        if (requiredFields[i].value.trim() === "") {
            requiredFields[i].style.border = '1px solid #ff0000';
            if(!focus) {
                focus = true;
                requiredFields[i].focus(); 
            }
            band = false;
        } 
    }
    return band; 
}

function resetBorderInput(e) {
    e.target.style.border = '1px solid #c88397'; 
}

function resetBorderBox() {
    const requiredBox = document.querySelector('.box__response');
    requiredBox.style.border = 'none';
}