<?php

namespace LFX\FxUploaderBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use LFX\FxUploaderBundle\DependencyInjection\LFXUploaderExtension;

class LFXFxUploaderBundle extends Bundle
{
    
      
        public function build(ContainerBuilder $container) {
            parent::build($container);
            
            $container->registerExtension(new LFXUploaderExtension());
        }

    
}
