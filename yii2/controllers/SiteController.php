<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

use app\models\SkillsList;
use app\models\UserCity;
use app\models\UsersList;
use app\models\UserSkills;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $users = UsersList::find()->asArray()->with(['skills', 'city'])->all();
        $skills_list = SkillsList::find()->asArray()->all();
        $cities_list = UserCity::find()->asArray()->all();

        $all_skills = UsersList::getProperties($skills_list);
        $all_cities = UsersList::getProperties($cities_list);

        $post = Yii::$app->request->post();
        if($post['add']) {
            $new_user_obj = new UsersList();
            $new_user_name = $new_user_obj->getRandomUser();

            $new_city_id = UserCity::getRandomCity();
            $new_city = UserCity::find()->asArray()->where(['id' => $new_city_id])->one();
            $new_city = $new_city['name'];

            $user_skills_ids = SkillsList::getRandomSkills__ids();

            $skills_str__arr_prev = SkillsList::find()->select('name')->asArray()->where(['in', 'id', $user_skills_ids])->all();
            $skills_str__arr_final = [];
            foreach($skills_str__arr_prev as $item):
                array_push($skills_str__arr_final, $item['name']);
            endforeach;
            $skills_str = implode(',', $skills_str__arr_final);

            $new_user_obj->name = $new_user_name;
            $new_user_obj->city_id = $new_city_id;

            $new_user_obj->save();

            $new_user_id = $new_user_obj->id;

            if($user_skills_ids):
                foreach ($user_skills_ids as $id){
                    $new_user_skill = new UserSkills();
                    $new_user_skill->user_id = $new_user_id;
                    $new_user_skill->skill_id = $id;
                    $new_user_skill->save();
                }
            endif;

        }

        if($post['remove']) {
            $remove_user_id = $post['id'];
            $remove_user = UsersList::findOne($remove_user_id);
            $remove_user->delete();

            UserSkills::deleteAll(['user_id' => $remove_user_id]);

            $users = UsersList::find()->asArray()->with(['skills', 'city'])->all();
        }

        return $this->render('index',
            compact(
            'users',
            'all_skills',
            'all_cities',
            'new_user_id',
            'new_user_name',
            'new_city',
            'skills_str',
            'post'
            ));
    }
}
