<header>
    <!-- NAVBAR START -->
    <nav class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="logo">
                        <a href="{{route('user.dashboard')}}">BillPaySave</a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                           {{-- <img class="user-img" src="assets/images/user-icons.png" alt="User Image">  --}}
                           <span>{{ Auth::user()->first_name .' '. Auth::user()->last_name }}</span> 
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                          {{-- <li><a class="dropdown-item" href="#">Another action</a></li> --}}
                          {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                        </ul>
                      </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- NAVBAR END -->
</header>