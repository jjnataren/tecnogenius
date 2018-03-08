


<?php
$this->breadcrumbs=array(
	'Tutorials'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	
	array('label'=>'Inicio', 'url'=>array('admin')),
	array('label'=>'Crear tutorial', 'url'=>array('create')),
	array('label'=>'Ver tutorial', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Documentos','url'=>array('manageDocuments','id'=>$model->ID)),
);
?>

<h1>Palabras de búsqueda tutorial Id  <?php echo $model->ID; ?> </h1>	



<br />

<div class="col-md-6">


<h2>Ingresar tags</h2>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'tutorial-form',
		'enableAjaxValidation'=>false,
	)); ?>
	<div class="form-group">
		
			<?php $this->widget('ext.multicomplete.MultiComplete', array(
          'model'=>$keyword,
          'attribute'=>'[0]WORD',
          'splitter'=>',',
          'source'=>array('java', 'sql', 'test','zzz','ooo'),
         // 'sourceUrl'=>'search.html',
          // additional javascript options for the autocomplete plugin
          'options'=>array(
                  'minLength'=>'1',
          ),
          'htmlOptions'=>array(
                  'size'=>'60',
					'class'=>'form-control',
					'placeholder'=>'Tags que identifican el tutorial',
					
          ),
  ));
  ?>
  <?php echo $form->error($keyword,'[0]WORD',array('class'=>'text-danger')); ?>
  <span class="help-block">Es posible escribir palabras separadas por coma.</span>
	</div>
	

	<button type="submit" class="btn btn-primary btn-lg" >Definir</button>
	

	<?php $this->endWidget(); ?>
	
	

</div>

<div class="col-md-6">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tutorial-grid',
	'dataProvider'=>$keywordGrid->search(),
	'filter'=>$keywordGrid,
	'columns'=>array(
		array(
					'name'=>'WORD',
					'value'=>'$data->WORD',
					'htmlOptions'=>array('width'=>'100px'),
			),

		array(
			'class'=>'CButtonColumn',
			'header'=>'Opción',
			'template' => '{delete}',
			'buttons'=>array(
				'delete'=> array(
						'url'=>'Yii::app()->createUrl("tutorial/deleteKeyword", array("id"=>$data->TUTORIAL_ID, "keyword"=>$data->WORD))',
								),),

			'htmlOptions'=>array('width'=>'70px'),
		),
	),
)); ?>


</div>


	

	<div class="col-md-12 col-xs-12 col-sm-12">
	
	<h1>Contenido</h1>
		<div class="panel panel-default">
		<div class="panel-heading">
				 <h3 class="panel-title"><span class="glyphicon glyphicon-bookmark"></span>&nbsp;<?=$model->NAME; ?></h3>
	
			</div>
		<div class="panel-body">
			<?php 	echo $model->CONTENT;  ?>
		</div>
		</div>
	</div>

