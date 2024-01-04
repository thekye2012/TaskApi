# Task Management System

Este proyecto consiste en un sistema de gestión de tareas con una API para realizar operaciones básicas como crear, editar, eliminar y obtener todas las tareas. La base de datos necesaria para ejecutar este sistema se encuentra en el archivo `BASE DE DATOS.sql`.

## Instrucciones de Uso

### Base de Datos

El archivo `BASE DE DATOS.sql` contiene la estructura de la base de datos necesaria para el sistema. Puedes importar este archivo en tu sistema de gestión de bases de datos preferido para crear la base de datos requerida.

### Documentación de la API

La documentación de la API está disponible en el archivo `API Task.postman.json`, que puedes importar en [Postman](https://www.postman.com/) para probar y explorar las funcionalidades de la API. A continuación, se proporciona un resumen de las operaciones disponibles:

1. **Obtener Todas las Tareas**
   - Método: `GET`
   - URL: `localhost/tareas/public/api/task`

2. **Editar Tarea**
   - Método: `PUT`
   - URL: `localhost/tareas/public/api/task/{id}`
   - Cuerpo:
     ```json
     {
       "id_user": 1,
       "titulo": "Completar modulo de autentificacion",
       "descripcion": "Completar el modulo para el software de tareas para la autentificacion mediante JWT.",
       "prioridad": 1,
       "fecha_limite": null,
       "estado": "Completa",
       "duracion_estimada": 120
     }
     ```

3. **Crear Tarea**
   - Método: `POST`
   - URL: `localhost/tareas/public/api/task`
   - Cuerpo:
     ```json
     {
       "id_user": 1,
       "titulo": "Completar modulo de autentificacion",
       "descripcion": "Completar el modulo para el software de tareas para la autentificacion mediante JWT.",
       "prioridad": 1,
       "fecha_limite": null,
       "estado": "Incompleta",
       "duracion_estimada": 120
     }
     ```

4. **Eliminar Tarea**
   - Método: `DELETE`
   - URL: `localhost/tareas/public/api/task/{id}`

### Autenticación en la API

Todas las operaciones de la API requieren autenticación. Debes proporcionar las credenciales de usuario en cada solicitud mediante autenticación básica. Asegúrate de incluir las claves `username` y `password` con los valores correspondientes.

¡Disfruta utilizando el sistema de gestión de tareas! Si tienes alguna pregunta o problema, no dudes en abrir un problema en este repositorio.
