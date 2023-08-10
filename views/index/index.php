    <div class="container">
    <header>
      <div id="LscCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#LscCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#LscCarousel" data-slide-to="1"></li>
          <li data-target="#LscCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('<?=URL?>public/images/lsc-logo-1.png')">
            <div class="carousel-caption d-none d-md-block">
              <h3><?=SITE?></h3>
              <p>Обратная связь с покупателями, дает уверенность в завтрашнем дне</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('<?=URL?>public/images/lsc-logo-2.png')">
            <div class="carousel-caption d-none d-md-block">
              <h3><?=SITE?></h3>
              <p>Повышает лояльность у покупателей.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('<?=URL?>public/images/404.png')">
            <div class="carousel-caption d-none d-md-block">
              <h3><?=SITE?></h3>
              <p>Позволяет держать персонал в тонусе.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#LscCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Предыдущая</span>
        </a>
        <a class="carousel-control-next" href="#LscCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Следующая</span>
        </a>
      </div>
    </header>

	      <h1 class="my-4">Добро пожаловать в новую среду общения <?=SITE?></h1>

      <!-- Marketing Icons Section -->
      <div class="row" id="LscCard">
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header text-white bg-success">Связь <?=SITE?></h4>
            <div class="card-body">
			<p><?php print_r($this->model->userdata);?></p>
              <p class="card-text">Будте рядом со своими покупателями.</p>
			  <p class="card-text">Их настроение - градусник вашего бизнеса</p>
			  <p class="card-text">Их требования - Ваш завтрашний доход и ваше развитие.</p><p> Смело выходите из подполья тесных и непрозрачных, корпоративных общений в светлый мир новых технологий и новых деловых контактов.</p>
            </div>
            <div class="card-footer bg-success">
              <a href="#" class="btn btn-link text-white">Читать далее</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header text-white bg-success">Основа <?=SITE?></h4>
            <div class="card-body">
              <p class="card-text"><?=SITE?> создан на собственном движке, создан для вас и всегда готов совершенствоваться. Мы сами используем его в своем общении с заказчиками, поэтому будьте уверены в том, что проект будет всегда  развиваться и улучшаться.</p>
            </div>
            <div class="card-footer bg-success">
              <a href="#" class="btn btn-link text-white">Читать далее</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header text-white bg-success">Отчетность <?=SITE?></h4>
            <div class="card-body">
              <p class="card-text">Руководитель предприятия, звена, отдела, всегда в курсе задач, поставленных своим работникам, в курсе какие проблемы они решают, всегда может вмешаться в процесс не со слов работника или заказчика а с журнала работ зафиксированных с одной и другой стороны. Может до конфликта уладить ситуацию. А возможно увидеть новые горизонты к сотрудничеству и увеличить доход. помните развивая лояльность у покупателя, вы расширяете свои деловые связи.</p>
            </div>
            <div class="card-footer bg-success">
              <a href="#" class="btn btn-link text-white">Читать далее</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
	  
	  <hr>
	    </div><!-- /.container -->