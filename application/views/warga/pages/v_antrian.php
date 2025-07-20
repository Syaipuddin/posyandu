<h1 class="page-title">Jadwal Kegiatan</h1>
<div class="container">

    <div class="schedule-container">
        <div class="schedule-content">
            <div class="row">
                <div class="col-12">
                    <div id="show__jadwal__kegiatan"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="queue-container">
        <div class="table-wrapper">
            <table class="queue-table">
                <thead>
                    <tr>
                        <th>No Antri</th>
                        <th>No Kunjungan</th>
                        <th>Nama Anak</th>
                        <th>Umur</th>
                        <th>JK</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="show__list__antrian"></tbody>
            </table>
        </div>
    </div>

</div>

<!-- The Modal -->
<div class="modal" id="ModalAddAntrian" style="color:black;">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Masukan Ke Antrian</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="table-wrapper">
                    <table class="modal-table" style="color:black;">
                        <thead  >
                            <tr>
                                <th>No. KK</th>
                                <th>NIK Anak</th>
                                <th>Nama</th>
                                <th>JK</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="show__list__anak"></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<style>
.page-title {
    color: #3B1E54;
    text-align: center;
    font-size: 2rem;
    margin-bottom: 1.5rem;
}

.schedule-container {
    margin: 2rem 0;
    padding: 1rem;
}

.schedule-content, .queue-container {
    background: #D4BEE4;
    border-radius: 10px;
    padding: 1.5rem;
}

.queue-container {
    margin: 1.5rem 0;
    min-height: 40vh;
}

.table-wrapper {
    overflow-x: auto;
}

.queue-table, .modal-table {
    width: 100%;
    min-width: 600px;
    color: #fff;
}

.queue-table th {
    color: #3B1E54;
    padding: 12px 8px;
}

.modal-table th {
    padding: 10px;
    white-space: nowrap;
}

/* Mobile Optimization */
@media (max-width: 768px) {
    .page-title {
        font-size: 1.75rem;
    }
    
    .schedule-content, .queue-container {
        padding: 1rem;
    }
    
    .queue-table th,
    .queue-table td {
        padding: 8px;
        font-size: 0.9rem;
    }
    
    .modal-body {
        padding: 1rem;
    }
}

@media (max-width: 480px) {
    .page-title {
        font-size: 1.5rem;
    }
    
    .queue-table th {
        font-size: 0.85rem;
    }
    
    .modal-title {
        font-size: 1.25rem;
    }
}
</style>

<script src="<?= base_url('public/warga/antrian.js') ?>"></script>