<?php

namespace FDevs\Bridge\MetaPage\Twig;

use FDevs\MetaPage\MetaFactory;
use FDevs\MetaPage\Model\MetaInterface;
use FDevs\MetaPage\Renderer\RendererInterface;

class MetaExtension extends \Twig_Extension
{
    /**
     * @var MetaFactory
     */
    private $metaFactory;

    /**
     * @var RendererInterface
     */
    private $renderer;

    /**
     * MetaExtension constructor.
     *
     * @param MetaFactory       $metaFactory
     * @param RendererInterface $renderer
     */
    public function __construct(MetaFactory $metaFactory, RendererInterface $renderer)
    {
        $this->metaFactory = $metaFactory;
        $this->renderer = $renderer;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('meta', [$this, 'metaFunction']),
        ];
    }

    /**
     * @param MetaInterface $meta
     * @param array         $options
     *
     * @return string
     */
    public function metaFunction(MetaInterface $meta, array $options = [])
    {
        $view = $this->metaFactory->createView($meta, $options);

        return $this->renderer->render($view);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'fdevs_meta_page';
    }
}
