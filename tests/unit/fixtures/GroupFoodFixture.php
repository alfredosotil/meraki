<?php

namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class GroupFoodFixture extends ActiveFixture
{
    /**
     * @var string
     */
    public $dataFile = '@tests/_data/group_food.php';

    /**
     * @var string
     */
    public $modelClass = 'app\models\GroupFood';
}
