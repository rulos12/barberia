<?php
// clase evento que se une con un empleado 
namespace App\Controllers;


class Evento extends BaseController
{
    //añadí cositas para la validacion 
    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];

    public function index(): string
    {

        $eventoM = model('eventoM');
        $data['eventos']  = $eventoM->getEventoEmpleado();
        return
            view('head') .
            view('menu') .
            view('evento/showEvento', $data) .
            view('footer');
    }

    public function add(): string
    {
        $empleadoM = model('empleadoM');
        $data['empleados'] = $empleadoM->findAll();
        $eventoM = model('eventoM');
        $data['eventos']  = $eventoM->findAll();

        return
            view('head') .
            view('menu') .
            view('evento/addEvento', $data) .
            view('footer');
    }

    //añado funciones para editar 

    public function edit($id_evento)
    {   


        $id_evento = $data['id_evento'] = $id_evento;
        $empleadoM = model('empleadoM');
        $data['empleados'] = $empleadoM->findAll();
        $eventoM = model('EventoM');
        $data['evento'] = $eventoM->where('id_evento', $id_evento)->findAll();
        return view('head') .
            view('menu') .
            view('evento/editarEvento', $data) .
            view('footer');
    }

    //añado funciones para actualizar 

    public function update()
    {
        $eventoM = model('EventoM');
        $id_evento = $_POST['id_evento'];

        $data = [
            "titulo" => $_POST['titulo'],
            "descripcion" => $_POST['descripcion'],
            "fecha_evento" => $_POST['fecha_evento'],
            "id_empleado" => $_POST['id_empleado'],
        ];

        $eventoM->set($data)->where('id_evento', $id_evento)->update();


        return redirect()->to(base_url('/evento'));
    }
    //modificar de acurdo a los atributos de la tabla views
    //modifique insertar 
    public function insert()
    { //post
        if (! $this->request->is('post')) {
            $this->index();
        }

        $rules = [
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha_evento' => 'required',
            'id_empleado' => 'required',
        ];

        $data = [
            "titulo" => $_POST['titulo'],
            "descripcion" => $_POST['descripcion'],
            "fecha_evento" => $_POST['fecha_evento'],
            "id_empleado" => $_POST['id_empleado'],
        ];

        // Valida los datos
        if (! $this->validate($rules)) {
            // Si la validación falla, vuelve a cargar la vista con los errores
            return
                view('head') .
                view('menu') .
                view('evento/addEvento', [
                    'validation' => $this->validator
                ]) .
                view('footer');
        } else {
            $eventoM = model('EventoM');
            $eventoM->insert($data);
            return redirect()->to(base_url('/evento'));
        }
    }


    public function delete($idEvento)
    {

        $eventoM = model('EventoM');
        $eventoM->delete($idEvento);
        return redirect()->to(base_url('/evento'));
    }
}
