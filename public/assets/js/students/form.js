$(document).ready(function() {
    let nowDate = new Date();
    let nowYear = nowDate.getFullYear();
    $( "#classYear" ).on('input', function() {
        let enterYear = $(this).val();
        if(enterYear > nowYear){
            $(this).val(nowYear)
        }
    });
    $('.btrpp-vii, .btrpp-viii, .btrpp-ix').click(function () {
        $('#pop-upFormAdd').removeClass('hidden');
        $('#overlayPopUp').removeClass('hidden');
        $('body').addClass('overflow-hidden');
        
        let classGrade = $(this).data('classGrade');
        $('#classGrade').val(classGrade);
        getLatestClassTag(classGrade);
        
        $('#classYear').val(nowYear);
        $('#classYear').attr('max', nowYear);
        
        let listTeacher = $('#teacherList');
        $.ajax({
            type: "GET",
            url: "kelas/pendidik",
            success: function (response) {
                listTeacher.empty();
                listTeacher.append('<option value="" selected disabled>Pilih guru</option>');
                $.each(response, function(index, item) { // Memperbaiki penggunaan $.each
                    listTeacher.append('<option value="' + item.teacher_id + '">' + item.name + '</option>');
                    console.log(item.teacherId);
                });
            },
            error: function() {
                alert('error');
            }
        });
    });
    $('#teacherList').change(function() {
        let valSelectTe = $(this).val();
        
        $.ajax({
            type: "GET",
            url: "kelas/pendidik/image",
            data: {
                teacherId: valSelectTe,
            },
            success: function (response) {
                $('#teacherSelectedImage').attr('src', "storage/images/teachers/" + response.name_files);
                console.log(response.name_files);
            },
            error: function() {
                alert('error');
            }
        });
    });
    $('#closeForm').click(function() {
        $('#pop-upFormAdd').addClass('hidden');
        $('#overlayPopUp').addClass('hidden');
        $('body').removeClass('overflow-hidden');
        let resetValue = $('#pop-upFormAdd').find('form');
        resetValue.find('#classGrade, #imgClass, #teacher, #tagClass, #descClass').val('');
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
    function getLatestClassTag(classGrade) {
        $.ajax({
            type: "GET",
            url: "kelas/tag",
            data: {
                classGrade: classGrade,
            },
            success: function (response) {
                if (response.length > 0) {
                    // Jika terdapat data kelas
                    var latestTag = response[0].tag; // Mengambil tag dari kelas terbaru
    
                    // Proses untuk menentukan huruf selanjutnya
                    var lastLetter = latestTag.slice(-1); // Mengambil huruf terakhir
                    var nextLetter = String.fromCharCode(lastLetter.charCodeAt(0) + 1); // Menentukan huruf selanjutnya
                    
                    // Set nilai tag pada form dengan huruf selanjutnya
                    $('#tagClass').val(nextLetter); // Ganti dengan ID input tag Anda
                } else {
                    // Jika tidak ada data kelas terbaru, misalnya jika tabel kosong
                    $('#tagClass').val('A'); // Jika tabel kosong, mulai dari A
                }
            }
        });
    }
});