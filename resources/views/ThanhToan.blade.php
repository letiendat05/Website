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
    <link rel="stylesheet" href="{{ asset('ThanhToan.css') }}">
    <script src="{{ asset('app.js') }}"></script>
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
        
        <li class="nav-item active" data-page="thanhtoan">
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

    <section class="payment-management-area"> 
        <h2 class="payment-title">Thanh toán</h2>

        <div class="controls-panel-tt">
            <div class="tt-action-buttons">
                <button class="add-action" id="open-add-payment-modal">
                    <i class="fa-solid fa-plus-circle"></i> Xử lý thanh toán
                </button>
                <button class="export-action" id="export-payment-report-btn">
                    <i class="fa-solid fa-file-export"></i> Xuất Báo Cáo
                </button>
            </div>

            <div class="tt-filter-tabs">
                <div class="tt-tab-item active-tab" id="all-payments-tab" data-filter="all">Tất Cả</div>
                
                <div class="tt-tab-item" id="paid-payments-tab" data-filter="paid">
                    Đã Thanh Toán
                </div>
                
                <div class="tt-tab-item" id="pending-payments-tab" data-filter="pending">
                    Chưa Thanh Toán
                </div>
                
                <div class="tt-tab-item tab-dropdown" id="date-filter-tab">
                    Theo Ngày <i class="fa-solid fa-chevron-down"></i>
                    <div class="dropdown-menu" id="date-filter-menu">
                        <div class="dropdown-item" data-filter="today">Hôm nay</div>
                        <div class="dropdown-item" data-filter="this-month">Tháng này</div>
                        <div class="dropdown-item" data-filter="last-month">Tháng trước</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="payment-data-container">
            <table class="payment-table">
                <thead>
                    <tr>
                        <th style="width: 15%;">Mã Hợp Đồng</th>
                        <th style="width: 20%;">Khách Hàng</th>
                        <th style="width: 15%;">Số Tiền</th>
                        <th style="width: 15%;">Trạng Thái</th>
                        <th style="width: 15%;">Ngày Thanh Toán</th>
                        <th style="width: 20%;">Hành động</th>
                    </tr>
                </thead>
                <tbody id="payment-table-body">
                    <tr>
                        <td>HD-0012</td>
                        <td>Nguyễn Văn A</td>
                        <td>2.500.000 VNĐ</td>
                        <td><span class="status-paid">Đã Thanh Toán</span></td>
                        <td>15/10/2025</td>
                        <td class="action-buttons-cell">
                            <button class="action-btn action-detail">Chi tiết</button>
                            <button class="action-btn action-print">In</button>
                        </td>
                    </tr>
                    <tr>
                        <td>HD-0015</td>
                        <td>Trần Thị B</td>
                        <td>500.000 VNĐ</td>
                        <td><span class="status-pending">Chờ Thanh Toán</span></td>
                        <td>----------</td>
                        <td class="action-buttons-cell">
                            <button class="action-btn action-process">Xử lý</button>
                            <button class="action-btn action-cancel">Hủy</button>
                        </td>
                    </tr>
                    <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                    <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                    <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                    <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                    <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                </tbody>
            </table>
        </div>
        <div class="pt-modal-overlay" id="add-payment-modal">
    <div class="pt-modal-content" style="max-width: 600px;">
        <h3 class="modal-title">Xử Lý Thanh Toán </h3>
        
        <form id="payment-form" class="modal-form">
            
            <div class="payment-form-row">
                <div class="form-group">
                    <label for="payment-contract">Chọn Hợp đồng</label>
                    <div class="search-input-group"> 
                        <input type="text" id="payment-contract" placeholder="Tìm kiếm mã HĐ hoặc khách hàng" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="payment-date">Ngày Thanh toán</label>
                    <input type="date" id="payment-date" required>
                </div>
            </div>
            
            <div class="payment-form-row">
                <div class="form-group">
                    <label for="payment-amount">Số tiền Thanh toán</label>
                    <input type="number" id="payment-amount" placeholder="Nhập số tiền (VNĐ)" required>
                </div>
                <div class="form-group">
                    <label for="payment-method">Phương thức</label>
                    <select id="payment-method">
                        <option value="" disabled selected>Chọn phương thức</option>
                        <option value="cash">Tiền mặt</option>
                        <option value="transfer">Chuyển khoản</option>
                        <option value="card">Thẻ ngân hàng</option>
                    </select>
                </div>
            </div>
            
            <div class="payment-form-row">
                <div class="form-group full-width">
                    <label for="payment-note">Ghi chú</label>
                    <textarea id="payment-note" rows="3" placeholder="Nhập ghi chú thanh toán"></textarea>
                </div>
            </div>

            <div class="modal-actions">
                <button type="button" class="modal-btn close-btn" id="close-payment-modal">Hủy</button>
                <button type="submit" class="modal-btn apply-btn" id="save-payment-btn">Xác nhận</button>
            </div>
        </form>
    </div>
</div>
<div class="pt-modal-overlay" id="export-payment-modal">
    <div class="pt-modal-content" style="max-width: 450px;">
        <h3 class="modal-title">Xuất Báo Cáo Thanh Toán</h3>
        
        <form id="export-payment-form" class="modal-form">
            
            <div class="form-group full-width">
                <label for="export-payment-type">Chọn Trạng Thái Thanh Toán</label>
                <select id="export-payment-type">
                    <option value="all" selected>Tất cả Thanh toán</option>
                    <option value="paid">Đã Thanh Toán</option>
                    <option value="pending">Chưa Thanh Toán</option>
                </select>
            </div>
            
            <div class="contract-form-row">
                <div class="form-group">
                    <label for="export-payment-start-date">Từ ngày</label>
                    <input type="date" id="export-payment-start-date">
                </div>
                <div class="form-group">
                    <label for="export-payment-end-date">Đến ngày</label>
                    <input type="date" id="export-payment-end-date">
                </div>
            </div>
            
            <div class="form-group full-width">
                <label for="export-payment-format">Định dạng file</label>
                <select id="export-payment-format">
                    <option value="xlsx" selected>Excel (.xlsx)</option>
                    <option value="csv">CSV (.csv)</option>
                    <option value="pdf">PDF (.pdf)</option>
                </select>
            </div>

            <div class="modal-actions">
                <button type="button" class="modal-btn close-btn" id="close-export-payment-modal">Hủy</button>
                <button type="submit" class="modal-btn apply-btn" id="confirm-export-payment-btn">
                    <i class="fa-solid fa-file-export" style="margin-right: 8px;"></i> Xuất File
                </button>
            </div>
        </form>
    </div>
</div>
<div class="pt-modal-overlay" id="payment-success-modal">
    <div class="pt-modal-content payment-success-content" style="max-width: 400px;">
        
        <h3 class="modal-title">Thanh toán thành công</h3>
        
        <div class="success-icon-container">
            <i class="fa-solid fa-check-circle success-icon"></i>
        </div>
        
        <p class="success-message">Giao dịch đã được xử lý</p>
        
        <div class="transaction-details">
            <p><strong>Mã giao dịch:</strong> <span id="success-transaction-id">#HD-2025-XYZ</span></p>
            <p><strong>Số tiền:</strong> <span id="success-amount">2.500.000 VNĐ</span></p>
        </div>

        <div class="modal-actions success-actions">
            <button type="button" class="modal-btn print-invoice-btn" id="print-invoice-btn">
                In hóa đơn
            </button>
            
            <button type="button" class="modal-btn close-btn red-close-btn" id="close-success-modal">
                Hủy
            </button>
        </div>
    </div>
</div>
    </section>
    </div>
</body>
</html>