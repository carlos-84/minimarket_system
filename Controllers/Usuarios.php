<?php

class Usuarios extends Controller
{


    public function __construct()
    {
       
        Auth::noAuth();
        Permisos::get_permisos(3);
        return parent::__construct();
    }


    public function usuarios()
    {
        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location:' .base_url.'/Perfil');
            //debug( $_SESSION['permisosMod'][2]['r']);
        }
       
        $data['page_title'] = "Mini Market | Usuarios";
        $data['page_name'] = "Usuarios";
        $data['functions_js'] = "Usuarios.js";
        $this->views->getView($this, 'usuarios', $data);
    }

    public function all()

    {
        
        $arrJson = [];
        $users = UsuariosModel::all();

        if (empty($users)) {
           $arrJson = ['msg' => 'No se encontraron registros'];
        }else {
            for ($i=0; $i <count($users) ; $i++) { 
                if ($users[$i]['is_activo'] == 1) {
                    $users[$i]['is_activo'] = ' <span class="badge bg-success">Activo</span>';
                    // $users[$i]['acciones'] = '<div>
                    //               <button class="btn btn-primary" title="Editar" onclick="btnEditarUser('.$users[$i]['id'].');"><i class="fas fa-edit"></i></button>
                    //               <button class="btn btn-danger" title="Eliminar" onclick="btnDelUser('.$users[$i]['id'].');"><i class="fas fa-trash-alt"></i></button>
                    //               <button class="btn btn-success"title="Reingresar" onclick="btnReitUser('.$users[$i]['id'].');"><i class="fas fa-reply-all"></i></button>
                    //             </div>';
                }else{
                    $users[$i]['is_activo'] = ' <span class="badge bg-danger">Inactivo</span>';
                }
            }
            $arrJson = $users;
        }

        echo  json_encode($arrJson, JSON_UNESCAPED_UNICODE);

      
    }

    public function editar ()
    {
        Alertas::new('Guardado','danger');
        $data['page_title'] = "Mini Market | Editar Usario";
        $data['page_name'] = "Edicion de usuarios";
        $data['page_subtitle'] = "Editar";
        $data['functions_js'] = "Usuarios.js";
        $this->views->getView($this, 'editar', $data);
    }

    public function lisRoles()
    {
        $roles = UsuariosModel::rolesAll();
        $data['roles'] = $roles;

        echo json_encode($roles, JSON_UNESCAPED_UNICODE);
        exit;
    }

    public function nuevo ()
    {
        // $roles = UsuariosModel::rolesAll();
        // $data['roles'] = $roles;
        //Alertas::new('Guardado','success');
        $data['page_title'] = "Mini Market | Nuevo Usario";
        $data['page_name'] = "Nuevo usuario";
        $data['page_subtitle'] = "Nuevo";
        $data['functions_js'] = "Usuarios.js";
        $this->views->getView($this, 'nuevo', $data);
    }

    public function store()
    { 

        // Validamos que sea una petición POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Capturamos el valor seleccionado del Select2 usando su atributo 'name'
            // Validar los campos del formulario 

            $val = new Validations();
            $val->name('name')->value(limpiar($_POST['name']))->required();
            $val->name('email')->value(limpiar($_POST['email']))->pattern('email')->required();
            $val->name('rol')->value(limpiar($_POST['rol']))->required();
            $val->name('estado')->value(limpiar($_POST['estado']))->required();
            $val->name('password')->value(limpiar($_POST['password']))->min(5)->max(20)->pattern('alphanum')->equal(limpiar($_POST['confirm_password']))->required();

            if ($val->isSuccess()) {
                $pasHash = hash("SHA256", limpiar($_POST['password']));
                $data = [
                    'nombre' => limpiar($_POST['name']),
                    'email' => limpiar($_POST['email']),
                    'id_rol' => limpiar($_POST['rol']),
                    'is_activo' => limpiar($_POST['estado']),
                    'password' => $pasHash
                ];
                $idisert = UsuariosModel::insertUser($data);
                $data = ['status' => 'success', 'msg' => 'Registrado correctamente'];
            } else {
                $data = ['status' => 'error', 'msg' => 'Error al registrar el usuario'];
            }
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        
        exit; 
    }

     public function update()
    { 
        // Validamos que sea una petición POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Capturamos el valor seleccionado del Select2 usando su atributo 'name'
            // Validar los campos del formulario 

            $val = new Validations();
            $val->name('id_user')->value(limpiar($_POST['id_usuario']))->required();
            $val->name('name')->value(limpiar($_POST['name']))->required();
            $val->name('email')->value(limpiar($_POST['email']))->pattern('email')->required();
            $val->name('rol')->value(limpiar($_POST['rol']))->required();
            $val->name('estado')->value(limpiar($_POST['estado']))->required();

            if ($val->isSuccess()) {
                $data = [
                    'nombre' => limpiar($_POST['name']),
                    'email' => limpiar($_POST['email']),
                    'id_rol' => limpiar($_POST['rol']),
                    'is_activo' => limpiar($_POST['estado'])
                ];
                $idisert = UsuariosModel::updates($data, limpiar($_POST['id_usuario']));
                $data = ['status' => 'success', 'msg' => 'Usuario actualizado correctamente'];
            } else {
                $data = ['status' => 'error', 'msg' => 'Error al actualizar el usuario'];
            }
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        
        exit; 
    }

    public function delete($id)
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

           
            if ($id <= 0) {
                header('Content-type: application/json');
                echo json_encode(['status' => 'error', 'msg' => 'ID de registro no válido.']);
                exit;
            }

            $id = limpiar($id);
            $result = UsuariosModel::deleteUser($id);
            if ($result) {
                $data = ['status' => 'success', 'msg' => '¡Registro eliminado correctamente!'];
            } else {
                $data = ['status' => 'error', 'msg' => 'Error al eliminar el resgistro'];
            }
        } else {
            $data = ['status' => 'error', 'msg' => 'Método no permitido'];
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }
}



