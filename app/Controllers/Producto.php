<?php
// metodos CRUD de productos
namespace App\Controllers;

use App\Models\ProductoM;
use CodeIgniter\Files\File;


class Producto extends BaseController
{

    protected $helpers = ['form'];

    public function index(): string
    {


        $productoM = model('ProductoM');

        $data['productos']  = $productoM->getProductosCon();
        return
            view('head') .
            view('menu') .
            view('producto/show', $data) .
            view('footer');
    }
    public function add(): string
    {
        $marcaM = model('MarcaM');
        $data['marcas'] = $marcaM->findAll();

        $tipoM = model('TipoM');
        $data['tipo'] = $tipoM->findAll();

        $proveedorM = model('ProveedorM');
        $data['proveedor'] = $proveedorM->findAll();

        return
            view('head') .
            view('menu') .
            view('producto/add', $data) .
            view('footer');
    }

    public function insert()
    {
        // Parametros la imagen
        $validationRule = [
            'imagen' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[imagen]',
                    'is_image[imagen]',
                    'mime_in[imagen,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[imagen,100]',
                    'max_dims[imagen,1024,768]',
                ],
            ],
        ];

        // Validamos la imagen
        if (! $this->validate($validationRule)) {
            return
                view('head') .
                view('menu') .
                view('producto/errores', ['errors' => $this->validator->getErrors()]) .
                view('footer');
        }

        // Obtenemos la imagen
        $img = $this->request->getFile('imagen');

        if (! $img->hasMoved()) {
            // Generamos un nuevo nombre único y mover la imagen a la carpeta de uploads
            $newName = $img->getRandomName();
            $img->move(WRITEPATH . 'uploads', $newName);

            $data = [
                "nombre" => $_POST['nombre'],
                "precio" => $_POST['precio'],
                "stock" => $_POST['stock'],
                "descripcion" => $_POST['descripcion'],
                "id_marca" => $_POST['id_marca'],
                "id_tipo" => $_POST['id_tipo'],
                "id_proveedor" => $_POST['id_proveedor'],
                "imagenProducto" => $newName,
            ];
            $productoM = model('ProductoM');
            $productoM->insert($data);

            return redirect()->to(base_url('/producto'));
        }

        // mostrar un error
        return
            view('head') .
            view('menu') .
            view('producto/errores', ['errors' => 'The file has already been moved.']) .
            view('footer');
    }
    public function getImagen($idProducto)
    {
        $productoM = model('ProductoM');
        $producto = $productoM->where('id_producto', $idProducto)->first();

        if ($producto) {
            $filepath = WRITEPATH . 'uploads/' . $producto->imagenProducto; // Usa -> para acceder a propiedades

            if (file_exists($filepath)) {
                return $this->response
                    ->setHeader('Content-Type', mime_content_type($filepath))
                    ->setHeader('Content-Disposition', 'inline; filename="' . $producto->imagenProducto . '"') // Usa -> aquí también
                    ->setBody(file_get_contents($filepath));
            }
        }
        return $this->response->setStatusCode(404, 'File Not Found');
    }


    public function delete($idProducto)
    {

        $productoM = model('ProductoM');
        $productoM->delete($idProducto);
        return redirect()->to(base_url('/producto'));
    }


    public function editarP($idProducto)
    {
        $tipoM = model('TipoM');
        $data['tipo'] = $tipoM->findAll();

        $proveedorM = model('ProveedorM');
        $data['proveedor'] = $proveedorM->findAll();

        $marcaM = model('MarcaM');
        $data['marcas'] = $marcaM->findAll();


        $idProducto = $data['id_producto'] = $idProducto;
        $productoM = model('ProductoM');
        $data['producto']  = $productoM->where('id_producto', $idProducto)->getProductosConMarca();

        return
            view('head') .
            view('menu') .
            view('producto/editarP', $data) .
            view('footer');
    }


    public function update()
    {
        $productoM = model('ProductoM');
        $idProducto = $_POST['id_producto'];
        $validationRule = [
            'imagen' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[imagen]',
                    'is_image[imagen]',
                    'mime_in[imagen,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[imagen,100]',
                    'max_dims[imagen,1024,768]',
                ],
            ],
        ];

        // Validamos la imagen
        if (! $this->validate($validationRule)) {
            return
                view('head') .
                view('menu') .
                view('producto/errores', ['errors' => $this->validator->getErrors()]) .
                view('footer');
        }

        // Obtenemos la imagen
        $img = $this->request->getFile('imagen');

        if (! $img->hasMoved()) {
            // Generamos un nuevo nombre único y mover la imagen a la carpeta de uploads
            $newName = $img->getRandomName();
            $img->move(WRITEPATH . 'uploads', $newName);

            $data = [
                "nombre" => $_POST['nombre'],
                "precio" => $_POST['precio'],
                "stock" => $_POST['stock'],
                "descripcion" => $_POST['descripcion'],
                "id_marca" => $_POST['id_marca'],
                "id_tipo" => $_POST['id_tipo'],
                "id_proveedor" => $_POST['id_proveedor'],
                "imagenProducto" => $newName,
            ];
            
            $productoM->set($data)->where('id_producto', $idProducto)->update();

            return redirect()->to(base_url('/producto'));
        }


        
    }
}
