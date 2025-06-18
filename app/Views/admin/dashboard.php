<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Admin Dashboard - Management Barang</title>
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<!-- Google Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
  :root {
    --primary-color: #3a7bd5;
    --primary-gradient: linear-gradient(135deg, #3a7bd5 0%, #27496d 100%);
    --bg-dark: #121726;
    --card-bg: rgba(58, 123, 213, 0.15);
    --glass-bg: rgba(255, 255, 255, 0.1);
    --text-light: #f0f4fd;
  }

  * {
    box-sizing: border-box;
  }

  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: var(--bg-dark);
    color: var(--text-light);
    margin: 0;
    min-height: 100vh;
  }

  body::before {
    content: "";
    position: fixed;
    inset: 0;
    background: linear-gradient(to bottom right, #3a7bd5cc, #27496dcc), url('<?= base_url("img/bg.jpg") ?>') no-repeat center;
    background-size: cover;
    filter: brightness(0.5) saturate(1.2);
    z-index: -1;
  }

  header {
    position: sticky;
    top: 0;
    z-index: 1030;
    background: var(--glass-bg);
    backdrop-filter: blur(10px);
    padding: 0.75rem 2rem;
    border-bottom: 1px solid rgba(255 255 255 / 0.1);
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: var(--text-light);
  }

  .header-left {
    display: flex;
    align-items: center;
    gap: 1rem;
  }

  .header-title {
    font-weight: 700;
    font-size: 1.5rem;
  }

  .header-right {
    display: flex;
    align-items: center;
    gap: 1.5rem;
  }

  .user-profile {
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

  .btn-logout-custom {
    color: #ffffff !important;
    background-color: #e74a3b;
    border-radius: 0.35rem;
    padding: 0.5rem 1rem;
    transition: all 0.3s ease;
}

.btn-logout-custom:hover {
    background-color: #c0392b;
    color: #fff;
    transform: scale(1.03);
    box-shadow: 0 4px 10px rgba(231, 74, 59, 0.4);
}


  .avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: var(--primary-color);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    color: white;
  }

  .username {
    font-weight: 600;
    font-size: 1rem;
  }

  main#content {
    padding: 2rem 3rem;
    min-height: calc(100vh - 60px);
  }

  .dashboard-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
  }

  .card-dashboard {
    background: var(--glass-bg);
    border-radius: 16px;
    padding: 1.5rem 2rem;
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    color: var(--text-light);
    position: relative;
    overflow: hidden;
    transition: transform 0.3s ease;
  }

  .card-dashboard:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(58,123,213,0.5);
  }

  .card-dashboard .icon-circle {
    position: absolute;
    top: -30px;
    right: -30px;
    width: 90px;
    height: 90px;
    border-radius: 50%;
    background: rgba(58,123,213,0.3);
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .card-dashboard .icon-circle .material-icons {
    font-size: 44px;
    color: rgba(255 255 255 / 0.3);
  }

  .card-dashboard .card-title {
    font-weight: 600;
    font-size: 1.1rem;
    margin-bottom: 1rem;
  }

  .card-dashboard .card-value {
    font-weight: 900;
    font-size: 2.5rem;
  }

  .recent-activity {
    background: var(--glass-bg);
    padding: 1.5rem 2rem;
    border-radius: 16px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.3);
    color: var(--text-light);
    margin-bottom: 2rem;
  }

  .table thead th {
    border-bottom: 2px solid rgba(255 255 255 / 0.3);
  }

  .table tbody tr:hover {
    background-color: rgba(58,123,213,0.3);
  }

  @media (max-width: 576px) {
    main#content {
      padding: 1rem 1.5rem;
    }

    .header-title {
      font-size: 1.25rem;
    }
  }
</style>
</head>
<body>

<header>
  <div class="header-left">
    <span class="material-icons" style="font-size:28px; color: var(--primary-color);">dashboard</span>
    <div class="header-title">Dashboard Admin</div>
  </div>
  <div class="header-right">
    <div class="user-profile">
      <div class="username"><?= session("username")?></div>
      <a class="nav-link btn-logout-custom" href="#" id="btnLogout">
    <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>
    <span>Logout</span>
</a>

    </div>
  </div>
</header>

<main id="content">

  <section class="dashboard-cards" aria-label="Dashboard summary cards">
    <article class="card-dashboard" role="region" aria-labelledby="card-stock-title">
      <div class="icon-circle"><span class="material-icons">inventory_2</span></div>
      <h2 class="card-title" id="card-stock-title">Jumlah Barang</h2>
      <div class="card-value" id="totalStock"><?= esc($jumlahBarang) ?></div>
    </article>
    <article class="card-dashboard" role="region" aria-labelledby="card-incoming-title">
  <div class="icon-circle"><span class="material-icons">add_shopping_cart</span></div>
  <h2 class="card-title" id="card-incoming-title">Barang Masuk</h2>
  <div class="card-value" id="totalIncoming"><?= esc($jumlahMasuk) ?></div>
</article>

