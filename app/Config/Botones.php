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
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 * 
 *  The above copyright notice and this permission notice shall be included in
 *  all copies or substantial portions of the Software.
 * 
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 *  THE SOFTWARE.
 * 
 *  @package    CodeIgniter
 *  @author     CodeIgniter Dev Team
 *  @copyright  2019-2020 CodeIgniter Foundation
 *  @license    https://opensource.org/licenses/MIT  MIT License
 *  @link       https://codeigniter.com
 *  @since      Version 4.0.0
 *  @filesource
 *  

 *  --------------------- xxx My Codigo xxx -------------------------
 * 
 *   This content is released under the MIT License (MIT)
 * 
 *   @Proyecto: MyCi4_PHPAuth
 *   @Autor:    BlayMo-ExpresoWeb
 *   @Objeto:   Aprendizaje/Desarrollo 
 *   @Comienzo: 27-09-2020
 *   @licencia  http://opensource.org/licenses/MIT  MIT License
 *   @link      https://github.com/BlayMo
 *   @Version   1.0.0
 * 
 *   @mail: expresoweb2019@gmail.com
 */


namespace Config;
use CodeIgniter\Config\BaseConfig;

class Botones extends BaseConfig {

    public $btn_cerrar      = '<button type="button" class="btn  btn-success btn-sm m-1" ><i class="bi bi-door-closed"></i>  Cerrar</button>';
    public $btn_abrir       = '<button type="button" class="btn  btn-warning btn-sm m-1" ><i class="bi bi-door-open"></i>  Abrir</button>';
    public $btn_read        = '<button type="button" class="btn  btn-info btn-sm m-1"    ><i class="bi bi-eye"></i>  Ver</button>';
    public $btn_update      = '<button type="button" class="btn  btn-primary btn-sm m-1" ><i class="bi bi-pencil"></i>  Edita</button>';
    public $btn_delete      = '<button type="button" class="btn  btn-danger btn-sm m-1"  ><i class="bi bi-trash"></i> Borra</button>';
    public $btn_del         = '<button type="button" class="btn  btn-danger btn-sm m-1"  ><i class="bi bi-trash"></i> </button>';
    public $btn_crea_subcat = '<button type="button" class="btn  btn-success btn-sm m-1" ><i class="bi bi-folder-plus"></i> Crear Subcat.</button>';
    public $btn_pdf         = '<button type="button" class="btn  btn-warning btn-sm m-1" ><i class="bi bi-file-pdf"></i> Pdf</button>';
    public $btn_up_permiso  = '<button type="button" class="btn  btn-primary btn-sm m-1" ><i class="bi bi-pencil"></i></button>';
    public $btn_si_permiso  = '<button type="button" class="btn  btn-info btn-sm m-1"    ><i class="bi bi-check2-square"></i> Autoriza</button>';
    public $btn_abono       = '<button type="button" class="btn  btn-danger btn-sm m-1"  ><i class="bi bi-recycle"></i> Abonar</button>';
    public $btn_cargo       = '<button type="button" class="btn  btn-warning btn-sm m-1" ><i class="bi bi-box-arrow-in-up"></i> Cargar</button>';
    
    public function btn_crear($texto){
        return '<button type="button" class="btn  btn-primary btn-sm m-1" ><i class="bi bi-plus-circle"></i> '.$texto.'</button>';
    }
    
    public function btn_danger($texto){
        return '<button type="button" class="btn  btn-danger btn-sm m-1"  ><i class="bi bi-radioactive"></i> '. $texto.'</button>';
    }
    
    public function btn_volver(){
        return '<button type="button" class="btn  btn-danger  btn-block"><i class="bi bi-arrow-90deg-left"></i> Volver</button>';
    }
    
    public function btn_read($texto){
        return '<button type="button" class="btn  btn-info btn-sm m-1"    ><i class="bi bi-eye"></i> '.$texto.'</button>';
    }
}
