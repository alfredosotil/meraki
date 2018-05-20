<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 19/05/2018
 * Time: 17:18
 */

namespace app\components;

use yii\base\Behavior;
use yii\db\ActiveRecord;

/**
 * Class UUIDBehavior
 * @package app\components
 */
class UUIDBehavior extends Behavior {
    /**
     * Field/Column yang akan diisi UUID
     * Default -> id
     * @var type
     */
    public $column = 'id';

    /**
     * Override event()
     * memasukkan method beforeSave() kedalam komponen ActiveRecord::EVENT_BEFORE_INSERT
     * @return type
     */
    public function events() {
        return[
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeSave',
        ];
    }

    /**
     * set beforeSave() -> UUID data
     */
    public function beforeSave() {
        $this->owner->{$this->column} = $this->owner->getDb()->createCommand("SELECT UUID()")->queryScalar();
    }

}
