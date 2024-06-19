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

namespace App\Modules\Diario;

use Bonfire\Core\BaseModule;
use Bonfire\Menus\MenuItem;
use Bonfire\Widgets\Types\Stats\StatsItem;

use App\Modules\Diario\Models\DiarioModel;

class Module extends BaseModule
{
    public function initAdmin()
    {
        $sidebar = service('menus');
         // Content Menu for sidebar
        $item2 = new MenuItem([
            'title'           => 'Diario',
            'namedRoute'      => ADMIN_AREA .'/diario',
            'fontAwesomeIcon' => 'fas fa-tasks',
            'permission'      => 'diario.list',
        ]);
        $sidebar->menu('sidebar')->collection('content')->addItem($item2);
        
        $item3 = new MenuItem([
            'title'           => 'Diario SS',
            'namedRoute'      => ADMIN_AREA .'/listss',
            'fontAwesomeIcon' => 'fas fa-tasks',
            'permission'      => 'diario.list',
        ]);
        $sidebar->menu('sidebar')->collection('content')->addItem($item3);
        
        $widgets   = service('widgets');
        $apuntes   = new DiarioModel();
        $statsItem = new StatsItem([
            'bgColor' => 'bg-blue',
            'title'   => 'Diario',
            'value'   => $apuntes->select('diario.id_apunte')->countAllResults(),
            'url'     => ADMIN_AREA . '/diario',
            'faIcon'  => 'fas fa-tasks',
        ]);
        $widgets->widget("stats")->collection('stats')->addItem($statsItem);
    }
}