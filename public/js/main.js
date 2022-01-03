const deleteRadio = document.getElementById('-');
const yearInput = document.querySelectorAll("input[name='year[]']");

function resetYearsRadio(){
    const yearsRadios = document.querySelectorAll("input[name='year[0]']");
    yearsRadios.forEach(input => {
        input.checked = false;
    });
}

deleteRadio.addEventListener('click', resetYearsRadio)