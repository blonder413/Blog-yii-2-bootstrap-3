<?php

use app\models\Helper;
use kartik\alert\AlertBlock;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */

setlocale(LC_TIME, 'es_CO.UTF-8');

if (isset($_GET['page'])) {
    $this->title = "Blonder413 - Página " . $_GET['page'];
} else {
    $this->title = "Blonder413";
}

// parámetros para el sidebar
$this->params['categorias'] = $categorias;
$this->params['mas_visitados'] = $mas_visitados;
?>

<?php // echo Html::a("mi web", "@blonder413");  ?>

<!-- <section class="posts col-md-9"> -->

<h2 class="text-center"><span class="glyphicon glyphicon-user small"></span>&nbsp;<?= $user->name ?></h2>

<?=
Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
])
?>

    <?php foreach ($articulos as $key => $value): ?>
    <article class="post clear-fix">
        <?=
        Html::a(
                Html::img(
                        '@web/img/categorias/' . $value->categoria->imagen,
                        [
                            // 'class' => 'img-circle',
                            'alt' => $value->categoria->categoria,
                            'class' => 'img-thumbnail',
                        ]
                ),
                ['/categoria/' . Html::encode("{$value->categoria->slug}")],
                [
                    'class' => 'thumb pull-left',
                ]
        );
        ?>

        <h3 class="post-title">
            <?=
            Html::a(
                    Html::encode("{$value->titulo}"),
                    ['/articulo/' . Html::encode("{$value->slug}")],
                    [
                        'title' => Html::encode("{$value->titulo}"),
                    ]
            )
            ?>
        </h3>

        <div class="post-date">
            <span class="glyphicon glyphicon-user">&nbsp;</span><span class="post-author"><?= ucWords(HTml::encode("{$value->usuarioCrea->name}")) ?></span>
            &nbsp;|
            <span class="glyphicon glyphicon-calendar">&nbsp;</span><?= strftime("%c", strtotime($value->fecha_crea)) ?>
        </div>

        <p class="post-content">
            <?php
            if (empty($value->abstract)) {
                echo HtmlPurifier::process(Helper::myTruncate($value->detalle, 300, " ", "..."));
            } else {
                echo $value->abstract;
            }
            ?>
        </p>

        <div class="container-buttons">
            <?=
            Html::a(
                    'Ver Más &raquo;',
                    ['/articulo/' . Html::encode("{$value->slug}")],
                    [
                        'class' => 'btn btn-primary btn-sm',
                        'title' => 'Ver artículo completo',
                    ]
            )
            ?>
    <?=
    Html::a(
            "Comentarios <span class='badge'>$value->cantidadComentarios</span>",
            ['/articulo/' . Html::encode("{$value->slug}") . '#comments'],
            [
                'class' => 'btn btn-success btn-sm',
                'title' => 'Ver Comentarios',
            ]
    )
    ?>
        </div>
    </article>
<?php endforeach; ?>

<div class="row text-center"><?php echo LinkPager::widget(['pagination' => $pagination]); ?></div>