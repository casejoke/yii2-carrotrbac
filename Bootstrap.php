<?php

namespace fourteenmeister\rbac;

use Yii;
use yii\base\BootstrapInterface;

/**
 * Gallery module bootstrap class.
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        Yii::$app->i18n->translations['rbac'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => __DIR__ . DIRECTORY_SEPARATOR . 'messages',
            'fileMap' => [
                'rbac' => 'rbac.php',
            ],
        ];
    }
}