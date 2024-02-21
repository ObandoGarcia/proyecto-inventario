<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
        <span class="app-brand-logo demo">

        </span>
        <span class="app-brand-text demo menu-text fw-bold ms-2">Inventario</span>

        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">

        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <!-- menu lateral -->
    <ul class="menu-inner py-1">
        <!-- Layouts -->
        <li class="menu-item">
            <a href="{{url('/')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-bot"></i>
                <div data-i18n="Dashboards">Maquinaria</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{url('brands')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-registered"></i>
                <div data-i18n="Dashboards">Marcas</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{url('state')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-candles"></i>
                <div data-i18n="Dashboards">Estados</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{url('/proveedores')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-walk"></i>
                <div data-i18n="Dashboards">Proveedores</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{url('/')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-notepad"></i>
                <div data-i18n="Dashboards">Proyectos</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{url('/')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar-circle"></i>
                <div data-i18n="Dashboards">Inversion</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{url('/')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="Dashboards">Material de contruccion</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-car"></i>
            <div data-i18n="Layouts">Motoristas</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="" class="menu-link">
                    <div data-i18n="Without menu">Motoristas</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="layouts-without-navbar.html" class="menu-link">
                    <div data-i18n="Without navbar">Detalle motorista maquinaria</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-printer"></i>
            <div data-i18n="Layouts">Reportes</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="" class="menu-link">
                    <div data-i18n="Without menu">Reporte 1</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="layouts-without-navbar.html" class="menu-link">
                    <div data-i18n="Without navbar">Reporte 2</div>
                    </a>
                </li>
            </ul>
        </li>
        <li></li>
        <li class="menu-item">
            <form style="display: inline" action="/logout" method="POST">
            @csrf
                <a class="menu-link">
                    <button class="btn btn-primary" type="submit"><i class="bx bx-log-out"></i> Cerrar sesion</button>
                </a>
            </form>
        </li>
    </ul>
</aside>

