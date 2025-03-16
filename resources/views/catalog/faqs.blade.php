@extends('catalog.layouts.app')

@section('title', 'Ana Sayfa')


@section('content')

<section class="page-title page-title-layout1 bg-overlay bg-overlay-2 bg-parallax text-center">
      <div class="bg-img"><img src="assets/images/page-titles/6.jpg" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="pagetitle__heading mb-0">FAQs</h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Company</a></li>
                <li class="breadcrumb-item active" aria-current="page">FAQs</li>
              </ol>
            </nav>
            <a href="#faqs" class="scroll-down">
              <i class="icon-arrow-down"></i>
            </a>
          </div><!-- /.col-xl-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ======================
       FAQ
    ========================= -->
    <section id="faqs" class="faq pt-130 pb-100">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
            <div class="heading-layout2 text-center mb-50">
              <h2 class="heading__subtitle">What Are You Looking For?</h2>
              <h3 class="heading__title">Frequently Asked Questions</h3>
            </div><!-- /.heading -->
          </div><!-- /.col-lg-8 -->
        </div><!-- /.row -->
        <div class="row" id="accordion">
          <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="accordion-item">
              <div class="accordion-item__header" data-toggle="collapse" data-target="#collapse1">
                <a class="accordion-item__title" href="#">Which Plan Is Right For Me?</a>
              </div><!-- /.accordion-item-header -->
              <div id="collapse1" class="collapse" data-parent="#accordion">
                <div class="accordion-item__body">
                  <p>With any financial product that you buy, it is important that you know you are getting the best
                    advice from a reputable company as often</p>
                </div><!-- /.accordion-item-body -->
              </div>
            </div><!-- /.accordion-item -->
            <div class="accordion-item">
              <div class="accordion-item__header" data-toggle="collapse" data-target="#collapse2">
                <a class="accordion-item__title" href="#">Do I have to commit to a contract?</a>
              </div><!-- /.accordion-item-header -->
              <div id="collapse2" class="collapse" data-parent="#accordion">
                <div class="accordion-item__body">
                  <p>With any financial product that you buy, it is important that you know you are getting the best
                    advice from a reputable company as often</p>
                </div><!-- /.accordion-item-body -->
              </div>
            </div><!-- /.accordion-item -->
            <div class="accordion-item opened">
              <div class="accordion-item__header" data-toggle="collapse" data-target="#collapse3">
                <a class="accordion-item__title" href="#">What Payment Methods Are Available?</a>
              </div><!-- /.accordion-item-header -->
              <div id="collapse3" class="collapse show" data-parent="#accordion">
                <div class="accordion-item__body">
                  <p>With any financial product that you buy, it is important that you know you are getting the best
                    advice from a reputable company as often</p>
                </div><!-- /.accordion-item-body -->
              </div>
            </div><!-- /.accordion-item -->
            <div class="accordion-item">
              <div class="accordion-item__header" data-toggle="collapse" data-target="#collapse4">
                <a class="accordion-item__title" href="#">What if I pick the wrong plan?</a>
              </div><!-- /.accordion-item-header -->
              <div id="collapse4" class="collapse" data-parent="#accordion">
                <div class="accordion-item__body">
                  <p>With any financial product that you buy, it is important that you know you are getting the best
                    advice from a reputable company as often</p>
                </div><!-- /.accordion-item-body -->
              </div>
            </div><!-- /.accordion-item -->
            <div class="accordion-item">
              <div class="accordion-item__header" data-toggle="collapse" data-target="#collapse5">
                <a class="accordion-item__title" href="#">Any contracts or commitments?</a>
              </div><!-- /.accordion-item-header -->
              <div id="collapse5" class="collapse" data-parent="#accordion">
                <div class="accordion-item__body">
                  <p>With any financial product that you buy, it is important that you know you are getting the best
                    advice from a reputable company as often</p>
                </div><!-- /.accordion-item-body -->
              </div>
            </div><!-- /.accordion-item -->
          </div><!-- /.col-lg-6 -->
          <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="accordion-item">
              <div class="accordion-item__header" data-toggle="collapse" data-target="#collapse6">
                <a class="accordion-item__title" href="#">What are my payment options?</a>
              </div><!-- /.accordion-item-header -->
              <div id="collapse6" class="collapse" data-parent="#accordion">
                <div class="accordion-item__body">
                  <p>With any financial product that you buy, it is important that you know you are getting the best
                    advice from a reputable company as often</p>
                </div><!-- /.accordion-item-body -->
              </div>
            </div><!-- /.accordion-item -->
            <div class="accordion-item">
              <div class="accordion-item__header" data-toggle="collapse" data-target="#collapse7">
                <a class="accordion-item__title" href="#">How does the free trial work?</a>
              </div><!-- /.accordion-item-header -->
              <div id="collapse7" class="collapse" data-parent="#accordion">
                <div class="accordion-item__body">
                  <p>With any financial product that you buy, it is important that you know you are getting the best
                    advice from a reputable company as often</p>
                </div><!-- /.accordion-item-body -->
              </div>
            </div><!-- /.accordion-item -->
            <div class="accordion-item">
              <div class="accordion-item__header" data-toggle="collapse" data-target="#collapse8">
                <a class="accordion-item__title" href="#">What Payment Methods Are Available?</a>
              </div><!-- /.accordion-item-header -->
              <div id="collapse8" class="collapse" data-parent="#accordion">
                <div class="accordion-item__body">
                  <p>With any financial product that you buy, it is important that you know you are getting the best
                    advice from a reputable company as often</p>
                </div><!-- /.accordion-item-body -->
              </div>
            </div><!-- /.accordion-item -->
            <div class="accordion-item">
              <div class="accordion-item__header" data-toggle="collapse" data-target="#collapse9">
                <a class="accordion-item__title" href="#">How does the free trial work?</a>
              </div><!-- /.accordion-item-header -->
              <div id="collapse9" class="collapse" data-parent="#accordion">
                <div class="accordion-item__body">
                  <p>With any financial product that you buy, it is important that you know you are getting the best
                    advice from a reputable company as often</p>
                </div><!-- /.accordion-item-body -->
              </div>
            </div><!-- /.accordion-item -->
            <div class="accordion-item opened">
              <div class="accordion-item__header" data-toggle="collapse" data-target="#collapse10">
                <a class="accordion-item__title" href="#">If I have questions, where can I find answers? </a>
              </div><!-- /.accordion-item-header -->
              <div id="collapse10" class="collapse show" data-parent="#accordion">
                <div class="accordion-item__body">
                  <p>With any financial product that you buy, it is important that you know you are getting the best
                    advice from a reputable company as often</p>
                </div><!-- /.accordion-item-body -->
              </div>
            </div><!-- /.accordion-item -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-12">
            <p class="text__link text-center mb-0">Sustainable, reliable & affordable energy systems,
              <a href="#">
                <span>Find Your Solution</span> <i class="icon-arrow-right"></i>
              </a>
            </p>
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.FAQ -->


@endsection