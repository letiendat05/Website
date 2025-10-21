
    <div class="container">
        <h1 class="page-title">Đăng nhập</h1> 

        <div class="login-card">
            <div class="tabs">
                <button class="tab-button active">Đăng nhập</button>
                <button class="tab-button" onclick="window.location='<?php echo e(url('/dangky')); ?>'">Đăng ký</button>
            </div>
            
            <form class="login-form">
                <div class="input-group">
                    <label for="username">Nhập tài khoản</label>
                    <input type="text" id="username" name="username" placeholder="Nhập tài khoản">
                </div>
                
                <div class="input-group">
                    <label for="password">Nhập mật khẩu</label>
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu">
                </div>
                
                <button type="submit" class="submit-button">Đăng nhập</button>
            </form>
        </div>
    </div>

    <link rel="stylesheet" href="<?php echo e(asset('dangnhap.css')); ?>">

    <script src="<?php echo e(asset('app.js')); ?>"></script>
<?php /**PATH C:\BTLweb\Website-main\resources\views/dangnhap.blade.php ENDPATH**/ ?>