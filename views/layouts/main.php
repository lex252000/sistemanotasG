<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="<?= Yii::getAlias('@web/css/styles.css') ?>">
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto me-3 me-lg-4 px-4 px-lg-0 text-center'],
        'items' => [
         
            [
                'label' => 'General', // Menú principal "General"
                'items' => [
                    ['label' => 'Institución', 'url' => ['/institucion/index']],
                    ['label' => 'Cursos', 'url' => ['/curso/index']],
                    ['label' => 'Docentes', 'url' => ['/docente/index']],
                    ['label' => 'Asignaturas', 'url' => ['/Asignatura/index']],
                    ['label' => 'Pagaduria', 'url' => ['/Pagaduria/index']],
                    ['label' => 'Matriculacion', 'url' => ['/Matriculacion/index']],
                    ['label' => 'Cargos', 'url' => ['/cargos/index']],
              
                ]
            ],
            
            [
                'label' => 'Aprovechamiento', // Menú principal "Aprovechamiento"
                'items' => [
                    ['label' => 'Notas 1er Trimestre', 'url' => ['/aprovechamiento/trimestre1']],
                    ['label' => 'Notas 2do Trimestre', 'url' => ['/aprovechamiento/trimestre2']],
                    ['label' => 'Notas 3ro Trimestre', 'url' => ['/aprovechamiento/trimestre3']],
              
                ]
         
        ],
        [
            'label' => 'Conducta', // Menú principal "Conducta"
            'items' => [
                ['label' => 'Comportamiento 1er Trimestre', 'url' => ['/comportamiento/trimestre1']],
                ['label' => 'Comportamiento 2do Trimestre', 'url' => ['/comportamiento/trimestre2']],
                ['label' => 'Comportamiento 3er Trimestre', 'url' => ['/comportamiento/trimestre3']],
             
            ]
     
    ],
    [
        'label' => 'Informe', // Menú principal "Informe"
        'items' => [
            ['label' => 'Reportes', 'url' => ['/Reportes/trimestre1']],

         
        ]
 
],


            Yii::$app->user->isGuest
                ? ['label' => 'Login', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Salir (' . Yii::$app->session->get('nombres') . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>',
        ],
    ]);
    NavBar::end();
    ?>
    </header>
    
    ?>
</header>


<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <div class="position-relative">
        <div class="position-absolute top-0 end-0">
            <?php 
            //get sesion role
                $role = Yii::$app->cache->get('userRoleNames_' . Yii::$app->user->id);
                if($role){
                    for ($i=0; $i < count($role) ; $i++) { 
                        if($role[$i] == 'SuperAdmin')
                            echo '<span class="badge rounded-pill bg-danger ml-2">'. ucfirst($role[$i]).'</span><br>';
                        else 
                            if($role[$i] == 'profesor')
                                echo '<span class=" badge rounded-pill bg-success text-white ml-2">'.ucfirst($role[$i]).'</span><br>';
                            else
                            echo '<span class=" badge rounded-pill bg-info text-white ml-2">'.ucfirst($role[$i]).'</span><br>';
                        }
                 }
            ?>
        </div>
        </div>

        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
