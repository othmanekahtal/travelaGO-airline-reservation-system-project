//////////////////////////////////////////////////////////////////////
//////////////////////////////////////// FUNCTIONS ::


// to show the menu of profile option :
const profile = () => {
    const profile = document.querySelector(".profile");
    const panel = document.querySelector('.panel');
    profile.addEventListener("click", function () {
        this.classList.toggle("profile--active");
        panel.classList.toggle('normal-height');
    });
}

const searchInHTMLCollection = (htmlCollection, inputData = this) => {
    [...htmlCollection].forEach(element => {
            if (inputData.value && (element.textContent.toLowerCase().trim().indexOf(inputData.value.toLowerCase()) === -1 || element.textContent.toLowerCase().trim().indexOf(inputData.value.toLowerCase()) !== 0)) {
                element.parentElement.classList.add('hidden-element');
            } else {
                element.parentElement.classList.remove('hidden-element');
            }
        }
    )
}
//////////////////////////////////////////////////////////////
///////////////////////////////////////////VARIABLES ::
const search_box__input = document.querySelector('.search-box__input');

export {profile, searchInHTMLCollection, search_box__input};
