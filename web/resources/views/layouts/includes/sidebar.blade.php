<div class="menu">
    @if (auth()->user()->role == Constant::USER_ROLES['admin'])
        <div class="main-menu">
            <div class="scroll">
                <ul class="list-unstyled">
                    <li {!! Helper::routeIs('admin.dashboard') ? 'class="active"' : '' !!}>
                        <a href="{{ route('home') }}">
                            <i class="iconsminds-shop-4"></i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>
                    <li {!! Helper::routeIs('fishes.index') ? 'class="active"' : '' !!}>
                        <a href="{{ route('fishes.index') }}">
                            <i class="simple-icon-ghost"></i> Espèces
                        </a>
                    </li>
                    <li {!! Helper::routeIs('measures.index') ? 'class="active"' : '' !!}>
                        <a href="{{ route('measures.index') }}">
                            <i class="simple-icon-layers"></i> Measures
                        </a>
                    </li>
                    <li {!! Helper::routeIs('rules.index') ? 'class="active"' : '' !!}>
                        <a href="{{ route('rules.index') }}">
                            <i class="simple-icon-paper-clip"></i> Annexes
                        </a>
                    </li>
                    <li {!! Helper::routeIs('zones.index') ? 'class="active"' : '' !!}>
                        <a href="{{ route('zones.index') }}">
                            <i class="simple-icon-map"></i> Zones
                        </a>
                    </li>
                    <li {!! Helper::routeIs('infractions.index') ? 'class="active"' : '' !!}>
                        <a href="{{ route('infractions.index') }}">
                            <i class="simple-file"></i> Infractions
                        </a>
                    </li>
                    <li {!! Helper::routeIs('admins.index') ? 'class="active"' : '' !!}>
                        <a href="{{ route('admins.index') }}">
                            <i class="iconsminds-male-female"></i> Administrateurs
                        </a>
                    </li>
                    <li {!! Helper::routeIs('agents.index') ? 'class="active"' : '' !!}>
                        <a href="{{ route('agents.index') }}">
                            <i class="iconsminds-male-female"></i> Agents
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    @endif
    <div class="sub-menu"></div>
</div>