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
        $data['page_title'] = "Mini Market | Editar Usario";
        $data['page_name'] = "Edicion de usuarios";
        $data['page_subtitle'] = "Editar";
        $data['functions_js'] = "Usuarios.js";
        $this->views->getView($this, 'editar', $data);
    }
}
