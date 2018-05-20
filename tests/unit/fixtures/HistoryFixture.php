<?php

namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class HistoryFixture extends ActiveFixture
{
    /**
     * @var string
     */
    public $dataFile = '@tests/_data/history.php';

    /**
     * @var string
     */
    public $modelClass = 'app\models\History';
}
