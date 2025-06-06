<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pais;
use App\Models\Continente;

class PaisController extends BaseController
{
    public function listar()
    {
        $paisModel = new Pais();
        $continenteModel = new Continente();

        $data['paises'] = $paisModel->findAll();
        $data['continentes'] = $continenteModel->findAll();

        // Puedes crear una vista 'pais/listar' o reutilizar alguna
        return view('welcome_message', $data);
    }

    public function crearPais()
    {
        $paisModel = new Pais();

        $data = [
            'nombre_pais' => $this->request->getPost('nombre_pais'),
            'codigo_continente' => $this->request->getPost('codigo_continente'),
        ];

        $paisModel->insert($data);

        return redirect()->to('/')->with('mensaje', 'País agregado correctamente');
    }

    public function eliminarPais($id)
    {
        $paisModel = new Pais();

        $paisModel->delete($id);

        return redirect()->to('/pais')->with('mensaje', 'País eliminado correctamente');
    }

    public function actualizarPais()
    {
        $paisModel = new Pais();

        $id = $this->request->getPost('codigo_pais');

        $data = [
            'nombre_pais' => $this->request->getPost('nombre_pais'),
            'codigo_continente' => $this->request->getPost('codigo_continente'),
        ];

        $paisModel->update($id, $data);

        return redirect()->to('/pais')->with('mensaje', 'País actualizado correctamente');
    }
}
