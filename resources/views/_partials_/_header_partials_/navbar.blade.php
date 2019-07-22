<nav class="navbar top-navbar navbar-expand-md navbar-light">


                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        @include('_partials_._header_partials_.search')

                    </ul>
                      @include('_partials_._header_partials_.navbar-logo')

                    <ul class="navbar-nav my-lg-0" style="margin-left: 18%;">

                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        @include('_partials_._header_partials_.comment')

                        <!-- ============================================================== -->
                        <!-- Notification -->
                        <!-- ============================================================== -->
                        @include('_partials_._header_partials_.notification')
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        @include('_partials_._header_partials_.profile')

                        <!-- ============================================================== -->
                        <!-- Language -->
                        <!-- ============================================================== -->
                        <!-- @include('_partials_._header_partials_.language') -->

                    </ul>
                </div>
            </nav>
