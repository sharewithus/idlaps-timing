<?php

namespace App\Controllers;
use App\Models\Kategori;
use App\Models\Rider;
use App\Models\ResultLog;
class Home extends BaseController
{
    public function index(): string
    {
        // $categoryModel = new Kategori();
        // $data['title'] = 'Pilih Kategori';
        // $data['next'] = 'racer-setup';
        // $data['back'] = 'rider';
        // $data['categories'] =  $categoryModel->select(['categories.id','categories.nama', 'events.nama as event_nama'])->join('events','events.id = categories.event_id')->findAll();
      
        return view('type-view');
    }

    public function racerSetup()
    {
        if(session()->get('kategori') === '') return redirect()->to('/');

        $data['title'] = 'Setup Racer';
        $data['next'] = 'race-timing';
        $data['back'] = '';
        return view('racer-setup', $data);
    }

    public function raceTiming()
    {
        // $riderModel = new Rider();
        $data['title'] = 'Race Timing';
        $data['next'] = 'result';
        $data['back'] = 'racer-setup';

        return view('race-timing', $data);
    }

    public function result()
    {
        // if(session()->get('kategori') === '') return redirect()->to('/');

        $data['title'] = 'Result';
        $data['next'] = '#';
        $data['back'] = 'race-timing';
        return view('result', $data);
    }

    public function sendData()
    {
        // Assuming your localStorage data is in JSON format
        $localStorageData = json_decode($this->request->getPost('result'), true);
        // Get IP and MAC address
        $macAddress = exec('getmac'); // Windows, for Linux use 'arp -a'
        $ipAddress = $this->request->getIPAddress();
        // Add IP and MAC address to each entry
        foreach ($localStorageData as &$entry) {
            $entry['mac'] = $ipAddress;
        }

        // Save data to the database
        $model = new ResultLog();
        $success = $model->insertBatch($localStorageData);

        if ($success) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }

}
