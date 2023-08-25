<?php
use app\assets\AppAsset;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    
    <meta name='author' content='Jonathan Morales Salazar'>
    <meta name='copyright' content='www.blonder413.com'>
    <meta name='designer' content='www.blonder413.com'>
    <meta name='publisher' content='www.blonder413.com'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="<?= Yii::$app->homeUrl ?>web/css/azul/estilos.css" rel="stylesheet" type="text/css">
    <link href="<?= Yii::$app->homeUrl ?>web/img/favicon.png" rel="icon" type="image/vnd.microsoft.icon"/>
    <!--<link rel="image_src" href="<?php //echo Yii::$app->homeUrl . 'web/img/' . $this->image_src . '.png' ?>">-->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="alternate" type="application/rss+xml" title="RSS feed" href="/rss.xml" />
</head>
<body>

<?php $this->beginBody() ?>

    <header>
        <?php
            NavBar::begin([
                // 'brandLabel' => 'Blonder413 - Aprendizaje Dinámico',
                // 'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-blue navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-brand'],
                'items' => [
                    Html::img('@web/img/logo.png', ['class'=>'img-responsive', 'width'=>'30px'])
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => [
                    ['label' => Yii::$app->name, 'url' => Yii::$app->homeUrl],
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Inicio', 'url' => Yii::$app->homeUrl],
                    ['label' => 'Portafolio', 'url' => ['/site/portafolio']],
                    ['label' => 'Acerca', 'url' => ['/site/about']],
                    ['label' => 'En Vivo', 'url' => ['/site/transmision']],
                    ['label' => 'Contacto', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ? ['label' => 'Registro', 'url' => ['/site/signup']] : '',
                    Yii::$app->user->isGuest ? ['label' => 'Entrar', 'url' => ['/site/login']] : '',
                    [
                        'label' => 'Cursos',
                        'items' => [
                            ['label'     => 'CodeIgniter 3', 'url' => ['curso/codeigniter-3']],
                            ['label'     => 'Laravel 5.4', 'url' => ['curso/laravel-54']],
                            ['label'     => 'Linux Mint 18', 'url' => ['curso/linux-mint-18']],
                            ['label'     => 'MySQL', 'url' => ['curso/mysql']],
                            ['label'     => 'PHP 7', 'url' => ['curso/php-7']],
                            ['label'     => 'YiiFramework 2', 'url' => ['curso/yiiframework-2']],
                            ['label'     => 'Todos los cursos', 'url' => ['/curso']],
                        ]
                    ],
                    Yii::$app->user->isGuest ?
                        '' :
                        [
                            'label' => 'Admin',
                            'items' => [
                                ['label' => 'Artículos', 'url' => ['/articulos/index']],
                                ['label' => 'Categorías', 'url' => ['/categorias/index']],
                                ['label' => 'Comentarios', 'url' => ['/comentario/index']],
                                ['label' => 'Cursos', 'url' => ['/cursos/index']],
                                ['label' => 'Transmisiones', 'url' => ['/transmision/index']],
                                ['label' => 'Users', 'url' => ['/user/index']],
                                [
                                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                                    'url' => ['/site/logout'],
                                    'linkOptions' => ['data-method' => 'post']
                                ],
                            ]
                        ],
                ],
            ]);
            NavBar::end();
        ?>
    </header>
<!--
    <section class="jumbotron">
        <div class="container">
            <h1 class="title-blog">
              <?= Html::img('@web/img/logo.png', ['width'=>'70']) ?>
              Blonder413
            </h1>
            <p>Aprendizaje dinámico</p>
        </div>
    </section>
-->
    <section class="main container">
      <div class="row">

        <section class="posts col-md-9">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            
            <?= $content ?>
        </section>
        
        <!--Sidebar-->
        <aside class="hidden-xs hidden-sm col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Mis Redes Sociales</div>
                <div class="panel-body">
                    
                    <?= Html::a(
                        Html::img("@web/web/img/twitter.png", ['class'=>'img-thumbnail','width' => '50', 'alt' => 'Mi perfil en Twitter']),
                        '@twitter',
                        ['rel' => 'noopener', 'target' => '_blank', 'title'  => 'Mi perfil en Twitter']
                    ) ?>

                    <?= Html::a(
                        Html::img("@web/web/img/youtube.png", ['class'=>'img-thumbnail','width' => '50', 'alt' => 'Mi canal de Youtube']),
                        '@youtube',
                        ['rel' => 'noopener', 'target' => '_blank', 'title'  => 'Mi canal de youtube']
                    ) ?>
                    
                    <?= Html::a(
                        Html::img("@web/web/img/github.png", ['class'=>'img-thumbnail','width' => '50', 'alt' => 'Mi repositorio en Github']),
                        '@github',
                        ['rel' => 'noopener', 'target' => '_blank', 'title'  => 'Mi repositorio en Github']
                    ) ?>

                    <?php /*echo Html::a(
                        Html::img("@web/img/rss-c.png", ['class'=>'img-thumbnail','width' => '50', 'alt' => 'Mis Feeds RSS']),
                        ['/rss.xml'],
                        ['target' => '_blank', 'title'  => 'Mis Feeds RSS']
                    ))*/ ?>
                </div>
            </div>
            <!-------------------------------------------------------------------------------------------------------->
            <?php if( isset($this->params['categorias']) ): ?>
            <div class="panel panel-primary">
                <div class="panel-heading">Categorías</div>
                <div class="list-group">
                    <nav>
                        <?php foreach( $this->params['categorias'] as $key => $value ): ?>
                          <?= Html::a(
                            Html::img(
                                "@web/web/img/categorias/$value->imagen", 
                                [
                                      'alt' => $value->categoria,
                                      'width' => '40'
                                ]
                            ) . " " . $value->categoria,
                            ['/categoria/' . $value->slug],
                            [
                                'class' => 'list-group-item',
                                'title' => $value->categoria,
                            ]
                          ) ?>
                        <?php endforeach; ?>
                    </nav>
                </div>
            </div>
            <?php endif; ?>
            <!-------------------------------------------------------------------------------------------------------->
            <?php if( isset($this->params['mas_visitados']) ): ?>
            <div class="panel panel-primary">
                <div class="panel-heading">Artículos Populares</div>
                <div class="list-group">
                    <?php foreach ($this->params['mas_visitados'] as $key => $value): ?>
                        <a href="<?= Yii::$app->homeUrl ?>articulo/<?= $value->slug ?>" class="list-group-item">
                            <h4 class="list-group-item-heading"><?php echo $value->titulo; ?></h4>
                            <p class="list-group-item-text">
                                <?php echo $value->resumen; ?>
                            </p>
                            <p>
                                <small><span class="glyphicon glyphicon-eye-open">&nbsp;</span><?= $value->vistas ?> visitas</small>
                            </p>
                        </a>
                  <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
            <!-------------------------------------------------------------------------------------------------------->
            <div class="panel panel-primary">
                <div class="panel-heading">Webs Amigas</div>
                <div class="list-group">
                    <div class="list-group">
                
                        <?= Html::a(
                            Html::img("@web/web/img/webs/blonder413-blogspot.png", ['width' => '35', 'alt' => 'Blonder413 Blogger']) . " Blonder413 - Blogger",
                            'https://blonder413.blogspot.com/',
                            [
                                'class'     => 'list-group-item',
                                'rel'       => 'noopener',
                                'target'    => '_blank',
                            ]
                        ) ?>
                        
                        <?= Html::a(
                            Html::img("@web/web/img/webs/blonder413-wordpress.png", ['width' => '35']) . " Blonder413 - Wordpress",
                            'https://blonder413.wordpress.com/',
                            [
                                'class'     => 'list-group-item',
                                'rel'       => 'noopener',
                                'target'    => '_blank',
                            ]
                        ) ?>
                
                        <?= Html::a(
                            Html::img("@web/web/img/webs/cesarcancino.png", ['width' => '35']) . " WebMaster César Cancino",
                            'https://www.cesarcancino.com/',
                            [
                                'class'     => 'list-group-item',
                                'rel'       => 'noopener',
                                'target'    => '_blank',
                            ]
                        ) ?>
                
                        <?= Html::a(
                            Html::img("@web/web/img/webs/oscar-gomez.png", ['width' => '35']) . " Oscar Gómez",
                            'https://www.oscar-gomez.net',
                            [
                                'class'     => 'list-group-item',
                                'rel'       => 'noopener',
                                'target'    => '_blank',
                            ]
                        ) ?>
                    </div>
                </div>
            </div>
            <!-------------------------------------------------------------------------------------------------------->
        </aside>
        <!--/Sidebar-->

      </div>
    </section>

    <footer class="text-center">
            <hr>
            <a rel="license" href="http://creativecommons.org/licenses/by-sa/2.5/co/">
                <img alt="Licencia Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-sa/2.5/co/88x31.png" />
            </a>
            <br>

            <!--
            <a href="http://www.w3.org/html/logo/">
                    <img src="http://www.w3.org/html/logo/badge/html5-badge-h-css3-semantics.png" width="165" height="64" alt="HTML5 Powered with CSS3 / Styling, and Semantics" title="HTML5 Powered with CSS3 / Styling, and Semantics">
            </a>
            <br>
            -->

            <span xmlns:dct="http://purl.org/dc/terms/" property="dct:title" class="negrita">Blonder413 - Aprendizaje dinámico</span> por <a xmlns:cc="http://creativecommons.org/ns#" href="http://www.blonder413.com" property="cc:attributionName" rel="cc:attributionURL">Jonathan Morales Salazar</a> <br>se encuentra bajo una Licencia <a rel="license" href="http://creativecommons.org/licenses/by-sa/2.5/co/">Creative Commons Atribución-CompartirIgual 2.5 Colombia</a>.
            <br>Desarrollado con Yii Framework <?= Yii::getVersion(); ?>
            <br>2011 - <?php echo date("Y"); ?>
        </footer>
<?php $this->endBody() ?>

    <!-- Diseño del reproductor de videos -->
    <script data-cfasync="false">
      (function(r,e,E,m,b){E[r]=E[r]||{};E[r][b]=E[r][b]||function(){
      (E[r].q=E[r].q||[]).push(arguments)};b=m.getElementsByTagName(e)[0];m=m.createElement(e);
      m.async=1;m.src=("file:"==location.protocol?"https:":"")+"//s.reembed.com/G-1BYYQn.js";
      b.parentNode.insertBefore(m,b)})("reEmbed","script",window,document,"api");
    </script>
    <!-- /Diseño del reproductor de videos -->
    
    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
    var _smartsupp = _smartsupp || {};
    _smartsupp.key = '1388fee2a7b9efb38a5ff5a6421028fdaa9c370f';
    window.smartsupp||(function(d) {
        var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
        s=d.getElementsByTagName('script')[0];c=d.createElement('script');
        c.type='text/javascript';c.charset='utf-8';c.async=true;
        c.src='//www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
    })(document);
    </script>
    <!-- End Smartsupp Live Chat script -->
</body>
</html>
<?php $this->endPage() ?>
