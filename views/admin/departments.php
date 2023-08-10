    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Журнал подразделений
        <small>админка</small>
      </h1>

      <ul class="breadcrumb">
       <li >
          <a href="<?=URL?>admin">Панель администратора</a>
        </li>
  
		<li >
		<a href="#"><?=$this->model->title?></a>
		</li>
      </ul>

      <!-- Intro Content -->
      <div class="row">
        <div class="col-lg-4">
			
<div class="card text-white bg-primary" style="min-height: 7rem; margin-bottom: 1.5rem;" id="informer">

<div class="card-body" >
<div class="icon_flag"><i class="fa fa-flag-o"></i></div>
<h4 class="card-title">Текст сообщения</h4>
<p class="card-text">Описание сообщения</p>
</div>

</div>
	
		<div class="card" style=" margin-bottom: 1.5rem;">
		<div class="card-body">
		  <form id="form_">
		  <div class="form-group row">
		  <div class="col-12">
		  	<input class="form-control  form-control-sm" placeholder="Наименование" type="text" value="" name="name">
		  </div>
		  </div>
		  

<button class="btn btn-outline-success btn-sm mb-2 mr-sm-2 mb-sm-0" type="button" id="form_change" onclick="return form_.change()"  disabled>Изменить</button>
<button class="btn btn-outline-primary btn-sm  mb-2 mr-sm-2 mb-sm-0" id="form_add" onclick="return form_.add()" type="button">Добавить</button>
<button class="btn btn-outline-danger btn-sm  mb-2 mr-sm-2 mb-sm-0" type="button" id="form_del"  onclick="return form_.del()" disabled>Удалить</button>

  </form>

  </div> 
  </div>

        </div>
        <div class="col-lg-8">
		<div style="font-size: 0.8rem;">
<table class="table table-sm table-hover " id="jform_">
  <thead class="thead-inverse ">
    <tr >
	  <th width="20"><a href="" style="color:white;"><i class="fa fa-edit"></i></a></th>
      <th>Наименование</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
</div>
        </div>
      </div>
      <!-- /.row -->



    </div>
	
<script> 
(function($) {
    $.fn.removeClassWild = function(mask) {
        return this.removeClass(function(index, cls) {
            var re = mask.replace(/\*/g, '\\S+');
            return (cls.match(new RegExp('\\b' + re + '', 'g')) || []).join(' ');
        });
    };
})(jQuery);



$(function(){
	$('#form_').on('change', ' input, textarea, select', function(event){
        event.preventDefault();
        $(this).addClass('changed');
	});
	
 informer = {
	set : function(title,body,color){
		$("#informer").removeClassWild("bg-*").addClass("bg-"+color);
		$("#informer").find(".card-title").text(title);
		$("#informer").find(".card-text").text(body);
	}
};	
	
	form_ = {
	data : {},
	index : 0,
	table : {},
	init : function(){
		form_.table = $('#jform_').DataTable({
		"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
		},
        data: [],
		"processing": true,
        "serverSide": true,
        "ajax": "<?=URL?>/admin/ssp_departments/",
        "columns": [
		{"bSortable":false,
		"mRender" : function(col,type,full){
			return '<a class="edit" href="#"><i class="fa fa-edit"></i></a>';
		}},
		{"data": "name"
		},
		],
		"order": [[ 1, "asc" ]],
		"aLengthMenu": [15,25,50,100],
		"sDom": '<"col-md-5"l><"col-md-7"f><"top"i>rt<"col-md-12"p>'
	}).on("click","tbody>tr>td>a.edit",function(e){
		e.preventDefault();
		$('#form_')[0].reset();
		$('#form_ input,#form_ textarea,#form_ select').removeClass('changed');
		
		
		var tr = $(this).closest('tr');
	
		$('#form_change, #form_del').prop('disabled',false);
	
		tr.hasClass('selected') ? tr.removeClass('selected') : $('#jform_ > tbody > tr.selected').removeClass('selected');
		tr.addClass('selected');
		
		
		form_.data = form_.table.row( tr ).data(); 
		form_.index = form_.table.row( tr ).index();
		
		var $inputs = $('#form_ input[type="text"],#form_ input[type="hidden"], #form_ textarea');		 
		$inputs.each(function(k,v) {
            var atr_name = $(v).attr('name');
            if( form_.data[atr_name] ){
                $(v).val(form_.data[atr_name]);
            }		 
		});
		

		informer.set(form_.data.name, "id:"+form_.data.id, "primary");
		
	});
},
    change : function(){

		var $inputs = $('#form_ input[type="text"].changed,#form_ input[type="hidden"], #form_ textarea.changed,#form_ select.changed');		 
		$inputs.each(function(k,v) {
            var atr_name = $(v).attr('name');
            if( typeof form_.data[atr_name] != 'undefined' ){
				form_.data[atr_name] = $(v).val();
            }	 	 
		});
		

	  $.post('departments_change', {data:JSON.stringify(form_.data)},
    function(f) {
      if (f.status == 'success') {
        informer.set('Выполнен', f.message, "success");
				form_.table
				.row( form_.index )
				.data( form_.data )
				.draw(false);
		
      } else {
        informer.set('Ошибка', f.message, "danger");
      }
    }, 'json');
	
	
return false;	
},
del : function(){

	$.post('departments_del', {data:JSON.stringify(form_.data)},
	function(f) {
	  if (f.status == 'success') {
		informer.set('Удален', f.message, "success");
				form_.table
				.row( form_.index )
				.data( form_.data )
				.draw(false);
		
	  } else {
		informer.set('Ошибка', f.message, "danger");
	  }
	}, 'json');

	
	
return false;	
},
add : function(){

 var $inputs = $('#form_ input[type="text"],#form_ input[type="hidden"], #form_ textarea,#form_ select');		 
		$inputs.each(function(k,v) {
				form_.data[$(v).attr('name')] = $(v).val();
		});
		

	  $.post('departments_add', {data:JSON.stringify(form_.data)},
    function(f) {
      if (f.status == 'success') {
        informer.set('Выполнен', f.message, "success");
		
			form_.data.id = f.id;
			form_.table.draw(false);
		
      } else {
        informer.set('Ошибка', f.message, "danger");
      }
    }, 'json');
	
	
	
return false;	
},
}
form_.init();		
	
	
	
	
	
});


</script>	
	
    <!-- /.container -->