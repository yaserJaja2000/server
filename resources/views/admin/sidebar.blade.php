<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion pe-0" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <div class="sidebar-brand-text mx-3">Patagonia</div>
        <i class="bi bi-speedometer fs-5"></i>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link text-center fw-bold" href="{{route('settings.edit', 1)}}">
            <span>المعلومات العامة</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link text-center fw-bold" href="{{route('hero.index')}}">
            <span>السلايدر الرئيسي</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link text-center fw-bold" href="{{route('deals.index')}}">
            <span>الصفقات الذكية</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link text-center fw-bold" href="{{route('offers.index')}}">
            <span>العروض الترويجية</span>
        </a>
    </li>

    {{-- <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed d-flex justify-content-center" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo" >
            <span>المدونة الإلكترونية</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded d-flex align-items-start flex-column">
                <a class="collapse-item" href="buttons.html">المقالات</a>
                <a class="collapse-item" href="cards.html">تيشيرت السفر</a>
            </div>
        </div>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link text-center fw-bold" href="{{route('blogs.index')}}">
            <span>المدونة الإلكترونية</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link text-center fw-bold" href="{{route('countries.index')}}">
        <span>الدول</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link text-center fw-bold" href="{{route('sections.index')}}">
        <span>الأقسام الفرعية</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link text-center fw-bold" href="{{route('images.index')}}">
        <span>صور القسم</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
