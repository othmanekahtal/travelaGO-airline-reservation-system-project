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