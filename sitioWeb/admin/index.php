<?php
if($_POST){
    header('Location:inicio.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <!doctype html>
    <html lang="en">
      <head>
        <title>Login</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      </head>
      <body>
      <br/>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <h2>Iniciar Sesión</h2>
                            <form action="config/login_process.php"  method="POST">
                                <label for="username">Usuario:</label>
                                <input type="text" id="username" name="username" required><br><br>
        
                                <label for="password">Contraseña:</label>
                                <input type="password" id="password" name="password" required><br><br>
        
                                <input type="submit" value="Iniciar Sesión">
                            </form>
                        </div>
</body>
    </html>
