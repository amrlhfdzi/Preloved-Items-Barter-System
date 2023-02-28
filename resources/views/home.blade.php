<!DOCTYPE html>
<html lang="en">
   <head>
   @include("usercss");
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      @include("navbar");
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <section class="banner_main">
         <div class="container">
            <div class="row">
               <div class="col-md-8">

               <div class="text-bg">
                     <h1> <span class="blodark"> Swapup </span> <br>A Barter Platform</h1>
                     <p>Exchange goods or services with others </p>
                     <a class="read_more" href="#">Exchange now</a>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="ban_img">
                     <figure><img src="images/barter.png" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end banner -->
      <!-- six_box section -->
      

      <div class="six_box">
         <div class="container-fluid">
            <div class="row">
            @foreach ($categories as $categoryItem)
               <div class="col-md-2 col-sm-4 pa_left">
                  @if($loop->odd)
                  <div class="six_probpx yellow_bg">
                  @else
                  <div class="six_probpx bluedark_bg">
                  @endif
                  <a href="{{ url('/category/'.$categoryItem->slug) }}">
                     <i><img src="images/underwear.png" alt="#"/></i>
                     <span>{{$categoryItem->name}}</span>
                  </a>
                  </div>
               </div>
               
                <!-- <div class="col-md-2 col-sm-4 pa_left">
                  <div class="six_probpx bluedark_bg">
                     <i><img src="images/underwear.png" alt="#"/></i>
                     <span>underwear</span>
                  </div>
               </div>
                <div class="col-md-2 col-sm-4 pa_left">
                  <div class="six_probpx yellow_bg">
                     <i><img src="images/pent.png" alt="#"/></i>
                     <span>Pante & socks</span>
                  </div>
               </div>
               <div class="col-md-2 col-sm-4 pa_left">
                  <div class="six_probpx bluedark_bg">
                     <i><img src="images/t_shart.png" alt="#"/></i>
                     <span>T-shirt & tankstop</span>
                  </div>
               </div>
               <div class="col-md-2 col-sm-4 pa_left">
                  <div class="six_probpx yellow_bg">
                     <i><img src="images/jakit.png" alt="#"/></i>
                     <span>cardigans & jumpers</span>
                  </div>
               </div>
               <div class="col-md-2 col-sm-4 pa_left">
                  <div class="six_probpx bluedark_bg">
                     <i><img src="images/helbet.png" alt="#"/></i>
                     <span>Top & hat</span>
                  </div>
               </div>   -->
               
      
               @endforeach
               
            </div>
            
         </div>
      </div>
      <!-- end six_box section -->
      <!-- project section -->
      <!-- <div id="project" class="project"> -->
      <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">My Products</h4>
                </div>

                @forelse ($products as $product)

                <div class="col-md-6">
                    <div class="product-card">
                        <div class="product-card-img">
                          @if($product->quantity > 0)
                          <label class="stock bg-success">Available</label>
                          @else
                          <label class="stock bg-danger">Already Exchanged</lable>
                          @endif

                          @if($product->productImages->count() > 0)
                          <a href="{{ url('viewDetails')}}">
                            <img src="{{asset($product->productImages[0]->image)}}" alt="{{$product->name}}">
                          </a>
                            @endif
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">{{$product->category->name}}</p>
                            <h5 class="product-name">
                               <a href="{{ url('viewDetails')}}">
                                    {{$product->name}} 
                               </a>
                            </h5>
                            <div>
                                <span class="selling-price">$500</span>
                                <span class="original-price">$799</span>
                            </div>
                            <a href="{{url('producted/'.$product->id.'/edit')}}" class="btn btn-sm btn-success">Edit</a>
                            <a href="{{url('producted/'.$product->id.'/delete')}}" onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-sm  btn-danger">Delete</a>
                        </div>
                    </div>
                </div>

            @endforeach
            
             
                  <!-- <div class="project_box ">
                     <div class="dark_white_bg" ><img  src="images/shoes2.png" alt="#"/></div>
                     <h3 >Short Openwork Cardigan $120.00</h3>
                  </div>
               
                  <div class="project_box">
                     <div class="dark_white_bg" ><img  src="images/shoes3.png" alt="#"/></div>
                     <h3>Short Openwork Cardigan $120.00</h3>
                  </div>
              
                  <div class="project_box">
                     <div class="dark_white_bg" ><img  src="images/shoes4.png" alt="#"/></div>
                     <h3>Short Openwork Cardigan $120.00</h3>
                  </div>
              
                  <div class="project_box">
                     <div class="dark_white_bg" ><img  src="images/shoes5.png" alt="#"/></div>
                     <h3>Short Openwork Cardigan $120.00</h3>
                  </div>
              
            
                  <div class="project_box ">
                     <div class="dark_white_bg" ><img  src="images/tisat1.png" alt="#"/></div>
                     <h3>Short Openwork Cardigan $120.00</h3>
                  </div>
              
                  <div class="project_box ">
                     <div class="dark_white_bg" ><img  src="images/tisat2.png" alt="#"/></div>
                     <h3 >Short Openwork Cardigan $120.00</h3>
                  </div>
               
                  <div class="project_box">
                     <div class="dark_white_bg" ><img  src="images/tisat3.png" alt="#"/></div>
                     <h3>Short Openwork Cardigan $120.00</h3>
                  </div>
               
                  <div class="project_box">
                     <div class="dark_white_bg" ><img  src="images/tisat4.png" alt="#"/></div>
                     <h3>Short Openwork Cardigan $120.00</h3>
                  </div>
               
                  <div class="project_box">
                     <div class="dark_white_bg" ><img  src="images/tisat5.png" alt="#"/></div>
                     <h3>Short Openwork Cardigan $120.00</h3>
                  </div>
               
            
                  <div class="project_box ">
                     <div class="dark_white_bg" ><img  src="images/mix1.png" alt="#"/></div>
                     <h3>Short Openwork Cardigan $120.00</h3>
                  </div>
               
                  <div class="project_box ">
                     <div class="dark_white_bg" ><img  src="images/mix2.png" alt="#"/></div>
                     <h3 >Short Openwork Cardigan $120.00</h3>
                  </div>
               
                  <div class="project_box">
                     <div class="dark_white_bg" ><img  src="images/mix3.png" alt="#"/></div>
                     <h3>Short Openwork Cardigan $120.00</h3>
                  </div>
              
                  <div class="project_box">
                     <div class="dark_white_bg" ><img  src="images/mix4.png" alt="#"/></div>
                     <h3>Short Openwork Cardigan $120.00</h3>
                  </div>
               
                  <div class="project_box">
                     <div class="dark_white_bg" ><img  src="images/mix5.png" alt="#"/></div>
                     <h3>Short Openwork Cardigan $120.00</h3>
                  </div> -->
              
               <!-- <div class="col-md-12">
                  <a class="read_more" href="#">See More</a>
               </div> -->
            </div>
            {{ $products->links() }}
         </div>
      </div>
      <!-- end project section -->
      <!-- fashion section -->
      <div class="fashion">
         <img src="images/fashion.jpg" alt="#"/>
      </div>
      <!-- end fashion section -->
      <!-- news section -->
      <div class="news">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Letest News</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12 margin_top40">
                  <div class="row d_flex">
                     <div class="col-md-5">
                        <div class="news_img">
                           <figure><img src="images/news_img1.jpg"></figure>
                        </div>
                     </div>
                     <div class="col-md-7">
                        <div class="news_text">
                           <h3>Specimen book. It has survived not only five</h3>
                           <span>7 July 2019</span> 
                           <div class="date_like">
                              <span>Like </span><span class="pad_le">Comment</span>
                           </div>
                           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 margin_top40">
                  <div class="row d_flex">
                     <div class="col-md-5">
                        <div class="news_img">
                           <figure><img src="images/news_img2.jpg"></figure>
                        </div>
                     </div>
                     <div class="col-md-7">
                        <div class="news_text">
                           <h3>Specimen book. It has survived not only five</h3>
                           <span>7 July 2019</span> 
                           <div class="date_like">
                              <span>Like </span><span class="pad_le">Comment</span>
                           </div>
                           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 margin_top40">
                  <div class="row d_flex">
                     <div class="col-md-5">
                        <div class="news_img">
                           <figure><img src="images/news_img3.jpg"></figure>
                        </div>
                     </div>
                     <div class="col-md-7">
                        <div class="news_text">
                           <h3>Specimen book. It has survived not only five</h3>
                           <span>7 July 2019</span> 
                           <div class="date_like">
                              <span>Like </span><span class="pad_le">Comment</span>
                           </div>
                           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end news section -->
      <!-- newslatter section -->
      <div  class="newslatter">
         <div class="container">
            <div class="row d_flex">
               <div class="col-md-5">
                  <h3 class="neslatter">Subscribe To The Newsletter</h3>
               </div>
               <div class="col-md-7">
                  <form class="news_form">
                     <input class="letter_form" placeholder=" Enter your email" type="text" name="Enter your email">
                     <button class="sumbit">Subscribe</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- end newslatter section -->
      <!-- three_box section -->
      <div class="three_box">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <div class="gift_box">
                     <i><img src="images/icon_mony.png"></i>
                     <span>Money Back</span>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="gift_box">
                     <i><img src="images/icon_gift.png"></i>
                     <span>Special Gift</span>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="gift_box">
                     <i><img src="images/icon_car.png"></i>
                     <span>Free Shipping</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end three_box section -->

      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-3">
                     <div class="inror_box">
                        <h3>INFORMATION </h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="inror_box">
                        <h3>MY ACCOUNT </h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="inror_box">
                        <h3>ABOUT  </h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="inror_box">
                        <h3>CONTACTS  </h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>© 2019 All Rights Reserved. Design by<a href="https://html.design/"> Free Html Templates</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>


      <style type="text/css">

         .w-5
         {
            display:none
         }

