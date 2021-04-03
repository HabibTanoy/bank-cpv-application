@include('.admin.layout.header')
@php
    if (!isset($from)){
        $from = '';
    }
@endphp
@if($from != 'login')
<div id="wrapper">

    <!-- Sidebar -->
@include('.admin.layout.sidenav')
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            @include('.admin.layout.topnav')
            @endif
            @yield('content')
            @if($from != 'login')
        </div>
    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
@endif
@include('.admin.layout.footer')
