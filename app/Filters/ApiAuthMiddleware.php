<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Users;

class ApiAuthMiddleware implements FilterInterface
{
    protected $users;
    public function __construct()
    {
        // Cargar la base de datos en el constructor
        $this->users = new Users();
    }
    public function before(RequestInterface $request, $arguments = null)
    {
        // Lógica para autenticar la API
        // Puedes utilizar el token JWT u otro método según tus necesidades
        $token = $request->getHeaderLine('Authorization');
        if (!$this->verificarToken($token)) {
            return service('response')->setStatusCode(401)->setJSON(['error' => 'Unauthorized']);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Lógica después de que la solicitud ha pasado por el controlador
    }

    protected function verificarToken($token)
    {
        // token recibido en el encabezado de la solicitud
        // token usuario:contraseña codificado en base64
        $token = str_replace('Basic ', '', $token);
        // decodificar el token
        $token = base64_decode($token);
        // separar el usuario y la contraseña
        $token = explode(':', $token);
        // verificar si el usuario y la contraseña son correctos
        // verificarlos en la base de datos 
        $user = $this->users->where('username', $token[0])->first();
        if ($user) {
            if ($token[1] == $user['password']) {
                return true;
            }
        }
        return false;
    }
}