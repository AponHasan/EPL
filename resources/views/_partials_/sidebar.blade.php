<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">PERSONAL</li>
                        <li><a href="/home" class="has-arrow" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Home</span></a></li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">System Settings</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">Access-Control-List</a></li>
                                <li><a href="#">Access-Control</a></li>

                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">HRM</span></a>
                            <ul aria-expanded="false" class="collapse">
                              <li><a href="/epmdashboard">Dashboard</a></li>
                              <li><a href="/employee">Employee Info</a></li>
                              <li><a href="#">PayRoll</a></li>
                              <li><a href="/salarysettings">Salary</a></li>
                              <li><a href="/attendance">Attendance</a></li>
                                <li>
                                    <a class="has-arrow" href="#" aria-expanded="false">Settings</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="/department">Department</a></li>
                                        <li><a href="/divisions">Division</a></li>
                                        <li><a href="/workingplace">Working Place</a></li>
                                        <li><a href="/employmenttype">Employment Type</a></li>
                                        <li><a href="/designation">Designation</a></li>
                                        <li><a href="/leave">Leave</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>
                        
                       @stack('after-sidebar')
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
