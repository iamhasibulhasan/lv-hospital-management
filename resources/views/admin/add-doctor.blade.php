@extends('admin.layouts.partials.app')
@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper">
            <a class="btn btn-primary" id="add_new_doctor_btn"><i class="fas fa-user-plus"></i> Add New Doctor</a><br><br>
            <div class="row" >
                <div class="col-lg-12">

                     <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Doctors</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="all_doctors_tbl" style="width:100%;" class="table table-dark mb-0">
                                    <thead>
                                    <tr>
                                        <th>#SI</th>
                                        <th>Doctor Name</th>
                                        <th>Room</th>
                                        <th>Photo</th>
                                        <th>Speciality</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






@endsection

    <!-- Add New Doctor Modal -->
        <div class="modal fade" id="add_new_doctor_modal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_new_doctor_modalLabel">Add New Doctor</h5>
                        <button type="button" class="btn-close text-white fs-4" data-bs-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <form class="form-sample" id="add_new_doctor_form" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <p class="card-description"> Fill up the form </p>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">First Name</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="f_name" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Last Name</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="l_name" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Phone</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="phone" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Email</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="email" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Gender</label>
                                                            <div class="col-sm-9">
                                                                <select name="gender" class="form-control">
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Profile Picture</label>
                                                            <div class="col-sm-9">
                                                                <input type="file" name="photo" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Speciality</label>
                                                            <div class="col-sm-9">
                                                                <select name="speciality" class="form-control">
                                                                    <option value="Anesthesiology">Anesthesiology</option>
                                                                    <option value="Dermatology">Dermatology</option>
                                                                    <option value="Surgery">Surgery</option>
                                                                    <option value="Pathology">Pathology</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Room No.</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="room" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Address</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="address" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <input type="submit" class="btn btn-primary">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
{{--        Doctor Edit modal--}}
        <div class="modal fade" id="edit_doctor_modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Doctor</h5>
                        <button class="btn-close text-white fs-4" data-bs-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" id="edit_doctor_form" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Doctor Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="edit_name" class="form-control">
                                                    <input type="hidden" name="edit_id" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Room No.</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="edit_room" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Phone</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="edit_phone" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="edit_email" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Photo</label>
                                                <div class="col-sm-9">
                                                    <img style="width: 100px;height: 100px" src="" id="old_photo">
                                                    <input type="file" name="edit_photo" class="form-control">
                                                    <input type="hidden" name="old_photo_name" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <span class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> &nbsp; Other data will not manageable.</span>
                                    </div><br>
                                    <input type="submit" class="btn btn-primary btn-block" value="Update">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
