<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Event as EventModels;

class Event extends BaseController
{
    public function index()
    {
        $data['title'] = 'Event';
        return view('event', $data);
    }
    public function new()
    {
        $model = new EventModels();
        $data = $model->findAll();

        return $this->response->setJSON(['data'=> $data]);
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            $model = new EventModels();

            $data = [
                'nama' => $this->request->getPost('nama'),
                'lokasi' => $this->request->getPost('lokasi'),
                'waktu' => $this->request->getPost('waktu'),
            ];

            try {
                
                $model->save($data);

                $response = [
                    'status' => 'success',
                    'message' => 'Event berhasil ditambahkan',
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
        $model = new EventModels();

        $row = $model->find($id);

        if ($row) {
            $model->delete($id);

            $response = [
                'status' => 'success',
                'message' => 'Event berhasil dihapus',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Event tidak ditemukan',
            ];
        }

        return $this->response->setJSON($response);
    }

    public function show($id)
    {
        $model = new EventModels();
        $data = $model->find($id);

        if ($data) {
            $response = [
                'status' => 'success',
                'data' => $data,
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Event tidak ditemukan',
            ];
        }

        return $this->response->setJSON($response);
    }
    public function edit($id)
    {
        $model = new EventModels();
        if ($this->request->isAJAX()) {

            $data = [
                'nama' => $this->request->getGet('nama'),
                'lokasi' => $this->request->getGet('lokasi'),
                'waktu' => $this->request->getGet('waktu'),
            ];

            $model->update($id, $data);

            $response = [
                'status' => 'success',
                'message' => 'Event berhasil diupdate',
            ];

            return $this->response->setJSON($response);
        }
    }
    
}
