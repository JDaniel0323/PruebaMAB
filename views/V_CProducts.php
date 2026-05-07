<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAB</title>
    <link rel="stylesheet" href="/MAB/assets/css/style.css">
</head>
<body>

    
    <div class="banner_form">
        <img src="https://mab.com.co/images/logos/logo_horizontal.png" alt="">
        <h2>Crear Producto</h2>
        <button class="btn" "><a href="../index.php">Volver</a></button>
    </div>
        
    <div class="main">
<div class="form">
        <form action="./CR_CProducts.php" method="POST">

            <label for="nombre">Nombre del producto</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" min="1" step="1" required>

            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" min="1" step="1" required>

            <button class="btn" type="submit">Guardar Producto</button>

        </form>
    </div>

    </div>
    

</body>
</html>