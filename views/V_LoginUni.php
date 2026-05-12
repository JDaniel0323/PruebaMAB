<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAB</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid vh-100">

    <div class=" row h-100  mb-3 shadow">
        <div class="asideLeft col-md-6 d-flex flex-column justify-content-between align-items-left text-white p-5 ">
            <h3 class="mt-auto text-left">MabUniversity</h3>
            <h5 class="">Conoce las universidades alrededor del mundo</h5>
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-between bg-light p-5">
            <div class="topHeader">
                <h1 class="mb-4 text-center">Bienvenido a 
                    <span class="text-center ">MabUniversity</span>
                </h1>
                <h3 class="text-center mb-4">Inicia Sesión</h3>
            </div>
            <div class="d-flex justify-content-center align-items-center flex-grow-1">
            <form  method="post" action="/MAB/controller/C_LoginUni.php">
            <div class="mb-3">
                <input 
                    type="text" 
                    name="txtusuario" 
                    class="form-control"
                    placeholder="Ingresar usuario"
                    required
                >
            </div>
            <div class="mb-3">
                <input 
                    type="password" 
                    name="txtpassword" 
                    class="form-control"
                    placeholder="Ingresar contraseña"
                    required
                >
            </div>
            <div class="d-grid">
                <input 
                    type="submit" 
                    value="Ingresar" 
                    name="btningresar"
                    class="btn btn-primary"
                >
            </div>
            <div class="text-end mt-3">
                <a href="/MAB/controller/C_RegisterUni.php">Crear una cuenta</a>
            </div>
        </form>

    </div>
    </div>
    </div>

</div>
<style>
    .asideLeft {
    background-image: url('../assets/img/backgroundLogin.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
}

.asideLeft::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.5);
}

.asideLeft > * {
    position: relative;
    z-index: 2;
}
</style>
</body>
</html>