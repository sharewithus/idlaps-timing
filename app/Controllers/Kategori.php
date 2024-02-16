<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Kategori as KategoriModels;
use App\Models\Event as EventModel;

class Kategori extends BaseController
{
    public function index()
    {
        $eventModel = new EventModel();
        $data['title'] = 'Kategori';
        $data['events'] = $eventModel->select(['id', 'nama'])->findAll();

        return view('kategori', $data);
    }

    public function new()
    {
        $model = new KategoriModels();
        $data = $model->select(['categories.*', 'events.nama as event_nama'])->join('events', 'events.id = categories.event_id')->findAll();
        
        return $this->response->setJSON(['data'=> $data]);
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            $model = new KategoriModels();

            $data = [
                'nama' => $this->request->getPost('nama'),
                'event_id' => $this->request->getPost('event_id'),
                // 'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            ];

            try {
                
                $model->save($data);

                $response = [
                    'status' => 'success',
                    'message' => 'Kategori berhasil ditambahkan',
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
        $model = new KategoriModels();

        $row = $model->find($id);

        if ($row) {
            $model->delete($id);

            $response = [
                'status' => 'success',
                'message' => 'Kategori berhasil dihapus',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Kategori tidak ditemukan',
            ];
        }

        return $this->response->setJSON($response);
    }

    public function show($id)
    {
        $model = new KategoriModels();
        $data = $model->find($id);

        if ($data) {
            $response = [
                'status' => 'success',
                'data' => $data,
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Kategori tidak ditemukan',
            ];
        }

        return $this->response->setJSON($response);
    }
    public function edit($id)
    {
        $model = new KategoriModels();
        if ($this->request->isAJAX()) {

            $data = [
                'nama' => $this->request->getGet('nama'),
                'event_id' => $this->request->getGet('event_id'),
                // 'jenis_kelamin' => $this->request->getGet('jenis_kelamin'),
            ];

            $model->update($id, $data);

            $response = [
                'status' => 'success',
                'message' => 'Kategori berhasil diupdate',
            ];

            return $this->response->setJSON($response);
        }
    }
    
}
