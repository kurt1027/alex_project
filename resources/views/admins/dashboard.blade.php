@include('layouts.admins.header')
@include('layouts.partials.navbars')
@if(Auth::user()->role == 'Admin')
    @include('layouts.partials.dashboard-counts')
@endif
@include('layouts.admins.footer')
