<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Giao diện Neon</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('BaoCao.css') }}">
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
        <li class="nav-item " data-page="khachhang">
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
        
        <li class="nav-item active" data-page="baocao">
            <i class="fa-solid fa-file-image"></i> 
            <span>Báo cáo</span>
        </li><br>
        
        <li class="nav-item settings-item" data-page="caidat"> 
            <i class="fa-solid fa-gear"></i>
            <span>Cài đặt</span>
        </li><br>
        <a href="login.html" class="nav-item logout" data-page="dangxuat">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <span>Đăng xuất</span>
        </a>
    </ul>
</nav>
        </aside>
       
        <div class="dashboard-main-content">
            
             <header class="main-header">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Tìm kiếm...">
                </div>
                <i class="fa-regular fa-user header-profile-icon"></i>
            </header>
            <section class="client-management-area">
                <h2 class="client-title">Báo cáo</h2>

 <div class="time-tabs">
            <div class="time-tab-item active-tab" data-period="year">Năm</div>
            <div class="time-tab-item" data-period="quarter">Quý</div>
            <div class="time-tab-item" data-period="month">Tháng</div>
            <div class="time-tab-item" data-period="week">Tuần</div>
            <div class="time-tab-item" data-period="day">Ngày</div>
        </div>
    

    <div class="report-data-grid">
        
        <div class="report-card chart-card">
            <h4 class="card-title">Doanh thu hàng ngày</h4>
            <div class="chart-container">
                <canvas id="daily-revenue-chart"></canvas> 
                <div class="mock-chart-image">
                    <canvas id="dailyRevenueChart"></canvas> 
                </div>
            </div>
        </div>

        <div class="report-card kpi-card">
            <h4 class="card-title">Số liệu chính</h4>
            
            <div class="kpi-group-wrapper">
                
                <div class="kpi-item total-revenue">
                    <span class="kpi-label">Tổng doanh thu</span>
                    <span class="kpi-value revenue-color">2.250.000.000</span>
                    <span class="kpi-change positive">+42%</span>
                </div>
                
                <div class="kpi-item total-contracts">
                    <span class="kpi-label">Tổng hợp đồng</span>
                    <span class="kpi-value contract-color">10.000</span>
                    <div class="contract-legend">
                        <span class="legend-item"><i class="dot revenue-color"></i> Đã Thuê</span>
                        <span class="legend-item"><i class="dot contract-color"></i> Còn trống</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="report-card chart-card large-chart">
            <h4 class="card-title">Doanh thu hàng tháng</h4>
            <div class="chart-container">
                <canvas id="monthlyRevenueChart"></canvas>

            </div>
        </div>

        <div class="report-card chart-card large-chart contract-chart-card">
            <h4 class="card-title">Tình hình Hợp đồng</h4>
            <div class="chart-container">
               <canvas id="contractStatusChart"></canvas>
                
            </div>
        </div>
    </div>
</section>               
</div>
</body>
</html>