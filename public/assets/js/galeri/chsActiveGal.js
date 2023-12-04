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
    };

    const showSection = (index) => {
        removeHiddenClass();
        sections[index].classList.remove('hidden');
        setTimeout(() => {
            sections[index].classList.remove('opacity-0');
        }, 50);
    };

    buttons.forEach((button, index) => {
        button.addEventListener('click', () => {
            showSection(index);
        });
    });
    
});