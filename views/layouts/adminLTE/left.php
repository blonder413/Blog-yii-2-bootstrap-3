<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::$app->homeUrl . 'img/users/' . Yii::$app->user->identity->photo; ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->name ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    [
                        'label' => 'Tablas',
                        'icon' => 'table',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Artículos', 'icon' => 'table', 'url' => ['/articulos']],
                            ['label' => 'Categorías', 'icon' => 'table', 'url' => ['/categorias']],
                            ['label' => 'Comentarios', 'icon' => 'table', 'url' => ['/comentario']],
                            ['label' => 'Cursos', 'icon' => 'table', 'url' => ['/cursos']],
                            ['label' => 'Transmisiones', 'icon' => 'table', 'url' => ['/transmision']],
                            ['label' => 'Users', 'icon' => 'table', 'url' => ['/user']],
                        ]
                    ],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Gráficos',
                        'icon' => 'line-chart',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => 'Artículos más vistos',
                                'icon' => 'bar-chart',
                                'url' => ['grafico/vistas-articulo'],
                            ],
                            [
                                'label' => 'Artículos más descargados',
                                'icon' => 'bar-chart',
                                'url' => ['grafico/descargas-articulo'],
                            ],
                        ],
                    ],
                    [
                        'label' => 'RBAC',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Asignaciones', 'icon' => 'file-code-o', 'url' => ['/auth-assignment'],],
                        ]
                    ],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
