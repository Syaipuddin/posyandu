<h1 class="text-center site-title" style="color: #3B1E54;">Jadwal Kegiatan</h1>
<div class="container">

        <div style="margin-top: 60px;padding: 15px;">
            <div class="row" style="background-color: #D4BEE4; border-radius:10px; padding:25px;">
                <div class="col-md-12">
                        <div id="show__jadwal__kegiatan"></div>
                </div>
            </div>
        </div>
        
        <div class="show-list-antrian-anak" style="margin-top: 25px; background-color: #D4BEE4; min-height: 40vh; padding: 25px; color: white; border-radius:10px;">
            <table class="table" style="color: #fff" >
                <thead>
                    <tr style="color: #3B1E54; padding: 0 5px 0 5px;">
                        <th>No Antri</th>
                        <th>No Kunjungan</th>
                        <th>Nama Anak</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="show__list__antrian" ></tbody>

            </table>
        </div>

</div>


<!-- The Modal -->
<div class="modal" id="ModalAddAntrian">
  <div class="modal-dialog modal-lg">
    <div class="modal-content " style="color:black;">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Masukan Ke Antrian</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <table class="table table-striped">

                <thead>
                    <tr>
                        <th>No. KK</th>
                        <th>NIK Anak</th>
                        <th>Nama Anak</th>
                        <th>Jenis Kelamin</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="show__list__anak" ></tbody>

        </table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script src="<?= base_url('public/warga/antrian.js') ?>" ></script>