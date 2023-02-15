<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Laravel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/">Foruam</a>
            </li>

        </ul>
    </div>
    <ul class="nav navbar-nav navbar-right">
        @if (session('username') == 0)
          <li class="me-2"><a href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span> Login</a></li>
          <li><a href="{{ route('createRegistration') }}"><span class="glyphicon glyphicon-user"></span> Registration</a></li>

          @else
          <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        @endif

    </ul>
</nav>
