<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
{% var first = document.getElementById('documentType'); %}
{% var options = first.options;%}	
    <tr class="template-upload fade">

        <td class="preview">
			<span class="fade"></span>
			<br />
			{%=file.name%}
			<br />
			{%=o.formatFileSize(file.size)%}
		</td>

        <td class="name">
			<b><label>Descripción </label></b>
			<input type="text" class="form-control" name="_DOCUMENT[{%=file.name%}][DESCRIPTION]"/>
			
			<b><label>Tipo de Archivo</label></b>
			<select name="_DOCUMENT[{%=file.name%}][TYPE]" class="form-control">
				{% for (var j = 0; j < options.length; j++ ){ %}
				<option value="{%=options[j].value%}" >{%=options[j].text%}</option>
				{% } %}
			</select>

		</td>
        
        {% if (file.error) { %}
            <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
        {% } else if (o.files.valid && !i) { %}
            <td>
                <div class="progress progress-success progress-striped active"><div class="bar" style="width:0%;"></div></div>
            </td>
            <td class="start">{% if (!o.options.autoUpload) { %}
                <button class="btn btn-primary">
                    <i class="icon-upload icon-white"></i>
                    <span>{%=locale.fileupload.start%}</span>
                </button>
            {% } %}</td>
        {% } else { %}
            <td colspan="2"></td>
        {% } %}
        <td class="cancel">{% if (!i) { %}
            <button class="btn btn-warning">
                <i class="icon-ban-circle icon-white"></i>
                <span>{%=locale.fileupload.cancel%}</span>
            </button>
        {% } %}</td>
    </tr>
{% } %}
</script>
