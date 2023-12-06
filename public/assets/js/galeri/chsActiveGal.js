document.addEventListener('DOMContentLoaded', () => {
    const buttons = [
        document.getElementById('idIt1-chsAct'),
        document.getElementById('idIt2-chsInsfra'),
        document.getElementById('idIt3-chsAchie'),
        document.getElementById('idIt4-chsCre')
    ];

    const sections = [
        document.getElementById('secGalAct'),
        document.getElementById('secGalInsfra'),
        document.getElementById('secGalAchie'),
        document.getElementById('secGalCrea')
    ];

    const removeHiddenClass = () => {
        sections.forEach(section => {
            section.classList.add('hidden');
            section.classList.add('opacity-0');
        });
        buttons.forEach(button => {
            button.classList.add('hover:bg-gray-300/60');
            button.classList.remove('bg-blue-500');
            button.classList.remove('text-white');
        });
    };

    const showSection = (index) => {
        removeHiddenClass();
        sections[index].classList.remove('hidden');
        setTimeout(() => {
            sections[index].classList.remove('opacity-0');
            buttons[index].classList.remove('hover:bg-gray-300/60');
            buttons[index].classList.add('bg-blue-500');
            buttons[index].classList.add('text-white');
        }, 50);
    };

    buttons.forEach((button, index) => {
        button.addEventListener('click', () => {
            showSection(index);
        });
    });
    
});