<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii2mod\comments\widgets\Comment;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="posts-view">

    <?php 
    $id = $model->id;
    //  Updates the view counter for the selected topic
        $command = Yii::$app->db->createCommand('UPDATE posts SET views = views + 1 WHERE id =:postID')
        ->bindParam(':postID', $id);
        $command->execute();
    ?>

    <h1><?= Html::encode($this->title) ?></h1>

   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'content:ntext',
            'views'
        ],
    ]) ?>
    

    <?php echo \yii2mod\comments\widgets\Comment::widget([
    'model' => $model,
    ]); ?>
</div>
