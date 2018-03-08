<?php
$this->breadcrumbs=array(
	'Admin',
);?>


<!--  <h1><?php //echo $this->id . '/' . $this->action->id; ?></h1> -->
<!-- 
<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>
 -->


<div class="col-md-6">

<div class="panel panel-info">

		<div class="panel-heading">
		    <h3 class="panel-title">Cursos</h3>
		  </div>
		  <div class="panel-body">
		   <p>Aqui podras encontrar toda la informacion relacionada a los cursos , horarios y  precios</p>
		   
		   <table class="table">
<tbody>
<tr>
<td>No. de cursos</td>
<td><?php echo $ncursos;?></td>
</tr>	
<tr>
<td><span class="glyphicon glyphicon-arrow-up"></span>Mas caro $<?php echo $cC->PUBLISHED_PRICE;?></td>
<td># <?php echo $cC->ID;?>, <?php echo $cC->NAME;?> </td>
</tr>	
</tbody>
</table>
		  </div>
		  <div class="panel-footer">
		  <small><a>Ayuda</a></small>
		  </div>
		</div>


		<div class="panel panel-info">
		<div class="panel-heading">
		    <h3 class="panel-title">Categorías</h3>
		  </div>
		  <div class="panel-body">
		   Información de Categorías. Aqui podras encontrar informacion sobre las diferentes categorìas de los cursos.
		  </div>
		  <div class="panel-footer"> <small><a>Ayuda</a></small></div>
		</div>
</div>








<div class="col-md-6">
	<div class="panel panel-info">
	<div class="panel-heading">
	    <h3 class="panel-title">Productos.</h3>
	  </div>
	  <div class="panel-body">
		  Información de productos. Los productos se derivan de los cursos disponibles, es posible tener mas de un producto de un tipo de curso.
	  </div>
	  <div class="panel-footer"> <small><a>Ayuda</a></small></div>
	</div>
</div>

	<div class="col-md-6">
		<div class="panel panel-info">
		<div class="panel-heading">
		    <h3 class="panel-title">Organización</h3>
		  </div>
		  <div class="panel-body">
		  Información de la organizacion. Aqui podras encontrar informacion de los niveles de jerarquias en las diferentes tecnologias impartidas.
		  </div>
		  <div class="panel-footer"> <small><a>Ayuda</a></small></div>
		</div>
	</div>
	
	
	<div class="col-md-6">
	<div class="panel panel-info">
	<div class="panel-heading">
	    <h3 class="panel-title">Ordenes de compra</h3>
	  </div>
	  <div class="panel-body">
	  Información de ordenes de compra . Aqui podras encontrar información de las diferente ordenes de compra.
	  </div>
	  <div class="panel-footer"> <small><a>Ayuda</a></small></div>
	</div>
	</div>
	
	
	
	<div class="col-md-6">
	<div class="panel panel-info">
	<div class="panel-heading">
	    <h3 class="panel-title">Tutoriales</h3>
	  </div>
	  <div class="panel-body">
	  Información de los tutoriales. Aqui podras encontrar informacion sobre los tutoriales existentes.
	  </div>
	  <div class="panel-footer"> <small><a>Ayuda</a></small></div>
	</div>
	</div>
	
	
	<div class="col-md-6">
	<div class="panel panel-info">
	<div class="panel-heading">
	    <h3 class="panel-title">Metodología</h3>
	  </div>
	  <div class="panel-body">
	  Información de metodologias. Aqui podras encontrar informacion sobre el desarrollo de las metodologias.
	  </div>
	  <div class="panel-footer"> <small><a>Ayuda</a></small></div>
	</div>
	</div>
	
	
	<div class="col-md-6">
	<div class="panel panel-info">
	<div class="panel-heading">
	    <h3 class="panel-title">Clientes</h3>
	  </div>
	  <div class="panel-body">
	  Información de clientes. Aqui podras encontrar el total de clientes existentes en los cursos .
	  </div>
	  <div class="panel-footer"> <small><a>Ayuda</a></small></div>
	</div>
	</div>
	
	
	
	
	<div class="col-md-6">
	<div class="panel panel-info">
	<div class="panel-heading">
	    <h3 class="panel-title">Promociones</h3>
	  </div>
	  <div class="panel-body">
	  Información de Niveles de jerarquia. Aqui podras encontrar informacion de los niveles de jerarquias en las diferentes tecnologias impartidas.
	  </div>
	  <div class="panel-footer"> <small><a>Ayuda</a></small></div>
	</div>
	
	
	<div class="panel panel-info">
	<div class="panel-heading">
	    <h3 class="panel-title">Staff</h3>
	  </div>
	  <div class="panel-body">
	   Información personal. Aqui podras administrar tus datos.
	  </div>
	  <div class="panel-footer"> <small>Ayuda</small></div>
	</div>

</div>



