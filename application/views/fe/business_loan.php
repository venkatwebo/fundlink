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

<section class="business_loan_banner">
  <div class="container banner_container_ht">
    <div class="row justify-content-end">
      <div class="col-sm-6 col-lg-4">
        <div class="crv_banner_bg">
         <div class="crv_banner_content">
            <h3>Personal Loans Upto K20,000</h3>
            
            <div class="row">
              <div class="col-12 range_slider_container">
                <label class="">How much would you like?</label>
                <output></output>
                <input type="range" min="0" max="100" data-rangeslider>
              </div>
              <div class="col-12 range_slider_container">
                <label class="">For how many months?</label>
                <output></output>
                <input type="range" min="0" max="100" data-rangeslider>
              </div>   
            </div> 
            <label class="">What type of loan would you like?</label>

            <table class="table table-sm mb-0">
              <tbody>
                <tr>
                  <td>Service Fee</td>
                  <td>K50.00</td>
                </tr>
                <tr>
                  <td>Amount You Receive</td>
                  <td>K450.00</td>
                </tr>
                <tr>
                  <td>Repayment</td>
                  <td>K580.00</td>
                </tr>
                <tr>
                  <td>Next Payment Date</td>
                  <td>Feb 3, 2021</td>
                </tr>
                <tr>
                  <td class="text-center" colspan="2">
                    <button class="btn btn-sm">Apply Now</button>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="d-flex-wrap justify-content-between mt-3">
              <a href="">Repayment Schedule</a>
              <a href="">Loan Requirements</a>
            </div>
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
              <a href="<?=base_url()?>business-loan" class="btn btn-outline-light btn-xl btn-block active">Business Loans</a>
            </div>
            <div class="col-sm-4 col-lg-3">
              <a href="<?=base_url()?>equity-investing" class="btn btn-outline-light btn-xl btn-block">Equity Investing</a>
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
