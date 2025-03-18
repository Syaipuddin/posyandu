console.log('dashboard is running')
console.log(PARSE_STORAGE);


var kelengkapan = {
    progress: 50,
    text: 'Data belum lengkap, silahkan lengkapi kelengkapan data, sebelum melanjutkan',
    color: '#3B1E54'
}

function fetch_anak_status() {
    $.ajax({
        url: `${BASE_URL}master/warga/Anak/get_anak_status`,
        method: 'get',
        dataType: 'json',
        success: function(data){
            var html = '';
            html = `
                <div style="background-color:#9B7EBD; padding: 15px 30px 15px 30px; border-radius:20px;">
                    <p style="font-weight: bold; margin-bottom:10px;">Kurus</p>
                    <p>${data.kurus} <span style="margin-left:10px;">Anak</span></p>
                </div>
                <div style="background-color:#9B7EBD; padding: 15px 30px 15px 30px; border-radius:20px;">
                    <p style="font-weight: bold; margin-bottom:10px;">Normal</p>
                    <p>${data.normal} <span style="margin-left:10px;">Anak</span></p>
                </div>
                <div style="background-color:#9B7EBD; padding: 15px 30px 15px 30px; border-radius:20px;">
                    <p style="font-weight: bold; margin-bottom:10px;">Gemuk</p>
                    <p>${data.gemuk} <span style="margin-left:10px;">Anak</span></p>
                </div>
            `;
            $('.dashboard_status_anak').html(html);
        }
    })
}

function show_kelengkapan()
{
    var html = '';
    html += `
        <p style="color: #fff">Kelengkapan data: 50%; </p>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: ${kelengkapan.progress}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        <i style="color: ${kelengkapan.color}">${kelengkapan.text}</i>
    `;
    $('.kelengkapan_data').html(html);
}

function kelengkapan_completed()
{
    $.ajax({
        url: `${BASE_URL}master/warga/Anak/fetch`,
        method: 'get',
        dataType: 'json',
        success: function(data){
            var html = '';
            html += `
                <p class="site-title">Kelengkapan data: 100% </p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: ${kelengkapan.progress = 100}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                <i style="color: ${kelengkapan.color = 'green'}">${kelengkapan.text = 'Data Lengkap'}</i>
            `;
            $('.kelengkapan_data').html(html);
        }
    })
}

function load_anak()
{
    $.ajax({
        url: `${BASE_URL}master/warga/Anak/fetch`,
        method: 'get',
        dataType: 'json',
        success: function(data){
            var html = '';
            if(data.length > 0){
                data.forEach(function(item) {
                    console.log(item.no_kk_anak);
                    html += `
                        <div class="col-md-6" style="margin-top: 20px; display: flex; justify-content: center;" >
                            <div class="card" style="width: 32rem; background-color: #9B7EBD; padding: 20px; border-radius:10px; ">
                                <div class="card-body" style='color:#fff;'>
                                    <h5 class="card-title">${item.nama_depan} ${item.nama_belakang}  (${item.jenis_kelamin}) </h5>
                                    <p> ${item.no_kk_anak} </p>
                                    <a href="#/detailanak/${item.no_kk_anak}" class="btn btn-info" style="background-color: #3B1E54; border-color: #3B1E54;">Detail Anak</a>
                                    <button class="btn btn-info btn__edit__anak" style="background-color: #3B1E54; border-color: #3B1E54;"
                                        data-no_kk_anak="${item.no_kk_anak}"
                                        data-nama_depan="${item.nama_depan}"
                                        data-nama_belakang="${item.nama_belakang}"
                                        data-jk="${item.jenis_kelamin}"
                                        data-tgl_lahir="${item.tgl_lahir}"
                                    > Edit Anak </button>
                                </div>
                            </div>
                        </div>
                    `;
                });

            }
            $('#show-anak').html(html);

        }
    })
}

$(document).ready(function(){
    load_anak();
    fetch_anak_status();

    if(PARSE_STORAGE){
        show_kelengkapan();
    }else{
        kelengkapan_completed();
        $('.btn-lengkapi-data').css('display','none')
    }
    
    


    if(PARSE_STORAGE){
        $('.placeholderanak').css('display','block');
    }

    $('#btn-tambah-anak').on('click', function(){
        if(PARSE_STORAGE) return $.notify('Silahkan lengkapi data terlebih dahulu ', 'info');
        location.hash = '#/addanak';
    });

    $('#show-anak').on('click', '.btn__edit__anak', function() {
        const no_kk_anak = $(this).data('no_kk_anak')
        console.log(no_kk_anak)
        const nama_depan = $(this).data('nama_depan')
        const nama_belakang = $(this).data('nama_belakang')
        const jk = $(this).data('jk')
        const tgl_lahir = $(this).data('tgl_lahir')
        $('#no_kk_anak').val(no_kk_anak)
        $('#nama_depan').val(nama_depan)
        $('#nama_belakang').val(nama_belakang)
        $('#jenis_kelamin').val(jk)
        $('#tgl_lahir').val(tgl_lahir)
        $('#ModalEditAnak').modal('show')
    })

    $('#form-edit-anak').validate({
        rules:{
            no_kk_anak: {
                required: true
            },
            nama_depan:{
                required: true 
            },
            jenis_kelamin: {
                required: true 
            },
            tgl_lahir: {
                required: true 
            }
        },
        messages: {
            no_kk_anak: {
                required: 'No KK Anak Tidak Boleh Kosong'
            },
            nama_depan: {
                required: 'Nama Depan Tidak Boleh Kosong'
            },
            jenis_kelamin: {
                required: 'Jenis Kelamin Harus Di pilih'
            },
            tgl_lahir: {
                required: 'Tanggal Lahir Tidak Boleh Kosong'
            }
        },
        errorPlacement: function(error, element){
            error.css('color','red')
            error.insertAfter(element)
        },
        submitHandler: function(form){
            $.ajax({
                url: BASE_URL+'master/kader/Anak/update',
                method: 'post',
                data: new FormData(form),
                processData: false,
                contentType: false,
                async: false,
                cache: false,
                success: function(data){
                    var parse = JSON.parse(data)
                    if(parse.code === 200){
                        $.notify(parse.msg, 'success')
                        $('#ModalEditAnak').modal('hide')
                        load_anak()
                    }else{
                        $.notify(arse.msg, 'info')
                    }
                }
            })
        }
    })


    




});