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
 *   @Comienzo:  16-06-2024 10:03:43
 *   @licencia  http://opensource.org/licenses/MIT  MIT License
 *   @link      https://github.com/BlayMo
 *   @Version   1.0.0
 * 
 *   @mail: expresoweb2019@gmail.com
 * 
 *   PHP 8.2.12 + Codeigniter 4.5.X + Bootstrap 5.3 
 */
 ?>


        
<div class="card shadow mb-4" style="margin-bottom: 50px" >
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Listado de Diario</h6>
    </div>
    <div class="card-body">
        <form action="<?= site_url('diario') ?>" class="d-flex mb-2" role="search" method="post">
                    <?= csrf_field() ?>    
            <input class="form-control me-2" name="search" type="search" placeholder="buscar..." aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
        <div class="table-responsive" style="padding:5px;font-size:80%" >
            <table class="table table-bordered table-hover table-sm align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th style="text-align:center">Id Tipo</th>
                        <th style="text-align:center">Concepto</th>
                        <th style="text-align:center">Cobros</th>
                        <th style="text-align:center">Pagos</th>
                        <th style="text-align:center">Dia</th>
                        <th style="text-align:center">Mes</th>
                        <th style="text-align:center">A&ntilde;o</th>
                        <th style="text-align:center">Created At</th>

                        <th style="text-align:center" >Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($diario_data as $diario) { ?>
                        <tr>
                            <td style="text-align:center"><?php echo $diario->id_apunte ?></td>
                            <td  style="text-align:center" ><?php echo \myhtml_entity_decode($diario->id_tipo, ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></td>
                            <td  style="text-align:center" ><?php echo \myhtml_entity_decode($diario->concepto, ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></td>
                            <td  style="text-align:right"><?php echo \numero_es($diario->cobros) ?></td>
                            <td  style="text-align:right"><?php echo \numero_es($diario->pagos) ?></td>
                            <td  style="text-align:center" ><?php echo \myhtml_entity_decode($diario->dia, ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></td>
                            <td  style="text-align:center" ><?php echo \myhtml_entity_decode($diario->mes, ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></td>
                            <td  style="text-align:center" ><?php echo \myhtml_entity_decode($diario->ano, ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></td>
                            <td  style="text-align:center" ><?php echo fecha($diario->created_at) ?></td>

                            <td style="text-align:center" >
                                <?php
                                echo anchor(site_url('diario/read/' . $diario->id_apunte), $botones->btn_read);
                                //echo ' | '; 
                                //echo anchor(site_url('diario/update/' . $diario->id_apunte), $botones->btn_update);
                                //echo ' | '; 
                                //echo anchor(site_url('diario/delete/' . $diario->id_apunte), $botones->btn_delete, 'onclick="javascript: return confirm(\'Are You Sure ?\')"');
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th  style="text-align:center" >Totales</th>
                        <th  style="text-align:center" ></th>
                        <th  style="text-align:center" ></th>
                        <th  style="text-align:center" ></th>
                        <th  style="text-align:center" ></th>
                        <th  style="text-align:center" ></th>
                        <th  style="text-align:center" ></th>
                        <th  style="text-align:center" ></th>
                        <th  style="text-align:center" ></th>
                        <th  style="text-align:center" ></th>
                    </tr>
                </tfoot>
            </table>
            <div class="text-center"> 
                <a href="<?php echo site_url($retorno) ?>"><?= $botones->btn_volver() ?></a>
            </div>
        </div>
    </div>
    <div class="text-center">
   <?= $pager->links('diario', 'bonfire_full') ?>
</div>
</div>    
        
<script type="text/javascript">
    $(document).ready(function () {
        $("#mytable").dataTable();
    });
</script>
    