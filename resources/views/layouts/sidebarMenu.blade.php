<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ Request::is('/') ? '' : 'collapsed' }}" href="/">
          <i class="bi bi-grid"></i>
          <span>Panel</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tablas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-general.html">
              <i class="bi bi-circle"></i><span>Tablas Generales</span>
            </a>
          </li>
          <li>
            <a href="tables-data.html">
              <i class="bi bi-circle"></i><span>Tabla de datos</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->


      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('users.index')}}">
          <i class="bi bi-person"></i>
          <span>Perfil</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('facturas.create')}}">
            <i class="bi bi-cash-coin"></i>
          <span>Nueva Venta</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('productos.index')}}">
            <i class="bi bi-minecart"></i>
          <span>Productos</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('categoria.index')}}">
            <i class="bi bi-star-fill"></i>
          <span>Categorias</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('descuento.index')}}">
            <i class="bi bi-cursor"></i>
          <span>Descuentos</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('productos.index')}}">
            <i class="bi bi-wallet-fill"></i>
          <span>Inventario</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('cliente.index')}}">
            <i class="bi bi-people"></i>
          <span>Clientes</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('factura.index')}}">
            <i class="bi bi-receipt-cutoff"></i>
          <span>Facturas</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('promocion.index')}}">
            <i class="bi bi-collection"></i>
          <span>Promociones Por producto</span>
        </a>
      </li>




      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
            <i class="bi bi-patch-plus"></i>
          <span>Registrar</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->




    </ul>

  </aside><!-- End Sidebar-->
