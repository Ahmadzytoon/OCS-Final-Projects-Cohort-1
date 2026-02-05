<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-logo">
        <a href="{{ route('companyOwner.index') }}">
            <h3>KnowledgeHub</h3>
        </a>
    </div>

    @if (Route::is('companyOwner*'))
        <div class="sidebar-menu">
            <ul class="nav-menu">
                <li class="nav-item active">
                    <a href="{{ route('companyOwner.index') }}" class="nav-link">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item has-dropdown">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Company Management</span>
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </a>
                    <ul class="nav-dropdown">
                        <li><a href="{{ route('companyOwner.companyProfile') }}"><i class="fas fa-user-tie"></i> Company
                                Profile</a></li>
                        {{-- <li><a href="#"><i class="fas fa-user-plus"></i>Subscription & Billing</a></li> --}}
                    </ul>
                </li>
                <li class="nav-item has-dropdown">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Users & Roles</span>
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </a>
                    <ul class="nav-dropdown">
                        <li><a href="{{ route('companyOwner.employee') }}"><i class="fas fa-user-tie"></i> Employees</a>
                        </li>
                        <li><a href="{{ route('companyOwner.accessRequests') }}"><i class="fas fa-user-plus"></i> Access
                                Requests</a></li>
                        <li><a href="{{ route('companyOwner.rolesAndPermissions') }}"><i class="fas fa-user-plus"></i>
                                Roles & Permissions</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('companyOwner.departments') }}" class="nav-link">
                        <i class="fas fa-book"></i>
                        <span>Departments</span>
                    </a>
                </li>
                <li class="nav-item has-dropdown">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Knowledge Center</span>
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </a>
                    <ul class="nav-dropdown">
                        <li><a href="{{ route('companyOwner.knowledgeOverview') }}"><i class="fas fa-user-tie"></i>
                                Knowledge Overview</a></li>
                        <li><a href="{{ route('companyOwner.onboardingKnowledge') }}"><i class="fas fa-user-plus"></i>
                                Onboarding Knowledge</a></li>
                        <li><a href="{{ route('companyOwner.MistakesAndLessonsLearned') }}"><i
                                    class="fas fa-user-plus"></i> Mistakes & Lessons Learned</a></li>
                        <li><a href="{{ route('companyOwner.OperationalKnowledge') }}"><i class="fas fa-user-plus"></i>
                                Operational Knowledge</a></li>
                        <li><a href="{{ route('companyOwner.CriticalAndStrategicKnowledge') }}"><i
                                    class="fas fa-user-plus"></i> Critical & Strategic Knowledge</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('companyOwner.approvals') }}" class="nav-link">
                        <i class="fas fa-calendar"></i>
                        <span>Approvals</span>
                    </a>
                </li>
                <li class="nav-item has-dropdown">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Calendar</span>
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </a>
                    <ul class="nav-dropdown">
                        <li><a href="{{ route('companyOwner.companyCalendar') }}"><i class="fas fa-user-tie"></i>
                                Company Calendar</a></li>
                        <li><a href="{{ route('companyOwner.departmentsCalendars') }}"><i class="fas fa-user-plus"></i>
                                Departments Calendars</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('companyOwner.companyNews') }}" class="nav-link">
                        <i class="fas fa-newspaper"></i>
                        <span>Company News</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('companyOwner.settings') }}" class="nav-link">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    @endif
    @if (Route::is('DepartmentManager*'))
        <div class="sidebar-menu">
            <ul class="nav-menu">
                <li class="nav-item active">
                    <a href="{{ route('DepartmentManager.index') }}" class="nav-link">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('DepartmentManager.departmentTeam') }}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Department Team</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-book"></i>
                        <span>Departments</span>
                    </a>
                </li>
                <li class="nav-item has-dropdown">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Knowledge Center</span>
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </a>
                    <ul class="nav-dropdown">
                        <li><a href="#"><i class="fas fa-user-tie"></i> Knowledge Overview</a></li>
                        <li><a href="#"><i class="fas fa-user-plus"></i> Onboarding Knowledge</a></li>
                        <li><a href="#"><i class="fas fa-user-plus"></i> Mistakes & Lessons Learned</a></li>
                        <li><a href="#"><i class="fas fa-user-plus"></i> Operational Knowledge</a></li>
                        <li><a href="#"><i class="fas fa-user-plus"></i> Critical & Strategic Knowledge</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-calendar"></i>
                        <span>Approvals</span>
                    </a>
                </li>
                <li class="nav-item has-dropdown">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Calendar</span>
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </a>
                    <ul class="nav-dropdown">
                        <li><a href="#"><i class="fas fa-user-tie"></i> Company Calendar</a></li>
                        <li><a href="#"><i class="fas fa-user-plus"></i> Departments Calendars</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-newspaper"></i>
                        <span>Company News</span>
                    </a>
                </li>


            </ul>
        </div>
    @endif
    @if (Route::is('employee*'))
        <div class="sidebar-menu">
            <ul class="nav-menu">
                <li class="nav-item active">
                    <a href="{{ route('employee.index') }}" class="nav-link">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('employee.addknowledge') }}" class="nav-link">
                        <i class="fas fa-home"></i>
                        <span>Add Knowledge </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('employee.myContributions') }}" class="nav-link">
                        <i class="fas fa-home"></i>
                        <span>My Contributions </span>
                    </a>
                </li>


                <li class="nav-item has-dropdown">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Knowledge Center</span>
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </a>
                    <ul class="nav-dropdown">
                        <li><a href="#"><i class="fas fa-user-tie"></i> Knowledge Overview</a></li>
                        <li><a href="#"><i class="fas fa-user-plus"></i> Onboarding Knowledge</a></li>
                        <li><a href="#"><i class="fas fa-user-plus"></i> Mistakes & Lessons Learned</a></li>
                        <li><a href="#"><i class="fas fa-user-plus"></i> Operational Knowledge</a></li>
                        <li><a href="#"><i class="fas fa-user-plus"></i> Critical & Strategic Knowledge</a></li>
                    </ul>
                </li>

                <li class="nav-item has-dropdown">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Calendar</span>
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </a>
                    <ul class="nav-dropdown">
                        <li><a href="#"><i class="fas fa-user-tie"></i> Company Calendar</a></li>
                        <li><a href="#"><i class="fas fa-user-plus"></i> Departments Calendars</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-newspaper"></i>
                        <span>Company News</span>
                    </a>
                </li>


            </ul>
        </div>
    @endif



</div>
