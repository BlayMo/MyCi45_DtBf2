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
 *   Script creado el 18-06-2024
 *   
 * 
 */

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use Faker;

class Diario extends Seeder
{
    public function run() {
        $faker        = Faker\Factory::create();
        $oData        = new \stdClass();
        $this->db->table('diario')->truncate();
        
        for ($i = 1; $i <= 3000; $i++) {
            $oData->id_tipo      = $faker->randomElement([1, 2, 2, 2, 3, 3, 4,
                                                           4, 4, 4, 5, 5, 5, 5,
                                                           6, 7, 8, 9, 10, 3, 3, 3]);
            $oData->concepto     = 'Apunte Tipo '.$oData->id_tipo;
            $oData->cobros       = $faker->randomFloat(2, 1, 10000);
            $oData->pagos        = $faker->randomFloat(2, 1, 10000);
            $oData->dia          = $faker->dayOfMonth($max = 'now');
            $oData->mes          = $faker->month($max = 'now');
            $oData->ano          = $faker->year($max = 'now');
            $this->db->table('diario')->insert($oData);
        }
    }
}
