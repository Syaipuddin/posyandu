<h3 class="text-center site-title" style="color: #3B1E54;">Detail Anak</h3>
<div class="container">

    <div class="row" style="margin-top: 30px; background-color: #D4BEE4; padding: 20px 15px 5px 15px; border-radius: 10px;">
        <div class="col-12 text-center">
            <p id="notifier" style="margin-bottom:10px;background-color:#f54242;display:none; border-radius: 5px; padding: 5px; font-size: 14px;">Anak anda Termasuk Stunting</p>       
        </div>
    
        <div class="col-md-6 col-12">
            <div class="table-responsive">
                <table class="table detail-anak" style="background-color: #D4BEE4;">
                    <tbody>
                        <tr class="">
                            <th style="font-size: 14px;">NIK Anak</th>
                            <td id="show__no__kk__anak" style="font-size: 14px;"></td>
                        </tr>
                        <tr class="">
                            <th style="font-size: 14px;">Nama Anak</th>
                            <td id="show__nama__anak" style="font-size: 14px;"></td>
                        </tr>
                        <tr class="">   
                            <th style="font-size: 14px;">Jenis Kelamin</th>
                            <td id="show__jk" style="font-size: 14px;"></td>
                        </tr>
                        <tr class="">
                            <th style="font-size: 14px;">Umur</th>
                            <td id="show__umur" style="font-size: 14px;"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-6 col-12"> 
            <div class="table-responsive">
                <table class="table detail-anak" style="background-color: #D4BEE4;">
                    <tbody>
                        <tr class="">
                            <th style="font-size: 14px;">No. KMS</th>
                            <td id="show__kms" style="font-size: 14px;"></td>
                        </tr>
                        <tr class="">
                            <th style="font-size: 14px;">Tanggal Terdaftar</th>
                            <td id="show__tgl__terdaftar" style="font-size: 14px;"></td>
                        </tr>
                        <tr class="">
                            <td style="font-size: 14px;">Panjang badan lahir</td>
                            <td id="show__pb" style="font-size: 14px;"></td>
                        </tr>
                        <tr class="">
                            <th style="font-size: 14px;">Berat Badan Lahir</th>
                            <td id="show__bb" style="font-size: 14px;"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>

    <div style="width: 100%;display:flex;justify-content:center; align-content:center;margin-top:5vh;">
        <div style="width:100%; max-width:800px; padding:0 15px;">
            <canvas id="myChart" style="width:100%" height="200"></canvas>
        </div>
    </div>

    <div class="row" style="background-color: #D4BEE4; margin:5vh 0 5vh 0; padding: 15px; border-radius: 10px;">
        <div class="col-12">
            <h6 class="text-left site-title" style="color: white;">Jejak Rekam Medis</h6>
            <div style="background-color:rgb(188, 143, 221); margin-top:20px; padding: 15px; border-radius: 10px;">
                <ul class="nav nav-tabs" style="margin-top: 20px; display: flex; flex-wrap: nowrap; overflow-x: auto;">
                    <li class="active" style="white-space: nowrap;"><a data-toggle="tab" href="#kunjungan" style="color: #3B1E54; padding: 8px 12px; font-size: 14px;">Kunjungan</a></li>
                    <li style="white-space: nowrap;"><a data-toggle="tab" href="#imunisasi" style="color: #3B1E54; padding: 8px 12px; font-size: 14px;">Imunisasi</a></li>
                    <li style="white-space: nowrap;"><a data-toggle="tab" href="#tumbuhanak" style="color: #3B1E54; padding: 8px 12px; font-size: 14px;">Pertumbuhan</a></li>
                </ul>

                <div class="tab-content" style="margin-top: 20px;">
                    <div id="kunjungan" class="tab-pane fade in active">
                        <div class="table-responsive" style="overflow-x: auto;">
                            <table class="table table" style="color: #fff; min-width: 800px;">
                                <thead>
                                    <tr>
                                        <th style="background-color: #3B1E54; font-size: 12px;">No. Kunjungan</th>
                                        <th style="background-color: #3B1E54; font-size: 12px;">No Antri</th>
                                        <th style="background-color: #3B1E54; font-size: 12px;">Status</th>
                                        <th colspan="2" style="background-color: #3B1E54; font-size: 12px;" class="text-center">Imunisasi</th>
                                        <th colspan="4" class="text-center" style="background-color: #3B1E54; font-size: 12px;">Pertumbuhan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th style="background-color: #3B1E54; font-size: 12px;"></th>
                                        <th style="background-color: #3B1E54; font-size: 12px;"></th>
                                        <th style="background-color: #3B1E54; font-size: 12px;"></th>
                                        <th style="background-color: #3B1E54; font-size: 12px;">No. Cek Imunisasi</th>
                                        <th style="background-color: #3B1E54; font-size: 12px;">Nama Imunisasi</th>
                                        <th class="text-center" style="background-color: #3B1E54; font-size: 12px;">No. Cek Pertumbuhan</th>
                                        <th class="text-center bb" style="background-color: #3B1E54; font-size: 12px;">BB (kg)</th>
                                        <th class="text-center" style="background-color: #3B1E54; font-size: 12px;">PB (cm)</th>
                                        <th class="text-center" style="background-color: #3B1E54; font-size: 12px;">Hasil</th>
                                    </tr>
                                </tbody>
                                <tbody id="show__kunjungan"></tbody>
                            </table>
                        </div>
                    </div>
                    <div id="imunisasi" class="tab-pane fade">
                        <div class="table-responsive" style="overflow-x: auto;">
                            <table class="table" style="color: #fff; min-width: 600px;">
                                <thead>
                                    <tr>
                                        <th style="background-color: #3B1E54; font-size: 12px;">No. Cek Imunisasi</th>
                                        <th style="background-color: #3B1E54; font-size: 12px;">Nama Imunisasi</th>
                                        <th style="background-color: #3B1E54; font-size: 12px;">Umur</th>
                                        <th style="background-color: #3B1E54; font-size: 12px;">Tanggal Cek</th>
                                        <th style="background-color: #3B1E54; font-size: 12px;">Catatan Imunisasi</th>
                                    </tr>
                                </thead>
                                <tbody id="show__list__imunisasi"></tbody>
                            </table>
                        </div>
                    </div>
                    <div id="tumbuhanak" class="tab-pane fade">
                        <div class="table-responsive" style="overflow-x: auto;">
                            <table class="table" style="color: #fff; min-width: 600px;">
                                <thead>
                                    <tr>
                                        <th style="background-color: #3B1E54; font-size: 12px;">No. Cek Pertumbuhan</th>
                                        <th style="background-color: #3B1E54; font-size: 12px;">Umur</th>
                                        <th style="background-color: #3B1E54; font-size: 12px;">Panjang Badan</th>
                                        <th style="background-color: #3B1E54; font-size: 12px;">Berat Badan</th>
                                        <th style="background-color: #3B1E54; font-size: 12px;">Hasil</th>
                                        <th style="background-color: #3B1E54; font-size: 12px;">Catatan</th>
                                    </tr>
                                </thead>
                                <tbody id="show__list__pertumbuhan"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var PARAMS = '<?= $this->uri->segment(3) ?>';
