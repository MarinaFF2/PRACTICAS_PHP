<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>formulario</title>
    </head>
    <body>
        <form name="form" action="validar.php" method="POST">
            
            Nombre: <input type="text" name="nombre" value=""><br>
            Apellido: <input type="text" name="ape" value=""><br>
            Edad: <input type="number" name="edad" value="0"><br>
            Sexo: 
                <select name="sexo">
                    <option value="" selected></option>
                    <option value="m">Mujer</option>
                    <option value="h">Hombre</option>
                </select>
            <fieldset>
                <legend>Ciclo</legend>
                <input type="radio" name="ciclo" value="ASIR">ASIR<br>
                <input type="radio" name="ciclo" value="DAM">DAM<br>
                <input type="radio" name="ciclo" value="DAW">DAW<br>
            </fieldset>
            <fieldset>
                <legend>Opciones</legend>
                <input type="checkbox" name="opciones[]" value="opcion1">Opción 1<br>
                <input type="checkbox" name="opciones[]" value="opcion2">Opción 2<br>
                <input type="checkbox" name="opciones[]" value="opcion3">Opción 3<br>
                <input type="checkbox" name="opciones[]" value="opcion4">Opción 4<br>
            </fieldset>
            <input type="submit" name="aceptar" value="Aceptar">
        </form>
    </body>
</html>
