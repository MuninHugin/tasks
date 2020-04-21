<?php

namespace app\models;

use yii\db\ActiveRecord;

class UserCity extends ActiveRecord
{
    public static function tableName() {
        return 'City';
    }

    public static function getRandomCity(){
        $sql_cities = self::find()->asArray()->all();
        $city_ids__arr = [];
        foreach ($sql_cities as $city):
            array_push($city_ids__arr, $city['id']);
        endforeach;
        $city_id = $city_ids__arr[array_rand($city_ids__arr)];

        return $city_id;
    }
}