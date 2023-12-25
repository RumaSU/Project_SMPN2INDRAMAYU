$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': getCsrfToken()
        }
    });
    
    $('.delBtClass').click(function () { 
        let $elementClass = $(this).closest('.itemClass');
        console.log($elementClass);
        let $valueClass = $(this).data('classId');
        
        var confirmation = confirm('Apakah Anda yakin ingin menghapus data ini?');
        console.log(getURL());
        var $urlDel = getURL() +  "/delete";
        console.log($urlDel);
        
        if(confirmation) {
            $.ajax({
                type: "POST",
                data: {
                    _method: 'DELETE',
                    classId: $valueClass,
                },
                url: $urlDel,
                success: function (response) {
                    $elementClass.remove();
                    alertContent.append('<div class="confirmDelete w-80 px-4 py-3 bg-green-100 rounded-sm"><div class="cntn flex items-center gap-4"><i class="bi bi-check-circle-fill text-green-500"></i><p class="text-lg">'+response.succedSomething+'</p></div></div>')
                    setTimeout(function () {
                        $('.confirmDelete').remove();
                    }, 3000);

                    if(response.nowData === 0) {
                        $elementClass.remove();
                    }
                    // if (response.errorSomething) {
                    //     alertContent.append('<div class="errorDelete w-80 px-4 py-3 bg-red-100 rounded-sm"><div class="cntn flex items-center gap-4"><i class="bi bi-x-circle-fill text-red-500"></i><p class="text-lg">'+response.errorSomething+'</p></div></div>');
                    //     setTimeout(function () {
                    //         $('.errorDelete').remove();
                    //     }, 3000);
                    // } else if (response.succedSomething) {
                    //     $elementClass.remove();
                    //     alertContent.append('<div class="confirmDelete w-80 px-4 py-3 bg-green-100 rounded-sm"><div class="cntn flex items-center gap-4"><i class="bi bi-check-circle-fill text-green-500"></i><p class="text-lg">'+response.succedSomething+'</p></div></div>')
                    //     setTimeout(function () {
                    //         $('.confirmDelete').remove();
                    //     }, 3000);

                    //     if(response.nowData === 0) {
                    //         $elementClass.remove();
                    //     }
                    // }
                    // // window.location.href = '/kelas';
                    // alert(response.succedDelete);
                },
                error: () => {
                    alert('Terjadi kesalahan saat menghapus data.');
                }
            });
        }     
    });
});

function getURL() {
    let nowUrl = window.location.href;
    return nowUrl;
}

function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}