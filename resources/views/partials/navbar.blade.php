<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container" style="font-style: italic;">
      <a class="navbar-brand" href="/">BLOG</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }} "aria-current="page" href="/">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('posts') ? 'active' : '' }}" href="/posts">BLOG</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}" href="/categories">CATEGORY</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">ABOUT ME</a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto">
        @auth

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle"></i> {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="/dashboard">My Dashboard</a></li>
            <li>
              <form action="/logout" method="post">
                @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-right"></i> Logot</button>
              </form>
            </li>
          </ul>
        </li>

       
        @else

          <li class="nav-item">
            <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
          </li>

        @endauth
      </ul>

        
      </div>
    </div>
  </nav>