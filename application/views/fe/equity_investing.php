<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Fun Link</title>
  <?php $this->load->view('front/include/styles.php');?>

</head>
<body>


<!-- Header Section Start -->
<header id="home" class="hero-area">
  <?php $this->load->view('front/include/menu.php');?>    
             
</header>
<!-- Header Section End --> 

<section class="equity_investing_banner">
  <div class="container banner_container_ht">
    <div class="row justify-content-start">
      <div class="col-sm-6 col-lg-6">
          <div class="banner_content">
            <div>
              <h2>Equity Investment</h2>
              <ul class="banner_content_list">
                <li>Investing in companies and real estate</li>
                <li>Return from annual dividend</li>
                <li>Earn from the growth of a company each year</li>
                <li>Return is based on the complete revenue of the total amount</li>
              </ul>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div class="banner_bottom_stripp">
    <div class="container">
      <div class="row">
        <div class="col-sm-11 mx-auto">
          <div class="row justify-content-between">
            <div class="col-sm-4 col-lg-3">
              <a href="<?=base_url()?>personal-loan" class="btn btn-outline-light btn-xl btn-block">Personal Loans</a>
            </div>
            <div class="col-sm-4 col-lg-3">
              <a href="<?=base_url()?>business-loan" class="btn btn-outline-light btn-xl btn-block">Business Loans</a>
            </div>
            <div class="col-sm-4 col-lg-3">
              <a href="<?=base_url()?>equity-investing" class="btn btn-outline-light btn-xl btn-block active">Equity Investing</a>
            </div>a
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php $this->load->view('front/include/how_does_it_work.php');?>
<?php $this->load->view('front/include/testimonial.php');?>
<?php $this->load->view('front/include/footer.php');?>





    
</body>
<?php $this->load->view('front/include/script.php');?>



<script>
	$(function() {
		$('.preview4').createSlide({ progress: true, interval: 5 , maxvalue: 200});
		$('.preview5').createSlide({ progress: true, interval: 5 , maxvalue: 200});
	});
</script>

</html>
