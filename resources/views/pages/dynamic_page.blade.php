@extends('layouts.app')

@section('content')
    @if ($slug === 'prices')
        <style>
            .pricing_p {
                margin: 40px 0px;
            }

            .pricing_p .table {
                border-top: 1px solid #ddd;
                background: #fff;
            }

            .pricing_p .table th,
            .pricing_p .table {
                text-align: center;
            }

            .pricing_p .table th,
            .pricing_p .table td {
                padding: 20px 10px;
                border: 1px solid #ddd;
                border: 1px solid rgba(255, 255, 255, 0.1);
            }

            .pricing_p .table th {
                width: 20%;
                font-size: 25px;
                font-weight: bold;
                border-bottom: 0;
                background: #f0f8ff;
                color: #101010;
                text-transform: uppercase;
                vertical-align: top;
            }

            .pricing_p .table th.highlight {
                border-top: 4px solid #4caf50 !important;
            }

            .pricing_p .table tr:nth-child(odd) {
                background: #f0f8ff;
            }

            .pricing_p .table td:first-child {

                text-align: left;

                background: #f0f8ff;
            }

            .pricing_p tr td .ptable-title {
                font-size: 18px;
                font-weight: bold;

            }

            .pricing_p tr td .ptable-title i {
                width: 23px;
                line-height: 25px;
                text-align: right;
                margin-right: 5px;
            }

            .pricing_p .ptable-star {
                position: relative;
                display: block;
                text-align: center;
            }

            .pricing_p .ptable-star.red {
                color: #e91e63;
            }

            .pricing_p .ptable-star.green {
                color: #4caf50;
            }

            .pricing_p .ptable-star.lblue {
                color: #03a9f4;
            }

            .pricing_p .ptable-star i {
                width: 8px;
                /* font-size: 13px; */
            }

            .pricing_p .ptable-price {
                display: block;
                font-size: 16px;
            }

            .pricing_p tr td {
                /* font-size: 16px; */
                line-height: 32px;
                text-transform: uppercase;
            }

            .pricing_p tr td.bg-red {
                background: #e91e63;
            }

            .pricing_p tr td.bg-green {
                background: #4caf50;
            }

            .pricing_p tr td.bg-lblue {
                background: #03a9f4;
            }

            .pricing_p tr td.bg-red a,
            .pricing_p tr td.bg-green a,
            .pricing_p tr td.bg-lblue a {
                color: #fff;
            }

            .pricing_p tr td i {
                display: block;
                margin-bottom: 12px;
                /* font-size: 30px; */
            }

            .pricing_p tr td i.red {
                color: #e91e63;
            }

            .pricing_p tr td i.green {
                color: #4caf50;
            }

            .pricing_p tr td i.lblue {
                color: #03a9f4;
            }

            .pricing_p tr td:first-child i {
                display: inline;
                margin-bottom: 0px;
                /* font-size: 22px; */
            }

            .bg_basic: {
                background-color: #23E89C;
            }

            .bg_standard: {
                background-color: #E8B923;
            }

            .bg_elite: {
                background-color: #800080;
            }

            .bg_plus: {
                background-color: #E5E4E2;
            }

            .flex-align-top {
                display: flex;
                align-items: flex-start;
                justify-content: center;
                flex-direction: column;
                height: 100%;
            }

            .fa-check-square {
                font-size: 30px;
            }

            .fa-times-circle {
                font-size: 30px;
            }
            small{
                font-size: 12px;
                font-weight: bold;
            }
            .buy_button{
                border-radius: 25px;
                background-color: #0FFF50;
                color: black
            }
            .ptable-price {
                text-transform: lowercase;
}
        </style>
    @endif
    <div class="page-banner"
        style="background-image: url({{ asset('public/uploads/' . $dynamic_page_detail->dynamic_page_banner) }})">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $dynamic_page_detail->dynamic_page_name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $dynamic_page_detail->dynamic_page_name }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div @if ($slug != 'donate') class="page-content" @endif>
        <div class="container">
            <div class="row">
                {{-- @if ($slug == 'donate')
                    <div class="col-md-12 mt-4 mb-4">
                        <form id="donation_form">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="col-lg-12 col-md-12 mb-4">
                                        <button type="button" class="btn btn-outline-warning" style="width:48%"
                                            onclick="select_frequency(this,'one_time')">One Time</button>
                                        <button type="button" class="btn btn-outline-warning w-50"
                                            onclick="select_frequency(this,'monthly')">Monthly</button>

                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-4">
                                        <button type="button" class="btn btn-outline-warning" style="width: 23%"
                                            onclick="add_payment(this,100)">$100</button>
                                        <button type="button" class="btn btn-outline-warning w-25"
                                            onclick="add_payment(this,250)">$250</button>
                                        <button type="button" class="btn btn-outline-warning w-25"
                                            onclick="add_payment(this,500)">$500</button>
                                        <button type="button" class="btn btn-outline-warning w-25"
                                            onclick="add_payment(this,1000)">$1000</button>
                                    </div>
                                    <input type="hidden" name="frequency" id="frequency" />
                                    <div class="col-lg-12 col-md-12">

                                        <div class="form-group">
                                            <input placeholder="Name" type="text" id="donor_name" name="donor_name"
                                                class="form-control">
                                                <p style="color:red"></p>
                                        </div>
                                        <div class="form-group">
                                            <input placeholder="Email" type="email" id="donor_email" name="donor_email"
                                                class="form-control">
                                                <p style="color:red"></p>
                                        </div>
                                        <div class="form-group">

                                            <input placeholder="Enter Amount" type="number" id="donate_amount"
                                                name="donate_amount" class="form-control" />
                                                <p style="color:red"></p>
                                        </div>
                                        <div class="form-group">

                                            <div id="card-element" class="form-control">
                                                <!-- A Stripe Element will be inserted here. -->
                                            </div>
                                            <div id="card-errors" role="alert" class="text-danger mt-2"></div>
                                        </div>

                                    </div>
                                    <button type="submit" id="donation_button" class="btn btn-warning btn-block"><i
                                            class="fa fa-heart"></i>
                                        <span id="donate_button_spinner" style="display: none;"
                                            class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Donate</button>

                                </div>
                            </div>
                        </form>

                    </div>
                @endif --}}

                @if ($slug === 'prices')

                <style>

