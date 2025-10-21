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
    <link rel="stylesheet" href="<?php echo e(asset('QLKH.css')); ?>">
    <script src="<?php echo e(asset('app.js')); ?>"></script>
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
        <li class="nav-item active" data-page="khachhang">
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
                <h2 class="client-title">Khách hàng</h2>

                <div class="client-content-grid">

                    <div class="data-view-panel">
                        <div class="client-tabs">
                            <div class="tab-item active-tab">
                                <i class="fa-solid fa-chart-simple"></i>
                                <span>Status</span>
                            </div>
                            <div class="tab-item">
                                <i class="fa-solid fa-location-dot"></i>
                                <span>Location</span>
                            </div>
                            <div class="tab-item">
                                <i class="fa-solid fa-building"></i>
                                <span>Industry</span>
                            </div>
                        </div>

                        <div class="data-table-container">
                            <div class="table-header">
                                <span style="width: 15%;">Khách hàng ID</span>
                                <span style="width: 20%;">Tên</span>
                                <span style="width: 25%;">SĐT</span>
                                <span style="width: 40%;">Email</span>
                            </div>
                            
                            <div class="table-row">
                                <div class="table-cell" style="width: 15%;">
                                    <div class="fake-checkbox" style="border: 2px solid var(--primary-blue);"></div>
                                    <span>238745</span>
                                </div>
                                <span class="table-cell" style="width: 20%;">NDTT</span>
                                <span class="table-cell" style="width: 25%;">03647XXXXX</span>
                                <span class="table-cell" style="width: 40%;">ndt@exp.com</span>
                            </div>
                            
                            <div class="table-row">
                                <div class="table-cell" style="width: 15%;">
                                    <div class="fake-checkbox" style="border: 2px solid var(--primary-pink);"></div>
                                    <span>238466</span>
                                </div>
                                <span class="table-cell" style="width: 20%;">TTVC</span>
                                <span class="table-cell" style="width: 25%;">0935XXXXXX</span>
                                <span class="table-cell" style="width: 40%;">ttvc04@exp.com</span>
                            </div>
                            
                            <div class="table-row">
                                <div class="table-cell" style="width: 15%;">
                                    <div class="fake-checkbox" style="border: 2px solid #BBCA13;"></div> 
                                    <span>239102</span>
                                </div>
                                <span class="table-cell" style="width: 20%;">HPT</span>
                                <span class="table-cell" style="width: 25%;">09875XXXXX</span>
                                <span class="table-cell" style="width: 40%;">hpt_co@exp.com</span>
                            </div>
                            
                            <div class="table-row">
                                <div class="table-cell" style="width: 15%;">
                                    <div class="fake-checkbox" style="border: 2px solid var(--primary-blue);"></div>
                                    <span>239551</span>
                                </div>
                                <span class="table-cell" style="width: 20%;">LTP Corp</span>
                                <span class="table-cell" style="width: 25%;">0903XXXXXX</span>
                                <span class="table-cell" style="width: 40%;">ltp.hq@exp.com</span>
                            </div>

                            <div class="table-row">
                                <div class="table-cell" style="width: 15%;">
                                    <div class="fake-checkbox" style="border: 2px solid var(--primary-pink);"></div>
                                    <span>239803</span>
                                </div>
                                <span class="table-cell" style="width: 20%;">VNK</span>
                                <span class="table-cell" style="width: 25%;">09124XXXXX</span>
                                <span class="table-cell" style="width: 40%;">vnk.tech@exp.com</span>
                            </div>

                            <div class="table-row">
                                <div class="table-cell" style="width: 15%;">
                                    <div class="fake-checkbox" style="border: 2px solid var(--primary-blue);"></div>
                                    <span>240019</span>
                                </div>
                                <span class="table-cell" style="width: 20%;">TMC</span>
                                <span class="table-cell" style="width: 25%;">0777XXXXXX</span>
                                <span class="table-cell" style="width: 40%;">tmc.sales@exp.com</span>
                            </div>
                            
                        </div>
                    </div>

                    <div class="actions-panel">
                        <div class="action-item add-action">
                            <i class="fa-solid fa-plus-circle"></i>
                            <span>Thêm khách hàng</span>
                        </div>
                        
                        <div class="action-item edit-action">
                            <i class="fa-solid fa-pen-to-square"></i>
                            <span>Sửa</span>
                        </div>
                        
                        <div class="action-item delete-action">
                            <i class="fa-solid fa-trash"></i>
                            <span>Xóa</span>
                        </div>
                    </div>

                </div>
            </section>

            
        </div>
    </div>
  <div class="filter-modal-overlay" id="location-filter-modal">
    <div class="filter-modal-content">
        
        <div class="modal-tabs">
            <div class="modal-tab-item active-tab"><i class="fa-solid fa-location-dot"></i> Location</div>
        </div>

        <div class="modal-search-box">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Filter by Location">
        </div>

        <div class="filter-options-list">
            
            <div class="filter-item">
                <i class="fa-solid fa-location-dot"></i> <span>Hà Nội</span>
                <div class="checkbox-box"></div>
            </div>
            <div class="filter-item">
                <i class="fa-solid fa-location-dot"></i> <span>Ninh Bình</span>
                <div class="checkbox-box"></div>
            </div>
            <div class="filter-item">
                <i class="fa-solid fa-location-dot"></i> <span>Hưng Yên</span>
                <div class="checkbox-box"></div>
            </div>
            <div class="filter-item">
                <i class="fa-solid fa-location-dot"></i> <span>Bắc Ninh</span>
                <div class="checkbox-box"></div>
            </div>

            <div class="filter-item">
                <i class="fa-solid fa-location-dot"></i> <span>Hải Phòng</span>
                <div class="checkbox-box"></div>
            </div>
            <div class="filter-item">
                <i class="fa-solid fa-location-dot"></i> <span>Đà Nẵng</span>
                <div class="checkbox-box"></div>
            </div>
            <div class="filter-item">
                <i class="fa-solid fa-location-dot"></i> <span>Hồ Chí Minh</span>
                <div class="checkbox-box"></div>
            </div>
            <div class="filter-item">
                <i class="fa-solid fa-location-dot"></i> <span>Cần Thơ</span>
                <div class="checkbox-box"></div>
            </div>
            <div class="filter-item">
                <i class="fa-solid fa-location-dot"></i> <span>Quảng Ninh</span>
                <div class="checkbox-box"></div>
            </div>
            <div class="filter-item">
                <i class="fa-solid fa-location-dot"></i> <span>Thái Nguyên</span>
                <div class="checkbox-box"></div>
            </div>
            <div class="filter-item">
                <i class="fa-solid fa-location-dot"></i> <span>Thanh Hóa</span>
                <div class="checkbox-box"></div>
            </div>
            <div class="filter-item">
                <i class="fa-solid fa-location-dot"></i> <span>Nghệ An</span>
                <div class="checkbox-box"></div>
            </div>
            <div class="filter-item">
                <i class="fa-solid fa-location-dot"></i> <span>Khánh Hòa</span>
                <div class="checkbox-box"></div>
            </div>
            </div>

        <div class="modal-actions">
            <button class="modal-btn close-btn" id="close-location-modal">Đóng</button>
            <button class="modal-btn apply-btn">Thêm</button>
        </div>

    </div>
