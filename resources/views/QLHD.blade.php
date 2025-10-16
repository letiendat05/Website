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
    <link rel="stylesheet" href="{{ asset('QLHD.css') }}">
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
        <li class="nav-item active" data-page="hopdong">
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

        <div class="dashboard-main-content">
            
            <header class="main-header">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Tìm kiếm...">
                </div>
                <i class="fa-regular fa-user header-profile-icon"></i>
            </header>

            <section class="client-management-area">
                <h2 class="client-title">Hợp đồng</h2>
               <div class="controls-panel-hd">
    
    <div class="hd-filter-tabs">
    <div class="hd-tab-item active-tab" id="all-tab">Tất Cả</div>
    
    <div class="hd-tab-item" id="not-processed-filter-tab" data-filter="not-processed">
        Chưa xử lý
    </div>
    
    <div class="hd-tab-item" id="cancelled-filter-tab" data-filter="cancelled">
        Đã hủy
    </div>
</div>
    
    <div class="hd-action-buttons">
        
        <button class="add-action" id="open-add-contract-modal">
            <i class="fa-solid fa-plus-circle"></i> Thêm hợp đồng
        </button>

        <button class="cancel-action" id="cancel-contract-btn">
            <i class="fa-solid fa-xmark"></i> Hủy hợp đồng
        </button>

        <button class="print-action" id="print-contract-btn">
            <i class="fa-solid fa-print"></i> In hợp đồng
        </button>
    </div>
</div>

<div class="contract-data-container">
    <table class="contract-table">
        <thead>
            <tr>
                <th style="width: 25%;">Tên khách hàng</th>
                <th style="width: 15%;">Tình trạng</th>
                <th style="width: 20%;">Ngày bắt đầu</th>
                <th style="width: 20%;">Ngày kết thúc</th>
                <th style="width: 20%;">Hành động</th>
            </tr>
        </thead>
        <tbody id="contract-table-body">
            <tr>
                <td>Nguyen Van A</td>
                <td><span class="status-active-contract">Đang hoạt động</span></td>
                <td>3/2/2025</td>
                <td>25/12/2025</td>
                <td class="action-buttons-cell">
                    <button class="action-btn action-add">Thêm</button>
                    <button class="action-btn action-delete">Xóa</button>
                </td>
            </tr>
            <tr>
                <td>Nguyen Van B</td>
                <td><span class="status-expired-contract">Quá hạn</span></td>
                <td>10/6/2024</td>
                <td>----------</td>
                <td class="action-buttons-cell">
                    <button class="action-btn action-add">Thêm</button>
                    <button class="action-btn action-delete">Xóa</button>
                </td>
            </tr>
            <tr>
                <td>xxxxxxxxx</td>
                <td><span class="status-completed-contract">Đã hoàn thành</span></td>
                <td>4/5/2024</td>
                <td>12/3/2025</td>
                <td class="action-buttons-cell">
                    <button class="action-btn action-add">Thêm</button>
                    <button class="action-btn action-delete">Xóa</button>
                </td>
            </tr>
            
            <tr><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td><td></td></tr>
        </tbody>
    </table>
