@inject('request', 'Illuminate\Http\Request')
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu"
            data-keep-expanded="false"
            data-auto-scroll="true"
            data-slide-speed="200">
            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li class="{{ $request->segment(1) == 'time_entries' ? 'active' : '' }}">
                <a href="{{ route('time_entries.index') }}">
                    <i class="fa fa-clock-o"></i>
                    <span class="title">Time entries</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'projects' ? 'active' : '' }}">
                <a href="{{ route('projects.index') }}">
                    <i class="fa fa-briefcase"></i>
                    <span class="title">Projects</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'work_types' ? 'active' : '' }}">
                <a href="{{ route('work_types.index') }}">
                    <i class="fa fa-th"></i>
                    <span class="title">Work types</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'reports' ? 'active' : '' }}">
                <a href="{{ route('reports.index') }}">
                    <i class="fa fa-bar-chart"></i>
                    <span class="title">Reports</span>
                </a>
            </li>
            <li>
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span class="title">Manage Users</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                                <li class="{{ $request->segment(1) == 'users' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('users.index') }}">
                                        <i class="fa fa-user"></i>
                                        <span class="title">
                                            Users
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(1) == 'roles' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('roles.index') }}">
                                        <i class="fa fa-key"></i>
                                        <span class="title">
                                            Roles
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(1) == 'user_actions' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('user_actions.index') }}">
                                        <i class="fa fa-list-ul"></i>
                                        <span class="title">
                                            User actions
                                        </span>
                                    </a>
                                </li>
                                </ul>
                    </li>
                                    

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">Logout</button>
{!! Form::close() !!}