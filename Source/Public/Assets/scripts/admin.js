import {profile, searchInHTMLCollection, search_box__input} from './functions.js';

//////////////////////////////////////////////////////////////
///////////////////////////////////////////VARIABLES ::

const flights_admin = document.getElementsByClassName('admins_flight');
const delete_collection = document.getElementsByClassName('action_flight__delete');
const edit_collection = document.getElementsByClassName('action_flight__edit');

const popUp = document.querySelector('.popup');
const popUpclose = document.querySelector('.popup__close');
const popUpCancelButton = document.querySelector('.popUpCancelButton');
const popUpApplyButton = document.querySelector('.popUpApplyButton');

const popup__limit_place = document.querySelector('.popup__limit-place');
const popup__depart_date = document.querySelector('.popup__depart-date');
const popup__arrival_date = document.querySelector('.popup__arrival-date');
const popup__arrival = document.querySelector('.popup__arrival');
const popup__departure = document.querySelector('.popup__departure');
const popup__trademark = document.querySelector('.popup__trademark');

//////////////////////////////////////////////////////////////////////
//////////////////////////////////////// FUNCTIONS ::
const closePop = () => {
    popUp.classList.add('hidden-element');
    popUp.classList.remove('d-flex');
}

profile();

//////////////////////////////////////////////////////////////////////
//////////////////////////////////////// EVENTS ::

search_box__input.addEventListener('keyup', function () {
    searchInHTMLCollection(flights_admin, this)
});

[...delete_collection].forEach(element => {
        element.addEventListener('click', function () {

            const id = this.parentElement.parentElement.children[0].textContent;

            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this flight !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then(async (willDelete) => {
                    if (willDelete) {
                        let respond = await fetch(`http://localhost/TravelaGO/Source/dashboard/deleteflight/${id}`);
                        respond = await respond.json();
                        if (respond) {
                            swal("success ! flight has been deleted!", {
                                icon: "success",
                            });
                            this.parentElement.parentElement.remove();
                        } else {
                            //error pop up here
                            swal({
                                title: "Unexpected error",
                                text: "please contact support, error in system !",
                                icon: "error",
                                button: "OK",
                            });
                        }
                    }
                });
            console.log(id)
        })
    }
);

[...edit_collection].forEach(element => {
    element.addEventListener('click', function () {
        popUp.classList.toggle('hidden-element');
        popUp.classList.add('d-flex');
        const id = this.parentElement.parentElement.children[0].textContent;
        const departDate = this.parentElement.parentElement.children[1];
        const arrivalDate = this.parentElement.parentElement.children[2];
        const departure = this.parentElement.parentElement.children[3];
        const arrival = this.parentElement.parentElement.children[4];
        const resetPlace = this.parentElement.parentElement.children[5];
        const Trademark = this.parentElement.parentElement.children[6];
        popup__limit_place.value =
            popup__arrival.value =
                popup__arrival_date.value =
                    popup__depart_date.value =
                        popup__departure.value =
                            popup__trademark.value = '';
        popup__limit_place.value = resetPlace.textContent;
        popup__arrival.value = arrival.textContent;
        popup__arrival_date.value = arrivalDate.textContent;
        popup__depart_date.value = departDate.textContent;
        popup__departure.value = departure.textContent;
        popup__trademark.value = Trademark.textContent;
        popUpApplyButton.addEventListener('click', async function (e) {
            e.preventDefault();
            if (popup__limit_place.value.trim() &&
                popup__arrival.value.trim() &&
                popup__arrival_date.value.trim() &&
                popup__depart_date.value.trim() &&
                popup__departure.value.trim() &&
                popup__trademark.value.trim()
            ) {
                let request = await fetch("http://localhost/TravelaGO/Source/dashboard/editflight", {
                    method: 'POST',
                    body: JSON.stringify({
                        'id': id,
                        'departDate': popup__depart_date.value.trim(),
                        'arrivalDate': popup__arrival_date.value.trim(),
                        'departure': popup__departure.value.trim(),
                        'arrival': popup__arrival.value.trim(),
                        'resetPlace': popup__limit_place.value.trim(),
                        'Trademark': popup__trademark.value.trim()
                    })
                });
                let respond = await request.json();
                console.log(respond);
                if (respond) {
                    swal("Success! flight has been updated!", {
                        icon: "success",
                        buttons: {
                            content: "ok"
                        }
                    });
                    // to ignore the bubbling problem in js events :
                    window.location.reload();
                    console.log(popup__limit_place.value, popup__arrival.value, popup__depart_date.value, popup__departure.value, popup__trademark.value)
                    resetPlace.textContent = popup__limit_place.value;
                    arrival.textContent = popup__arrival.value;
                    arrivalDate.textContent = popup__arrival_date.value;
                    departDate.textContent = popup__depart_date.value;
                    departure.textContent = popup__departure.value;
                    Trademark.textContent = popup__trademark.value;
                    closePop();
                } else {
                    swal("failed! flight has not been updated!", {
                        icon: "error",
                        dangerMode: true,
                    });
                }
            } else {
                swal("fill all fields, please!", {
                    icon: "warning",
                    dangerMode: true,
                });
            }
        })
    })
})
// popUpclose.addEventListener('click', closePop);

popUpCancelButton.addEventListener('click', () => {
    popup__limit_place.value =
        popup__arrival.value =
            popup__arrival_date.value =
                popup__depart_date.value =
                    popup__departure.value =
                        popup__trademark.value = '';
    closePop();

});