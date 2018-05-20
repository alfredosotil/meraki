<?php

namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class CmsFixture extends ActiveFixture
{
    /**
     * @var string
     */
    public $dataFile = '@tests/_data/cms.php';

    /**
     * @var string
     */
    public $modelClass = 'yii2mod\cms\models\CmsModel';
}
