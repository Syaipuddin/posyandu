<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->table = 't_warga';
    $this->load->model('m_core');
  }

  function registrasi()
  { 
      $email = $this->input->post('email');
      $no_kk = $this->input->post('no_kk');
      $codeVerifikasi = rand(0,1000);

      $data = array(
        'no_kk' => $no_kk,
        'email' => $email,
        'password' => $this->input->post('password')
      );

      //Todo 
      // cek email apakah sudah ada ?
      $checkemail = $this->m_core->get_where($this->table, array('email' => $email) );
      if($checkemail->num_rows() > 0) {
          $res = array('msg' => 'Maaf Email sudah di gunakan', 'code' => 400);
          echo json_encode($res);
          return;
      }

      // cek KK
      $checkKK = $this->m_core->get_where($this->table, array('no_kk' => $no_kk) ); 
      if($checkKK->num_rows() > 0){
        $res = array('msg' => 'Maaf KK sudah di gunakan', 'code' => 400);
        echo json_encode($res);
        return;
      }
    
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
        $this->email->subject('Kode Konfirmasi');
        $this->email->message('Silahkan Konfirmasi code ini - '.$codeVerifikasi);

      if($this->email->send())
      {
        $res = array(
            'msg' => 'Kode Verifikasi Berhasil Di kirim, silahkan cek inbox email anda',
            'code' => 200,
            'verifikasiCode' => $codeVerifikasi,
            'data' => $data,
            'newacc' => 1
        );
        echo json_encode($res);
        // echo $this->email->print_debugger();
      }else{
        $res = array(
            'msg' => 'Terjadi Masalah',
            'code' => 400
        );
        echo json_encode($res);
      }
  }

  function simpanWarga()
  {
      $data = array(
        'no_kk' => $this->input->post('no_kk'),
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password'),
        'tanggal_terdaftar' => date('Y-m-d')
      );

      $insert = $this->m_core->add_data($this->table, $data);
      if($insert){
          $res = array('msg' => 'Verifikasi Success, Silahkan login dengan email dan password anda' , 'code' => 200);
          echo json_encode($res);
      }else{
          $res = array('msg' => 'Verifikasi Gagal, Silahkan cek kembali kode verfikasi yang dikirim', 'code' => 400);
          echo json_encode($res);
      }
  }

  function login()
  {
      $data = array(
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password')
      );
      $checkaccount = $this->m_core->get_where($this->table, $data);
      if($checkaccount->num_rows() > 0)
      {
          foreach($checkaccount->result() as $acc)
          {
              $data_session = array(
                'email' => $acc->email,
                'no_kk' => $acc->no_kk,
                'login' => 1
              );
              $res = array('msg' => 'login berhasil', 'code' => 200);
              echo json_encode($res);
          }
          $this->session->set_userdata($data_session);
      }else{
        $res = array('msg' => 'Cek Kembali Email dan Password anda', 'code' => 400);
        echo json_encode($res);
      }
  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url());
  }

  function updateprofile()
  {
    $data = array(
      'email' => $this->input->post('email'),
      'nama_ayah' => $this->input->post('nama_ayah'),
      'nama_ibu' => $this->input->post('nama_ibu'),
      'alamat' => $this->input->post('alamat'),
      'no_telp' => $this->input->post('no_telp'),
      'tanggal_terdaftar' => date('Y-m-d')
    );

    $where = array(
      'no_kk' => $this->input->post('no_kk')
    );

    $update = $this->m_core->update_table($this->table, $data, $where);
    if($update){
      $res = array('msg' => 'Terimakasih telah melengkapi data anda, anda sudah bisa menambahkan anak', 'code' => 200);
      echo json_encode($res);
    }else{
      $res = array('msg' => 'Gagal Melengkapi data','code' => 400);
      echo json_encode($res);
    }


  }


}