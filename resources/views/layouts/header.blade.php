

<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />

      <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand navbar-light fixed-top text-center bg-white">
          <a class="navbar-brand" href={{ URL::to('') }}>

            <img class="logo 	d-none d-sm-inline" src="/img/logo.png"></img>
            <span class="d-inline d-sm-none nav-link">Home</span>
          </a>
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
          </div>
        </nav>
      </header>
