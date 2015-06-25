<!--
pagina login cargada dentrodel cuerpo
solo en caso de no existir un usuario activo
-->   
   <div class="row">
    <div class="col-md-4">
      <form id="forma" class="form-signin">
        <h2 class="form-signin-heading">Ingreso a Bodega</h2>
          <label for="inputEmail" class="sr-only">Ingrese su usuario</label>
          <input type="text" id="usuario" class="form-control" placeholder="Usuario..." required autofocus>
          <label for="inputPassword" class="sr-only">ingrese su Contraseña</label>
          <input type="password" id="clave" class="form-control" placeholder="Contraseña..." required>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">Recordar
              </label>
            </div>
            <button class="btn btn-lg btn-success btn-block" id="btnLogin" type="submit">Ingresar</button>
      </form>
    </div>
    <div class="col-md-8">
    </div>
  </div>