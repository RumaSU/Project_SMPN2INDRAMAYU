function showPassword(event){
    const icon=event.querySelector('i');
    const typeInput=event.parentElement.parentElement.nextElementSibling;

    if(typeInput.type==="password")
    {
        typeInput.type = "text";
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }else{
        typeInput.type = "password";
        icon.classList.add('bi-eye-slash');
        icon.classList.remove('bi-eye');
    }
}
