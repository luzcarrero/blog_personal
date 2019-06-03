<header>
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
                    <span class="sr-only">desplegar/ocultar menu</span>
                    <span class=""></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand ">Altair<img src="img/code.png" alt=""/>Programming</a>
            </div>
            <!--aqui comienza el menu-->
            <div class="collapse navbar-collapse" id="navegacion-fm">
                <ul class="nav navbar-nav">
                    <li class=""><a href="inicio.php">Inicio</a></li>
                    <li class="dropdown" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            categoria <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Medio</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Avanzado</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="fas fa-star"> <span> Principiante </span></i></a></li>
                        </ul>
                    </li>
                    <li class="dropdown" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            blog <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="sobreMi.php">¿Quién soy?</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Articulos</a></li>
                          
                            
                        </ul>
                    </li>
                    <li class="" >
                    
                        <a href="salir.php" class=""  role="button">
                                cerrar sesion
                        </a>

                    </li>
                    
                </ul>
                <!-barra de busqueda y botoncito-->
                <form action="#" class="navbar-form navbar-right" rol="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="buscar"/>
                    </div>
                    <button type="sumit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </form>

            </div>

        </div>
       
    </nav>
</header>