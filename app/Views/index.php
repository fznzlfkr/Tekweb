<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white;
            min-height: 100vh;
            position: relative;
            z-index: 0;
        }

        /* Background Overlay */
        .bg-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(58, 123, 213, 0.6), rgba(58, 96, 115, 0.6)),
                        url("<?= base_url('img/bg.jpg') ?>") no-repeat center bottom;
            background-size: cover;
            background-attachment: fixed;
            z-index: -1;
        }

        .container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        header {
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: transparent;
            position: relative;
            z-index: 2;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 1.5rem;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            position: relative;
        }

        nav ul li a::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 100%;
            height: 2px;
            background: white;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        nav ul li a:hover::after,
        nav ul li a.active::after {
            transform: scaleX(1);
        }

        /* Hero Section */
        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 4rem 2rem;
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.4);
        }

        .hero p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            color: rgba(255,255,255,0.9);
        }

        .btn-start {
            padding: 0.8rem 2rem;
            font-size: 1rem;
            font-weight: bold;
            border: none;
            background: white;
            color: #3a7bd5;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s ease;
            text-decoration: none;
        }

        .btn-start:hover {
            background-color: #f0f0f0;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 1.5rem;
            background: transparent;
            color: white;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }

            nav ul {
                flex-direction: column;
                gap: 0.5rem;
                align-items: center;
            }

            header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <!-- Background Image & Gradient -->
    <div class="bg-overlay"></div>

    <!-- Container -->
    <div class="container">

        <!-- Header -->
        <header>
            <div class="logo">Management Barang</div>
            <nav>
                <ul>
                    <li><a href="#" class="active">Beranda</a></li>
                    <li><a href="#">Tentang</a></li>
                </ul>
            </nav>
        </header>

        <!-- Main Hero Content -->
        <main>
            <div class="hero">
                <h1>SELAMAT DATANG</h1>
                <p>Selamat datang di Aplikasi Management Barang kelompok 5. Ayo mulai kelola barangmu dengan cara digital dan efisien!</p>
                <a href="<?= base_url('login') ?>" class="btn-start">Masuk</a>
            </div>
        </main>

        <!-- Footer -->
        <footer>
            <p>&copy; Kelompok 5 <?= date('Y') ?></p>
        </footer>
    </div>
</body>
</html>
