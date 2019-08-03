<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <style type="text/css">
        .tableFixHead
        .tableFixHead thead th { position: sticky; top: 0; }
    </style>

    <script>
        $(document).ready(function(){
        
        $(".delete_data").click(function(){
                var id = $(this).attr("id");
                    if(confirm("¿Estás seguro de querer borrar esto?")){
                        window.location="<?php echo base_url(); ?>index.php/Content/delete_data/"+id;
                    }
                });
                
        $(".details_data").click(function(){
            var id = $(this).attr("id");
            window.location="<?php echo base_url(); ?>index.php/Content/view_data/"+id;
        });

        });
    </script>

    <title>Productos</title>
</head>
<body>
<?php
$this->load->view('header');
?>
    <div class="tableFixHead">
<table class="table table-hover table-fixed">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Categoría</th>
      <th>Detalles</th>
      <th>Eliminar</th>
    </tr>
  </thead>
  <tbody>
  <ul>
   
    </ul>
    <?php foreach($query as $row): ?>
<tr>   
    <td><?php echo $row->id_prod; ?></td>
    <td><?php echo $row->nombre; ?></td>
    <td><?php echo $row->descripcion; ?></td>
    <td><?php echo $row->f_id_categoria; ?></td>
    <td><a href="#" class="details_data" id="<?php echo $row->id_prod; ?>">Detalles</td>
    <td><a href="#" class="delete_data" id="<?php echo $row->id_prod; ?>">Eliminar</td>
</tr>
<?php endforeach; ?>
  </tbody>
</table>
</div>

    
</body>
</html>