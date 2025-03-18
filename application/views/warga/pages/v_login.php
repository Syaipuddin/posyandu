<div >
    <div class="blog-holder center-relative" style="height:98vh; padding-left:0; padding-right:0;display:flex;flex-direction:column;justify-content:center;">


        <article id="post-2" class="blog-item-holder" style="background-color:#D4BEE4; padding:25px 35px 25px 35px; border-radius:15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="entry-content relative">
                <p class="site-title" style="color: #fff">Register</p>
                <div class="content-1170 center-relative">
                    <form id="form-login-warga" method="post">
                      <div class="form-group">
                        <label class="" style="color: #fff">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Alamat Email">
                      </div>
                      <div class="form-group">
                        <label class="" style="color: #fff">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password">
                      </div>
                      
                      <button type="submit" class="btn btn-danger btn-block" style="background-color: #3B1E54; border-color: #3B1E54;" name="button">Login</button>
                    </form>
                    <div class="clear" ></div>
                </div>
                <div style="margin-top: 30px;">
                    <p style="color: #fff">Belum punya akun ?  <a href="#/register" style="text-decoration: none; color: #3B1E54">Daftar disini</a>  </p>
                </div>
            </div>
        </article>

    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<script>
var BASE_URL = '<?= base_url() ?>';
</script>
<script src="<?= base_url('public/warga/login.js') ?> "></script>