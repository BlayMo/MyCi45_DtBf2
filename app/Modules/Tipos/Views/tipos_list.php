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
 *   @Proyecto: MyCi4_XXXXX
 *   @Autor:    BlayMo
 *   @Objeto:   Aprendizaje/Desarrollo 
 *   @Comienzo:  12-06-2024 10:58:30
 *   @licencia  http://opensource.org/licenses/MIT  MIT License
 *   @link      https://github.com/BlayMo
 *   @Version   1.0.0
 * 
 *   @mail: expresoweb2019@gmail.com
 * 
 *   PHP 8.2.12 + Codeigniter 4.4.1 + Bootstrap 4,5 
 */
 ?>

<?php $this->extend('master') ?>
<?php $this->section('main') ?>
<x-page-head>
   <div class="row">
      <div class="col">
         <h2><?= $pagetitle ?></h2>
      </div>
      <?php if (auth()->user()->can('tipos.create')): ?>
      <div class="col-auto">
         <a href="<?= site_url(ADMIN_AREA.'/tipos/create') ?>" class="btn btn-primary"><span class="fa fa-plus"></span> Nuevo Tipo</a>
      </div>
      <?php endif ?>
   </div>
</x-page-head>
<x-admin-box>
   <div class="table-responsive" style="padding:5px;font-size:80%">
      <table class="table table-bordered table-hover table-sm align-middle" id="mytable">
         <thead>
            <tr>
               <th>#</th>
               <th style="text-align:center">Tipo</th>
               <th style="text-align:center">Fecha</th>
               <th style="text-align:center">Opciones</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($tipos_data as $tipos) { ?>
            <tr>
               <td style="text-align:center"><?php echo $tipos->id_tipo ?></td>
               <td  style="text-align:center"><?php echo \myhtml_entity_decode($tipos->tipo, ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></td>
               <td  style="text-align:center"><?php echo \myhtml_entity_decode($tipos->created_at, ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></td>
               <td style="text-align:center">
                  <?php
                     echo anchor(site_url(ADMIN_AREA.'/tipos/read/' . $tipos->id_tipo), $botones->btn_read);
                     //echo ' | '; 
                     echo anchor(site_url(ADMIN_AREA.'/tipos/update/' . $tipos->id_tipo), $botones->btn_update);
                     //echo ' | '; 
                     echo anchor(site_url(ADMIN_AREA.'/tipos/delete/' . $tipos->id_tipo), $botones->btn_delete, 'onclick="javascript: return confirm(\'Are You Sure ?\')"');
                     ?>
               </td>
            </tr>
            <?php } ?>
         </tbody>
      </table>
   </div>
</x-admin-box>
<?php $this->endSection() ?>
<?php $this->section('scripts') ?>
<script>
   $(document).ready(function () {
       $("#mytable").dataTable({                
           "lengthMenu": [ [ 5,10,20, 50, 100, -1], [5,10, 20, 50, 100, "Todo"] ],
            "columnDefs": [
                       { "orderable": false, "targets": 3 }                             
                     ],
           "order": [[ 0, "asc" ]],
           "responsive": false,
           "processing": true,
           "paging": true 
          });                          
   }); 
</script>
<?php $this->endSection() ?>
