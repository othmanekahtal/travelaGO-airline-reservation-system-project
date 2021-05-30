import {redirectTo} from './functions.js';
//////////////////////////////////////////////////////////////
///////////////////////////////////////////VARIABLES ::

let add__depart_date = document.querySelector('.add__depart-date');
let add__limit_place = document.querySelector('.add__limit-place');
let add__arrival_date = document.querySelector('.add__arrival-date');
let add__arrival = document.querySelector('.add__arrival');
let add__departure = document.querySelector('.add__departure');
let add__trademark = document.querySelector('.add__trademark');
const ApplyBtn = document.querySelector('.ApplyButton');
const cancelBtn = document.querySelector('.CancelButton');


//////////////////////////////////////////////////////////////////////
//////////////////////////////////////// EVENTS ::
cancelBtn.addEventListener('click', () => {
    redirectTo('http://localhost/TravelaGO/Source/dashboard/admin');
});

ApplyBtn.addEventListener('click', async function () {
    if (add__depart_date.value && add__limit_place.value && add__arrival_date.value && add__arrival.value && add__departure.value && add__trademark.value) {
        let request = await fetch('http://localhost/TravelaGO/Source/dashboard/addflight', {
            method: 'POST',
            body: JSON.stringify({
                'departDate': add__depart_date.value.trim(),
                'arrivalDate': add__arrival_date.value.trim(),
                'departure': add__departure.value.trim(),
                'arrival': add__arrival.value.trim(),
                'resetPlace': add__limit_place.value.trim(),
                'Trademark': add__trademark.value.trim()
            })
        })
        let respond = await request.json();
        console.log(respond);
        if (respond) {
            swal("Success! flight has been updated!", {
                icon: "success",
                buttons: {
                    content: "ok"
                }
            });
            add__depart_date.value =
                add__departure.value =
                    add__arrival_date.value =
                        add__arrival.value =
                            add__limit_place.value =
                                add__trademark.value = "";
        }
    } else {
        swal('Something is Wrong', "fields is empty, Try again !", {
            icon: "error",
            dangerMode: true,
        });
    }
});