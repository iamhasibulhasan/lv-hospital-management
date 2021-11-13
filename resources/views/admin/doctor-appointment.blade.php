@extends('admin.layouts.partials.app')
@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper">
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
    </div>
{{--    Send Mail Modal--}}
        <div class="modal fade" id="send_mail_modal" >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Send A Mail</h5>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <form id="send_mail_form" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">
                                        <label for="exampleInputName1">Greetings</label>
                                        <input name="greeting" type="text" class="form-control">
                                        <input name="patient_id" type="hidden" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Mail Body</label>
                                        <textarea name="mail_body" class="form-control" rows="10"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Action Url</label>
                                                <input name="action_url" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Action Text</label>
                                                <input name="action_text" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Footer</label>
                                        <input name="footer" type="text" class="form-control">
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Sent Mail">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

