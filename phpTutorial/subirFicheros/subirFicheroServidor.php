<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="controladorFicheroServidor.php" method="post" enctype="multipart/form-data">
            Entrar nombre: <input type="text" name="nombre"/><br>
            Subir fichero:<input type="file" name="fichero"/><br>
            <input type="submit" name="enviar" value="Enivar"/>
        </form>
    </body>
</html>