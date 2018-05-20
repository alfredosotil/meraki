<?php

namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class ProductFixture extends ActiveFixture
{
    /**
     * @var string
     */
    public $dataFile = '@tests/_data/products.php';

    /**
     * @var string
     */
    public $modelClass = 'app\models\Product';

}
