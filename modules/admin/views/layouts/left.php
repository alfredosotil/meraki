<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> en línea</a>
            </div>
        </div>

        <!-- search form -->
        <!--
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        -->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'encodeLabels' => false,
                'items' => [
                    ['label' => 'User menu', 'options' => ['class' => 'header']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'icon' => 'user',
                        'label' => 'Users',
                        'items' => [
                            [
                                'label' => 'User List',
                                'url' => ['/admin/user/index'],
                            ],
                        ],
                    ],
                    [
                        'icon' => 'briefcase',
                        'label' => 'Business',
                        'items' => [
                            [
                                'label' => 'Detail List',
                                'url' => ['/admin/detail/index'],
                            ],
                            [
                                'label' => 'Group Food List',
                                'url' => ['/admin/group-food/index'],
                            ],
                            [
                                'label' => 'History List',
                                'url' => ['/admin/history/index'],
                            ],
                            [
                                'label' => 'Ingredient List',
                                'url' => ['/admin/ingredients/index'],
                            ],
                            [
                                'label' => 'Order List',
                                'url' => ['/admin/order/index'],
                            ],
                            [
                                'label' => 'Plan List',
                                'url' => ['/admin/plan/index'],
                            ],
                            [
                                'label' => 'Product List',
                                'url' => ['/admin/product/index'],
                            ],
                            [
                                'label' => 'Product Ingredients List',
                                'url' => ['/admin/product-has-ingredients/index'],
                            ],
                            [
                                'label' => 'Product Sizes List',
                                'url' => ['/admin/product-has-sizes/index'],
                            ],
                            [
                                'label' => 'Sizes List',
                                'url' => ['/admin/sizes/index'],
                            ],
                            [
                                'label' => 'Subscription List',
                                'url' => ['/admin/subscription/index'],
                            ],
                            [
                                'label' => 'Type Ingredient List',
                                'url' => ['/admin/type-ingredient/index'],
                            ]
                        ],
                    ],
                    [
                        'icon' => 'file-o',
                        'label' => 'CMS',
                        'url' => ['/admin/cms/index'],
                    ],
                    [
                        'icon' => 'user-secret',
                        'label' => 'RBAC',
                        'url' => ['/admin/rbac/assignment/index'],
                        'active' => $this->context->module->id == 'rbac',
                    ],
                    [
                        'icon' => 'archive',
                        'label' => 'Settings Storage',
                        'url' => ['/admin/settings-storage'],
                        'active' => $this->context->module->id == 'settings-storage',
                    ],
                    [
                        'icon' => 'cogs',
                        'label' => 'Cron Schedule Log',
                        'url' => ['/admin/settings/cron'],
                    ],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                        ],
                    ],
                    ['label' => 'Public Area', 'url' => ['/'], 'icon' => 'globe',],
                    ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                        'url' => ['/site/logout'],
                        'icon' => 'power-off',
                        'linkOptions' => ['data-method' => 'post'],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
