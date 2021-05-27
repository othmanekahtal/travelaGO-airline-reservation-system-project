import {profile, searchInHTMLCollection, search_box__input} from './functions.js';

//////////////////////////////////////////////////////////////
///////////////////////////////////////////VARIABLES ::

const flights_admin = document.getElementsByClassName('admins_flight');
const delete_collection = document.getElementsByClassName('action_flight__delete');
const edit_collection = document.getElementsByClassName('action_flight__edit');
const popUp = document.querySelector('.popup');
const popUpclose = document.querySelector('.popup__close')

//////////////////////////////////////////////////////////////////////
//////////////////////////////////////// FUNCTIONS ::

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

    })
})