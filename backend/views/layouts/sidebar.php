
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   <!-- <a href="index.php" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SISVENT</span>
    </a>-->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/avatar4.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Jesiel Argueta</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'Dashboard',
                        'icon' => 'tachometer-alt',
                        'url' => ['site/index'],
                    ],
                    [
                        'label' => 'Almacen', 'icon' => 'archive',
                        'items' => [
                            ['label' => 'Categoria', 'url' => ['categoria/index'], 'icon' => ''],
                            ['label' => 'Presentacion','url' => ['presentacion/index'], 'icon' => ''],
                           // ['label' => 'Marca','url' => ['#'], 'icon' => ''],
                            ['label' => 'Producto','url' => ['producto/index'], 'icon' => ''],
                            ['label' => 'Perecederos', 'url' => ['perecedero/index'], 'icon' => '' ],
                        ]

                    ],
                    [
                        'label' => 'Compras', 'icon' => 'truck',
                        'items' => [
                            ['label' => 'Proveedores', 'url' => ['proveedor/index'], 'icon' => ''],
                            ['label' => 'Realizar Compras','url' => ['compra/index'], 'icon' => ''],
                            ['label' => 'Consultas', 'icon' => ''],
                            ['label' => 'Compras por Fecha','url' => ['#'], 'icon' => ''],
                            ['label' => 'Compras por Mes', 'icon' => ''],
                            ['label' => 'Historial de Precios', 'url' => ['#'], 'icon' => '' ],
                        ]

                    ],
                    [
                        'label' => 'Caja', 'icon' => 'box',
                        'items' => [
                            ['label' => 'Administrar Caja', 'url' => ['caja/index'], 'icon' => ''],
                            ['label' => 'Historial de Caja','url' => ['#'], 'icon' => ''],
                        ]

                    ],
                    [
                        'label' => 'Ventas', 'icon' => 'shopping-cart',
                        'items' => [
                            ['label' => 'Clientes', 'url' => ['cliente/index'], 'icon' => ''],
                            ['label' => 'Realizar Ventas','url' => ['#'], 'icon' => ''],
                            ['label' => 'Consultas', 'icon' => ''],
                            ['label' => 'Ventas por Dia','url' => ['#'], 'icon' => ''],
                            ['label' => 'Ventas por Fecha', 'icon' => ''],
                            ['label' => 'Ventas por Mes', 'url' => ['#'], 'icon' => '' ],
                        ]

                    ],
                    [
                        'label' => 'Inventario', 'icon' => 'th',
                        'items' => [
                            ['label' => 'Ver Inventario', 'url' => ['inventario/index'], 'icon' => ''],
                            ['label' => 'Kardex','url' => ['#'], 'icon' => ''],
                        ]

                    ],

                    [
                        'label' => 'Comprobantes', 'icon' => 'file-text',
                        'items' => [
                            ['label' => 'Tipo de Comprobantes', 'url' => ['comprobante/index'], 'icon' => ''],
                            ['label' => 'Tiraje de Comprobantes','url' => ['#'], 'icon' => ''],
                        ]

                    ],

                    [
                        'label' => 'Usuarios', 'icon' => 'users',
                        'items' => [
                            ['label' => 'Empleado', 'url' => ['#'], 'icon' => ''],
                            ['label' => 'Usuario','url' => ['#'], 'icon' => ''],
                        ]

                    ],
                    [
                        'label' => 'Parametros', 'icon' => 'cogs',
                        'items' => [
                          //  ['label' => 'Monedas', 'url' => ['#'], 'icon' => ''],
                            ['label' => 'Datos de la empresa','url' => ['empresa/index'], 'icon' => ''],
                        ]

                    ],
                    ['label' => 'SETTING YII', 'header' => true],
                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                    
                 /*   ['label' => 'Cliente', 'icon' => 'user', 'url' => ['/cliente'], ],
                    ['label' => 'Proveedor', 'icon' => 'truck', 'url' => ['/proveedor'], ],
                    ['label' => 'Compra', 'icon' => 'shopping-cart', 'url' => ['/compra'] ],*/
                        //Escalones
                   
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>