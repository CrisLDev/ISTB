$(function () {
    $(document).on('change', '#course', function () {
        var data = { id: $('#course').val() }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            type: "post",
            data: {
                id: data.id
            },
            url: "/students/studentid",
            success: function(a){
            var select = document.getElementById('students');
            document.getElementById('students').innerHTML = "";
            a.forEach(element => {
                console.log(element)
                $(select).append('<option value=' + element.id + '>' + element.fullname + '</option>');
            });
            }
        })
    })
})