<?php

/** @var yii\web\View $this */

$this->title = 'UNIDAD EDUCATIVA FISCOMISIONAL ROCAFUERTE';
?>
<div class="site-index">

<div class="row">
    <div class="col-12 ">
    <h2>
      
        <?= $institucion->nombre ?>
            <small class="text-body-secondary">Educacion continua</small>
    </h2>
        
    </div>
</div>

    
    <?= $institucion->direccion ?>
    <?= $institucion->telefono ?>
    <?= $institucion->correo ?>

   
</div>
