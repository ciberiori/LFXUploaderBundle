<?php

namespace LFX\FxUploaderBundle\Core;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Finder\Finder;


class UploaderService implements   UploaderServiceInterface{
    
    //core
    public $images_tmp;
    public $images_bd;
    
    //configuration
    private $_module_name=null;
    private $_admin_name=null;
    private $_default_dir_name=null;
    private $_is_middle_resolution=false;
    private $_web_dir=null;
    private $_root_dir=null;
    private $_full_path=null;
    private $_full_tmp_path=null;
    private $_admin_dirs_name=null;
    
    //other Services
    private $finder=null;
    private $filesystem;
    private $request;
    
    
    
    public function __construct() {
    }
    
     public function setModuleName($name) {
        $this->_module_name=$name;
    }
    
    public function setAdminDirsName($dir){
        
        $this->_admin_dirs_name=$dir;
        
    }

    public function setup() {
       
        $this->_checkErrorsAndExceptions(); 
        $this->_prepareDataArrayBag();
        $this->_prepareAdminDirectories();
    }   
    
    public function setWebDir($name) {
        $this->_web_dir=$name;
    }
    
    public function setAdminName($name) {
        $this->_admin_name=$name;
    }

    public function setDefaultDirName($name) {
        $this->_default_dir_name=$name;
    }
    
    public function isMiddleResolution(bool $bool) {
        $this->_is_middle_resolution=$bool;
    }
    
    
    
    public function _checkErrorsAndExceptions() {
        
 if(is_null($this->_module_name)){
            
            throw new \LogicException("Nombre de modulo (setModuleName())");
            }
        
    }


    public function _createOrRecreateNormalAndTmpDirs() {
        
    }

   

    public function _prepareDataArrayBag() {
        $this->images_bd=array();
        $this->images_tmp=array();
    }

    

    
    

    public function setFinder(Finder $finder) {
        
        $this->finder=$finder;
    }

    public function setFilesystem(Filesystem $filesystem) {
        $this->filesystem=$filesystem;
    }

    public function setRequest(RequestStack $request) {
        $this->request=$request;
    }

    public function setRootDir($dir) {
        $this->_root_dir=$dir;
    }
    
     public function _prepareAdminDirectories() {
        
       if(!$this->filesystem->exists($this->_web_dir."/".$this->_default_dir_name."/".$this->_admin_dirs_name)){
           
           
           
           $this->filesystem->mkdir(array($this->_web_dir."/".$this->_default_dir_name."/".$this->_admin_dirs_name."/repository",
                                          $this->_web_dir."/".$this->_default_dir_name."/".$this->_admin_dirs_name."/repository/img_normal",
                                          $this->_web_dir."/".$this->_default_dir_name."/".$this->_admin_dirs_name."/repository/img_thumbnail"
                                          ));
         
          
     
          
           
       }
       
        $this->_full_path=$this->_web_dir."/".$this->_default_dir_name."/".$this->_admin_dirs_name."/repository";
        $this->_full_tmp_path=$this->_web_dir."/".$this->_default_dir_name."/".$this->_admin_dirs_name."/temp/".$this->_admin_name."/".$this->_module_name;
        
    }
    

    public function noPostImplementation() {
        
        $this->request->getCurrentRequest()->getSession()->set(UploaderServiceInterface::SESSION_NAME,array());
        
         if(!$this->filesystem->exists($this->_full_tmp_path."/img_normal_tmp") && 
            !$this->filesystem->exists($this->_full_tmp_path."/img_thumbail_tmp")){
                   
                   $this->filesystem->mkdir($this->_full_tmp_path."/img_normal_tmp");
                   $this->filesystem->mkdir($this->_full_tmp_path."/img_thumbail_tmp");
                   
               }else{
                   
                   $this->filesystem->remove($this->_full_tmp_path."/img_normal_tmp");
                   $this->filesystem->remove($this->_full_tmp_path."/img_thumbail_tmp");
                   
                   $this->filesystem->mkdir($this->_full_tmp_path."/img_normal_tmp");
                   $this->filesystem->mkdir($this->_full_tmp_path."/img_thumbail_tmp");  
               }
    }

    public function setImagesBd(array $images) {
        
        $this->images_bd=$images;
    }
    
     public function setImagesTmp(array $images) {
        $this->images_tmp=$images;
    }

    public function getImagesBd() {
        return $this->images_bd;
    }

    public function getImagesTmp() {
        return $this->images_tmp;
    }

   public function getSessionImages(){
       
       
       return $this->request->getCurrentRequest()->getSession()->get(UploaderServiceInterface::SESSION_NAME);
   }

    public function setSessionImages(array $images) {
        
        $this->request->getCurrentRequest()->getSession()->set(UploaderServiceInterface::SESSION_NAME,$images);
    }

    public function setFullPath($path) {
        $this->_full_path=$path;
    }

    public function _prepareAdminAndModuleSessions() {
        $this->request->getCurrentRequest()->getSession()->set(UploaderServiceInterface::SESSION_NAME."_username",$this->_admin_name);
        $this->request->getCurrentRequest()->getSession()->set(UploaderServiceInterface::SESSION_NAME."_module_name",$this->_module_name);     
    }

   
    }

?>
