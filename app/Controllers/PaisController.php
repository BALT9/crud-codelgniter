<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pais;
use App\Models\Continente;
use App\Models\Estado;  // Agregado para manejar estados

class PaisController extends BaseController
{
    // Listar países y continentes (y filtrar por continente si es necesario)
    public function listar()
    {
        $paisModel = new Pais();
        $continenteModel = new Continente();

        // Filtrar países por continente
        $continenteId = $this->request->getGet('continente_id');
        if ($continenteId) {
            $data['paises'] = $paisModel->where('codigo_continente', $continenteId)->findAll();
        } else {
            $data['paises'] = $paisModel->findAll();
        }

        // Obtener todos los continentes
        $data['continentes'] = $continenteModel->findAll();

        // Puedes crear una vista 'pais/listar' o reutilizar alguna
        return view('welcome_message', $data);
    }

    // Crear un país
    public function crearPais()
    {
        $paisModel = new Pais();

        // Validación de los datos
        if (!$this->validate([
            'nombre_pais' => 'required|min_length[3]',
            'codigo_continente' => 'required|is_natural_no_zero'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nombre_pais' => $this->request->getPost('nombre_pais'),
            'codigo_continente' => $this->request->getPost('codigo_continente'),
        ];

        // Insertar el país
        $paisModel->insert($data);

        // Redirigir con mensaje
        return redirect()->to('/')->with('mensaje', 'País agregado correctamente');
    }

    // Eliminar un país
    public function eliminarPais($id)
    {
        $paisModel = new Pais();

        // Obtener el código del continente desde la URL
        $codigoContinente = $this->request->getGet('continente');

        // Eliminar el país
        $paisModel->delete($id);

        // Redirigir a la página de países con el mensaje de éxito
        return redirect()->to('/?continente=' . $codigoContinente)
            ->with('mensaje', 'País eliminado correctamente');
    }



    // Actualizar un país
    public function actualizarPais()
    {
        $paisModel = new Pais();

        // Validación de los datos
        if (!$this->validate([
            'nombre_pais' => 'required|min_length[3]',
            'codigo_continente' => 'required|is_natural_no_zero'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $id = $this->request->getPost('codigo_pais');

        $data = [
            'nombre_pais' => $this->request->getPost('nombre_pais'),
            'codigo_continente' => $this->request->getPost('codigo_continente'),
        ];

        // Actualizar el país
        $paisModel->update($id, $data);

        // Redirigir con mensaje
        return redirect()->to('/')->with('mensaje', 'País actualizado correctamente');
    }
}
