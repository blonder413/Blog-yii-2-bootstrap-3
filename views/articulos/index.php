<?php

use app\models\Articulo;
use app\models\Categoria;
use app\models\Curso;
use kartik\date\DatePicker;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticuloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articulos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articulo-index box box-primary">
    
    <div class="box-body table-responsive no-padding">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class='row'>
        <?= Html::beginForm('@web/articulos/index', 'get', []); ?>
        <div class='col-sm-10'>
        <?= DatePicker::widget([
            'name' => 'desde',
            'value' => Yii::$app->request->get('desde'),
            'type' => DatePicker::TYPE_RANGE,
            'name2' => 'hasta',
            'value2' => Yii::$app->request->get('hasta'),
            'options' => ['autocomplete' => 'off', 'placeholder' => 'Desde', 'title' => 'Desde'],
            'options2' => ['autocomplete' => 'off', 'placeholder' => 'Hasta', 'title' => 'Hasta'],
            'separator' => '-',
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]); ?>
        </div>
        <div class='col-sm-2'>
            <?= Html::submitButton(
                "<span class='glyphicon glyphicon-search'></span>",
                ['class' => 'btn btn-primary btn-block']
            ); ?>
        </div>
        <?= Html::endForm(); ?>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'numero',
            [
                'attribute' => 'titulo',
                'format'    => 'raw',
                'value'     => function($data){
                    return Html::a(
                        Html::encode("{$data->titulo}"),
                        Yii::getAlias('@web') . '/articulo/' . $data->slug,
                        [
                            'target'    => '_blank',
                            'title'     => 'Ver post',
                        ]
                    );
                }
            ],
//            'slug',
//            'tema',
            //'detalle:ntext',
            //'resumen',
            //'video',
            //'descarga',
            [
                'attribute' => 'categoria_id',
                'value'     => 'categoria.categoria',
                'format'    => 'raw',
                'filter'    => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'categoria_id',
                    'data' => ArrayHelper::map(Categoria::find()->orderBy('categoria asc')->all(), 'id', 'categoria'),
                    'options' => ['placeholder' => 'Seleccione...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
            ],
            //'etiquetas',
            //'estado',
            [
                'attribute' => 'vistas',
//                'width' => '150px',
//                'hAlign' => 'right',
                'format' => ['decimal', 0],
                'pageSummary' => true,
                'pageSummaryFunc' => GridView::F_AVG
            ],
            'cantidadComentarios',
            [
                'attribute' => 'descargas',
//                'width' => '150px',
//                'hAlign' => 'right',
                'format' => ['decimal', 0],
                'pageSummary' => true,
                'pageSummaryFunc' => GridView::F_AVG
            ],
            [
                'attribute' => 'curso_id',
                'value'     => 'curso.curso',
                'format'    => 'raw',
                'filter'    => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'curso_id',
                    'data' => ArrayHelper::map(Curso::find()->orderBy('curso asc')->all(), 'id', 'curso'),
                    'options' => ['placeholder' => 'Seleccione...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
            ],
            [
                'attribute'     => 'usuario_crea',
                'value'         => 'usuarioCrea.name',
            ],
            //'fecha_crea',
//            [
//                'attribute'     => 'usuario_modifica',
//                'value'         => 'usuarioModifica.name',
//            ],
            //'fecha_modifica',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {cambiar-estado}',
                'buttons' => [
                    'cambiar-estado' => function ($url, $model, $key) {
                        if ($model->estado == Articulo::ESTADO_INACTIVO) {
                            return Html::a('<span class="glyphicon glyphicon-thumbs-up"></span>', $url,
                                [ 'title' => Yii::t('app', 'Activar este artículo'), ]
                            );
                        } elseif ($model->estado == Articulo::ESTADO_ACTIVO) {
                            return Html::a('<span class="glyphicon glyphicon-thumbs-down"></span>', $url,
                                [ 'title' => Yii::t('app', 'Inactivar este artículo'), ]
                            );
                        }
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url,
                            [ 'title' => Yii::t('app', 'Actualizar'), ]
                        );
                    },
//                    'delete' => function ($url, $model) {
//                          return Html::a(
//                              "<button type='button' class = 'btn btn-danger btn-circle' >
//                                <i class='fa fa-trash' aria-hidden='true'></i>
//                              </button>", ["delete", "id" => $model->id], [
//                              'title' => 'Eliminar',
//                              'data-method'   => 'POST',
//                              'data-confirm'  => 'Desea eliminar este registro?',
//                          ]);
//                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        return yii\helpers\Url::to(['articulos/view', 'id' => $key]);
                    } elseif ($action === 'cambiar-estado') {
                        return yii\helpers\Url::to(['articulos/cambiar-estado', 'id' => $key]);
                    } elseif ($action == 'update') {
                        return yii\helpers\Url::to(['articulos/update/', 'id' => $key]);
                    } elseif ($action === 'delete') {
                        return yii\helpers\Url::to(['articulos/delete/', 'id' => $key]);
                    }
                }
            ],
        ],
        'export'    => [
            'label'     => 'Exportar',
            'messages'  => [
                'confirmDownload'   => 'De acuerdo para proceder',
            ],
//            'showConfirmAlert'  => false,
        ],
        'exportConfig' => [
//            GridView::HTML => [
//            ],
            GridView::CSV => [
            ],
//            GridView::TEXT => [
//            ],
            GridView::EXCEL => [
                'label' => ( 'XLS'),
                'iconOptions' => ['class' => 'text-success'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => ('archivoDeBlonder413'),
                'alertMsg' => ( 'El archivo de excel se va descargar.'),
                'options' => ['title' => ( 'Excel')],
                'mime' => 'application/vnd.ms-excel',
                'config' => [
                    'worksheet' => ( 'ExportWorksheet'),
                    'cssFile' => '',
                ]
            ],
            GridView::PDF => [
            ],
//            GridView::JSON => [
//            ],
        ],
        'hover'         => true,
        'toolbar' => [
            '{toggleData}',
            '{export}',
        ],
        'toggleDataContainer' => ['class' => 'btn-group mr-2'],
        'responsive'    => true,
        'rowOptions'    => function($model){
            if ($model->estado == Articulo::ESTADO_INACTIVO) {
                return ['class' => 'danger'];
            } elseif ($model->estado == Articulo::ESTADO_ACTIVO) {
                return ['class' => 'success'];
            }
        },
        'panel'     => [
            'after'=>Html::a('<i class="fas fa-redo"></i> Limpiar Tabla', ['index'], ['class' => 'btn btn-info']),
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Crear', ['create'], ['class' => 'btn btn-success']),
            'heading' => 'Administrar Artículos',
            'type'  => GridView::TYPE_SUCCESS,
            
            
        ],
    ]); ?>


</div>
