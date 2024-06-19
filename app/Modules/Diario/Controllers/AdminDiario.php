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
 *   @Comienzo:  12-06-2024 10:56:51
 *   @licencia  http://opensource.org/licenses/MIT  MIT License
 *   @link      https://github.com/BlayMo
 *   @Version   1.0.0
 * 
 *   @mail: expresoweb2019@gmail.com
 * 
 *   PHP  8.2.12  + Codeigniter 4.5.X + Bootstrap 4,5
 
 
    Generated el 12-06-2024 10:56:51
   ***************************************
*/

namespace App\Modules\Diario\Controllers;
use App\Modules\Diario\Models\DiarioModel;
use App\Modules\Diario\Entities\DiarioEnt;
use App\Modules\Diario\Models\DiarioFiltro;
use App\Modules\Tipos\Models\TiposModel;
    
use Bonfire\Core\AdminController;

use Faker; 
use \Hermawan\DataTables\DataTable;
use Config\Database;

class AdminDiario extends AdminController{
    
    private $Diario_model;   
    private $oDiarioEnt;
    private $Diario_filtro;
    private $Tipos_model;   
    private $retorno;
    private $camino;
    private $session;
    private $botones;
    private $permisos;
    private $oUser;
    private $validation;
    
    
    protected $helpers = ['url', 'form', 'text','html'];    
    
    function __construct() {

        $this->Diario_model  = new DiarioModel;
        $this->Diario_filtro = new DiarioFiltro;
        $this->oDiarioEnt    = new DiarioEnt;
        $this->Tipos_model   = new TiposModel;
        $this->retorno       = ADMIN_AREA . '/diario';
        $this->camino        = 'App\Modules\Diario\Views\\';
        $this->session       = session();
        $this->botones       = config('Botones');
        $this->permisos      = config('Permisos');
        $this->oUser         = auth()->user();
        $this->validation    = \Config\Services::validation();
    }

