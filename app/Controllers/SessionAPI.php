<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SessionAPI extends BaseController
{
    public function setSessionData()
    {
        $session = session();
        $data = $this->request->getPost(); // Assuming you send data via POST
        
        
        // Set session data
        $session->set($data);
        
        // You can also set flash data if needed
        // $session->setFlashdata('message', 'Session data set successfully');

        return json_encode(['status' => 'success', 'data' => $session->get()]);
    }
}
