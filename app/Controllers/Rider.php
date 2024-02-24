<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Rider as RiderModel;
use App\Models\Kategori as CategoryModel;

class Rider extends BaseController
{
    public function index()
    {
        
        $categoryModel = new CategoryModel();
        $data['title'] = 'Rider';
        $data['categories'] = $categoryModel->select(['categories.id', 'categories.nama', 'events.nama as event_nama'])->join('events', 'events.id = categories.event_id')->findAll();
        
        return view('rider', $data);
    }

    public function new()
    {
        $riderModel = new RiderModel();

        $data = $riderModel->select(['riders.*', 'categories.nama as kategori_nama', 'events.nama as event_nama'])->join('categories', 'categories.id = riders.kategori_id')->join('events', 'events.id = categories.event_id')->findAll();
        
        return $this->response->setJSON(['data'=> $data]);
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            $model = new RiderModel();

            $data = [
                'bib' => $this->request->getPost('bib'),
                'nama' => $this->request->getPost('nama'),
                'tim' => $this->request->getPost('tim'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'provinsi_asal' => $this->request->getPost('provinsi_asal'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'kategori_id' => $this->request->getPost('kategori_id'),
            ];

            try {
                
                $model->save($data);

                $response = [
                    'status' => 'success',
                    'message' => 'Rider berhasil ditambahkan',
                ];

                return $this->response->setJSON($response);
            } catch (\Throwable $th) {
                $response = [
                    'status' => 'error',
                    'message' => 'Terjadi kesalahan : ' . $th->getMessage(),
                    'test' => $this->request->getPost(),
                ];

                return $this->response->setJSON($response);
            }
        }
    }

    public function delete($id)
    {
        $model = new RiderModel();

        $row = $model->find($id);

        if ($row) {
            $model->delete($id);

            $response = [
                'status' => 'success',
                'message' => 'Rider berhasil dihapus',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Rider tidak ditemukan',
            ];
        }

        return $this->response->setJSON($response);
    }

    public function show($id)
    {
        $model = new RiderModel();
        $data = $model->find($id);

        if ($data) {
            $response = [
                'status' => 'success',
                'data' => $data,
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Rider tidak ditemukan',
            ];
        }

        return $this->response->setJSON($response);
    }
    public function edit($id)
    {
        $model = new RiderModel();
        if ($this->request->isAJAX()) {

            $data = [
                'bib' => $this->request->getGet('bib'),
                'nama' => $this->request->getGet('nama'),
                'tim' => $this->request->getGet('tim'),
                'jenis_kelamin' => $this->request->getGet('jenis_kelamin'),
                'provinsi_asal' => $this->request->getGet('provinsi_asal'),
                'tanggal_lahir' => $this->request->getGet('tanggal_lahir'),
                'kategori_id' => $this->request->getGet('kategori_id'),
            ];

            $model->update($id, $data);

            $response = [
                'status' => 'success',
                'message' => 'Rider berhasil diupdate',
            ];

            return $this->response->setJSON($response);
        }
    }

    public function setup()
    {
        $riderModel = new RiderModel();
        $data = $riderModel->select(['riders.id','riders.nama','riders.bib','riders.tim', 'categories.nama as kategori_nama', 'categories.lap', 'categories.id as kategori_id'])->join('categories','riders.kategori_id = categories.id')->whereIn('riders.kategori_id', session()->get('kategori'))->findAll();
        return $this->response->setJSON(['data'=> $data]);
    }
    
}
