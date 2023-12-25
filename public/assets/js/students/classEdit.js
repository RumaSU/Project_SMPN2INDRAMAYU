$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': getCsrfToken()
        }
    });
    
    $('.editBtClass').click(function() {
        $('#pop-upFormAdd').removeClass('hidden');
        $('#overlayPopUp').removeClass('hidden');
        $('body').addClass('overflow-hidden');
        
        let classId = $(this).data('classId');
        $("#form-addClass").attr('action', getURL() + "/update?ic=" + classId);
        
        let listTeacher = $('#teacherList');
        $.ajax({
            type: "POST",
            data: {
                class_id: classId,
            },
            url: "kelas/get",
            success: function (response) {
                var dataClass = response.dataClass;
                var dataTeacher = response.dataTeacher;
                var dataListEditTeacher = response.listEdit;
                
                var nowGrade = dataClass.class_grade;
                
                listTeacher.empty();
                listTeacher.append('<option value="" disabled>Pilih guru</option>');
                listTeacher.append('<option value="' + dataTeacher.teacher_id + '" selected>' + dataTeacher.name + '</option>');
                $('#teacherSelectedImage').attr('src', "storage/images/teachers/" + dataTeacher.name_files);
                
                $.each(dataListEditTeacher, function(index, item) { // Memperbaiki penggunaan $.each
                    listTeacher.append('<option value="' + item.teacher_id + '">' + item.name + '</option>');
                    console.log(item.teacher_id);
                });
                
                $('#previewImage').attr('src',  'storage/images/classes/' + dataClass.name_files);
                $('#tagClass').val(dataClass.class_tag);
                $('#descClass').val(dataClass.description);
                $('#classYear').val(dataClass.year);
                $('.elemRdChsClass').removeClass('bg-green-100');
                checkedGradeNow(nowGrade);
            },
            error: function() {
                alert('error');
            }
        });
    });
    
    function checkedGradeNow(grade){
        $('.chckChoose').remove(); // Menghapus elemen sebelum menambahkan kembali
        $('.chooseClass').each(function () {
            let elementData = $(this).data('classGrade');
            if(grade === elementData) {
                $(this).append('<div class="chckChoose absolute -right-[7%] -top-[25%] translate-x-[7%] translate-y-[25%] z-10"><i class="bi bi-check-circle-fill text-xl text-green-500 bg-white p-0 flex rounded-[100%]"></i></div>');
                $(this).find('.elemRdChsClass').addClass('bg-green-100');
                $(this).find('input[type="radio"]').prop('checked', true); // Menandai radio button yang sesuai
            }
        });
        
        // nowGrade.append('<div class="chckChoose absolute -right-[7%] -top-[25%] translate-x-[7%] translate-y-[25%] z-10"><i class="bi bi-check-circle-fill text-xl text-green-500 bg-white p-0 flex rounded-[100%]"></i></div>');
        // nowGrade.find('.elemRdChsClass').addClass('bg-green-100');
        // nowGrade.find('input[type="radio"]').prop('checked', true); // Menandai radio button yang sesuai
    }
    
    function classGrade(grade){
        return grade.charAt(0).toUpperCase() + grade.slice(1).toLowerCase();
    }
});

function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}

function getURL() {
    return window.location.href;
}