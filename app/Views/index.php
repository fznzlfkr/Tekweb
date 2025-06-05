<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Platform Digital</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(rgba(0, 123, 255, 0.8), rgba(0, 123, 255, 0.8)), 
                        url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2072&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            color: #333;
        }

        .container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        header {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 2rem;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
        }

        .nav-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.6rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .btn-outline {
            background: transparent;
            color: #007bff;
            border: 2px solid #007bff;
        }

        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            backdrop-filter: blur(10px);
        }

        .btn-primary {
            background: #ff6b35;
            color: white;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
        }

        .btn-primary:hover {
            background: #e55a2b;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 53, 0.4);
        }

        /* Main Content */
        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .hero {
            text-align: center;
            max-width: 600px;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: white;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .hero p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.6;
            text-shadow: 0 1px 2px rgba(0,0,0,0.3);
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-hero {
            padding: 0.8rem 2rem;
            font-size: 1rem;
            min-width: 140px;
        }

        /* Features */
        .features {
            background: white;
            padding: 3rem 2rem;
            text-align: center;
        }

        .features h2 {
            margin-bottom: 2rem;
            color: #333;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            max-width: 800px;
            margin: 0 auto;
        }

        .feature {
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .feature-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .feature h3 {
            margin-bottom: 0.5rem;
            color: #333;
        }

        .feature p {
            color: #666;
            font-size: 0.9rem;
        }

        /* Footer */
        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 2rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }
            
            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .nav-buttons {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            nav {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header>
            <nav>
                <div class="logo">Management Barang</div>
                <div class="nav-buttons">
                    <a href="#features" class="btn btn-outline">Fitur</a>
                    <a href="<?= base_url('login') ?>" class="btn btn-primary" >Masuk</a>
                </div>
            </nav>
        </header>

        <!-- Main Content -->
        <main>
            <div class="hero">
                <h1>Selamat Datang</h1>
                <p>Platform digital yang memberikan solusi terbaik untuk kebutuhan Anda. Bergabunglah dengan ribuan pengguna yang telah merasakan kemudahan layanan kami.</p>
                
                <div class="hero-buttons">
                    <a href="<?= base_url('login') ?>" class="btn btn-primary btn-hero" >Mulai Sekarang</a>
                    <a href="#features" class="btn btn-outline btn-hero">Pelajari Lebih</a>
                </div>
            </div>
        </main>

        <!-- Features -->
        <section class="features" id="features">
            <h2>Mengapa Memilih Kami?</h2>
            <div class="feature-grid">
                <div class="feature">
                    <div class="feature-icon">⚡</div>
                    <h3>Cepat</h3>
                    <p>Proses yang efisien dan responsif untuk semua kebutuhan Anda</p>
                </div>
                <div class="feature">
                    <div class="feature-icon">🔒</div>
                    <h3>Aman</h3>
                    <p>Keamanan data terjamin dengan teknologi enkripsi terkini</p>
                </div>
                <div class="feature">
                    <div class="feature-icon">📱</div>
                    <h3>Mudah</h3>
                    <p>Interface yang user-friendly dan mudah digunakan siapa saja</p>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer>
            <p>&copy; Kelompok 5 <?= date('Y') ?></p>
        </footer>
    </div>

    <script>
        function goToLogin() {
            alert('Mengarahkan ke halaman login...');
            // window.location.href = 'login.html';
        }

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>