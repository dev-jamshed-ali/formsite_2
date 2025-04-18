
<!-- <div class="row ">
    <div class="col-12">
        <div class="row reports d-flex  flex-wrap flex-md-nowrap ">
            <div class="col-12 col-md-6  col-lg-9">
                <div class="shadow-stepper">
                    <h3>Monetary damage in millions</h3>
                    <div class="chart-container">
                        <canvas id="chart3"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5 col-lg-3 h-100 ">
                <div class="subbox subbox2">
                    <div class="d-flex justify-content-between align-items-center gap-3">
                        <img src="{{ asset('/public/files/img/sun.png')}}" alt="sun">
                        <h3><span>
                                <h3 id="greeting"></h3>
                            </span> {{ session('name') }}</h3>
                    </div>
                    <p>Improving your SoJOR (Standard of Job Order Relevance) score can significantly impact your
                        visibility and attractiveness to potential clients. One of the most effective ways to enhance
                        your SoJOR score is by updating your verifiable profile. </p>
                    <div class="w-100 d-flex justify-content-between align-items-center gap-3" id="right-arrow-div">
                        <a href="">CLICK HERE</a>
                        <img src="{{ asset('/public/files/img/arrow.png')}}" alt="arrow" id="arrow">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="row reports d-flex  flex-wrap flex-md-nowrap ">
        <div class="col-12 col-md-5  col-lg-7">
                <div class="shadow-stepper">

                    <div class="subbox3 ">
                        <h4>What factors have led to the above change since your last submitted report on
                            mmddyyyy?</h4>
                        <div class="mt-3">
                            <div class="d-flex justify-content-between ">
                                <h3>Great work!</h3>
                                <a href="" class="custom-btn reports-btn">+21pts</a>
                            </div>
                            <p>Your (SoJOR) score is up since the last time we checked! You have improved our
                                Country’s Gini Coefficient</p>
                        </div>
                        <div class="my-4">
                            <div class="d-flex justify-content-between ">
                                <h3>Starting SoJOR Score <p class="d-inline">(02-06-2022)</p>
                                </h3>
                                <a href="" class="custom-btn reports-btn">+10pts</a>
                            </div>
                            <p>Your (SoJOR) score is up since the last month we checked! You have improved our
                                Country’s Gini Coefficient</p>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between ">
                                <h3>Change to date</h3>
                                <a href="" class="custom-btn reports-btn">+80pts</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5 col-lg-5 ">
                <div class="shadow-stepper">
                    <h3>CyberAttacks in the United States from 2016 to 2022</h3>
                    <div class="w-100">
                        <canvas id="myBarChart"></canvas>
                    </div>
                    <div class="w-100 pt-5 pb-3 d-flex justify-content-between align-items-center">
                        <div>
                            <span class="">
                                30%
                            </span>
                            Yearly distribution of breaches
                        </div>
                        <div>
                            <button class="btn ">
                                Details
                            </button>
                        </div>
                    </div>
                </div>
            </div>


            
        </div>
    </div>

    <div class="col-12">
        <div class="row reports d-flex  flex-wrap flex-md-nowrap ">
            <div class="col-12 col-md-5  col-lg-6">
                <div class="shadow-stepper">
                    <h3>Data Breaches Per Month</h3>
                    <div class="chart-container">
                        <canvas id="cyberChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6  col-lg-6">
                <div class="shadow-stepper">
                    <h3>Cyber attack reports</h3>
                    <div class="chart-container">
                        <canvas id="chart5"></canvas>
                    </div>
                </div>
                </>

                </>
            </div>

        </div>

        <script>
            const ctx = document.getElementById('myBarChart').getContext('2d');
            const myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['2016', '2017', '2018', '2019', '2020', '2021', '2022'],
                    datasets: [{
                        label: 'Sales',
                        data: [0.25, 0.28, 0.32, 0.35, 0.54, 0.47, 0.48],
                        backgroundColor: '#3074BC',
                        borderColor: '#3074BC',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: false
                            },
                            ticks: {
                                display: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
            const cy_chart = document.getElementById('cyberChart').getContext('2d');
            const cyberChart = new Chart(cy_chart, {
                type: 'bar',
                data: {
                    labels: ['November 2023', 'December 2023', 'January 2024', 'february 2024', 'March 2024', 'April 2024'],
                    datasets: [{
                        label: 'Records Breach',
                        data: [58362526, 1656776337, 78871712, 627537028, 152508390, 4277728098],
                        backgroundColor: '#3074BC',
                        borderColor: '#3074BC',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y', // This makes the bar chart horizontal
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: false
                            },
                            ticks: {
                                display: true,
                                align: 'start' // Align labels to the start (left)
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                }
            });
            const chart3 = document.getElementById('chart3').getContext('2d');
            const chart3setup = new Chart(chart3, {
                type: 'bar', // Base type
                data: {
                    labels: ['2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023'],
                    datasets: [{
                        type: 'line',
                        label: 'Monetary Damage',
                        data: [485.25, 581.44, 781.84, 800.49, 1070.71, 1450.71, 1418.7, 2710, 3500, 4200, 6900, 10300, 12500],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        fill: false
                    }, {
                        type: 'bar',
                        label: 'Monetary Damage',
                        data: [485.25, 581.44, 781.84, 800.49, 1070.71, 1450.71, 1418.7, 2710, 3500, 4200, 6900, 10300, 12500],
                        backgroundColor: '#3074BC',
                        borderColor: '#3074BC',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: true // Display grid lines
                            },
                            ticks: {
                                display: true
                            }
                        },
                        x: {
                            grid: {
                                display: true // Display grid lines
                            }
                        }
                    },

                }
            });

            const chart5 = document.getElementById('chart5').getContext('2d');
            const chart5setup = new Chart(chart5, {
                type: 'line',
                data: {
                    labels: ['2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023'],
                    datasets: [{
                        label: 'Data compromises',
                        data: [157, 321, 446, 656, 498, 662, 419, 447, 614, 783, 785, 1099, 1506, 1175, 1279, 1108, 1862, 1802, 3205],
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        fill: {
                            target: 'origin',
                            above: 'rgba(75, 192, 192, 0.2)',
                        },
                        tension: 0.4, // Smoothing factor (0 for linear, 1 for very smooth)
                        pointRadius: 0, // Remove points on the line
                    }, {
                        label: 'Number of records exposed in millions',
                        data: [66.9, 19.1, 127.7, 35.7, 222.5, 16.2, 22.9, 17.3, 91.98, 169.1, 36.6, 198, 471.23, 168.68],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        fill: {
                            target: 'origin',
                            above: 'rgba(255, 99, 132, 0.2)',
                        },
                        tension: 0.4, // Smoothing factor
                        pointRadius: 0, // Remove points on the line
                    }, {
                        label: 'Individuals impacted in millions',
                        data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 169.1, 2541.07, 1825.41, 2227.85, 883.56, 310.12, 298.08, 422.14, 353.02],
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        fill: {
                            target: 'origin',
                            above: 'rgba(54, 162, 235, 0.2)',
                        },
                        tension: 0.4, // Smoothing factor
                        pointRadius: 0, // Remove points on the line
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: true // Remove y-axis grid lines
                            },
                            ticks: {
                                display: true
                            }
                        },
                        x: {
                            grid: {
                                display: false // Display x-axis grid lines
                            }
                        }
                    },

                }
            });
            function getGreeting() {
                const now = new Date();
                const hours = now.getHours();

                let greeting;

                if (hours < 6) {
                    greeting = "Good night!";
                } else if (hours < 12) {
                    greeting = "Good morning!";
                } else if (hours < 17) {
                    greeting = "Good afternoon!";
                } else if (hours < 20) {
                    greeting = "Good evening!";
                } else {
                    greeting = "Good night!";
                }

                return greeting;
            }

            window.onload = function () {
                document.getElementById("greeting").innerText = getGreeting();
            };
        </script> -->


        <div class="container-fluid">
        <div class="container-lg mt-4">
            <div class="row ">
                <div class="col-12  text-content">
                    <div class="row reports d-flex gap-4 flex-wrap flex-md-nowrap mx-3 mx-lg-0">
                        <div class="col-12  col-md-7 col-lg-9">
                            <div class="subbox">
                                <h4>What factors have led to the above change since your last submitted report on
                                    mmddyyyy?</h4>
                                <div class="mt-3">
                                    <div class="d-flex justify-content-between ">
										<h3>Current SoJOR score <b>Great work!</b></h3>
                                        <a href="" class="custom-btn reports-btn">+21pts</a>
                                    </div>
                                    <p>Your (SoJOR) score is up since the previous 30 days we checked! You have improved our
                                        Country’s Gini Coefficient. This score is updated on 21st of each month after cash back rewards is delivered.</p>
                                </div>
                                <div class="my-4">
                                    <div class="d-flex justify-content-between ">
                                        <h3>Starting SoJOR Score <p class="d-inline">({{$admin->created_at}})</p>
                                        </h3>
                                        <a href="" class="custom-btn reports-btn">+10pts</a>
                                    </div>
                                    <p>Your initial SoJOR score.</p>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between ">
                                        <h3>Change to date</h3>
                                        <a href="" class="custom-btn reports-btn">+80pts</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-5  col-lg-3">
                            <div class="subbox">
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <img src="{{ asset('/public/files/img/sun.png')}}" alt="sun">
                                    <h3 ><span >
                                        <h3 id="greeting"></h3></span> {{ session('name') }}</h3>
                                </div>
                                <p>How Can I Improve my SoJOR Score? Update your verifiable profile  to have your score
                                    adjusted</p>
                                <div class="w-100 d-flex justify-content-between align-items-center gap-3"
                                    id="right-arrow-div">
                                    <a href="">CLICK HERE</a>
                                    <img src="{{ asset('/public/files/img/arrow.png')}}" alt="arrow" id="arrow">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12  text-content mt-4 ml-2">
                    <div class="row reports d-flex flex-wrap flex-md-nowrap    ">
                        
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="subbox">
                            <div class='tableauPlaceholder' id='viz1721330604948' style='position: relative'><noscript><a href='#'><img alt='Infographic ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Co&#47;ConsumerSentinel&#47;Infographic&#47;1_rss.png' style='border: none' /></a></noscript><object class='tableauViz'  style='display:none;'><param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> <param name='embed_code_version' value='3' /> <param name='site_root' value='' /><param name='name' value='ConsumerSentinel&#47;Infographic' /><param name='tabs' value='no' /><param name='toolbar' value='yes' /><param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Co&#47;ConsumerSentinel&#47;Infographic&#47;1.png' /> <param name='animate_transition' value='yes' /><param name='display_static_image' value='yes' /><param name='display_spinner' value='yes' /><param name='display_overlay' value='yes' /><param name='display_count' value='yes' /><param name='language' value='en-US' /></object></div>                <script type='text/javascript'>
                            var divElement = document.getElementById('viz1721330604948');
                            var iframe = document.getElementsByClassName('tableauViz');
                            var vizElement = divElement.getElementsByTagName('object')[0];
                            vizElement.style.width='850px';
                            vizElement.style.height='1127px';
                            // iframe.style.width='1000px';
                            // iframe.style.height='1127px';
                            var scriptElement = document.createElement('script');
                            scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';
                            vizElement.parentNode.insertBefore(scriptElement, vizElement);
                            </script>
                            </div>
                        </div>
                    </div>
                </div>
				
                <div class="col-12 text-content p-4">
                    <div class="row reports section3 ">
                        <div class="col-md-5">
                                <div class="subbox h-100 d-flex justify-content-start flex-column">

                                    <div>
                                        <h2 class="innerbox-font1">Positive Customer Reviews</h2>
                                        <p class="innerbox-font2">“Excellent service! Quick response and great quality products”</p>
                                    </div>
                                    <div>
                                        <h2 class="innerbox-font1">Report Fraud</h2>
                                        <p class="innerbox-font2">Report any suspicious activity or unauthorized transactions here</p>
                                    </div>
                                    <div>
                                        <h2 class="innerbox-font1">See all activity</h2>
                                        <p class="innerbox-font2">Details Payments Statements Weekly | Monthly | Yearly</p>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-7 reports">
                        <div class="subbox bg-rounded p-4 d-flex flex-column  ">
                               <h3>Voluntarily Suspend My Card for someone else’s use</h3>
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
                <div class="col-12 text-content p-4">
                    <div class="row reports section3 gap-3">
                        <div class="col-md-12">
                                <div class="subbox bg-rounded p-3" >
                            <div class="byo-block -narrow embed-shareable ">
                                <figure id="interactive-1754203"
                                    class="block-wrapper flex flex-col items-center gap-3 brookings-interactive"
                                    data-identifier="1754203"
                                    data-name="Figure&#x20;1.&#x20;Total&#x20;household&#x20;wealth&#x20;grew&#x20;in&#x20;2022,&#x20;but&#x20;white&#x20;households&#x20;still&#x20;hold&#x20;the&#x20;vast&#x20;majority"
                                    data-type="chart">

                                    <div class="embed-share flex flex-row w-full gap-5 justify-between max-sm:contents">
                                        
                                        <div class="embed-iframe iframe-wrapper">
                                            <div style="min-height:517px">
                                                <script data-cfasync="false"
                                                    src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                                                <script type="text/javascript" defer
                                                    src="https://datawrapper.dwcdn.net/VMbOT/embed.js?v=5"
                                                    charset="utf-8"></script><noscript><img
                                                        src="https://datawrapper.dwcdn.net/VMbOT/full.png"
                                                        alt="" /></noscript>
                                            </div>
                                        </div>
                                        </div>
                                </figure>
                            </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-12 text-content pb-5">
                    <div class="row section4 gy-3 reports">
                        <div class="col-md-12">
                            <div class="innerbox2 subbox bg-rounded d-flex justify-content-start  p-4">
                                <div class="main-inner" style="width: 100%;">
                                    <div>
                                        <h3 class="innerbox-font1 py-2 ">Recent Biometric Facial Recognition Activity</h3>
                                    </div>
                                    <div class="scroll-area-content">
                                        <h4>Transaction Details - Card Ending 2466</h4>
                                        <ul class="innerbox-font4">
                                            <li>Card ending: 2466</li>
                                            <li>Timestamp: mm/dd/yyyy 16:38:48 ET</li>
                                            <li>Merchant Name:</li>
                                            <li>Amount:</li>
                                            <li>Location:</li>
                                            <li>Channel Face Displayed: Physical POS | Mobile | Online Web | Voice Call Center | Kiosk & </li>Desktop <li>Branch | Chat bot</li>
                                            <li>My SoJOR Score:</li>
                                            <li>My SoJOR Range:</li>
                                        </ul>
                                    </div>
                                    <h4 class="mt-2">Transaction Details - Card Ending 0433</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          
            </div>

        </div>
    </div>
    <script>
        function getGreeting() {
            const now = new Date();
            const hours = now.getHours();

            let greeting;

            if (hours < 6) {
                greeting = "Good night!";
            } else if (hours < 12) {
                greeting = "Good morning!";
            } else if (hours < 17) {
                greeting = "Good afternoon!";
            } else if (hours < 20) {
                greeting = "Good evening!";
            } else {
                greeting = "Good night!";
            }

            return greeting;
        }

        window.onload = function() {
            document.getElementById("greeting").innerText = getGreeting();
        };
    </script>