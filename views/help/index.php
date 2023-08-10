    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Помощь
        <small>по разделам сайта</small>
      </h1>

      <ul class="breadcrumb">
        <li ><a href="<?=URL?>">Главная</a></li>
        <li ><a href="#">Помощь</a></li>
      </ul>

      <!-- Content Row -->
      <div class="row">
        <!-- Sidebar Column -->
        <div class="col-lg-3 mb-4">
          <div class="list-group">
            <a href="<?=URL?>help/start/" class="list-group-item active">Начало</a>
            <a href="#" class="list-group-item">Журнал пользоватлей</a>
            <a href="#" class="list-group-item">Добавление раздела и описания к нему</a>
          </div>
        </div>
        <!-- Content Column -->
        <div class="col-lg-9 mb-4">
          <h2>Раздел Начало</h2>
          <p>В этом разделе рассмотрены такие вопросы, как вход и регистрация на сайте <?=SITE?></p>
		            <!-- Preview Image -->
          <img class="img-fluid rounded" src="<?=URL?>public/images/help-start.png" alt="">


          <!-- Date/Time -->
          <p>Рисунок 1.</p>

          <!-- Post Content -->
          <p class="lead">Если вы зарегистрировались в системе, и на ваш почтовый адрес с сайта <b><a href="<?=URL?>"><?=SITE?></a></b> пришло письмо в котором были подтверждены ваш логин и пароль, можете в правом углу экрана, как показано на (рисунке 1) выбрать надпись <b>Войти</b>.</p>
		  
			<p class="lead">Если Вы первый раз на сайте и хотели бы пройти регистрацию <b>(регистрация Вам предоставит дополнительные возможности и бонусы)</b>. Вам необходимо выбрать в этом случае надпись Регистрация, после чего в поле email ввести адрес вашего почтового ящика, в поле пароль Ваш пароль, пароль необходимо подтвердить. После отправки формы, Вам на указанный почтовый ящик прийдет письмо с подтверждением </p>


          <blockquote class="blockquote">
            <p class="mb-0">Адрес указанный Вами, должен быть реально существующим и написан без ошибок, так как к вам прийдет письмо с подтверждением и ссылкой для активации аккаунта</p>
            <footer class="blockquote-footer">Можете не беспокоится, мы не собираем почтовые адреса
              <cite title="Source Title">и не передаем третьим лицам</cite>
            </footer>
          </blockquote>

          <hr>

          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Оставьте ваш комментарий:</h5>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
              </form>
            </div>
          </div>

          <!-- Single Comment -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="<?=URL?>public/images/minaev-logo.png" alt="">
            <div class="media-body">
              <h5 class="mt-0">Минаев А.Б</h5>
              Комментарии здесь не имеют смысла, так, как незарегистрированные пользователи их не видят и не могут их написать, а зарегистрированным это не нужно.
               <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="<?=URL?>public/images/suhov-logo.png" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Сухов Д.В.</h5>
                  Здесь можно оставить комментарий насчет оформления.
                </div>
              </div>           
			
			
			</div>
          </div>




            </div>
          </div>

        </div>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

