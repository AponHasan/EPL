@stack('before-profile')

<li class="nav-item dropdown">

      <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="#" alt="user" class="profile-pic" /></a>

      <div class="dropdown-menu dropdown-menu-right scale-up">

          <ul class="dropdown-user">

              <li>

                  <div class="dw-user-box">

                      <div class="u-img"><img src="#" alt="user"></div>

                      <div class="u-text">

                          <h5></h5>

                          <p class="text-muted">admin@example.com</p><a href="#" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>

                  </div>

              </li>

              <li role="separator" class="divider"></li>

              <li><a href="/profile/{{Auth::id()}}"><i class="ti-user"></i> My Profile</a></li>

              <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>

              <li><a href="#"><i class="ti-email"></i> Inbox</a></li>

              <li role="separator" class="divider"></li>

              <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>

              <li role="separator" class="divider"></li>

              <li><a href="{{ route('logout') }}"

                 onclick="event.preventDefault();

                               document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a>

                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                                   @csrf

                               </form>

                             </li>

          </ul>

      </div>

  </li>

  @stack('after-profile')

