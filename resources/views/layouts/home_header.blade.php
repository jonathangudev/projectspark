

  <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />

      <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand navbar-light fixed-top bg-white">

            <ul class="navbar-nav navbar-right  ml-auto">

              @if (Auth::check())
              <li class="nav-item">
                <span class="nav-link">Logged in as:  {{Auth::user()->name}} | <a href= {{ URL::to('logout') }}>Log out</a></span>
              </li>
              @endif

              <li class="nav-item">
                <a class="nav-link" href={{ URL::to('lessons') }} >Lessons</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href={{ URL::to('grammar') }} >Grammar</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href= {{ URL::to('about') }} >About</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href= {{ URL::to('blog') }} >Blog</a>
              </li>

            </ul>
        </nav>
      </header>