<article class="card-dashboard" role="region" aria-labelledby="card-outgoing-title">
  <div class="icon-circle"><span class="material-icons">shopping_cart_checkout</span></div>
  <h2 class="card-title" id="card-outgoing-title">Barang Keluar</h2>
  <div class="card-value" id="totalOutgoing"><?= esc($jumlahKeluar) ?></div>
</article>
    <article class="card-dashboard" role="region" aria-labelledby="card-users-title">
      <div class="icon-circle"><span class="material-icons">group</span></div>
      <h2 class="card-title" id="card-users-title">Jumlah Pegawai</h2>
      <div class="card-value" id="totalUsers"><?= esc($jumlahPegawai) ?></div>
    </article>
  </section>

  <!-- Chart Section -->
  <section class="recent-activity" aria-label="Grafik statistik">
    <h3>Statistik Barang</h3>
    <canvas id="dashboardChart" height="120"></canvas>
  </section>

  <!-- Transaksi Terbaru -->
  <section class="recent-activity" aria-label="Info Barang">
  <h3>Info Barang</h3>
  <div class="table-responsive">
    <table class="table table-dark table-hover align-middle">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Barang</th>
          <th>Varian</th>
          <th>Harga Beli</th>
          <th>Harga Jual</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($dataBarang)) : ?>
          <?php $no = 1; ?>
          <?php foreach ($dataBarang as $barang) : ?>
            <tr>
              <th scope="row"><?= $no++ ?></th>
              <td><?= esc($barang['nama_barang']) ?></td>
              <td><?= esc($barang['varian']) ?></td>
              <td>Rp<?= number_format($barang['harga_beli'], 0, ',', '.') ?></td>
              <td>Rp<?= number_format($barang['harga_jual'], 0, ',', '.') ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <tr>
            <td colspan="5" class="text-center">Tidak ada data barang.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</section>

<section class="recent-activity" aria-label="Info Masuk dan Keluar">
  <h3>Info Barang Masuk</h3>
  <div class="table-responsive mb-4">
    <table class="table table-dark table-hover align-middle">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Barang</th>
          <th>Jumlah</th>
          <th>Tanggal Masuk</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($dataMasuk)) : ?>
          <?php $i = 1; foreach ($dataMasuk as $masuk) : ?>
            <tr>
              <th><?= $i++ ?></th>
              <td><?= esc($masuk['nama_barang']) ?></td>
              <td><?= esc($masuk['jumlah']) ?></td>
              <td><?= esc(date('d-m-Y', strtotime($masuk['tanggal']))) ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <tr><td colspan="4" class="text-center">Tidak ada data barang masuk.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <h3>Info Barang Keluar</h3>
  <div class="table-responsive">
    <table class="table table-dark table-hover align-middle">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Barang</th>
          <th>Jumlah</th>
          <th>Tanggal Keluar</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($dataKeluar)) : ?>
          <?php $i = 1; foreach ($dataKeluar as $keluar) : ?>
            <tr>
              <th><?= $i++ ?></th>
              <td><?= esc($keluar['nama_barang']) ?></td>
              <td><?= esc($keluar['jumlah']) ?></td>
              <td><?= esc(date('d-m-Y', strtotime($keluar['tanggal']))) ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <tr><td colspan="4" class="text-center">Tidak ada data barang keluar.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</section>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('dashboardChart').getContext('2d');
  const dashboardChart = new Chart(ctx, {
    type: 'bar',
    data: {
  labels: ['Jumlah Barang', 'Barang Masuk', 'Barang Keluar', 'Jumlah Pegawai'],
  datasets: [{
    label: 'Statistik',
    data: [<?= $jumlahBarang ?>, <?= $jumlahMasuk ?>, <?= $jumlahKeluar ?>, <?= $jumlahPegawai ?>],
    backgroundColor: [
      'rgba(58, 123, 213, 0.6)',
      'rgba(34, 197, 94, 0.6)',
      'rgba(234, 179, 8, 0.6)',
      'rgba(239, 68, 68, 0.6)'
    ],
    borderColor: [
      'rgba(58, 123, 213, 1)',
      'rgba(34, 197, 94, 1)',
      'rgba(234, 179, 8, 1)',
      'rgba(239, 68, 68, 1)'
    ],
    borderWidth: 1,
    borderRadius: 8
  }]
},

    options: {
      responsive: true,
      plugins: {
        legend: { display: false },
        tooltip: {
          backgroundColor: '#1e293b',
          titleColor: '#fff',
          bodyColor: '#e2e8f0'
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: { color: '#e2e8f0' },
          grid: { color: 'rgba(255,255,255,0.1)' }
        },
        x: {
          ticks: { color: '#e2e8f0' },
          grid: { display: false }
        }
      }
    }
  });
  <!-- SweetAlert2 -->


    document.getElementById('btnLogout').addEventListener('click', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Yakin ingin logout?',
            text: "Kamu akan keluar dari sistem.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Logout',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('/logout') ?>";
            }
        });
    });

</script>
</body>
</html>
