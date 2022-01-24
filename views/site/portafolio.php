<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Portafolio';
$this->params['breadcrumbs'][] = $this->title;
// parámetros para el sidebar
$this->params['categorias'] = $categorias;
$this->params['mas_visitados'] = $mas_visitados;
?>

<div class="col-md-12">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <p>Estos son los desarrollos que he realizado.</p>

    <div class="row">
        <div class="col-sm-12 col-md-3">
            <?= Html::a(
                    Html::img(
                            '@web/img/portafolio/cease.jpg',
                            [
                                // 'class' => 'img-circle',
                                'alt' => 'Cilgas',
                                'class' => 'img-thumbnail',
                                'width' => '100%'
                            ]
                    ),
                    'https://www.facebook.com/ce.ltda',
                    [
                        'target' => '_blank',
                        'rel' => 'nofollow noopener',
                    ]
            ) ?>
            <h4>Ce Ase Ingeniería</h4>
            <p>Sistema de Control de entrega de elementos de protección personal para la empresa Cilgas.</p>
        </div>

        <div class="col-sm-12 col-md-3">
            <?= Html::img(
                '@web/img/logo.png',
                [
                    // 'class' => 'img-circle',
                    'alt' => 'Diócesis La Dorada - Guaduas',
                    'class' => 'img-thumbnail',
                ]
            ) ?>
            <h4>Diócesis La Dorada - Guaduas</h4>
            <p>Implementación del sistema dinámico para la publicación de noticias.</p>
        </div>

        <div class="col-sm-12 col-md-3">
            <?= Html::a(
                    Html::img(
                            '@web/img/logo.png',
                            [
                                // 'class' => 'img-circle',
                                'alt' => 'Alcaldía La Dorada',
                                'class' => 'img-thumbnail',
                            ]
                    ),
                    'http://ladorada-caldas.gov.co/',
                    [
                        'target' => '_blank',
                        'rel' => 'nofollow noopener',
                    ]
            ) ?>
            <h4>Alcaldía La Dorada</h4>
            <p>
                Desarrollo de Sistema de Información usando Yii Framework 1 
                para la Alcaldía de La Dorada.
            </p>
        </div>

        <div class="col-sm-12 col-md-3">
            <?= Html::img(
                '@web/img/portafolio/midasingenieria.png',
                [
                    // 'class' => 'img-circle',
                    'alt' => 'Midas Ingeniería',
                    'class' => 'img-thumbnail',
                ]
            ); ?>
            <h4>Midas Ingeniería</h4>
            <p>Desarrollo del Sitio web oficial de la empresa Midas Ingeniería.</p>
        </div>
    </div>
    <div class="row">

        <div class="col-sm-12 col-md-3">
            <?= Html::img(
                '@web/img/logo.png',
                [
                    // 'class' => 'img-circle',
                    'alt' => 'Directorio La Dorada Caldas',
                    'class' => 'img-thumbnail',
                ]
            ); ?>
            <h4>Directorio La Dorada Caldas</h4>
            <p>Desarrollo del sitio web que funciona como directorio de empresas locales de La Dorada Caldas.</p>
        </div>

        <div class="col-sm-12 col-md-3">
            <?= Html::img(
                '@web/img/logo.png',
                [
                    // 'class' => 'img-circle',
                    'alt' => 'Blog Blonder413',
                    'class' => 'img-thumbnail',
                ]
            ); ?>
            <h4>Blog Blonder413</h4>
            <p>
                Desarrollo de un blog personal con PHP 5.
            </p>
        </div>

        <div class="col-sm-12 col-md-3">
            <?= Html::a(
                    Html::img(
                            '@web/img/logo.png',
                            [
                                // 'class' => 'img-circle',
                                'alt' => 'Biblioteca legal',
                                'class' => 'img-thumbnail',
                            ]
                    ),
                    'https://gitlab.com/midas-ingenieria/reserva-legal',
                    [
                        'rel' => 'noopener',
                        'target' => '_blank',
                        'rel' => 'nofollow noopener',
                    ]
            ) ?>
            <h4>Biblioteca legal</h4>
            <p>Desarrollo de una biblioteca de leyes, decretos y todo lo relacionado
                con las leyes colombianas.</p>
        </div>
        
        <div class="col-sm-12 col-md-3">
            <?= Html::a(
                    Html::img(
                            '@web/img/portafolio/alcaldia-yii2.png',
                            [
                                // 'class' => 'img-circle',
                                'alt' => 'Alcaldía La Dorada',
                                'class' => 'img-thumbnail',
                            ]
                    ),
                    'http://ladorada-caldas.gov.co/',
                    [
                        'target' => '_blank',
                        'rel' => 'nofollow noopener',
                    ]
            ) ?>
            <h4>Alcaldía La Dorada</h4>
            <p>
                Desarrollo de distintos sistemas de Información usando Yii 
                Framework 2 para la Alcaldía de La Dorada.
            </p>
        </div>

    </div>

    <div class="row">

        <div class="col-sm-12 col-md-3">
            <?= Html::a(
                Html::img(
                        '@web/img/portafolio/blog-yii2.png',
                        [
                            // 'class' => 'img-circle',
                            'alt' => 'Blog Blonder413',
                            'class' => 'img-thumbnail',
                        ]
                ),
                'https://gitlab.com/blonder413/blog-yii-2-bootstrap-3',
                [
                    'target' => '_blank',
                    'rel' => 'nofollow noopener',
                ]
            ) ?>
            <h4>Blog Blonder413</h4>
            <p>Desarrollo de un blog con Yii Framework 2.</p>
        </div>
        
    </div>
</div>