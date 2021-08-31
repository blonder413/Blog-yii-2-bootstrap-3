<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Cursos';
$this->params['breadcrumbs'][] = $this->title;
// parámetros para el sidebar
$this->params['categorias'] = $categorias;
$this->params['mas_visitados'] = $mas_visitados;
?>

<div class="col-md-12">
    <h1 class="text-center">
        <span class="glyphicon glyphicon-blackboard small"></span> <?= Html::encode($this->title) ?>
    </h1>
</div>

<div class="row">
    <?php foreach ($cursos as $key => $value): ?>
        <div class="col-sm-12 col-md-12">
            <div class="col-sm-12 col-md-4">
                <?=
                Html::a(
                        Html::img(
                                "@web/web/img/cursos/$value->imagen",
                                [
                                    // 'class' => 'img-circle',
                                    'alt' => $value->curso,
                                    'class' => 'img-thumbnail',
                                ]
                        ),
                        "@web/curso/$value->slug",
                        [
                            //                        'target'    => '_blank',
                            //                        'rel'       => 'nofollow',
                            'title' => $value->descripcion,
                        ]
                )
                ?>
            </div>
            <div class="col-sm-12 col-md-8">
                <h3><?= $value->curso ?></h3>
                <p><?= $value->descripcion ?></p>
                <p>
                    <?=
                    Html::a(
                            'Ver Curso',
                            ["/curso/$value->slug"],
                            ['title' => 'Ver todos los capítulos del curso', 'class' => 'btn btn-primary']
                    );
                    ?>
                </p>
            </div>
        </div>
<?php endforeach; ?>

    <!-- Disqus comments -->
    <div id="disqus_thread"></div>
    <script>

        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */
        /*
         var disqus_config = function () {
         this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
         this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
         };
         */
        (function () { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = '//blonder413-com.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <!-- /Disqus comments -->
</div>

<script id="dsq-count-scr" src="//blonder413-com.disqus.com/count.js" async></script>