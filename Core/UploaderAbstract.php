<?php

namespace LFX\FxUploaderBundle\Core;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

class UploaderAbstract {
   
    
   
    protected $request;
    protected $path;
    protected $finder;
    protected $filesystem;
  
    
    protected function _checkAJAXRequest(){
        
        if(!$this->request->getCurrentRequest()->isXmlHttpRequest()){
            
            throw new \LogicException("Este componente solo puede ser accedido mediante AJAX");
        }   
    }
    
    public function setFullPath($path){
         
         $this->path=$path;
         
     } 
     
     
     public function setRequest(RequestStack $request){
         
         $this->request=$request;
     }
     
     
     public function setFinder(Finder $finder){
         
         $this->finder=$finder;
         
     }
     
     
     public function setFileSystem(Filesystem $filesystem){
         
         $this->filesystem=$filesystem;
         
     }
}

?>