    public function index() {
        //$acceso = true;
        $acceso = $this->permisos->canAdmin($this->oUser);
        
        // *********** utiles en fase de desarrollo
        //$this->crea_modulo();        
        //$this->Diario_model->truncate();
        //$this->crea_apuntes();
        //******************************************
        
        if ($acceso) {
            $id_tipo = $this->request->getPost('filters');
            $search  = $this->request->getPost('search',\FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            $this->Diario_filtro->filter($id_tipo);
            
            if ($id_tipo == null) {
                if ($search == null){
                $diario = $this->Diario_filtro
                        ->join('tipos', 'diario.id_tipo = tipos.id_tipo', 'left')
                        ->orderBy('diario.id_apunte', 'DESC')
                        ->paginate(5,'diario');
                }else{
                    $diario = $this->Diario_filtro
                        ->join('tipos', 'diario.id_tipo = tipos.id_tipo', 'left')
                        ->orderBy('diario.id_apunte', 'DESC')
                        ->like('diario.concepto', $search)    
                        ->paginate(5,'diario');
                }
                $pag      = true;
                $table_id = '';
            }
            else {        
                //filtrada la tabla se pagina con datatable
                $diario = $this->Diario_filtro
                        ->join('tipos', 'diario.id_tipo = tipos.id_tipo', 'left')
                        ->orderBy('diario.id_apunte', 'DESC') 
                        ->findAll();
                
                $pag      = false;
                $table_id = 'mytable';
            }
            
            return $this->render($this->camino . 'list', [
                        'pagetitle'     => 'Diario/Apuntes',
                        'showSelectAll' => true,
                        'diario_data'   => $diario,                        
                        'botones'       => $this->botones,
                        'pager'         => $this->Diario_filtro->pager,
                        'paginado'      => $pag,
                        'table_id'      => $table_id
            ]);
        }
        else {
            $this->session->setFlashdata('error', 'Ud. No esta autorizado');
            return redirect()->to('/');
        }
    }
    
    public function listss(){
        //$acceso = true;
        $acceso = $this->permisos->canAdmin($this->oUser);
        
        if ($acceso) {            

            return $this->render($this->camino . 'list_ss', [
                        'pagetitle'     => 'Diario/Apuntes',
            ]);
        }
        else {
            $this->session->setFlashdata('error', 'Ud. No esta autorizado');
            return redirect()->to('/');
        }
    }
    
    public function dtjson() {
        $db         = Database::connect();
        
        $query = $db->table('diario')->select('diario.id_apunte,diario.id_tipo,diario.concepto,'
                . 'diario.cobros,diario.pagos,diario.dia,diario.mes,'
                . 'diario.ano,diario.created_at,tipos.tipo')
                ->join('tipos', 'diario.id_tipo = tipos.id_tipo', 'left');
        
        return DataTable::of($query)
                ->add('action', function ($row) {
                            return $this->add_col($row);
                        }, 'last')
                ->format('cobros', function($value){
                        return numero($value);
                    })                 
                ->format('pagos', function($value){
                        return numero($value);
                    })                 
                ->format('created_at', function($value){
                        return app_date($value);
                    })                
                ->toJson(true);
    }
    
    private function add_col($row){
        $str = anchor(site_url('admin/diario/read/'.$row->id_apunte), $this->botones->btn_read).
               anchor(site_url('admin/diario/update/'.$row->id_apunte), $this->botones->btn_update).
               anchor(site_url('admin/diario/delete/'.$row->id_apunte), $this->botones->btn_delete,'onclick="javascript: return confirm(\'Are You Sure ?\')"');
        return $str;
    }

    private function crea_modulo() {
        createFolder(APPPATH . 'Modules');
        createFolder(APPPATH . 'Modules/Diario');
        createFolder(APPPATH . 'Modules/Diario/Config');
        createFolder(APPPATH . 'Modules/Diario/Controllers');
        createFolder(APPPATH . 'Modules/Diario/Models');
        createFolder(APPPATH . 'Modules/Diario/Entities');
        createFolder(APPPATH . 'Modules/Diario/Views');
        if (!file_exists('./app/Modules/Diario/Module.php')) {
            write_file(('./app/Modules/Diario/Module.php'), '<?php', 'w+');
        }
        return null;
    }

   

    public function read($id) {
        $acceso = $this->permisos->verTodo();
        if ($acceso) {
            $row = $this->Diario_model
                    ->select('diario.*,tipos.tipo')
                    ->join('tipos', 'diario.id_tipo = tipos.id_tipo', 'left')
                    ->find($id);

            if ($row) {
                $data = array(
                    'id_apunte'  => $row->id_apunte,
                    'id_tipo'    => $row->id_tipo,
                    'concepto'   => $row->concepto,
                    'cobros'     => $row->cobros,
                    'pagos'      => $row->pagos,
                    'dia'        => $row->dia,
                    'mes'        => $row->mes,
                    'ano'        => $row->ano,
                    'created_at' => $row->created_at,
                    'updated_at' => $row->updated_at,
                    'tipo'       => $row->tipo
                );

                $data['pagetitle'] = 'Diario';
                $data['botones']   = $this->botones;
                $data['retorno']   = $this->retorno;
                $data['vista']     = 'diario/diario_read';

                return $this->render($this->camino . 'diario_read', $data);
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

    public function create() {
        
        $acceso = $this->permisos->canAdmin($this->oUser);

        if ($acceso) {
            $faker      = Faker\Factory::create();
            $data = array(
                'button'   => 'Crear',                
                'action'   => site_url(ADMIN_AREA.'/diario/createOk'),
                'concepto' => set_value('concepto',$faker->realText(50, 1)),
                'cobros'   => set_value('cobros'),
                'pagos'    => set_value('pagos'),
            );

            $data['pagetitle']  = 'Apuntes/Diario';
            $data['botones']    = $this->botones;
            $data['retorno']    = $this->retorno;           
            $data['validation'] = $this->validation;

            echo $this->render($this->camino . 'form_new', $data);
        }
        else {
            $this->session->setFlashdata('error', 'Ud. No esta autorizado');
            return redirect()->to('/');
        }
    }

    public function createOk() {
        if ((strtoupper($this->request->getMethod()) !== 'POST')) {
            return $this->response->setStatusCode(405)->setBody('Method Not Allowed');
        }

        $acceso = $this->permisos->canAdmin($this->oUser);

        if ($acceso) {
            if (!$this->new_rules()) {
                $this->create();
            }
            else {

                $data  = $this->request->getPost();
                $oData = $this->oDiarioEnt;
                $oData->fill($data);

                $oData->id_tipo  = 1;
                $oData->concepto = $this->request->getPost('concepto', \FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $cobros          = $this->request->getPost('cobros');
                $pagos           = $this->request->getPost('pagos');
                $oData->dia      = date('d', time());
                $oData->mes      = date('m', time());
                $oData->ano      = date('Y', time());

                $save = (($cobros != 0) or ($pagos != 0));

                if ($save) {
                    if ($this->Diario_model->save($oData)) {
                        $this->session->setFlashdata('success', 'Creado Nuevo Registro');
                    }
                    else {
                        $this->session->setFlashdata('error', 'No Creado Nuevo Registro');
                    }
                }
                else {
                    $this->session->setFlashdata('error', 'Error. Importes no pueden ser cero');
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
         //$acceso = true;
        $acceso = $this->permisos->canEdit($this->oUser);
        if ($acceso) {
            $row = $this->Diario_model->find($id);

            if ($row) {
                
                $tipos = $this->Tipos_model
                    ->findAll();
                
                $data = array(
                    'button'     => 'Actualizar',
                    'action'     => site_url(ADMIN_AREA . '/diario/updateOk'),
                    'id_apunte'  => set_value('id_apunte', $row->id_apunte),
                    'id_tipo'    => set_value('id_tipo', $row->id_tipo),
                    'concepto'   => set_value('concepto', $row->concepto),
                    'cobros'     => set_value('cobros', $row->cobros),
                    'pagos'      => set_value('pagos', $row->pagos),
                    'tipos_data' => $tipos,
                );
        
                $data['pagetitle']  = 'Diario';
                $data['botones']    = $this->botones;
                $data['retorno']    = $this->retorno;
                $data['validation'] = $this->validation;

                echo $this->render($this->camino . 'form_up', $data);
                
            } else {
                $this->session->setFlashdata('message_diario', 'Registro No Encontrado');
                 return redirect()->to($this->retorno);           
            }
        } else {
            $this->session->setFlashdata('message', 'Ud. No esta autorizado');
            return redirect()->to('/');
        }
        
    }
    
    public function updateOk() {
        if ((strtoupper($this->request->getMethod()) !== 'POST')) {
            return $this->response->setStatusCode(405)->setBody('Method Not Allowed');
        }
        //$acceso = true;
        $acceso = $this->permisos->canEdit($this->oUser);
        if ($acceso) {
            $id_apunte = $this->request->getPost('id_apunte', \FILTER_SANITIZE_NUMBER_INT);
            if (!$this->up_rules()) {
                $this->update($id_apunte);
            }
            else {
                $update = true;

                $oData = $this->oDiarioEnt;

                $data = $this->request->getPost();
                $oData->fill($data);

                $oData->dia = date('d', time());
                $oData->mes = date('m', time());
                $oData->ano = date('Y', time());

                if ($update) {
                    if ($this->Diario_model->update($id_apunte, $oData)) {
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
        //$acceso = false;
        $acceso = $this->permisos->canDel($this->oUser);
        if ($acceso) {
            $delete = true;
            $row    = $this->Diario_model->find($id);

            if ($row) {
                if ($delete) {
                    $this->Diario_model->delete($id);
                    $this->session->setFlashdata('success', 'Registro Borrado');
                }
                else {
                    $this->session->setFlashdata('error', 'Registro No Borrado');
                }
            }
            else {
                $this->session->setFlashdata('error', 'Registro No Encontrado');
            }

            return redirect()->to($this->retorno);
        }
        else {
            $this->session->setFlashdata('danger', 'Ud. No esta autorizado');
            return redirect()->to('/');
        }
    }

    public function deletesel() {
        //$acceso = false;
        $acceso = $this->permisos->canDel($this->oUser);

        if ($acceso) {
            $delete = true;
            $ids = $this->request->getPost('selects');
            if (empty($ids)) {
                $delete = false;
                $this->session->setFlashdata('error', 'No ha seleccionado ningun apunte');
            }
            if ($delete) {
                $ids2 = array_keys($ids);

                if ($this->Diario_model->delete($ids2)) {
                    $this->session->setFlashdata('success', 'Apuntes Borrados');
                }
                else {
                    $this->session->setFlashdata('error', 'Apuntes No Borrados');
                } 
            }
            return redirect()->to($this->retorno);
        }
        else {
            $this->session->setFlashdata('danger', 'Ud. No esta autorizado');
            return redirect()->to('/');
        }
    }

    private function new_rules() {
        $this->validation->reset();
        $rules = array(            
            'concepto'     => ['label' => 'Concepto', 'rules' => 'required|string'],
            'cobros'       => ['label' => 'Cobros', 'rules' => 'decimal'],
            'pagos'        => ['label' => 'Pagos', 'rules' => 'decimal'],
           );

        $this->validation->setRules($rules);
        return $this->validate($rules);
    }
    
    private function up_rules() {
        $this->validation->reset();
        $rules = array(            
            'concepto'     => ['label' => 'Concepto', 'rules' => 'required|string'],
            'cobros'       => ['label' => 'Cobros', 'rules' => 'decimal'],
            'pagos'        => ['label' => 'Pagos', 'rules' => 'decimal'],            
            'id_apunte'    => 'integer');

        $this->validation->setRules($rules);
        return $this->validate($rules);
    }
    
//     private function crea_apuntes() {
//        $faker = Faker\Factory::create();
//        $oData = $this->oDiarioEnt;
//
//        $napuntes = $this->Diario_model->countAllResults();
//        if ($napuntes == 0) {
//            for ($i = 1; $i <= 3000; $i++) {
//                $oData->idapunte     = random_string('alnum', 32);
//                $oData->orden_tiempo = time();
//                $oData->id_tipo      = $faker->randomElement([1, 2,2,2,3,3, 4,4,4,4, 5,5,5,5, 6, 7,8,9,10,3,3,3]);
//                $oData->concepto     = 'Test #' . $i;
//                $oData->cobros       = $faker->randomFloat(2, 1, 10000);
//                $oData->pagos        = $faker->randomFloat(2, 1, 10000);
//                $oData->dia          = $faker->dayOfMonth($max = 'now');
//                $oData->mes          = $faker->month($max = 'now');
//                $oData->ano          = $faker->year($max = 'now');
//                $this->Diario_model->save($oData);
//            }
//        }
//
//        return null;
//    }
}
