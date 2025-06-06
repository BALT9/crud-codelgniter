<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Continente;
use CodeIgniter\HTTP\ResponseInterface;

class ContinenteController extends BaseController
{
    
    public function listar(){
        $continenteModel = new Continente();

        $data['continentes'] = $continenteModel->findAll();

        // Enviar datos a la vista
        return view('welcome_message', $data);
    }
    
    public function crearContinente()
    {
        $continenteModel = new Continente();

        $data = [
            'nombre_continente' => $this->request->getPost('nombre_continente'),
        ];

        $continenteModel->insert($data);

        return redirect()->to('/')->with('mensaje', 'continente agregado correctamente');
    }

    public function eliminarContinente($id)
    {
        $continenteModel = new Continente();

        $continenteModel->delete($id);

        return redirect()->to('/')->with('mensaje', 'continente agregado correctamente');
    }

    public function actualizarContinente()
    {
        $continenteModel = new Continente();

        $id = $this->request->getPost('codigo_continente');

        $data = [
            'nombre_continente' => $this->request->getPost('nombre_continente'),
        ];

        $continenteModel->update($id, $data);

        return redirect()->to('/')->with('mensaje', 'continente agregado correctamente');
    }
}
