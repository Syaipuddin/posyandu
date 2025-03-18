<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TumbuhAnak extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->table        = 't_cek_pertumbuhan';
        $this->primary      = 'no_cek_pertumbuhan';
        $this->load->model('m_kunjungan');
        $this->load->model('m_tumbuh_anak');
        $this->load->model('m_core');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function fetch_list()
    {
        $query = '';
        if($this->input->post('query')){
            $query = $this->input->post('query');
        }
        $data = $this->m_tumbuh_anak->get_data_tumbuh_anak($query);
        echo json_encode($data->result() );
    }

    public function add()
    {
        $no_cek_pertumbuhan = $this->generateAutoNumber();

        $no_kunjungan       = $this->input->post('no_kunjungan');

        $email              = $this->m_kunjungan->get_email($no_kunjungan);
        foreach($email->result() as $row){
            $email = $row->email;
        }

        $data = array(
            'no_cek_pertumbuhan' => $no_cek_pertumbuhan,
            'no_kunjungan'       => $no_kunjungan,
            'umur'               => $this->input->post('umur'),
            'tb'                 => $this->input->post('panjang_badan'),
            'bb'                 => $this->input->post('berat_badan'),
            'tgl_cek_pertumbuhan' => date('Y-m-d'),
            'hasil'              => $this->input->post('status_gizi'),
            'catatan'            => $this->input->post('catatan'),
            'kode_panitia'       => $this->session->userdata('kode_panitia')
        );

        //cek if no kunjungan already exist 
        $check_kunjungan = $this->m_core->get_where($this->table, array('no_kunjungan' => $no_kunjungan) );
        if($check_kunjungan->num_rows() === 1) {
            $res = array(
                'msg' => 'Data Kunjungan Sudah Ada',
                'code' => 400
            );
            echo json_encode($res);
            return;
        }


        $insert = $this->m_core->add_data($this->table, $data);

        if($insert){
            $res = array(
                'msg' => 'Data Pertumbuhan Anak Berhasil di Simpan',
                'code' => 200,
                'no_kunjungan' => $no_kunjungan
            );

            // prosess kirim email
            $config = [
                'protocol'  => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_port' => 587,
                'smtp_user' => 'muda3332@gmail.com',   
                'smtp_pass' => 'nzcx raaz qqza mqzl',           
                'charset'   => 'utf-8',
                'mailtype'  => 'html',
                'newline'   => "\r\n",
                'wordwrap' => TRUE,
                    'smtp_crypto' => 'tls'
            ];

            $this->load->library('email', $config);
            $this->email->initialize($config);
            $this->email->to($email);
            $this->email->from('muda3332@gmail.com','Posyandu | Pamujirahayu');
            $this->email->subject('Hasil Pengukuran Pertumbuhan Anak');
            $this->email->message('Hasil pengukuran pertumbuhan anak anda telah keluar');
            $this->email->send();
           
            echo json_encode($res);
        }else{
            $res = array(
                'msg' => 'Data Pertumbuhan Gagal Di simpan',
                'code' => 400
            );
            echo json_encode($res);
        }

    }

   


    function ListKunjunganOnCheckout()
    {
        $query = '';
        if($this->input->post('query') ){
            $query = $this->input->post('query');
        }
    
        $data = $this->m_kunjungan->ListKunjunganOnCheckout($query);
        foreach($data->result() as $row){
            $json[] = array(
                'no_kunjungan' => $row->no_kunjungan,
                'no_antri' => $row->no_antri,
                'status' => $row->status,
                'no_kms' => $row->no_kms,
                'no_kk_anak' => $row->no_kk_anak,
                'bb_lahir' => $row->bb_lahir,
                'no_kk' => $row->no_kk,
                'nama_lengkap' => $row->nama_lengkap,
                'jk' => $row->jk,
                'tgl_lahir' => $row->tgl_lahir,
                'umur' => $this->cek_umur($row->tgl_lahir)
            );
        }
        echo json_encode($json);

        
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

    public function generateAutoNumber()
    {
        $data   = $this->m_core->getMaxNumber($this->table, $this->primary);
        $kode   = $data->result()[0]->maxKode;
        $nourut = (int) substr($kode, 4, 4);
        $nourut++;

        $char   = 'CEK_';
        $newID  = $char. sprintf('%04s', $nourut);
        return $newID;
    }


}
