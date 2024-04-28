<!-- aside -->
<aside id="aside" class="app-aside modal fade " role="menu">
    <div class="left">
        <div class="box bg-white">
            <div class="navbar md-whiteframe-z1 no-radius bg-main">
                <a class="navbar-brand">
                    <img src="{{ asset('images/logo.png') }}" alt="." style="max-height: 30px;">
                    <span class="hidden-folded m-l inline text-white">{{ config('app.name', 'CMS') }}</span>
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
                                {{ auth()->user()->email ?? 'Unset' }}
                            </a>
                        </div>
                        <div id="nav">
                            <nav ui-nav>
                                <ul class="nav">
                                    <!-- languaje -->
                                    <li md-ink-ripple>
                                        <a><span class="pull-right text-muted">
                                                <i class="fa fa-caret-down"></i></span>
                                            <img src="{{ asset('images/' . app()->getLocale() . '.svg') }}"
                                                class="lang-icon">
                                            <span class="font-normal">
                                                {{ config()->get('languages.' . app()->getLocale()) }}
                                            </span>
                                        </a>
                                        <ul class="nav nav-sub">
                                            @foreach (config()->get('languages') as $lang => $language)
                                                @if ($lang != app()->getLocale())
                                                    <li>
                                                        <a md-ink-ripple href="{{ route('lang.switch', $lang) }}">
                                                            {{ $language }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    <!-- / languaje -->

                                    <li class="nav-header hidden-folded">
                                        Módulos
                                    </li>

                                    <li class="{{ check_item_active('main_li', 'dashboard') }}">
                                        <a href="{{ route('dashboard') }}">
                                            <i class="icon mdi-action-dashboard i-20"></i>
                                            <span class="font-normal">Escritorio</span>
                                        </a>
                                    </li>
                                    <li class="{{ check_item_active('main_li_id', 'slides', '1') }}">
                                        <a href="{{ route('slides.edit_slide', ['id' => 1]) }}">
                                            <i class="icon mdi-image-camera-alt i-20"></i>
                                            <span class="font-normal">Slide principal</span>
                                        </a>
                                    </li>
                                    <li class="{{ check_item_active('main_li', 'contents') }}">
                                        <a><span class="pull-right text-muted">
                                                <i class="fa fa-caret-down"></i></span>
                                            <i class="icon mdi-file-folder i-20"></i>
                                            <span class="font-normal">Contenidos</span>
                                        </a>
                                        <ul class="nav nav-sub">
                                            <li class="{{ check_item_active('inner_li_add', 'contents', 'edit') }}">
                                                <a href="{{ route('contents.edit', ['id' => 0]) }}">Agregar
                                                    contenido</a>
                                            </li>
                                            <li
                                                class="{{ check_item_active('inner_li_list', 'contents', 'list,edit') }}">
                                                <a href="{{ route('contents.list') }}">Lista de contenidos</a>
                                            </li>
                                            <li class="{{ check_item_active('inner_li', 'contents', 'categories') }}">
                                                <a href="{{ route('contents.categories') }}">Administrar categorías</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="{{ check_item_active('main_li', 'services') }}">
                                        <a><span class="pull-right text-muted">
                                                <i class="fa fa-caret-down"></i></span>
                                            <i class="icon mdi-action-assignment i-20"></i>
                                            <span class="font-normal">Servicios</span>
                                        </a>

                                        <ul class="nav nav-sub">
                                            <li class="{{ check_item_active('inner_li_add', 'services', 'edit') }}">
                                                <a href="{{ route('services.edit', ['id' => 0]) }}">Agregar
                                                    servicio</a>
                                            </li>
                                            <li
                                                class="{{ check_item_active('inner_li_list', 'services', 'list,edit') }}">
                                                <a href="{{ route('services.list') }}">Lista de servicios</a>
                                            </li>
                                            <li class="{{ check_item_active('inner_li', 'services', 'categories') }}">
                                                <a href="{{ route('services.categories') }}">Administrar categorías</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="{{ check_item_active('main_li', 'users') }}">
                                        <a><span class="pull-right text-muted">
                                                <i class="fa fa-caret-down"></i></span>
                                            <i class="icon mdi-action-bookmark-outline i-20"></i>
                                            <span class="font-normal">Usuarios</span>
                                        </a>
                                        <ul class="nav nav-sub">
                                            <li class="{{ check_item_active('inner_li_add', 'users', 'edit') }}">
                                                <a href="{{ route('users.edit', ['id' => 0]) }}">Agregar usuario</a>
                                            </li>
                                            <li class="{{ check_item_active('inner_li_list', 'users', 'list,edit') }}">
                                                <a href="{{ route('users') }}">Lista de usuarios</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="{{ check_item_active('main_li', 'articles') }}">
                                        <a><span class="pull-right text-muted">
                                                <i class="fa fa-caret-down"></i></span>
                                            <i class="icon mdi-action-bookmark-outline i-20"></i>
                                            <span class="font-normal">Blog</span>
                                        </a>
                                        <ul class="nav nav-sub">
                                            <li class="{{ check_item_active('inner_li_add', 'articles', 'edit') }}">
                                                <a href="{{ route('articles.edit', ['id' => 0]) }}">Agregar
                                                    artículo</a>
                                            </li>
                                            <li
                                                class="{{ check_item_active('inner_li_list', 'articles', 'list,edit') }}">
                                                <a href="{{ route('articles.list') }}">Lista de artículos</a>
                                            </li>
                                            <li class="{{ check_item_active('inner_li', 'articles', 'categories') }}">
                                                <a href="{{ route('articles.categories') }}">Administrar categorías</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="{{ check_item_active('main_li', 'locations') }}">
                                        <a><span class="pull-right text-muted">
                                                <i class="fa fa-caret-down"></i></span>
                                            <i class="icon mdi-communication-location-on i-20"></i>
                                            <span class="font-normal">Oficinas</span>
                                        </a>
                                        <ul class="nav nav-sub">
                                            <li class="{{ check_item_active('inner_li_add', 'locations', 'edit') }}">
                                                <a href="{{ route('locations.edit', ['id' => 0]) }}">Agregar
                                                    oficina</a>
                                            </li>
                                            <li
                                                class="{{ check_item_active('inner_li_list', 'locations', 'list,edit') }}">
                                                <a href="{{ route('locations.list') }}">Lista de oficinas</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="{{ check_item_active('main_li', 'subscribers') }}">
                                        <a href="{{ route('subscribers.list') }}">
                                            <i class="icon mdi-action-verified-user i-20"></i>
                                            <span class="font-normal">Newsletter</span>
                                        </a>
                                    </li>


                                    <li class="b-b b m-v-sm"></li>

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
