<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <?php if ($exception->statusCode == 404): ?>

    <?= $this->render("_404", ["message" => $message]) ?>

    <?php elseif ($exception->statusCode == 403): ?>

    <?= $this->render("_403", ["message" => $message]) ?>
    
    <?php elseif ($exception->statusCode == 405): ?>

    <?= $this->render("_405", ["message" => $message]) ?>

    <?php else: ?>
        <h1><?= Html::encode($this->title) ?></h1>
    <?php endif; ?>

</div>
