<?php

/* 
 * The MIT License
 *
 * Copyright 2024 usuario.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
$assets = base_url('stb');
if (!isset($diario_list)){
    $diario_list = false;
}
?>
<!DOCTYPE html>
<html lang="<?= service('request')->getLocale() ?>">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?=TITLE_MAIN?></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?=$assets?>/css/styles.css" rel="stylesheet" />
        <link href="<?=$assets?>/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.0.7/r-3.0.2/datatables.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"  rel="stylesheet">
    </head>
    <body>
        <?php if (has_consent('performing')) : ?>
        <script>
            <!-- Global Site Tag (gtag.js) - Google Analytics -->
        </script>
        <?php endif ?>
        
        <!-- Responsive navbar-->
        <?php echo view($navbar)?>
        <!-- Page content-->
        <div class="container">
            <div class="text-center mt-5">
                <aside id="alerts-wrapper">
                    {alerts}
                </aside>
                <h1><?=TITLE_MAIN?></h1>                
                <p>Integraci&oacute;n de Codeigniter 4.5.1 + Bonfire 2 (Beta) + Datatables + Bootstrap v5.3.3</p>
            </div> 
            <?php if($session->is_login){?>
            <div class="text-center">
                <span class="lead">On line: <?=$session->username?></span>
            </div>
            <?php }?>
            <?php echo view($vista)?>             
        </div>
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                
                <p class="col-md-4 mb-0 text-body-secondary">&copy; 2024 Company, Inc,<br/> Page rendered in {elapsed_time} seconds using {memory_usage} MB of memory</p>

                <ul class="nav col-md-4 justify-content-end">
                    <li class="nav-item"><a href="<?=site_url('/')?>" class="nav-link px-2 text-body-secondary">Inicio</a></li>
                    <li class="nav-item"><a href="<?=site_url('features')?>" class="nav-link px-2 text-body-secondary">Que es esto</a></li>
                    <li class="nav-item"><a href="https://github.com/BlayMo" class="nav-link px-2 text-body-secondary">Sobre Mi</a></li>
                </ul>
            </footer>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?=$assets?>/js/scripts.js"></script>
        <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.0.7/r-3.0.2/datatables.min.js"></script>
        <?php if(($session->is_login)||($diario_list)){?>
        <script type="text/javascript">
         $(document).ready(function () {
             $("#mytable").dataTable({
                  "lengthMenu": [ [5,10,20, 50, 100, -1], [5,10, 20, 50, 100, "Todo"] ]
             });
         });
      </script>
      <script type="text/javascript">
         $(document).ready(function () {
             $("#mytable_tipos").dataTable({
                "lengthMenu": [ [5,10,20, 50, 100, -1], [5,10, 20, 50, 100, "Todo"] ],
                 order: [[ 0, "asc" ]],
                 searching: true,
                 responsive: true,
                 processing: true, 
                  "columnDefs": [
                     { "orderable": false, "targets": [-1] }                             
                   ]
             });
         });
      </script>
      <script>         
         $(document).ready(function () {
             $("#mytable_ss").dataTable({                
                 lengthMenu: [ [5,10, 20, 50, 100, -1], [ 5,10,20, 50, 100, "Todo"] ],                  
                 order: [[ 0, "asc" ]],
                 searching: true,
                 responsive: true,
                 processing: true,               
                 serverSide: true,                 
                 ajax: {url: "<?=site_url('diario_ss')?>",type: "post"},                 
                 columns: [
                            {"data": "id_apunte"},
                            {"data": "tipo"},
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
        <?php }?>
    </body>
</html>
