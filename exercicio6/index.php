<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Agenda</title>
  </head>
  <body>
  <div class="container">
    <?php require_once('process.php');?>

    <?php if(isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">

        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>

    <?php 

    $mysql = new mysqli("localhost", "root", "", "db_contacts") or die(mysql_error($mysql));
    $result = $mysql->query("SELECT * FROM tb_contacts") or die($mysql->error);

    ?>

    <div class="cointainer">
        <table class="table">
            <thead>
            <tr>
                <th>Foto</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th colspan="2">Opções</th>
            </tr>
            </thead>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                <?php if($row['imagem'] == ''): ?>
                    <td><img src="<?php echo 'imgs/default.jpg'?>" width="40px"></td>
                <?php else: ?>
                    <td><img src="<?php echo 'imgs/'.$row['imagem']?>" width="40px"></td>
                <?php endif;?>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo $row['telefone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Editar</a>
                        <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <?php
    
    function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    };

    ?>
    <h1>Adicionar contato:</h1>
    <form action="process.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="container">
        <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>" placeholder="Digite seu nome">
        </div>
        <div class="form-group">
        <label>Telefone</label>
        <input type="text" name="telefone" class="form-control" value="<?php echo $telefone; ?>" placeholder="Digite seu telefone">
        </div>
        <div class="form-group">
        <label>E-mail</label>
        <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Digite seu e-mail">
        </div>
        <div class="form-group">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control">
        </div>
        <div class="form-group">
        <?php
        if($update == true):
        ?>
        <button type="submit" name="atualizar" class="btn btn-info">Atualizar</button>
        <?php else: ?>
        <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
        <?php endif; ?>
        </div>
    </form>
    </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>