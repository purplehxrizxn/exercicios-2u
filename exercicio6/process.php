<?php

session_start();

$upload_dir = "imgs/";

$mysql = new mysqli("localhost", "root", "", "db_contacts");

$id = 0;
$update = false;
$nome = '';
$telefone = '';
$email = '';
$foto = '';

if ($mysql->connect_error){
    echo "Error: " . $mysql->connect_error;
}

if(isset($_POST['enviar'])){
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $foto = $_FILES['foto']['name'];

    $run = $mysql->query(
        "INSERT INTO tb_contacts (nome, telefone, email, imagem) 
        VALUES('$nome', '$telefone', '$email', '$foto')") 
        or die($mysql->error()
    );

    if($run){
        move_uploaded_file($_FILES['foto']['tmp_name'], "imgs/".$_FILES['foto']['name']);
    }

    $_SESSION['message'] = "Contato salvo!";
    $_SESSION['msg_type'] = "success";

    header("Location: index.php");

}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysql->query(
        "DELETE FROM tb_contacts 
        WHERE id=$id") 
        or die($mysql->error()
    );

    $_SESSION['message'] = "Contato deletado.";
    $_SESSION['msg_type'] = "danger";

    header("Location: index.php");

}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysql->query(
        "SELECT * FROM tb_contacts 
        WHERE id=$id") 
        or die($mysql->error()
    );

    if($result->num_rows){
        $row = $result->fetch_array();
        $nome = $row['nome'];
        $telefone = $row['telefone'];
        $email = $row['email'];
    }

}

if(isset($_POST['atualizar'])){
    $edit_id = $_POST['id'];
    $edit_nome = $_POST['nome'];
    $edit_telefone = $_POST['telefone'];
    $edit_email = $_POST['email'];
    $edit_foto = $_FILES['foto']['name'];

    $run = $mysql->query(
        "UPDATE tb_contacts 
        SET nome='$edit_nome', telefone='$edit_telefone', email='$edit_email', imagem='$edit_foto' 
        WHERE id=$edit_id") 
        or die($mysql->error()
    );

    if($run){
        move_uploaded_file($_FILES['foto']['tmp_name'], "imgs/".$_FILES['foto']['name']);
    }



    $_SESSION['message'] = "Contato atualizado!";
    $_SESSION['msg_type'] = "warning";

    header("Location: index.php");
}

