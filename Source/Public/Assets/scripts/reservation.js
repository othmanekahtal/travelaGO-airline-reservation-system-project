import {redirectTo} from './functions.js';

const me_reservation = document.querySelector('.me-reservation');
const other_reservation = document.querySelector('.other-reservation');
let id = location.pathname;
id = id[id.length - 1] === '/' ? id.slice(1, -1) : id.slice(1, id.length);
id = id.split('/')[id.split('/').length - 1];
me_reservation.addEventListener('click', async function () {
        let request = await fetch(`http://localhost/TravelaGO/Source/dashboard/addReservation/${id}`);
        let respond = await request.json();
        console.log(respond.message)
        if (respond.message) {
            swal("Success! reservation has been saved!", {
                icon: "success",
                buttons: {
                    content: "ok"
                }
            }).then((value) => {
                if (value) {
                    redirectTo('http://localhost/TravelaGO/Source/dashboard/user/')
                }
            })
        } else if (respond[0] === 'NO_ID') {
            swal('Something is Wrong', "fields is empty, Try again !", {
                icon: "error",
                dangerMode: true,
            });
        }
    }
)
other_reservation.addEventListener('click', function () {
    swal("Enter Passenger Name : ", {
        content: "input",
    }).then(async (value) => {
        if (value) {
            console.log("isherze");
            let request = await fetch(`http://localhost/TravelaGO/Source/dashboard/addReservation/${id}`, {
                method: 'POST',
                body: JSON.stringify({
                    'name': value.trim()
                })
            })
            let respond = await request.json();
            console.log(respond.message);
            if (respond.message === true) {
                swal("Success! reservation has been saved!", {
                    icon: "success",
                    buttons: {
                        content: "ok"
                    }
                })
            } else if (respond.message === 'EP') {
                swal("Error! passenger has been blocked in System!", {
                    icon: "error",
                    buttons: {
                        content: "ok"
                    }
                })
            } else if (respond.message === 'EF') {
                swal("Error! in Reservation !", {
                    icon: "error",
                    buttons: {
                        content: "ok"
                    }
                })
            }
        } else {
            swal('empty passenger Name', "for reservation, you need to enter name of the passenger !", {
                icon: "error",
                buttons: {
                    content: "ok"
                }
            })
        }

    })
});