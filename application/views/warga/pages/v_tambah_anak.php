<h3 class="text-center site-title" style="color: #3B1E54;">Tambah Anak</h3>

<div class="container">
    <div style="background-color: #D4BEE4; padding: 15px 25px 15px 25px;">

        <div class="table-responsive">
            <form id="form-add-anak">
                <table class="table" style="margin-top: 40px;" id="item_anak">
                <tr style="">
                    <th> NIK Anak </th>
                    <th> Nama Depan </th>
                    <th> Nama Belakang </th>
                    <th> Tanggal Lahir </th>
                    <th>Jenis Kelamin</th>
                    <th> <button type="button" class="btn btn-info btn-add-anak"  name="add"> <span class="fa fa-plus"></span> Tambah Anak </button> </th>
                </tr>
                <tr>
                    <td><input type="text" name="no_kk_anak[]" maxlength="13" class="form-control item_kk_anak" /> </td>
                    <td><input type="text" name="nama_depan[]" class="form-control item_nama_depan" /> </td>
                    <td><input type="text" name="nama_blkg[]" class="form-control item_nama_blkg "  /></td>
                    <td><input type="date" name="tgl_lahir[]" class="form-control item_tgl_lahir" > </td>
                    <td> 
                        <select name="jk[]" class="form-control item_jk"> 
                            <option value=""> </option>
                            <option value="P"> Perempuan </option>
                            <option value="L"> Laki - Laki</option>
                        </select>
                    </td>
                    <td></td>
                </tr>
                </table>

                <div class="">
                    <a href="#/dashboard" class="btn btn-danger"> Batal </a>
                    <button type="submit" class="btn btn-info"> Simpan Anak </button>
                <div>
            </form>
        </div>
    </div>
</div>
<script>
    var BASE_URL = '<?= base_url() ?>';
</script>
<script src="<?= base_url('public/warga/form/form_add_anak.js') ?>"> </script>