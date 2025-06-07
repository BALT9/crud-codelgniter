<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Estado;
use App\Models\Pais;

class EstadoController extends BaseController
{
    // Mostrar los estados de un país
    public function listar()
    {
        $estadoModel = new Estado();
        $paisModel = new Pais();
        $continenteModel = model('Continente');

        $paisId = $this->request->getGet('pais_id');

        if ($paisId) {
            // Obtener los estados de ese país
            $data['estados'] = $estadoModel->where('codigo_pais', $paisId)->findAll();

            // Obtener info del país activo
            $paisActivo = $paisModel->find($paisId);
            $data['paisActivo'] = $paisActivo['nombre_pais'];

            // Filtrar los países por el continente al que pertenece ese país
            $codigoContinente = $paisActivo['codigo_continente'];
            $data['paises'] = $paisModel->where('codigo_continente', $codigoContinente)->findAll();

            // Guardar el continente también por si querés usarlo en la vista
            $data['continenteActivo'] = $continenteModel->find($codigoContinente)['nombre_continente'];
        } else {
            $data['estados'] = [];
            $data['paisActivo'] = 'Ningún país seleccionado';
            $data['paises'] = []; // 👈 Nada por defecto
        }

        // Cargar todos los continentes si usás el selector en la vista
        $data['continentes'] = $continenteModel->findAll();

        return view('welcome_message', $data);
    }

    // Crear un estado
    public function crearEstado()
    {
        $estadoModel = new Estado();
        $paisModel = new Pais();

        // Obtener los datos del formulario
        $nombreEstado = $this->request->getPost('nombre_estado');
        $codigoPais = $this->request->getPost('codigo_pais');

        // Obtener el código de continente desde el país
        $pais = $paisModel->find($codigoPais);

        if (!$pais) {
            return redirect()->back()->with('error', 'País no encontrado');
        }

        $codigoContinente = $pais['codigo_continente'];

        // Datos para insertar
        $data = [
            'nombre_estado'     => $nombreEstado,
            'codigo_pais'       => $codigoPais,
            'codigo_continente' => $codigoContinente,
        ];

        // Insertar en base de datos
        $estadoModel->insert($data);

        // Redirigir con mensaje
        return redirect()->to('/estado/listar?pais_id=' . $codigoPais)->with('mensaje', 'Estado agregado correctamente');
    }

    public function eliminarEstado($id)
    {
        $estadoModel = new Estado();

        // Obtener el estado para saber el país y redirigir correctamente
        $estado = $estadoModel->find($id);

        $codigoPais = $estado['codigo_pais'];

        $estadoModel->delete($id);

        return redirect()->to('/estado/listar?pais_id=' . $codigoPais)->with('mensaje', 'Estado eliminado correctamente');
    }

    public function actualizarEstado()
    {
        // Inicializar modelos
        $estadoModel = new Estado();
        $paisModel = new Pais();

        // Obtener los datos del formulario
        $codigoEstado = $this->request->getPost('codigo_estado');
        $nombreEstado = $this->request->getPost('nombre_estado');
        $codigoPais = $this->request->getPost('codigo_pais');

        // Verificar que el estado exista
        $estado = $estadoModel->find($codigoEstado);
        if (!$estado) {
            return redirect()->back()->with('error', 'Estado no encontrado');
        }

        // Obtener el código de continente desde el país
        $pais = $paisModel->find($codigoPais);
        
        $codigoContinente = $pais['codigo_continente'];

        // Preparar los datos para actualizar
        $data = [
            'nombre_estado' => $nombreEstado,
            'codigo_pais' => $codigoPais,
            'codigo_continente' => $codigoContinente,
        ];

        // Actualizar el estado en la base de datos
        $estadoModel->update($codigoEstado, $data);

        // Redirigir con un mensaje de éxito
        return redirect()->to('/estado/listar?pais_id=' . $codigoPais)->with('mensaje', 'Estado actualizado correctamente');
    }
}
