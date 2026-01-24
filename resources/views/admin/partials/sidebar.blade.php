        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <!--begin::Sidebar Brand-->
            <div class="sidebar-brand">
                <!--begin::Brand Link-->
                <a href="{{ route('admin.dashboard') }}" class="brand-link">
                    <!--begin::Brand Text-->
                    <span class="brand-text fw-light">CodeQuest</span>
                    <!--end::Brand Text-->
                </a>
                <!--end::Brand Link-->
            </div>
            <!--end::Sidebar Brand-->
            <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                        aria-label="Main navigation" data-accordion="false" id="navigation">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-gauge"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.users') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-users"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-book-open"></i>
                                <p>
                                    Courses
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.courses') }}" class="nav-link">
                                        <i class="nav-icon fa-solid fa-layer-group"></i>
                                        <p>All Courses</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa-solid fa-circle-plus"></i>
                                        <p>Add New Course</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-award"></i>
                                <p>
                                    Badges
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.badges') }}" class="nav-link">
                                        <i class="nav-icon fa-solid fa-medal"></i>
                                        <p>All Badges</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.add-badge') }}" class="nav-link">
                                        <i class="nav-icon fa-solid fa-circle-plus"></i>
                                        <p>Add New Badge</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.enrollments') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-clipboard-list"></i>
                                <p>Enrollments</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.enrollments') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-clipboard-list"></i>
                                <p>Contact</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="enrollments.html" class="nav-link">
                                <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                    <!--end::Sidebar Menu-->
                </nav>
            </div>
            <!--end::Sidebar Wrapper-->
        </aside>
