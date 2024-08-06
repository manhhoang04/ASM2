@extends('cliend/index')
@section('detail')
<div class="page-index">
    <div class="container">
      <p>
        Home - Products Details
      </p>
    </div>
  </div>
</div>
<div class="clearfix">
</div>
<div class="container_fullwidth">
  <div class="container">
    <div class="row">
      <div class="">
        <form action="">
        <div class="products-details">
          <div class="preview_image">
            <div class="preview-small">
              <img id="zoom_03" src="{{$product->images}}" data-zoom-image="../../images/products/Large/products-01.jpg" alt="">
            </div>
            <div class="thum-image">
              
            </div>
          </div>
          <div class="products-description">
            <h5 class="name">
              {{$product ->name}}
            </h5>
            <p>
              <img alt="" src="../../images/star.png">
              <a class="review_num" href="#">
                02 Review(s)
              </a>
            </p>
            <p>
              Availability: 
              <span class=" light-red">
                In Stock
              </span>
            </p>
            <p>
             {{$product -> description}}
            </p>
            <hr class="border">
            <div class="price">
              Price : 
              <span class="new_price">
               {{$product -> price}}
                <sup>
                  $
                </sup>
              </span>
            
            </div>
            <hr class="border">
            <div class="wided">
              <div class="qty">
                Qty &nbsp;&nbsp;: 
                <select>
                  <option>
                    1
                  </option>
                </select>
              </div>
              <div class="button_group">
                <button class="button" >
                  Add To Cart
                </button>            
              </div>
            </div>
            <div class="clearfix">
            </div>
            <hr class="border">
            <img src="../../images/share.png" alt="" class="pull-right">
          </div>
        </div>
    </form>
        <div class="clearfix">
        </div>
        <div class="tab-box">
          <div id="tabnav">
            <ul>
              <li>
                <h3 href="#Descraption">
                  REVIEW
                </h3>
              </li>
            </ul>
          </div>
          <div class="tab-content-wrap">
            <div class="tab-content" id="Descraption">
              <p>
               {{$product->description}}
              </p>
            </div>
          </div>
        </div>
        <div class="clearfix">
        </div>   
        <div class="clearfix">
        </div>
      </div>  
    </div>
    <div class="clearfix">
    </div>
  </div>
</div>
    
@endsection