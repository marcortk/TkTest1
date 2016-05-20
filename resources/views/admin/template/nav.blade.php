<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{route('tk.index')}}">TK</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      @if(Auth::user())
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{route('tk.users.index')}}">Usuarios <span class="sr-only">(current)</span></a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Items <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{route('tk.items.books.index')}}">Libros</a></li>
            <li><a href="{{route('tk.items.laptops.index')}}">Laptops</a></li>
            <li><a href="{{route('tk.items.others.index')}}">Otros</a></li>

          </ul>
        </li>

      </ul>
      <ul class="nav navbar-nav navbar-right">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{route('admin.auth.logout')}}">Salir</a></li>
            <li role="separator" class="divider"></li>
            
          </ul>
        </li>
      </ul>
      @endif 
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>