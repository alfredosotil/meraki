<?php

namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class IngredientFixture extends ActiveFixture
{
    /**
     * @var string
     */
    public $dataFile = '@tests/_data/ingredients.php';

    /**
     * @var string
     */
    public $modelClass = 'app\models\Ingredients';

    /**
     * @var array
     */
    public $depends = ['tests\unit\fixtures\TypeIngredientsFixture'];
}
