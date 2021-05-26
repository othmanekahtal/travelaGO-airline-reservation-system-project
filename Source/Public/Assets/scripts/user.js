//profile menu bar :
import {profile} from './functions.js';

profile();
const date_search = document.getElementById('date_search');
const depart = document.getElementById('depart');
const arrival = document.getElementById('arrival');
const flights_date = document.getElementsByClassName('date_flight');
const flights_departure = document.getElementsByClassName('departure_flight');
const flights_arrival = document.getElementsByClassName('arrival_flight');
const btn_form_search = document.querySelector('.input__submit input');
btn_form_search.addEventListener('click', function (e) {
    e.preventDefault();
    const date_input = date_search.value;
    const depart_input = depart.value;
    const arrival_input = arrival.value;

    const Filter_By_Time = (element, Data_input) => {
        if (Data_input) {
            if (new Intl.DateTimeFormat('de-DE').format(new Date(element.textContent)) !== new Intl.DateTimeFormat('de-DE').format(new Date(Data_input
            ))) {
                element.parentElement.classList.add('hidden-element');
            }
        }
    }

    const Filter_Items = (element, Data_input) => {
        if (Data_input) {
            if (!element.parentElement.classList.contains('hidden-element')) {
                if (element.textContent.toLowerCase() !== Data_input.toLowerCase()) {
                    element.parentElement.classList.add('hidden-element');
                }
            }
            if (element.parentElement.classList.contains('hidden-element')) {
                if (element.textContent.toLowerCase() === Data_input.toLowerCase()) {
                    element.parentElement.classList.remove('hidden-element');
                }
            }
        }
    }

    [...flights_date].forEach(element => Filter_By_Time(element, date_input));
    [...flights_departure].forEach(element => Filter_Items(element, depart_input));
    [...flights_arrival].forEach(element => Filter_Items(element, arrival_input))
})

