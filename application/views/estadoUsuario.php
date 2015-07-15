<form class="navbar-form navbar-right">
    <div class="form-group">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
        <?php echo $this->session->userdata('nombre') ?> <?php echo $this->session->userdata('apellido')?>
    </div>
    <div class="form-group">
        <button class="btn btn-danger" id="btnSalir">
            <span class="glyphicon glyphicon-off" aria-hidden="true">
            </span> 
            Salir
        </button>
    </div>
</form>