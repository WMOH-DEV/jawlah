<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- media-for-responsive -->
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">

  <!-- using font awesome icons bootstrap 5 -->
  <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>

  <!--owl carousal stylesheet-->
  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">




{{-- start header --}}

  <header style="direction: rtl">
    <nav class="nav">      
            <div class="d-flex align-items-center justify-content-between">
                <div class="img">
               <a href="#">    <img src="img/file------@1x.png" alt=""> </a> 
                </div>

                {{-- form --}}
                <div class="form">
                    <input type="text" placeholder="بحث" class="input" >
                    <button class="btton"><i class="fa fa-search"></i></button>
                    <select name="" class="select" >
                        <option value="">baghdad</option>
                    </select>
                </div>
                <div >
                   
                </div>
                <div class="user d-flex justify-align-center mx-4">

                    <a href="#"> <img src="img/profile@1x.png" alt=""> </a>
                </div>
            </div>
            <br>

            <div class='div'>
                <ul class="list-unstyled ">
                    <li class="first-list">الصفحة الرئيسية </li>
                    <li>الانشطة</li>
                    <li>نبذة عنا</li>
        
                </ul>
                <ul class="list-unstyled second-list">
                    <li>تسجيل الدخول</li>
                    <li>انشاء حساب</li>
                </ul>
            </div>
    </nav>

    <div class="img-home">
        <img src="img\img@1x.png" alt="">
    </div>
</header>

{{-- statr carsoaul for actives  --}}



 @yield('main')

 <footer class=" pb-0 " style="direction: rtl">
    <div class=" pt-4" style="padding-left: 7%; padding-right: 7%;">
    <div class="row "> 
        {{-- first part of footer --}}
        <div class="col-md-3 mb-4 first pt-5">
            <img src="img/file------@1x.png" alt="" class="img-fluid" style="height: 150px; width: 200px;">
        </div>
{{-- second part of footer --}}
        <div class="col-md-3 mb-4 pt-5">
            <h3 class="pr-4">نبذة عنا</h3>
            <ul class="list-unstyled pr-4">
             <li> <a href="#" class="text-deoration-none">من نحن</a> </li>
             <li> <a href="#" class="text-deoration-none">سياسة الخصوصية</a> </li>
             <li><a href="#" class="text-deoration-none">الشروط و الأحكام</a>  </li>
            </ul>
        </div>
        {{-- third part of footer --}}

        <div class="col-md-3 mb-4 p-5">
            <h3 class=" pr-4"> أتصل بنا</h3>
            <ul class="list-unstyled pr-4">
            <li class="mt-3"> <a href="#" class="text-deoration-none"> أتصل بنا</a> </li>
            </ul>

            <h4 class="pr-4" >روابط السوشيال ميديا</h4>
            <div class="icons mt-3 pr-4">
                 <i class="fa fa-facebook ml-3"></i>
                <i class="fa fa-instagram ml-3"></i>
                <i class="fa fa-linkedin ml-3"></i>
                <i class="fa fa-twitter ml-3"></i> 
            </div>
        </div>

        {{-- fourth part of footer --}}
        <div class="col-md-3 mb-4 last pt-5 ">
            <h3>توثيق المتجر الرسمي</h3>
            <a href="" class="text-decoration-none">"http://maroof.sa/Business/GetStamp?bid=196287"</a>
        </div>
     
      
       
    </div>
</div>
</footer>
  
    <!-- jquery ------>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>

    <!-- owl carosuel script ------>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>

    {{-- bootstrap script --}}
    <script src="js/bootstrap.min.js"></script>

    {{-- script --}}
    
    <script src="js/main.js"></script>