<?php

namespace JzpCoder\JGBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class JsonGuardExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
//        $loader = new YamlFileLoader(
//            $container,
//            new FileLocator(__DIR__ . '/../Resources/config')
//        );
//        $loader->load('services.yaml');
//
//        $processor = new Processor();
//        $config = $processor->processConfiguration(new Configuration(), $configs);
//
//        $container->setParameter(
//            'json_guard_bundle.json_schema_root_path',
//            $config['json_guard_bundle']['json_schema_root_path']
//        );
    }

    public function getAlias()
    {
        return 'json_guard_bundle';
    }
}