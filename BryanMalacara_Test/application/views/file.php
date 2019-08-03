<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script>
        $(document).ready(function(){
        
        $(".edit_data").click(function(){
            var id = $(this).attr("id");
            window.location="<?php echo base_url(); ?>index.php/Content/edit_data/"+id;
        });

        });
    </script>

    <title>Detalles</title>
</head>
<body>
<?php
$this->load->view('header');
?>
<div class="container">
  <div class="row">
    <div class="col-3">
    </div>
    <div class="col-3 ">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Categoria</th>
                </tr>
            </thead>
  <tbody>
    <tr>
    <div class="container">
            <?php foreach($query as $row): ?>
            <tr>   
                <td><?php echo $row->id_prod; ?></td>
                <td><?php echo $row->nombre; ?></td>
                <td><?php echo $row->descripcion; ?></td>
                <td><?php echo $row->f_id_categoria; ?></td>
                
            </tr>
            
        </div>
    </tr>
  </tbody>
</table>
<td><div class="text-center"><img src="<?= base_url().'uploads/'.$row->foto; ?>" class="rounded mx-auto d-block" /></div></td>    
    <?php  endforeach; ?>  
    <td><p class="text-center"><a href="#" class="edit_data" id="<?php echo $row->id_prod; ?>">Modificar</p></td>
    </div>
    <div class="col-sm">    
    </div>
  </div>
</div>

    
</body>
</html>