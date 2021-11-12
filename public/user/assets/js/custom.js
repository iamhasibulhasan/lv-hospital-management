(function ($){
    $(document).ready(function (){
// =======================================

//Alert Message Function
        function alertMsg(msg, icon){
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: icon,
                title: msg,
                showConfirmButton: false,
                timer: 1500
            })
        }

//      Make an Appointment Create
        $(document).on('submit', '#make_appointment_form', function (e){
            e.preventDefault();
            let date = $('#make_appointment_form input[name = "udate"]').val();
            let doctor = $('#make_appointment_form select[name = "speciality"]').val();
            if(date == ""){
                alertify.error('Please pick a date.');
            }else if(doctor=="") {
                alertify.error('Please choose a doctor.');
            }else {
                $.ajax({
                    url:'/appointment-store',
                    method:'POST',
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function (data){
                        $("#make_appointment_form")[0].reset();
                        alertify.success('Request sent !');
                    }
                });
            }

        });

//        My Appointment table for login user
        $('#my_appointment_tbl').DataTable({
            processing:true,
            serverSide:true,
            ajax: {
                url: '/home/appointment'
            },
            columns:[
                {
                    data:'doctor_name',
                    name:'doctor_name'
                },
                {
                    data:'date',
                    name:'date'
                },
                {
                    data:'message',
                    name:'message'
                },
                {
                    data:'status',
                    name:'status',
                    render:function (data, type, full, meta){
                        return `
                            <span ${data=='Accepted' ? 'class = "badge badge-success"': 'class = "badge badge-danger"'}>${data}</span>
                        `;
                    }
                },
                {
                    data:'action',
                    name:'action'
                },
            ]
        });

//        Delete Appointment
        $(document).on('click', '.app-del', function (e){
            e.preventDefault();
            let id = $(this).attr('del-app-id');

            alertify.confirm("Delete","Are you sure want to delete?",
                function(){
                    $.ajax({
                        url:'/appointment-destroy/'+id,
                        contentType: false,
                        processData: false,
                        success:function (data){
                            $('#my_appointment_tbl').DataTable().ajax.reload();
                        }
                    });
                    alertify.success('Ok');
                },
                function(){
                    alertify.error('Cancel');
                });


        });



//========================================
});
})(jQuery)
