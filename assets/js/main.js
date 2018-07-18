// User object to hold all form data
let userObj = {};

// Select all placeholders of all input tags and then generate errors on them in the client-side firstly.
let plcHldElements = Array.from(document.querySelectorAll('.focus-inputElement[data-placeholder]'));
let placeholders = [];

// plcHldElements.forEach((data) => {
//     placeholders.push(data.getAttribute('data-placeholder'));
// })


// GENERAL INPUT ELEMENTS FROM SIGNUP
let inputElements = Array.from(document.querySelectorAll('.inputElement'));

// When an input has value, the placeholder shouldn't be down. Rather it should have this new class.
inputElements.forEach((data) => {

    data.addEventListener("blur", () => {
        var str = data.value;
        if (str.trim() != "") {
            data.classList.add('has-val');
        } else {
            data.classList.remove('has-val');
        }
    });

    var plcHolder = data.nextElementSibling.getAttribute('data-placeholder');
    var plcHolderOld = plcHolder;

    data.addEventListener("focusout", () => {
        userObj[data.name] = data.value;
        if (data.name.search("Name") !== -1) {
            if (!(validateName(userObj[data.name]))) {
                var textNode = " - Name should be more than 2 and less than 25 characters.";
                if (plcHolder.search(textNode) == -1) //If it already exists, don't append
                    plcHolder += textNode;
                data.nextElementSibling.setAttribute('data-placeholder', plcHolder);
            } else {
                data.nextElementSibling.setAttribute('data-placeholder', plcHolderOld);
            }
        }
    });

});



// Show or hide the password on login/signup

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

// GENERAL PURPOSE FUNCTIONS
function validateName(name) {
    if (name.length >= 2 && name.length <= 25) {
        return true;
    } else {
        return false;
    }
}


