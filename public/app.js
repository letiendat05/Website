/**
 * Hàm chung để chuyển hướng người dùng đến một trang mới.
 * @param {string} pageFileName - 
 *  * @param {string} transactionId - Mã giao dịch
 * @param {string} amount - Số tiền thanh toán
 */

function navigateTo(pageFileName) {
    window.location.href = pageFileName;
}
function showPaymentSuccessModal(transactionId, amount) {
    const successModal = document.getElementById('payment-success-modal');
    
    if (successModal) {
        // Cập nhật thông tin chi tiết
        document.getElementById('success-transaction-id').textContent = transactionId;
        document.getElementById('success-amount').textContent = amount;
        
        // Hiển thị modal
        successModal.classList.add('active');
    }
}
function navigateTo(url) {
    window.location.href = url;
}


// =============================
//   LOGIC ĐĂNG NHẬP / ĐĂNG KÝ
// =============================
document.addEventListener("DOMContentLoaded", () => {
      const currentPage = window.location.pathname.split("/").pop();

    // --- Nếu đang ở trang ĐĂNG NHẬP ---
    if (currentPage === "/dangnhap") {
        const loginForm = document.querySelector(".login-form");
        const tabButtons = document.querySelectorAll(".tab-button");

        if (loginForm) {
            loginForm.addEventListener("submit", (e) => {
                e.preventDefault();

                const username = document.getElementById("username").value.trim();
                const password = document.getElementById("password").value;

                if (!username || !password) {
                    alert("Vui lòng nhập đầy đủ tài khoản và mật khẩu.");
                    return;
                }

                const storedUser = localStorage.getItem(username);
                if (!storedUser) {
                    alert("Tài khoản không tồn tại. Vui lòng đăng ký.");
                    return;
                }

                const userData = JSON.parse(storedUser);
                if (userData.password !== password) {
                    alert("Mật khẩu không đúng.");
                    return;
                }

                localStorage.setItem("loggedInUser", username);
                alert("Đăng nhập thành công!");
                window.location.href = "/dashboard";
            });
        }

        if (tabButtons.length > 1) {
            tabButtons[1].addEventListener("click", () => {
                  window.location.href = "/dangnhap"; 
            });
        }
    }

    // --- Nếu đang ở trang ĐĂNG KÝ ---
    if (currentPage === "/dangky") {
        const registerForm = document.querySelector(".neon-auth-form");
        const tabButtons = document.querySelectorAll(".neon-auth-tab-button");

        if (registerForm) {
            registerForm.addEventListener("submit", (e) => {
                e.preventDefault();

                const username = document.getElementById("neon-auth-username").value.trim();
                const password = document.getElementById("neon-auth-password").value;
                const confirmPassword = document.getElementById("neon-auth-confirm-password").value;

                if (!username || !password) {
                    alert("Vui lòng nhập đầy đủ tài khoản và mật khẩu.");
                    return;
                }

                if (password !== confirmPassword) {
                    alert("Mật khẩu nhập lại không khớp.");
                    return;
                }

                if (localStorage.getItem(username)) {
                    alert("Tài khoản đã tồn tại. Vui lòng chọn tên khác.");
                    return;
                }

                localStorage.setItem(username, JSON.stringify({ password }));
                alert("Đăng ký thành công! Hãy đăng nhập.");
                 window.location.href = "/dangnhap"; 
            });
        }

        if (tabButtons.length > 0) {
            tabButtons[0].addEventListener("click", () => {
                  window.location.href = "/dangnhap"; 
            });
        }
    }

    // --- Kiểm tra trạng thái đăng nhập cho các trang quản trị ---
    const protectedPages = ["/baocao", "/khachhang", "/hopdong", "/phuongtien", "/thanhtoan"];
    if (protectedPages.includes(currentPage)) {
        const currentUser = localStorage.getItem("loggedInUser");
        if (!currentUser) {
           window.location.href = "/dangnhap";
        }
    }
   // =========================================================
// 1. LOGIC CHO SIDEBAR MENU (Liên kết tất cả các trang)
// =========================================================
const activeItem = document.querySelector('.dashboard-sidebar .nav-item.active');
const activeSidebarPage = activeItem ? activeItem.getAttribute('data-page') : null;

const sidebarItems = document.querySelectorAll('.dashboard-sidebar .nav-item');

sidebarItems.forEach(item => {
    item.addEventListener('click', () => {
        const targetPage = item.getAttribute('data-page');

        if (targetPage === activeSidebarPage && activeSidebarPage !== null) {
            return;
        }

      switch (targetPage) {
    case 'phuongtien': window.location.href = '/phuongtien'; break;
    case 'khachhang': window.location.href = '/khachhang'; break;
    case 'hopdong': window.location.href = '/hopdong'; break;
    case 'thanhtoan': window.location.href = '/thanhtoan'; break;
    case 'baocao': window.location.href = '/baocao'; break;
    case 'caidat': window.location.href = '/caidat'; break;
    case 'dangxuat':
        localStorage.removeItem('loggedInUser');
        window.location.href = '/dangnhap';
        break;
}

    });
});


    // ----------------------------------------------------------------
    //  LOGIC CHO TIÊU ĐỀ DASHBOARD (Quay về trang chủ)
    // ----------------------------------------------------------------
    const sidebarHeader = document.getElementById('sidebar-header-link');

    if (sidebarHeader) {
        sidebarHeader.style.cursor = 'pointer'; 
        sidebarHeader.addEventListener('click', () => {
            window.location.href = "/dashboard";

        });
    }
    // ===  BIỂU ĐỒ TRENDS (BAR CHART) ===

const ctxTrends = document.getElementById('barTrendsChart');

if (ctxTrends) {
    // Màu sắc từ biến CSS
    const primaryBlue = '#5F89F2'; 
    
    new Chart(ctxTrends, {
        type: 'bar', // Loại biểu đồ cột
        data: {
            // Nhãn (Địa điểm)
            labels: ['BN', 'HY', 'TH', 'HN', 'ND', 'NB', 'NA'],
            datasets: [
                {
                    label: 'Doanh thu (Triệu)',
                    // Dữ liệu giả lập (dựa trên % chiều cao mock-up)
                    data: [73, 86, 45, 100, 66, 91, 55], 
                    backgroundColor: primaryBlue,
                    borderRadius: 5,
                    barPercentage: 0.7, 
                    categoryPercentage: 0.8 
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, 
            plugins: {
                legend: { display: false },
                tooltip: { mode: 'index', intersect: false }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { color: 'rgba(255, 255, 255, 0.8)', font: { size: 12 } }
                },
                y: {
                    min: 0,
                    max: 110, // Max theo trục Y mock-up
                    grid: {
                        color: 'rgba(255, 255, 255, 0.2)',
                        drawBorder: false
                    },
                    ticks: {
                        color: 'rgba(255, 255, 255, 0.8)',
                        stepSize: 20, // Bước nhảy 20
                        font: { size: 12 }
                    }
                }
            }
        }
    });
}
// ===  BIỂU ĐỒ TRENDS (LINE CHART - Biểu đồ Đường) ===

const ctxLineTrends = document.getElementById('lineTrendsChart');

if (ctxLineTrends) {
    // Màu sắc từ biến CSS
    const primaryBlue = '#5F89F2'; // Màu xanh dương/tím chủ đạo
    
    // Tạo Gradient cho vùng fill (nếu muốn làm hiệu ứng Area Chart)
    const gradient = ctxLineTrends.getContext('2d').createLinearGradient(0, 0, 0, 300);
    gradient.addColorStop(0, 'rgba(95, 137, 242, 0.4)'); // Xanh dương đậm hơn
    gradient.addColorStop(1, 'rgba(95, 137, 242, 0.05)'); // Gần như trong suốt

    new Chart(ctxLineTrends, {
        type: 'line', // Loại biểu đồ đường
        data: {
            // Dữ liệu giả lập 7 ngày
            labels: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN'],
            datasets: [{
                label: 'Giá trị (Tỷ VNĐ)',
                // Dữ liệu giả lập
                data: [3, 5, 4, 7, 6, 9, 8], 
                
                borderColor: primaryBlue, // Màu đường line
                backgroundColor: gradient, // Dùng gradient cho vùng fill
                fill: true, // Bật fill
                
                tension: 0.4, // Đường cong mượt
                borderWidth: 2,
                pointRadius: 4, 
                pointBackgroundColor: primaryBlue,
                pointBorderColor: '#201C38', // Màu nền sidebar để tạo viền sáng
                pointBorderWidth: 2,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, 
            plugins: {
                legend: { display: false },
                tooltip: { mode: 'index', intersect: false }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { color: 'rgba(255, 255, 255, 0.8)', font: { size: 12 } }
                },
                y: {
                    min: 0,
                    max: 10, // Max 10 (theo dữ liệu giả lập)
                    grid: {
                        color: 'rgba(255, 255, 255, 0.2)',
                        drawBorder: false
                    },
                    ticks: {
                        color: 'rgba(255, 255, 255, 0.8)',
                        stepSize: 2, // Bước nhảy 2
                        font: { size: 12 }
                    }
                }
            }
        }
    });
}

    // =========================================================
    // 3. LOGIC RIÊNG CHO TRANG QUẢN LÝ PHƯƠNG TIỆN 
    // =========================================================
    if (currentPage === 'phuongtien') { 
        
        // ---  Hàm chung đóng tất cả các dropdown menu ---
        const closeAllDropdowns = () => {
            // Đóng menu
            document.querySelectorAll('.pt-filter-tabs .dropdown-menu.active').forEach(openMenu => {
                openMenu.classList.remove('active');
            });
            // Loại bỏ active-tab khỏi tab cha
            document.querySelectorAll('.pt-tab-item.tab-dropdown.active-tab').forEach(tab => {
                 tab.classList.remove('active-tab');
            });
        };
        
        // ---  Logic Modal Thêm/Sửa Phương tiện ---
        const addVehicleBtn = document.getElementById('open-add-vehicle-modal');
        // Đảm bảo Modal có id là 'add-vehicle-modal' và class là 'pt-modal-overlay'
        const vehicleModal = document.getElementById('add-vehicle-modal'); 
        const closeVehicleBtn = document.getElementById('close-vehicle-modal');
        const saveVehicleBtn = document.getElementById('save-vehicle-btn');
        

        if (addVehicleBtn && vehicleModal) {
            
            addVehicleBtn.addEventListener('click', () => {
                closeAllDropdowns(); // Đóng dropdown trước khi mở modal
                vehicleModal.classList.add('active'); // Mở Modal (Class 'active' trong CSS sẽ set display: flex)
            });

            if (closeVehicleBtn) {
                closeVehicleBtn.addEventListener('click', () => {
                    vehicleModal.classList.remove('active');
                });
            }
            
            // Đóng Modal khi click ra ngoài overlay
            vehicleModal.addEventListener('click', (e) => {
                if (e.target === vehicleModal) {
                    vehicleModal.classList.remove('active');
                }
            });
            
            // Xử lý nút 'Lưu' (Submit form)
            if (saveVehicleBtn) {
                saveVehicleBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    console.log("Dữ liệu phương tiện đã được lưu. Đóng modal.");
                    vehicleModal.classList.remove('active');
                });
            }
        } 


        // ---  Logic Dropdown Filters (Trạng thái & Loại xe) ---
        const dropdownTabs = document.querySelectorAll('.pt-filter-tabs .tab-dropdown');

        dropdownTabs.forEach(tab => {
            tab.addEventListener('click', (e) => {
                e.stopPropagation(); 
                const menu = tab.querySelector('.dropdown-menu');

                if (!menu) return;

                if (menu.classList.contains('active')) {
                    // Nếu đang mở -> Đóng
                    closeAllDropdowns();
                } else {
                    // Nếu đang đóng -> Đóng tất cả và mở tab hiện tại
                    closeAllDropdowns();
                    menu.classList.add('active'); // Thêm class active để HIỂN THỊ
                    tab.classList.add('active-tab'); 
                }
            });
        });

        // Xử lý click vào các item bên trong dropdown menu (để menu đóng sau khi chọn)
        document.querySelectorAll('.dropdown-menu .dropdown-item').forEach(item => {
             item.addEventListener('click', (e) => {
                 e.stopPropagation(); 
                 const tab = e.target.closest('.tab-dropdown');
                 
                 console.log(`Đã chọn: ${e.target.textContent}`);
                 
                 // [Tùy chọn] Cập nhật tiêu đề tab
                 if (tab) {
                      let tabText = tab.querySelector('span');
                      if (tabText) {
                          tabText.textContent = e.target.textContent;
                      }
                 }
                 
                 closeAllDropdowns(); // Đóng menu và loại bỏ active-tab
             });
        });


        // Xử lý click ra ngoài để đóng menu dropdown
        document.addEventListener('click', (e) => {
            // Kiểm tra xem click có nằm ngoài tab dropdown và menu dropdown hay không
            if (!e.target.closest('.pt-tab-item.tab-dropdown')) {
                closeAllDropdowns();
            }
        });
    }


    // =========================================================
    // 4. LOGIC RIÊNG CHO TRANG QUẢN LÝ KHÁCH HÀNG 
    // =========================================================
    if (currentPage === 'khachhang') {
        
        // --- 4.1. Định nghĩa các phần tử DOM ---
        const locationModal = document.getElementById('location-filter-modal');
        const industryModal = document.getElementById('industry-filter-modal');
        const addCustomerModal = document.getElementById('add-customer-modal');
        
        const statusTab = document.querySelector('.client-tabs .tab-item:nth-child(1)'); 
        const locationTab = document.querySelector('.client-tabs .tab-item:nth-child(2)'); 
        const industryTab = document.querySelector('.client-tabs .tab-item:nth-child(3)');
        
        const addCustomerButton = document.querySelector('.actions-panel .add-action'); 
        
        // ------- Hàm chung ---
        const closeAllModals = () => {
             document.querySelectorAll('.filter-modal-overlay.active').forEach(modal => {
                 modal.classList.remove('active');
             });
        };

        const setActiveTab = (targetTab) => {
             document.querySelectorAll('.client-tabs .tab-item').forEach(tab => {
                 tab.classList.remove('active-tab');
             });
             if(targetTab) targetTab.classList.add('active-tab');
        };
        
        // Logic Tabs và Filter Modals ---
        if (statusTab && locationTab && industryTab) {
             const openModalAndSetActive = (tab, modal) => {
                 setActiveTab(tab);
                 closeAllModals(); 
                 if (modal) modal.classList.add('active');
             };
             
             locationTab.addEventListener('click', () => openModalAndSetActive(locationTab, locationModal));
             industryTab.addEventListener('click', () => openModalAndSetActive(industryTab, industryModal));
             
             statusTab.addEventListener('click', () => {
                 setActiveTab(statusTab);
                 closeAllModals(); 
             });
             
             document.querySelectorAll('.modal-btn.close-btn').forEach(btn => {
                 btn.addEventListener('click', (e) => {
                     e.preventDefault(); 
                     closeAllModals();
                     setActiveTab(statusTab);
                 });
             });

             document.querySelectorAll('.filter-modal-overlay').forEach(overlay => {
                 overlay.addEventListener('click', (e) => {
                     if (e.target === overlay) {
                         overlay.classList.remove('active');
                         setActiveTab(statusTab);
                     }
                 });
             });
        }
        
        // ---  Logic Thêm Khách hàng ---
        if (addCustomerButton && addCustomerModal) {
             addCustomerButton.addEventListener('click', () => {
                 closeAllModals();
                 addCustomerModal.classList.add('active');
                 setActiveTab(null); 
             });
             
             const submitAddCustomerBtn = document.getElementById('submit-add-customer');
             if (submitAddCustomerBtn) {
                 submitAddCustomerBtn.addEventListener('click', (e) => {
                     e.preventDefault();
                     console.log("Form Thêm Khách hàng đã được submit.");
                     addCustomerModal.classList.remove('active');
                     setActiveTab(statusTab); 
                 });
             }
        }
    }
    // =========================================================
    //  LOGIC RIÊNG CHO TRANG QUẢN LÝ HỢP ĐỒNG
    // =========================================================

    if (currentPage === 'hopdong') { 
    
    // --- 1. HÀM TIỆN ÍCH CHUNG ---
    
    const closeAllDropdowns = () => {
        // Đảm bảo đóng tất cả dropdown menu đang mở
        document.querySelectorAll('.hd-filter-tabs .dropdown-menu.active').forEach(openMenu => {
            openMenu.classList.remove('active');
        });
        // Loại bỏ trạng thái active khỏi tất cả các tab (trừ tab Tất Cả)
        document.querySelectorAll('.hd-tab-item.active-tab').forEach(tab => {
            tab.classList.remove('active-tab');
        });
        // Đảm bảo nút "Tất Cả" luôn active nếu không có filter nào mở
        const allTab = document.getElementById('all-tab');
        if(allTab) allTab.classList.add('active-tab');
    };

    const setActiveTab = (targetTab) => {
        // Loại bỏ trạng thái 'active-tab' khỏi tất cả tabs
        document.querySelectorAll('.hd-tab-item').forEach(tab => {
            tab.classList.remove('active-tab');
        });
        if(targetTab) targetTab.classList.add('active-tab');
    };

    
    // Hàm tiện ích: Đóng modal và chuyển về tab "Tất Cả"
    const resetToAllTab = () => setActiveTab(document.getElementById('all-tab'));
    
    
    // --- 2. XỬ LÝ MODAL THÊM HỢP ĐỒNG ---
    const addContractBtn = document.getElementById('open-add-contract-modal');
    const contractModal = document.getElementById('add-contract-modal'); 
    const closeContractBtn = document.getElementById('close-contract-modal'); 
    const saveContractBtn = document.getElementById('save-contract-btn'); 

    if (addContractBtn && contractModal) {
        
        // Mở Modal (Đóng Dropdown nếu đang mở)
        addContractBtn.addEventListener('click', () => {
            closeAllDropdowns(); 
            contractModal.classList.add('active');
        });
        
        // Xử lý Hủy & Lưu 
        if (closeContractBtn) {
            closeContractBtn.addEventListener('click', () => {
                contractModal.classList.remove('active');
                resetToAllTab();
            });
        }
        if (saveContractBtn) {
            saveContractBtn.addEventListener('click', (e) => {
                e.preventDefault();
                contractModal.classList.remove('active');
                resetToAllTab();
            });
        }

        // Đóng Modal khi click ra ngoài overlay
        contractModal.addEventListener('click', (e) => {
            if (e.target === contractModal) {
                contractModal.classList.remove('active');
                resetToAllTab();
            }
        });
    }
    
    // --- 3. XỬ LÝ MODAL IN HỢP ĐỒNG ---
    const printContractBtn = document.getElementById('print-contract-btn'); 
    const printModal = document.getElementById('print-contract-modal'); 
    const closePrintBtn = document.getElementById('close-print-modal'); 
    const confirmPrintBtn = document.getElementById('confirm-print-btn'); 
    
    if (printContractBtn && printModal) {
        
        // Mở Modal (Đóng Dropdown và Modal khác nếu đang mở)
        printContractBtn.addEventListener('click', () => {
            closeAllDropdowns(); 
            // Đảm bảo Modal thêm hợp đồng (nếu có) bị đóng
            document.getElementById('add-contract-modal').classList.remove('active');
            
            printModal.classList.add('active');
        });
        
        // Xử lý Nút Hủy
        if (closePrintBtn) {
            closePrintBtn.addEventListener('click', () => {
                printModal.classList.remove('active');
                resetToAllTab();
            });
        }
        // Xử lý Nút In (Submit Form)
        if (confirmPrintBtn) {
            confirmPrintBtn.addEventListener('click', (e) => {
                e.preventDefault();
                console.log("Đã xác nhận In Hợp đồng.");
                // Thực hiện logic in hợp đồng ở đây...
                
                printModal.classList.remove('active');
                resetToAllTab();
            });
        }

        // Đóng Modal khi click ra ngoài overlay
        printModal.addEventListener('click', (e) => {
            if (e.target === printModal) {
                printModal.classList.remove('active');
                resetToAllTab();
            }
        });
    }
    
    // --- 4. LOGIC LỌC DỮ LIỆU TỪ TABS (CHƯA XỬ LÝ, ĐÃ HỦY) ---
    
    // Hàm mới: Set Active Tab và thực hiện lọc dữ liệu
    const filterContracts = (targetElement) => {
        const filterValue = targetElement.getAttribute('data-filter');
        
        // 1. Loại bỏ trạng thái 'active-tab' khỏi tất cả tabs
        document.querySelectorAll('.hd-tab-item').forEach(tab => {
            tab.classList.remove('active-tab');
        });

        // 2. Thêm trạng thái 'active-tab' cho tab được click
        targetElement.classList.add('active-tab');
        
        // 3. Thực hiện logic lọc dữ liệu (Hiện tại là in ra console)
        console.log(`Đang lọc danh sách Hợp đồng theo trạng thái: ${filterValue || 'all'}`);
        
        // TODO: Bổ sung logic lọc dữ liệu thực tế tại đây!
    };
    
    // Lấy tất cả các tab cần lắng nghe sự kiện
    const allTab = document.getElementById('all-tab');
    const notProcessedTab = document.getElementById('not-processed-filter-tab');
    const cancelledTab = document.getElementById('cancelled-filter-tab');

    if (allTab) {
        allTab.addEventListener('click', (e) => filterContracts(e.currentTarget));
    }

    if (notProcessedTab) {
        notProcessedTab.addEventListener('click', (e) => filterContracts(e.currentTarget));
    }

    if (cancelledTab) {
        cancelledTab.addEventListener('click', (e) => filterContracts(e.currentTarget));
    }
    const cancelContractBtn = document.getElementById('cancel-contract-btn'); // Nút trên Main Content
    const cancelModal = document.getElementById('cancel-contract-modal'); 
    const closeCancelBtn = document.getElementById('close-cancel-modal'); 
    const confirmCancelBtn = document.getElementById('confirm-cancel-btn'); 
    

    if (cancelContractBtn && cancelModal) {
        
        // Mở Modal (Đóng các Modal khác nếu đang mở)
        cancelContractBtn.addEventListener('click', () => {
             closeAllDropdowns(); 
             // Đảm bảo Modal thêm/in hợp đồng bị đóng
             document.getElementById('add-contract-modal').classList.remove('active');
             document.getElementById('print-contract-modal').classList.remove('active');
             
             cancelModal.classList.add('active');
        });
        
        // Xử lý Nút Hủy bỏ
        if (closeCancelBtn) {
             closeCancelBtn.addEventListener('click', () => {
                 cancelModal.classList.remove('active');
                 resetToAllTab();
             });
        }
        // Xử lý Nút Xác nhận Hủy (Submit Form)
        if (confirmCancelBtn) {
             confirmCancelBtn.addEventListener('click', (e) => {
                 e.preventDefault();
                 const reason = document.getElementById('cancel-reason').value;
                 console.log(`Đã xác nhận Hủy Hợp đồng. Lý do: ${reason}`);
                 // TODO: Thực hiện logic gọi API hủy hợp đồng tại đây
                 
                 cancelModal.classList.remove('active');
                 resetToAllTab();
             });
        }

        // Đóng Modal khi click ra ngoài overlay
        cancelModal.addEventListener('click', (e) => {
            if (e.target === cancelModal) {
                cancelModal.classList.remove('active');
                resetToAllTab();
            }
        });
    }
}

    //======LOGIC CHO TRANG THANH TOÁN====//

    else if (currentPage === 'thanhtoan') { 
        // Hàm đóng tất cả dropdown (cho tab lọc)
const closeAllDropdowns = () => {
    document.querySelectorAll('.tab-dropdown .dropdown-menu.active').forEach(menu => {
        menu.classList.remove('active');
    });
};

// Hàm set active cho tab filter (nếu muốn dùng)
const setActivePaymentTab = (tab) => {
    document.querySelectorAll('.tt-tab-item').forEach(item => item.classList.remove('active-tab'));
    if (tab) tab.classList.add('active-tab');
};

        
        // --- 1. HÀM TIỆN ÍCH CHUNG ---
        
        // Hàm này sẽ được gọi khi click vào một tab lọc
        const filterPayments = (targetElement) => {
            const filterValue = targetElement.getAttribute('data-filter');
            const tableBody = document.getElementById('payment-table-body');
            
            // 1. Loại bỏ trạng thái 'active-tab' khỏi tất cả tabs
            document.querySelectorAll('.tt-tab-item').forEach(tab => {
                tab.classList.remove('active-tab');
            });

            // 2. Thêm trạng thái 'active-tab' cho tab được click
            targetElement.classList.add('active-tab');
            
            // 3. Thực hiện logic lọc dữ liệu (Hiện tại là in ra console)
            console.log(`Đang lọc danh sách Thanh toán theo trạng thái: ${filterValue || 'all'}`);
            
            // LOGIC LỌC DỮ LIỆU THỰC TẾ (DEMO)
            if (tableBody) {
                Array.from(tableBody.children).forEach(row => {
                    const statusCell = row.querySelector('.status-paid, .status-pending');
                    
                    if (!statusCell) {
                        row.style.display = 'table-row'; // Giữ lại hàng trống
                        return;
                    }

                    const statusText = statusCell.textContent.trim();
                    let shouldShow = false;

                    if (filterValue === 'all') {
                        shouldShow = true;
                    } else if (filterValue === 'paid') {
                        shouldShow = (statusText === 'Đã Thanh Toán'); 
                    } else if (filterValue === 'pending') {
                        shouldShow = (statusText === 'Chờ Thanh Toán'); 
                    }
                    // Bỏ qua lọc theo ngày/tháng ở đây, cần logic phức tạp hơn

                    row.style.display = shouldShow ? 'table-row' : 'none';
                });
            }
        };
        
        // --- 2. XỬ LÝ SỰ KIỆN TABS & LỌC DỮ LIỆU ---
        
        const allTab = document.getElementById('all-payments-tab');
        const paidTab = document.getElementById('paid-payments-tab');
        const pendingTab = document.getElementById('pending-payments-tab');
        const dateFilterTab = document.getElementById('date-filter-tab');
        
        // Lắng nghe sự kiện click cho các tab lọc trực tiếp
        if (allTab) allTab.addEventListener('click', (e) => filterPayments(e.currentTarget));
        if (paidTab) paidTab.addEventListener('click', (e) => filterPayments(e.currentTarget));
        if (pendingTab) pendingTab.addEventListener('click', (e) => filterPayments(e.currentTarget));

        // Xử lý Dropdown cho tab 'Theo Ngày'
        if (dateFilterTab) {
            dateFilterTab.addEventListener('click', (e) => {
                 e.stopPropagation(); // Quan trọng: Ngăn chặn click lên document gây đóng ngay lập tức
                 
                 // Đóng/Mở dropdown menu
                 const menu = document.getElementById('date-filter-menu');
                 
                 // Đóng tất cả các menu khác (sử dụng hàm closeAllDropdowns nếu đã có)
                 document.querySelectorAll('.tab-dropdown .dropdown-menu.active').forEach(openMenu => {
                      if (openMenu !== menu) {
                           openMenu.classList.remove('active');
                      }
                 });
                 
                 menu.classList.toggle('active');
                 
                 // Cập nhật tab "Theo Ngày" thành active
                 if(menu.classList.contains('active')) {
                     setActivePaymentTab(dateFilterTab);
                 } else {
                     // Nếu đóng, bạn có thể chuyển active sang tab khác (ví dụ: Tất Cả)
                     // Hoặc chỉ giữ nguyên active tab trước đó
                 }
            });

            // Lắng nghe sự kiện click cho các item trong dropdown
            document.querySelectorAll('#date-filter-menu .dropdown-item').forEach(item => {
                item.addEventListener('click', (e) => {
                    e.stopPropagation(); 
                    const filterValue = e.currentTarget.getAttribute('data-filter');
                    
                    console.log(`Đang lọc danh sách Thanh toán theo thời gian: ${filterValue}`);
                    
                    // TODO: Thêm logic lọc dữ liệu thực tế theo ngày tháng ở đây
                    
                    // Đóng dropdown sau khi chọn
                    document.getElementById('date-filter-menu').classList.remove('active');
                    
                    // Cập nhật tên tab "Theo Ngày" thành mục đã chọn (Tùy chọn)
                    // dateFilterTab.querySelector('span').textContent = e.currentTarget.textContent;
                });
            });
        }
        
        // --- XỬ LÝ CÁC TABS LỌC KHÁC (Tất Cả, Đã TT, Chưa TT) ---


        [allTab, paidTab, pendingTab].forEach(tab => {
             if (tab) {
                 tab.addEventListener('click', (e) => {
                     closeAllDropdowns(); // Đóng dropdown nếu có
                     setActivePaymentTab(e.currentTarget);
                     filterPayments(e.currentTarget.getAttribute('data-filter'));
                 });
             }
        });
        
        // Thêm listener để đóng dropdown khi click ra ngoài (quan trọng)
        document.addEventListener('click', closeAllDropdowns);


        // --- BỔ SUNG LOGIC MODAL TẠO THANH TOÁN MỚI ---
        
        const addPaymentBtn = document.getElementById('open-add-payment-modal');

        // ... (các biến modal khác) ...

        if (addPaymentBtn) {
            addPaymentBtn.addEventListener('click', () => {
                 closeAllDropdowns(); // Đóng dropdown trước khi mở modal
                 console.log("Mở Modal Thêm Thanh Toán");
                 // Thêm logic hiển thị modal ở đây
            });
        }
        // --- KHAI BÁO BIẾN MODAL ---
     const paymentModal = document.getElementById('add-payment-modal'); 
    const closePaymentBtn = document.getElementById('close-payment-modal'); 
    const savePaymentBtn = document.getElementById('save-payment-btn'); 

   if (addPaymentBtn && paymentModal) {
    
    // Mở Modal (Sự kiện CLICK DUY NHẤT)
    addPaymentBtn.addEventListener('click', (e) => {
         e.stopPropagation(); // Ngăn sự kiện lan truyền
         e.preventDefault();  
         
         // Đóng tất cả dropdowns (giữ nguyên hàm nếu có)
         if (typeof closeAllDropdowns === 'function') closeAllDropdowns(); 
         
         // Lệnh MỞ Modal (Lệnh này bị thiếu trong khối code ban đầu của bạn)
         paymentModal.classList.add('active'); 
         
         console.log("CLICK THÀNH CÔNG: Đã mở Modal Thanh Toán Mới!");
    });
    
    // Xử lý Nút Hủy
    if (closePaymentBtn) {
         closePaymentBtn.addEventListener('click', () => {
             paymentModal.classList.remove('active');
         });
    }
    
    // Xử lý Nút Xác nhận (Lưu)
    if (savePaymentBtn) {
         savePaymentBtn.addEventListener('click', (e) => {
             e.preventDefault();
             // Logic xử lý dữ liệu ở đây
             console.log("Đã xác nhận tạo Thanh Toán Mới.");
             paymentModal.classList.remove('active');
         });
    }

    // Đóng Modal khi click ra ngoài overlay
    paymentModal.addEventListener('click', (e) => {
        if (e.target === paymentModal) {
            paymentModal.classList.remove('active');
        }
    });
    }


// --- BỔ SUNG LOGIC MODAL XUẤT BÁO CÁO THANH TOÁN ---
const exportPaymentBtn = document.getElementById('export-payment-report-btn');
const exportPaymentModal = document.getElementById('export-payment-modal');
const closeExportPaymentBtn = document.getElementById('close-export-payment-modal');
const confirmExportPaymentBtn = document.getElementById('confirm-export-payment-btn');

if (exportPaymentBtn && exportPaymentModal) {
    
    // Mở Modal Export
    exportPaymentBtn.addEventListener('click', (e) => {
         e.stopPropagation(); 
         e.preventDefault(); 
         // Đảm bảo đóng dropdown trước khi mở modal (nếu có)
         if (typeof closeAllDropdowns === 'function') closeAllDropdowns(); 
         exportPaymentModal.classList.add('active');
         console.log("Mở Modal Xuất Báo Cáo Thanh Toán!");
    });
    
    // Đóng Modal khi click nút Hủy
    if (closeExportPaymentBtn) {
         closeExportPaymentBtn.addEventListener('click', () => {
             exportPaymentModal.classList.remove('active');
         });
    }
    
    // Xử lý logic Export
    if (confirmExportPaymentBtn) {
         confirmExportPaymentBtn.addEventListener('click', (e) => {
             e.preventDefault(); 
             // TODO: THÊM LOGIC LẤY THÔNG TIN FILTER VÀ GỌI API XUẤT BÁO CÁO
             console.log("Đã xác nhận Xuất Báo Cáo Thanh Toán. Đang tải file...");
             
             // Đóng modal sau khi xử lý (hoặc sau khi thành công)
             exportPaymentModal.classList.remove('active');
         });
    }

    // Đóng Modal khi click ra ngoài overlay
    exportPaymentModal.addEventListener('click', (e) => {
        if (e.target === exportPaymentModal) {
             exportPaymentModal.classList.remove('active');
        }
    });
}
  if (closeSuccessBtn && successModal) {
        closeSuccessBtn.addEventListener('click', () => {
            successModal.classList.remove('active');
        });
        
        // Đóng modal khi click ra ngoài
        successModal.addEventListener('click', (e) => {
            if (e.target === successModal) {
                 successModal.classList.remove('active');
            }
        });
    }
    const processPaymentModal = document.getElementById('process-payment-modal');
const closeProcessPaymentBtn = document.getElementById('close-process-payment-modal');
const confirmProcessPaymentBtn = document.getElementById('confirm-process-payment-btn'); // Nút XÁC NHẬN

// Hàm mở modal và điền dữ liệu (Cần gọi khi click nút 'Xử lý' trong bảng)
function openProcessPaymentModal(contractId, customerName, amountDue) {
    if (processPaymentModal) {
        // Cập nhật dữ liệu động
        document.getElementById('payment-process-id').textContent = contractId;
        document.getElementById('process-contract-id').value = contractId;
        document.getElementById('process-customer').value = customerName;
        document.getElementById('process-amount-due').value = amountDue;
        
        processPaymentModal.classList.add('active');
    }
}

  
    }
const ctx = document.getElementById('dailyRevenueChart');

if (ctx) {
    // Lấy màu sắc từ biến CSS (Nếu bạn đã khai báo chúng trong JS)
    // Hoặc sử dụng giá trị cứng để khớp với giao diện
    const primaryPink = '#C7387B';
    const primaryGreen = '#A7F3D0'; // Màu xanh lá sáng cho biểu đồ

    // Tạo đối tượng Gradient để fill vùng bên dưới
    const gradient = ctx.getContext('2d').createLinearGradient(0, 0, 0, 250);
    gradient.addColorStop(0, 'rgba(167, 243, 208, 0.4)'); // Phần trên (xanh sáng, 40% opacity)
    gradient.addColorStop(1, 'rgba(167, 243, 208, 0.0)'); // Phần dưới (trong suốt)

    new Chart(ctx, {
        type: 'line', // Loại biểu đồ đường
        data: {
            // Nhãn (T2 - CN)
            labels: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN'],
            datasets: [{
                label: 'Doanh thu (Triệu)',
                // Dữ liệu giả lập theo hình ảnh bạn cung cấp: (0, 10, 30, 27, 28, 35, 40)
                data: [0, 10, 30, 27, 28, 35, 40],
             
                
                // --- THIẾT LẬP MÀU SẮC LINE & FILL ---
                borderColor: primaryGreen, // Màu đường line
                backgroundColor: gradient, // Màu fill vùng dưới line (dùng gradient)
                fill: true, // Bật chế độ fill

                tension: 0.4, // Đường cong mượt mà
                pointRadius: 4, // Kích thước các điểm dữ liệu
                pointBackgroundColor: primaryGreen,
                pointBorderColor: '#1A1730', // Màu border của điểm (màu nền sidebar)
                pointBorderWidth: 2,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // Rất quan trọng để biểu đồ vừa với chart-container
            plugins: {
                legend: {
                    display: false // Ẩn label "Doanh thu (Triệu)"
                },
                tooltip: {
                    // Thiết lập tooltip đơn giản
                    mode: 'index',
                    intersect: false,
                }
            },
            scales: {
                x: {
                    // Cấu hình trục X
                    grid: {
                        display: false, // Ẩn đường lưới dọc
                    },
                    ticks: {
                        color: 'rgba(255, 255, 255, 0.8)', // Màu chữ cho T2, T3...
                        font: { size: 12 }
                    }
                },
                y: {
                    // Cấu hình trục Y
                    min: 0,
                    max: 50,
                    grid: {
                        color: 'rgba(255, 255, 255, 0.2)', // Màu đường lưới ngang (trắng mờ)
                        borderDash: [5, 5], // Đường đứt nét
                        drawBorder: false
                    },
                    ticks: {
                        color: 'rgba(255, 255, 255, 0.8)', // Màu chữ cho 10, 20...
                        stepSize: 10,
                        font: { size: 12 }
                    }
                }
            }
        }
    });
}
// === BIỂU ĐỒ DOANH THU HÀNG THÁNG (LINE CHART) ===

const ctxMonthly = document.getElementById('monthlyRevenueChart');

if (ctxMonthly) {
    const primaryBlue = '#5F89F2'; // Màu xanh dương/tím chủ đạo

    new Chart(ctxMonthly, {
        type: 'line', // Loại biểu đồ đường
        data: {
            // Nhãn (Tháng 1 - Tháng 8)
            labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8'],
            datasets: [{
                label: 'Doanh thu (Triệu VNĐ)',
                // Dữ liệu giả lập (theo hình ảnh đường màu xanh/tím)
                data: [5, 10, 6, 12, 20, 20, 30, 17, 20], 
                
                // --- THIẾT LẬP MÀU SẮC LINE ---
                borderColor: primaryBlue, // Màu đường line (Xanh dương)
                backgroundColor: 'rgba(95, 137, 242, 0.2)', // Màu nền fill mờ (Xanh dương mờ)
                fill: false, // Tắt fill để trông giống hình ảnh hơn
                
                tension: 0.2, // Đường cong nhẹ nhàng
                borderWidth: 2,
                pointRadius: 4, 
                pointBackgroundColor: primaryBlue,
                pointBorderColor: '#1A1730', // Màu nền sidebar
                pointBorderWidth: 2,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, 
            plugins: {
                legend: {
                    display: false 
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false, 
                    },
                    ticks: {
                        color: 'rgba(255, 255, 255, 0.8)',
                        font: { size: 12 }
                    }
                },
                y: {
                    min: 0,
                    max: 40, // Đặt max 40 (hoặc tùy chỉnh)
                    grid: {
                        color: 'rgba(255, 255, 255, 0.2)',
                        borderDash: [5, 5], 
                        drawBorder: false
                    },
                    ticks: {
                        color: 'rgba(255, 255, 255, 0.8)',
                        stepSize: 10,
                        font: { size: 12 }
                    }
                }
            }
        }
    });
}
// === BIỂU ĐỒ TÌNH HÌNH HỢP ĐỒNG (BAR CHART) ===

const ctxContract = document.getElementById('contractStatusChart');

if (ctxContract) {
    // Màu sắc theo giao diện của bạn
    const primaryBlue = '#5F89F2'; // Màu xanh dương cho cột 1 (ví dụ: Đã ký)
    // Lấy màu status-completed-contract (xanh lá/vàng) trong root CSS
    const completedGreen = '#A7F3D0'; // Màu xanh lá sáng (hoặc sử dụng giá trị vàng/xanh lá như ảnh)

    new Chart(ctxContract, {
        type: 'bar', // Loại biểu đồ cột
        data: {
            // Nhãn (Loại phương tiện)
            labels: ['Xe máy', 'Xe đạp', 'Ô tô', 'SUV'],
            datasets: [
                {
                    label: 'Hợp đồng mới',
                    // Dữ liệu giả lập cho cột Xanh dương (ví dụ: Hợp đồng mới)
                    data: [20, 12, 25, 8], 
                    backgroundColor: primaryBlue,
                    borderRadius: 4, // Bo góc cột
                },
                {
                    label: 'Hoàn thành',
                    // Dữ liệu giả lập cho cột Vàng/Xanh lá (ví dụ: Đã hoàn thành)
                    data: [25, 20, 13, 13], 
                    backgroundColor: completedGreen,
                    borderRadius: 4,
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, 
            plugins: {
                legend: {
                    display: false // Ẩn legend trong biểu đồ chính
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                }
            },
            scales: {
                x: {
                    stacked: false, // Không xếp chồng các cột
                    grid: {
                        display: false, // Ẩn đường lưới dọc
                    },
                    ticks: {
                        color: 'rgba(255, 255, 255, 0.8)',
                        font: { size: 12 }
                    }
                },
                y: {
                    min: 0,
                    max: 30, // Đặt max 30 theo hình ảnh
                    grid: {
                        color: 'rgba(255, 255, 255, 0.2)', // Đường lưới ngang (trắng mờ)
                        drawBorder: false
                    },
                    ticks: {
                        color: 'rgba(255, 255, 255, 0.8)',
                        stepSize: 10,
                        font: { size: 12 }
                    }
                }
            }
        }
    });
}
    
   
});