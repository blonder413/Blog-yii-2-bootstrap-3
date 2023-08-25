<?php
use app\models\Helper;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
setlocale(LC_TIME, 'es_CO.UTF-8');
if (isset($_GET['page'])) {
$this->title = "Categoría " . $categoria->categoria . " - Página " . $_GET['page'] . " | Blonder413";
} else {
$this->title = "Categoría " . $categoria->categoria . " | Blonder413";
}
// parámetros para el sidebar
$this->params['categorias'] = $categorias;
$this->params['mas_visitados'] = $mas_visitados;

$this->params['breadcrumbs'][] = $categoria->categoria;

$formatter = \Yii::$app->formatter;
?>

    <!-- <i class="fa folder-open fa-lg"></i> -->
<h2 class="text-center"><span class="glyphicon glyphicon-folder-close small"></span>&nbsp;<?= $categoria->categoria ?></h2>

<?php if (sizeof($articulos) == 0): ?>
    <div class='no-content'>
        <div class='alert alert-danger'>
            No existen registros disponibles
        </div>
    </div>
<?php endif; ?>

<?php foreach ($articulos as $key => $value): ?>
    <article class="post clear-fix">
        <?=
        Html::a(
                Html::img(
                        '@web/web/img/categorias/' . $value->categoria->imagen,
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

        <p>
            <span class="post-date">
                <span class="glyphicon glyphicon-user">&nbsp;</span><span class="post-author"><?= ucWords(HTml::encode("{$value->usuarioCrea->name}")) ?></span>
                &nbsp;|
    <!--                <span class="glyphicon glyphicon-calendar">&nbsp;</span><?= strftime("%c", strtotime($value->fecha_crea)) ?> -->
                <span class="glyphicon glyphicon-calendar">&nbsp;</span><?= $formatter->asRelativeTime($value->fecha_crea) ?>
            </span>
        </p>

        <p class="post-content">
            <?php
            if (empty($value->resumen)) {
                echo HtmlPurifier::process(Helper::myTruncate($value->detalle, 300, " ", "..."));
            } else {
                echo $value->resumen;
            }
            ?>
        </p>

        <div class="container-buttons">
            <?=
            Html::a(
                    'Ver Más &raquo;',
                    ['/articulo/' . Html::encode("{$value->slug}")],
                    [
                        'class' => 'btn btn-primary',
                        'title' => 'Ver artículo completo',
                    ]
            )
            ?>
            <?=
            Html::a(
                    "Comentarios <span class='badge'>$value->cantidadComentarios</span>",
                    ['/articulo/' . Html::encode("{$value->slug}") . '#comments'],
                    [
                        'class' => 'btn btn-success',
                        'title' => 'Ver Comentarios',
                    ]
            )
            ?>
        </div>
    </article>
<?php endforeach; ?>

<div class="row text-center"><?php echo LinkPager::widget(['pagination' => $pagination]); ?></div>
