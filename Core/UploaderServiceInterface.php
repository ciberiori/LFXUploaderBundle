<?php

namespace LFX\FxUploaderBundle\Core;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\RequestStack;


interface UploaderServiceInterface{
   
     const SESSION_NAME="lfx_uploader";
    
    //services
    public function setRequest(RequestStack $request);
    public function setFilesystem(Filesystem $filesystem);

    //configuration
    public function setFinder(Finder $finder);
    public function setModuleName($name);
    public function setAdminName($name);
    public function setDefaultDirName($name);
    public function setWebDir($name);
    public function isMiddleResolution(bool $bool);
    public function setRootDir($dir);
    public function setImagesBd(array $images);
    public function setImagesTmp(array $images);
    public function getImagesBd();
    public function getImagesTmp();
    public function setFullPath($path);
    public function setAdminDirsName($name);
    
    public function setSessionImages(array $images);
    public function getSessionImages();
    
    //public
    public function setup();
    public function noPostImplementation();
    
    
    //internal
    public function _prepareAdminAndModuleSessions();
    public function _prepareDataArrayBag();
    public function _prepareAdminDirectories();
    public function _createOrRecreateNormalAndTmpDirs();
    
}

?>
