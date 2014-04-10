<?php

namespace LFX\FxUploaderBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class LFXUploaderExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    
    
    public function load(array $configs, ContainerBuilder $container)
    {   
        
        
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
       
      $full_path=null;  
        
      if($container->hasDefinition("lfx_uploader")){
          
          $full_path=dirname($container->getParameter("kernel.root_dir"))."/".$config["web_dir"];
          $uploader=$container->getDefinition("lfx_uploader");
          $uploader->addMethodCall("setAdminDirsName",array($config["admins_dir_name"]));
          $uploader->addMethodCall("setDefaultDirName",array($config["images_dir"]));
          $uploader->addMethodCall("setWebDir", array($full_path));
          $uploader->addMethodCall("setRootDir", array($container->getParameter("kernel.root_dir")));
       
      }
      
      if($container->hasDefinition("lfx_uploader_response")){
          
          $response=$container->getDefinition("lfx_uploader_response");
          $response->addMethodCall("setFullPath",array($full_path."/".$config["images_dir"]."/".$config["admins_dir_name"]));
          
          
      }
        
    }
}