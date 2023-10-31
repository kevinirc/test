<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('student-listen') ? 'active' : '' }}"  href="/student-listen" >
            <span data-feather="play-circle"></span>
            I Listen
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('student-watch') ? 'active' : '' }}"  href="/student-watch" >
            <span data-feather="tv"></span>
            I Watch
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('student-read') ? 'active' : '' }}"  href="/student-read" >
            <span data-feather="book-open"></span>
            I Read
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('student-speak') ? 'active' : '' }}"  href="/student-speak" >
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