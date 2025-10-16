

    <div class="neon-auth-container-wrapper">
        <div class="neon-auth-card">
            <div class="neon-auth-tabs">
                <button class="neon-auth-tab-button" onclick="window.location='{{ url('/dangnhap') }}'">Đăng nhập</button>
                <button class="neon-auth-tab-button active">Đăng ký</button>
            </div>
            
            <form class="neon-auth-form">
                <div class="neon-auth-input-group">
                    <label for="neon-auth-username">Nhập tài khoản</label>
                    <input type="text" id="neon-auth-username" name="username" placeholder="Nhập tài khoản">
                </div>
                
                <div class="neon-auth-input-group">
                    <label for="neon-auth-password">Nhập mật khẩu</label>
                    <input type="password" id="neon-auth-password" name="password" placeholder="Nhập mật khẩu">
                </div>

                <div class="neon-auth-input-group">
                    <label for="neon-auth-confirm-password">Nhập lại mật khẩu</label>
                    <input type="password" id="neon-auth-confirm-password" name="confirm-password" placeholder="Nhập lại mật khẩu">
                </div>
                
                <button type="submit" class="neon-auth-submit-button">Đăng ký</button>
            </form>
        </div>
    </div>

    <link rel="stylesheet" href="{{ asset('dangky.css') }}">


    <script src="{{ asset('app.js') }}"></script>

