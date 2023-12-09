const textarea = document.getElementById('content');
const output = document.getElementById('outputTextarea');

textarea.addEventListener('change', () => {
    output.innerHTML = textarea.value;
});