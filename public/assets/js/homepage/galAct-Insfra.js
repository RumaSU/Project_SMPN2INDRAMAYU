const actContent = document.getElementById('contentAct');
const insfraContent = document.getElementById('contentInsfra');

function shAct() {
    actContent.classList.add('show-content');
    actContent.classList.remove('hide-content-l');
    insfraContent.classList.remove('show-content');
    insfraContent.classList.add('hide-content-r');
}

function shInsfra() {
    actContent.classList.remove('show-content');
    actContent.classList.add('hide-content-l');
    insfraContent.classList.add('show-content');
    insfraContent.classList.remove('hide-content-r');
}