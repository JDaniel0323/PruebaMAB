<?php

$json = file_get_contents(__DIR__ . "/../assets/JSON/countries.json");
$paises = json_decode($json, true);

require(__DIR__ . "/UI_RMenu.php");
?>

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

<div class="main container row">
    <div class="col-md-8">
            <div class="card shadow-sm p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="m-0">Universidades Encontradas</h4>
                    <button class="btn btn-success" onclick="descargarPDF()">
                        <i class="bi-file-pdf"></i> Exportar PDF
                    </button>
                </div>

                <div class="table-mid" style="max-height: 400px; overflow-y: auto;">
                    <table class="table  table-hover border" >
                        <thead class="table-light">
                            <tr>
                                <th>Nombre</th>
                                <th>País</th>
                                <th>Sitio Web</th>
                            </tr>
                        </thead>
                        <tbody id="uniTable">
                        <?php $universidad = [] ?>
                        <?php foreach($universidades as $universidad): ?>
                        <tr>
                            <td><?= $universidad['name'] ?></td>
                            <td><?= $universidad['country'] ?></td>
                            <td>
                                <a class='btn btn-sm btn-outline-primary' href="<?= $universidad['web_pages'][0] ?>" target="_blank">
                                    Visitar
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
            </div>
        </div>

    <div class="col-md-4">
            <div class="card shadow-sm p-1">
                <h5 class="card-title mb-2">Filtro de Búsqueda</h5>
                <hr>
                <form method="GET" action="/MAB/controller/CR_CPanel.php">
                    <div class="mb-3">
                        <label for="countrySelect" class="form-label">Seleccionar País</label>
                        <select id="countrySelect" name="country" class="form-select">
                            <option value="">Seleccione un país</option>
                            <?php $pais = '' ?>
                            <?php foreach($paises as $p): ?>
                                <option value="<?= $p['name']; ?>" <?= ($pais == $p['name']) ? 'selected' : '' ?>>
                                    <?= $p['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            Buscar Universidades
                        </button>
                    </div>
                </form>
            </div>

        </div>
        <div class="card shadow-sm p-4">
                <h5 class="mb-4"><i class="bi-clock-history me-2"></i>Mis Historial</h5>
                <div class="table-responsive">
                    <table class="table table-sm table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>País</th>
                                <th>Fecha y Hora</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($historial && $historial->num_rows > 0): ?>
                                <?php while($h = $historial->fetch_assoc()): ?>
                                <tr>
                                    <td><?= htmlspecialchars($h['pais']) ?></td>
                                    <td class="text-muted"><?= $h['fecha'] ?></td>
                                    <td class="text-center">
                                        <a href="../<?= $h['ruta_archivo'] ?>" target="_blank" class="text-danger fw-bold text-decoration-none">
                                            <i class="bi bi-filetype-pdf"></i> Ver
                                        </a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr><td colspan="3" class="text-center text-muted">Aún no has generado reportes.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="../assets/utils/export.js"></script>

</body>
</html>