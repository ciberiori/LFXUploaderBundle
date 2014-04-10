<?php

namespace LFX\FxUploaderBundle\Core;

use Imagine\Gd\Imagine;

interface UploaderResponseServiceInterface {
   
   
    
    public function setRequestAjaxName($request_name);
    public function getRequestAjaxName();
    
    
    //internal
    public function _catchSessionData();
    public function setImagine(Imagine $imagine);

    public function _extractFiles();
    
    
}

?>
