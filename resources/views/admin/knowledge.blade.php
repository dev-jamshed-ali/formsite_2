@extends('admin.admin_layouts')

@section('admin_content')

<div class="container-fluid">
    <div class="container-lg ">
        <div class="row ">
        <div class="col-12 text-content pb-4">
                <div class="row section3 gy-3">
                    <div class="col-md-6">
                        <div class="innerbox bg-rounded d-flex justify-content-start  p-4">
                            <div class="main-inner d-flex justify-content-between flex-column">

                                <div>
                                    <h3 class="innerbox-font1">Positive Customer Reviews</h3>
                                    <p class="innerbox-font2">“Excellent service! Quick response and great quality
                                        products”</p>
                                </div>
                                <div>
                                    <h3 class="innerbox-font1">Report Fraud</h3>
                                    <p class="innerbox-font2">Report any suspicious activity or unauthorized
                                        transactions here</p>
                                </div>
                                <div>
                                    <h3 class="innerbox-font1">See all activity</h3>
                                    <p class="innerbox-font2">Details Payments Statements Weekly | Monthly | Yearly</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="innerbox bg-rounded p-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h3 class="innerbox-font1">Pay My Bill</h3>
                                <button class="btn btn-primary btn-sm">Make a Payment</button>
                            </div>
                            <p class="innerbox-font2">Ginico RECURRING SUBSCRIPTION BILLING MY GUID ACCOUNT NO</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="innerbox-font3">Ginicoe ACCOUNT ONE TIME PAYMENT</h3>
                                <a href="" class="custom-btn innerbox-btn">$50.00</a>
                            </div>
                            <ul class="innerbox-font4">
                                <li>Current Amount Due</li>
                                <li>Payment Due by March 25, 2023</li>
                                <li>My Fedral saving Bank *1234</li>
                                <li>Today Feb 03, 2023</li>
                                <li>Payment Processing date Feb 30, 2023</li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-content pb-5">
                <div class="row section4 gy-3">
                    <div class="col-md-6">
                        <div class="innerbox2 bg-rounded d-flex justify-content-start  p-4">
                            <div class="main-inner">

                                <div>
                                    <h3 class="innerbox-font1 py-2 px-4">Recent Biometric Facial Recognition Activity
                                    </h3>
                                </div>
                                <div class="scroll-area-content">
                                    <h4>Transaction Details - Card Ending 2466</h4>
                                    <ul class="innerbox-font4">
                                        <li>Card ending: 2466</li>
                                        <li>Timestamp: mm/dd/yyyy 16:38:48 ET</li>
                                        <li>Merchant Name:</li>
                                        <li>Amount:</li>
                                        <li>Location:</li>
                                        <li>Channel Face Displayed: Physical POS | Mobile | Online Web | Voice Call
                                            Center | Kiosk & </li>Desktop <li>Branch | Chat bot</li>
                                        <li>My SoJOR Score:</li>
                                        <li>My Subscription Level:</li>
                                    </ul>
                                </div>
                                <h4 class="mt-2">Transaction Details - Card Ending 0433</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="innerbox2 bg-rounded p-4">
                            <h3 class="innerbox-font1">Personally Identifiable Information (PII) can be compromised on
                                any number of threat surfaces. Here is why you are protecting yourself.</h3>
                            <h5>Types of Data Breach as of 02/06/2023</h5>

                            <div class="card-container">
                                <div class="card-text">CARD</div>
                                <div class="divider"></div>
                                <div class="card-number">68</div>
                            </div>
                            <div class="card-container">
                                <div class="card-text">HACK</div>
                                <div class="divider"></div>
                                <div class="card-number">2533</div>
                            </div>
                            <div class="card-container">
                                <div class="card-text">INSIDER</div>
                                <div class="divider"></div>
                                <div class="card-number">606</div>
                            </div>
                            <div class="card-container">
                                <div class="card-text">PHYSICAL</div>
                                <div class="divider"></div>
                                <div class="card-number">1733</div>
                            </div>
                            <div class="card-container">
                                <div class="card-text">PORTABLE</div>
                                <div class="divider"></div>
                                <div class="card-number">1172</div>
                            </div>
                            <div class="card-container">
                                <div class="card-text">STATATIONARY</div>
                                <div class="divider"></div>
                                <div class="card-number">249</div>
                            </div>
                            <div class="card-container">
                                <div class="card-text">DISCLOSED</div>
                                <div class="divider"></div>
                                <div class="card-number">1861</div>
                            </div>
                            <div class="card-container">
                                <div class="card-text">UNKNOWN/OTHER</div>
                                <div class="divider"></div>
                                <div class="card-number">704</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-content pb-5">
                <div class="row section5">
                    <div class="col-md-12">
                        <div class="bg-rounded p-4 d-flex flex-column  ">
                            <h4>Voluntarily Suspend My Card for someone else’s use</h4>
                            <ul class="m-0 py-2">
                                <li>Target Card Number ending: 2466</li>
                                <li>Suspend Start Date: 02/06/2023</li>
                                <li>Unsuspend End Date: 02/06/2023</li>
                                <li>Suspend Start Local Time: 9:00AM</li>
                                <li>Unsuspend End Local Time: 5:00 PM</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection