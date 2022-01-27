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

function newResult({ id, title, author, year, type }) {
    return (`
    <a href="/publication-detail/${id}">
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
    </a>
    `);
}

function allNewResults( rawResults ){
    let result = "";

    if( rawResults.status == "404"){
        currentResults = null;
        return null;
    }

    rawResults.forEach( rawResult => {
        result += newResult({
            id : rawResult.id ,
            title : rawResult.title ,
            author : rawResult.author ,
            year : rawResult.year ,
            type : rawResult.type
        });
    });

    currentResults = rawResults;
    return result;
}

function populateResults( rawResults ){
    const profile = document.getElementById('profile');
    hide(profile);

    const filterSection = document.getElementById('filter');
    hide(filterSection);

    const newResults = allNewResults( rawResults );
    console.log('New Results : ' + newResults);

    const resultsContainer = document.getElementById('results');
    console.log('Results Container : ' + resultsContainer);
    
    if( newResults == null )
    resultsContainer.innerHTML = `<p id="not-found" class="col center">Hasil Tidak Ditemukan</p>`;
    else
    resultsContainer.innerHTML = newResults;

    const resultSection = document.getElementById('result-search');
    show(resultSection);
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
        
            console.log('Fetch Results : ' + Object.toString(result));
            populateResults(result);

        })
}

function showOrHide( component ){

    console.log(component.style.display);

    if(component.style.display == 'none' || component.style.display == ''){
        show(component);
    }else{
        hide(component);
    }

}

function show( component ){
    const main = document.getElementById('main-content');
    main.style.opacity = 0;
    
    setTimeout(() => {
        component.style.display = 'flex';
        main.style.opacity = 1;
    },500)
}

function hide( component ){
    const main = document.getElementById('main-content');
    main.style.opacity = 0;
    
    setTimeout(() => {
        component.style.display = 'none';
        main.style.opacity = 1;
    },500)

}

function sortByName(){
    const sortInput = document.getElementById('abjad');
    const sortAscending = sortInput.value == 'ascending';

    console.log("Order Ascending : " + sortAscending);

    if(sortAscending)
    currentResults.sort();
    else
    currentResults.reverse();

    populateResults(currentResults);
    console.log(JSON.stringify(currentResults));
}

function sortByYear(){
    const sortInput = document.getElementById('tahun-terbit');
    const sortValue = sortInput.value;
    console.log("Order by Year : " + sortValue);

    if(sortValue == '-')
    return;

    currentResults.sort((a,b) => {
        if(sortValue == 'terlama')
        return a.year - b.year;
        else if(sortValue == 'terbaru')
        return b.year - a.year;
    })

    populateResults(currentResults);
}

function sortByPopularity(){
    const sortInput = document.getElementById('popularitas');

    if(sortInput.value == "paling populer"){
        currentResults.sort( (a , b) => {
            return b.access - a.access;
        });

        populateResults(currentResults);
    }

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

const searchInput = document.querySelector("input[name='title']");
searchInput.addEventListener('keyup', event => {
    if( event.keyCode == 13 )
    submitButton.click();
})

const filterButton = document.getElementById('filter-button');
filterButton.addEventListener('click', () => {
    const filterSection = document.getElementById('filter');
    showOrHide(filterSection);
    
    const profile = document.getElementById('profile');
    hide(profile);
})

let currentResults;

const sortByNameInput = document.getElementById('abjad');
sortByNameInput.addEventListener('change', sortByName);

const sortByYearInput = document.getElementById('tahun-terbit');
sortByYearInput.addEventListener('change', sortByYear);

const sortByPopularityInput = document.getElementById('popularitas');
sortByPopularityInput.addEventListener('change', sortByPopularity);