@extends('admin.layouts.partials.app')
@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper">
            <a class="btn btn-primary" id="add_new_doctor_btn"><i class="fas fa-user-plus"></i> Add New Doctor</a><br><br>
            <div class="row" >
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Appointments</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="all_appointment_tbl" style="width:100%;" class="table table-dark mb-0">
                                    <thead>
                                    <tr>
                                        <th>#SI</th>
                                        <th>Patient Name</th>
                                        <th>Doctor Name</th>
                                        <th>Date</th>
                                        <th>Message</th>
                                        <th>Phone</th>
                                        <th>Status</th>
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

