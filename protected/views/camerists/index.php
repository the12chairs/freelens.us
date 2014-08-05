<?php
/* @var $this CameristsController */

$this->breadcrumbs=array(
	'Camerists',
);
?>
<h1>Our photographers</h1>

<p>
    <?php //TODO: Add checkbox 'online' ?>
    <?php foreach($camerists->getAll() as $c){ ?>
        <div class = "row" >
            <?php echo $c->login; ?>
            <?php echo CHtml::link('Order', Yii::app()->createUrl('orders/make', array('cam_id' => $c->id))); ?>
            <?php echo CHtml::link('Rate', Yii::app()->createUrl('rating/rate', array('cam_id' => $c->id))); ?>

        </div>
        <br />
    <?php } ?>
</p>