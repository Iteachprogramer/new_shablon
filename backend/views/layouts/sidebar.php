<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Shablon</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?=Yii::$app->user->identity->username?></a>
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
                        ['label' => "Menyular", 'iconStyle' => 'fas fa-list','url'=>['/menumanager']],
                        ['label' => 'Logotip', 'iconStyle' => 'fas fa-icons','url'=>['/logo/logo']],
                    [
                            'label' => "Yangiliklar",
                            'iconStyle'=>'fas fa-newspaper',
                            'items' =>
                                [
                                ['label' => 'Yangilik turi', 'iconStyle' => 'fas fa-newspaper','url'=>['/post/postcategory']],
                                ['label' => 'Yangiliklar', 'iconStyle' => 'fas fa-newspaper','url'=>['/post/post']]
                            ]
                        ],
                        [
                        'label' => "Rahbariyat",
                        'iconStyle'=>'fas fa-user',
                        'items' => [
                            ['label' => 'Rahbariyat turi', 'iconStyle' => 'fas fa-user','url'=>['/leader/leadercategory']],
                            ['label' => 'Rahbariyat', 'iconStyle' => 'fas fa-user','url'=>['/leader/leader']]
                        ]
                    ],
                        ['label' => 'Sozlamalar', 'iconStyle' => 'fas fa-cog','url'=>['/setting/setting']],
                        ['label' => 'Video', 'iconStyle' => 'fas fa-video','url'=>['/video/video']],
                        ['label' => 'Rasimlar', 'iconStyle' => 'fas fa-images','url'=>['/img/img']],
                        ['label' => "Sahifalar", 'iconStyle' => 'fas fa-pager','url'=>['/page/page']],
                        ['label' => "Tarjimalar", 'iconStyle' => 'fas fa-language','url'=>['/translate-manager']],
                        ['label' => "Foydali saytlar", 'iconStyle' => 'fas fa-link','url'=>['/useful/useful']],
                        ['label' => "Ijtimoiy tarmoqlar", 'iconStyle' => 'fas fa-network-wired','url'=>['/network/network']]

                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>