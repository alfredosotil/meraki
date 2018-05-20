<?php

namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class UserFixture extends ActiveFixture
{
    /**
     * @var string
     */
    public $dataFile = '@tests/_data/user.php';

    /**
     * @var string
     */
    public $modelClass = 'app\models\User';

    /**
     * @var array
     */
    public $depends = ['tests\unit\fixtures\HistoryFixture'];
}
