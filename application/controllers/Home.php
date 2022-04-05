<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');

    }
    
    public function index()
    {
        $data = array(
                        'title' => 'Pemetaan Penyebaran Virus',
                        'pemetaan' => $this->m_home->tampil_data(),
                        'isi'   => 'v_home'
                    );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function input()
    {

        $this->form_validation->set_rules('nama_wilayah', 'Nama Wilayah', 'required');
        $this->form_validation->set_rules('provinsi', 'provinsi', 'required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required');
        $this->form_validation->set_rules('kabupaten', 'kabupaten', 'required');
        $this->form_validation->set_rules('nama_virus', 'nama_virus', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                            'title' => 'Input Penyebaran Virus',
                            'isi'   => 'v_input'
                        );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                            'nama_wilayah' => $this->input->post('nama_wilayah'),
                            'kabupaten' => $this->input->post('kabupaten'),
                            'provinsi' => $this->input->post('provinsi'),
                            'kecamatan' => $this->input->post('kecamatan'),
                            'nama_virus' => $this->input->post('nama_virus'),
                            'jml_korban' => $this->input->post('jml_korban'),
                            'jml_meninggal' => $this->input->post('jml_meninggal'),
                            'jml_sembuh' => $this->input->post('jml_sembuh'),
                            'latitude' => $this->input->post('latitude'),
                            'longitude' => $this->input->post('longitude'),
                            'radius' => $this->input->post('radius'),
                            'warna' => $this->input->post('warna'),
                         );
            $this->m_home->input($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan !!');
            redirect('home/input');
        }
    }

    public function data_penyebaran()
    {
        $data = array(
                        'title'         => 'Data Penyebaran Virus',
                        'penyebaran'    => $this->m_home->tampil_data(),
                        'isi'           => 'v_data_penyebaran'
                    );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
    
    public function edit($id)
    {
        $this->form_validation->set_rules('nama_wilayah', 'Nama Wilayah', 'required');
        $this->form_validation->set_rules('provinsi', 'provinsi', 'required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required');
        $this->form_validation->set_rules('kabupaten', 'kabupaten', 'required');
        $this->form_validation->set_rules('nama_virus', 'nama_virus', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                            'title' => 'Edit Penyebaran Virus',
                            'data'  => $this->m_home->detail($id),
                            'isi'   => 'v_edit'
                        );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                            'id'            => $id,
                            'nama_wilayah' => $this->input->post('nama_wilayah'),
                            'kabupaten' => $this->input->post('kabupaten'),
                            'provinsi' => $this->input->post('provinsi'),
                            'kecamatan' => $this->input->post('kecamatan'),
                            'nama_virus' => $this->input->post('nama_virus'),
                            'jml_korban' => $this->input->post('jml_korban'),
                            'jml_meninggal' => $this->input->post('jml_meninggal'),
                            'jml_sembuh' => $this->input->post('jml_sembuh'),
                            'latitude' => $this->input->post('latitude'),
                            'longitude' => $this->input->post('longitude'),
                            'radius' => $this->input->post('radius'),
                            'warna' => $this->input->post('warna'),
                         );
            $this->m_home->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit !!');
            redirect('home/data_penyebaran');
        }
    } 

    public function delete($id)
    {
        $data = array('id' => $id);
        $this->m_home->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!');
        redirect('home/data_penyebaran');
    }

    public function contact()
    {
        $data = array(
            'title' => 'About Me',
            'isi'   => 'v_contact_user'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
}

