<?php

namespace FDevs\Bridge\MetaPage\Model;

use FDevs\Bridge\MetaPage\Type\LocaleType;
use FDevs\MetaPage\Model\Meta;

class Locale extends Meta
{
    /**
     * @var string
     */
    protected $metaType = LocaleType::class;
}
