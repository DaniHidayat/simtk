<nav class="navbar navbar-expand-lg navbar-ligth bg-default " >
    <div class="container">
        <a class="navbar-brand  fw-bold" href="/">
            <img src="{{ asset('/assets/templateskm/assets/form/img/logoKab.png') }}" alt="" width="70" height="50"></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ">
                    <!-- <li class="nav-item">
                        <a class="nav-link {{ ($active === 'Home')? 'active' : '' }}"  href="/">Home</a>
                    </li> -->
                    <li class="nav-item ">
                        <a class="nav-link fw-bold {{ ($active === 'Buku Tamu')? 'active' : '' }}" href="/">Irrigation </a>
                    </li>



                </ul>
                <!-- <ul class="navbar-nav ms-auto">
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome back, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/dashboard"> <i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>

                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit"class="dropdown-item"><i class="bi bi-box-arrow-right"></i>Logout</button>
                                </form>
                            </li>

                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a   class="nav-link {{ ($active === 'login')? 'active' : '' }}" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                    </li>
                    @endauth
                </ul> -->

            </div>
    </div>
</nav>
