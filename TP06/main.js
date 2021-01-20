let usernameE = document.getElementsByName("username")[0];
usernameE.addEventListener("input",check);
let passwordE = document.getElementsByName("password")[0];
passwordE.addEventListener("input",check);
let realnameE = document.getElementsByName("realname")[0];
realnameE.addEventListener("input",check);
let zipE = document.getElementsByName("zip")[0];
zipE.addEventListener("input",check);
let ipvE = document.getElementsByName("ipv")[0];
ipvE.addEventListener("input",check);
let macE = document.getElementsByName("mac")[0];
macE.addEventListener("input",check);
let submit = document.querySelector("form input[type='submit']");

passwordE.addEventListener("input",(event)=>{
    const password = event.target.value
    const username = usernameE.value

    if (password.includes(username)) {
        submit.disabled = true;
        passwordE.classList.add("error");
    }
    else {
        submit.disabled = false;
        passwordE.classList.remove("error")
    }
})

function check(event){
    if (!event.target.checkValidity()) {
        submit.disabled = true;
        event.target.classList.add("error");
    }
    else {
        submit.disabled = false;
        event.target.classList.remove("error")
    }
}