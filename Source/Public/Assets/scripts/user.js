//profile menu bar :
import {profile, searchInHTMLCollection, search_box__input} from './functions.js';

profile();
const date_search = document.getElementById('date_search');
const depart = document.getElementById('depart');
const arrival = document.getElementById('arrival');
const flights_date = document.getElementsByClassName('date_flight');

const flights_trademark = document.getElementsByClassName('trademark_flight');

const btn_form_search = document.querySelector('.input__submit input');


/////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////ADD EVENTS :

btn_form_search.addEventListener('click', function (e) {
    e.preventDefault();
    const date_input = date_search.value;
    const depart_input = depart.value;
    const arrival_input = arrival.value;
    if (date_input === '' || depart_input === '' || arrival_input === '') {
        // alert('please fill forms');
        swal({
            title: "Did you fill fields?",
            text: "please fill fields to get result available !",
            icon: "error",
            dangerMode: true,
        });
    } else {
        [...flights_date].forEach(element => {
            if (new Intl.DateTimeFormat('de-DE')
                    .format(new Date(element?.parentElement.children[1].textContent)) === new Intl
                    .DateTimeFormat('de-DE').format(new Date(date_input)) &&
                element?.parentElement.children[2].textContent === depart_input &&
                element?.parentElement.children[3].textContent === arrival_input
            ) {
                element?.parentElement.classList.remove('hidden-element');
            } else {
                element?.parentElement.classList.add('hidden-element');
            }
        })
    }
})

search_box__input.addEventListener('keyup', function () {
    searchInHTMLCollection(flights_trademark, this)
})