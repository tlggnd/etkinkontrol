@extends('catalog.layouts.app')

@section('title', 'Ana Sayfa')


@section('content')



 <!-- ========================= 
            Google Map
    =========================  -->
    <section class="google-map py-0">
      <iframe frameborder="0" height="500" width="100%"
        src="https://maps.google.com/maps?q=Suite%20100%20San%20Francisco%2C%20LA%2094107%20United%20States&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near"></iframe>
    </section><!-- /.GoogleMap -->

    <!-- ==========================
        contact layout 1
    =========================== -->
    <section class="contact-layout1 pb-90">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="contact-panel p-0 box-shadow-none">
              <div class="contact__panel-info mb-30">
                <div class="contact-info-box">
                  <h4 class="contact__info-box-title">Adresimiz</h4>
                  <ul class="contact__info-list list-unstyled">
                    <li>Adres Gelecek</li>
                  </ul><!-- /.contact__info-list -->
                </div><!-- /.contact-info-box -->
                <div class="contact-info-box">
                  <h4 class="contact__info-box-title">Mail Adresimiz</h4>
                  <ul class="contact__info-list list-unstyled">
                    <li>Email: <a href="mailto:Solatec@7oroof.com">Solatec@7oroof.com</a></li>
                  </ul><!-- /.contact__info-list -->
                </div><!-- /.contact-info-box -->
                <div class="contact-info-box">
                  <h4 class="contact__info-box-title">İletişim Numaralarımız</h4>
                  <ul class="contact__info-list list-unstyled">
                    <li>Cep No: <a href="tel:905548406884">0 554 840 68 84</a></li>
                    <li>Sabit No: <a href="tel:905548406884">0 282 653 36 87</a></li>
                  </ul><!-- /.contact__info-list -->
                </div><!-- /.contact-info-box -->
                <div class="contact-info-box">
                  <h4 class="contact__info-box-title">Çalışma Saatlerimiz</h4>
                  <ul class="contact__info-list list-unstyled">
                    <li>From Monday - Friday</li>
                    <li>8 am to 7 pm</li>
                  </ul><!-- /.contact__info-list -->
                </div><!-- /.contact-info-box -->
                <a href="#" class="btn btn__primary">
                  <i class="icon-phone"></i>
                  <span>Hemen Ara</span>
                </a>
              </div><!-- /.contact__panel-info -->
              <form method="post" action="assets/php/contact.php" id="contactForm" class="contact__panel-form mb-30">
                <div class="row">
                  <div class="col-sm-12">
                    <h4 class="contact__panel-title">Bize Yazın</h4>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="İsim ve Soyisminiz" id="contact-name" name="contact-name"
                        required>
                    </div>
                  </div><!-- /.col-lg-6 -->
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <input type="email" class="form-control" placeholder="Mail Adresiniz" id="contact-email"
                        name="contact-email" required>
                    </div>
                  </div><!-- /.col-lg-6 -->
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="İletişim Numaranız" id="contact-Phone"
                        name="contact-phone" required>
                    </div>
                  </div><!-- /.col-lg-6 -->
                  
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                      <textarea class="form-control" placeholder="M esajınızı buraya yazınız." placeholder="Message"
                        id="contact-messgae" name="contact-messgae" required></textarea>
                    </div>
                  </div><!-- /.col-lg-12 -->
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    <button type="submit" class="btn btn__secondary">
                      <i class="icon-arrow-right"></i><span>Mesajı Gönder</span>
                    </button>
                    <div class="contact-result"></div>
                  </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
              </form>
            </div><!-- /.contact__panel -->
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.contact layout 1 -->


@endsection