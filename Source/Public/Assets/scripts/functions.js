// to show the menu of profile option :
export const profile = () => {
    const profile = document.querySelector(".profile");
    const caret_icon = document.querySelector(".caret--icon .bi");
    profile.addEventListener("click", function () {
        this.classList.toggle("overflow-hidden");
        caret_icon.classList.toggle("bi-caret-up-fill");
    });
}