$(document).ready(function() {
    let nowDate = new Date();
    let nowYear = nowDate.getFullYear();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': getCsrfToken()
        }
    });
    
    $( "#classYear" ).on('input', function() {
        let enterYear = $(this).val();
        if(enterYear > nowYear){
            enterYear = nowYear;
            $(this).val(nowYear)
        }
        // let listTeacher = $('#teacherList');
        // $.ajax({
        //     type: "GET",
        //     url: "/kelas/pendidik",
        //     success: function (response) {
        //         listTeacher.empty();
        //         listTeacher.append('<option value="" selected disabled>Pilih guru</option>');
        //         $.each(response, function(index, item) { // Memperbaiki penggunaan $.each
        //             listTeacher.append('<option value="' + item.teacher_id + '">' + item.name + '</option>');
        //             console.log(item.teacherId);
        //         });
        //     },
        //     error: function() {
        //         alert('error');
        //     }
        // });
    });
    
    $('.btrpp-vii, .btrpp-viii, .btrpp-ix').click(function () {
        $('#pop-upFormAdd').removeClass('hidden');
        $('#overlayPopUp').removeClass('hidden');
        $('body').addClass('overflow-hidden');
        $(".form-addClass").attr('action', getURL());
        
        let classGrade = $(this).data('classGrade');
        $('#classGrade').val(classGrade);
        checkedGrade(classGrade);
        getLatestClassTag(classGrade, nowYear);
        
        $('#classYear').val(nowYear);
        $('#classYear').attr('max', nowYear);
        
        let listTeacher = $('#teacherList');
        $.ajax({
            type: "GET",
            url: "kelas/pendidik/",
            success: function (response) {
                listTeacher.empty();
                listTeacher.append('<option value="" selected disabled>Pilih guru</option>');
                $.each(response, function(index, item) { // Memperbaiki penggunaan $.each
                    listTeacher.append('<option value="' + item.teacher_id + '">' + item.name + '</option>');
                });
            },
            error: function() {
                alert('error');
            }
        });
    });
    
    $('#teacherList').change(function() {
        let valSelectTe = $(this).val();
        $('#teacherSelectedImage').addClass('hidden');
        $('.imgSelected').append('<div class="plcImgFrm w-full h-full flex justify-center items-center absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 bg-gray-300 rounded-[100%] overflow-hidden animate-pulse"> <i class="bi bi-image-fill text-4xl text-gray-400"></i> </div>');
        $.ajax({
            type: "GET",
            // url: "kelas/pendidik/image?teacherId=" + valSelectTe,
            url: "kelas/pendidik/image",
            data: {
                teacherId: valSelectTe,
            },
            success: function (response) {
                var nameFiles = response.name_files;
                // var nameFiles = response[0].name_files;
                console.log(nameFiles);
                $('.plcImgFrm').remove();
                $('#teacherSelectedImage').attr('src', "storage/images/teachers/" + nameFiles);
                $('#teacherSelectedImage').removeClass('hidden');
            },
            error: function() {
                alert('error');
            }
            // error: function(xhr, status, error) {
            //     var errorMessage = xhr.responseJSON.error; // Mendapatkan pesan kesalahan dari respons JSON
        
            //     // Menampilkan pesan kesalahan ke konsol atau melakukan sesuatu dengan pesan kesalahan
            //     console.error(errorMessage);
        
            //     // Contoh menampilkan pesan kesalahan ke pengguna
            //     alert('Terjadi kesalahan: ' + errorMessage);
            // }
        });
    });
    
    // $('#teacherList').change(function() {
    //     let valSelectTe = $(this).val();
    //     console.log(valSelectTe);
    //     $.ajax({
    //         type: "get",
    //         url: "/kelas/pendidik/image",
    //         data: { teacherId: valSelectTe },
    //         success: function (response) {
    //             $('#teacherSelectedImage').attr('src', "storage/images/teachers/" + response.name_files);
    //             console.log(response.name_files);
    //         },
    //         // error: function() {
    //         //     alert('error');
    //         //     console.error();
    //         // }
    //     });
    // });
    
    $('#closeForm').click(function() {
        $('#pop-upFormAdd').addClass('hidden');
        $('#overlayPopUp').addClass('hidden');
        $('body').removeClass('overflow-hidden');
        $('#teacherList').empty();
        let resetValue = $('#pop-upFormAdd').find('form');
        resetValue.find('#classGrade, #imgClass, #teacher, #tagClass, #descClass').val('');
        $('#teacherSelectedImage').attr('src', 'assets/img/dumb/imgtemp 1.jpg');
        $('#previewImage').attr('src', 'assets/img/dumb/imgtemp 1.jpg');
        $('.chckChoose').remove();
        $('.elemRdChsClass').removeClass('bg-green-100');
        $(resetValue).find('input[type="radio"]').prop('checked', false); // Menandai radio button yang sesuai
        $("#form-addClass").attr('action', '');
    });
    
    $('#imgClass').change(function(event) {
        const previewImg = $('#previewImage');
        const file = event.target.files[0];
        if (file){
            let img = new Image();
            img.src = URL.createObjectURL(file);
            
            img.onerror = function() {
                alert("Gagal memuat gambar. Pastikan file yang Anda pilih ada gambar yang valid");
                previewImg.attr('src', '');
                $(this).val('');
            }
            img.onload = function() {
                previewImg.attr('src', img.src);
            }
        }
    });
    
    $('#resetImageClass').click(function() {
        $('#previewImage').attr('src', 'assets/img/dumb/imgtemp 1.jpg');
        $('#imgClass').val('');
    });
    
    $('.chooseClass').click(function() {
        let input = $(this).find('input[type="radio"]');
        let grade = $(this).data('classGrade');
        let year = $('#classYear').val();
        let checked = input.is(':checked');
        
        $('.chckChoose').remove();
        $('.elemRdChsClass').removeClass('bg-green-100');

        if (checked) {
            $(this).append('<div class="chckChoose absolute -right-[7%] -top-[25%] translate-x-[7%] translate-y-[25%] z-10"><i class="bi bi-check-circle-fill text-xl text-green-500 bg-white p-0 flex rounded-[100%]"></i></div>');
            $(this).find('.elemRdChsClass').addClass('bg-green-100');
            getLatestClassTag(grade, year);
        }
    });
    
    function checkedGrade(grade) {
        $('.chooseClass').each(function () {
            // element == this
            let elementData = $(this).data('classGrade');
            if(grade === elementData) {
                $(this).append('<div class="chckChoose absolute -right-[7%] -top-[25%] translate-x-[7%] translate-y-[25%] z-10"><i class="bi bi-check-circle-fill text-xl text-green-500 bg-white p-0 flex rounded-[100%]"></i></div>');
                $(this).find('.elemRdChsClass').addClass('bg-green-100');
                $(this).find('input[type="radio"]').prop('checked', true); // Menandai radio button yang sesuai
            }
        });
    }
    
    
    
    function getLatestClassTag(classGrade, year) {
        $.ajax({
            type: "GET",
            url: "kelas/tag",
            data: {
                classGrade: classGrade,
                classYear: year,
            },
            success: function (response) {
                let tag = response.latestTag;
                let count = response.countTag;
                // let lastTag = response.classTag;
                // lastTag.slice(0, -1) + String.fromCharCode(lastTag.charCodeAt(lastTag.length - 1) + 1);
                if (count >= 1) {
                    var latestTag = tag.class_tag;
    
                    // var lastLetter = latestTag.slice(-1);
                    // var nextLetter = String.fromCharCode(lastLetter.charCodeAt(0) + 1); 
                    var nextLetter = String.fromCharCode(latestTag.charCodeAt(0) + 1);
                    // var newTag = latestTag.slice(0, -1) + nextLetter;
                    
                    $('#tagClass').val(nextLetter);
                } else {
                    $('#tagClass').val('A');
                }
            },
            error: () => {
                alert('error');
            }
        });
    }
});

function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}

function getURL() {
    return window.location.href;
}