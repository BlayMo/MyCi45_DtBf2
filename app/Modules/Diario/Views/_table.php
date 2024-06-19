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
?>
<div class="table-responsive" style="font-size:80%">
    <table class="table table-bordered table-hover table-sm align-middle" id="<?=$table_id?>">   
      <?php //echo $this->include('_table_head') ?>
       <thead>
           <tr class="table-primary">
               <th>...</th>
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
       <thead>
      <tbody>
         <?php foreach ($diario_data as $diario) : ?>
         <tr>
            <td>
               <input type="checkbox" name="selects[<?= $diario->id_apunte ?>]" class="form-check">
            </td>
            <td style="text-align:center"><?php echo $diario->id_apunte?></td>
            <td style="text-align:center"><?php echo $diario->id_tipo?></td>
            <td  style="text-align:left"><?php echo \myhtml_entity_decode($diario->concepto.'/'.$diario->tipo,ENT_QUOTES | ENT_HTML5,'UTF-8') ?></td>
            <td  style="text-align:right"><?php echo \numero_es($diario->cobros) ?></td>
            <td  style="text-align:right"><?php echo \numero_es($diario->pagos) ?></td>
            <td  style="text-align:center"><?php echo \myhtml_entity_decode($diario->dia,ENT_QUOTES | ENT_HTML5,'UTF-8') ?></td>
            <td  style="text-align:center"><?php echo \myhtml_entity_decode($diario->mes,ENT_QUOTES | ENT_HTML5,'UTF-8') ?></td>
            <td  style="text-align:center"><?php echo \myhtml_entity_decode($diario->ano,ENT_QUOTES | ENT_HTML5,'UTF-8') ?></td>
            <td  style="text-align:left"><?php echo app_date($diario->created_at) ?></td>
            <td style="text-align:center">
               <?php 
                  echo anchor(site_url(ADMIN_AREA.'/diario/read/'.$diario->id_apunte),$botones->btn_read);
                  echo anchor(site_url(ADMIN_AREA.'/diario/update/'.$diario->id_apunte),$botones->btn_update); 
                  echo anchor(site_url(ADMIN_AREA.'/diario/delete/'.$diario->id_apunte),$botones->btn_delete,'onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
                  ?>
            </td>
         </tr>
         <?php endforeach ?>        
      </tbody>
   </table>
</div>
<?php if (auth()->user()->can('diario.delete')) : ?>
    <x-button color="outline-danger">Del</x-button>
<?php endif ?>
<?php if ($paginado){?>
<div class="text-center">
   <?= $pager->links('diario', 'bonfire_full') ?>
</div>
<?php } ?>