/* body{margin-top:20px;
background:#DCDCDC;
} */
.pricing-content{position:relative;}
.pricing_design{
    position: relative;
    margin: 0px 15px;
}
.pricing_design .single-pricing{
    background:#008dff;
    padding: 60px 40px;
    border-radius:30px;
    box-shadow: 0 10px 40px -10px rgba(0,64,128,.2);
    position: relative;
    z-index: 1;
}
.pricing_design .single-pricing:before{
    content: "";
    background-color: #fff;
    width: 100%;
    height: 100%;
    border-radius: 18px 18px 190px 18px;
    border: 1px solid #eee;
    position: absolute;
    bottom: 0;
    right: 0;
    z-index: -1;
}
.price-head{}
.price-head h2 {
	margin-bottom: 20px;
	font-size: 26px;
	font-weight: 600;
}
.price-head h1 {
	font-weight: 600;
	margin-top: 30px;
	margin-bottom: 5px;
}
.price-head span{}

.single-pricing ul{list-style:none;margin-top: 30px;}
.single-pricing ul li {
	line-height: 36px;
}
.single-pricing ul li i {
	background: #554c86;
	color: #fff;
	width: 20px;
	height: 20px;
	border-radius: 30px;
	font-size: 11px;
	/* text-align: center; */
	line-height: 20px;
	margin-right: 6px;
}
.pricing-price{}

