function showDropdown() {
    var dropdown = document.getElementById("dropDownProfile");
    // dropdown.classList.remove("hidden");
    dropdown.style.zIndex = "50";
    dropdown.style.top = "100%";
    dropdown.style.visibility = "visible";
    dropdown.style.opacity = "1";
    dropdown.style.transition = "top .4s, visibility .4s, opacity .4s";
}

function hideDropdown() {
    var dropdown = document.getElementById("dropDownProfile");
    // dropdown.classList.add("hidden");
    dropdown.style.zIndex = "0";
    dropdown.style.top = "-200%";
    dropdown.style.visibility = "hidden";
    dropdown.style.opacity = "0";
    dropdown.style.transition = "top .4s, visibility .4s, opacity .4s";
}