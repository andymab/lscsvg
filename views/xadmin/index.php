    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Новая запись администратора
        <small>инсталяция</small>
      </h1>

      <ol class="breadcrumb">
        <li>
          <a href="<?=URL?>">Главная</a>
        </li>
        <li><a href="#">Новая запись администратора</a></li>
      </ol>

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <h3>Новая запись администратора </h3>
          <form name="sentMessage" action="/xadmin/addcontent" method="POST">
            <div class="control-group form-group">
                <label>Email:</label>			
              <div class="controls">
                <input type="email" class="form-control" id="name" name="email" required 
				data-validation-required-message="Пожалуйста введите ваше имя."
				data-validation-email-message="Ошибка в email."
				>
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
                <label>Пароль:</label>			
              <div class="controls">
                <input type="password" class="form-control" name="password" required data-validation-required-message="Пожалуйста введите пароль администратора">
              </div>
            </div>
			<div class="control-group form-group">
                <label>Повторите пароль:</label>			
              <div class="controls">
                <input type="password" class="form-control" name="Repassword" 
				required data-validation-required-message="Пожалуйста повторите пароль администратора"
				>
              </div>
            </div>
			
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary">Добавить запись</button><?=$this->model->message?>
          </form>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->