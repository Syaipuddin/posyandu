<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_warga extends CI_Model{


  function fetch_data($query)
  {
    $query = $this->db->query("SELECT a.nama_ayah, a.nama_ibu, a.email, a.no_kk, a.alamat,COUNT(b.no_kk_anak) AS JUMLAH_ANAK
                               FROM t_warga AS a LEFT JOIN t_anak AS b
                               USING(no_kk)
                               WHERE no_kk LIKE '%$query%'
                                    OR nama_ayah LIKE '%$query%'
                                    OR nama_ibu  LIKE '%$query%'
                                    OR alamat LIKE '%$query%'
                               GROUP BY a.no_kk
                               HAVING JUMLAH_ANAK >= 0
                              ");
    return $query;
  }

  function fetch_anak_warga($query)
  {
    $query = "SELECT * FROM t_anak WHERE nama_depan LIKE '%$query%' OR nama_belakang LIKE '%$query%' OR no_kk LIKE '%$query%'  ";
    return $this->db->query($query);
  }

  function fetch_detail_anak($no_kk_anak)
  {
    $query = "SELECT a.no_kk_anak , a.no_kk, CONCAT(a.nama_depan, ' ', a.nama_belakang) as nama_anak, a.jenis_kelamin as jk, a.tgl_lahir,
                     b.no_kms, b.tanggal_terdaftar, b.berat_badan_lahir as bb_lahir, b.panjang_badan_lahir as pb_lahir
              FROM t_anak a LEFT JOIN t_kms b ON a.no_kk_anak = b.no_kk_anak 
              WHERE a.no_kk_anak = '$no_kk_anak'
             ";
    return $this->db->query($query);
  }

  function fetch_anak_status($no_kk) {
    $query = "WITH ranked_results AS (
              SELECT 
                  d.tanggal_kunjungan, 
                  b.nama_depan, 
                  b.nama_belakang, 
                  e.hasil,
                  ROW_NUMBER() OVER (
                      PARTITION BY b.nama_depan, b.nama_belakang -- Group by each child
                      ORDER BY d.tanggal_kunjungan DESC -- Order by the latest date
                  ) AS rn
              FROM 
                  t_warga a  
                  LEFT JOIN t_anak b ON a.no_kk = b.no_kk 
                  LEFT JOIN t_kms c ON b.no_kk_anak = c.no_kk_anak 
                  LEFT JOIN t_kunjungan d ON c.no_kms = d.no_kms
                  LEFT JOIN t_cek_pertumbuhan e ON e.no_kunjungan = d.no_kunjungan  
              WHERE 
                  a.no_kk = '$no_kk'
          )
          SELECT 
              tanggal_kunjungan, 
              nama_depan, 
              nama_belakang, 
              hasil
          FROM 
              ranked_results
          WHERE 
              rn = 1; -- Only the latest row for each child";
    return $this->db->query($query);
  }

  

}
