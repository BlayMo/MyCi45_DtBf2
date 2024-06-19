<?php   
/*
*  CodeIgniter
 * 
 *  An open source application development framework for PHP
 * 
 *  This content is released under the MIT License (MIT)
 * 
 *  Copyright (c) 2014-2019 British Columbia Institute of Technology
 *  Copyright (c) 2019-2020 CodeIgniter Foundation
 * 
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this  and associated documentation files ("the Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 * 
 *  The above copyright notice and this permission notice shall be included in
 *  all copies or substantial portions of the Software.
 * 
 *  THE "SOFTWARE" IS PROVIDED AS IS, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 *  THE SOFTWARE.
 * 
 *  @package    CodeIgniter
 *  @author     CodeIgniter Dev Team
 *  @copyright  2019-2021 CodeIgniter Foundation
 *  @license    https://opensource.org/licenses/MIT  MIT License
 *  @link       https://codeigniter.com
 *  @since      Version 4.0.0
 *  @filesource
 *  
 *  --------------------- xxx My Codigo xxx -------------------------
 * 
 *   This content is released under the MIT License (MIT)
 * 
 *   @Proyecto: MyCi45_XXXXX
 *   @Autor:    BlayMo
 *   @Objeto:   Aprendizaje/Desarrollo 
 *   @Comienzo:  12-06-2024 10:58:30
 *   @licencia  http://opensource.org/licenses/MIT  MIT License
 *   @link      https://github.com/BlayMo
 *   @Version   1.0.0
 * 
 *   @mail: expresoweb2019@gmail.com
 * 
 *   PHP  8.2.12  + Codeigniter 4.5.X + Bootstrap 4,5
 
  
    Generated el 12-06-2024 10:58:30
   ***************************************
*/

namespace App\Modules\Tipos\Controllers;
use App\Modules\Tipos\Models\TiposModel;
use App\Modules\Tipos\Entities\TiposEnt; 
    
use Bonfire\Core\AdminController;

class AdminTipos extends AdminController{
    
    private $Tipos_model;   
    private $oTiposEnt;   
    private $retorno;
    private $camino;
    private $session;
    private $botones;
    private $permisos;
    private $oUser;
    private $validation;
    protected $helpers = ['url', 'form', 'text','html'];    
        
    function __construct() {

        $this->Tipos_model = new TiposModel;
        $this->oTiposEnt   = new TiposEnt;
        $this->retorno     = ADMIN_AREA . '/tipos';
        $this->camino      = 'App\Modules\Tipos\Views\\';
        $this->session     = session();
        $this->botones     = config('Botones');
        $this->permisos    = config('Permisos');
        $this->oUser       = auth()->user();
        $this->validation  = \Config\Services::validation();
    }

    public function index(){
        //$acceso = true;
        $acceso = $this->permisos->canAdmin($this->oUser);
        
        //$this->crea_modulo();
        //$this->crea_tipos();
        
        if ($acceso) {
            $tipos = $this->Tipos_model
                    ->findAll();
                    
            return $this->render($this->camino . 'tipos_list', [                        
                        'pagetitle'     => 'Diario/Apuntes',
                        'showSelectAll' => true,                        
                        'tipos_data'    => $tipos,
                        'botones'       => $this->botones,
                        'pager'         => $this->Tipos_model->pager,
            ]);
            
        } else {
            $this->session->setFlashdata('error', 'Ud. No esta autorizado');
            return redirect()->to('/');
        }
    }
    
    private function crea_modulo(){
        createFolder(APPPATH.'Modules');
        createFolder(APPPATH.'Modules/Tipos');
        createFolder(APPPATH.'Modules/Tipos/Config');
        createFolder(APPPATH.'Modules/Tipos/Controllers');
        createFolder(APPPATH.'Modules/Tipos/Models');
        createFolder(APPPATH.'Modules/Tipos/Entities');
        createFolder(APPPATH.'Modules/Tipos/Views');
        if (!file_exists('./app/Modules/Tipos/Module.php')){
            write_file(('./app/Modules/Tipos/Module.php'), '<?php', 'w+');
        }
        return null;
    }
    
    

    public function read($id) {
        
        $acceso = $this->permisos->canView($this->oUser);
        if ($acceso) {
            $row = $this->Tipos_model->find($id);
            if ($row) {
                $data = array(
                    'id_tipo'    => $row->id_tipo,
                    'tipo'       => $row->tipo,
                    'created_at' => $row->created_at,
                    'updated_at' => $row->updated_at,
                );

                $data['pagetitle'] = 'Tipos';
                $data['botones']   = $this->botones;
                $data['retorno']   = $this->retorno;

                return $this->render($this->camino . 'tipos_read', $data);
            }
            else {
                $this->session->setFlashdata('error', 'Registro No Encontrado');
                return redirect()->to($this->retorno);
            }
        }
        else {
            $this->session->setFlashdata('error', 'Ud. No esta autorizado');
            return redirect()->to('/');
        }
    }

