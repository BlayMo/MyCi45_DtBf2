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
 *   @Comienzo:  16-06-2024 11:04:23
 *   @licencia  http://opensource.org/licenses/MIT  MIT License
 *   @link      https://github.com/BlayMo
 *   @Version   1.0.0
 * 
 *   @mail: expresoweb2019@gmail.com
 * 
 *   PHP  8.2.12  + Codeigniter 4.5.X + Bootstrap 5.3
*/

namespace App\Controllers;

use App\Models\TiposModel;
use App\Controllers\BaseController;    

class Tipos extends BaseController
{
    
    private $Tipos_model;  
    private $template;
    private $navbar; 
    private $retorno;
    private $oUser;
        
    function __construct() {

        $this->Tipos_model = new TiposModel; 
        $this->oUser       = auth()->user();
        $this->retorno     = 'tipos';
        $this->template    = 'templates/header_footer_default';
        $this->navbar      = 'templates/navbar_default';
    }

    public function index(){
      
        $acceso = $this->permisos->canView($this->oUser);
        if ($acceso) {
            $tipos = $this->Tipos_model->findAll();
           
            $data = array(
                'tipos_data' => $tipos,
                'session'   => $this->session,
                'navbar'    => $this->navbar,
                'botones'   => $this->botones,
                'pagetitle' => 'Tipos' 
            );

            $data['retorno'] = $this->retorno;
            $data['vista']   = 'tipos/tipos_list';

            return view($this->template, $data);
            
        } else {
            $this->session->setFlashdata('error', 'Ud. No esta autorizado');
            return redirect()->to('/');
        }
    }

    public function read($id) {
        $acceso = $this->permisos->verTodo();
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
                $data['navbar']    = $this->navbar;
                $data['session']   = $this->session;
                $data['vista']     = 'tipos/tipos_read';

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
