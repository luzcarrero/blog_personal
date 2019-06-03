
<div class="container">
    <div class="caja">
        <div class="card">
            <div class="card-header">
                <h3>Sign In</h3>
                <div class="redes_sociales">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>
                </div>
            </div>
            <div class="card-body">
                
                <form name="iniciacion" action="./privado/usuarios.php"  method="post">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                    <input type="text" name="mail" class="form-control" placeholder="correo" required>
                    <input type="text" name="clave" class="form-control" placeholder="contraseña">
                    <div class="row align-items-center remember">
                        <input type="checkbox">Recordarme
                    </div>
                    <div class="form-group">
                    <div class="boton">
                   <input type="submit" class="boton" value="enviar"></input>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="links">
                   <a href="acceso.php"> Iniciar Sesión</a>
                </div>
                <div class="links">
                    <a href="#">he olvidado mi contraseña</a>
                </div>
            </div>
        </div>
    </div>
</div>