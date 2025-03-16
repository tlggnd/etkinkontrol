@extends('catalog.layouts.app')

@section('title', 'Ana Sayfa')


@section('content')


<section class="page-title pt-30 pb-30">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <nav>
              <ol class="breadcrumb justify-content-center mb-20">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Ana Sayfa</a></li>
                <li class="breadcrumb-item"><a href="{{route('hizmetlerimiz')}}">Hizmetlerimiz</a></li>
                <li class="breadcrumb-item active" aria-current="page">BURAYA HİZMET ADI GELECEK</li>
              </ol>
            </nav>
          </div><!-- /.col-xl-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ======================
      Blog Single
    ========================= -->
    <section class="blog blog-single pt-0 pb-40">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-8">
            <div class="post-item mb-0">
              <div class="post__img">
                <a href="#">
                  <img src="assets/images/blog/grid/1.jpg" alt="post image">
                </a>
              </div><!-- /.entry-img -->
              <div class="post__body">
                <h1 class="post__title">Hizmet Başlık</h1>
                <div class="post__desc">
                  <p>Hizmet Açıklama</p>
                </div><!-- /.post-desc -->
              </div><!-- /.entry-content -->
            </div><!-- /.post-item -->
            
            <div class="blog-tags d-flex flex-wrap mb-30">
              <strong class="mr-20 color-heading">Tags</strong>
              <ul class="list-unstyled d-flex flex-wrap mb-0">
                <li><a href="#">Solar</a></li>
                <li><a href="#">Insights</a></li>
                <li><a href="#">Systems</a></li>
                <li><a href="#">Battery</a></li>
                <li><a href="#">Research</a></li>
                <li><a href="#">Enenrgy</a></li>
              </ul>
            </div><!-- /.blog-tags -->
            <div class="widget-nav d-flex justify-content-between mb-40 pt-30 pb-30 border-top border-bottom">
              <a href="#" class="widget-nav__prev d-flex flex-wrap">
                <div class="widget-nav__img">
                  <img src="assets/images/blog/grid/2.jpg" alt="blog thumb">
                </div>
                <div class="widget-nav__content">
                  <span>Önceki</span>
                  <h5 class="widget-nav__ttile mb-0">Önceki Hizmet Adı</h5>
                </div>
              </a><!-- /.widget-prev  -->
              <a href="#" class="widget-nav__next d-flex flex-wrap">
                <div class="widget-nav__img">
                  <img src="assets/images/blog/grid/3.jpg" alt="blog thumb">
                </div>
                <div class="widget-nav__content">
                  <span>Sonraki</span>
                  <h5 class="widget-nav__ttile mb-0">Sonraki Hizmet Adı</h5>
                </div>
              </a><!-- /.widget-next  -->
            </div>

            
          </div><!-- /.col-lg-8 -->
          <div class="col-sm-12 col-md-12 col-lg-4">
            <aside class="sidebar">
              
              <div class="widget widget-categories">
                <h5 class="widget__title">HİZMETLERİMİZ</h5>
                <div class="widget-content">
                  <ul class="list-unstyled mb-0">
                    <li><a href="#"><span> Hizmet Başlık</span></a></li>

                  </ul>
                </div><!-- /.widget-content -->
              </div><!-- /.widget-categories -->
            </aside><!-- /.sidebar -->
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.blog Single -->





@endsection