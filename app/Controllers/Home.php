<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $db;
    // Cargar la base de datos en el constructor
    public function __construct()
    {
        // Cargar la base de datos en el constructor
        $this->db = \Config\Database::connect();
    }
    public function index(): string
    {
        // get all from table "tareas"

        $tareas = $this->db->query('SELECT * FROM tareas')->getResultArray();
        return view('welcome_message');
    }
}
