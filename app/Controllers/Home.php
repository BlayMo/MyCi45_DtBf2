<?php

/* 
 *  CodeIgniter
 * 

 *  Copyright (c) 2014-2019 British Columbia Institute of Technology
 *  Copyright (c) 2019-2023 CodeIgniter Foundation
 * 
 *  Permission is hereby granted, free of charge, to any person obtaining 
 *  a copy of this software and associated documentation files (the “Software”),
 *  to deal in the Software without restriction, including without limitation the rights to use,
 *  copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software,
 *  and to permit persons to whom the Software is furnished to do so,
 *  subject to the following conditions:
 * 
 *  The above copyright notice and this permission notice shall be included
 *  in all copies or substantial portions of the Software.
 * 
 *  THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
 *  INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR 
 *  PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 *  HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
 *  TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE
 *  OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 * 
 * 
 *  --------------------- xxx My Codigo xxx -------------------------
 * 
 *   This content is released under the MIT License (MIT)
 * 
 *   @Proyecto: MyCi4X_XXXXX
 *   @Autor:    BlayMo
 *   @Objeto:   Aprendizaje/Desarrollo 
 *   @Comienzo: 16-06-24
 *   @licencia  http://opensource.org/licenses/MIT  MIT License
 *   @link      https://github.com/BlayMo
 *   @Version   1.0.0
 *   Copyright  2024 BlayMo.
 * 
 *   @mail: expresoweb2019@gmail.com
 * 
 *   PHP 8.2.X + Codeigniter 4.5.X + Bootstrap 5.3.X
 *   Script creado el 16-06-2024
 *   
 * 
 */

namespace App\Controllers;

class Home extends BaseController {

    private $template;
    private $navbar;
    private $retorno;

    function __construct() {

        $this->retorno  = 'home';
        $this->template = 'templates/header_footer_default';
        $this->navbar   = 'templates/navbar_default';
    }

    public function index(): string {
        $this->user_online();
        
        $data = array(
            'session'   => $this->session,
            'navbar'    => $this->navbar,
            'botones'   => $this->botones,
            'pagetitle' => 'Home'
        );

        $data['retorno'] = $this->retorno;
        $data['vista']   = 'pagina_enblanco';

        return view($this->template, $data);
    }
    
    public function features(): string {
        
        $data = array(
            'session'   => $this->session,
            'navbar'    => $this->navbar,
            'botones'   => $this->botones,
            'pagetitle' => 'Features'
        );

        $data['retorno'] = $this->retorno;
        $data['vista']   = 'features';

        return view($this->template, $data);
    }
}
