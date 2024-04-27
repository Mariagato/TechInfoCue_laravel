<div class="navbar md-whiteframe-z1 no-radius bg-main">
    <a md-ink-ripple data-toggle="modal" data-target="#aside"
       class="navbar-item pull-left visible-xs visible-sm"><i class="mdi-navigation-menu i-24 text-white"></i></a>

    <a md-ink-ripple  ui-toggle-class="folded" target="#aside"
       class="navbar-item pull-left visible-lg visible-md"><i class="mdi-navigation-menu i-24 text-white"></i></a>

    <a md-ink-ripple
       class="navbar-item pull-left visible-lg visible-md" id="full_screen"><i class="mdi-navigation-fullscreen i-24 text-white"></i></a>

    <a md-ink-ripple href="{{route('home')}}" target="_blank"
       class="navbar-item pull-left visible-lg visible-md"><i class="mdi-image-remove-red-eye i-24 text-white"></i></a>

    <ul class="nav nav-sm navbar-tool pull-right">
        <li class="dropdown">
            <a onclick="$('#logout-form').submit();" aria-label="osad"><h3><i class="icon mdi-action-exit-to-app text-white" title="Salir"></i></h3></a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
    <div class="pull-right" ui-view="navbar@"></div>
</div>
