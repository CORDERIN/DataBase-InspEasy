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

        $nameFile = $_FILES['file']['name'];
        $extension = strtolower(pathinfo($nameFile, PATHINFO_EXTENSION));

        if ($extension != "his" && $extension != "txt") die("Tipo de arquivo não aceito");

        if($extension == "his"){

        $file_tmp = $_FILES['file']['tmp_name'];
        $data = file($file_tmp);
        $nameTable = substr($nameFile, 0, strpos($nameFile, ".".$extension));
        $nameTable = str_replace(array("-", "."), '', $nameTable);

        $mysqli->query("CREATE TABLE $nameTable(
                        dateS date, 
                        hourS time,
                        valueSensor float,
                        vibration float,
                        nameMachine varchar(50),
                        localMachine varchar(50),
                        measure varchar(30),
                        typeSensor char
                        )") or die($mysqli->error);

            foreach($data as $line){

            error_reporting(0);

            $value = explode('_', $line);

            if(trim($value[0]) != ''){

                $date = explode('/', trim($value[0]));

                $aux = $date[0];
                $date[0] = $date[2];
                $date[2] = $aux;

                $date = $date[0]."-".$date[1]."-".$date[2];//var_dump($date);
                $hour = trim($value[1]);//var_dump($hour);
                $valueSensor = str_replace(array(","), '.', trim($value[2]));//var_dump($valueSensor);
                $vibration = str_replace(array(","), '.', trim($value[3]));//var_dump($vibration);
                $nameMachine = trim($value[7]);//var_dump($nameMachine);
                $localMachine = trim($value[8]);//var_dump($localMachine);
                $measure = trim($value[9]);//var_dump($measure);
                $typeSensor = trim($value[10]);//var_dump($typeSensor);

                $mysqli->query("INSERT into $nameTable values('$date','$hour','$valueSensor','$vibration','$nameMachine','$localMachine','$measure','$typeSensor')") or die($mysqli->error);

            }

            }
        }

        $file = $_FILES['file'];

        if($file['error']) die("Falha ao enviar arquivo");

        $foulder = "files/";

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

    <a href="index.php"><button>Voltar para o Menu Principal</button></a>

</body>
</html>