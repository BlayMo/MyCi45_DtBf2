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
 *   PHP  8.2.12  + Codeigniter 4.5.X + Bootstrap 5.3 
 */
 ?>

<?php $this->extend('master') ?>

<?php $this->section('main') ?>
<x-page-head>    
    <h4 class='m-0 font-weight-bold text-primary'><?php echo $button ?> Apunte</h4>    
</x-page-head>
<div class="alert danger">

</div>
<x-admin-box>
    <div class="card shadow mb-4" style="margin-top: 10px;margin-bottom: 50px" >
        <div class="card-body">
            <!--<form class="row g-3">-->
                <?php echo form_open($action, ' class="row g-3"'); ?>                
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="concepto">Concepto <?php echo '<span style="color:red"><small>' . $validation->getError('concepto') . '</small></span>' ?></label>
                        <input type="text" class="form-control" name="concepto" id="concepto" autocomplete="off" placeholder="Concepto" value="<?php echo $concepto; ?>" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="id_tipo">Id Tipo #<?php echo $id_tipo; ?></label>
                        
                        <select name="id_tipo" class="form-control">    
                            <option value="<?php echo $id_tipo; ?>" selected>Tipos</option>
                            <?php foreach ($tipos_data as $tipos) { ?>
                                <option value="<?= $tipos->id_tipo ?>"><?= $tipos->tipo ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label" for="cobros">Cobros <?php echo '<span style="color:red"><small>' . $validation->getError('cobros') . '</small></span>' ?></label>
                        <input type="number" class="form-control" name="cobros" id="cobros" step=".01" value="<?= $cobros ?>"  >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label" for="pagos">Pagos <?php echo '<span style="color:red"><small>' . $validation->getError('pagos') . '</small></span>' ?></label>
                        <input type="number" class="form-control" name="pagos" id="pagos" step=".01" value="<?= $pagos ?>" >
                    </div>
                </div>


                <input type="hidden" name="id_apunte" value="<?php echo $id_apunte; ?>" > 
                <div class="text-center"> 
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    <a href="<?php echo site_url($retorno) ?>"><?= $botones->btn_volver() ?></a>
                </div>
            </form>
        </div>
    </div>
</x-admin-box>

<?php $this->endSection() ?>    