</div>
<div class="pt-modal-overlay" id="add-contract-modal">
   <div class="pt-modal-content" style="max-width: 650px;"> <h3 class="modal-title">Thêm hợp đồng</h3>
        
        <form id="contract-form" class="modal-form">
            <div class="contract-form-row">
                <div class="form-group">
                    <label for="contract-customer">Chọn khách hàng</label>
                    <div class="search-input-group"> 
                        <input type="text" id="contract-customer" placeholder="Tìm kiếm tên hoặc mã khách hàng" required>
                       
                    </div>
                </div>
                <div class="form-group">
                    <label for="contract-vehicle">Chọn phương tiện</label>
                    <div class="search-input-group">
                        <input type="text" id="contract-vehicle" placeholder="Tìm kiếm tên hoặc biển số xe" required>
                        
                    </div>
                </div>
            </div>
            
            <div class="contract-form-row">
                <div class="form-group">
                    <label for="contract-start-date">Ngày bắt đầu</label>
                    <input type="date" id="contract-start-date" required>
                </div>
                <div class="form-group">
                    <label for="contract-end-date">Ngày kết thúc</label>
                    <input type="date" id="contract-end-date">
                </div>
            </div>
            
            <div class="contract-form-row">
                <div class="form-group full-width">
                    <label for="contract-amount">Tổng số tiền</label>
                    <div class="search-input-group">
                        <input type="text" id="contract-amount" placeholder="Nhập tổng tiền thuê (VNĐ)" required>
                    </div>
                </div>
            </div>

            <div class="modal-actions">
                <button type="button" class="modal-btn close-btn" id="close-contract-modal">Hủy</button>
                <button type="submit" class="modal-btn apply-btn" id="save-contract-btn">Lưu</button>
            </div>
        </form>
    </div>
</div>
<div class="pt-modal-overlay" id="print-contract-modal">
    <div class="pt-modal-content" style="max-width: 500px;"> 
        <h3 class="modal-title">Tùy chọn In Hợp đồng</h3>
        
        <form id="print-form" class="modal-form">
            
            <div class="form-group full-width">
                <label for="contract-select-print">Chọn Hợp đồng cần in</label>
                <div class="search-input-group"> 
                    <input type="text" id="contract-select-print" placeholder="Tìm kiếm mã hoặc tên khách hàng" required>
                </div>
            </div>
            
            <div class="form-group full-width">
                <label for="print-template">Chọn Mẫu In</label>
                <select id="print-template">
                    <option value="standard">Mẫu Tiêu chuẩn (Đầy đủ)</option>
                    <option value="summary">Mẫu Tóm tắt (1 trang)</option>
                    <option value="deposit">Biên lai cọc</option>
                </select>
            </div>
            
            <div class="form-group full-width" style="margin-top: 20px;">
                <label for="print-note">Ghi chú thêm (In kèm)</label>
                <textarea id="print-note" rows="2" placeholder="Ghi chú sẽ được in ở cuối hợp đồng (nếu mẫu cho phép)"></textarea>
            </div>

            <div class="modal-actions">
                <button type="button" class="modal-btn close-btn" id="close-print-modal">Hủy</button>
                <button type="submit" class="modal-btn apply-btn" id="confirm-print-btn">
                    <i class="fa-solid fa-print"></i> In Hợp đồng
                </button>
            </div>
        </form>
    </div>
</div>
<div class="pt-modal-overlay" id="cancel-contract-modal">
    <div class="pt-modal-content" style="max-width: 450px;"> 
        <h3 class="modal-title" style="color: var(--status-expired-contract);">Xác nhận Hủy Hợp đồng</h3>
        
        <form id="cancel-form" class="modal-form">
            
            <p style="color: var(--text-muted); margin-bottom: 20px;">
                Bạn có chắc chắn muốn hủy hợp đồng **[Mã Hợp đồng]** này không? Thao tác này không thể hoàn tác.
            </p>
            
            <div class="form-group full-width">
                <label for="cancel-reason">Lý do hủy (Bắt buộc)</label>
                <textarea id="cancel-reason" rows="3" placeholder="Nhập lý do chi tiết cho việc hủy hợp đồng..." required></textarea>
            </div>
            
            <div class="modal-actions" style="margin-top: 30px; justify-content: space-between;">
                <button type="button" class="modal-btn close-btn" id="close-cancel-modal">Hủy bỏ</button>
                
                <button type="submit" class="modal-btn" id="confirm-cancel-btn" style="background-color: var(--status-expired-contract);">
                    <i class="fa-solid fa-ban"></i> Xác nhận Hủy
                </button>
            </div>
        </form>
    </div>
</div>
</div>


</body>
</html>

</body>
</html>
