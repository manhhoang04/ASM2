@extends('cliend/index')
@section('listPro')
    <div class="container_fullwidth">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="category leftbar">
                        <h3 class="title">
                            Categories
                        </h3>
                        <ul>
                            <li>
                                <a href="#">
                                    Men
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="clearfix">
                    </div>

                    <div class="clearfix">
                    </div>
                    <div class="price-filter leftbar">
                        <h3 class="title">
                            Price
                        </h3>
                        <form class="pricing">
                            <label>
                                $
                                <input type="number">
                            </label>
                            <span class="separate">
                                -
                            </span>
                            <label>
                                $
                                <input type="number">
                            </label>
                            <input type="submit" value="Go">
                        </form>
                    </div>
                    <div class="clearfix">
                    </div>

                    <div class="clearfix">
                    </div>

                    <div class="clearfix">
                    </div>

                    <div class="clearfix">
                    </div>

                    <div class="clearfix">
                    </div>

                    <div class="clearfix">
                    </div>
                    <div class="leftbanner">
                        <img src="../../images/banner-small-01.png" alt="">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="banner">
                        <div class="bannerslide" id="bannerslide">
                            <ul class="slides">
                                <li>
                                    <a href="#">
                                        <img src="images/banner-01.jpg" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="images/banner-02.jpg" alt="" />
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix">
                    </div>
                    <div class="products-grid">
                        <div class="clearfix">
                        </div>
                        <div class="row">
                            @foreach ($products as $p)
                            <div class="col-md-4 col-sm-6">
                                <div class="products">
                                    <div class="thumbnail">
                                        <a href="details.html">
                                            <img src="{{$p->images}}"  width="230px" height="264px" alt="Product Name">
                                        </a>
                                    </div>
                                    <div class="productname">
                                        {{$p->name}}
                                    </div>
                                    <h4 class="price">
                                        {{$p->price}}
                                    </h4>
                                    <div class="button_group">
                                        <button class="button add-cart" type="button">
                                            Add To Cart
                                        </button>
                                        <button class="button compare" type="button">
                                            <i class="fa fa-exchange">
                                            </i>
                                        </button>
                                        <button class="button wishlist" type="button">
                                            <i class="fa fa-heart-o">
                                            </i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                          
                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix">
    </div>
    </div>
    </div>
@endsection
