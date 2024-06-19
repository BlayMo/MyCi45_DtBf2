<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

?>

<td style="text-align:center"><?php echo $diario->id_apunte?></td>
<td style="text-align:center"><?php echo $diario->id_tipo?></td>
<td  style="text-align:left" ><?php echo \myhtml_entity_decode($diario->concepto.'/'.$diario->tipo,ENT_QUOTES | ENT_HTML5,'UTF-8') ?></td>
<td  style="text-align:right" ><?php echo \numero_es($diario->cobros) ?></td>
<td  style="text-align:right" ><?php echo \numero_es($diario->pagos) ?></td>
<td  style="text-align:center" ><?php echo \myhtml_entity_decode($diario->dia,ENT_QUOTES | ENT_HTML5,'UTF-8') ?></td>
<td  style="text-align:center" ><?php echo \myhtml_entity_decode($diario->mes,ENT_QUOTES | ENT_HTML5,'UTF-8') ?></td>
<td  style="text-align:center" ><?php echo \myhtml_entity_decode($diario->ano,ENT_QUOTES | ENT_HTML5,'UTF-8') ?></td>
<td  style="text-align:left" ><?php echo app_date($diario->created_at) ?></td>

<td style="text-align:center" >
    <?php 
    echo anchor(site_url(ADMIN_AREA.'/diario/read/'.$diario->id_apunte),$botones->btn_read); 
    //echo ' | '; 
    echo anchor(site_url(ADMIN_AREA.'/diario/update/'.$diario->id_apunte),$botones->btn_update); 
    //echo ' | '; 
    echo anchor(site_url(ADMIN_AREA.'/diario/delete/'.$diario->id_apunte),$botones->btn_delete,'onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
    ?>
</td>