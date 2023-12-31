<?php
use yii\helpers\Html;
$this->title = 'Acceso Prohibido';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="clearfix"><p></p></div>

<div class="row">
    <div class="alert alert-danger text-center">
        <?= Html::img(
            '@web/img/403.png',
            [
                'alt'   => 'Acceso Restringido'
            ]
        ) ?>
        
        <h2><?= nl2br(Html::encode($message)) ?></h2>
        <p>
            No tiene permiso para ver este contenido
        </p>
    </div>
</div>