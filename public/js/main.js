function resetYearsRadio() {
    const yearsRadios = document.querySelectorAll("input[name='year[0]']");
    yearsRadios.forEach(input => {
        input.checked = false;
    });
}

function resetYearsTextInput() {
    const yearInput = document.querySelectorAll("input[name='year[]']");
    yearInput.forEach(input => {
        input.value = '';
    });
}

function resetAllYearInputs() {
    resetYearsRadio();
    resetYearsTextInput();
}

function newResult({ title, author, year, type }) {
    return (`
    <div class="result row justify-between">
        <div class="result-content col">
            <h3>${title}</h3>
            <h4 class="author">${author}</h4>
            <h5 class="tags row">
                <p class="year">${year}</p>
                <p class="comma"> , </p>
                <p class="result-type">${type}</p>
             </h5>
            </div>
        <div class="result-decor"></div>                        
    </div>
    `);
}

function allNewResults( rawResults ){
    let result = "";
    rawResults.forEach( rawResult => {
        result += newResult({
            title : rawResult.title ,
            author : rawResult.author ,
            year : rawResult.year ,
            type : rawResult.type
        });
    });
    return result;
}

function populateResults( rawResults ){

    const newResults = allNewResults( rawResults );
    console.log('New Results : ' + newResults);

    const resultsContainer = document.getElementById('results');
    console.log('Results Container : ' + resultsContainer);

    resultsContainer.innerHTML = newResults;
}

function fetchResults(){
    const form = document.getElementById('main-form');
    const formData = new FormData(form);

    for (let entry of formData.entries()) {
        if(entry[1]=="")
        formData.delete(entry[0]);
    }
         
    let options = {
        method: 'POST',
        body: formData
    }

    fetch(
        "http://localhost:8080/sifalibsearch", 
        options).then(res =>
        res.json()).then( result => {
        
            console.log('Fetch Results : ' + result);
            populateResults(result);

        })
}

const resetRadio = document.getElementById('-');
resetRadio.addEventListener('click', resetAllYearInputs);

const yearTextInputs = document.querySelectorAll("input[name='year[]']");
yearTextInputs.forEach(input => {
    input.addEventListener('click', resetYearsRadio);
});

const yearsRadios = document.querySelectorAll("input[name='year[0]']");
yearsRadios.forEach(radioInput => {
    radioInput.addEventListener('click', resetYearsTextInput)
});

const submitButton = document.querySelector("button[type='button']");
submitButton.addEventListener('click', fetchResults);