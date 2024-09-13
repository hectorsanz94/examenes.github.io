<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Proyecto Examen || Examenes</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
body {
  font-family: 'Roboto', sans-serif;
}

.header {
  background: #343a40;
  color: white;
  padding: 20px;
  text-align: center;
}

.logo {
  font-size: 24px;
  font-weight: bold;
}

.footer {
  background: #f1f1f1;
  padding: 20px 0;
  text-align: center;
}

.footer a {
  color: #333;
  text-decoration: none;
  transition: color 0.3s ease-in-out;
}

.footer a:hover {
  color: #f39c12;
}

.modal-title {
  font-family: 'Roboto', sans-serif;
}

.form-control:focus {
  box-shadow: 0 0 5px rgba(81, 203, 238, 1);
  border: 1px solid rgba(81, 203, 238, 1);
}

.sub {
  width: 100%;
}
</style>

<script>
<?php if(isset($_GET['w'])) { echo 'alert("' . $_GET['w'] . '");'; } ?>

function validateForm() {
  var name = document.forms["form"]["name"].value;
  if (!name.match(/^[A-Za-z]+$/)) {
    alert("Name must be filled out and contain only letters.");
    return false;
  }
  
  var college = document.forms["form"]["college"].value;
  if (college == "") {
    alert("College must be filled out.");
    return false;
  }
  
  var email = document.forms["form"]["email"].value;
  var atpos = email.indexOf("@");
  var dotpos = email.lastIndexOf(".");
  if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
    alert("Not a valid e-mail address.");
    return false;
  }

  var password = document.forms["form"]["password"].value;
  if (password.length < 5 || password.length > 25) {
    alert("Password must be 5 to 25 characters long.");
    return false;
  }

  var cpassword = document.forms["form"]["cpassword"].value;
  if (password !== cpassword) {
    alert("Passwords must match.");
    return false;
  }
}
</script>
</head>
<body>

<div class="header">
  <div class="container">
    <span class="logo">Plataforma de Examenes</span>
    <a href="#" class="btn btn-outline-light float-right" data-toggle="modal" data-target="#signinModal"><span class="glyphicon glyphicon-log-in"></span>Iniciar Sesion</a>
  </div>
</div>

<!-- Signin Modal -->
<div class="modal fade" id="signinModal" tabindex="-1" aria-labelledby="signinModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signinModalLabel">Iniciar Session</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="login.php?q=index.php" method="POST">
          <div class="form-group">
            <label for="email">Direccion de Correo</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Escriba su Correo">
          </div>
          <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
          </div>
          <button type="submit" class="btn btn-primary">Log in</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Inscripciones</h3>
        </div>
        <div class="card-body">
          <form name="form" action="sign.php?q=account.php" onsubmit="return validateForm()" method="POST">
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Escriba su nombre">
            </div>
            <div class="form-group">
              <label for="gender">Genero</label>
              <select id="gender" name="gender" class="form-control">
                <option value="Male">Seleccione su genero </option>
                <option value="M">Hombre</option>
                <option value="F">Mujer</option>
              </select>
            </div>
            <div class="form-group">
              <label for="college">Colegio</label>
              <input type="text" class="form-control" id="college" name="college" placeholder="Nombre de su Colegio">
            </div>
            <div class="form-group">
              <label for="email">Direccion de Correo Electronico</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Esciba su correo ">
            </div>
            <div class="form-group">
              <label for="mob">Numero de Telefono</label>
              <input type="number" class="form-control" id="mob" name="mob" placeholder="Escriba su Numero de Telefono">
            </div>
            <div class="form-group">
              <label for="password">Contraseña</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Escriba su Contraseña">
            </div>
            <div class="form-group">
              <label for="cpassword">Confirmar Contraseña</label>
              <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirma tu Contraseña">
            </div>
            <?php if(isset($_GET['q7'])) { echo '<p class="text-danger">' . $_GET['q7'] . '</p>'; } ?>
            <button type="submit" class="btn btn-primary sub">Iniciar Session</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<div class="footer mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-3 box">
        <a href="http://www.projectworlds/online-examination" target="_blank">Elaborado por Hector Sanchez Kilber Galvez</a>
      </div>
      <div class="col-md-3 box">
        <a href="#" data-toggle="modal" data-target="#adminModal">Admin Login</a>
      </div>
      <div class="col-md-3 box">
        <a href="#" data-toggle="modal" data-target="#developersModal">Desarrolladores</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Developers -->
<div class="modal fade" id="developersModal" tabindex="-1" aria-labelledby="developersModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="developersModalLabel">Desarrolladores del Proyecto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <img src="image/CAM00122.jpeg" width="100" height="100" alt="Developer" class="img-rounded">
          </div>
          <div class="col-md-8">
            <a href="https://www.facebook.com/Hectorluoi" class="d-block">Hector Luis Sanchez</a>
            <p>+504 33433333</p>
            <p>hector1994.cod@gmail.com</p>
            <p>UPNFM</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>





<!-- Modal for Admin Login -->
<div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adminModalLabel">Iniciar Session Como Administrador </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="admin.php?q=index.php" method="POST">
          <div class="form-group">
            <input type="text" name="uname" maxlength="20" placeholder="Usuario" class="form-control"/> 
          </div>
          <div class="form-group">
            <input type="password" name="password" maxlength="15" placeholder="Contraseña" class="form-control"/>
          </div>
          <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>

