<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_imunisasi extends CI_Model{

    public function show_imunisasi($arr, $umur)
    {
        $implode = implode("','", $arr);
        $query = "SELECT * FROM t_imunisasi WHERE id_imunisasi NOT IN ('".$implode."') AND dari_usia >= $umur ";
        return $this->db->query($query);
    }

    public function get_imunisasi_kunjungan($query)
    {
        $query = "SELECT a.no_cek_imunisasi, a.id_imunisasi, a.umur, a.tgl_cek_imunisasi, a.catatan, a.kode_panitia,
                         b.nama_imunisasi, b.dari_usia, b.sampai_usia,
                         c.no_kunjungan, c.tanggal_kunjungan, c.no_kms AS kms_on_kunjungan,
                         d.no_kms AS kms,
                         e.no_kk_anak, CONCAT(e.nama_depan, ' ', e.nama_belakang) as nama_lengkap
                  FROM t_cek_imunisasi a LEFT JOIN t_imunisasi b ON a.id_imunisasi = b.id_imunisasi
                                         LEFT JOIN t_kunjungan c ON a.no_kunjungan = c.no_kunjungan
                                         LEFT JOIN t_kms d ON c.no_kms = d.no_kms
                                         LEFT JOIN t_anak e ON d.no_kk_anak = e.no_kk_anak
                  WHERE a.tgl_cek_imunisasi LIKE '%$query%' OR e.nama_depan LIKE '%$query%'

                ";
                return $this->db->query($query);
    }

    //get all imunisasi per KMS
    public function get_imunisasi_per_kms($no_kms)
    {
        $query = "SELECT a.no_cek_imunisasi, a.id_imunisasi, a.umur, a.tgl_cek_imunisasi, a.catatan, a.kode_panitia,
                         b.nama_imunisasi, b.dari_usia, b.sampai_usia,
                         c.no_kunjungan, c.tanggal_kunjungan, c.no_kms AS kms_on_kunjungan,
                         d.no_kms AS kms,
                         e.no_kk_anak, CONCAT(e.nama_depan, ' ', e.nama_belakang) as nama_lengkap
                  FROM t_cek_imunisasi a LEFT JOIN t_imunisasi b ON a.id_imunisasi = b.id_imunisasi
                                         LEFT JOIN t_kunjungan c ON a.no_kunjungan = c.no_kunjungan
                                         LEFT JOIN t_kms d ON c.no_kms = d.no_kms
                                         LEFT JOIN t_anak e ON d.no_kk_anak = e.no_kk_anak
                                         WHERE d.no_kms = '$no_kms'
                ";
                return $this->db->query($query);
    }

    public function get_imunisasi($no_kms)
    {
        $query = "SELECT a.id_imunisasi, a.nama_imunisasi, a.dari_usia, a.sampai_usia,
                         b.no_cek_imunisasi, b.no_kunjungan,
                         c.no_kms
                         FROM t_imunisasi a LEFT JOIN t_cek_imunisasi b ON a.id_imunisasi = b.id_imunisasi
                                            LEFT JOIN t_kunjungan c ON b.no_kunjungan = c.no_kunjungan
                                            WHERE c.no_kms = '$no_kms'
                          
                 ";
                 return $this->db->query($query);
    }

    public function get_email($no_kunjungan) {
        $query = "select email from t_warga where no_kk = (select no_kk from t_anak where no_kk_anak = (select no_kk_anak from t_kms where no_kms = (select no_kms from t_kunjungan tk where no_kunjungan = '$no_kunjungan')))";

        return $this->db->query($query);
    }


}
