<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Pengadaan')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">inventory</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="/pengadaan" class="nav-link">Pengadaan</a></li>
                    <li class="nav-item"><a href="/penerimaan" class="nav-link">Penerimaan</a></li>
                    <li class="nav-item"><a href="/penjualan" class="nav-link">Penjualan</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @includeIf('partials.alerts')
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
