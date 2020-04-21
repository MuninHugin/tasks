<?php

namespace app\models;

use yii\db\ActiveRecord;

class UserSkills extends ActiveRecord
{
    public static function tableName() {
        return 'user_skills';
    }
}