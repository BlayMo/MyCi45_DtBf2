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
 *   @Comienzo:  16-06-2024 10:03:43
 *   @licencia  http://opensource.org/licenses/MIT  MIT License
 *   @link      https://github.com/BlayMo
 *   @Version   1.0.0
 * 
 *   @mail: expresoweb2019@gmail.com
 * 
 *   PHP  8.2.12  + Codeigniter 4.5.X + Bootstrap 5.3
*/

namespace App\Controllers;

use App\Models\DiarioModel;
use \Hermawan\DataTables\DataTable;
    
use App\Controllers\BaseController;    

class Diario extends BaseController {

    private $Diario_model;
    private $template;
    private $navbar;
    private $retorno;
    private $oUser;

    function __construct() {

        $this->Diario_model = new DiarioModel;
        $this->oUser        = auth()->user();
        $this->retorno      = 'diario';
        $this->template     = 'templates/header_footer_default';
        $this->navbar       = 'templates/navbar_default';
    }

    public function index() {
        
        $acceso = $this->permisos->verTodo();
        if ($acceso) {
            
            $search  = $this->request->getPost('search',\FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($search == null) {
                $diario = $this->Diario_model
                        ->select('diario.id_apunte,diario.id_tipo,diario.concepto,'
                                . 'diario.cobros,diario.pagos,diario.dia,diario.mes,'
                                . 'diario.ano,diario.created_at,tipos.tipo')
                        ->join('tipos', 'diario.id_tipo = tipos.id_tipo', 'left')
                        ->orderBy('diario.id_apunte', 'DESC')
                        ->paginate(5, 'diario');
                $ret = 'home';
            }
            else {
                $diario = $this->Diario_model
                        ->select('diario.id_apunte,diario.id_tipo,diario.concepto,'
                                . 'diario.cobros,diario.pagos,diario.dia,diario.mes,'
                                . 'diario.ano,diario.created_at,tipos.tipo')
                        ->join('tipos', 'diario.id_tipo = tipos.id_tipo', 'left')
                        ->orderBy('diario.id_apunte', 'DESC')
                        ->like('diario.concepto', $search)
                        ->paginate(5, 'diario');
                $ret = 'diario';
            }

            $data = array(
                'diario_data' => $diario,
                'session'     => $this->session,
                'navbar'      => $this->navbar,
                'botones'     => $this->botones,
                'pager'       => $this->Diario_model->pager,
                'search'      => set_value('search',$search),
                'pagetitle'   => 'Diario'
            );

            $data['retorno'] = $ret;
            $data['vista']   = 'diario/diario_list';

            return view($this->template, $data);
            
        }
        else {
            $this->session->setFlashdata('error', 'Ud. No esta autorizado');
            return redirect()->to('/');
        }
    }
    
    public function list() {
       
        $acceso = $this->permisos->canView($this->oUser);
        if ($acceso) {
            
            $data = array(                
                'session'     => $this->session,
                'navbar'      => $this->navbar,
                'botones'     => $this->botones, 
                'diario_list' => $acceso,
                'pagetitle'   => 'Diario'
            );

            $data['retorno'] = 'home';
            $data['vista']   = 'diario/diario_list_ss';

            return view($this->template, $data);
            
        }
        else {
            $this->session->setFlashdata('error', 'Ud. No esta autorizado');
            return redirect()->to('/');
        }
    }
    
    public function dtjson() {
        
        $query = $this->db->table('diario')->select('diario.id_apunte,diario.id_tipo,diario.concepto,'
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
                        return fecha($value);
                    })                
                ->toJson(true);
    }
    
    private function add_col($row){
        
        return anchor(site_url('diario/read/'.$row->id_apunte), $this->botones->btn_read);
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
                $data['navbar']    = $this->navbar;
                $data['session']   = $this->session;
                $data['vista']     = 'diario/diario_read';

                return view($this->template, $data);
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
}
