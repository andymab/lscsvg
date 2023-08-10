    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Панель администратора
        <small>админка</small>
      </h1>

      <ul class="breadcrumb">
       <li >
          <a href="<?=URL?>">Главная</a>
        </li>
  
		<li >
		<a href="#"><?=$this->model->title?></a>
		</li>
      </ul>

      <!-- Intro Content -->
      <div class="row">
<div class="col-lg-4 mb-4">
          <div class="card card-outline-primary h-100">
            <h3 class="card-header bg-primary text-white">Журналы</h3>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><a href="<?=URL?>admin/users">Пользователей</a></li>
		<!-- 	  <li class="list-group-item"><a href="<?=URL?>admin/factorys">Предприятий</a></li> -->
			  <li class="list-group-item"><a href="<?=URL?>admin/departments">Подразделений</a></li>
			<!--    <li class="list-group-item"><a href="<?=URL?>admin/consultants">Сотрудников</a></li> -->

            </ul>
          </div>
</div>
      </div>
      <!-- /.row -->



    </div>
    <!-- /.container -->