</script>
<script src="<?= base_url('public/warga/detail_anak.js') ?>" ></script>

<script>
    // Fungsi untuk menghitung Z-score
    function calculateZScore(measurement, median, sd) {
        return (measurement - median) / sd;
    }

    // Data referensi WHO (Contoh data untuk beberapa usia dan jenis kelamin)
    const whoReference = {
        below24: {
            L: {  // Anak laki-laki
                12: { median: 76.1, sd: 3.1 },  // Usia 12 bulan
                18: { median: 83.3, sd: 3.2 }   // Usia 18 bulan
            },
            P: {  // Anak perempuan
                12: { median: 74.0, sd: 3.0 },
                18: { median: 81.2, sd: 3.1 }
            }
        },
        above24: {
            L: {  // Anak laki-laki
                24: { median: 87.8, sd: 3.2 },
                36: { median: 96.1, sd: 3.5 }
            },
            P: {  // Anak perempuan
                24: { median: 85.7, sd: 3.1 },
                36: { median: 95.0, sd: 3.4 }
            }
        }
    };

    // Fungsi untuk menentukan kategori
    function determineStuntingCategory(age, gender, height) {
        let referenceData;
        
        if (age < 24) {
            referenceData = whoReference.below24[gender][age];
        } else {
            referenceData = whoReference.above24[gender][age];
        }
        
        if (!referenceData) {
            return "Data referensi tidak tersedia untuk usia tersebut.";
        }

        // Hitung Z-score
        const zScore = calculateZScore(height, referenceData.median, referenceData.sd);

        // Tentukan kategori berdasarkan Z-score
        let category;
        if (zScore >= -2) {
            category = 0;
        } else if (zScore >= -3) {
            category = 1;
        } else {
            category = 2;
        }

        return category;
    }

    function getKkAnak() {
        const urlHash = window.location.hash;  // Get everything after the `#` symbol
        const number = urlHash.split('/')[2];   // Split the hash and get the value after `/detailanak/`
        
        return number;
    }

    $(document).ready(function () {
        const kkAnak = getKkAnak(); // Store kk anak value to reuse it

        if (!kkAnak) {
            console.error("KK Anak is not provided!");
            return;
        }

        // First AJAX call
        $.ajax({
            url: `master/warga/Anak/get_detail_anak?no_kk_anak=${kkAnak}`,
            method: 'GET',
            dataType: 'json',
            success: function (e) {
                let umur = e.umur; // Assuming response has 'umur'
                let jk = e.jk; // Adjust logic to set gender if needed

                console.log("First AJAX success:", e);

                // Second AJAX call
                $.ajax({
                    url: `master/warga/Anak/detail_anak?no_kk_anak=${kkAnak}`,
                    method: 'GET',
                    dataType: 'json',
                    success: function (e) {
                        const pertumbuhan = e.pertumbuhan;
                        if (pertumbuhan && pertumbuhan.length > 0) {
                            const lastData = pertumbuhan[pertumbuhan.length - 1];
                            if (determineStuntingCategory(umur, jk, 40) > 0) {
                                $("#notifier").css('display', 'block');
                            }
                        } else {
                            console.warn("No growth data found in response.");
                        }
                    },
                    error: function (err) {
                        console.error("Second AJAX error:", err);
                    },
                });
            },
            error: function (err) {
                console.error("First AJAX error:", err);
            },
        });

        $.ajax({
            url: `master/warga/Anak/get_detail_anak_chart?no_kk_anak=${kkAnak}`,
            method: 'GET',
            dataType: 'json',
            success: function (e) {
                let kunjungan = e.kunjungan;
                let tb = e.tb;
                let bb = e.bb;

                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: kunjungan,
                        datasets: [
                            {
                                label: 'BB',
                                data: bb,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1,
                            },
                            {
                                label: 'TB',
                                data: tb,
                                backgroundColor: 'rgba(219, 61, 9, 0.2)',
                                borderColor: 'rgba(219, 61, 9)',
                                borderWidth: 1,
                            },
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Grafik Pertumbuhan Anak'
                            }
                        }
                    }
                });
            },
            error: function (err) {
                console.error("Chart AJAX error:", err);
            },
        });
    });
</script>