<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ url("img/assets/logo_sifest.png") }}" alt="" style="width: 40px">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">SI FEST</span>
        </a>

        <a
            href="javascript:void(0);"
            class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none"
        >
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ $nav["active"] === "Dashboard" ? "active" : "" }}">
            <a href="{{ url("sifest2022/admin/dashboard") }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Divisi</span>
        </li>

        <li class="menu-item {{ $nav["active"] === "Competition" ? "active" : "" }}">
            <a href="{{ url("sifest2022/admin/dashboard/competition") }}" class="menu-link">
                <div data-i18n="Analytics">Competition</div> 
            </a>
        </li>

        <li class="menu-item {{ $nav["active"] === "Seminar" ? "active" : "" }}">
            <a href="{{ url("sifest2022/admin/dashboard/seminar") }}" class="menu-link">
                <div data-i18n="Analytics">Seminar</div> 
            </a>
        </li>

        <li class="menu-item {{ $nav["active"] === "Buddies" ? "active" : "" }}">
            <a href="{{ url("sifest2022/admin/dashboard/buddies") }}" class="menu-link">
                <div data-i18n="Analytics">Buddies</div> 
            </a>
        </li>
        
        <li class="menu-item {{ $nav["active"] === "Sponsorship" ? "active" : "" }}">
            <a href="{{ url("sifest2022/admin/dashboard/sponsorship") }}" class="menu-link">
                <div data-i18n="Analytics">Sponsorship</div> 
            </a>
        </li>

        <li class="menu-item {{ $nav["active"] === "Media Partner" ? "active" : "" }}">
            <a href="{{ url("sifest2022/admin/dashboard/media partner") }}" class="menu-link">
                <div data-i18n="Analytics">Media Partner</div> 
            </a>
        </li>
        
        <li class="menu-item {{ $nav["active"] === "Marketing" ? "active" : "" }}">
            <a href="{{ url("sifest2022/admin/dashboard/marketing") }}" class="menu-link">
                <div data-i18n="Analytics">Marketing</div> 
            </a>
        </li>

        <li class="menu-item {{ $nav["active"] === "Design" ? "active" : "" }}">
            <a href="{{ url("sifest2022/admin/dashboard/design") }}" class="menu-link">
                <div data-i18n="Analytics">Design</div> 
            </a>
        </li>

        <li class="menu-item {{ $nav["active"] === "Videography Photography" ? "active" : "" }}">
            <a href="{{ url("sifest2022/admin/dashboard/videography photography") }}" class="menu-link">
                <div data-i18n="Analytics">Videography & Photography</div> 
            </a>
        </li>

        <li class="menu-item {{ $nav["active"] === "Publication" ? "active" : "" }}">
            <a href="{{ url("sifest2022/admin/dashboard/publication") }}" class="menu-link">
                <div data-i18n="Analytics">Publication</div> 
            </a>
        </li>

        <li class="menu-item {{ $nav["active"] === "Bazaar" ? "active" : "" }}">
            <a href="{{ url("sifest2022/admin/dashboard/bazaar") }}" class="menu-link">
                <div data-i18n="Analytics">Bazaar</div> 
            </a>
        </li>

        <li class="menu-item {{ $nav["active"] === "Consumption" ? "active" : "" }}">
            <a href="{{ url("sifest2022/admin/dashboard/consumption") }}" class="menu-link">
                <div data-i18n="Analytics">Consumption</div> 
            </a>
        </li>
        
        <li class="menu-item {{ $nav["active"] === "Equipment" ? "active" : "" }}">
            <a href="{{ url("sifest2022/admin/dashboard/equipment") }}" class="menu-link">
                <div data-i18n="Analytics">Equipment</div> 
            </a>
        </li>

    </ul>
</aside>
<!-- / Menu -->
