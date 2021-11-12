(function ($){
    $(document).ready(function (){
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

        //Add new doctor modal view
        $(document).on('click', '#add_new_doctor_btn', function (e){
            e.preventDefault();
            $('#add_new_doctor_modal').modal('show');
        });

        //Add new doctor
        $(document).on('submit', '#add_new_doctor_form', function (e){
            e.preventDefault();
            let f_name = $('#add_new_doctor_form input[name = "f_name"]').val();
            let l_name = $('#add_new_doctor_form input[name = "l_name"]').val();
            let phone = $('#add_new_doctor_form input[name = "phone"]').val();
            let email = $('#add_new_doctor_form input[name = "email"]').val();
            let speciality = $('#add_new_doctor_form input[name = "speciality"]').val();
            let room = $('#add_new_doctor_form input[name = "room"]').val();
            // alert(f_name);
            if (f_name == ""){
                alertMsg('First name is required', 'error');
            }else if(l_name == ""){
                alertMsg('Last name is required', 'error');
            }else if(phone == ""){
                alertMsg('Phone no. is required', 'error');
            }else if(email == ""){
                alertMsg('Email is required', 'error');
            }else if(speciality == ""){
                alertMsg('Speciality is required', 'error');
            }else if(room == ""){
                alertMsg('Room no. is required', 'error');
            }else {
                $.ajax({
                    url:'/doctor-store',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data){

                        if(data){
                            $('#add_new_doctor_modal').modal('hide');
                            $("#add_new_doctor_form")[0].reset();
                            //reload the table
                            $('#all_doctors_tbl').DataTable().ajax.reload();
                            alertMsg('Doctor added successful !', 'success');
                        }


                    }
                });
            }

        });

    //    Show all doctor in admin panel with datatables
        $('#all_doctors_tbl').DataTable({
            processing:true,
            serverSide:true,
            ajax: {
                url: 'add-doctor'
            },
            columns:[
                {
                    data:'id',
                    name:'id'
                },
                {
                    data:'name',
                    name:'name'
                },
                {
                    data:'room',
                    name:'room'
                },
                {
                    data:'photo',
                    name:'photo',
                    render:function (data, type, full, meta){
                        return `<img style="height: 50px;width: 50px;" src="media/doctors/${data    }">`;
                    }
                },
                {
                    data:'speciality',
                    name:'speciality'
                },
                {
                    data:'phone',
                    name:'phone'
                },
                {
                    data:'action',
                    name:'action'
                }
            ]
        });

        //Doctor Delete
        $(document).on('click', '.doctor-del', function (e){
            e.preventDefault();
            let id = $(this).attr('del-doctor-id');
            // alert(id);

            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'warning',
                title: '<span style="color: black;">Are you sure?<span>',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url:'/doctor-destroy/'+id,
                        contentType: false,
                        processData: false,
                        success: function (data){
                            // alert(data);
                            $('#all_doctors_tbl').DataTable().ajax.reload();
                            alertMsg('Doctor deleted successful !', 'success');
                        }

                    });

                }else {
                    alertMsg('Doctor deleted unsuccessful !', 'error');
                }
            })

        });

    //    Doctor Edit
        $(document).on('click', '.doctor-edit', function (e){
            e.preventDefault();
            let id = $(this).attr('edit-doctor-id');
            $.ajax({
                url:'/doctor-edit/'+id,
                contentType:false,
                processData:false,
                success: function (data){
                    $('#edit_doctor_modal form input[name="edit_id"]').val(data.id);
                    $('#edit_doctor_modal form input[name="edit_name"]').val(data.name);
                    $('#edit_doctor_modal form input[name="edit_room"]').val(data.room);
                    $('#edit_doctor_modal form input[name="edit_phone"]').val(data.phone);
                    $('#edit_doctor_modal form input[name="edit_email"]').val(data.email);
                    $('#edit_doctor_modal form input[name="old_photo_name"]').val(data.photo);
                    $('#edit_doctor_modal form img[id="old_photo"]').attr('src', 'media/doctors/'+data.photo);

                    $('#edit_doctor_modal').modal('show');
                }
            });
        });
    //    Doctor Update data
        $(document).on('submit', '#edit_doctor_form', function (e){
            e.preventDefault();
            $.ajax({
                url:'/doctor-update',
                method: 'POST',
                data : new FormData(this),
                contentType:false,
                processData: false,
                success: function (data){
                    alertMsg('Doctor updated successful !', 'success');
                    $('#all_doctors_tbl').DataTable().ajax.reload();
                    $('#edit_doctor_modal').modal('hide');
                }
            });
        });


    //    All appointments
        $('#all_appointment_tbl').DataTable({
            processing:true,
            serverSide:true,
            ajax: {
                url: '/doctor-appointment'
            },
            columns:[
                {
                    data:'id',
                    name:'id'
                },
                {
                    data:'name',
                    name:'name'
                },
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
                    data:'phone',
                    name:'phone'
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
                }
            ]
        });


    //    Appointments Accepted
        $(document).on('click', '.app-accept', function (e){
            e.preventDefault();
            let id = $(this).attr('acc-patient-id');

            $.ajax({
                url:'/appointment-accept/'+id,
                contentType:false,
                processData:false,
                success:function (data){
                    $('#all_appointment_tbl').DataTable().ajax.reload();
                    alertMsg('Patient accepted successful !', 'success')
                }
            });
        });
        //    Appointments Rejected
        $(document).on('click', '.app-reject', function (e){
            e.preventDefault();
            let id = $(this).attr('rej-patient-id');

            //==============

            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'warning',
                title: '<span style="color: black;">Are you sure?<span>',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Reject'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url:'/appointment-reject/'+id,
                        contentType:false,
                        processData:false,
                        success:function (data){
                            $('#all_appointment_tbl').DataTable().ajax.reload();
                            alertMsg('Patient reject successful !', 'success')
                        }
                    });

                }else {
                    alertMsg('Cancel', 'warning');
                }
            })

            //==============




        });
    //==================================================
    });
})(jQuery)
