function icon(){
    const motdepasse = document.getElementById("motdepasse");
    const lock = document.getElementById("icon-lock");

    if(motdepasse.type === "password"){
        motdepasse.type = "text";
        lock.classList.remove("fa-lock");
        lock.classList.add("fa-lock-open");
    }else{
        motdepasse.type = "password";
        lock.classList.remove("fa-lock-open");
        lock.classList.add("fa-lock");
    }
}