    public function create(){   
        //$acceso = true;
        $acceso = $this->permisos->canCreate($this->oUser);
        if ($acceso) {
            $data = array(
                'button'  => 'Crear',
                'action'  => site_url(ADMIN_AREA . '/tipos/createOk'),
                'tipo'    => set_value('tipo'),
            );

            $data['pagetitle']  = 'Tipos';
            $data['botones']    = $this->botones;
            $data['retorno']    = $this->retorno;
            $data['validation'] = $this->validation;

            echo $this->render($this->camino.'tipos_form_new', $data);
        } else {
            $this->session->setFlashdata('message', 'Ud. No esta autorizado');
            return redirect()->to('/');
        }
    }
    
    public function createOk() {

        if ((strtoupper($this->request->getMethod()) !== 'POST')) {
            return $this->response->setStatusCode(405)->setBody('Method Not Allowed');
        }
        
        $acceso = $this->permisos->canCreate($this->oUser);
        if ($acceso) {
            if (!$this->new_rules()) {
                $this->create();
            }
            else {
                $save  = true;
                $data  = $this->request->getPost();
                $oData = $this->oTiposEnt;
                $oData->fill($data);

                if ($save) {
                    if ($this->Tipos_model->save($oData)) {
                        $this->session->setFlashdata('success', 'Creado Nuevo Registro');
                    }
                    else {
                        $this->session->setFlashdata('error', 'No Creado Nuevo Registro');
                    }
                }
                return redirect()->to($this->retorno);
            }
        }
        else {
            $this->session->setFlashdata('error', 'Ud. No esta autorizado');
            return redirect()->to('/');
        }
    }

    public function update($id){    
         
        $acceso = $this->permisos->canEdit($this->oUser);
        if ($acceso) {
            $row = $this->Tipos_model->find($id);

            if ($row) {
                $data = array(
                    'button'  => 'Actualizar',
                    'action'  => site_url(ADMIN_AREA . '/tipos/updateOk'),
                    'id_tipo' => set_value('id_tipo', $row->id_tipo),
                    'tipo'    => set_value('tipo', $row->tipo),
                );

                $data['pagetitle'] = 'Tipos';
                $data['botones'] = $this->botones;
                $data['retorno'] = $this->retorno;                
                $data['validation'] = $this->validation;

                echo $this->render($this->camino.'tipos_form_up', $data);
            } else {
                $this->session->setFlashdata('error', 'Registro No Encontrado');
                return redirect()->to($this->retorno);           
            }
        } else {
            $this->session->setFlashdata('error', 'Ud. No esta autorizado');
            return redirect()->to('/');
        }
        
    }
    
    public function updateOk() {

        if ((strtoupper($this->request->getMethod()) !== 'POST')) {
            return $this->response->setStatusCode(405)->setBody('Method Not Allowed');
        }

        $acceso = $this->permisos->canEdit($this->oUser);
        if ($acceso) {
            $id_tipo = $this->request->getPost('id_tipo', \FILTER_SANITIZE_NUMBER_INT);
            if (!$this->up_rules()) {
                $this->update($id_tipo);
            }
            else {
                $update = true;

                $oData = $this->oTiposEnt;

                $data = $this->request->getPost();
                $oData->fill($data);

                if ($update) {
                    if ($this->Tipos_model->update($id_tipo, $oData)) {
                        $this->session->setFlashdata('success', 'Registro Actualizado');
                    }
                    else {
                        $this->session->setFlashdata('error', 'Registro No Actualizado');
                    }
                }
                return redirect()->to($this->retorno);
            }
        }
        else {
            $this->session->setFlashdata('error', 'Ud. No esta autorizado');
            return redirect()->to('/');
        }
    }

    public function delete($id) {
        $acceso = $this->permisos->canDel($this->oUser);
        if ($acceso) {
            $delete = true;
            $row    = $this->Tipos_model->find($id);

            if ($row) {
                if ($delete) {
                    $this->Tipos_model->delete($id);
                    $this->session->setFlashdata('success', 'Registro Borrado');
                }
                else {
                    $this->session->setFlashdata('error', 'Registro No Borrado');
                }
            }
            else {
                $this->session->setFlashdata('error', 'Registro No encontrado');
            }

            return redirect()->to($this->retorno);
        }
        else {
            $this->session->setFlashdata('error', 'Ud. No esta autorizado');
            return redirect()->to('/');
        }
    }

    private function new_rules() {
        $this->validation->reset();
        $rules = array(
            'tipo' => ['label' => 'Tipo', 'rules' => 'required|string'],
        );

        $this->validation->setRules($rules);
        return $this->validate($rules);
    }

    private function up_rules() {
        $this->validation->reset();
        $rules = array(
            'tipo' => ['label' => 'Tipo', 'rules' => 'required|string'],
            'id_tipo' => 'integer');

        $this->validation->setRules($rules);
        return $this->validate($rules);
    }
    
//    private function crea_tipos() {
//        $oData = $this->oTiposEnt;
//        $ntipos = $this->Tipos_model->countAllResults();
//        if ($ntipos == 0) {
//            for ($i = 1; $i <= 10; $i++) {                
//                $oData->tipo   = 'Tipo #' . $i;
//                $this->Tipos_model->save($oData);
//            }
//        }
//        return null;
//    }
}
