<!-- Add viewport meta tag in your HTML head if not already present -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<article style="min-height: 100vh; padding: 20px 0;">
    <div class="content-1070 center-relative entry-content" style="display:flex; flex-direction:column; justify-content:center; min-height: 100vh;">
        <div class="content-900 center-relative" style="width: 100%; max-width: 500px; padding: 0 15px;">
            <div class="mobile-form-container" style="background-color:#D4BEE4; padding: 20px; border-radius:15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div>
                    <p class="site-title" style="color: #fff; font-size: 1.5rem; margin-bottom: 1.5rem;">Register</p>
                    <form id="form-registrasi-warga" method="post">
                        <div class="form-group">
                            <label style="display: block; margin-bottom: 0.5rem;">Email</label>
                            <input id="email" type="email" class="form-control" name="email" placeholder="Masukan Email" style="width: 100%; padding: 8px;">
                        </div>

                        <div class="form-group" style="margin-top: 1rem;">
                            <label style="display: block; margin-bottom: 0.5rem;">No. Kartu Keluarga</label>
                            <input id="no_kk" type="text" maxlength="16" name="no_kk" class="form-control" placeholder="Masukan No. KK" style="width: 100%; padding: 8px;">
                        </div>

                        <div class="form-group" style="margin-top: 1rem;">
                            <label style="display: block; margin-bottom: 0.5rem;">Password</label>
                            <input id="password" type="password" name="password" class="form-control showpassword" placeholder="Masukan Password" style="width: 100%; padding: 8px;">
                        </div>   

                        <div class="form-group" style="margin-top: 1rem;">
                            <label style="display: block; margin-bottom: 0.5rem;">Konfirmasi Password</label>
                            <input id="password2" type="password" name="password2" class="form-control showpassword" placeholder="Konfirmasi Password" style="width: 100%; padding: 8px;">
                        </div>

                        <div style="margin-top: 1.5rem;">
                            <button type="submit" id="btn-submit-register" class="btn btn-danger btn-block" style="background-color:#3B1E54; border-color:#3B1E54; width: 100%; padding: 12px;">Registrasi</button>
                        </div>

                        <p style="margin-top: 1.5rem; text-align: center;">Sudah punya akun ? <a href="#/login" style="color: #3B1E54; font-weight: 500;">Login disini</a></p>
                    </form>

                    <form id="form-verifikasi-akun" method="post">
                        <div class="form-group" style="margin-top: 1rem;">
                            <input type="text" name="code_confirmation" class="form-control" id="code_confirmation" placeholder="Masukan Verifikasi Kode" style="width: 100%; padding: 8px;">
                        </div>
                        <div style="margin-top: 1.5rem;">
                            <button type="submit" class="btn btn-danger btn-block" style="width: 100%; padding: 12px;">Konfirmasi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</article>

<style>
    @media (max-width: 768px) {
        .mobile-form-container {
            padding: 15px !important;
        }
        
        .site-title {
            font-size: 1.3rem !important;
        }
        
        .form-control {
            font-size: 14px !important;
        }
        
        button {
            font-size: 14px;
        }
        
        p {
            font-size: 14px;
        }
    }

    @media (max-width: 480px) {
        .content-900 {
            padding: 0 10px !important;
        }
        
        .mobile-form-container {
            border-radius: 10px !important;
        }
    }
</style>

<script>
 var BASE_URL = '<?= base_url() ?>';
</script>
<script src="<?= base_url('public/warga/form/registrasi.js') ?>"></script>