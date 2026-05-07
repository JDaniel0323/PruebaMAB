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

    <h2>Actualizar Producto</h2>

    <button class="btn">
        <a href="/MAB/index.php">Volver</a>
    </button>

</div>

<div class="main">

    <div class="form">

        <form action="/MAB/controller/U_UProducts.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $Uproduct[0]['id']; ?>">
            <label for="nombre">Nombre del producto</label>
            <input type="text" id="nombre" name="nombre"
                   value="<?php echo $Uproduct[0]['nombre']; ?>" required>

            <label for="precio">Precio</label>
            <input type="number" min="1" step="1" id="precio" name="precio"
                   value="<?php echo $Uproduct[0]['precio']; ?>" required>

            <label for="stock">Stock</label>
            <input type="number" min="1" step="1" id="stock" name="stock"
                   value="<?php echo $Uproduct[0]['stock']; ?>" required>

            <button class="btn" type="submit">Actualizar Producto</button>

        </form>

    </div>

</div>

</body>
</html>