<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('games_one_access')
                <li class="nav-item">
                    <a href="{{ route("admin.games-ones.index") }}" class="nav-link {{ request()->is('admin/games-ones') || request()->is('admin/games-ones/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-futbol nav-icon">

                        </i>
                        {{ trans('cruds.gamesOne.title') }}
                    </a>
                </li>
            @endcan
            @can('game_two_access')
                <li class="nav-item">
                    <a href="{{ route("admin.game-twos.index") }}" class="nav-link {{ request()->is('admin/game-twos') || request()->is('admin/game-twos/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-futbol nav-icon">

                        </i>
                        {{ trans('cruds.gameTwo.title') }}
                    </a>
                </li>
            @endcan
            @can('team_one_access')
                <li class="nav-item">
                    <a href="{{ route("admin.team-ones.index") }}" class="nav-link {{ request()->is('admin/team-ones') || request()->is('admin/team-ones/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.teamOne.title') }}
                    </a>
                </li>
            @endcan
            @can('team_two_access')
                <li class="nav-item">
                    <a href="{{ route("admin.team-twos.index") }}" class="nav-link {{ request()->is('admin/team-twos') || request()->is('admin/team-twos/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.teamTwo.title') }}
                    </a>
                </li>
            @endcan
            @can('actus_access')
                <li class="nav-item">
                    <a href="{{ route("admin.actuses.index") }}" class="nav-link {{ request()->is('admin/actuses') || request()->is('admin/actuses/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-bullhorn nav-icon">

                        </i>
                        {{ trans('cruds.actus.title') }}
                    </a>
                </li>
            @endcan
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>