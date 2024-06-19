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
    
namespace App\Models;
use CodeIgniter\Model;

class DiarioModel extends Model{

    protected $table                = 'diario';
    
    protected $order                = 'diario.id_apunte DESC';
    protected $primaryKey           = 'id_apunte';
    protected $DBGroup;
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;

    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $returnType           = 'object';
         
    protected $allowedFields = [
		'id_tipo', 
		'concepto', 
		'cobros', 
		'pagos', 
		'dia', 
		'mes', 
		'ano', 
		'created_at', 
		'updated_at', 
		];

    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    //protected $deletedField         = 'deleted_at';

    
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];    
    protected $builder;  
    
    protected function initialize()
    {
        $this->DBGroup = $this->db->defaultGroup;
    }
    
    // get  search
    function busca_data($q = '') {
    
        $this->builder = $this->db->table($this->table);
        
        $query = $this->builder
        		->orderBy($this->order)
        		->like('id_apunte', $q)
			->orLike('id_tipo', $q)
			->orLike('concepto', $q)
			->orLike('cobros', $q)
			->orLike('pagos', $q)
			->orLike('dia', $q)
			->orLike('mes', $q)
			->orLike('ano', $q)
			->orLike('created_at', $q)
			->orLike('updated_at', $q)
			->get();
    
        return $query->getResult();
    }

    // datatables
    function json() {
        $this->datatables->select('diario.id_apunte,diario.id_tipo,diario.concepto,diario.cobros,diario.pagos,diario.dia,diario.mes,diario.ano,diario.created_at,diario.updated_at');
        $this->datatables->from('diario');
        //add this line for join
        //$this->datatables->join('table2', 'diario.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('diario/read/$1'),'Read')." | ".anchor(site_url('diario/update/$1'),'Update')." | ".anchor(site_url('diario/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_apunte');
        return $this->datatables->generate();
    }
    
    
}
