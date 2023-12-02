document.addEventListener('DOMContentLoaded', () => {
    const clsPopSumEks = document.getElementById('clsPop-brdSumEks');
    const popSumEks = document.getElementById('pop-brdSumEks');
    
    clsPopSumEks.addEventListener('click', () => {
        popSumEks.classList.toggle('hidden');
    });
});

function opnPopEks(event) {
    document.getElementById('pop-brdSumEks').classList.toggle('hidden');
}