    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; <?=SITE?> 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?=URL?>public/vendor/popper/popper.min.js"></script>
    <script src="<?=URL?>public/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- 	  <script src="<?=URL?>public/vendor/bootstrap/bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js"></script> -->
	<script src="<?=URL?>public/js/plugin/jqBootstrapValidation-1.3.7.min.js"></script>
	<?php if(isset($this->model->js)):?>
	<?php foreach($this->model->js as $src): ?>
	<script src="<?=URL.$src?>" ></script>
	<?php endforeach ?>
	<?php endif;?>

    <script>
    (function(){
        $('body > .container').css( 'min-height', ( $(window).height() - 200 ) + 'px' );
    })();
    </script>
