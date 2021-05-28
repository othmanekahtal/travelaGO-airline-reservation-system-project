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
                    } else {
                        swal("This flight is safe!");
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
        const departDate = this.parentElement.parentElement.children[1].textContent;
        const arrivalDate = this.parentElement.parentElement.children[2].textContent;
        const departure = this.parentElement.parentElement.children[3].textContent;
        const arrival = this.parentElement.parentElement.children[4].textContent;
        const resetPlace = this.parentElement.parentElement.children[5].textContent;
        const Trademark = this.parentElement.parentElement.children[6].textContent;
        popup__limit_place.value = resetPlace;
        popup__arrival.value = arrival;
        popup__arrival_date.value = arrivalDate;
        popup__depart_date.value = departDate;
        popup__departure.value = departure;
        popup__trademark.value = Trademark;
        popUpApplyButton.addEventListener('click', function () {
            
        })
    })
})
// popUpclose.addEventListener('click', closePop);

popUpCancelButton.addEventListener('click', () => {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((value) => {
        if (value) {
            console.log(value);
            popup__limit_place.value =
                popup__arrival.value =
                    popup__arrival_date.value =
                        popup__depart_date.value =
                            popup__departure.value =
                                popup__trademark.value = '';
            closePop();
        }
    });
});