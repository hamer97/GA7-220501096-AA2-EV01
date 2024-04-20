<?php  
if($_POST) {
    $nombre = isset($_POST['nombre']) ? $_POST["nombre"] : "";
    $telefono = isset($_POST['telefono']) ? $_POST["telefono"] : "";
    $fecha = isset($_POST['fecha']) ? $_POST["fecha"] : "";

    $stm = $conexion->prepare("INSERT INTO contactos (id, nombre, telefono, fecha) VALUES (null, :nombre, :telefono, :fecha)");
    $stm->bindParam(":nombre", $nombre);
    $stm->bindParam(":telefono", $telefono);
    $stm->bindParam(":fecha", $fecha);
    $stm->execute();

    header("location:index.php");
}
?>
<!-- Modal create -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR CONTACTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        <div class="modal-body">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" name="nombre" placeholder="Ingresa nombre">

          <label for="telefono">Teléfono</label>
          <input type="text" class="form-control" name="telefono" placeholder="Ingresa teléfono">

          <label for="fecha">Fecha</label>
          <input type="date" class="form-control" name="fecha">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>