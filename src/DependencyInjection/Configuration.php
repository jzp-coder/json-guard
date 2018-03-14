<?php

namespace JzpCoder\JsonGuard\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('json_guard');

        $rootNode
            ->children()
                ->scalarNode('json_schema_root_path')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('cache')
                    ->cannotBeEmpty()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}