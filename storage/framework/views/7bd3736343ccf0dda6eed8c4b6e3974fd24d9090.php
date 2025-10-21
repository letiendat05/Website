


    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <link rel="stylesheet" href="<?php echo e(asset('QLPT.css')); ?>"> 
    <script src="<?php echo e(asset('app.js')); ?>"></script>

<div class="dashboard-layout">
    
    <aside class="dashboard-sidebar">
        <h1 class="sidebar-title" id="sidebar-header-link">Dashboard</h1>

        <nav class="sidebar-nav">
            <ul>
                <li class="nav-item active" data-page="phuongtien">
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
                <li class="nav-item logout" data-page="dangxuat">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Đăng xuất</span>
                </li>
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
            <h2 class="client-title">Phương tiện</h2>

            <div class="controls-panel-pt">
                <div class="pt-action-buttons">
                    <button class="add-action" id="open-add-vehicle-modal">
                        <i class="fa-solid fa-plus-circle"></i> Thêm phương tiện
                    </button>
                </div>

                <div class="pt-filter-tabs">
                    <div class="pt-tab-item tab-dropdown" id="status-tab">
                        <i class="fas fa-check-circle"></i>
                        <span>Trạng thái</span>
                        <div class="dropdown-menu" id="status-dropdown">
                            <div class="dropdown-item">Tất cả</div>
                            <div class="dropdown-item">Available</div>
                            <div class="dropdown-item">Rented</div>
                            <div class="dropdown-item">In Maintenance</div>
                        </div>
                    </div>

                    <div class="pt-tab-item tab-dropdown" id="type-tab">
                        <i class="fas fa-car"></i>
                        <span>Loại xe</span>
                        <div class="dropdown-menu" id="type-dropdown">
                            <div class="dropdown-item">Ô tô</div>
                            <div class="dropdown-item">Xe máy</div>
                            <div class="dropdown-item">Xe đạp</div>
                        </div>
                    </div>

                    <div class="pt-tab-item" id="filter-tab">
                        <i class="fas fa-filter"></i>
                        <span>Lọc</span>
                    </div>
                </div>
            </div>

            <div class="vehicle-data-container">
                <table class="vehicle-table">
                    <thead>
                        <tr>
                            <th style="width: 10%;">ID xe</th>
                            <th style="width: 25%;">Tên xe/Model</th>
                            <th style="width: 15%;">Biển số</th>
                            <th style="width: 15%;">Giá/Ngày</th>
                            <th style="width: 20%;">Trạng thái</th>
                            <th style="width: 15%;">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody id="vehicle-table-body">
                        <tr>
                            <td>C01</td>
                            <td>Toyota Vios (Ô tô)</td>
                            <td>30A-123.45</td>
                            <td>800.000 VNĐ</td>
                            <td><span class="status-available">Sẵn sàng</span></td>
                            <td><i class="fa-solid fa-ellipsis-h function-menu"></i></td>
                        </tr>
                        <tr>
                            <td>M01</td>
                            <td>Honda AirBlade (Xe máy)</td>
                            <td>78G-288.88</td>
                            <td>150.000 VNĐ</td>
                            <td><span class="status-rented">Đang thuê</span></td>
                            <td><i class="fa-solid fa-ellipsis-h function-menu"></i></td>
                        </tr>
                        <tr>
                            <td>B01</td>
                            <td>Giant Escape (Xe đạp)</td>
                            <td>D-001</td>
                            <td>40.000 VNĐ</td>
                            <td><span class="status-maint">Bảo dưỡng</span></td>
                            <td><i class="fa-solid fa-ellipsis-h function-menu"></i></td>
                        </tr>
                        <tr>
                            <td>T01</td>
                            <td>Hino Dutro (Xe tải)</td>
                            <td>51C-999.99</td>
                            <td>1.500.000 VNĐ</td>
                            <td><span class="status-available">Sẵn sàng</span></td>
                            <td><i class="fa-solid fa-ellipsis-h function-menu"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>


<div class="pt-modal-overlay" id="add-vehicle-modal">
    <div class="pt-modal-content">
        <h3 class="modal-title">Thêm/Sửa Phương Tiện</h3>
        <form id="vehicle-form" class="modal-form">
            <label for="vehicle-id">ID Xe</label>
            <input type="text" id="vehicle-id" placeholder="Mã định danh" required>

            <label for="vehicle-type">Loại xe</label>
            <input type="text" id="vehicle-type" placeholder="Ô tô, Xe máy,..." required>

            <label for="vehicle-brand">Hãng</label>
            <input type="text" id="vehicle-brand" placeholder="Toyota, Honda,..." required>

            <label for="maintenance-date">Ngày bảo dưỡng</label>
            <input type="date" id="maintenance-date">

            <label for="vehicle-note">Ghi chú</label>
            <textarea id="vehicle-note" rows="2"></textarea>

            <div class="modal-actions">
                <button type="button" class="modal-btn close-btn" id="close-vehicle-modal">Hủy</button>
                <button type="submit" class="modal-btn apply-btn" id="save-vehicle-btn">Lưu</button>
            </div>
        </form>
    </div>
</div>

  

<?php /**PATH C:\BTLweb\Website-main\resources\views/QLPT.blade.php ENDPATH**/ ?>