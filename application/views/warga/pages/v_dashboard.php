<style>
/* MOBILE ADJUSTMENTS START */
@media (max-width: 768px) {
    .card-title {
        font-size: 1.1rem !important;
    }
    
    .btn-action {
        flex: 1 1 100% !important;
        margin-bottom: 0.5rem;
    }
    
    .card-body {
        padding: 1rem !important;
    }
    
    p {
        font-size: 0.9rem;
    }
    
    /* Dashboard section fixes */
    .row[style="height:27vh;"] {
        height: auto !important; /* Remove fixed height */
        min-height: 50vh; /* Allow content-based height */
        margin: 15px 0 !important; /* Adjust spacing */
    }

    /* Columns adjustment */
    .col-md-6[style="height: 100%;"] {
        height: auto !important; /* Remove fixed height */
        margin-bottom: 20px; /* Add spacing between columns */
    }

    /* Status boxes container */
    .dashboard_status_anak[style="background-color: #D4BEE4; padding: 25px 30px 25px 30px; height: 100%; border-radius:10px; display: flex; justify-content: center; align-items:center;gap: 40px;"] {
        flex-wrap: wrap !important; /* Allow wrapping */
        gap: 15px !important; /* Reduce spacing */
        padding: 20px !important; /* Adjust padding */
    }

    /* Individual status boxes */
    .dashboard_status_anak div[style="background-color:#9B7EBD; padding: 15px 30px 15px 30px; border-radius:20px;"] {
        flex: 1 1 45% !important; /* Two columns on mobile */
        padding: 15px !important; /* Adjust padding */
        margin: 5px !important; /* Add spacing */
    }

    /* Data Anak section container */
    div[style="background-color: #D4BEE4; margin: 8px; margin-top: 10px; padding: 25px 30px 25px 30px; border-radius: 10px;"] {
        margin: 20px 0 !important; /* Fix overlapping margins */
        padding: 20px !important; /* Adjust padding */
    }

    /* Cards adjustment */
    .card[style="width: 28rem;"] {
        width: 100% !important; /* Full width cards */
        margin-top: 15px !important; /* Consistent spacing */
    }

    /* Buttons adjustment */
    #btn-tambah-anak[style="background-color: #3B1E54; border-color: #3B1E54;"] {
        width: 100% !important; /* Full width button */
        margin-bottom: 15px !important; /* Add spacing */
    }
}

/* Small mobile devices */
@media (max-width: 480px) {
    /* Status boxes full width */
    .dashboard_status_anak div[style="background-color:#9B7EBD; padding: 15px 30px 15px 30px; border-radius:20px;"] {
        flex: 1 1 100% !important; /* Full width boxes */
    }

    /* Reduce font sizes */
    h1.site-title[style="color: #3B1E54;"] {
        font-size: 1.5rem !important;
    }
    
    h4.site-title[style="color: white;"] {
        font-size: 1.2rem !important;
    }
}

/* DESKTOP FIXES */
@media (min-width: 769px) {
    .dashboard-section-row {
        display: flex;
        flex-wrap: nowrap;
        height: 27vh;
    }
    
    .data-anak-container {
        margin-top: 15vh !important;
    }
    
    .card[style="width: 28rem;"] {
        margin: 15px auto !important;
    }
    
    .dashboard_status_anak {
        justify-content: space-between !important;
    }
}
/* MOBILE ADJUSTMENTS END */
</style>

