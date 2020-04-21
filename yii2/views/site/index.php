<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
Pjax::begin();
?>
<div class="site-index">
<table class="table display" id="users_table">
    <thead>        
    <tr>
        <th>Имя</th>
        <th>Место жительства</th>
        <th>Навыки</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user):?>
        <tr>
            <td><?=$user['name'] ?></td>
            <td><?=$all_cities[$user['city_id']]?></td>
            <td>
                <?php
                $user_skills__arr = [];
                foreach ($user['skills'] as $skill) {
                    array_push($user_skills__arr, $all_skills[$skill['skill_id']]);
                }
                echo(implode(',',$user_skills__arr));
                ?>
            </td>
            <td>
                <?= Html::a("<i class=\"glyphicon glyphicon-trash\"></i> ",
                    Url::to(['site/index']),
                    [
                        'class' => 'btn btn-primary delete_row-js',
                        'data' => [
                            'method' => 'POST',
                           'confirm' => 'Удалить?',
                            'params' => [
                                'remove' => '1',
                                'id' => $user['id']
                            ],
                            'pjax' => '1'
                        ]
                    ]) ?>
            </td>
        </tr>
    <?php endforeach;?>
    <?php if($new_user_id):?>
        <tr>
            <td><?=$new_user_name;?></td>
            <td><?=$new_city;?></td>
            <td><?=$skills_str;?></td>
            <td>
                <?= Html::a("<i class=\"glyphicon glyphicon-trash\"></i> ",
                    Url::to(['site/index']),
                    [
                        'class' => 'btn btn-primary',
                        'onclick' => 'console.log(11)',
                        'data' => [
                            'method' => 'POST',
                                'confirm' => 'Удалить?',
                            'params' => [
                                'remove' => '1',
                                'id' => $new_user_id
                            ],
                            'pjax' => '1'
                        ]
                    ]) ?>
            </td>
        </tr>
    <?php endif;?>
    </tbody>
</table>
    <hr>
<?= Html::a('Add some user',
Url::to(['site/index']),
[
'class' => 'btn btn-primary',
'data' => [
    'method' => 'POST',
    'confirm' => 'Добавить?',
    'params' => [
        'add' => '1'
        ],
    'pjax' => '1'
]
]) ?>
</div>
<?php Pjax::end() ?>