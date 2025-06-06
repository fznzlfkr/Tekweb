<?= $this->extend('pegawai/layout/template') ?>
<?= $this->section('content') ?>

<style>
    .dashboard-header {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        border-radius: 10px;
        color: white;
        margin-bottom: 30px;
    }

    .stats-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        border: 1px solid #e3e6f0;
        transition: all 0.3s;
    }

    .stats-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.25rem 2rem 0 rgba(58, 59, 69, 0.2);
    }

    .stats-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: white;
    }

    .bg-primary-custom { background: #4e73df; }
    .bg-success-custom { background: #1cc88a; }
    .bg-warning-custom { background: #f6c23e; }
    .bg-info-custom { background: #36b9cc; }

    .welcome-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        border: 1px solid #e3e6f0;
    }

    .activity-card, .menu-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        border: 1px solid #e3e6f0;
    }

    .menu-item {
        padding: 15px;
        border-bottom: 1px solid #e3e6f0;
        transition: background-color 0.2s;
        text-decoration: none;
        color: #5a5c69;
        display: flex;
        align-items: center;
    }

    .menu-item:hover {
        background-color: #f8f9fc;
        color: #4e73df;
        text-decoration: none;
    }

    .menu-item:last-child {
        border-bottom: none;
    }

    .menu-icon {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        font-size: 14px;
        color: white;
    }

    .activity-item {
        padding: 12px 0;
        border-bottom: 1px solid #e3e6f0;
    }

    .activity-item:last-child {
        border-bottom: none;
    }

    .activity-icon {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        color: white;
        margin-right: 10px;
    }

    .page-title {
        color: #5a5c69;
        font-weight: 600;
        margin-bottom: 0;
    }

    .breadcrumb-custom {
        background: none;
        padding: 0;
        margin-bottom: 30px;
    }

    .breadcrumb-custom .breadcrumb-item a {
        color: #6c757d;
        text-decoration: none;
    }

    .breadcrumb-custom .breadcrumb-item.active {
        color: #4e73df;
    }
</style>

<!-- Page Header -->
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 page-title">Dashboard</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>
</div>

<!-- Welcome Section -->
<div class="container dashboard-header p-4 mb-4">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h4 class="mb-2">Selamat Datang, <?= session('username') ?? 'Pegawai' ?>!</h4>
            <p class="mb-0 opacity-75">
                <i class="fas fa-calendar-day me-2"></i>
                <?= date('l, d F Y') ?>
            </p>
        </div>
    </div>
</div>


<?= $this->endSection() ?>