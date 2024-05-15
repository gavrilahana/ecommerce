<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'E-Commerce' ?></title>
    <!-- Menggunakan Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menggunakan Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>
<body>
    <header class="bg-dark text-white py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="mb-0">E-Commerce</h1>
                </div>
                <div class="col-md-6 text-right">
                    <a href="/login" class="btn btn-outline-light">Login</a>
                    <a href="/register" class="btn btn-outline-light">Register</a>
                </div>
            </div>
        </div>
    </header>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/v_barang">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/v_cart">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                </ul>
                <div class="search-form">
                    <form class="form-inline" action="/search" method="GET">
                        <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search products" aria-label="Search">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="navbar-nav">
                    <a class="nav-link" href="<?= site_url('cart') ?>">
                        <i class="fas fa-shopping-cart"></i> Keranjang
                        <?php if (session()->has('cart') && count(session()->get('cart')) > 0): ?>
                            <span class="badge badge-danger"><?= count(session()->get('cart')) ?></span>
                        <?php endif; ?>
                    </a>
                </div>
    </nav>
    
    <main>
        <div class="container">
            <?= $this->renderSection('content') ?>
        </div>
    </main>
    
    <footer class="bg-dark text-white py-4 mt-4">
        <div class="container text-center">
            <p>&copy; <?= date('Y') ?> E-Commerce. All rights reserved.</p>
            <p>
                <a href="/about" class="text-white">About Us</a> |
                <a href="/terms" class="text-white">Terms & Conditions</a> |
                <a href="/privacy" class="text-white">Privacy Policy</a>
            </p>
        </div>
    </footer>

    <!-- Menggunakan Bootstrap JS (Opsional, untuk fitur tambahan) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
