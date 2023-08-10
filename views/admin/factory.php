    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Журнал предприятий
        <small>админка</small>
      </h1>

      <ul class="breadcrumb">
       <li >
          <a href="/admin">Панель администратора</a>
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
		  <form id="factory_form">
		  <div class="form-group row">
		  <label for="name" class="col-4 col-form-label col-form-label-sm">Наименование:</label>
		  <div class="col-8">
		  	<input class="form-control  form-control-sm" type="text" value="" name="name">

		  </div>
		  </div>
		  
		  
		  
		  <div class="form-group row">
		  <label for="descr" class="col-4 col-form-label col-form-label-sm">Описание задачи:</label>
		  <div class="col-8">
		  <textarea class="form-control  form-control-sm" type="text" value="" name="descr"></textarea>
		  </div>
		  </div>
		  
		  <div class="form-group row">
		  <label for="contact" class="col-4 col-form-label col-form-label-sm">Контактное лицо:</label>
		  <div class="col-8">
		  <textarea class="form-control  form-control-sm" type="text" value="" name="contact"></textarea>
		  </div>
		  </div>

		  <div class="form-group row">
		  <label for="status" class="col-4 col-form-label col-form-label-sm">Статус:</label>
		  <div class="col-8">
		  <input type="hidden" name="status_id">
		  <input class="form-control  form-control-sm" type="text" value="" name="status">
		  </div>
		  </div>

<button class="btn btn-outline-success btn-sm mb-2 mr-sm-2 mb-sm-0" type="button" id="factory_form_change" onclick="return factory_form.change()"  disabled>Изменить</button>
<button class="btn btn-outline-primary btn-sm  mb-2 mr-sm-2 mb-sm-0" id="factory_form_add" onclick="return factory_form.add()" type="button">Добавить</button>
<button class="btn btn-outline-danger btn-sm  mb-2 mr-sm-2 mb-sm-0" type="button" id="factory_form_del"  onclick="return factory_form.del()" disabled>Удалить</button>

  </form>

  </div> 
  </div>

        </div>
        <div class="col-lg-8">
		<div style="font-size: 0.8rem;">
<table class="table table-sm table-hover " id="jfactory_form">
  <thead class="thead-inverse ">
    <tr >
	  <th width="20"><a href="" style="color:white;"><i class="fa fa-edit"></i></a></th>
      <th width="140">Предприятие</th>
	  <th width="140">Задача</th>
      <th>Ответственный</th>
      <th width="140">Статус</th>
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
	$('input[name="status"]').typeahead({
		minLength: 0,
		afterSelect: function(item){
			$('input[name="status_id"]').val(item.status_id);
		},
		source:  function (query, process) {
			$.get('get_typeheadStatus', {q: query,profile:'factory'}, function(result){
				return process(result.sort(function(a,b){return a.name > b.name;}));
			},'json');
		},
		displayText : function(item){
			return item.name;
		}
	});

	
	$('#factory_form').on('change', ' input, textarea, select', function(event){
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
	
	factory_form = {
	data : {},
	index : 0,
	table : {},
	init : function(){
		factory_form.table = $('#jfactory_form').DataTable({
		"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
		},
        data: [],
		"processing": true,
        "serverSide": true,
        "ajax": "/admin/ssp_factory/",
        "columns": [
		{"bSortable":false,
		"mRender" : function(col,type,full){
			return '<a class="edit" href="#"><i class="fa fa-edit"></i></a>';
		}},
		{"data": "name"
		},
		{"data": "descr"
		},
		{"data": "contact"
		},
		{"data": "status"
		},
		],
		"order": [[ 1, "desc" ]],
		"aLengthMenu": [15,25,50,100],
		"sDom": '<"col-md-5"l><"col-md-7"f><"top"i>rt<"col-md-12"p>'
	}).on("click","tbody>tr>td>a.edit",function(e){
		e.preventDefault();
		$('#factory_form')[0].reset();
		$('#factory_form input,#factory_form textarea,#factory_form select').removeClass('changed');
		
		
		var tr = $(this).closest('tr');
	
		$('#factory_form_change, #factory_form_del').prop('disabled',false);
	
		tr.hasClass('selected') ? tr.removeClass('selected') : $('#jusers_table > tbody > tr.selected').removeClass('selected');
		tr.addClass('selected');
		
		
		factory_form.data = factory_form.table.row( tr ).data(); 
		factory_form.index = factory_form.table.row( tr ).index();
		
		var $inputs = $('#factory_form input[type="text"],#factory_form input[type="hidden"], #factory_form textarea');		 
		$inputs.each(function(k,v) {
            var atr_name = $(v).attr('name');
            if( factory_form.data[atr_name] ){
                $(v).val(factory_form.data[atr_name]);
            }		 
		});
		

		informer.set(factory_form.data.name, "id:"+factory_form.data.id, "primary");
		
	});
},
    change : function(){

		var $inputs = $('#factory_form input[type="text"].changed,#factory_form input[type="hidden"], #factory_form textarea.changed,#factory_form select.changed');		 
		$inputs.each(function(k,v) {
            var atr_name = $(v).attr('name');
            if( typeof factory_form.data[atr_name] != 'undefined' ){
				factory_form.data[atr_name] = $(v).val();
            }	 	 
		});
		

	  $.post('factory_change', {data:JSON.stringify(factory_form.data)},
    function(f) {
      if (f.status == 'success') {
        informer.set('Выполнен', f.message, "success");
				factory_form.table
				.row( factory_form.index )
				.data( factory_form.data )
				.draw(false);
		
      } else {
        informer.set('Ошибка', f.message, "danger");
      }
    }, 'json');
	
	
return false;	
},
del : function(){

	$.post('factory_del', {data:JSON.stringify(factory_form.data)},
	function(f) {
	  if (f.status == 'success') {
		informer.set('Удален', f.message, "success");
				factory_form.table
				.row( factory_form.index )
				.data( factory_form.data )
				.draw(false);
		
	  } else {
		informer.set('Ошибка', f.message, "danger");
	  }
	}, 'json');

	
	
return false;	
},
add : function(){

 var $inputs = $('#factory_form input[type="text"],#factory_form input[type="hidden"], #factory_form textarea,#factory_form select');		 
		$inputs.each(function(k,v) {
				factory_form.data[$(v).attr('name')] = $(v).val();
		});
		

	  $.post('factory_add', {data:JSON.stringify(factory_form.data)},
    function(f) {
      if (f.status == 'success') {
        informer.set('Выполнен', f.message, "success");
		
			factory_form.data.id = f.id;
			factory_form.table.draw(false);
		
      } else {
        informer.set('Ошибка', f.message, "danger");
      }
    }, 'json');
	
	
	
return false;	
},
}
factory_form.init();		
	
	
	
	
	
});


</script>	
	
    <!-- /.container -->