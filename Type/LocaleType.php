<?php

namespace FDevs\Bridge\MetaPage\Type;

use FDevs\Bridge\MetaPage\Model\Locale;
use FDevs\Locale\Translator;
use FDevs\Locale\TranslatorInterface;
use FDevs\MetaPage\MetaInterface;
use FDevs\MetaPage\Model\MetaView;
use FDevs\MetaPage\Type\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocaleType extends AbstractType
{
    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * LocaleType constructor.
     *
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator = null)
    {
        $this->translator = $translator ?: new Translator();
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', Locale::class);
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(MetaView $view, MetaInterface $meta, array $options = [])
    {
        /* @var \FDevs\MetaPage\Model\MetaInterface $meta */
        $view
            ->setName($meta->getName())
            ->setContent($this->translator->trans($meta->getContent()))
            ->setRendered(false)
        ;
    }
}
