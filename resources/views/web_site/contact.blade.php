@extends('web_site.layouts.master')
@section('content')
<style>
  iframe {
      width: 100%;
      height: 200px;
  }
</style>
@php
  $mainData=getMainData();
@endphp
  <!-- :: Breadcrumb Header -->
  <section class="breadcrumb-header style-2" id="page"
  style="background-image: url({{asset('assets_web/img/page-baner/contact.jpg')}})">
    <div class="overlayin"></div>
    <div class="container">
        <div class="row justify-content">
            <div class="col-md-8">
                <div class="banner">
                    <h1> <?= trans('web_site.Contact_Us') ?></h1>
                 </div>
            </div>
        </div>
    </div>
</section>
<!-- :: contact us --------------------------------------------------------------------------------->
  <div class="contact-us py-100 bck">
    <div class="container">
        <div class="contact-info-content" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="contact-box">
                        <i class="ar-icons-call"></i>
                        <div class="box mb10">
                            <h3 class="phone-h3"><?= trans('web_site.Phone') ?></h3>
                            <a class="phone" href="tel:{{$mainData->phone}}">{{$mainData->phone}}</a>
                         </div>

                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="contact-box">
                        <i class="ar-icons-email"></i>
                         <div class="box mb10">
                            <h3 class="phone-h3"><?= trans('web_site.Email') ?></h3>
                            <a class="mail" href="mailto:{{$mainData->email}}">{{$mainData->email}}</a>
                         </div>

                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="contact-box">
                        <i class="ar-icons-location"></i>
                        <div class="box mb10">
                            <h3 class="phone-h3"><?= trans('web_site.Address') ?></h3>
                            <a class="mail" href="#">{{$mainData->address}}</a>
                         </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row column-reverse">
            
               <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="900">
    <div class="add-comments">
<!--------------------------------------------------------------------------------------------------->
      <form class="inner-add-comments form-contact-2" method="post" action="{{route('SaveContact_us')}}">
        @csrf
        <div class="row">
          <div class="col-md-6 inner-add-comments-box">
            <input type="text" name="name" placeholder="<?= trans('web_site.Your_name') ?>" required
             value="<?= old('name') ?>">
             @error('name')
             <span style='color:red;text-align: right;'>{{ $message }}</span>
         @enderror
          </div>
          <!------------------------------------------------------------------------------>
          <div class="col-md-6 inner-add-comments-box">
            <input type="Email" name="email" placeholder="<?= trans('web_site.Your_email') ?>" required
            value="<?= old('email') ?>">
            @error('email')
            <span style='color:red;text-align: right;'>{{ $message }}</span>
        @enderror
          </div>
          <!------------------------------------------------------------------------------>
          <div class="col-md-12 inner-add-comments-box">
            <input type="number" name="phone" placeholder="<?= trans('web_site.Your_phone') ?>"
            required  value="<?= old('phone') ?>">
            @error('phone')
            <span style='color:red;text-align: right;'>{{ $message }}</span>
        @enderror
          </div>
          <!------------------------------------------------------------------------------>
          <div class="col-md-12 inner-add-comments-box">
            <textarea name="subject" placeholder="<?= trans('web_site.Your_subject') ?>"
              required><?= old('subject') ?></textarea>
              @error('subject')
              <span style='color:red;text-align: right;'>{{ $subject }}</span>
          @enderror
          </div>
          <!------------------------------------------------------------------------------>
          <div class="col-md-12 inner-add-comments-box last">
            <button class="btn-1 btn-3 submit" type="submit" name="add" value="add">
              <span><?=trans('web_site.Send_Message')?></span></button>
            <span class="out-message"></span>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="col-lg-6 col-md-6" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900">
                <!-- :: Map -->
                <div class="map-box google-map">
                     {!! $mainData->maplocation !!}
                </div>
            </div>
</div>
</div>
</div>

@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\Site\ContactRequest', '#contact-form') !!}
@endsection



