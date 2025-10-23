<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - Dịch vụ cho thuê phương tiện</title>

    {{-- Fonts & Icons --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('home-style.css') }}">
</head>

<body>
    {{-- 🌐 HEADER --}}
    <header class="main-header">
        <div class="container header-container">
            <h1 class="logo"><i class="fa-solid fa-car-side"></i> NeonRent</h1>
            <nav class="main-nav">
                <a href="{{ url('/') }}" class="active">Trang chủ</a>
                <a href="{{ url('/phuongtien') }}">Phương tiện</a>
                <a href="{{ url('/gioithieu') }}">Giới thiệu</a>
                <a href="{{ url('/lienhe') }}">Liên hệ</a>
            </nav>
            <div class="auth-buttons">
                <a href="{{ url('/dangnhap') }}" class="btn-login">Đăng nhập</a>
                <a href="{{ url('/dangky') }}" class="btn-register">Đăng ký</a>
            </div>
        </div>
    </header>

    {{-- 🏍️ BANNER --}}
    <section class="hero-banner">
        <div class="hero-content">
            <h2>Thuê phương tiện dễ dàng, nhanh chóng và an toàn</h2>
            <p>NeonRent cung cấp dịch vụ thuê xe, xe máy, xe tải và nhiều phương tiện khác với giá tốt nhất!</p>
            <a href="{{ url('/phuongtien') }}" class="btn-primary">Thuê ngay</a>
        </div>
    </section>

    {{-- 🚗 PHƯƠNG TIỆN NỔI BẬT --}}
    <section class="featured-vehicles">
        <h2 class="section-title">Phương tiện nổi bật</h2>
        <div class="vehicle-grid">
            <div class="vehicle-card">
                <img src="{{ asset('images/car1.jpg') }}" alt="Xe du lịch">
                <h3>Xe du lịch 4 chỗ</h3>
                <p>Giá thuê: <strong>₫800.000/ngày</strong></p>
            </div>
            <div class="vehicle-card">
                <img src="{{ asset('images/motor1.jpg') }}" alt="Xe máy">
                <h3>Xe máy tay ga</h3>
                <p>Giá thuê: <strong>₫200.000/ngày</strong></p>
            </div>
            <div class="vehicle-card">
                <img src="{{ asset('images/truck1.jpg') }}" alt="Xe tải">
                <h3>Xe tải nhỏ</h3>
                <p>Giá thuê: <strong>₫1.000.000/ngày</strong></p>
            </div>
        </div>
    </section>

    {{-- 💡 LỢI ÍCH --}}
    <section class="benefits">
        <h2 class="section-title">Tại sao chọn NeonRent?</h2>
        <div class="benefit-grid">
            <div class="benefit-item">
                <i class="fa-solid fa-shield-halved"></i>
                <h3>An toàn & Tin cậy</h3>
                <p>Phương tiện được bảo dưỡng định kỳ, đảm bảo an toàn tuyệt đối.</p>
            </div>
            <div class="benefit-item">
                <i class="fa-solid fa-clock"></i>
                <h3>Nhanh chóng</h3>
                <p>Đặt xe chỉ trong vài phút, nhận xe linh hoạt tại nhiều địa điểm.</p>
            </div>
            <div class="benefit-item">
                <i class="fa-solid fa-tags"></i>
                <h3>Giá tốt nhất</h3>
                <p>Cam kết giá thuê cạnh tranh, không phí ẩn.</p>
            </div>
        </div>
    </section>

    {{-- 📞 FOOTER --}}
    <footer class="main-footer">
        <div class="container footer-container">
            <p>© 2025 NeonRent. Mọi quyền được bảo lưu.</p>
            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-tiktok"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>

