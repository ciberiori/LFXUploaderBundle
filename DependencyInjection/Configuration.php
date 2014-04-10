<?php

namespace LFX\FxUploaderBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('lfx_uploader')
                 ->children()
                 ->scalarNode("web_dir")
                 ->defaultValue("web")
                 ->isRequired()
                 ->end()
                 ->scalarNode("images_dir")
                 ->defaultValue("images")
                 ->isRequired()
                 ->end()
                 ->scalarNode("admins_dir_name")
                 ->defaultValue("uploaderfx")
                 ->end()
                 ->end();        
       
        return $treeBuilder;
    }
}
