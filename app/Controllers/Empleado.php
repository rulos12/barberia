<?php
// Metodos CRUD empleado
namespace App\Controllers;


class Empleado extends BaseController
{
    //añadí cositos para la validacion 
    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];

    public function index(): string
    {

        $empleadoM = model('EmpleadoM');
        $data['empleados']  = $empleadoM->findAll();
        return
            view('head') .
            view('menu') .
            view('empleado/show', $data) .
            view('footer');
    }

    public function add(): string
    {
        return
            view('head') .
            view('menu') .
            view('empleado/addEmpleado') .
            view('footer');
    }

    //añado funciones para editar 

    public function edit($id_empleado)
    {   //get
        $id_empleado = $data['id_empleado'] = $id_empleado;
        $empleadoM = model('EmpleadoM');
        $data['empleado'] = $empleadoM->where('id_empleado', $id_empleado)->findAll();
        return view('head') .
            view('menu') .
            view('empleado/editarEmpleado', $data) .
            view('footer');
    }

    //añado funciones para actualizar 

    public function update()
    {
        $empleadoM = model('EmpleadoM');
        $id_empleado = $_POST['id_empleado'];

        $data = [
            "nombreEmpleado" => $_POST['nombreEmpleado'],
            "direccion" => $_POST['direccion'],
            "telefono" => $_POST['telefono'],
            "email" => $_POST['email'],
            "puesto" => $_POST['puesto'],
            "fecha_contratacion" => $_POST['fecha_contratacion']

        ];

        $empleadoM->set($data)->where('id_empleado', $id_empleado)->update();


        return redirect()->to(base_url('/empleado'));
    }
    //modificar de acurdo a los atributos de la tabla views
    //modifique insertar 
    public function insert()
    { //post
        if (! $this->request->is('post')) {
            $this->index();
        }

        $rules = [
            'nombreEmpleado' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'puesto' => 'required',
            'fecha_contratacion' => 'required'
        ];

        $data = [
            "nombreEmpleado" => $_POST['nombreEmpleado'],
            "direccion" => $_POST['direccion'],
            "telefono" => $_POST['telefono'],
            "email" => $_POST['email'],
            "puesto" => $_POST['puesto'],
            "fecha_contratacion" => $_POST['fecha_contratacion']
        ];

        // Valida los datos
        if (! $this->validate($rules)) {
            // Si la validación falla, vuelve a cargar la vista con los errores
            return
                view('head') .
                view('menu') .
                view('empleado/addEmpleado', [
                    'validation' => $this->validator
                ]) .
                view('footer');
        } else {
            $empleadoM = model('EmpleadoM');
            $empleadoM->insert($data);
            return redirect()->to(base_url('/empleado'));
        }
    }


    public function delete($idEmpleado)
    {

        $empleadoM = model('EmpleadoM');
        $empleadoM->delete($idEmpleado);
        return redirect()->to(base_url('/empleado'));
    }
}
