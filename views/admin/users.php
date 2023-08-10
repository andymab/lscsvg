    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Журнал пользователей
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
		  <form id="users_form">
		  <div class="form-group row">
		  <div class="col-12">
		  	<input class="form-control form-control-sm" placeholder="ФИО" type="text" value="" name="name">

		  </div>
		  </div>
		  
		<div class="form-group row">
		  <div class="col-12">
		  	<input class="form-control  form-control-sm" placeholder="Email" type="text" value="" name="email">
		  </div>
		  </div>	  
		  
<!-- 		  <div class="form-group row">
		  <label for="factory" class="col-4 col-form-label col-form-label-sm">Предпиятие:</label>
		  <div class="col-8">
		  <input type="hidden" name="factory_id">
		  <input class="form-control  form-control-sm" type="text" value="" name="factory">
		  </div>
		  </div> -->
		  
<!-- 		  <div class="form-group row">
		  <label for="phone" class="col-4 col-form-label col-form-label-sm">Телефон для контакта:</label>
		  <div class="col-8">
		  <input class="form-control  form-control-sm" type="text" value="" name="phone">
		  </div>
		  </div> -->

		  <div class="form-group row">
		  <div class="col-12">
		  <textarea class="form-control  form-control-sm" placeholder="Комментарий" type="text" value="" name="descr"></textarea>
		  </div>
		  </div>
		  
<!-- 		  <div class="form-group row">
		  <label for="consultant" class="col-4 col-form-label col-form-label-sm">Консультант:</label>
		  <div class="col-8">
		  <input type="hidden" name="consultant_id">
		  <input class="form-control  form-control-sm" type="text" value="" name="consultant">
		  </div>
		  </div> -->

		  <div class="form-group row">
		  <div class="col-12">
		  <input type="hidden" name="department_id">
		  <input class="form-control  form-control-sm" placeholder= "Подразделение" type="text" value="" name="department">
		  </div>
		  </div>

		  
		  <div class="form-group row">
		  <div class="col-12">
		  <input class="form-control  form-control-sm" type="text"  value="" name="passwd" placeholder="Пароль, только если изменить">
		  </div>
		  </div>
		  
 <div class="form-group" id="user_role">
<div class="form-check form-check-inline">
  <label class="form-check-label">
    <input class="form-check-input" type="checkbox" name="admin" > Администратор
  </label>
</div>
<!-- <div class="form-check form-check-inline">
  <label class="form-check-label">
    <input class="form-check-input" type="checkbox" name="user" > Пользователь
  </label>
</div> -->
<!-- <div class="form-check form-check-inline">
  <label class="form-check-label">
    <input class="form-check-input" type="checkbox" name="consultant" > Консультант
  </label>
</div> -->

<div class="form-check form-check-inline">
  <label class="form-check-label">
    <input class="form-check-input" type="checkbox" name="MR3" > МР3
  </label>
</div>
</div>
 

<button class="btn btn-outline-success btn-sm mb-2 mr-sm-2 mb-sm-0" type="button" id="user_change" onclick="return jusers.user_change()"  disabled>Изменить</button>
<button class="btn btn-outline-primary btn-sm  mb-2 mr-sm-2 mb-sm-0" id="user_add" onclick="return jusers.user_add()" type="button">Добавить</button>
<button class="btn btn-outline-danger btn-sm  mb-2 mr-sm-2 mb-sm-0" type="button" id="user_del" onclick="return jusers.user_del()" disabled>Удалить</button>

  </form>

  </div> 
  </div>

        </div>
        <div class="col-lg-8">
		<div style="font-size: 0.8rem;">
