<?php

namespace app\models;

use yii\db\ActiveRecord;

class UsersList extends ActiveRecord
{
    public static function tableName() {
        return 'Users';
    }

    public function getSkills(){
        return $this->hasMany(UserSkills::className(), ['user_id' => 'id']);
    }
    public function getCity(){
        return $this->hasOne(UserCity::className(), ['id' => 'city_id']);
    }

    public static function getProperties($inArr, $outArr=[]) {
        foreach ($inArr as $item):
            $outArr[$item['id']] = $item['name'];
        endforeach;

        return $outArr;
    }

    public function getRandomUser(){
        $names_array = ['John', 'Dow', 'Ваня', 'Mary', 'Гриша'];
        $user_random_name = $names_array[array_rand($names_array)];

        return $user_random_name;
    }
}