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
                <div class="pricing_p">
                    <h3 style="font-weight:bold" class="text-left">CONSUMER PRICES</h3>
                    <div class="pricing_p-table table-responsive">
                        <table class="table">
                            <!-- Heading -->
                            <thead>
                                <tr>
                                    <th>Features</th>
                                    <th style="background-color: #23E89C;">
                                        <span class="ptable-title">basic</span>
                                        <span class="ptable-price">$10.99 p/mo or<br>$131.88 p/yr or<br>.36¢ p/day</span><br>
                                        <a class="btn buy_button btn-block  mt-5"  href="{{route('front.goto.payment.page','basic')}}" target="_blank">Buy Now</a>
                                    </th>
                                    <th style="background-color: #E8B923">
                                        <span class="ptable-title">STANDARD<small><br>(recommended)</small></span>
                                        <span class="ptable-price">$14.99 p/mo or<br>$179.88 p/yr or<br>$0.49 p/day</span>
                                        <a class="btn buy_button btn-block mt-5"  href="{{route('front.goto.payment.page','standard')}}" target="_blank">Buy Now</a>
                                    </th>
                                    <th style="background-color: #E5E4E2;">
                                        <span class="ptable-title">PLUS<small><br>(most popular*)<br></small></span>
                                        <span class="ptable-price">$29.99 p/mo or<br>$359.88 p/yr or<br>$0.99 p/day</span>
                                        <a  href="{{route('front.goto.payment.page','plus')}}" target="_blank"> <img style="width:100%;" src="{{asset('public/buy-now.gif')}}" alt="Buy Now" class="btn-gif"></a>
                                    </th>
                                    <th style="background-color: #800080;color:white;">
                                        <span class="ptable-title">ELITE</span>
                                        <span class="ptable-price">$39.99 p/mo or<br>$479.88 p/yr or<br>$1.31 p/day</span><br>
                                        <a class="btn buy_button btn-block  mt-5"  href="{{route('front.goto.payment.page','elite')}}" target="_blank">Buy Now</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="ptable-title">1. SignUp for Free</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #800080 ;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">2. Government Benefits, All 
                                        DMV • e-Verify • Medicaid • Medicare • SNAP • SSI • INS Border</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #800080 ;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>

                                <tr>
                                    <td><span class="ptable-title">3. Credit Repair</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #800080 ;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>

                                <tr>
                                    <td><span class="ptable-title">4. Defacto ID Card / Real - ID</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #800080 ;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>

                                <tr>
                                    <td><span class="ptable-title">5. Educational Assistance</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #800080 ;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>


                                <tr>
                                    <td><span class="ptable-title">6. e-Health Records</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #800080 ;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>


                                <tr>
                                    <td><span class="ptable-title">7. Housing Assistance</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #800080 ;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>


                                <tr>
                                    <td><span class="ptable-title">8. Landlord / Tenant</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #800080 ;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>


                                <tr>
                                    <td><span class="ptable-title">9. Law Enforcement</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #800080 ;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">10. Loan Officer's Desk</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #800080 ;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">11. Medical Facilities</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #800080 ;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">12. Voter ID</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #800080 ;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #23E89C "><span class="ptable-title"></span></td>
                                    <td style="background-color: #23E89C;">
                                        <a class="btn  buy_button btn-block "  href="{{route('front.goto.payment.page','basic')}}" target="_blank">Buy Now</a>
                                    </td>
                                    <td style="background-color: #23E89C ">
                                    </td>
                                    <td style="background-color: #23E89C ">
                                    </td>
                                    <td style="background-color: #23E89C ">

                                    </td>
                                </tr>

                                <tr>
                                    <td><span class="ptable-title">13. Background Checks</span>
                                    </td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #800080 ;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>

                                <tr>
                                    <td><span class="ptable-title">14. Check Cashing Place</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    <td style="background-color: #800080 ;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">15. Credit Approval</span></td>
                                    <td style="background-color: #23E89C;"><i class="fas fa-times-circle red"></i></td>
                                    <td style="background-color: #E8B923;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #E5E4E2;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #800080;color:white;"><i class="fas fa-check-square green"></i></td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">16. Credit Card Transactions Physical Stores Only</span></td>
                                    <td style="background-color: #23E89C;"><i class="fas fa-times-circle red"></i></td>
                                    <td style="background-color: #E8B923;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #E5E4E2;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #800080;color:white;"><i class="fas fa-check-square green"></i></td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">17. Debit Card Transactions, Physical Store Only</span></td>
                                    <td style="background-color: #23E89C;"><i class="fas fa-times-circle red"></i></td>
                                    <td style="background-color: #E8B923;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #E5E4E2;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #800080;color:white;"><i class="fas fa-check-square green"></i></td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">18. Human Resource Hiring</span></td>
                                    <td style="background-color: #23E89C;"><i class="fas fa-times-circle red"></i></td>
                                    <td style="background-color: #E8B923;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #E5E4E2;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #800080;color:white;"><i class="fas fa-check-square green"></i></td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">19. IRS Refunds</span></td>
                                    <td style="background-color: #23E89C;"><i class="fas fa-times-circle red"></i></td>
                                    <td style="background-color: #E8B923;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #E5E4E2;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #800080;color:white;"><i class="fas fa-check-square green"></i></td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">20. Your Face on our Jumbo-Tron Billboard in Times Square</span></td>
                                    <td style="background-color: #23E89C;"><i class="fas fa-times-circle red"></i></td>
                                    <td style="background-color: #E8B923;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #E5E4E2;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #800080;color:white;"><i class="fas fa-check-square green"></i></td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">21. Non-Bank Intermediaries e.g. Walmart check cashing, etc. industrial loan org.</span></td>
                                    <td style="background-color: #23E89C;"><i class="fas fa-times-circle red"></i></td>
                                    <td style="background-color: #E8B923;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #E5E4E2;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #800080;color:white;"><i class="fas fa-check-square green"></i></td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">22. Payday lenders</span></td>
                                    <td style="background-color: #23E89C;"><i class="fas fa-times-circle red"></i></td>
                                    <td style="background-color: #E8B923;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #E5E4E2;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #800080;color:white;"><i class="fas fa-check-square green"></i></td>
                                </tr>
                                
                                
                         

                                <tr>
                                    <td style="background-color: #E8B923 "><span class="ptable-title"></span></td>
                                    <td style="background-color: #E8B923">
                                    </td>
                                    <td style="background-color: #E8B923">
                                        <a class="btn  buy_button btn-block "  href="{{route('front.goto.payment.page','standard')}}" target="_blank">Buy Now</a>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                    </td>
                                    <td style="background-color: #E8B923 ">

                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">23. Credit Card Transactions Online, Mobile & Physical Stores</span></td>
                                    <td style="background-color: #23E89C;"><i class="fas fa-times-circle red"></i></td>
                                    <td style="background-color: #E8B923;"><i class="fas fa-times-circle red"></i></td>
                                    <td style="background-color: #E5E4E2;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #800080;color:white;"><i class="fas fa-check-square green"></i></td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">24. Debit Card Transactions Online, Mobile & Physical Stores</span></td>
                                    <td style="background-color: #23E89C;"><i class="fas fa-times-circle red"></i></td>
                                    <td style="background-color: #E8B923;"><i class="fas fa-times-circle red"></i></td>
                                    <td style="background-color: #E5E4E2;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #800080;color:white;"><i class="fas fa-check-square green"></i></td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">25. Department Store Cards</span><br><span class="ptable-title">26. Amazon.com Store Card<br>Belk’s • Costco Anywhere Visa® Card by Citi • Home Depot • Kays Jewelers • Lowes • Lowe's Store Card • Macy’s • Nordstroms • Saks Fifth Avenue Store Card  • Staples® Credit Card • Target Credit Card • TJX Store Card • Victoria's Secret Credit Card • Walmart® Store Card<br>Don’t see your store card listed – Drop Us A Line</span></td>
                                    <td style="background-color: #23E89C;"><i class="fas fa-times-circle red"></i></td>
                                    <td style="background-color: #E8B923;"><i class="fas fa-times-circle red"></i></td>
                                    <td style="background-color: #E5E4E2;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #800080;color:white;"><i class="fas fa-check-square green"></i></td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">27. Insurance Fraud Prevention</span></td>
                                    <td style="background-color: #23E89C;"><i class="fas fa-times-circle red"></i></td>
                                    <td style="background-color: #E8B923;"><i class="fas fa-times-circle red"></i></td>
                                    <td style="background-color: #E5E4E2;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #800080;color:white;"><i class="fas fa-check-square green"></i></td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">28. Mortgage Fraud Prevention</span></td>
                                    <td style="background-color: #23E89C;"><i class="fas fa-times-circle red"></i></td>
                                    <td style="background-color: #E8B923;"><i class="fas fa-times-circle red"></i></td>
                                    <td style="background-color: #E5E4E2;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #800080;color:white;"><i class="fas fa-check-square green"></i></td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">29. Oil Credit Card Transactions, All<br>30. Oil Debit Card Transactions, All<br>AdBlue • Amoco • Bp • Chevron • Circle K • ExxonMobil • Flying J • Marathon • Pilot • Texaco • Shell • Sheetz • Sunoco • Total Pass • United Oil Fleet Card<br>Don’t see your oil card listed – Drop Us A Line</span></td>
                                    <td style="background-color: #23E89C;"><i class="fas fa-times-circle red"></i></td>
                                    <td style="background-color: #E8B923;"><i class="fas fa-times-circle red"></i></td>
                                    <td style="background-color: #E5E4E2;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #800080;color:white;"><i class="fas fa-check-square green"></i></td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">31. Motels Lodging<br>0–9<br>• 66 Motel (Needles)<br>• 66 Motel (Tulsa)<br>A<br>• A.G. Gaston Motel<br>• Alamo Plaza Hotel Courts<br>• Algiers Motel incident<br>• Atlanta Cabana Motel<br>• Aztec Motel<br>B<br>• Belvidere Café, Motel, and Gas Station<br>• The Big Texan Steak Ranch<br>• Blue Bonnet Court<br>• Blue Gables Motel<br>• Blue Swallow Motel<br>• Boots Court Motel<br>• Border Inn<br>• Buckhorn Baths Motel<br>• Budget Host<br>C<br>• Cactus Motor Lodge<br>• Caribbean Motel<br>• Chateau Bleu Motel<br>• Clown Motel<br>• Coral Court Motel<br>• The Creek South Beach<br>• Cross Country Inn<br>• Crystal River Tourist Camp<br>D<br>• De Anza Motor Lodge<br>• Down-East Village Restaurant & Motel<br>• Downtowner Motor Inn<br>E<br>• Econo Lodge<br>• El Campo Tourist Courts<br>• El Rancho Hotel & Motel<br>• El Vado Auto Court<br>F<br>• The Flanders Hotel<br>G<br>• The Gobbler<br>H<br>• Heilman Villas<br>• Hermitage Motor Inn<br>• Hilltop Lodge<br>• Hiway House<br>• Holiday Inn<br>I<br>• Imperial 400<br>K<br>• Knights Inn<br>L<br>• La Mesa Motel<br>• La Puerta Lodge<br>• Lazy A Motel<br>• Log Cabin Motel (Pinedale, Wyoming)<br>• Web Long House and Motel<br>• Lorraine Motel<br>• Loveless Cafe<br>• Luna Lodge<br>M<br>• Madonna Inn<br>• Masters Inn<br>• Midtown Motor Lodge<br>• Modern Auto Court<br>• Motel 6<br>• Motel Inn<br>• Mountain View Auto Court<br>• Munger-Moss Motel<br>N<br>• National Civil Rights Museum<br>P<br>• Panamint Springs<br>• Park Motel<br>• Piedras Blancas Motel<br>R<br>• Rainbow Court<br>• Red Caboose Motel<br>• Red Carpet Inn<br>• Red Crown Tourist Court<br>• Red Roof Inn<br>31. Motels Lodging<br>S<br>• Safari Motel<br>• Scottish Inns<br>• South Wind Motel<br>• Star Lite Motel<br>• Super 8 (hotel)<br>T<br>• Tewa Lodge<br>• Thunderbird Lodge (Chinle, Arizona)<br>• Thunderbird Motel<br>• Tower Court<br>• Travelodge<br>• Tropical Inn<br>• Tucson Inn<br>• Twin Bridges Motor Hotel<br>• Twin Pines Lodge and Cabin Camp<br>V<br>• Vagabond Inn<br>• Vibe Hotel<br>W<br>• Wagon Wheel Motel, Café and Station<br>• Wagon Wheel, Oxnard, California<br>• Waikiki Village Motel<br>• Warm Mineral Springs Motel<br>• Wigwam Motel<br>• Wildwoods Shore Resort Historic District<br>• Williams Deluxe Cabins<br>Don’t see your motel listed – Drop Us A Line</span></td>
                                    <td style="background-color: #23E89C;"><i class="fas fa-times-circle red"></i></td>
                                    <td style="background-color: #E8B923;"><i class="fas fa-times-circle red"></i></td>
                                    <td style="background-color: #E5E4E2;"><i class="fas fa-check-square green"></i></td>
                                    <td style="background-color: #800080;color:white;"><i class="fas fa-check-square green"></i></td>

                                    </tr>
                                    <tr>
                                        <td><span class="ptable-title">32. Prepaid & Gift Cards, All</span></td>
                                        <td style="background-color: #23E89C;"><i class="fas fa-times-circle red"></i></td>
                                        <td style="background-color: #E8B923;"><i class="fas fa-times-circle red"></i></td>
                                        <td style="background-color: #E5E4E2;"><i class="fas fa-check-square green"></i></td>
                                        <td style="background-color: #800080;color:white;"><i class="fas fa-check-square green"></i></td>
                                    </tr>
                                    <tr>
                                        <td><span class="ptable-title">33. Real Estate Title Fraud Prevention</span></td>
                                        <td style="background-color: #23E89C;"><i class="fas fa-times-circle red"></i></td>
                                        <td style="background-color: #E8B923;"><i class="fas fa-times-circle red"></i></td>
                                        <td style="background-color: #E5E4E2;"><i class="fas fa-check-square green"></i></td>
                                        <td style="background-color: #800080;color:white;"><i class="fas fa-check-square green"></i></td>
                                    </tr>
                                    <tr>
                                        <td><span class="ptable-title">34. Rent–a–Cars<br>A<br>ACE Rent a Car<br>Alamo Rent a Car<br>American Car Rental Association<br>Auto Europe<br>Avis Budget Group<br>Avis Car Rental<br>B<br>Budget Rent a Car<br>C<br>Canvas (car company)<br>City CarShare<br>Cruise America<br>E<br>Enterprise Holdings<br>Enterprise Rent-A-Car<br>F<br>Flexcar<br>Fox Rent A Car<br>J<br>JustShareIt<br>K<br>Kemwel<br>M<br>Maven (car sharing)<br>N<br>National Car Rental<br>R<br>Rent-a-Wreck<br>U<br>Uhaul Car Share<br>Z<br>Zipcar<br>Don’t see your car rental listed – Drop Us A Line</span></td>
                                        <td style="background-color: #23E89C;"><i class="fas fa-times-circle red"></i></td>
                                        <td style="background-color: #E8B923;"><i class="fas fa-times-circle red"></i></td>
                                        <td style="background-color: #E5E4E2;"><i class="fas fa-check-square green"></i></td>
                                        <td style="background-color: #800080;color:white;"><i class="fas fa-check-square green"></i></td>
                                    </tr>
                                
                                    <tr>
                                        <td><span class="ptable-title">35. Subscription Fraud Prevention</span></td>
                                        <td style="background-color: #23E89C;">
                                            <i class="fas fa-times-circle red"></i>
                                        </td>
                                        <td style="background-color: #E8B923 ">
                                            <i class="fas fa-times-circle red"></i>
                                        </td>
                                        <td style="background-color: #E5E4E2;">
                                            <i class="fas fa-check-square green"></i>
                                        </td>
                                        <td style="background-color: #800080 ;">
                                            <i class="fas fa-check-square green"></i>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td><span class="ptable-title">36. Utility Fraud Prevention</span></td>
                                        <td style="background-color: #23E89C;">
                                            <i class="fas fa-times-circle red"></i>
                                        </td>
                                        <td style="background-color: #E8B923 ">
                                            <i class="fas fa-times-circle red"></i>
                                        </td>
                                        <td style="background-color: #E5E4E2;">
                                            <i class="fas fa-check-square green"></i>
                                        </td>
                                        <td style="background-color: #800080 ;">
                                            <i class="fas fa-check-square green"></i>
                                        </td>
                                    </tr>


                                          
























                               
                                <tr>
                                    <td style="background-color: #E5E4E2 "><span class="ptable-title"></span></td>
                                    <td style="background-color: #E5E4E2">
                                    </td>
                                    <td style="background-color: #E5E4E2">
                                    
                                    </td>
                                    <td style="background-color: #E5E4E2">
                                        <a  href="{{route('front.goto.payment.page','plus')}}" target="_blank"> <img style="width:100%;" src="{{asset('public/buy-now.gif')}}" alt="Buy Now" class="btn-gif"></a>
                                    </td>
                                    <td style="background-color: #E5E4E2">

                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">37. Account Takeover Fraud (ATO) Prevention</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #800080 ;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">38. Analytics</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #800080 ;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">39. Business & Commercial Credit Card Transactions, All</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #800080 ;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">40. Business & Commercial Debit Card Transactions, All</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #800080 ;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">41. Doppelganger Prevention Services for member</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #800080 ;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">42. New Account Fraud</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #800080 ;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">43. Synthetic ID Fraud</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #800080 ;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">44. TSA – Transportation Security Administration, Airlines, All<br>Aer Lingus • Aeroneas Argentinas • Aerosvit Ukranina • Air Afrique • Air Canada • Air France • Air Tran • Alaska Airlines • Allegiant Air • American Eagle Airlines • American Airlines • British Airway • Chautauqua Airlines • Compass Airlines • Continental • Delta • Delta Air Lines • Delta Connection & US Helicopters • Delta First Class/Medallion/Business Elite • Envoy Air  • ExpressJet • Frontier Airlines • Frontier Airlines • GoJet • Hawaiian Airlines • Japan Airlines • JetBlue • Korean Air • Lufthansa • Shuttle America • Sky Regional • Southwest Airlines • Southwest Airlines • Spirit Airlines • United Airlines • United Express • US Airways • US Airways Express • US Airways Shuttle • Western Airlines • WestJet<br>Don’t see your airline listed – Drop Us A Line</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E8B923 ">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #800080 ;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">45. Trains<br>A-Train • Altamont Corridor Express • Amtrak • Caltrain • Capital MetroRail • Capital Corridor • Denver RTD: A,B,N and G Lines • Downeaster • eBART • Keystone Service • MARC Train • MBTA Commuter Rail • Metra Metrolink • MTA Long Island Rail Road • MTA Metro North Railroad • Music City Star • NCTD Coaster • New Mexico Rail Runner Express • NICTD • South Shore Line • NJ Transit Rail • Northstar Line • SEPTA Regional Rail • Shore Line East • Sonoma-Marin Area Rail Transit • Sounder Commuter Rail • SunRail • TexRail • Tri-Rail • Trinity Railway Express • UTA FrontRunner • Virginia Railway Express • Westside Express Service • Hartford New Haven Springfield Line • San Bernardino</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E8B923">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #800080;color:white;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">46. Hotels<br>0–9 • 21c Museum Hotels • Ace Hotel • Affinia Hotel Collection • AJ Capital Partners • Aloft Hotels • AmericInn • Aqua-Aston Hospitality • Archer Hotels • Avid Hotels • Baymont Inn & Suites • BD Hotels • Budget Host • Budget Suites of America • Candlewood Suites • Chartwell Leisure • Choice Hotels • Club Quarters • Coast Hotels • Cobblestone Hotels • The Davenport Hotel Collection • Days Inn • Drury Hotels • Eppley Hotel Company • Fontainebleau Resorts • Graduate Hotels • Grand America Hotels & Resorts • Heartland Inn • Hilton Worldwide • Holiday Inn • Hospitality International • Hotel RL • Hyatt • IHG Army Hotels • InterContinental • Jameson Inn • Jimmy Buffett's Margaritaville • Knights Inn • La Quinta Inns & Suites • Lark Hotels • Manger Hotels • Masters Inn • MCR Hotels • Mondrian Hotel • Morgans Hotel Group • Motel 6 • Nylo Hotels • Omni Hotels & Resorts • Outrigger Hotels & Resorts • Park Plaza Hotels & Resorts • Pendry Hotels and Resorts • Radisson Hotels • Radisson Red • Ramada • Red Carpet Inn • Red Lion Hotels • Red Lion Hotels Corporation • Red Roof Inn • The Ritz-Carlton Hotel Company • RockResorts • Rodeway Inn • Scottish Inns • Shilo Inns • Shoney's Inn • Sonesta International Hotels • Standard Hotels • Susse Chalet • Tru by Hilton • The Trump Organization • U.S. Franchise Systems • Vagabond Inn • Valencia Hotel Group • Vantage Hospitality • Virgin Hotels • WoodSpring Hotels • Wyndham Hotels & Resorts • Xenia Hotels & Resorts</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E8B923">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #800080;color:white;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">47. Missing Person of member</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E8B923">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #800080;color:white;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">48. Missing Pet(s) of member</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E8B923">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #800080;color:white;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">49. US – Visit</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E8B923">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #800080;color:white;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td><span class="ptable-title">50. Global Entry</span></td>
                                    <td style="background-color: #23E89C;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #E8B923">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    
                                    <td style="background-color: #E5E4E2;">
                                        <i class="fas fa-times-circle red"></i>
                                    </td>
                                    <td style="background-color: #800080;color:white;">
                                        <i class="fas fa-check-square green"></i>
                                    </td>
                                </tr>
                                                                
                                



                                
                                <tr>
                                    <td style="background-color: #800080 "><span class="ptable-title"></span></td>
                                    <td style="background-color: #800080">
                                    </td>
                                    <td style="background-color: #800080">
                                    </td>
                                    <td style="background-color: #800080">
                                    </td>
                                    <td style="background-color: #800080">
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td style="background-color: #23E89C;"><a href="{{route('front.goto.payment.page','basic')}}" target="_blank" class="btn  buy_button btn-block mt-5" href="#">Buy Now</a></td>
                                    <td style="background-color: #E8B923 "><a href="{{route('front.goto.payment.page','standard')}}" class="btn  buy_button btn-block  mt-5" href="#">Buy Now</a></td>
                                    <td style="background-color: #E5E4E2;"><a href="{{route('front.goto.payment.page','plus')}}" > <img style="width:100%; " src="{{asset('public/buy-now.gif')}}" alt="Buy Now" class="btn-gif"></a></td>
                                    <td style="background-color: #800080 ;"><a href="{{route('front.goto.payment.page','elite')}}" class="btn  buy_button btn-block  mt-5" href="#">Buy Now</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            @endif

                <div class="col-md-12">
                    {!! $dynamic_page_detail->dynamic_page_content !!}
                </div>

            </div>

          
        </div>

    </div>
@endsection
