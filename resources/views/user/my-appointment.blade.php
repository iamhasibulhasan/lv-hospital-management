@extends('user.layouts.app')

@section('main-content')
    <div class="card w-50 mx-auto mt-3 mb-5">
        <div class="card-body">
            <table class="table table-hover" id="my_appointment_tbl">
                <thead>
                <tr>
                    <th>Doctor Name</th>
                    <th>Date</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
