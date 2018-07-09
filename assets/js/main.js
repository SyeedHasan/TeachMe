let inputElements = document.querySelectorAll('.inputElement');
inputElements = Array.from(inputElements);

inputElements.forEach((data) => {
    data.addEventListener("blur", () => {
        var str = data.value;
        if (str.trim() != "") {
            data.classList.add('has-val');
        } else {
            data.classList.remove('has-val');
        }
    });
});

var passBtn = document.querySelector('.btn-show-pass');
var eyeBtn = document.querySelector('.btn-show-pass i');
var showPass = 0;

passBtn.addEventListener('click', () => {
    var passElement = passBtn.nextElementSibling;

    if (showPass == 0) {
        passElement.setAttribute('type', 'text');
        eyeBtn.classList.remove('zmdi-eye');
        eyeBtn.classList.add('zmdi-eye-off');
        showPass = 1;
    } else {
        passElement.setAttribute('type', 'password');
        eyeBtn.classList.add('zmdi-eye');
        eyeBtn.classList.remove('zmdi-eye-off');
        showPass = 0;
    }
});