<?php
class MainModel extends CI_Model
{

    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    function is_logged_in()
    {
        return $this->session->userdata('user_id');
    }

    //fungsi cek level
    function is_role()
    {
        return $this->session->userdata('role');
    }

    //fungsi check login
    function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
    function tampil_jumlah($where, $table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        $hasil = $query->num_rows();
        return $hasil;
    }
    function tampilPengguna($where)
    {
        return $this->db->get_where('user', $where);
    }
    function tampilKeputusan($where)
    {
        return $this->db->get_where('pendukung_keputusan', $where);
    }
    function tampilOfKriteria($where)
    {
        return $this->db->order_by('kd_kriteria', 'asc')->get_where('kriteria', $where);
    }
    function tampilOfAlternatif($where)
    {
        return $this->db->order_by('nilai_alternatif', 'desc')->get_where('alternatif', $where);
    }
    function tampilKriteria($id)
    {
        $this->db->select('*');
        $this->db->from('kriteria');
        $this->db->join('pendukung_keputusan', 'pendukung_keputusan.id_keputusan = kriteria.id_keputusan');
        $this->db->where('pendukung_keputusan.id_user = ', $id);
        $query = $this->db->get();
        return $query->result();
    }
    function tampilAlternatif($id)
    {
        $this->db->select('*');
        $this->db->from('alternatif');
        $this->db->join('pendukung_keputusan', 'pendukung_keputusan.id_keputusan = alternatif.id_keputusan');
        $this->db->where('pendukung_keputusan.id_user = ', $id);
        $query = $this->db->get();
        return $query->result();
    }
    function tampilProfile($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('pendukung_keputusan.id_user = ', $id);
        $query = $this->db->get();
        return $query->result();
    }
    function tampilmax($table, $kolom, $where)
    {
        $hasil = $this->db->query("SELECT max($kolom) FROM $table");
        return $hasil->result();
    }
    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function updateData($data, $table, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function deleteData($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function insert($data)
    {
        $insert = $this->db->insert_batch('alternatif', $data);
        if ($insert) {
            return true;
        }
    }
}
