<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layouts.partials.head')
</head>
<body>
<div class="container-scroller">

    @include('admin.layouts.partials.sidebar')

    <div class="container-fluid page-body-wrapper">

        @include('admin.layouts.partials.navbar')

        @section('main-content')
        @show

        @include('admin.layouts.footer')

    </div>
</div>

@include('admin.layouts.partials.script')
</body>
</html>
