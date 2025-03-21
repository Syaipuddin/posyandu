<h1 class="text-center site-title" style="color: #3B1E54;">Data Profile</h1>

<div class="container">
    <div style="background-color: #9B7EBD; padding: 20px 35px 20px 35px; border-radius: 15px;">
        <form id="form-update-warga" method="post">
            <div class="row">
                <div class="col-md-6" >
                    <div class="form-group">
                        <label class="site-title">No KK</label>
                        <input type="text" class="form-control" name="no_kk" id="no_kk" value="<?= $this->session->userdata('no_kk') ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label class="site-title">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?= $this->session->userdata('email') ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label class="site-title">Nama Ayah</label>
                        <input type="text" class="form-control" name="nama_ayah" id="nama_ayah">
                    </div>

                </div>
                <div class="col-md-6">
                        <div class="form-group">
                                <label class="site-title">Nama Ibu</label>
                                <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" >
                            </div>

                            <div class="form-group">
                                <label class="site-title">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat">
                            </div>

                            <div class="form-group">
                                <label class="site-title">No.Telp</label>
                                <input type="text" class="form-control" name="no_telp" id="no_telp" >
                        </div>
                </div>
            </div>

            <div class="area-button" style="margin-top: 40px;" >
                <div class="row">
                
                        <div class="col-md-6">
                            <a href="#/dashboard" class="btn btn-danger btn-block" style="background-color: #D4BEE4; border-color: #D4BEE4;"> Batal </a>
                        </div>
                        <div class="col-md-6">
                            <button id="btn-simpan-warga" class="btn btn-info btn-block " style="background-color: #3B1E54; border-color: #3B1E54;"> Simpan </button>
                        </div>
                    
                </div>
            </div>

        </form>
    </div>
</div>
<script>
    var BASE_URL = '<?= base_url() ?>';
</script>
<script src="<?= base_url('public/warga/form/form_profile.js') ?>" ></script>