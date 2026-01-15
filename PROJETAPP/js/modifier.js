function togglePassword(){
    const nouveau = document.getElementById("motdepasse");
    const icone = document.getElementById("icon-eye");

    if(nouveau.type === "password"){
        nouveau.type = "text"
        icone.classList.remove("fa-eye-slash");
        icone.classList.add("fa-eye");
    }else{
        nouveau.type = "password";
        icone.classList.remove("fa-eye");
        icone.classList.add("fa-eye-slash");
    }
}

function toggle(){
    const nouveau2 = document.getElementById("motdepasse2");
    const icone2 = document.getElementById("icon-eye2");

    if(nouveau2.type === "password"){
        nouveau2.type = "text";
        icone2.classList.remove("fa-eye-slash");
        icone2.classList.add("fa-eye");
    }else{
        nouveau2.type = "password";
        icone2.classList.remove("fa-eye");
        icone2.classList.add("fa-eye-slash");
    }
}