.price_btn {
	background: #008dff;
	padding: 10px 30px;
	color: #fff;
	display: inline-block;
	margin-top: 20px;
	border-radius: 2px;
	-webkit-transition: 0.3s;
	transition: 0.3s;
}
.price_btn:hover{background:#0aa1d6;}
a{
text-decoration:none;    
}

.section-title {
    margin-bottom: 60px;
}
/* .text-center {
    text-align: center!important;
} */

.section-title h2 {
    font-size: 45px;
    font-weight: 600;
    margin-top: 0;
    position: relative;
    text-transform: capitalize;
}

.page-content ul li {
    /* list-style-type: none; */
    /* position: relative;*/
    /* background-image: url(../images/tick.png); */
    background-size: 15px 16px;
    background-position: 1px 8px;
    background-repeat: no-repeat;
    padding-left: 20px;
    margin-bottom: 11px;
}
                </style>
                <div class="pricing_p">
                    <h3 style="font-weight:bold" class="text-left">CONSUMER PRICES</h3>
                    {{-- <div class="pricing_p-table table-responsive"> --}}
                        <section id="pricing" class="pricing-content section-padding">
                            <div class="container">					
                                {{-- <div class="section-title text-center">
                                    <h2>Pricing Plans</h2>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                </div>				 --}}
                                <div class="row text-center">
                                    @foreach ($plan as $item)
                                    <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;">
                                        <div class="pricing_design">
                                            <div class="single-pricing">
                                                <div class="price-head">		
                                                    <h2>{{$item->title}}</h2>
                                                    <h1>${{$item->price}}</h1>
                                                    <span>/Monthly</span>
                                                </div>
                                                <ul>
                                                    @foreach ($item->planFeature as $value)
                                                    <li><p style="text-align: left;margin-bottom: 0rem;">{{$value->detail}}</p></li>
                                                        
                                                    @endforeach
                                                    
                                                </ul>
                                                <div class="pricing-price">
                                                    
                                                </div>
                                                
                                                <a  href="{{route('front.goto.payment.page',['id'=>$item->id])}}"class="price_btn">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach									
                                    <!--- END COL -->	
                                    {{-- <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInUp;">
                                        <div class="pricing_design">
                                            <div class="single-pricing">
                                                <div class="price-head">		
                                                    <h2>Personal</h2>
                                                    <h1 class="price">$29</h1>
                                                    <span>/Monthly</span>
                                                </div>
                                                <ul>
                                                    <li><b>15</b> website</li>
                                                    <li><b>50GB</b> Disk Space</li>
                                                    <li><b>50</b> Email</li>
                                                    <li><b>50GB</b> Bandwidth</li>
                                                    <li><b>10</b> Subdomains</li>
                                                    <li><b>Unlimited</b> Support</li>
                                                </ul>
                                                <div class="pricing-price">
                                                    
                                                </div>
                                                <a href="#" class="price_btn">Order Now</a>
                                            </div>
                                        </div>
                                    </div><!--- END COL -->	 --}}
                                    {{-- <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
                                        <div class="pricing_design">
                                            <div class="single-pricing">
                                                <div class="price-head">		
                                                    <h2>Ultimate</h2>
                                                    <h1 class="price">$49</h1>
                                                    <span>/Monthly</span>
                                                </div>
                                                <ul>
                                                    <li><b>15</b> website</li>
                                                    <li><b>50GB</b> Disk Space</li>
                                                    <li><b>50</b> Email</li>
                                                    <li><b>50GB</b> Bandwidth</li>
                                                    <li><b>10</b> Subdomains</li>
                                                    <li><b>Unlimited</b> Support</li>
                                                </ul>
                                                <div class="pricing-price">
                                                    
                                                </div>
                                                <a href="#" class="price_btn">Order Now</a>
                                            </div>
                                        </div>
                                    </div><!--- END COL -->			   --}}
                                </div><!--- END ROW -->
                            </div><!--- END CONTAINER -->
                        </section>
                    {{-- </div> --}}

                </div>
            @endif

                <div class="col-md-12">
                    {!! $dynamic_page_detail->dynamic_page_content !!}
                </div>

            </div>

          
        </div>

    </div>
@endsection
