<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warga extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->table = 't_warga';
    $this->table_anak = 't_anak';
    $this->load->model('m_warga');
    $this->load->model('m_core');
  }

  function addData()
  {
    $no_kk    = $this->input->post('no_kk');

    $where_kk = array('no_kk' => $no_kk);
    $chek_kk  = $this->m_core->get_where($this->table, $where_kk);

    if($chek_kk->num_rows() > 0){
      echo json_encode(array('msg' => 'No KK sudah ada', 'code' => 401) );
      return;
    }

    $dataWarga = array(
      'no_kk'      => $no_kk,
      'email'      => $this->input->post('email'),
      'nama_ayah'  => $this->input->post('nama_ayah'),
      'nama_ibu'   => $this->input->post('nama_ibu'),
      'password'   => '1234',
      'alamat'     => $this->input->post('alamat'),
      'no_telp'    => $this->input->post('no_telp'),
      'tanggal_terdaftar' => date('Y-m-d')
    );
    $no_kk_anak     = $this->input->post('no_kk_anak');
    $nama_depan  = $this->input->post('nama_depan');
    $nama_blkg   = $this->input->post('nama_blkg');
    $tgl_lahir   = $this->input->post('tgl_lahir');
    $jk          = $this->input->post('jk');

    $insert = $this->m_core->add_data($this->table, $dataWarga);
    if($insert){
      if(count($no_kk_anak) > 0){
        for($count = 0; $count<count($no_kk_anak); $count++)
          {
            $data = array(
              'no_kk_anak'       => $no_kk_anak[$count],
              'no_kk'         => $no_kk,
              'nama_depan'    => $nama_depan[$count],
              'nama_belakang' => $nama_blkg[$count],
              'tgl_lahir'     => $tgl_lahir[$count],
              'jenis_kelamin' => $jk[$count]
            );
             $this->db->insert('t_anak', $data);
          }
         echo json_encode(array('msg' => 'success', 'code' => 200));
      }else{
        echo json_encode(array('msg' => 'success', 'code' => 200));
      }
    }else{
      echo json_encode(array('msg' => 'failed', 'code' => 401) );
    }
  }

  function fetch()
  {
    $output = '';
    $query = '';
    if($this->input->post('query') )
    {
      $query = $this->input->post('query');
    }
    $data = $this->m_warga->fetch_data($query);
    if($data->num_rows() > 0) {
      foreach($data->result() as $row)
      {
        $output .= '
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-top: 10px; animated fadeIn">
                <div class="contact-client-single ct-client-b-mg-30 ct-client-b-mg-30-n shadow-reset">
                    <div class="row">
                        <div class="col-lg-12">
                          <table class="table table-striped" >
                                <tr>
                                  <th>No KK</th>
                                  <td>'.$row->no_kk.'</td>
                                </tr>
                                <tr>
                                  <th>Email</th>
                                  <td>'.$row->email.'</td>
                                </tr>
                                <tr>
                                  <th>Nama Ibu</th>
                                  <td>'.$row->nama_ibu.'</td>
                                </tr>
                                <tr>
                                  <th>Nama Ayah</th>
                                  <td>'.$row->nama_ayah.'</td>
                                </tr>
                                <tr>
                                  <th>Alamat</th>
                                  <td>'.$row->alamat.'</td>
                                </tr>
                                <tr>
                                  <th>Jumlah Anak </th>
                                  <td>'.$row->JUMLAH_ANAK.'</td>
                                </tr>
                                <tr>
                                  <th></th>
                                  <td><a href="#/wargadetail/'.$row->no_kk.' " class="btn btn-custome">Lihat Data</a></td>
                                </tr>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
        ';
      }
    }else{
      $output .= '
            <div class="text-center">
                <img src="'.base_url('assets/img/no_data.svg').'" width="400px;" />
                <p> DATA WARGA TIDAK DI TEMUKAN </p>
            </div>
      ';
    }
    echo $output;
  }

  function delete()
  {
    $where = array('no_kk' => $this->input->post('targetIDWarga'));
    $delete = $this->m_core->delete_rows($this->table, $where);
    if($delete){
      $res = array('msg' => 'Data Warga Berhasil Di Hapus', 'code' => 200);
      echo json_encode($res);
    }else{
      $res = array('msg' => 'Gagal menghapus data warga', 'code' => 400);
      echo json_encode($res);
    }
  }

  function get_detail_warga($id)
  {
    $data = $this->m_core->get_where($this->table, array('no_kk' => $id) );
    if($data->num_rows() > 0){
      echo json_encode($data->result());
    }
  }

  function get_anak($id)
  {
    $data = $this->m_core->get_where($this->table_anak, array('no_kk' => $id) );
    foreach($data->result() as $key){
      $output[] = array(
        'no_kk_anak' => $key->no_kk_anak,
        'no_kk' => $key->no_kk,
        'nama_depan' => $key->nama_depan,
        'nama_belakang' => $key->nama_belakang,
        'jenis_kelamin' => $key->jenis_kelamin,
        'tgl_lahir' => $key->tgl_lahir,
        'umur' => $this->cek_umur($key->tgl_lahir)
      );
    }
    echo json_encode($output);
  }

  function fetch_warga_json()
  {
    $query = '';

    if($this->input->post('query') )
    {
      $query = $this->input->post('query');
    }

    $data = $this->m_warga->fetch_data($query);
    echo json_encode($data->result());

  }

  function update()
  {
    $no_kk = $this->input->post('no_kk');
    $email = $this->input->post('email');
    $nama_ayah = $this->input->post('nama_ayah');
    $nama_ibu = $this->input->post('nama_ibu');
    $password = $this->input->post('password');
    $alamat = $this->input->post('alamat');
    $no_telp = $this->input->post('no_telp');

    $where = array(
      'no_kk' => $no_kk
    );

    $data  = array(
      'email' => $email,
      'nama_ayah' => $nama_ayah,
      'nama_ibu' => $nama_ibu,
      'password' => $password,
      'alamat' => $alamat,
      'no_telp' => $no_telp
    ); 

    $update = $this->m_core->update_table($this->table, $data, $where);
    if($update){
      $res = array(
        'msg' => 'Data Berhasil Di Update',
        'code' => 200
      );
      echo json_encode($res);
    }else{
      $res = array(
        'msg' => 'Data Gagal Di Update',
        'code' => 400
      );
      echo json_encode($res);
    }
    



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


}
