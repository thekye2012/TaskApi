<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Tareas;
use App\Models\Users;

class Api extends BaseController
{
    use ResponseTrait;
    protected $tareas;
    protected $users;

    public function __construct()
    {
        $this->users = new Users();
        $this->tareas = new Tareas();
    }
    public function response($data = [], $sucess = true, int $status = 200, string $message = null)
    {
        return $this->respond([
            'status' => $status,
            'success' => $sucess,
            'error' => $message,
            'data' => $data
        ]);
    }
    public function obtenerTareas()
    {
        $tareas = $this->tareas->findAll();
        return $this->response($tareas);
    }
    public function crearTarea()
    {
        $data = $this->request->getJSON(true);
        $idTarea = $this->tareas->insert($data);
        return $this->response(["id" => $idTarea]);
    }
    public function actualizarTarea($id)
    {
        $data = $this->request->getJSON(true);
        $d = $this->tareas->update($id, $data);
        return $this->response([$d]);
    }
    public function eliminarTarea($id)
    {
        $this->tareas->delete($id);
        return $this->response([]);
    }


}