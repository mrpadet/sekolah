<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_spp extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pembayaran_model');
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        $data['judul'] = 'Pembayaran SPP';
        $data['pembayaran'] = $this->Pembayaran_model->get_all();
        $data['main_view'] = 'admin/pembayaran_spp_list';

        $this->load->view('theme/admintemplate', $data);
    }

    public function tambah() {
        $data['judul'] = 'Form Pembayaran SPP';
        $data['main_view'] = 'admin/pembayaran_spp_form';
        $this->load->view('theme/admintemplate', $data);
    }

    public function hapus($id) {
    $data = $this->Pembayaran_model->get_by_id($id);
    
    if ($data && file_exists('./uploads/bukti/' . $data->bukti_transfer)) {
        unlink('./uploads/bukti/' . $data->bukti_transfer); // Hapus file bukti jika ada
    }
    
    $this->Pembayaran_model->delete($id);
    redirect('admin/pembayaran_spp');
}

    public function simpan() {
        // Pastikan folder uploads/bukti sudah ada dan bisa ditulis
        $config['upload_path'] = './uploads/bukti/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['max_size'] = 2048; // max 2MB
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('bukti_transfer')) {
            // Tampilkan error upload
            $error = $this->upload->display_errors();
            echo "Upload gagal: " . $error;
            return;
        }

        $upload_data = $this->upload->data();

        $data = [
            'nama_siswa' => $this->input->post('nama_siswa'),
            'nis' => $this->input->post('nis'),
            'bulan' => $this->input->post('bulan'),
            'tahun' => $this->input->post('tahun'),
            'jumlah' => $this->input->post('jumlah'),
            'bukti_transfer' => $upload_data['file_name'],
            'status' => 'Menunggu Verifikasi'
        ];

        $this->Pembayaran_model->insert($data);
        redirect('admin/pembayaran_spp');
    }

    public function verifikasi($id) {
        $this->Pembayaran_model->verifikasi($id);
        redirect('admin/pembayaran_spp');
    }
}
