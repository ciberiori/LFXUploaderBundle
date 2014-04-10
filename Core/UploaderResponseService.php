<?php

namespace LFX\FxUploaderBundle\Core;

use LFX\FxUploaderBundle\Core\UploaderAbstract;
use Imagine\Gd\Imagine;

class UploaderResponseService extends UploaderAbstract implements UploaderResponseServiceInterface {
    
    
    private $imagine=null;
    
    private $_request_ajax_name=null;
   
    
    
    
    public function _catchSessionData() {
        
    }

    public function _extractFiles() {
        
    }

    public function getRequestAjaxName() {
        return $this->_request_ajax_name;
    }

    public function setImagine(Imagine $imagine) {
        
        $this->imagine=$imagine;
    }

    public function setRequestAjaxName($request_name) {
        $this->_request_ajax_name=$request_name;
    }      
}

?>
