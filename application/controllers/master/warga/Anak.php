<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anak extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->table = 't_anak';
        $this->foreignKey = $this->session->userdata('no_kk');
        $this->load->model('m_core');
        $this->load->model('m_kms');
        $this->load->model('m_warga');
        $this->load->model('m_kunjungan');
        $this->load->model('m_tumbuh_anak');
    }

    function add()
    {
        $no_kk_anak       = $this->input->post('no_kk_anak');
        $nama_depan    = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_blkg');
        $tgl_lahir     = $this->input->post('tgl_lahir');
        $jk            = $this->input->post('jk');

        for($count = 0; $count < count($no_kk_anak); $count++ )
        {
            $data = array(
                'no_kk_anak' => $no_kk_anak[$count],
                'no_kk'   => $this->foreignKey,
                'nama_depan' => $nama_depan[$count],
                'nama_belakang' => $nama_belakang[$count],
                'tgl_lahir' => $tgl_lahir[$count],
                'jenis_kelamin' => $jk[$count]
            );
            $insert =  $this->m_core->add_data($this->table, $data);
        }
        if($insert){
            $res = array('msg' => 'Berhasil Menambahkan Data Anak', 'code' => 200);
            echo json_encode($res);
        }else{
            $res = array('msg' => 'Gagal Menambahkan Anak','code' => 400);
            echo json_encode($res);
        }
    }

    function fetch()
    {
        $where = array(
            'no_kk' => $this->foreignKey
        );
        $data = $this->m_core->get_where($this->table, $where);
        echo json_encode($data->result());
    }

    function fetch_jadwal()
    {
        $data = $this->m_core->get_order('t_jadwal_kegiatan', 'tanggal_kegiatan','asc');
        echo json_encode($data->result());
    }

    function get_anak()
    {
        $data = $this->m_kms->fetch_anakwarga_with_kms($this->session->userdata('no_kk'));
        echo json_encode($data->result() );
    }

    

    function detail_anak($no_kk_anak=0)
    {
        if (!$no_kk_anak) $no_kk_anak = $this->input->get('no_kk_anak');
        $data  = $this->m_warga->fetch_detail_anak($no_kk_anak);
        $nokms = NULL;
        $imunisasi = [];
        $perkembangan = [];
        $datakunjungan = [];
        if($data->num_rows() > 0)
        {
            foreach($data->result() as $r)
            {
                if($r->no_kms != null){
                   $nokms .= $r->no_kms;
                }
                $detailanak = array(
                    'no_kk_anak'   => $r->no_kk_anak,
                    'nama_anak' => $r->nama_anak,
                    'no_kk'     => $r->no_kk,
                    'jk'        => $r->jk,
                    'tgl_lahir' => $r->tgl_lahir,
                    'umur'      => $this->cek_umur($r->tgl_lahir),
                    'kms' => array(
                        'no_kms' => $r->no_kms === NULL ? 'No. KMS Belum Terdaftar' : $r->no_kms ,
                        'tgl_terdaftar' => $r->tanggal_terdaftar === NULL ? '-' : $r->tanggal_terdaftar ,
                        'pb_lahir' => $r->pb_lahir === NULL ? '-' : $r->pb_lahir ,
                        'bb_lahir' => $r->bb_lahir === NULL ? '-' : $r->bb_lahir
                    )
                );
            }
        }else{
            $detailanak[] = array(
                'msg' => 'Data Anak Tidak Tersedia',
                'code' => 400
            );
        }

        if($nokms !== NULL){
            $source_kunjungan = $this->m_kunjungan->get_kunjungan($nokms);
            if($source_kunjungan->num_rows() > 0)
            {
                foreach($source_kunjungan->result() as $kjg)
                {
                    $dataimunisasi = array(
                            'no_cek_imunisasi'    => $kjg->no_cek_imunisasi ? $kjg->no_cek_imunisasi : '-'  ,
                            'id_imunisasi'        => $kjg->id_imunisasi ? $kjg->id_imunisasi : '-',
                            'nama_imunisasi'      => $kjg->nama_imunisasi ? $kjg->nama_imunisasi : '-',
                            'umur_cek_imunisasi'  => $kjg->umur_cek_imunisasi ? $kjg->umur_cek_imunisasi : '-',
                            'tgl_cek_imunisasi'   => $kjg->tgl_cek_imunisasi ? $kjg->tgl_cek_imunisasi : '-',
                            'catatan_imunisasi'   => $kjg->catatan_imunisasi ? $kjg->catatan_imunisasi : '-',
                    );
                    $dataperkembangan = array(
                        'no_cek_pertumbuhan'  => $kjg->no_cek_pertumbuhan ? $kjg->no_cek_pertumbuhan : '-',
                        'umur_cek_pertumbuhan'=> $kjg->umur_cek_pertumbuhan ?  $kjg->umur_cek_pertumbuhan : '-',
                        'tb' => $kjg->tb ? $kjg->tb : '-',
                        'bb' => $kjg->bb ? $kjg->bb : '-',
                        'hasil' => $kjg->hasil ? $kjg->hasil : '-',
                        'catatan_pertumbuhan' => $kjg->catatan_pertumbuhan ? $kjg->catatan_pertumbuhan : '-'
                    );
                    array_push($imunisasi, $dataimunisasi);
                    array_push($perkembangan, $dataperkembangan);
                    array_push($datakunjungan,  array(
                        'no_kunjungan' => $kjg->no_kunjungan,
                        'no_antri' => $kjg->no_antri,
                        'status'   => $kjg->status,
                        'imunisasi' => array(
                            'no_cek_imunisasi'    => $kjg->no_cek_imunisasi ? $kjg->no_cek_imunisasi : '-',
                            'id_imunisasi'        => $kjg->id_imunisasi ? $kjg->id_imunisasi : '-',
                            'nama_imunisasi'      => $kjg->nama_imunisasi ? $kjg->nama_imunisasi : '-',
                            'umur_cek_imunisasi'  => $kjg->umur_cek_imunisasi ? $kjg->umur_cek_imunisasi : '-',
                            'tgl_cek_imunisasi'   => $kjg->tgl_cek_imunisasi ? $kjg->tgl_cek_imunisasi : '-',
                            'catatan_imunisasi'   => $kjg->catatan_imunisasi ? $kjg->catatan_imunisasi : '-',
                        ),
                        'perkembangan' => array(
                            'no_cek_pertumbuhan'  => $kjg->no_cek_pertumbuhan ? $kjg->no_cek_pertumbuhan : '-',
                            'umur_cek_pertumbuhan'=> $kjg->umur_cek_pertumbuhan ? $kjg->umur_cek_pertumbuhan : '-',
                            'pb' => $kjg->tb ? $kjg->tb : '-',
                            'bb' => $kjg->bb ? $kjg->bb : '-',
                            'hasil' => $kjg->hasil ? $kjg->hasil : '-',
                            'catatan_pertumbuhan' => $kjg->catatan_pertumbuhan ? $kjg->catatan_pertumbuhan : '-'
                        )
                    ));
                }
            }
            
        }

        $outputJSON = json_encode(array(
            'detail_anak' => $detailanak,
            'kunjungan'   => $datakunjungan,
            'imunisasi'   => $imunisasi,
            'pertumbuhan' => $perkembangan
        ));


        echo $outputJSON;

        
    }

    function cek_umur($tgl_lahir)
    {
        $d1= new DateTime(date('Y-m-d'));
        $d2= new DateTime(date($tgl_lahir));
        $interval_kpi = $d1->diff($d2);
        $sprint='';
        if($interval_kpi->y != 0){
            $sprint .=$interval_kpi->y .' Tahun ';
        }
        if($interval_kpi->m != 0){
            $sprint .=$interval_kpi->m .' Bulan ';
        }
        if($interval_kpi->d != 0){
            $sprint .=$interval_kpi->d .' Hari ';
        }
        if($interval_kpi->h != 0){
            $sprint .=$interval_kpi->h .' Jam ';
        }
        if($interval_kpi->i != 0){
            $sprint .=$interval_kpi->i .' Menit ';
        }
        if($interval_kpi->s != 0){
            $sprint .=$interval_kpi->s .' Detik ';
        }             
        return $sprint;
    }

    function get_anak_status($no_kk=0)
    {
        if (!$no_kk) $no_kk = $this->foreignKey;
        $data  = $this->m_warga->fetch_anak_status($no_kk);
        $status = array(
            'kurus' => 0,
            'normal' => 0,
            'gemuk' => 0
        );
        if($data->num_rows() > 0)
        {
            foreach($data->result() as $r)
            {
                switch($r->hasil){
                    case 'Kurus':
                        $status['kurus'] += 1;
                        break;
                    case 'Normal':
                        $status['normal'] += 1;
                        break;
                    case 'Gemuk':
                        $status['gemuk'] += 1;
                        break;
                }
            }
        }
        echo json_encode($status);
    }

    function get_detail_anak() {
        $no_kk_anak = $this->input->get('no_kk_anak');
        $data = $this->m_warga->fetch_detail_anak($no_kk_anak);
        $umur = 0;
        $jk = '';
        foreach($data->result() as $r) {
            $d1= new DateTime(date('Y-m-d'));
            $d2= new DateTime(date($r->tgl_lahir));
            $interval_kpi = $d1->diff($d2);
            $umur = $interval_kpi->m;
            $jk = $r->jk;
            
            if($interval_kpi->y != 0){
                $umur = $interval_kpi->y * 12;
            }
        }

        echo json_encode(['umur' => $umur, 'jk' => $jk]);
    }


    function get_detail_anak_chart() {
        $no_kk_anak = $this->input->get('no_kk_anak');
        $data = $this->m_tumbuh_anak->get_data_tumbuh_anak_chart($no_kk_anak);
        $kunjungan = array();
        $tb = array();
        $bb = array();
        foreach($data->result() as $r) {
            $kunjungan[] = $r->no_kunjungan;
            $tb[] = $r->tb;
            $bb[] = $r->bb;
        }

        echo json_encode(['kunjungan'=>$kunjungan, 'tb'=>$tb, 'bb'=>$bb]);
    }


}