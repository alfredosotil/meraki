<?php

namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class TypeIngredientsFixture extends ActiveFixture
{
    /**
     * @var string
     */
    public $dataFile = '@tests/_data/type_ingredients.php';

    /**
     * @var string
     */
    public $modelClass = 'app\models\TypeIngredient';

    /**
     * @var array
     */
    public $depends = ['tests\unit\fixtures\UserFixture'];
}
