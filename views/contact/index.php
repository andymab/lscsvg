    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Контакты
        <small>как с нами связаться</small>
      </h1>

      <ol class="breadcrumb">
        <li>
          <a href="<?=URL?>">Главная</a>
        </li>
        <li><a href="#">Контакты</a></li>
      </ol>

      <!-- Content Row -->
      <div class="row">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4">
          <!-- Embedded Google Map -->
		  <iframe src="https://yandex.ru/map-widget/v1/-/CBU5iIX1sC" width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" ></iframe>
        </div>
        <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4">
          <h3>Контактная информация</h3>
          <p>
            РОССИЯ,г.Ставрополь
            <br>ул. Заводская дом 15 корп 4
            <br>
          </p>
          <p>
            <abbr title="Phone">Тел:</abbr>: +7(962) 455-0517
          </p>
          <p>
            <abbr title="Email">Email:</abbr>:
            <a href="mailto:650517@355000.ru">650517@355000.ru
            </a>
          </p>
          <p>
            <abbr title="Hours">Часы работы</abbr>: Понедельник - Пятница: с 10:00 до 15:00 перерыв с 13:00 до 14:00
          </p>
        </div>
      </div>
      <!-- /.row -->

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <h3>Отправьте нам письмо </h3>
          <form name="sentMessage" id="contactForm" novalidate>
            <div class="control-group form-group">
              <div class="controls">
                <label>Полное имя:</label>
                <input type="text" class="form-control" id="name" required data-validation-required-message="Пожалуйста введите ваше имя.">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Номер вашего телефона:</label>
                <input type="tel" class="form-control" id="phone" required data-validation-required-message="Пожалуйста введите ваш номер телефона.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Ваш почтовый (Email) адрес:</label>
                <input type="email" class="form-control" id="email" required data-validation-required-message="Пожалуйста Введите ваш почтовый (email@) адрес.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Сообщение:</label>
                <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Пожалуйста введите сообщение" maxlength="999" style="resize:none"></textarea>
              </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary">Отправить сообщение</button>
          </form>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->