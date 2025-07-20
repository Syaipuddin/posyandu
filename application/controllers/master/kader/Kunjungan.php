<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kunjungan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->table        = 't_kunjungan';
    $this->primary      = 'no_kunjungan';
    $this->foreignKEY_1 = 'id_kegiatan';
    $this->foreignKEY_2 = 'no_kms';
    $this->load->model('m_core');
    $this->load->model('m_kunjungan');
    $this->load->model('m_kms');
    date_default_timezone_set('Asia/Jakarta');
  }

  public function fetch_list_kms()
  {
      $query = '';
      if($this->input->post('query') ){
        $query = $this->input->post('query');
      }

      $data = $this->m_kms->fetch_kms($query);
      echo json_encode($data->result());
  }

  public function fetch_jadwal_kegiatan()
  {
      $data = $this->m_kunjungan->fetch_jadwal_kegiatan();
      echo json_encode($data->result() );
  }

  public function addAntrian()
  {
    $targetID    = $this->input->post('targetID');
    $no_kegiatan = $this->input->post('no_kegiatan');

    $where_antri = array(
      'id_kegiatan' => $no_kegiatan
    );

    $check_nokms = $this->m_core->get_where($this->table, array(
                                              $this->foreignKEY_2 => $targetID,
                                              $this->foreignKEY_1 => $no_kegiatan
                                            ));

    if($check_nokms->num_rows() > 0) {
      $res = array('msg' => 'No. '.$targetID.' Sudah Dalam Antrian ', 'code' => 400  );
      echo json_encode($res);
      return;
    }

    $data_insert = array(
      'no_kunjungan' => $this->generateAutoNumber(),
      'no_kms' => $targetID,
      'id_kegiatan' => $no_kegiatan,
      'no_antri' => $this->no_antri(),
      'tanggal_kunjungan' => date('Y-m-d'),
      'status' => 'proses'
    );

    $insertAntri = $this->m_core->add_data($this->table, $data_insert);
    if($insertAntri){
      $res = array('msg' => 'Berhasil Menambahkan Ke Antrian ', 'code' => 200 );
      echo json_encode($res);
    }else{
      $res = array('msg' => 'Gagal Menambahkan Ke Antrian', 'code' => 400 );
      echo json_encode($res);
    }
  }

  public function fetch_antrian($id_kegiatan)
  {
    $data = $this->m_kunjungan->fetch_antrian_kunjungan($id_kegiatan);
    echo json_encode($data->result() );
  }

  public function fetch_no_urut_current($id)
  {
    $data = $this->m_kunjungan->fetch_no_urut_current($id);
    echo json_encode($data->result() );
  }

  public function fetch_monitor_antri($id)
  {
    $data = $this->m_kunjungan->fetch_monitor_antri($id);
    echo json_encode($data->result() );
  }

  public function chart_antrian($id)
  {
    $data = $this->m_kunjungan->chart_antrian($id);
    echo json_encode($data->result() );
  }

  public function get_total_status($status, $id_kegiatan)
  {
    $where = array('status' => $status, 'id_kegiatan' => $id_kegiatan);
    $data = $this->m_core->get_where($this->table, $where);
    echo json_encode($data->num_rows());
  }

  public function get_total_kunjungan($id_kegiatan)
  {
    $data = $this->m_kunjungan->fetch_antrian_kunjungan($id_kegiatan);
    echo json_encode($data->num_rows() );
  }

  public function action_next_antrian()
  {
    //antri to proses 
    $where = array(
      'no_kunjungan' => $this->input->post('no_kunjungan')
    );
    $data = array(
      'status' => 'proses'
    );
    $update = $this->m_core->update_table($this->table, $data, $where);
    if($update){
      $res = array(
        'msg' => 'Antrian Selanjutnya',
        'code' => 200
      );
      echo json_encode($res);
    }else{
      $res = array(
        'msg' => 'Terjadi Kesalahan',
        'code' => 400
      );
      echo json_encode($res);
    }
    
  }

  public function action_skip_antrian()
  {
    //antri to terlewat 
    $where = array(
      'no_kunjungan' => $this->input->post('no_kunjungan')
    );
    $data = array(
      'status' => 'terlewat'
    );
    $update = $this->m_core->update_table($this->table, $data, $where);
    if($update){
      $res = array(
        'msg' => 'Antrian Selanjutnya',
        'code' => 200
      );
      echo json_encode($res);
    }else{
      $res = array(
        'msg' => 'Terjadi Kesalahan',
        'code' => 400
      );
      echo json_encode($res);
    }
    
  }

  function update_status_selesai()
  {
      $where = array(
          'no_kunjungan' => $this->input->post('id_target')
      );
      $data = array(
          'status' => 'selesai'
      );
      $update = $this->m_core->update_table($this->table, $data, $where);
      if($update){
        $res = array(
          'code' => 200
        );
        echo json_encode($res);
      }else{
        $res = array(
          'code' => 400
        );
        echo json_encode($res);
      }
  }


  function daftar_kunjungan($id_kegiatan)
  {
    //list per jadwal kegiatan 

    $data_kegiatan  = $this->m_core->get_where('t_jadwal_kegiatan', array('no_kegiatan' => $id_kegiatan) );

    $data_kunjungan = $this->m_kunjungan->daftar_kunjungan($id_kegiatan);

    $output = json_encode(array(
      'jadwal_kegiatan' => $data_kegiatan->result(),
      'data_kunjungan' => $data_kunjungan->result(),
      'jumlah_kunjungan' => $data_kunjungan->num_rows()
    ));

    echo $output;
    

  }

  function print_daftar_kunjungan($id_kegiatan=0) {
    //list per jadwal kegiatan 

    if (!$id_kegiatan) $id_kegiatan = $this->input->get('id_kegiatan');
    $data_kegiatan  = $this->m_core->get_where('t_jadwal_kegiatan', array('no_kegiatan' => $id_kegiatan) );

    $data_kunjungan = $this->m_kunjungan->daftar_kunjungan($id_kegiatan);

    require_once FCPATH . 'vendor/autoload.php'; // Adjust the path as needed

      // Create a new PhpSpreadsheet object
      $spreadsheet = new Spreadsheet();

      // Set active sheet
      $spreadsheet->setActiveSheetIndex(0);
      $sheet = $spreadsheet->getActiveSheet();
     // Add data to the spreadsheet
     $sheet->setCellValue('A1', 'No Kunjungan');
     $sheet->setCellValue('B1', 'No Antri');
     $sheet->setCellValue('C1', 'Tanggal Kunjungan');
     $sheet->setCellValue('D1', 'No KMS');
     $sheet->setCellValue('E1', 'Status');
     $sheet->setCellValue('F1', 'Nomor Induk Anak');
     $sheet->setCellValue('G1', 'Nama Lengkap');
     $sheet->setCellValue('H1', 'Jenis Kelamin');
     $sheet->setCellValue('I1', 'No KK');
     $sheet->setCellValue('J1', 'Nama Ibu'); 

    if($data_kunjungan->num_rows() > 0)
        {
          $index = 2;
            foreach($data_kunjungan->result() as $r)
            {
              $sheet->setCellValue('A'.$index , $r->no_kunjungan);
              $sheet->setCellValue('B'.$index , $r->no_antri);
              $sheet->setCellValue('C'.$index , $r->tanggal_kunjungan);
              $sheet->setCellValue('D'.$index , $r->no_kms);
              $sheet->setCellValue('E'.$index , $r->status);
              $sheet->setCellValue('F'.$index , $r->no_kk_anak);
              $sheet->setCellValue('G'.$index , $r->nama_lengkap);
              $sheet->setCellValue('H'.$index , $r->jk);
              $sheet->setCellValue('I'.$index , $r->no_kk);
              $sheet->setCellValue('J'.$index , $r->nama_ibu); 

              $index++;
            }
        }

     // Save the spreadsheet
        $writer = new Xlsx($spreadsheet);

        if ($data_kegiatan->num_rows() > 0) {
          $row = $data_kegiatan->row(); // Fetch the first row as an object
          $filename = $row->tanggal_kegiatan .'-'. $row->nama_kegiatan . '.xlsx';
      } else {
          // Handle the case where no data is found
          $filename = 'file.xlsx';
      }
      $filePath = FCPATH . 'uploads/' . $filename;
      $writer->save($filePath); // Save directly to uploads directory

        echo json_encode(['file_path' => base_url('uploads/' . $filename)]);
  }


  public function generateAutoNumber()
  {
    $data = $this->m_core->getMaxNumber($this->table, $this->primary);
    $kode = $data->result()[0]->maxKode;
    $nourut = (int) substr($kode, 4, 4);
    $nourut++;


    $char = 'KJG_';
    $newID = $char. sprintf('%04s', $nourut);
    return $newID;
  }

  public function no_antri()
  {
    $data = $this->m_core->getMaxNumber($this->table, 'no_antri');
    $kode = $data->result()[0]->maxKode;
    $kode++;
    // $nourut = (int) substr($kode, 1, 1);
    // $nourut++;

    return $kode;
  }


  

}