let form = document.querySelector('form');
form.addEventListener('submit',function(f){
    f.preventDefault();
    let email = document.querySelector("#floatingInput").value;
    let password = document.querySelector("#floatingPassword").value;
    console.log(email,password);
    fetch('http://localhost/TravelaGO/Source//users/login', {
        method: 'POST',
        body:JSON.stringify({'email':email,'password':password})
    }).then(response => response.json())

})