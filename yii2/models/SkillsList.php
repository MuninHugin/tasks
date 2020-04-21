<?php

namespace app\models;

use yii\db\ActiveRecord;

class SkillsList extends ActiveRecord
{
    public static function tableName() {
        return 'Skills';
    }

    public static function getRandomSkills__ids(){

        // Получаем весь список доступных скилов для генерации набора, генерируем
        $sql_skills = self::find()->asArray()->all();
        $skills_arr = [''];
        foreach ($sql_skills as $skill):
            array_push($skills_arr, $skill['id']);
        endforeach;
        $skills_count = mt_rand(1, count($skills_arr));
        $skill_id = array_rand($skills_arr, $skills_count) ? array_rand($skills_arr, $skills_count) : 0;

        // Преобразовываем в выходной масссив id скилов
        $user_skills = self::find()->asArray()->where(['in', 'id', $skill_id])->all();
        $skills_arr = [];
        foreach ($user_skills as $user_skill):
            array_push($skills_arr, $user_skill['id']);
        endforeach;

        return $skills_arr;
    }
}