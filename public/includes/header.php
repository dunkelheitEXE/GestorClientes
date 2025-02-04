    <header>
        <nav class="navbar bg-dark fixed-top" data-bs-theme="dark">
            <div class="container-fluid">
                <a href="#" class="navbar-brand"><img src="img/logoDark.png" class="img-fluid" alt="" style="width: 180px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Gestor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Clients</a>
                            </li>
                            <?php if(isset($_SESSION['user'])): ?>
                                <li class="nav-item">
                                    <a class="btn btn-danger" aria-current="page" href="index.php?action=logout">Logout</a>
                                </li>
                            <?php endif; ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Devices
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="Devices.php?action=index">Index</a></li>
                                    <li><a class="dropdown-item" href="Devices.php?action=create">Create</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <br><br><br>