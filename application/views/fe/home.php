<!doctype html>
<html>

<?php $this->load->view(frontendViewFolder() . '/common/head'); ?>

<body>
  <!-- Header Section Start -->
  <?php $this->load->view(frontendViewFolder() . '/common/navigation'); ?>
  <!-- Header Section End -->

  <section class="home_banner">
    <div class="container banner_container_ht">
      <div class="row justify-content-end">
        <div class="col-sm-6 col-lg-5">
          <div class="banner_content">
            <h2>Sustainable financing solutions that grow with you.</h2>
          </div>

          <!-- <div class="crv_banner_bg py-4">
         <div class="crv_banner_content">
            <h2>Sustainable financing solutions that grow with you.</h2>
         </div>
        </div> -->

        </div>
      </div>
    </div>
    <div class="banner_bottom_stripp">
      <div class="container">
        <div class="row">
          <div class="col-sm-11 mx-auto">
            <div class="row justify-content-between">
              <div class="col-sm-4 col-lg-3">
                <a href="<?= base_url() ?>personal-loan" class="btn btn-outline-light btn-xl btn-block">Personal Loans</a>
              </div>
              <div class="col-sm-4 col-lg-3">
                <a href="<?= base_url() ?>business-loan" class="btn btn-outline-light btn-xl btn-block">Business Loans</a>
              </div>
              <div class="col-sm-4 col-lg-3">
                <a href="<?= base_url() ?>equity-investing" class="btn btn-outline-light btn-xl btn-block">Equity Investing</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-sm-11 mx-auto">
          <div class="text-center heading_one">
            <h2 class="text_secondary">Why Fundlink?</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5 mx-auto">
          <ul class="ul_list">
            <li>Simple all inclusive interest rate. No fees.</li>
            <li>3 Day Approval</li>
            <li>Digital Online Application and Loan management</li>
            <li>We work with you to find a sustainable financing solution</li>
            <li>A Zambian Solution.</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <?php /* $this->load->view('front/include/how_does_it_work.php'); ?>
  <?php $this->load->view('front/include/testimonial.php'); */ ?>

  <?php $this->load->view(frontendViewFolder() . '/common/script'); ?>
  <?php $this->load->view(frontendViewFolder() . '/common/footer'); ?>

</body>
<script>
  $(function() {
    $('.preview4').createSlide({
      progress: true,
      interval: 5,
      maxvalue: 200
    });
    $('.preview5').createSlide({
      progress: true,
      interval: 5,
      maxvalue: 200
    });
  });
</script>

</html>