<?php

namespace FDevs\Bridge\MetaPage\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class MetaTypePass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if ($container->has('f_devs.meta_page.meta_registry')) {
            $definition = $container->findDefinition('f_devs.meta_page.meta_registry');
            $taggedServices = $container->findTaggedServiceIds('f_devs.meta_page.type');
            foreach ($taggedServices as $id => $tags) {
                $definition->addMethodCall('addType', [new Reference($id)]);
            }
        }
    }
}
