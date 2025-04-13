<h1 class="page-title">Data Profile</h1>

<div class="container">
    <div class="profile-form-container">
        <form id="form-update-warga" method="post">
            <div class="row">
                <!-- Left Column -->
                <div class="col-md-6 form-column">
                    <div class="form-group">
                        <label>No KK</label>
                        <input type="text" class="form-control" name="no_kk" id="no_kk" 
                               value="<?= $this->session->userdata('no_kk') ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" id="email" 
                               value="<?= $this->session->userdata('email') ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Nama Ayah</label>
                        <input type="text" class="form-control" name="nama_ayah" id="nama_ayah">
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-md-6 form-column">
                    <div class="form-group">
                        <label>Nama Ibu</label>
                        <input type="text" class="form-control" name="nama_ibu" id="nama_ibu">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat">
                    </div>

                    <div class="form-group">
                        <label>No.Telp</label>
                        <input type="text" class="form-control" name="no_telp" id="no_telp">
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="form-buttons">
                <div class="row">
                    <div class="col-6">
                        <a href="#/dashboard" class="btn cancel-btn">Batal</a>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn submit-btn">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
.page-title {
    color: #3B1E54;
    text-align: center;
    font-size: 2rem;
    margin-bottom: 1.5rem;
}

.profile-form-container {
    background: #9B7EBD;
    padding: 1.5rem;
    border-radius: 15px;
}

.form-group {
    margin-bottom: 1.2rem;
}

.form-control {
    width: 100%;
    padding: 0.75rem;
    border: 2px solid #D4BEE4;
    border-radius: 8px;
    font-size: 1rem;
}

.form-buttons {
    margin-top: 2rem;
}

.cancel-btn {
    width: 100%;
    background: #D4BEE4 !important;
    color: #3B1E54 !important;
    border: 2px solid #D4BEE4;
    padding: 0.75rem;
    border-radius: 8px;
}

.submit-btn {
    width: 100%;
    background: #3B1E54 !important;
    color: white !important;
    padding: 0.75rem;
    border-radius: 8px;
    border: 2px solid #3B1E54;
}

/* Mobile Styles */
@media (max-width: 768px) {
    .page-title {
        font-size: 1.75rem;
    }
    
    .profile-form-container {
        padding: 1rem;
    }
    
    .form-column {
        margin-bottom: 0.5rem;
    }
    
    .form-control {
        font-size: 0.9rem;
        padding: 0.6rem;
    }
    
    .form-buttons {
        margin-top: 1.5rem;
    }
    
    .col-6 {
        padding: 0 5px;
    }
}

@media (max-width: 480px) {
    .page-title {
        font-size: 1.5rem;
    }
    
    .form-group label {
        font-size: 0.9rem;
    }
    
    .cancel-btn,
    .submit-btn {
        font-size: 0.9rem;
        padding: 0.5rem;
    }
}
</style>

<script>
    var BASE_URL = '<?= base_url() ?>';
</script>
<script src="<?= base_url('public/warga/form/form_profile.js') ?>"></script>