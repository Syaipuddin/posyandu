<div class="auth-container">
    <div class="auth-wrapper">
        <article class="auth-card">
            <div class="auth-content">
                <h1 class="auth-title">Register</h1>
                <form id="form-login-warga" method="post">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" 
                               placeholder="Masukan Alamat Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="form-control" 
                               placeholder="Masukan Password">
                    </div>
                    <div class="form-group password-toggle">
                        <label class="checkbox-label">
                            <input type="checkbox" id="show-password">
                            <span>Tampilkan Password</span>
                        </label>
                    </div>
                    <button type="submit" class="btn auth-submit">Login</button>
                </form>
                <div class="auth-footer">
                    <p>Belum punya akun? <a href="#/register" class="auth-link">Daftar disini</a></p>
                </div>
            </div>
        </article>
    </div>
</div>

<style>
/* Base Styles */
.auth-container {
    min-height: 100vh;
    padding: 20px;
    display: flex;
    align-items: center;
}

.auth-wrapper {
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
}

.auth-card {
    background: #D4BEE4;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.auth-title {
    color: #fff;
    font-size: 2rem;
    margin-bottom: 1.5rem;
    text-align: center;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-control {
    width: 100%;
    padding: 12px;
    border: 2px solid #9B7EBD;
    border-radius: 8px;
    font-size: 1rem;
}

.checkbox-label {
    color: #fff;
    display: flex;
    align-items: center;
    gap: 8px;
}

.auth-submit {
    width: 100%;
    background: #3B1E54 !important;
    color: white !important;
    padding: 12px;
    border-radius: 8px;
    font-size: 1.1rem;
    margin-top: 1rem;
}

.auth-footer {
    margin-top: 2rem;
    text-align: center;
    color: #fff;
}

.auth-link {
    color: #3B1E54 !important;
    font-weight: bold;
    text-decoration: underline;
}

/* Mobile Styles */
@media (max-width: 576px) {
    .auth-container {
        padding: 15px;
        min-height: 90vh;
    }

    .auth-card {
        padding: 20px;
    }

    .auth-title {
        font-size: 1.75rem;
    }

    .form-control {
        font-size: 0.9rem;
        padding: 10px;
    }

    .checkbox-label span {
        font-size: 0.9rem;
    }
}

@media (max-width: 400px) {
    .auth-card {
        padding: 15px;
    }
    
    .auth-title {
        font-size: 1.5rem;
    }
}
</style>

<script>
var BASE_URL = '<?= base_url() ?>';

$(document).ready(function() {
    $('#show-password').click(function() {
        $('#password').attr('type', $(this).is(':checked') ? 'text' : 'password');
    });
});
</script>
<script src="<?= base_url('public/warga/login.js') ?>"></script>