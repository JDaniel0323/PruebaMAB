<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
} ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm px-4 py-2">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="https://mab.com.co/images/logos/logo_horizontal.png" 
                 alt="Logo MAB" 
                 style="height: 40px; width: auto; filter: brightness(0) invert(1);">
            <span class="ms-2 fw-bold text-uppercase" style="font-size: 0.9rem; letter-spacing: 1px;">
                MAB
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navInfoUser">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navInfoUser">
            <div class="ms-auto d-flex align-items-center">
                
                <div class="text-white me-4 d-none d-md-block">
                    <i class="bi bi-person-circle me-1"></i>
                    <small class="text-secondary">Conectado como:</small>
                    <span class="fw-semibold">
                        <?php echo htmlspecialchars($_SESSION['nombredelusuario'] ?? 'Invitado'); ?>
                    </span>
                </div>

                <a href="/MAB/controller/C_LogoutUni.php" class="btn btn-outline-danger btn-sm px-3 d-flex align-items-center">
                    <i class="bi bi-box-arrow-right me-2"></i>
                    Salir
                </a>
            </div>
        </div>
    </div>
</nav>