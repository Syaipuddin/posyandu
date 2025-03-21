const urlDetailAnak = (() => {
    const urlString = {
        fetch_detail_anak: BASE_URL+`master/warga/Anak/detail_anak/${PARAMS}`
    }
    return {
        getURL: () => urlString
    }
})();


const detailAnakInterface = (() => {
    const domString = {
        html: {
            NoKKAnak: '#show__no__kk__anak',
            showName: '#show__nama__anak',
            showJK: '#show__jk',
            showUmur: '#show__umur',
            showKMS: '#show__kms',
            showTglTerdaftar: '#show__tgl__terdaftar',
            showPB: '#show__pb',
            showBB: '#show__bb',
            showKunjungan: '#show__kunjungan',
            showImunisasi: '#show__list__imunisasi',
            showPertumbuhan: '#show__list__pertumbuhan'
        }
    }

    const renderDetail = object => {
        $(domString.html.NoKKAnak).html(object.no_kk_anak)
        $(domString.html.showName).html(object.nama_anak)
        $(domString.html.showJK).html(object.jk)
        $(domString.html.showUmur).html(object.umur)
        $(domString.html.showKMS).html(object.kms.no_kms)
        $(domString.html.showTglTerdaftar).html(object.kms.tgl_terdaftar)
        $(domString.html.showPB).html(object.kms.pb_lahir)
        $(domString.html.showBB).html(object.kms.bb_lahir)
    }

    const renderKunjungan = object => {
        let html = ''
        if(object.length > 0){
            object.forEach(item => {
                html += `
                    <tr> 
                        <td> ${item.no_kunjungan} </td>
                        <td> ${item.no_antri} </td>
                        <td> ${item.status} </td>
                        <td> ${item.imunisasi.no_cek_imunisasi} </td>
                        <td> ${item.imunisasi.nama_imunisasi} </td>
                        <td> ${item.perkembangan.no_cek_pertumbuhan} </td>
                        <td> ${item.perkembangan.bb} </td>
                        <td> ${item.perkembangan.pb} </td>
                        <td> ${item.perkembangan.hasil} </td>
                    </tr>
                `;
            })
        }
        $(domString.html.showKunjungan).html(html)
    } 

    const renderImunisasi = object => {
        let html = ''
        if(object.length > 0){
            object.forEach(item => {
                html += `
                    <tr> 
                        <td> ${item.no_cek_imunisasi} </td>
                        <td> ${item.nama_imunisasi} </td>
                        <td> ${item.umur_cek_imunisasi} </td>
                        <td> ${item.tgl_cek_imunisasi} </td>
                        <td> ${item.catatan_imunisasi} </td>
                    </tr>
                `
            })
        }
        $(domString.html.showImunisasi).html(html)
    }

    const renderPertumbuhan = object => {
        let html = ''
        if(object.length > 0){
            object.forEach(item => {
                html += `
                    <tr class='pertumbuhan-anak'>
                        <td> ${item.no_cek_pertumbuhan} </td>
                        <td> ${item.umur_cek_pertumbuhan} </td>
                        <td class='pb'> ${item.tb} </td>
                        <td> ${item.bb} </td>
                        <td> ${item.hasil} </td>
                        <td> ${item.catatan_pertumbuhan} </td>
                    </tr>
                `
            })
        }

        $(domString.html.showPertumbuhan).html(html)
    }


    return {
        getDOM: () => domString,
        getDetail: data => {
            renderDetail(data.detail_anak)
            renderKunjungan(data.kunjungan)
            renderImunisasi(data.imunisasi)
            renderPertumbuhan(data.pertumbuhan)
        }
    }
})()

const detailAnakController = ( (URL, UI) => {
    const url = URL.getURL()
    const ui  = UI.getDOM()

    const eventListener = function(){

    }


    const load_detail_anak = () => getResource(url.fetch_detail_anak, undefined, data => UI.getDetail(data) );

    const getResource = (url, query, callback) => {
        $.ajax({
            url,
            method: 'post',
            data: {query: query},
            dataType: 'json',
            success: function(data){
                callback(data)
            }
        })
    }

    return {
        init: () => {
            console.log('initlize app')
            eventListener()
            load_detail_anak()
        }
    }

})(urlDetailAnak, detailAnakInterface)

$(document).ready( () => {
    detailAnakController.init()
})