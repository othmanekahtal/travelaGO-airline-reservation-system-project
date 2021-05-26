// to show the menu of profile option :
const profile = () => {
    const profile = document.querySelector(".profile");
    const panel = document.querySelector('.panel');
    profile.addEventListener("click", function () {
        this.classList.toggle("profile--active");
        panel.classList.toggle('normal-height');
    });
}

export {profile};

// {
//     const Filter_By_Time = (element, Data_input) => {
//         if (Data_input) {
//             if (
//                 new Intl.DateTimeFormat('de-DE')
//                     .format(new Date(element.textContent)) !== new Intl.DateTimeFormat('de-DE')
//                     .format(new Date(Data_input)
//                     )
//             ) {
//                 element.parentElement.classList.add('hidden-element');
//             } else {
//                 element.parentElement.classList.remove('hidden-element');
//             }
//         }
//     }
//
//     const Filter_Items = (element, Data_input, date, data_input) => {
//         console.log(date)
//         if (Data_input) {
//             if (!element.parentElement.classList.contains('hidden-element')) {
//                 if (element.textContent.toLowerCase() !== Data_input.toLowerCase()) {
//                     element.parentElement.classList.add('hidden-element');
//                 }
//                 Filter_By_Time(date, data_input);
//             }
//             if (element.parentElement.classList.contains('hidden-element')) {
//                 if (element.textContent.toLowerCase() === Data_input.toLowerCase()) {
//                     element.parentElement.classList.remove('hidden-element');
//                 }
//             }
//         }
//     }
//     [...flights_date].forEach(element => Filter_By_Time(element, date_input));
//     [...flights_departure].forEach(element => Filter_Items(element, depart_input, element.parentElement.children[1], date_input));
//     [...flights_arrival].forEach(element => Filter_Items(element, arrival_input, element.parentElement.children[1], date_input))
// }