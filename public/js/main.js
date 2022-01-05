function resetYearsRadio(){
    const yearsRadios = document.querySelectorAll("input[name='year[0]']");
    yearsRadios.forEach(input => {
        input.checked = false;
    });
}

function resetYearsTextInput (){
    const yearInput = document.querySelectorAll("input[name='year[]']");
    yearInput.forEach( input => {
        input.value = '';
    });
}

function resetAllYearInputs(){
    resetYearsRadio();
    resetYearsTextInput();
}

const resetRadio = document.getElementById('-');
resetRadio.addEventListener('click', resetAllYearInputs);

const yearTextInputs = document.querySelectorAll("input[name='year[]']");
yearTextInputs.forEach( input => {
    input.addEventListener('click' , resetYearsRadio);
});

const yearsRadios = document.querySelectorAll("input[name='year[0]']");
yearsRadios.forEach( radioInput => {
    radioInput.addEventListener('click', resetYearsTextInput)
});