</div>
<div class="filter-modal-overlay" id="industry-filter-modal">
    <div class="filter-modal-content">
        
        <div class="modal-tabs">
            <div class="modal-tab-item active-tab"><i class="fa-solid fa-building"></i> Industry</div>
        </div>

        <div class="modal-search-box">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Filter by Industry">
        </div>

        <div class="filter-options-list">
            
            <div class="filter-item">
                <i class="fa-solid fa-city"></i> <span>Bất động sản</span>
                <div class="checkbox-box"></div>
            </div>
            <div class="filter-item">
                <i class="fa-solid fa-microchip"></i> <span>Công nghệ</span>
                <div class="checkbox-box"></div>
            </div>
            <div class="filter-item">
                <i class="fa-solid fa-heart-pulse"></i> <span>Sức khỏe</span>
                <div class="checkbox-box"></div>
            </div>
            <div class="filter-item">
                <i class="fa-solid fa-graduation-cap"></i> <span>Giáo dục</span>
                <div class="checkbox-box"></div>
            </div>
            <div class="filter-item">
                <i class="fa-solid fa-car"></i> <span>Ô tô & Vận tải</span>
                <div class="checkbox-box"></div>
            </div>
            <div class="filter-item">
                <i class="fa-solid fa-burger"></i> <span>Thực phẩm & Đồ uống</span>
                <div class="checkbox-box"></div>
            </div>
            <div class="filter-item">
                <i class="fa-solid fa-scale-balanced"></i> <span>Tài chính & Ngân hàng</span>
                <div class="checkbox-box"></div>
            </div>
            <div class="filter-item">
                <i class="fa-solid fa-shirt"></i> <span>Thời trang & May mặc</span>
                <div class="checkbox-box"></div>
            </div>
            <div class="filter-item">
                <i class="fa-solid fa-briefcase"></i> <span>Dịch vụ Tư vấn</span>
                <div class="checkbox-box"></div>
            </div>
            
        </div>

        <div class="modal-actions">
            <button class="modal-btn close-btn" id="close-industry-modal">Đóng</button>
            <button class="modal-btn apply-btn">Thêm</button>
        </div>

    </div>
</div>
<div class="filter-modal-overlay" id="add-customer-modal">
    <div class="filter-modal-content" style="width: 500px; padding-top: 50px;">
        
        <h2 style="text-align: center; color: var(--primary-blue); margin-bottom: 30px; font-weight: 700;">Thêm Khách Hàng</h2>

        <form class="customer-form">
            <div class="form-group">
                <input type="text" id="customer-name" placeholder="Tên" required>
            </div>
            <div class="form-group">
                <input type="tel" id="customer-phone" placeholder="Số Điện Thoại" required>
            </div>
            <div class="form-group">
                <input type="text" id="customer-id" placeholder="ID/CCCD">
            </div>
            <div class="form-group">
                <input type="email" id="customer-email" placeholder="Email" required>
            </div>
        </form>

        <div class="modal-actions" style="margin-top: 40px;">
            <button class="modal-btn close-btn" id="close-add-customer-modal">Đóng</button>
            <button class="modal-btn apply-btn" id="submit-add-customer">Thêm</button>
        </div>

    </div>
</div>
</body>
</html><?php /**PATH C:\BTLweb\Website-main\resources\views/QLKH.blade.php ENDPATH**/ ?>