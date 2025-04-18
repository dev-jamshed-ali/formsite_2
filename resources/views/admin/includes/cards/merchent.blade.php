<div class="row ">
    <div class="col-12">
        <div class="row reports d-flex  flex-wrap flex-md-nowrap ">
            <div class="col-12 col-md-6  col-lg-9">
                <div class="shadow-stepper">
                    <h3>2024 Data Breaches Impact</h3>
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
                    <p class="mt-5">Keep your chargeback rate below 1% to avoid high-risk merchant fees. 
                       Update your verifiable profile to enhance your SoJOR score and maintain healthy transaction metrics.</p>
                    <div class="w-100 d-flex justify-content-between align-items-center gap-3" id="right-arrow-div">
                        <a href="" class="text-secondary fw-bold"> PROFILE</a>
                        <img src="{{ asset('/public/files/img/arrow.png')}}" alt="arrow" id="arrow">
                    </div>
                </div>
            </div>


        </div>
    </div>
 

    <div class="col-12">
        <div class="row reports d-flex  flex-wrap flex-md-nowrap ">
            <div class="col-12 col-md-8  col-lg-12">
                <div class="shadow-stepper">
                    <h3>High-Risk Industries by MCC Code</h3>
                    <div class="chart-container">
                        <canvas id="cyberChart"></canvas>
                    </div>
                </div>
            </div>
          

        </div>
        <div class="col-12">
            <div class="row reports d-flex  flex-wrap flex-md-nowrap ">
        
                <div class="col-12 col-md-6 col-lg-12 ">
                    <div class="shadow-stepper">
                        <h3>Fastest Growing Fraud Types in North America</h3>
                        <div class="w-100">
                            <canvas id="myBarChart"></canvas>
                        </div>
                        <div class="w-100 pt-5 pb-3 d-flex justify-content-between align-items-center">
                            <div>
                                <span class="">
                                    30%
                                </span>
                                Yearly distribution of fraud types
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

        <div class="col-12 mt-4">
            <div class="shadow-stepper">
                <h3>Merchant FAQ</h3>
                <div class="accordion" id="merchantFAQ">
                    <!-- FAQ Item 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                This security software solution is so cool. Will I ever have to pay for it?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#merchantFAQ">
                            <div class="accordion-body">
                                Ginicoe currently is offering our cool security solution to all approved merchants for FREE! This offer is subject to change. But no worries – we will inform all market participants well in advance, should things change. In the meantime, enjoy our FREE 'Biometric Security at the SPEED of a Smile™'
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                What is an Ad Valorem Fee?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#merchantFAQ">
                            <div class="accordion-body">
                                <p>-This shows up as a SoJOR fee on your receipts to consumers.</p>
                                <p>-Ad Valorem consumption fee basis also known as a per-transaction basis. Social Justice, Political Violence, and Macroprudential Risks are being redefined and disrupted based on a geographic per transaction price basis.</p>
                                <p>Geographic pricing is not new to Consumers. Consumers pay a higher price to sit in Orchestra seats (the affluent) at the concert than up in the nose bleeds (the forgotten). In-State vs Out-of-State College Tuition; Taxi/Uber zone prices; SALT Tax, Iron works; Airline passenger seats; pharmaceuticals in Canada; hotel rates, FreshPlum, Amazon, Staples and videogame store Steam, gasoline zone pricing, all vary their price by geographic location some by as much as 166%.</p>
                                <p>As of today's rates, this fee is not higher than a typical restaurant tip of 20%.</p>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                What is the purpose of the SoJOR fee?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#merchantFAQ">
                            <div class="accordion-body">
                                <p>It is collected by Ginicoe to counterbalance the freeware security facial image software tool that reduces your fraud. It is solely calculated based on the consumer's social justice racially integrated housing status at the time they voluntarily SignUp to protect their transactions.</p>
                                <p>Segregated housing Address = higher fee</p>
                                <p>Integrated housing Address = lower fee</p>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                My terminal does not seem to have power. What do I do?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#merchantFAQ">
                            <div class="accordion-body">
                                <ul class="list-unstyled">
                                    <li>-Make sure the terminal's power supply is securely connected to a power outlet and the back of the terminal.</li>
                                    <li>-Try another outlet that you know works.</li>
                                    <li>-If the power pack is cold to the touch, it might require replacement.</li>
                                    <li>-Contact your Ginicoe Associate for further support.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 5 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                My terminal says "Waiting for Line" or "No line." What do I do?
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#merchantFAQ">
                            <div class="accordion-body">
                                <ul class="list-unstyled">
                                    <li>- Confirm whether or not you have a phone line attached to the back of the credit card machine.</li>
                                    <li>- Verify that the phone line is not in use by another device or person.</li>
                                    <li>- Verify the terminal has a good connection to the wall jack; it is always a good idea to eliminate "splitters" from the phone line.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 6 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                Can I use Ginicoe facial security tool on my eCommerce site for card not present transactions?
                            </button>
                        </h2>
                        <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#merchantFAQ">
                            <div class="accordion-body">
                                <p>Ginicoe's counter top facial security tool is 21st Century cutting edge technology and proactively prevents fraud by empowering you, the merchant, to permit or deny the transaction.</p>
                                <p>We are currently in our labs daily working to improve our products and features. Included in our labs are eCommerce solution to provide the same or better experience to you, our valued merchant customer.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const ctx = document.getElementById('myBarChart').getContext('2d');
            const myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Fraudulent Chargeback', 'QR-code fraud', 'Mobile Transaction Fraud', 'Account Takeover', 'Identity Theft', 'Scams', 'Fake Account'],
                    datasets: [{
                        data: [59, 56, 55, 54, 65, 63, 61],
                        backgroundColor: function(context) {
                            const chart = context.chart;
                            const {ctx, chartArea} = chart;
                            if (!chartArea) {
                                return null;
                            }
                            const gradient = ctx.createLinearGradient(0, 0, chartArea.width, 0);
                            gradient.addColorStop(0, 'rgba(48, 116, 188, 0.9)');
                            gradient.addColorStop(1, 'rgba(75, 192, 192, 0.9)');
                            return gradient;
                        },
                        borderRadius: 6,
                        borderSkipped: false,
                        barPercentage: 0.7,
                        categoryPercentage: 0.8
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.85)',
                            titleColor: '#fff',
                            titleFont: {
                                size: 13,
                                weight: 'normal'
                            },
                            bodyColor: '#fff',
                            bodyFont: {
                                size: 14,
                                weight: 'bold'
                            },
                            padding: 12,
                            displayColors: false,
                            callbacks: {
                                label: function(context) {
                                    return `${context.raw}% of cases`;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            grid: {
                                display: true,
                                color: 'rgba(0, 0, 0, 0.05)',
                                drawBorder: false
                            },
                            ticks: {
                                color: '#666',
                                font: {
                                    size: 12
                                },
                                padding: 10,
                                callback: function(value) {
                                    return value + '%';
                                }
                            }
                        },
                        y: {
                            grid: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                color: '#333',
                                font: {
                                    size: 12,
                                    weight: '500'
                                },
                                padding: 12
                            }
                        }
                    },
                    animation: {
                        duration: 1000,
                        easing: 'easeInOutQuart'
                    },
                    layout: {
                        padding: {
                            left: 10,
                            right: 20,
                            top: 20,
                            bottom: 10
                        }
                    }
                }
            });
            const cy_chart = document.getElementById('cyberChart').getContext('2d');
            const cyberChart = new Chart(cy_chart, {
                type: 'doughnut',
                data: {
                    labels: [
                        'Account Funding (6540)',
                        'Adult Entertainment (7841)',
                        'Cryptocurrency (6051)',
                        'Gambling (7995)',
                        'Online Pharmacies (5912)',
                        'Firearms (3489)',
                        'Travel Services (4722)',
                        'Dating Services (7273)',
                        'Debt Collection (7320)',
                        'Direct Marketing (5969)'
                    ],
                    datasets: [{
                        data: [6540, 7841, 6051, 7995, 5912, 3489, 4722, 7273, 7320, 5969],
                        backgroundColor: [
                            '#3074BC',
                            '#4BBCBC',
                            '#FF9F40',
                            '#36A2EB',
                            '#9966FF',
                            '#FF6384',
                            '#FFCD56',
                            '#4BC0C0',
                            '#FF9F40',
                            '#36A2EB'
                        ],
                        borderWidth: 2,
                        borderColor: '#ffffff',
                        hoverOffset: 25
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '60%',
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                padding: 15,
                                font: {
                                    size: 12
                                },
                                generateLabels: function(chart) {
                                    const data = chart.data;
                                    if (data.labels.length && data.datasets.length) {
                                        return data.labels.map((label, i) => ({
                                            text: label,
                                            fillStyle: data.datasets[0].backgroundColor[i],
                                            hidden: isNaN(data.datasets[0].data[i]),
                                            index: i
                                        }));
                                    }
                                    return [];
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return `MCC Code: ${context.raw}`;
                                }
                            }
                        }
                    }
                }
            });
            const chart3 = document.getElementById('chart3').getContext('2d');
            const chart3setup = new Chart(chart3, {
                type: 'bar',
                data: {
                    labels: ['Yahoo', 'National Public Data', 'Ticketmaster', 'AT&T', 'Change Healthcare', 'Santander Bank', 'Advance Auto Parts', 'Snowflake'],
                    datasets: [{
                        type: 'bar',
                        label: 'Records Affected (Millions)',
                        data: [3000, 2900, 560, 110, 100, 30, 2.3, 0.165],
                        backgroundColor: '#3074BC',
                        borderColor: '#3074BC',
                        borderWidth: 1,
                        yAxisID: 'y'
                    }, {
                        type: 'line',
                        label: 'Financial Loss (Millions $)',
                        data: [500, 3.5, 0.5, 13, 22, 2, 3, 2.7],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        fill: false,
                        tension: 0.4,
                        yAxisID: 'y1'
                    }]
                },
                options: {
                    responsive: true,
                    interaction: {
                        mode: 'index',
                        intersect: false,
                    },
                    scales: {
                        y: {
                            type: 'logarithmic',
                            position: 'left',
                            title: {
                                display: true,
                                text: 'Records Affected (Millions)'
                            },
                            grid: {
                                display: true
                            }
                        },
                        y1: {
                            type: 'logarithmic',
                            position: 'right',
                            title: {
                                display: true,
                                text: 'Financial Loss (Millions $)'
                            },
                            grid: {
                                display: false
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: '2024 Data Breaches Impact'
                        },
                        legend: {
                            display: true,
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    if (context.dataset.label.includes('Records')) {
                                        return `${context.dataset.label}: ${context.raw}M records`;
                                    } else {
                                        return `${context.dataset.label}: $${context.raw}M`;
                                    }
                                }
                            }
                        }
                    }
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
        </script> 

