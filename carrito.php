<script src = "jquery.js"></script>

    <script>
    function eliminaFilas(eliminado){
        if(confirm("¿Desea eliminar el usuario?") == true){
            $.ajax({
               url       :   'elimina_producto.php',
               type      :   'post',
               dataType  :   'text',
               data      :   'id='+eliminado,
               success   :   function(res) {
                console.log(res);
                $('#fila'+ eliminado).hide();
                }, error : function(){
                    alert('Error, archivo no encontrado');
                }
                
            });
        }
    }
</script>

<link rel="stylesheet" type="text/css" href="Administradores/estiloDetalle.css">
<div id="main-container">
         <table border="1" align="center" valig="middle">
            <thead>
                <tr align="center" id="encabezado">
            <td>id</td>
            <td>nombre</td>
            <td>cantidad</td>
            <td>precio</td>
            <td>subtotal</td>
            <td>eliminar</td>
                </tr>
            </thead>
    <?php

    session_start();
        $conexion=mysqli_connect('localhost','root','','administradores');
        $id = $_SESSION['id_pedido'];
        $total = 0;
        $sql = "SELECT *
                FROM pedidos_productos
                WHERE id_pedido = '$id'";
        $resultado=mysqli_query($conexion,$sql);
        while($mostrar=mysqli_fetch_array($resultado)){
         ?>
         <?php 

         $id_producto = $mostrar['id_producto'];
         $cantidad = $mostrar ['cantidad'];

         $sql2 = "SELECT * FROM productos 
                  WHERE id = '$id_producto' AND eliminado = 0";
         $resultado2=mysqli_query($conexion,$sql2);

         while($mostrar2=mysqli_fetch_array($resultado2)){
            $precio = $mostrar2 ['costo'];
            $nombre = $mostrar2 ['nombre'];
         }
         $subtotal = $cantidad*$precio;
         $total = $total+$subtotal;
         ?>
         
        <tr id="fila<?php echo $mostrar['id']?>">
            <td><?php echo $id_producto ?></td>
            <td><?php echo $nombre ?></td>
            <td><?php echo $cantidad ?></td>
            <td><?php echo $precio ?></td>
            <td><?php echo $subtotal ?></td>
            <td> <button type="button" name="button" onclick="eliminaFilas(<?php echo $mostrar['id'] ?>);">Eliminar registro</button></td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="4" align="middle">Total</td>
            <td><?php echo $total ?></td>
            <td><a href="confirmarCarrito.php">Confirmar</a></td></td>
        </tr>
         </table>
     </div>
        