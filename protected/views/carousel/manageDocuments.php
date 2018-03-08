


<?php
$this->breadcrumbs=array(
		'Carrusel'=>array('admin'),
		$model->TITLE=>array('view','id'=>$model->ID),
		'Documentos',
);

$this->menu=array(
		array('label'=>'Administrar', 'url'=>array('admin')),
		array('label'=>'Nuevo item', 'url'=>array('create')),
		array('label'=>'Actualizar item', 'url'=>array('update', 'id'=>$model->ID)),
		
);
?>


<h1> 
	 Item  Id <?= $model->ID;?>, administrar documentos.	
</h1> 
<div class="col-md-12 col-xs-12 col-sm-12">

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'TITLE',
		'DESCRIPTION',
		'ORDER',
		'ACTION',
		
	),
)); ?>
 
</div> 
<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'player-form',
			'enableAjaxValidation'=>false,
			'htmlOptions' => array('enctype' => 'multipart/form-data'),
			
)); ?>

	
<div class="col-md-12 col-xs-12 col-sm-12">
	<p class="text text-info">
		Los campos con: <span class="required">*</span> son requeridos.
	</p>	
</div>



		
		<?php //echo $form->textField($model,'ACTIVE'); ?>
		<?php echo $form->dropDownList($documentModel,'DOCUMENT_TYPE',$documentModel->documents_type,array('id'=>'documentType','style'=>"visibility: hidden",'class'=>'form-control')); ?>		

		<?php //echo $form->textField($model,'ACTIVE'); ?>
		<?php //echo $form->hiddenField($model,'ID',array('id'=>'ownerId','name'=>'ownerId')); ?>		
	
	
	
				<?php 
								$this->widget('xupload.XUpload', array(
			                    'url' => Yii::app()->createUrl("Carousel/uploadDocument",array("id"=>$model->ID)),
			                    'model' => $fileModel,
								'attribute' => 'file',
								'htmlOptions' => array('id'=>'player-form'),		                    
			                    'multiple' => true,
			));
			?>
			
			<table class="table table-striped">
				<thead>
					<tr>
						<th colspan="2">Archivo</th>
						<th>Descripcion</th>
						<th>Tipo de Archivo</th>
						<th />					
					</tr>	
				</thead>
				<tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery">
				
				<?php foreach ($documents as $document) {?>
				
				 <tr class="template-download fade in" style="height: 146px;">				  
					  <td colspan="2" class="preview">
                		<a href="<?php echo Yii::app( )->getBaseUrl( ).$document->PATH;?>" title="<?php echo $document->NAME;?>" rel="gallery" download="<?php echo $document->NAME;?>">
                		<img src="<?php echo Yii::app( )->getBaseUrl( ).$document->THUMBNAIL;?>">
                		<br />
                		<span><?php echo $document->NAME;?></span>
                		<br />
                		
                		                		
                		</a>
                		<span><?php echo $document->SIZE;?> Bytes</span>
            		  </td>
            			<td class="name">
                			<!-- <a href="<?php // echo $document->PATH;?>" title="<?php  // echo $document->NAME;?>" rel="{%=file.thumbnail_url&&'gallery'%}" download="<?php //echo $document->NAME;?>"><?php echo $document->NAME;?></a> -->
                			
                			<span><?php echo $document->DESCRIPTION;?></span>
                			
            			</td>
	           			 <td class="size">
	           			 	<span><?php echo $document->getStringType();?></span>
	           			 </td>
	           			
            			 <td class="delete">
					            <button class="btn btn-danger" data-type="<?php echo $document->DEL_TYPE;?>" data-url="<?php echo $document->DEL_URL.'/idDocumentModel/'.$document->ID;?>">
					                <i class="icon-trash icon-white"></i>
					                <span>Delete</span>
					            </button>
					            <input type="checkbox" name="delete" value="1" />
					            
				        </td>
				 
				 </tr>
				
				<?php }?>

				
				
				</tbody>
			</table>
			
			
			
			
	<?php $this->endWidget(); ?>

