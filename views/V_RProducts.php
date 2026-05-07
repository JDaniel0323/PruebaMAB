<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAB</title>
    <link rel="stylesheet" href="/MAB/assets/css/style.css">
</head>
<body>

    <div class="banner">
        <img src="https://mab.com.co/images/logos/logo_horizontal.png" alt="">
        <button class="btn"><a href="controller/C_CProducts.php">Crear Producto</a></button>
    </div>
    <div class="main">

    </div>

    <div class="footer">

    </div>

    
    <table>
        <thead>
            <tr></tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
            <tbody>
                <?php 
                foreach ($products as $product):{
                        echo "<tr>";
                        echo "<td>".$product['id']."</td>";
                        echo "<td>".$product['nombre']."</td>"; 
                        echo "<td>".$product['precio']."</td>";
                        echo "<td>".$product['stock']."</td>";
                        echo "<td>
                            <a class='btn_act' href='controller/C_UProducts.php?id=".$product['id']."'>Editar</a> |
                            <a class='btn_act' href='controller/C_DProducts.php?id=".$product['id']."'>Eliminar</a>
                        </td>";
                        echo "</tr>";
                }
                ?>
                <?php endforeach; ?>
            </tbody>
        </thead>
    </table>

</body>
</html>