body{
    background:#eee;    
}
.widget-author {
  margin-bottom: 58px;
}
.author-card {
  position: relative;
  padding-bottom: 48px;
  background-color: #fff;
  box-shadow: 0 12px 20px 1px rgba(64, 64, 64, .09);
}
.author-card .author-card-cover {
  position: relative;
  width: 100%;
  height: 100px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.author-card .author-card-cover::after {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  content: '';
  opacity: 0.5;
}
.author-card .author-card-cover > .btn {
  position: absolute;
  top: 12px;
  right: 12px;
  padding: 0 10px;
}
.author-card .author-card-profile {
  display: table;
  position: relative;
  margin-top: -22px;
  padding-right: 15px;
  padding-bottom: 16px;
  padding-left: 20px;
  z-index: 5;
}
.author-card .author-card-profile .author-card-avatar, .author-card .author-card-profile .author-card-details {
  display: table-cell;
  vertical-align: middle;
}
.author-card .author-card-profile .author-card-avatar {
  width: 85px;
  border-radius: 50%;
  box-shadow: 0 8px 20px 0 rgba(0, 0, 0, .15);
  overflow: hidden;
}
.author-card .author-card-profile .author-card-avatar > img {
  display: block;
  width: 100%;
}
.author-card .author-card-profile .author-card-details {
  padding-top: 20px;
  padding-left: 15px;
}
.author-card .author-card-profile .author-card-name {
  margin-bottom: 2px;
  font-size: 14px;
  font-weight: bold;
}
.author-card .author-card-profile .author-card-position {
  display: block;
  color: #8c8c8c;
  font-size: 12px;
  font-weight: 600;
}
.author-card .author-card-info {
  margin-bottom: 0;
  padding: 0 25px;
  font-size: 13px;
}
.author-card .author-card-social-bar-wrap {
  position: absolute;
  bottom: -18px;
  left: 0;
  width: 100%;
}
.author-card .author-card-social-bar-wrap .author-card-social-bar {
  display: table;
  margin: auto;
  background-color: #fff;
  box-shadow: 0 12px 20px 1px rgba(64, 64, 64, .11);
}
.btn-style-1.btn-white {
    background-color: #fff;
}
.list-group-item i {
    display: inline-block;
    margin-top: -1px;
    margin-right: 8px;
    font-size: 1.2em;
    vertical-align: middle;
}
.mr-1, .mx-1 {
    margin-right: .25rem !important;
}

.list-group-item.active:not(.disabled) {
    border-color: #e7e7e7;
    background: #fff;
    color: #ac32e4;
    cursor: default;
    pointer-events: none;
}
.list-group-flush:last-child .list-group-item:last-child {
    border-bottom: 0;
}

.list-group-flush .list-group-item {
    border-right: 0 !important;
    border-left: 0 !important;
}

.list-group-flush .list-group-item {
    border-right: 0;
    border-left: 0;
    border-radius: 0;
}
.list-group-item.active {
    z-index: 2;
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}
.list-group-item:last-child {
    margin-bottom: 0;
    border-bottom-right-radius: .25rem;
    border-bottom-left-radius: .25rem;
}
a.list-group-item, .list-group-item-action {
    color: #404040;
    font-weight: 600;
}
.list-group-item {
    padding-top: 16px;
    padding-bottom: 16px;
    -webkit-transition: all .3s;
    transition: all .3s;
    border: 1px solid #e7e7e7 !important;
    border-radius: 0 !important;
    color: #404040;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .08em;
    text-transform: uppercase;
    text-decoration: none;
}
.list-group-item {
    position: relative;
    display: block;
    padding: .75rem 1.25rem;
    margin-bottom: -1px;
    background-color: #fff;
    border: 1px solid rgba(0,0,0,0.125);
}
.list-group-item.active:not(.disabled)::before {
    background-color: #ac32e4;
}

.list-group-item::before {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    width: 3px;
    height: 100%;
    background-color: transparent;
    content: '';
}

/* Product Card */
.product-card{
    background-color: #fff;
    border: 1px solid #ccc;
    margin-bottom: 24px;
}
.product-card a{
    text-decoration: none;
}
.product-card .stock{
    position: absolute;
    color: #fff;
    border-radius: 4px;
    padding: 2px 12px;
    margin: 8px;
    font-size: 12px;
}
.product-card .product-card-img{
    max-height: 260px;
    overflow: hidden;
    border-bottom: 1px solid #ccc;
}
.product-card .product-card-img img{
    width: 100%;
}
.product-card .product-card-body{
    padding: 10px 10px;
}
.product-card .product-card-body .product-brand{
    font-size: 14px;
    font-weight: 400;
    margin-bottom: 4px;
    color: #937979;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
.product-card .product-card-body .product-name{
    font-size: 20px;
    font-weight: 600;
    color: #000;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
.product-card .product-card-body .selling-price{
    font-size: 22px;
    color: #000;
    font-weight: 600;
    margin-right: 8px;
}
.product-card .product-card-body .original-price{
    font-size: 18px;
    color: #937979;
    font-weight: 400;
    text-decoration: line-through;
}
.product-card .product-card-body .btn1{
    border: 1px solid;
    margin-right: 3px;
    border-radius: 0px;
    font-size: 12px;
    margin-top: 10px;
}
/* Product Card End */

</style>
      

   </body>
</html>

