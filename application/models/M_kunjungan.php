<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kunjungan extends CI_Model{


    public function fetch_list_kms()
    {
        $query = "SELECT a.no_antri, a.tanggal_kunjungan, a.status , 
                         b.no_kk_anak, b.berat_badan_lahir as bb_lahir, b.panjang_badan_lahir as pb_lahir,
                         c.nama_depan , c.nama_belakang , c.jenis_kelamin, c.no_kk
                  FROM t_kunjungan a RIGHT JOIN t_kms b ON a.no_kms = b.no_kms 
                                     RIGHT JOIN t_anak c ON b.no_kk_anak = c.no_kk_anak 
                  WHERE a.no_antri IS NULL";
        return $this->db->query($query);
    }

    public function fetch_jadwal_kegiatan()
    {
        $query = "SELECT * FROM t_jadwal_kegiatan WHERE DATE(tanggal_kegiatan) =  CURDATE() ";
        return $this->db->query($query);
    }

    public function fetch_antrian_kunjungan($id_kegiatan)
    {
        $query = "SELECT a.no_kunjungan , a.tanggal_kunjungan, a.status, a.no_antri , a.no_kms,
                         b.no_kk_anak, b.berat_badan_lahir as bb_lahir , b.panjang_badan_lahir as pb_lahir,
                         c.no_kk, CONCAT(c.nama_depan, ' ', c.nama_belakang) as nama_lengkap, c.jenis_kelamin as jk 
                         FROM t_kunjungan a 
                         LEFT JOIN t_kms b ON a.no_kms = b.no_kms 
                         LEFT JOIN t_anak c ON b.no_kk_anak = c.no_kk_anak
                         WHERE a.id_kegiatan = '$id_kegiatan'
                         ORDER BY a.no_antri ASC
        ";
        return $this->db->query($query);
    }

    public function fetch_no_urut_current($id_kegiatan)
    {
        $query = "SELECT no_antri FROM t_kunjungan WHERE id_kegiatan = '$id_kegiatan' AND status = 'antri' ORDER BY no_antri ASC LIMIT 1    ";
        return $this->db->query($query);
    }

    public function fetch_monitor_antri($id_kegiatan)
    {
        $query = "SELECT a.no_kunjungan , a.tanggal_kunjungan, a.status, a.no_antri , a.no_kms,
                    b.no_kk_anak, b.berat_badan_lahir as bb_lahir , b.panjang_badan_lahir as pb_lahir,
                    c.no_kk, CONCAT(c.nama_depan, ' ', c.nama_belakang) as nama_lengkap, c.jenis_kelamin as jk 
                    FROM t_kunjungan a 
                    LEFT JOIN t_kms b ON a.no_kms = b.no_kms 
                    LEFT JOIN t_anak c ON b.no_kk_anak = c.no_kk_anak
                    WHERE a.id_kegiatan = '$id_kegiatan'
                    AND a.status = 'antri'
                    ORDER BY a.no_antri ASC
                    LIMIT 1
                ";
        return $this->db->query($query);
    }

    public function chart_antrian($id_kegiatan)
    {
        $query = "SELECT SUM(status = 'antri') as totalantri, SUM(status = 'proses') as totalproses, SUM(status = 'terlewat') as totalterlewat, SUM(status = 'selesai') as totalselesai FROM t_kunjungan WHERE id_kegiatan = '$id_kegiatan' ";
        return $this->db->query($query);
    }

    public function ListKunjunganOnCheckout()
    {
        $query = "SELECT a.no_kunjungan , a.no_antri, a.status, a.no_kms, a.id_kegiatan,
                         b.no_kk_anak, b.berat_badan_lahir as bb_lahir , b.panjang_badan_lahir as pb_lahir,
                         c.no_kk, CONCAT(c.nama_depan, ' ', c.nama_belakang) as nama_lengkap, c.jenis_kelamin as jk , c.tgl_lahir,
                         d.no_kegiatan, d.nama_kegiatan
                  FROM t_kunjungan a 
                       LEFT JOIN t_kms b ON a.no_kms = b.no_kms
                       LEFT JOIN t_anak c ON b.no_kk_anak = c.no_kk_anak
                       LEFT JOIN t_jadwal_kegiatan d ON a.id_kegiatan = d.no_kegiatan
                   WHERE a.status != 'antri' AND a.status != 'selesai'
                   AND DATE(d.tanggal_kegiatan) = CURDATE()
         ";
         return $this->db->query($query);
    }

    public function get_total_kunjungan_today()
    {
        $query = "SELECT * FROM t_kunjungan WHERE DATE(tanggal_kunjungan) = CURDATE()";
        return $this->db->query($query);
    }

    public function get_antrian_warga($no_kk)
    {
        $query = "SELECT a.no_kunjungan, a.id_kegiatan, a.no_antri, a.tanggal_kunjungan,a.status,
                         b.no_kms, b.tanggal_terdaftar, b.berat_badan_lahir as bb_lahir , b.panjang_badan_lahir as pb_lahir,
                         c.no_kk_anak, c.no_kk, CONCAT(c.nama_depan ,' ', c.nama_belakang) as nama_lengkap, c.jenis_kelamin as jk, c.tgl_lahir
                  FROM t_kunjungan a LEFT JOIN t_kms b ON a.no_kms = b.no_kms 
                                     LEFT JOIN t_anak c ON b.no_kk_anak = c.no_kk_anak
                                     WHERE c.no_kk = '$no_kk' AND DATE(a.tanggal_kunjungan) = CURDATE()
                    
                 ";
        return $this->db->query($query);
    }

    public function get_kunjungan($no_kms)
    {
        // $implode = implode("','", $arrayKunjungan);

        $query = "SELECT a.no_kunjungan, a.no_antri, a.status,
                         b.no_cek_imunisasi, b.id_imunisasi, b.umur as umur_cek_imunisasi , b.tgl_cek_imunisasi, b.catatan as catatan_imunisasi,
                         c.no_cek_pertumbuhan, c.umur as umur_cek_pertumbuhan, c.tb, c.bb, c.hasil, c.catatan as catatan_pertumbuhan,
                         d.nama_imunisasi
                  FROM t_kunjungan a
                        LEFT JOIN t_cek_imunisasi b ON a.no_kunjungan = b.no_kunjungan
                        LEFT JOIN t_cek_pertumbuhan c ON a.no_kunjungan = c.no_kunjungan 
                        LEFT JOIN t_imunisasi d ON b.id_imunisasi = d.id_imunisasi
                  WHERE a.no_kms = '$no_kms'
                 ";
        return $this->db->query($query);
    }

    public function daftar_kunjungan($id_jadwal_kegiatan)
    {
        /**
         * per jadwal kegiatan 
         */
        $query = "SELECT a.no_kunjungan, a.no_antri, a.tanggal_kunjungan, a.no_kms, a.status,
                         b.no_kms, b.no_kk_anak, b.tanggal_terdaftar,
                         c.no_kk_anak, CONCAT(c.nama_depan, ' ', c.nama_belakang) as nama_lengkap, c.jenis_kelamin as jk,
                         d.no_kk, d.nama_ibu
                  FROM t_kunjungan a LEFT JOIN t_kms b ON a.no_kms = b.no_kms 
                                     LEFT JOIN t_anak c ON b.no_kk_anak = c.no_kk_anak
                                     LEFT JOIN t_warga d ON c.no_kk = d.no_kk
                                    WHERE a.id_kegiatan = '$id_jadwal_kegiatan'

        ";
        return $this->db->query($query);
    }

    public function get_email($no_kunjungan) {
        $query = "select email from t_warga where no_kk = (select no_kk from t_anak where no_kk_anak = (select no_kk_anak from t_kms where no_kms = (select no_kms from t_kunjungan tk where no_kunjungan = '$no_kunjungan')))";

        return $this->db->query($query);
    }

}

