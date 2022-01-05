<?php
/**
 * WP Table Manager
 *
 * @package WP Table Manager
 * @author Joomunited
 * @version 1.0
 */

use Joomunited\WPFramework\v1_0_4\Controller;
use Joomunited\WPFramework\v1_0_4\Utilities;
defined( 'ABSPATH' ) || die();

class wptmControllerTable extends Controller {
    
    public function save() {
        $id_table = Utilities::getInt('id','POST');
        $datas  = Utilities::getInput('jform','POST','none');
        $model = $this->getModel();   
        if($model->save($id_table, $datas)){
            $this->exitStatus(true);
        }else{
            $this->exitStatus( __('error while saving table','wp-smart-editor') );
        }
    }
    
    public function add(){
        $id_category = Utilities::getInt('id_category');
        $model = $this->getModel();        
        $id = $model->add($id_category);
        if($id){
            $this->exitStatus(true,array('id'=> $id ,'title'=>__('New table','wp-smart-editor')));
        }
        $this->exitStatus( __('error while adding table','wp-smart-editor') );
    }
    
    public function copy(){
        $id = Utilities::getInt('id');
        $model = $this->getModel();        
        $newItem = $model->copy($id);
        if($newItem){
            $table = $model->getItem($newItem);
            $this->exitStatus(true,array('id'=>$table->id,'title'=>$table->title) );
        }
        $this->exitStatus( __('error while adding table','wp-smart-editor') );
    }
    
    public function delete(){
        $id = Utilities::getInt('id');
        $model = $this->getModel();        
        $result = $model->delete($id);
        if($result){
            $this->exitStatus(true);
        }
        $this->exitStatus(__('An error occurred!','wp-smart-editor'));
    }
    
    public function setTitle(){
        $id = Utilities::getInt('id');
        $new_title = Utilities::getInput('title', 'GET', 'string');
        $model = $this->getModel();        
        $result = $model->setTitle($id,$new_title);
        if($result !== false){
            $this->exitStatus(true);
        }
        $this->exitStatus(__('An error occurred!','wp-smart-editor'));
    }
 
      public function order(){
      
        $tables = Utilities::getInput('data', 'GET', 'string'); 
        $model = $this->getModel();        
        $result = $model->setPosition($tables);
        if($result !== false){
            $this->exitStatus(true);
        }
        $this->exitStatus(__('An error occurred!','wp-smart-editor'));
    }
    
    
    public function changeCategory(){
      
        $id_table = Utilities::getInt('id') ; 
        $category = Utilities::getInt('category') ; 
        $model = $this->getModel();        
        $result = $model->setCategory($id_table,$category);
        if($result !== false){
            $this->exitStatus(true);
        }else {
            $this->exitStatus(__('An error occurred!','wp-smart-editor'));
        }
    }
    
}

?>