<table class="table table-sm table-hover " id="jusers_table">
  <thead class="thead-inverse ">
    <tr >
	  <th width="20"><a href="" style="color:white;"><i class="fa fa-edit"></i></a></th>
      <th width="60">Посещение</th>
      <th>Фамилия И.О.</th>
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
/*	$('input[name="factory"]').typeahead({
		minLength: 0,
		afterSelect: function(item){
			$('input[name="factory_id"]').val(item.factory_id);
		},
		source:  function (query, process) {
			$.get('get_typeheadFact', {q: query}, function(result){
				return process(result.sort(function(a,b){return a.factory > b.factory;}));
			},'json');
		},
		displayText : function(item){
			return item.factory;
		}
	});
*/
/*    
	$('input[name="consultant"]').typeahead({
		minLength: 0,
		afterSelect: function(item){
			$('input[name="consultant_id"]').val(item.consultant_id);
		},
		source:  function (query, process) {
			$.get('get_typeheadCons', {q: query}, function(result){
				return process(result.sort(function(a,b){return a.consultant > b.consultant;}));
			},'json');
		},
		displayText : function(item){
			return item.consultant;
		}
	});	
*/	
	$('input[name="department"]').typeahead({
		minLength: 0,
		afterSelect: function(item){
			$('input[name="department_id"]').val(item.department_id);
		},
		source:  function (query, process) {
			$.get('get_typeheadDep', {q: query}, function(result){
				return process(result.sort(function(a,b){return a.department > b.department;}));
			},'json');
		},
		displayText : function(item){
			return item.department;
		}
	});		
	
	
	$('#users_form').on('change', ' input, textarea, select', function(event){
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
	
	jusers = {
	data : {},
	index : 0,
	table : {},
	init : function(){
		jusers.table = $('#jusers_table').DataTable({
		"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
		},
        data: [],
		"processing": true,
        "serverSide": true,
        "ajax": "<?=URL?>admin/ssp_users/",
        "columns": [
		{"bSortable":false,
		"mRender" : function(col,type,full){
			return '<a class="edit" href="#"><i class="fa fa-edit"></i></a>';
		}},
		{"data": "restime",
		"mRender":function(restime,type,full){
			if(type == 'display'){
                var d = new Date(parseInt(restime * 1000));
                return d.toLocaleDateString();
            }else
                return restime;
		}
		},
		{"data": "name"
		},
        {"data":"role", "name":"role", "bVisible":false},
        ],
		"order": [[ 1, "desc" ]],
		"aLengthMenu": [15,25,50,100],
		"sDom": '<"col-md-5"l><"col-md-7"f><"top"i>rt<"col-md-12"p>'
	}).on("click","tbody>tr>td>a.edit",function(e){
		e.preventDefault();
		$('#users_form')[0].reset();
		$('#users_form input,#users_form textarea,#users_form select').removeClass('changed');
		
		
		var tr = $(this).closest('tr');
	
		$('#user_change, #user_del').prop('disabled',false);
	
		tr.hasClass('selected') ? tr.removeClass('selected') : $('#jusers_table > tbody > tr.selected').removeClass('selected');
		tr.addClass('selected');
		
		
		jusers.data = jusers.table.row( tr ).data(); 
		jusers.index = jusers.table.row( tr ).index();
		
		//console.log(jusers.data);
		var $inputs = $('#users_form input[type="text"],#users_form input[type="hidden"], #users_form textarea');		 
		$inputs.each(function(k,v) {
            var atr_name = $(v).attr('name');
            if( jusers.data[atr_name] ){
                $(v).val(jusers.data[atr_name]);
            }		 
		});
		
		
		
		var $inputs = $('#user_role input[type="checkbox"]').prop('checked', false);		 
		$inputs.each(function(k,v) {
            var atr_name = $(v).attr('name');
			
            if( jusers.data.role.indexOf(atr_name) != -1 ){
                $(v).prop('checked', true);
            }		 
		});

		informer.set("завод:"+jusers.data.factory, jusers.data.name, "primary");
		
	});
},
    user_change : function(){

		var $inputs = $('#users_form input[type="text"].changed,#users_form input[type="hidden"], #users_form textarea.changed,#users_form select.changed');		 
		$inputs.each(function(k,v) {
            var atr_name = $(v).attr('name');
            if( typeof jusers.data[atr_name] != 'undefined' ){
				jusers.data[atr_name] = $(v).val();
            }	 	 
		});
		
		
		
		var $inputs = $('#user_role input[type="checkbox"]:checked');		 
		var role = [];
		$inputs.each(function(k,v) {
            var atr_name = $(v).attr('name');
			role[k]=$(v).attr('name');
			
		});
		
		//if($('input[name="passwd"]').val())
		jusers.data.passwd = $('input[name="passwd"]').val();
		
		jusers.data.role = JSON.stringify(role);
        

	  $.post('user_change', {data:JSON.stringify(jusers.data)},
    function(f) {
      if (f.status == 'success') {
        informer.set('Выполнен', f.message, "success");
				jusers.table
				.row( jusers.index )
				.data( jusers.data )
				.draw(false);
		
      } else {
        informer.set('Ошибка', f.message, "danger");
      }
    }, 'json');
	
	
return false;	
},
user_del : function(){

	$.post('user_del', {data:JSON.stringify(jusers.data)},
	function(f) {
	  if (f.status == 'success') {
		informer.set('Удален', f.message, "success");
				jusers.table
				.row( jusers.index )
				.data( jusers.data )
				.draw(false);
		
	  } else {
		informer.set('Ошибка', f.message, "danger");
	  }
	}, 'json');

	
	
return false;	
},
user_add : function(){

 var $inputs = $('#users_form input[type="text"],#users_form input[type="hidden"], #users_form textarea,#users_form select');		 
		$inputs.each(function(k,v) {
				jusers.data[$(v).attr('name')] = $(v).val();
		});
		
		var $inputs = $('#user_role input[type="checkbox"]:checked');		 
		var role = [];
		$inputs.each(function(k,v) {
            var atr_name = $(v).attr('name');
			role[k]=$(v).attr('name');
			
		});
		jusers.data.role = JSON.stringify(role);


	  $.post('user_add', {data:JSON.stringify(jusers.data)},
    function(f) {
      if (f.status == 'success') {
        informer.set('Выполнен', f.message, "success");
		
				jusers.data.id = f.id;
		
				jusers.table.draw(false);
		
      } else {
        informer.set('Ошибка', f.message, "danger");
      }
    }, 'json');
	
	
	
return false;	
},
}
jusers.init();		
	
	
	
	
	
});


</script>	
	
    <!-- /.container -->