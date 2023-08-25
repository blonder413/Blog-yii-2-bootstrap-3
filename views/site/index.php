<?php
use app\models\Helper;
use kartik\growl\Growl;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */

// Pone la fecha en español
//setlocale(LC_TIME, 'es_CO.UTF-8');

if (isset($_GET['page']) and is_numeric($_GET['page'])) {
    $this->title = "Blonder413 - Página " . $_GET['page'];
} else {
    $this->title = "Blonder413";
}

// parámetros para el sidebar
$this->params['categorias'] = $categorias;
$this->params['mas_visitados'] = $mas_visitados;

/** @var Formatter $formatter */
$formatter = \Yii::$app->formatter;
?>

    <?= Breadcrumbs::widget([
      'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    
    <?php if (sizeof($articulos) == 0): ?>
    <div class='no-content'>
        <div class='alert alert-danger'>
            No existen registros disponibles
        </div>
    </div>
    <?php endif; ?>

    <?php foreach ($articulos as $key => $value): ?>
    <article class="post clear-fix">
          <?= Html::a(
              Html::img(
                  '@web/web/img/categorias/' . $value->categoria->imagen,
                  [
                      // 'class' => 'img-circle',
                      'alt'   => $value->categoria->categoria,
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
            <?= Html::a(
                Html::encode("{$value->titulo}"),
                ['/articulo/' . Html::encode("{$value->slug}")],
                [
                  'title' => Html::encode("{$value->titulo}"),
                ]
            ) ?>
          </h3>

            <div class="post-date">
                <span class="glyphicon glyphicon-user">&nbsp;</span><span class="post-author"><?= ucWords(HTml::encode("{$value->usuarioCrea->name}")) ?></span>
                &nbsp;|
                <span class="glyphicon glyphicon-calendar">&nbsp;</span> <time datetime="<?= $value->fecha_crea; ?>"><?= $formatter->asRelativeTime($value->fecha_crea); ?></time>
            </div>

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
            <?= Html::a(
                'Ver Más &raquo;',
                ['/articulo/' . Html::encode("{$value->slug}")],
                [
                    'class' => 'btn btn-primary btn-sm',
                    'title' => 'Ver artículo completo',
                ]
            ) ?>
            <?= Html::a(
                "Comentarios <span class='badge'>$value->cantidadComentarios</span>",
                ['/articulo/' . Html::encode("{$value->slug}") . '#comments'],
                [
                    'class' => 'btn btn-success btn-sm',
                    'title' => 'Ver Comentarios',
                ]
            ) ?>
          </div>
    </article>
    <?php endforeach; ?>

    <div class="row text-center">
        <?php echo LinkPager::widget([
            'linkContainerOptions'   => [
                'href'  => '/inicio/pagina/'
            ],
            'pagination'=>$pagination
        ]); ?>
    </div>

<?php
if (Yii::$app->session->getFlash('success')) {
    echo Growl::widget([
        'type' => Growl::TYPE_SUCCESS,
        'title' => 'Usuario registrado!',
        'icon' => 'glyphicon glyphicon-ok-sign',
        'body' => Yii::$app->session->getFlash('success'),
        'showSeparator' => true,
        'delay' => 0, // time before display
        'pluginOptions' => [
            'placement' => [
                'from' => 'top',
                'align' => 'center',
            ],
            'showProgressbar' => false,
            'timer' => 3000, // screen time
        ]
    ]);
}
?>
