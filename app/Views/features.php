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
 *   Script creado el 17-06-2024
 *   
 *   php spark db:seed App\Database\Seeds\Tipos
 */
?>

<div class='card shadow mt-5 mb-4'>
    <div class='card-header py-3'>
        <h4 class='m-0 font-weight-bold text-primary'><?= \TITLE_MAIN ?></h4>
    </div>
    <div class='card-body'>
        
        <h2 class="text-center lead"><b>Codeigniter 4 + Datatables + Bonfire2</b></h2>
        <hr>
        <p>He realizado este simple  ejercicio de CRUD para integrar Ci4, Bonfire2, Datatables.</p>
        <p>En el Front se muestra una simple tabla de falsos apuntes contables.</p>
        <p>En el Backend, la gestión administrativa está soportada por Bonfire2.</p>
        <p>He creado para esta demo, dos tablas con datos falsos: 'Diario' y 'Tipos'.</p>
        <hr>
        <ul><b>Instalación:</b>
            <li>Clonar este proyecto</li>
            <li>Ejecutar: <code>Composer install</code></li>
            <li>Seguir al pie de la letra las instrucciones de instalacion de <a href="https://lonnieezell.github.io/Bonfire2/" target="_blank">Bonfire2</a></li>
            <li>Ejecutar en la 'db' el archivo: <code>App\Database\myci45_dtbf2.sql</code></li>
            <li>Ejecutar: <code>php spark db:seed App\Database\Seeds\Tipos</code></li>
            <li>Ejecutar: <code>php spark db:seed App\Database\Seeds\Diario</code></li>
        </ul>
        <hr>
        <ul><b>Software empleado:</b>
            <li>Codeigniter 4.5.1</li>
            <li>En el front la plantilla de <a href="https://startbootstrap.com/template/bare" target="_blank">Startbootstrap</a></li>
            <li><a href="https://lonnieezell.github.io/Bonfire2/" target="_blank">Bonfire2</a></li>
            <li><a href="https://github.com/hermawanramadhan/CodeIgniter4-DataTables" target="_blank">Codeigniter4-Datatables</a></li>
        </ul>
        <hr>
        <p>Front
        <img src="./img/front_1.png" width="100%" height="auto" alt="front_1"/>
        </p>
        <hr>
        <p>Backend
        <img src="./img/admin_1.png" width="100%" height="auto" alt="admin_1"/>
        <img src="./img/admin_2.png" width="100%" height="auto" alt="admin_2"/>
        </p>
        <div class="container text-center mt-5">
            <p><a href="<?php echo site_url($retorno) ?>" class="btn  btn-primary ">Volver</a></p>
        </div>
    </div>
</div>


