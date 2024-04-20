<?php

include("../../conexion.php");


$stm=$conexion->prepare("SELECT * FROM contactos");
$stm->execute();
$contactos=$stm->fetchAll(PDO::FETCH_ASSOC);


if(isset($_GET['id'])){

$txtid=(isset($_GET['id'])?$_GET['id']:"");
$stm=$conexion->prepare("DELETE FROM contactos WHERE id=:txtid");
$stm->bindparam(":txtid", $txtid);
$stm->execute();
header("location:index.php");
}



?>





<?php include("../../template/header.php")?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
  NUEVO
</button>

<div
    class="table-responsive"
>
    <table
        class= "table">
        <thead class= "table table-orange">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">TELEFONO</th>
                <th>FECHA</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($contactos as $contacto)  {   ?>
            <tr class="">
                <td scope="row"><?php echo $contacto ['id'];?></td> 
                <td><?php echo $contacto ['nombre'];?></td>
                <td><?php echo $contacto ['telefono'];?></td>
                <td><?php echo $contacto ['fecha'];?></td>
                <td>
                <a href="edit.php?id=<?php echo $contacto ['id'];?></td>" class="btn btn-success">Editar</a>
                <a href="index.php?id=<?php echo $contacto ['id'];?></td>" class="btn btn-danger">Eliminar</a>
                    
                </td>
            </tr>
           <?php } ?>
        
        </tbody>
    </table>
</div>
<?php include("create.php");   ?>



<?php include("../../template/footer.php")?>