<!-- YOUR EXISTING HTML CODE STARTS HERE -->
<div class="container"> 
    <section style="margin: 20px;">
        <div class="row" style="height:27vh;">
            <h1 class="text-center site-title" style="color: #3B1E54;">Dashboard</h1>
            <div class="col-md-6" style="height: 100%;">
                <div style="background-color: #D4BEE4; padding: 25px 30px 25px 30px; border-radius:10px; height: 100%;" >
                    <div class="kelengkapan_data"></div>
                    <div style="margin-top: 20px;" class="btn-lengkapi-data" >
                        <a href="#/profile" class="btn btn-info btn-sm" style="background-color: #3B1E54; border-color: #3B1E54;"> Lengkapi Data  </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="height: 100%;">
                <div class="dashboard_status_anak" style="background-color: #D4BEE4; padding: 25px 30px 25px 30px; height: 100%; border-radius:10px; display: flex; justify-content: center; align-items:center;gap: 40px;">
                    <div style="background-color:#9B7EBD; padding: 15px 30px 15px 30px; border-radius:20px;">
                        <p style="font-weight: bold; margin-bottom:10px;">Kurus</p>
                        <p>1 <span style="margin-left:10px;">Anak</span></p>
                    </div>
                    <div style="background-color:#9B7EBD; padding: 15px 30px 15px 30px; border-radius:20px;">
                        <p style="font-weight: bold; margin-bottom:10px;">Normal</p>
                        <p>1 <span style="margin-left:10px;">Anak</span></p>
                    </div>
                    <div style="background-color:#9B7EBD; padding: 15px 30px 15px 30px; border-radius:20px;">
                        <p style="font-weight: bold; margin-bottom:10px;">Gemuk</p>
                        <p>1 <span style="margin-left:10px;">Anak</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="data-anak-container" style="background-color: #D4BEE4; margin: 8px; margin-top: 10px; padding: 25px 30px 25px 30px; border-radius: 10px;">
        <h4 class="site-title" style="color: white;">Data Anak</h4>
        <button id="btn-tambah-anak" class="btn btn-primary" style="background-color: #3B1E54; border-color: #3B1E54;"> TAMBAH ANAK </button>
        <div class="row" id="show-anak" style="display: flex; flex-wrap: wrap;">
                    <div class="col-md-6 placeholderanak" style="margin-top: 20px;">
                        <div class="card" style="width: 28rem;">
                            <div class="card-body">
                                <div class="progress" style="margin-top: 10px;">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <div class="progress" style="margin-top: 10px;">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <div class="progress" style="margin-top: 10px;">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <div class="progress" style="margin-top: 10px;">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <div class="progress" style="margin-top: 10px;">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 placeholderanak" style="margin-top: 20px;">
                        <div class="card" style="width: 28rem;">
                            <div class="card-body">
                                <div class="progress" style="margin-top: 10px;">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <div class="progress" style="margin-top: 10px;">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <div class="progress" style="margin-top: 10px;">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <div class="progress" style="margin-top: 10px;">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <div class="progress" style="margin-top: 10px;">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-md-6" style="margin-top: 20px;" >
                        <div class="card" style="width: 28rem;">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" style="margin-top: 20px;" >
                        <div class="card" style="width: 28rem;">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" style="margin-top: 20px;" >
                        <div class="card" style="width: 28rem;">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" style="margin-top: 20px;" >
                        <div class="card" style="width: 28rem;">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" style="margin-top: 20px;" >
                        <div class="card" style="width: 28rem;">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" style="margin-top: 20px;" >
                        <div class="card" style="width: 28rem;">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" style="margin-top: 20px;" >
                        <div class="card" style="width: 28rem;">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div> -->

            </div>
        </div>
    </div>
    <div class="clear"></div>



    <!-- The Modal -->
    <div class="modal" id="ModalEditAnak" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title text-center">Edit Data Anak</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form id="form-edit-anak">
                <div class="form-group">
                    <label>NIK Anak</label>
                    <input type="text" id="no_kk_anak" name="no_kk_anak" class="form-control" readonly >
                </div>
                <div class="form-group">
                    <label>Nama Depan</label>
                    <input type="text" name="nama_depan" class="form-control" id="nama_depan">
                </div>
                <div class="form-group">
                    <label>Nama Belakang</label>
                    <input type="text" id="nama_belakang" name="nama_belakang" class="form-control">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="">--Jenis Kelamin--</option>
                        <option value="L">Laki - Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
                </div>
                <button type="submit" class="btn btn-warning" style="background-color: #3B1E54; border-color: #3B1E54;" >Update</button>
            </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

        </div>
    </div>
    </div>

    <script>
        var BASE_URL = '<?= base_url() ?>';
    </script>
    <script src="<?= base_url("public/warga/storage.js") ?>" ></script>
    <script src="<?= base_url("public/warga/dashboard.js") ?>" ></script>

    


