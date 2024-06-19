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
 *  Datatbles css, js incluidos en Themes/Admin/master.php
   ***************************************
*/?>

<?php $this->extend('master') ?>

<?php $this->section('main') ?>
    <x-page-head>
        <div class="row">
            <div class="col">
                <h2><?= $pagetitle ?></h2>
            </div>
            <?php if (auth()->user()->can('diario.create')): ?>
                <div class="col-auto">
                    <a href="<?= site_url(ADMIN_AREA.'/diario/create') ?>" class="btn btn-primary"><span class="fa fa-plus"></span> Nuevo Apunte</a>
                </div>
            <?php endif ?>
        </div>
    </x-page-head>

<x-admin-box>
    <div class="table-responsive" style="font-size:80%" >
        <table class="table table-bordered table-hover table-sm align-middle" id="mytable_ss">
            <thead>
                <tr>
                    <th style="text-align:center">#</th>
                    <th style="text-align:center">Tipo</th>
                    <th style="text-align:center">Concepto</th>
                    <th style="text-align:center">Cobros</th>
                    <th style="text-align:center">Pagos</th>
                    <th style="text-align:center">Dia</th>
                    <th style="text-align:center">Mes</th>
                    <th style="text-align:center">A&ntilde;o</th>
                    <th style="text-align:center">Fecha</th>
                    <th style="text-align:center">Opciones</th>
                </tr>
            </thead>
        </table>
    </div>
</x-admin-box>
<?php $this->endSection() ?>

<?php $this->section('scripts') ?>

<script>         
         $(document).ready(function () {
             $("#mytable_ss").dataTable({                
                 lengthMenu: [ [5,10, 20, 50, 100, -1], [ 5,10,20, 50, 100, "Todo"] ],                  
                 order: [[ 0, "asc" ]],
                 searching: true,
                 responsive: true,
                 processing: true,               
                 serverSide: true,                 
                 ajax: {url: "<?=site_url(ADMIN_AREA.'/diario_ss')?>",type: "post"},                 
                 columns: [
                            {"data": "id_apunte"},
                            {"data": "id_tipo"},
                            {"data": "concepto"},
                            {"data": "cobros"},
                            {"data": "pagos"},
                            {"data": "dia"},
                            {"data": "mes"},
                            {"data": "ano"},   
                            {"data": "created_at"},
                            {"data": "action"}
                        ],
                columnDefs: [
                        { targets: 0, className: 'dt-body-center'},
                        { targets: [1,5,6,7,8], className: 'dt-body-center'},
                        { targets: -1, orderable: false,className: 'dt-body-center'},
                        { targets: 3, className: 'dt-body-right'},
                        { targets: 4, className: 'dt-body-right'}
                    ]
                });                          
         }); 
    </script>
<?php $this->endSection() ?>
