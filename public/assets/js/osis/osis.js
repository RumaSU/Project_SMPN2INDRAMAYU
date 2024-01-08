$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': getCsrfToken()
        }
    });
    
    
});


function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}