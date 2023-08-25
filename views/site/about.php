<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use app\models\Helper;

/* @var $this yii\web\View */
$this->title = 'Acerca';
$this->params['breadcrumbs'][] = $this->title;
// parámetros para el sidebar
$this->params['categorias'] = $categorias;
$this->params['mas_visitados'] = $mas_visitados;
?>

<?php
$script = <<< JS
JS;
$this->registerJs($script);
?>

<div class="row text-center">
    <h1><?= Html::encode($this->title) ?></h1>

    <figure>
        
            <?php
            
              Modal::begin([
              'header' => Html::img(
              '@web/web/img/photo.png',
              [
              'alt'           => 'Jonathan Morales Salazar',
              'title'         => 'Jonathan Morales Salazar',
              ]
              ),
              'toggleButton' =>   ['label' =>
              Html::img(
              '@web/web/img/photo.png',
              [
              'alt'           => 'Jonathan Morales Salazar',
              'title'         => 'Jonathan Morales Salazar',
              'width'         => '300',
              ]
              ),
              ],
              ]);
              echo '<p>Jonathan Morales Salazar</p>';
              echo '<p>Ingeniero de Sistemas</p>';
              Modal::end();
             
            ?>
        
        <figcaption>
            <p>
            <div class="vcard">
                <div class="fn n">
                    <span class="given-name">Jonathan</span> <span class="family-name">Morales Salazar</span><br />
                    <!-- <span class="org">El Ejemplo S. A.</span> -->
                </div>
                <div>
                    <span class="nickname">Blonder413</span>
                </div>
                <div class="adr">
                <!-- <span class="street-address">Calle falsa 1</span><br /> -->
                    <span class="locality" title="La Dorada">La Dorada</span>,
                    <abbr class="region" title="Caldas">Caldas</abbr>,
                    <!-- <span class="postal-code">94301</span>, -->
                    <abbr class="country-name" title="Colombia">Colombia</abbr>
                </div>
                <!-- <li class="tel"><strong class="type" title="Teléfono del trabajo">Work</strong>: <span class="value">604-555-1234</span></li> -->
                    <!-- <li class="url"><strong class="type" title="Sitio web oficial del trabajo">Work</strong>: <a href="http://ejemplo.com/" title="Ejemplo.com" class="value">http://ejemplo.com/</a></li> -->
            </div>
            <span class="negrita">Edad</span>: <?= Helper::calculaEdad("1985-04-13"); ?> años
            <br />
            <span class="negrita">Ocupación</span>: Ingeniero de Sistemas
            </p>
        </figcaption>
    </figure>
    <h3>Otros títulos</h3>
    <ul class="list-style-none">
        <li>
            Emprendimiento Empresarial
        </li>
        <li>
            Programación de páginas Web con HTML y Javascript
        </li>
        <li>
            Linux: Sistema Operativo, comandos y utilidad
        </li>
        <li>
            Aplicación de la calidad de software en el proceso de desarrollo
        </li>
    </ul>

    <h3>Software utilizado para el desarrollo</h3>
    <ul class="list-style-none">
        <li>
            <a href="https://netbeans.apache.org/" rel='noopener' title="NetBeans IDE" target="_blank">
                NetBeans IDE
            </a>
        </li>
        <li>
            <a href="https://www.mozilla.org/es-ES/firefox/fx/" rel='noopener' title="Mozilla Firefox" target="_blank">
                Mozilla Firefox
            </a>
        </li>
        <li>
            <a href="https://blonder413.wordpress.com/2021/09/29/instalar-lamp-en-ubuntu-20-04/" rel='noopener' title="LAMP" target="_blank">
                LAMPP
            </a>
        </li>
        <li>
            <a href="https://www.gimp.org/" rel='noopener' title="GIMP" target="_blank">
                Gimp
            </a>
        </li>
        <li>
            <a href="https://inkscape.org/" rel='noopener' title="Inkscape" target="_blank">
                inkscape
            </a>
        </li>
        <li>
            <a href="https://getcomposer.org/" rel='noopener' title="Composer" target="_blank">
                composer
            </a>
        </li>
    </ul>

    <hr>
    <div class="col col-sm-12">
        <iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=-74.74908828735353%2C5.427265668386307%2C-74.60575103759767%2C5.5045038058395015&amp;layer=mapnik" style="border: 1px solid black"></iframe>
        <br/><small><a href="https://www.openstreetmap.org/#map=14/5.4659/-74.6774" rel='noopener' target='_blank'>Ver mapa más grande</a></small>
    </div>
</div>
