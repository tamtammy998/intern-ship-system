<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu" style="background-color: #572f9e;">

<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        @if(Auth::user()->usertype == 'Admin')
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" key="t-menu">Menu</li>

            <li>
                <a href="/dashboard" class="waves-effect">
                    <i class="bx bx-home-circle"></i>
                    <span key="t-dashboards">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('intern.index') }}" class="waves-effect">
                    <i class="bx bx-tone"></i>
                    <span key="t-programs">Interns</span>
                </a>
            </li>

            <li>
                <a href="{{ route('branch.index') }}" class="waves-effect">
                <i class="bx bxs-user-detail"></i>
                    <span key="t-dashboards">Campuses</span>
                </a>
            </li>

            <li>
                <a href="{{ route('record.index') }}" class="waves-effect">
                    <i class="bx bxs-bar-chart-alt-2"></i>
                    <span key="t-dashboards">Accomplishment Report</span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-user-circle"></i>
                    <span key="t-authentication">User Management</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('user.index') }}" key="t-login">User</a></li>
                </ul>
            </li>


            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-briefcase-alt-2"></i>
                    <span key="t-projects">Settings</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('document.index') }}" key="t-p-grid">Requirements</a></li>
                    <li><a href="{{ route('campuses.index') }}" key="t-p-grid">Campuses</a></li>
                    <li><a href="{{ route('programs.index') }}" key="t-p-list">Programs</a></li>
                </ul>
            </li>

     
        </ul>
        @elseif(Auth::user()->usertype == 'ojt_in_charge')
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" key="t-menu">Menu</li>

            <li>
                <a href="/dashboard" class="waves-effect">
                    <i class="bx bx-home-circle"></i>
                    <span key="t-dashboards">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('intern.index') }}" class="waves-effect">
                    <i class="bx bx-tone"></i>
                    <span key="t-programs">Interns</span>
                </a>
            </li>

            <li>
                <a href="{{ route('record.index') }}" class="waves-effect">
                    <i class="bx bxs-bar-chart-alt-2"></i>
                    <span key="t-dashboards">Accomplishment Report</span>
                </a>
            </li>


        </ul>
        @else
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" key="t-menu">Menu</li>

            <li>
                <a href="/dashboard" class="waves-effect">
                    <i class="bx bx-home-circle"></i>
                    <span key="t-dashboards">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('student.index') }}" class="waves-effect">
                    <i class="bx bx-tone"></i>
                    <span key="t-programs">Profile</span>
                </a>
            </li>

            <li>
                <a href="{{ route('requirement.index') }}" class="waves-effect">
                    <i class="bx bxs-bar-chart-alt-2"></i>
                    <span key="t-dashboards">Requirements</span>
                </a>
            </li>

            <li>
                <a href="{{ route('record.index') }}" class="waves-effect">
                    <i class="bx bxs-bar-chart-alt-2"></i>
                    <span key="t-dashboards">Daily Time Records</span>
                </a>
            </li>

        </ul>
        @endif
    </div>
    <!-- Sidebar -->
</div>
</div>
<!-- Left Sidebar End -->