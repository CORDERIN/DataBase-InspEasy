<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Files Sensor</title>
    <link rel="stylesheet" href="css/home.css">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</head>
<body>
<div class="header">
    <img src="" alt="" srcset="">
</div>
    <div class="container_">
        <div class="main-content">

        </div>
        <div class="content">
            <div class="input">
                <h1>Anexe o arquivo do seu sensor:</h1>
            <form method="post" enctype="multipart/form-data" action="testFile.php">
                <p><label for="">Selecione o arquivo</label>
                <input name="file" type="file"></p>
                <button type="submit">Enviar o arquivo</button>
            </form>
            </div>
        </div>

        </div>

    </div>
</body>
</html>