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

<section class="about_banner">
  <div class="container banner_container_ht"></div>
  
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
              <a href="<?=base_url()?>equity-investing" class="btn btn-outline-light btn-xl btn-block">Equity Investing</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="section">
  <div class="container mb-5">
    <div class="row">
      <div class="col-sm-10 mx-auto">
        <div class="text-center heading_one">
          <h2 class="text_secondary">About Us</h2>
        </div>
        <h5> Fundlink Capital Limited (FCL) is a Zambian financing startup offering tailored funding solutions for employees of established organisations and SMEs. We hold a money-lending license.</h5>
        <h5>FCL currently offers no fee micro loans at moderate interest rates, for flexible periods, with processing within three working days. As a digital service, only transacting through e-payment channels, we are flexible with our settlement offering.</h5>
        <h5>Where debt finance is not the most suitable form of financing, we also offer an option for Equity Investment to registered SMEs who are able to demonstrate innovative ideas and a proof of concept.</h5>
        <h5>We establish effective working relationships with all our clients based on trust and ability to deliver.</h5>
        <h5>FCL is managed by a small team of experienced finance professionals and has a strong track record of growing the company in a sustainable manner, with a heavy focus on credit risk management.</h5>
      </div>
    </div>
  </div>
</section>


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
