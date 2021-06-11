<!-- Sidebar -->
<?php
use Illuminate\Support\Facades\Request;
$urlSegment = Request::segments();
?>

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/dashboard')}}">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SiBatik</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item {{end($urlSegment) == 'dashboard' ? 'active' : ''}}">
    <a class="nav-link }" href="{{url('/dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Data
</div>

<!-- nav paguyuban -->
<li class="nav-item {{end($urlSegment) == 'paguyuban' ? 'active' : ''}}">
    <a class="nav-link collapsed" href="{{url('/dashboard/paguyuban')}}">
        <i class="fas fa-fw fa-users"></i>
        <span>Paguyuban</span>
    </a>
</li>

<!-- nav pembatik -->
<li class="nav-item {{end($urlSegment) == 'pembatik' ? 'active' : ''}}">
    <a class="nav-link collapsed" href="{{ url('/dashboard/pembatik') }}">
        <i class="fas fa-fw fa-palette"></i>
        <span>Pembatik</span>
    </a>
</li>

<!-- nav batik -->
<li class="nav-item {{end($urlSegment) == 'batik' ? 'active' : ''}}">
    <a class="nav-link collapsed" href="{{ url('/dashboard/batik') }}">
        <i class="fas fa-fw fa-tshirt"></i>
        <span>Batik</span>
    </a>
</li>

<!-- nav batik -->
<!-- <li class="nav-item">
    <a class="nav-link collapsed" href="{{ url('/dashboard/pewarnaan') }}">
        <i class="fas fa-fw fa-fill-drip"></i>
        <span>Pewarnaan</span>
    </a>
</li> -->

<hr class="sidebar-divider">

<!-- qr code -->
<div class="sidebar-heading">
    Kodefikasi
</div>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item {{end($urlSegment) == 'qrcode' ? 'active' : ''}}">
    <a class="nav-link collapsed" href="{{ url('/dashboard/qrcode') }}">
        <i class="fas fa-fw fa-qrcode"></i>
        <span>Kode (QR)</span>
    </a>
</li>

<hr class="sidebar-divider">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

<!-- End of Sidebar -->