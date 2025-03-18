<article style="height:98vh;">
    <div class="content-1070 center-relative entry-content" style="display:flex;flex-direction:column;justify-content:center;height:100%;">
        <div class="content-900 center-relative">
            <div class="one_half last" style="background-color:#D4BEE4; padding:25px 35px 25px 35px; border-radius:15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div class="">
                    <p class="site-title" style="color: #fff">Register</p>
                    <form id="form-registrasi-warga" method="post">
                        <div class="form-group" >
                            <label class="">Email</label>
                            <input id="email" type="email" class="form-control" name="email" placeholder="Masukan Email">
                        </div>

                        <div class="form-group">
                            <label class="">No. Kartu Keluarga</label>
                             <input id="no_kk" type="text" maxlength="16" name="no_kk" class="form-control"  placeholder="Masukan No. KK ">
                        </div>
                        <div class="form-group">
                            <label class="">Password</label>
                            <input id="password" type="password" name="password" class="form-control showpassword" placeholder="Masukan Password">
                        </div>   

                        <div class="form-group">
                            <label class="">Konfirmasi Password</label>
                            <input id="password2" type="password" name="password2" class="form-control showpassword" placeholder="Konfirmasi Password">
                        </div>

                        

                        <div style="margin-top: 30px;" >
                            <p><button type="submit" id="btn-submit-register" class="btn btn-danger btn-block" style="background-color:#3B1E54; border-color:#3B1E54;"> Registrasi </button> </p>
                        </div>

                        <p style="margin-top:2vh;">Sudah punya akun ? <a href="#/login" style="text-decoration: none; color: #3B1E54;">Login disini</a> </p>
                    </form>

                     <form id="form-verifikasi-akun" method="post">
                         <div class="form-group" >
                              <input type="text" name="code_confirmation" class="form-control" id="code_confirmation" placeholder="Masukan Verifikasi Kode">
                         </div>
                        <div style="margin-top: 30px;" >
                            <p><button type="submit" class="btn btn-danger btn-block" > Konfirmasi </button> </p>
                        </div>
                    </form>

                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</article>
<script>
 var BASE_URL = '<?= base_url() ?>';
</script>
<script src="<?= base_url('public/warga/form/registrasi.js') ?>"></script>