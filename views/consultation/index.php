    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Консультации
      </h1>

      <ul class="breadcrumb">
        <li ><a href="<?=URL?>">Главная</a></li>
        <li ><a href="#">Консультации</a></li>
      </ul>

      <!-- Content Row -->
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
		  
	  
		  
		  <div class="form-group">
		  <label for="name" class="col-form-label col-form-label-sm">Ответ:</label>
			<textarea class="form-control  form-control-sm" type="text" value="" name="question"></textarea>
			<!--        <p class="help-block">Example block-level help text here.</p> -->
		  </div>
		  
 
		  <div class="form-group row">
		  <label for="descr" class="col-4 col-form-label col-form-label-sm">Статус:</label>
		  <div class="col-8">
		  <input type="hidden" name="status_id">
		  <input class="form-control  form-control-sm" type="text" value="" name="status">
		  </div>
		  </div>		  

<button class="btn btn-outline-success btn-sm mb-2 mr-sm-2 mb-sm-0" type="button" id="form_change" onclick="return form_.change()"  disabled>Изменить</button>
<button class="btn btn-outline-primary btn-sm  mb-2 mr-sm-2 mb-sm-0" id="form_add" onclick="return form_.add()" type="button">Добавить</button>
<button class="btn btn-outline-danger btn-sm  mb-2 mr-sm-2 mb-sm-0" type="button" id="form_del"  onclick="return form_.del()" disabled>Удалить</button>

  </form>

  </div> 
  </div>

		<div class="card" style=" margin-bottom: 1.5rem;">
		<div class="card-body">	
		<h4 class="card-title">Установить отбор</h4>
		 <form id="form_table">
		  <div class="form-group">
		  <label for="factory" class="col-form-label col-form-label-sm">Предприятие:</label>
		  <input type="hidden" name="factory_id">
		  <input class="form-control  form-control-sm" type="text" value="" name="factory">

		  </div>
		  <div class="form-group">
		  <label for="user" class="col-form-label col-form-label-sm">Сотрудник:</label>
		  <input type="hidden" name="user_id">
		  <input class="form-control  form-control-sm" type="text" value="" name="user">
		  </div>

		  <div class="form-group">
		  <label for="consultant" class="col-form-label col-form-label-sm">Консультант:</label>
		  <input type="hidden" name="consultant_id">
		  <input class="form-control  form-control-sm" type="text" value="" name="consultant">
		  </div>
		  <label for="" class="col-form-label col-form-label-sm">Период</label>		  
		  <div class="form-group row">


		  <label for="" class="col-2 col-form-label col-form-label-sm">c:</label>
		  <div class="col-4">		  
		  <input class="form-control  form-control-sm" type="text" value="" name="fdata_start">
		  </div>
		  <label for="" class="col-2 col-form-label col-form-label-sm">по:</label>
		  <div class="col-4">
		  <input class="form-control  form-control-sm" type="text" value="" name="fdata_stop">
		  </div>		  
		  </div>
		  
	
		  <button class="btn btn-outline-success btn-sm mb-2 mr-sm-2 mb-sm-0" type="button" id="form_option" onclick="return form_.options()">Установить</button>
		  <button class="btn btn-outline-primary btn-sm mb-2 mr-sm-2 mb-sm-0" type="button" id="form_option" onclick="return form_.optionsDel()">Очистить</button>
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
      <th width="80">Дата</th>
	  <th width="140">ФИО</th>
	  <th width="">Вопрос</th>
	  <th width="">Ответ</th>
	  <th width="140">Консультант</th>
	  <th width="80">Статус</th>
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
    <!-- /.container -->
	<script>
	function heading(name){
		$('input[name="'+name+'"]').typeahead({
		minLength: 0,
		afterSelect: function(item){
			$('input[name="'+name+'_id"]').val(item[name+'_id']);
		},
		source:  function (query, process) {
			$.get('/heading/get_h'+name, {q: query}, function(result){
				return process(result.sort(function(a,b){return a[name] > b[name];}));
			},'json');
		},
		displayText : function(item){
			return item[name];
		}
		});		
	}	


$(function(){
heading('factory');
heading('consultant');
heading('user');
	
});	
	</script>

