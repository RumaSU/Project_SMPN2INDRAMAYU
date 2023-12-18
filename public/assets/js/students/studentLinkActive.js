document.addEventListener('DOMContentLoaded', () => {
    let linkActive = ["facebook-active", "instagram-active", "twitter-active", "tiktok-active", "youtube-active", "emails-active"];
    
    linkActive.forEach(link => {
        const linkEvent = document.getElementById(link);
        const inpLnkTeachers = linkEvent.parentElement.nextElementSibling.querySelector('input');
        const dvBgLabelCheck = linkEvent.previousElementSibling.querySelector('label div');
        const ballRollLabelCheck = linkEvent.previousElementSibling.querySelector('label div span');
        
        linkEvent.addEventListener('change', function() {
            if (this.checked) {
                this.value = "active";
                this.setAttribute('aria-checked', 'true');
                dvBgLabelCheck.style.backgroundColor = "rgba(3, 115, 252, 0.4)";
                ballRollLabelCheck.style.backgroundColor = "rgb(3, 86, 252)";
                ballRollLabelCheck.style.borderColor = "rgb(3, 44, 252)";
                ballRollLabelCheck.style.left = "100%";
                ballRollLabelCheck.style.transform = "translate(-100%, -50%)";
                inpLnkTeachers.classList.remove('hidden');
                setTimeout(() => {
                    inpLnkTeachers.classList.remove('opacity-0');
                }, 50);
            } else {
                this.value = "";
                this.setAttribute('aria-checked', 'false');
                dvBgLabelCheck.style.backgroundColor = "";
                ballRollLabelCheck.style.backgroundColor = "";
                ballRollLabelCheck.style.borderColor = "";
                ballRollLabelCheck.style.left = "0";
                ballRollLabelCheck.style.transform = "translate(0, -50%)";
                inpLnkTeachers.classList.remove('opacity-0');
                setTimeout(() => {
                    inpLnkTeachers.classList.add('hidden');
                }, 50);
            }
        });
    });
})