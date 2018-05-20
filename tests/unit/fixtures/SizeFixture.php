<?php

namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class SizeFixture extends ActiveFixture
{
    /**
     * @var string
     */
    public $dataFile = '@tests/_data/sizes.php';

    /**
     * @var string
     */
    public $modelClass = 'app\models\Sizes';
}
