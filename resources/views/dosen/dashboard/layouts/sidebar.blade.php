<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('lecture-listen') ? 'active' : '' }}"  href="/lecture-listen" >
            <span data-feather="play-circle"></span>
            I Listen
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('lecture-watch') ? 'active' : '' }}"  href="/lecture-watch" >
            <span data-feather="tv"></span>
            I Watch
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('lecture-read') ? 'active' : '' }}"  href="/lecture-read" >
            <span data-feather="book-open"></span>
            I Read
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('lecture-speak') ? 'active' : '' }}"  href="/lecture-speak" >
            <span data-feather="mic"></span>
            I Speak
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="" >
            <span data-feather="coffee"></span>
            Discuss
          </a>
        </li>
      </ul>

    </div>
  </nav>