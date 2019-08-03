<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Agregar productos</title>
</head>
<body>

<?php
$this->load->view('header');
?>
    <div class="container">
        <div class="row">
             <div class="col-sm">
             </div>
             <div class="col-6"><td class="align-middle">
             <h3><p class="text-center"> Modificar producto </p></h3>

    
    <div class="container">
        <div class="row">
            <div class="col-3">
               <?php
                    echo form_open_multipart ('Content/edit',array('method'=> 'POST'));
                    echo form_label ('Id:');
                    echo "<br>";
                    echo form_label ('Producto:*');
                    echo "<br>";
                    echo form_label ('Descripción:');
                    echo "<br>";
                    echo form_label ('Categoria:');
                ?>
            </div>

            <div class="col-3">
                <?php
                    foreach($query as $row):
                    echo form_hidden('id', $row->id_prod);
                    echo form_input ('product', $row->nombre);
                    echo "<br>";
                    echo form_input ('descript', $row->descripcion);
                    echo "<br>";
                    $options = array(
                        '1' => 'Juguetes',
                        '2' => 'Tecnologia',
                        '3' => 'Linea Blanca',
                        '4' => 'Ropa para Dama',
                        '5' => 'Ropa para Caballero',
                        '6' => 'Ropa Infantil',
                        '7' => 'Libreria',
                    );
                     echo form_dropdown ('category', $options, $row->f_id_categoria);
                ?>
            </div>
            <div vlass="col-md text-center">
                <p class="text-center">Imagen del producto:</p>

            <input type="file" name="image" accept=".jpg,.jpeg,.png" class="hidden" />
            <label for="files">Imagen actual:<?= $row->foto ?></label>
            <td><img src="<?= base_url().'uploads/'.$row->foto; ?>" style="width:500px;" /></td> 
            <?php  endforeach; ?>  
            <?php
                echo form_submit ('submit', 'Actualizar');
                echo form_close();
            ?>      
            </div> 
            
        </div>
    </div>
    

    <small id="warning" class="form-text text-muted"><p class="text-center">Los campos marcados con * son obligatorios</p></small>
    

    


<?= isset($msg) ? $msg : '' ?>
                </td>
</div>
<div class="col-sm">
             </div>
        </div>
    </div>
</body>
</html>