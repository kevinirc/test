<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('listen') ? 'active' : '' }}"  href="/listen" >
            <span data-feather="play-circle"></span>
            I Listen
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('watch') ? 'active' : '' }}"  href="/watch" >
            <span data-feather="tv"></span>
            I Watch
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('read') ? 'active' : '' }}"  href="/read" >
            <span data-feather="book-open"></span>
            I Read
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('speak') ? 'active' : '' }}"  href="/speak" >
            <span data-feather="mic"></span>
            I Speak
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('discuss') ? 'active' : '' }}"  href="/discuss" >
            <span data-feather="coffee"></span>
            Discuss
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('user') ? 'active' : '' }}"  href="/user" >
            <span data-feather="users"></span>
            User
          </a>
        </li>
      </ul>

    </div>
  </nav>