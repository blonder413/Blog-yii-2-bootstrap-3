<?php
use yii\helpers\Html;
$this->title = 'Acceso Prohibido';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="clearfix"><p></p></div>

<div class="row">
    <div class="alert alert-danger text-center">
        <?= Html::img(
            '@web/img/405.png',
            [
                'alt'   => 'Método no permitido'
            ]
        ) ?>
        
        <h2><?= nl2br(Html::encode($message)) ?></h2>
        <p>
            Método no permitido para esta acción
        </p>
    </div>
</div>