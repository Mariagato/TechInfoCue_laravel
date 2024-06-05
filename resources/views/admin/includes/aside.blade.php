<!-- aside -->
<aside id="aside" class="app-aside modal fade " role="menu">
    <div class="left">
        <div class="box bg-white">
            <div class="navbar md-whiteframe-z1 no-radius bg-main">
                <a class="navbar-brand" style="">
                    <img src="{{ asset('images/log_u.png') }}" alt="." style="max-height: 60px;">
                    <span class="hidden-folded m-l inline text-white"></span>
                </a>
            </div>
            <div class="box-row">
                <div class="box-cell scrollable hover">
                    <div class="box-inner">
                        <div class="p hidden-folded blue-50"
                            style="background-image:url('{{ asset('images/bg.png') }}'); background-size:cover">
                            <a class="block m-t-sm" ui-toggle-class="hide, show" target="#nav, #account">
                                <span class="block font-bold">
                                    @role('admin')
                                        Administrador
                                    @endrole
                                </span>
                                {{ auth()->user() }}
                            </a>
                        </div>
                        <div id="nav">
                            <nav ui-nav>
                                <ul class="nav">


                                    <li class="nav-header hidden-folded">
                                        Módulos
                                    </li>

                                    <li class="{{ check_item_active('main_li', 'dashboard') }}">
                                        <a href="{{ route('dashboard') }}">
                                            <i class="icon mdi-action-dashboard i-20"></i>
                                            <span class="font-normal">Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="{{ check_item_active('main_li_id', 'slides', '1') }}">
                                        <a href="{{ route('Items.list') }}">
                                            <i
                                                class="icon mdi-content-inbox
                                            i-20"></i>
                                            <span class="font-normal">Inventario</span>
                                        </a>
                                    </li>
                                    <li class="{{ check_item_active('main_li_id', 'prestamos', '1') }}">
                                        <a href="{{ route('Prestamos.list') }}">
                                            <i
                                                class="icon mdi-action-class
                                            i-20"></i>
                                            <span class="font-normal">Prestamos</span>
                                        </a>
                                    </li>
                                    <li class="{{ check_item_active('main_li_id', 'reservas', '1') }}">
                                        <a href="{{ route('Reservas.list') }}">
                                            <i class="icon mdi-action-class
                                            i-20"></i>
                                            <span class="font-normal">Reservas</span>
                                        </a>
                                    </li>
                                    <li class="{{ check_item_active('main_li_id', 'maintenance', '1') }}">
                                        <a href="{{ route('Maintenance.list') }}">
                                            <i
                                                class="icon mdi-action-report-problem

                                            i-20"></i>
                                            <span class="font-normal">Mantenimiento</span>
                                        </a>
                                    </li>
                                    <li class="{{ check_item_active('main_li', 'contents') }}">
                                        <a><span class="pull-right text-muted">
                                                <i class="fa fa-caret-down"></i></span>
                                            <i
                                                class="icon mdi-action-assignment-turned-in
                                            i-20"></i>
                                            <span class="font-normal">Espacios</span>
                                        </a>
                                        <ul class="nav nav-sub">
                                            <li class="{{ check_item_active('inner_li_add', 'sedes', 'edit') }}">
                                                <a href="{{ route('Sedes.list') }}">Sedes</a>
                                            </li>
                                            <li
                                                class="{{ check_item_active('inner_li_list', 'classrooms', 'list,edit') }}">
                                                <a href="{{ route('Classrooms.list') }}">Salones</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="{{ check_item_active('main_li', 'users') }}">
                                        <a><span class="pull-right text-muted">
                                                <i class="fa fa-caret-down"></i></span>
                                            <i
                                                class="icon mdi-editor-insert-chart
                                            i-20"></i>
                                            <span class="font-normal">Informes</span>
                                        </a>
                                    </li>

                                    <li class="b-b b m-v-sm"></li>
                                    <li class="{{ check_item_active('main_li', 'account') }}">
                                        <a md-ink-ripple href="{{ route('account.edit') }}">
                                            <i
                                                class="icon mdi-action-settings
                                            i-20"></i>
                                            <span>Configuracion</span>
                                        </a>
                                    </li>
                                    <li class="{{ check_item_active('main_li', 'account') }}">
                                        <a md-ink-ripple href="{{ route('account.edit') }}">
                                            <i class="icon mdi-action-perm-contact-cal i-20"></i>
                                            <span>Mi cuenta</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
<!-- / aside -->
