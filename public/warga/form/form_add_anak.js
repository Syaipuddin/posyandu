var formAddAnakListener = (function() {

    $('.btn-add-anak').click(function(){
        var html = '';
        html += '<tr>';
        html += '<td><input type="text" name="no_kk_anak[]" maxlength="13" class="form-control item_kk_anak" /> </td>';
        html += '<td><input type="text" name="nama_depan[]" class="form-control item_nama_depan" /> </td>';
        html += '<td><input type="text" name="nama_blkg[]" class="form-control item_nama_blkg "  /> </td>';
        html += '<td><input type="date" name="tgl_lahir[]" class="form-control item_tgl_lahir" /> </td>';
        html += '<td>';
              html += '<select name="jk[]" class="form-control item_jk">';
                    html += '<option value=""> </option>';
                    html += '<option value="P"> Perempuan </option>';
                    html += '<option value="L"> Laki - Laki</option>';
              html += '</select>';
        html += '</td>';
        html += '<td><button type="button" name="remove" class="btn btn-custome btn-remove"><span class="fa fa-minus"></span></button></td>';
        html += '</tr>';
        $('#item_anak').append(html);
    });

    $('#item_anak').on('click', '.btn-remove', function(){
        $(this).closest('tr').remove();
    });

    $('#item_anak').on('keypress','.item_kk_anak', function(e){
        if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) ){
            return false;
        }
    });

    $('#form-add-anak').on('submit', function(e){
        e.preventDefault();
        var error = [];

        $('.item_kk_anak').each(function(){
            if($(this).val() == ''){
                error.push('Kolom KK Anak belum diisi');
            }
        });

        $('.item_nama_depan').each(function(){
            if($(this).val() == ''){
                error.push('Kolom Nama Depan Belum Diisi')
            }
        })

        $('.item_nama_blkg').each(function(){
            if($(this).val() == ''){
                error.push('Kolom Nama Belakang belum diisi')
            }
        })

        $('.item_tgl_lahir').each(function(){
            if($(this).val() == ''){
                error.push('Kolom Tanggal Lahir belum diisi')
            }
        })

        $('.item_jk').each(function(){
            if($(this).val() == ''){
                error.push('Kolom Jenis Kelamin belum diisi')
            }
        })

        if(error.length > 0){
            error.forEach(function(item) {
                return $.notify(item, 'info')
            })
        }else{
            $.ajax({
                url: `${BASE_URL}master/warga/Anak/add`,
                method: 'post',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data){
                    var parse = JSON.parse(data);
                    if(parse.code === 200){
                        $.notify(parse.msg, 'success');
                        return location.hash = '#/dashboard'
                    }else{
                        $.notify(parse.msg, 'info')
                    }
                }
            })
        }
    })

    return{
        init: function(){
            console.log('form add initialize')
        }
    }
})()


$(document).ready(function() {
    formAddAnakListener.init();
});