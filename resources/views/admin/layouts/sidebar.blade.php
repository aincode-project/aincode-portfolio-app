<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li class="nav-item active">
            <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Dropdown</span></a>
            <ul class="dropdown-menu" style="display: none;">
              <li><a class="nav-link" href="">test</a></li>

            </ul>
          </li>
          <li class="menu-header">Sections</li>

          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Hero</span></a>
            <ul class="dropdown-menu" style="display: none;">
              <li><a class="nav-link" href="{{ route('admin.typer-title.index') }}">Typer Title</a></li>
              <li><a class="nav-link" href="{{ route('admin.hero.index') }}">Hero Section</a></li>

            </ul>
          </li>

          {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}

        </ul>
    </aside>
  </div>
