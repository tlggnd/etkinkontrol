@extends('catalog.layouts.app')

@section('title', 'Ana Sayfa')


@section('content')

<!-- ========================
       page title 
    =========================== -->
    <section class="page-title page-title-layout1 bg-overlay bg-overlay-2 bg-parallax text-center">
      <div class="bg-img"><img src="assets/images/page-titles/1.jpg" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="pagetitle__heading mb-0">Hakkımızda</h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="#">Ana Sayfa</a></li>
                <li class="breadcrumb-item"><a href="#">Hakkımızda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Hakkımızda</li>
              </ol>
            </nav>
            <a href="#about" class="scroll-down">
              <i class="icon-arrow-down"></i>
            </a>
          </div><!-- /.col-xl-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ========================
      About Layout 1
    =========================== -->
    <section id="about" class="about-layout1">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-7 offset-lg-1">
            <div class="heading__layout2 mb-60">
              <h2 class="heading__subtitle">Leading The Way In Building And Civil Construction</h2>
              <h3 class="heading__title">We Are Ready For Solar Energy, All We Need Is To Use It Well!</h3>
            </div><!-- /.heading__layout2 -->
          </div><!-- /.col-lg-7 -->
        </div><!-- /.row -->
        <div class="row align-items-center">
          <div class="col-sm-12 col-md-12 col-lg-2">
            <!-- counter item #1 -->
            <div class="counter-item">
              <h4 class="counter">6,154</h4>
              <p class="counter__desc pr-0">2014 Yılından</p>
              <div class="divider__line"></div>
            </div>
            <!-- counter item #2 -->
            <div class="counter-item">
              <h4 class="counter">2,512</h4>
              <p class="counter__desc pr-0">Qualified Employees & Workers With Us</p>
              <div class="divider__line"></div>
            </div>
            <!-- counter item #3 -->
            <div class="counter-item">
              <h4 class="counter">0,241</h4>
              <p class="counter__desc pr-0">Awards Milestones Awarded To Us</p>
              <div class="divider__line"></div>
            </div>
          </div><!-- /.col-lg-2 -->
          <div class="col-sm-12 col-md-12 col-lg-5">
            <div class="video-banner-layout2">
              <img src="assets/images/about/1.jpg" alt="about" class="w-100">
              
              <!-- Tanıtım Filmi Varsa Burası Aktif Olabilirmi?-->

              <!-- <div class="video-has-img">
                <img src="assets/images/video/1.jpg" alt="video">
                <a class="video__btn video__btn-white popup-video" href="https://www.youtube.com/watch?v=nrJtHemSPW4">
                  <div class="video__player">
                    <i class="fa fa-play"></i>
                  </div>
                </a>
                <span class="video__btn-title">Watch Our Intro!</span>
              </div> --><!-- /.video-banner -->
            </div>
          </div>
          
          <!-- /.col-lg-5 -->
          <div class="col-sm-12 col-md-12 col-lg-5">
            <div class="about__text">
              <div class="text__icon">
                <i class="icon-green-energy3"></i>
              </div>
              <p class="heading__desc font-weight-medium color-secondary mb-30">We drive the transition to more
                sustainable, reliable, and affordable energy systems. With our innovative technologies, we energize
                society, that’s our aim!
              </p>
              <p class="heading__desc mb-20">The increase in extreme weather events and rising sea levels are
                unmistakable
                signs of climate change. Roughly 850 million people still live without access to electricity, which is
                the foundation of sustainable development.</p>
              <p class="heading__desc mb-20">How can we meet the growing demand for electricity while protecting our
                climate
                and make planet a better place?</p>
              <div class="d-flex align-items-center mt-30">
                <a href="services.html" class="btn btn__secondary mr-30">
                  <i class="icon-arrow-right"></i> <span>Tüm Hizmetlerimiz</span>
                </a>
              </div>
            </div><!-- /.about__text -->
          </div><!-- /.col-lg-5 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.About Layout 1 -->



    <!-- =========================== 
      portfolio layout1 
    ============================= -->
    <section class="portfolio-layout1">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="heading-layout2 mb-40">
              <h3 class="heading__title">Son Projelerimiz</h3>
            </div><!-- /.heading -->
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
        <div class="row">
          <!-- portfolio item #1 -->
          <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="portfolio-item">
              <div class="portfolio__img">
                <img src="assets/images/portfolio/grid/1.jpg" alt="portfolio img">
              </div><!-- /.portfolio-img -->
              <div class="portfolio__body">
                <div class="portfolio__cat">
                  <a href="#">Finance</a><a href="#">Supply Chain</a>
                </div><!-- /.portfolio-cat -->
                <h4 class="portfolio__title"><a href="#">Expanding The Solar Supply Chain Finance Program</a></h4>
              </div><!-- /.portfolio__body -->
            </div><!-- /.portfolio-item -->
          </div><!-- /.col-lg-4 -->
          <!-- portfolio item #2 -->
          <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="portfolio-item">
              <div class="portfolio__img">
                <img src="assets/images/portfolio/grid/2.jpg" alt="portfolio img">
              </div><!-- /.portfolio-img -->
              <div class="portfolio__body">
                <div class="portfolio__cat">
                  <a href="#">Wind Energy</a><a href="#">Innovations</a>
                </div><!-- /.portfolio-cat -->
                <h4 class="portfolio__title"><a href="#">Addressing Wind Energy Innovation Challenges</a></h4>
              </div><!-- /.portfolio__body -->
            </div><!-- /.portfolio-item -->
          </div><!-- /.col-lg-4 -->
          <!-- portfolio item #3 -->
          <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="portfolio-item">
              <div class="portfolio__img">
                <img src="assets/images/portfolio/grid/3.jpg" alt="portfolio img">
              </div><!-- /.portfolio-img -->
              <div class="portfolio__body">
                <div class="portfolio__cat">
                  <a href="#">Electric Vehicle</a><a href="#">Infrastructures</a>
                </div><!-- /.portfolio-cat -->
                <h4 class="portfolio__title"><a href="#">Smarter Ways to Manage EV Charging Infrastructures</a></h4>
              </div><!-- /.portfolio__body -->
            </div><!-- /.portfolio-item -->
          </div><!-- /.col-lg-4 -->
          <!-- portfolio item #4 -->
          <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="portfolio-item">
              <div class="portfolio__img">
                <img src="assets/images/portfolio/grid/4.jpg" alt="portfolio img">
              </div><!-- /.portfolio-img -->
              <div class="portfolio__body">
                <div class="portfolio__cat">
                  <a href="#">Green Energy</a><a href="#">ECO</a>
                </div><!-- /.portfolio-cat -->
                <h4 class="portfolio__title"><a href="#">New Public Attitude Tracker Towards Renewable Energy</a></h4>
              </div><!-- /.portfolio__body -->
            </div><!-- /.portfolio-item -->
          </div><!-- /.col-lg-4 -->
          <!-- portfolio item #5 -->
          <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="portfolio-item">
              <div class="portfolio__img">
                <img src="assets/images/portfolio/grid/5.jpg" alt="portfolio img">
              </div><!-- /.portfolio-img -->
              <div class="portfolio__body">
                <div class="portfolio__cat">
                  <a href="#">Infrastructures</a><a href="#">Gas</a>
                </div><!-- /.portfolio-cat -->
                <h4 class="portfolio__title"><a href="#">Dangerous Environmental Impacts of Natural Gas</a></h4>
              </div><!-- /.portfolio__body -->
            </div><!-- /.portfolio-item -->
          </div><!-- /.col-lg-4 -->
          <!-- portfolio item #6 -->
          <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="portfolio-item">
              <div class="portfolio__img">
                <img src="assets/images/portfolio/grid/6.jpg" alt="portfolio img">
              </div><!-- /.portfolio-img -->
              <div class="portfolio__body">
                <div class="portfolio__cat">
                  <a href="#">Finance</a><a href="#">Supply Chain</a>
                </div><!-- /.portfolio-cat -->
                <h4 class="portfolio__title"><a href="#">Expanding The Solar Supply Chain Finance Program</a></h4>
              </div><!-- /.portfolio__body -->
            </div><!-- /.portfolio-item -->
          </div><!-- /.col-lg-4 -->
          <!-- portfolio item #7 -->
          <div class="col-sm-6 col-md-6 col-lg-4 portfolio-hidden">
            <div class="portfolio-item">
              <div class="portfolio__img">
                <img src="assets/images/portfolio/grid/1.jpg" alt="portfolio img">
              </div><!-- /.portfolio-img -->
              <div class="portfolio__body">
                <div class="portfolio__cat">
                  <a href="#">Finance</a><a href="#">Supply Chain</a>
                </div><!-- /.portfolio-cat -->
                <h4 class="portfolio__title"><a href="#">Expanding The Solar Supply Chain Finance Program</a></h4>
              </div><!-- /.portfolio__body -->
            </div><!-- /.portfolio-item -->
          </div><!-- /.col-lg-4 -->
          <!-- portfolio item #8 -->
          <div class="col-sm-6 col-md-6 col-lg-4 portfolio-hidden">
            <div class="portfolio-item">
              <div class="portfolio__img">
                <img src="assets/images/portfolio/grid/3.jpg" alt="portfolio img">
              </div><!-- /.portfolio-img -->
              <div class="portfolio__body">
                <div class="portfolio__cat">
                  <a href="#">Finance</a><a href="#">Supply Chain</a>
                </div><!-- /.portfolio-cat -->
                <h4 class="portfolio__title"><a href="#">Expanding The Solar Supply Chain Finance Program</a></h4>
              </div><!-- /.portfolio__body -->
            </div><!-- /.portfolio-item -->
          </div><!-- /.col-lg-4 -->
          <!-- portfolio item #9 -->
          <div class="col-sm-6 col-md-6 col-lg-4 portfolio-hidden">
            <div class="portfolio-item">
              <div class="portfolio__img">
                <img src="assets/images/portfolio/grid/2.jpg" alt="portfolio img">
              </div><!-- /.portfolio-img -->
              <div class="portfolio__body">
                <div class="portfolio__cat">
                  <a href="#">Finance</a><a href="#">Supply Chain</a>
                </div><!-- /.portfolio-cat -->
                <h4 class="portfolio__title"><a href="#">Expanding The Solar Supply Chain Finance Program</a></h4>
              </div><!-- /.portfolio__body -->
            </div><!-- /.portfolio-item -->
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 text-center">
            <button type="button" class="btn btn__primary btn__loadMore loadMoreportfolio">
              <i class="icon-arrow-right"></i><span>Tümünü Gör</span>
            </button>
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.portfolio layout1 -->

    <!-- =========================== 
      contact layout 2
    ============================= -->
    <section class="contact-layout2 pb-0 bg-overlay bg-overlay-primary-gradient">
      <div class="bg-img"><img src="assets/images/banners/2.jpg" alt=""></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
            <div class="col-inner">
              <div class="heading-layout2 heading-light mb-60">
                <h2 class="heading__subtitle">Bize Yazın</h2>
                <h3 class="heading__title">Bize Yazın!
                </h3>
                <p class="heading__desc">Soru Görüş ve Önerileriniz için bize yazın.</p>
              </div><!-- /.heading -->
              <div class="row fancybox-light">
                <!-- fancybox item #1 -->
                <div class="col-sm-4">
                  <div class="fancybox-item">
                    <div class="fancybox__icon">
                      <i class="icon-biosphere2"></i>
                    </div><!-- /.fancybox-icon -->
                    <div class="fancybox__content">
                      <h4 class="fancybox__title mb-0">Environmental Sensitivity</h4>
                    </div><!-- /.fancybox-content -->
                  </div><!-- /.fancybox-item -->
                </div><!-- /.col-sm-4 -->
                <!-- fancybox item #2 -->
                <div class="col-sm-4">
                  <div class="fancybox-item">
                    <div class="fancybox__icon">
                      <i class="icon-tube"></i>
                    </div><!-- /.fancybox-icon -->
                    <div class="fancybox__content">
                      <h4 class="fancybox__title mb-0">Personalised Solutions</h4>
                    </div><!-- /.fancybox-content -->
                  </div><!-- /.fancybox-item -->
                </div><!-- /.col-sm-4 -->
                <!-- fancybox item #3 -->
                <div class="col-sm-4">
                  <div class="fancybox-item">
                    <div class="fancybox__icon">
                      <i class="icon-electric-charge"></i>
                    </div><!-- /.fancybox-icon -->
                    <div class="fancybox__content">
                      <h4 class="fancybox__title mb-0">Performance Measures</h4>
                    </div><!-- /.fancybox-content -->
                  </div><!-- /.fancybox-item -->
                </div><!-- /.col-sm-4 -->
              </div><!-- /.row -->
            </div>
          </div><!-- /.col-xl-6 -->
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
            <div class="contact-panel">
              <form class="contact-panel__form" method="post" action="assets/php/contact.php" id="contactForm"
                novalidate="novalidate">
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    <h4 class="contact-panel__title">İletişim Formu</h4>
                  </div> <!-- /.col-lg-12 -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="İsim Soyisim" id="contact-name" name="contact-name"
                        required>
                    </div>
                  </div><!-- /.col-sm-6 -->
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <input type="email" class="form-control" placeholder="e-Mail" id="contact-email"
                        name="contact-email" required>
                    </div>
                  </div><!-- /.col-sm-6 -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="İletişim No" id="contact-Phone"
                        name="contact-phone">
                    </div>
                  </div><!-- /.col-sm-6 -->
                  <style>
                    #contact-address::placeholder {
                      color: #999;
                      font-style: italic;
                    }
                  </style>
              
                  <div class="col-sm-12">
                      <div class="form-group">
                          <textarea class="form-control" id="contact-address" placeholder="Lütfen iletmek istediğiniz mesajı giriniz..."></textarea>
                      </div>
                  </div>
                    <button type="submit" class="btn btn__secondary btn__block">
                      <i class="icon-arrow-right"></i> <span>Gönder</span>
                    </button>
                    <div class="contact-result"></div>
                  </div><!-- /.col-12 -->
                </div><!-- /.row -->
              </form>
            </div>
          </div><!-- /.col-xl-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.contact layout 2 -->


@endsection