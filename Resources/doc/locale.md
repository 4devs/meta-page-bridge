usage with locale [library](https://github.com/4devs/locale)
============================================================

#### install locale library

``` bash
$ php composer.phar require fdevs/locale
```

#### create locale meta
```php
// init meta factory
/** @var FDevs\Bridge\MetaPage\Model\Locale $locale */
$locale = $metaFactory
    ->add(LocaleType::class, [
        'name' => 'description',
        'type' => 'name',
        'content' => [
            new LocaleText('я программист', 'ru'),
            new LocaleText('I am a programmer', 'en'),
        ],
    ])
    ->getMeta()
```

### render locale meta

```php
// init meta factory

$view = $metaFactory->createView($locale);

// init renderer meta

echo $renderer->render($view);//<meta name="description" content="I am a programmer"/>
```