<?php

include("conection.php");

    if(isset($_GET['delete'])){

        $name = $_GET['delete'];
        $mysql_arquivos = $mysqli->query("SELECT * from files WHERE name = '$name'") or die($mysqli->error);
        $fileDelete = $mysql_arquivos->fetch_assoc();

        if (unlink($fileDelete['path'])){

            $mysqli->query("DELETE from files WHERE name = '$name'") or die($mysqli->error);
        }
    }

    if(isset($_FILES['file'])){

        $file = $_FILES['file'];

        if($file['error']) die("Falha ao enviar arquivo");

        $foulder = "files/";
        $nameFile = $file['name'];
        $extension = strtolower(pathinfo($nameFile, PATHINFO_EXTENSION));

        if ($extension != "his" && $extension != "txt") die("Tipo de arquivo não aceito");

        $path = $foulder . $nameFile;
        $OK = move_uploaded_file($file["tmp_name"], $path);

        if($OK){
        $mysqli->query("INSERT INTO files (name, path) VALUES ('$nameFile ','$path')") or die($mysqli->error);
        }else{
        echo"Falha ao enviar o arquivo";  
        } 
    }

    $mysql_arquivos = $mysqli->query("SELECT * from files") or die($mysqli->error);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Arquivos</title>
</head>
<body>

   <table border="1" cellpadding="10">

    <thead>
        <th>Arquivo</th>
        <th>Data de Envio</th>
        <th>Visualização</th>
        <th>Deletar</th>
        
    </thead>

    <tbody>

        <?php
        while($file = $mysql_arquivos->fetch_assoc()){            
        ?>
    
        <tr>
            <td><?php echo $file['name']?></td>
            <td><?php echo date("d/m/y H:i", strtotime ($file['data_upload']))?></td>
            <td><a target="_blank" href="<?php echo $file['path'];?>"><?php echo $file['name'];?></td>
            <th><a href="testFile.php?delete=<?php echo $file['name'];?>">Deletar</th>
        </tr>

        <?php
        }
        ?>

    </tbody>

    </table>

</body>
</html>