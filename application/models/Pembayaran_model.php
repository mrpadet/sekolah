<?php
class Pembayaran_model extends CI_Model {

    public function get_all() {
        return $this->db->get('pembayaran_spp')->result();
    }
public function get_by_id($id) {
    return $this->db->get_where('pembayaran_spp', ['id' => $id])->row();
}

public function delete($id) {
    $this->db->delete('pembayaran_spp', ['id' => $id]);
}
    public function insert($data) {
        $this->db->insert('pembayaran_spp', $data);
    }

    public function verifikasi($id) {
        $this->db->set('status', 'Terverifikasi');
        $this->db->where('id', $id);
        $this->db->update('pembayaran_spp');
    }
}