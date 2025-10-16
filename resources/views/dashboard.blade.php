<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Giao diện Neon</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

   <link rel="stylesheet" href="{{ asset('dashboard-style.css') }}">
    <script src="{{ asset('app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script> 
</head>
<body>
    <div class="dashboard-layout">
        
         <aside class="dashboard-sidebar">
            <h1 class="sidebar-title" id="sidebar-header-link">Dashboard</h1> 
            
           <nav class="sidebar-nav">
    <ul>
        <li class="nav-item" data-page="phuongtien">
            <i class="fa-solid fa-train-subway"></i>
            <span>Phương tiện</span>
        </li><br>
        <li class="nav-item" data-page="khachhang">
            <i class="fa-solid fa-user-group"></i>
            <span>Khách hàng</span>
        </li><br>
        <li class="nav-item" data-page="hopdong">
            <i class="fa-solid fa-file-contract"></i>
            <span>Hợp đồng</span>
        </li><br>
        
        <li class="nav-item" data-page="thanhtoan">
            <i class="fa-solid fa-credit-card"></i>
            <span>Thanh toán</span>
        </li><br>
        
        <li class="nav-item" data-page="baocao">
            <i class="fa-solid fa-file-image"></i> 
            <span>Báo cáo</span>
        </li><br>
        
        <li class="nav-item settings-item" data-page="caidat"> 
            <i class="fa-solid fa-gear"></i>
            <span>Cài đặt</span>
        </li><br>
         <a href="/dangnhap" class="nav-item logout" data-page="dangxuat">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <span>Đăng xuất</span>
        </a>
    </ul>
</nav>
        </aside>

        <main class="dashboard-main-content">
            
            <header class="main-header">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Tìm kiếm...">
                </div>
                <i class="fa-regular fa-user header-profile-icon"></i>
            </header>

            <section class="key-statics">
                <h2 class="section-title">Key statics</h2>
                <div class="statics-grid">
                    <div class="static-card">
                        <span class="card-label">Còn khả năng</span>
                        <p class="card-value">255.50</p>
                    </div>
                    <div class="static-card">
                        <span class="card-label">Tổng</span>
                        <p class="card-value">315510</p>
                    </div>
                </div>
            </section>

           <section class="trends-chart">
                <h2 class="section-title">Xu hướng</h2>
                <div class="chart-area">
                   
                     <canvas id="lineTrendsChart"></canvas>
                </div>
           </section>
           <section>
            <h2 class="section-title">Khu Vực</h2>
                <div class="chart-area-bar">
                       <canvas id="barTrendsChart"></canvas>
                    </div>
                </section>

        </main>
    </div>
</body>
</html>