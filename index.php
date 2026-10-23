<?php
include_once("header.php");
// require_once("header.php");
// require_once("header.php");
?>

<style>
    /* WAVE/BADAL EFFECT HATANE KE LIYE CLEANUP */
    .owl-carousel-item::after, 
    .owl-carousel-item::before, 
    .header-carousel::after, 
    .header-carousel::before,
    [class*="custom-shape-divider"] {
        display: none !important;
        background-image: none !important;
        clip-path: none !important;
    }

    /* JOB CARD ANIMATIONS (HOVER POP-UP) */
    .job-card {
        cursor: pointer;
        position: relative;
        transition: transform 0.3s ease;
        overflow: visible !important; 
    }
    .job-card:hover {
        transform: translateY(-5px);
    }
    .facility-item {
        overflow: visible !important; 
    }
    
    /* YAHAN CHANGES KIYE HAIN PHOTO KO INDEPENDENT KARNE KE LIYE */
    .job-character {
        position: absolute;
        /* Left aur Bottom ab seedha array me inline style se aayenge taaki har image alag set ho */
        transform: translateY(50px) scale(0.8); 
        height: 170px; 
        opacity: 0;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        z-index: 10;
        pointer-events: none; 
    }
    /* Jab card par hover ho toh character pop up ho */
    .job-card:hover .job-character {
        opacity: 1;
        transform: translateY(-20px) scale(1.1);
    }

    /* DETAILS SLIDE DOWN ANIMATION */
    .job-details-box, .city-details-box {
        display: none;
        animation: slideDown 0.5s ease-out forwards;
    }
    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* ========================================= */
    /* 📱 MOBILE RESPONSIVE FIXES (PHONE KE LIYE) */
    /* ========================================= */
    @media (max-width: 768px) {
        /* 1. Slider ka text jo bohot neeche chala gaya tha, use upar laane ke liye */
        div[style*="margin-top: 420px"], 
        div[style*="margin-top: 425px"] {
            margin-top: 60px !important; 
            min-height: auto !important;
        }

        /* 2. Slider ki heading mobile par chhoti karne ke liye */
        .display-3 {
            font-size: 2.2rem !important;
            margin-bottom: 10px !important;
        }

        /* 3. Khade hone wali (pop-up) images ko override karke mobile par center karna */
        .job-character {
            height: 130px !important; 
            left: 50% !important; 
            bottom: 0px !important;
            transform: translateX(-50%) translateY(20px) scale(0.8) !important;
        }
        
        /* Mobile par tap karne par image ka animation adjust kiya */
        .job-card:hover .job-character,
        .job-card:active .job-character {
            transform: translateX(-50%) translateY(-10px) scale(1) !important;
        }

        /* 4. Cards ke beech mein thoda gap taaki chipke hue na lagein */
        .facility-item {
            margin-bottom: 20px !important;
        }

        /* 5. Detail slide-down box ki width aur padding mobile ke hisaab se */
        .job-details-box, .city-details-box {
            padding: 15px !important;
            text-align: center;
        }
        
        .job-details-box .border-start, .city-details-box .border-start {
            border-left: none !important; 
            border-top: 1px solid #ddd;
            margin-top: 15px;
            padding-top: 15px;
        }
    }
</style>

        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <!-- ========================================== -->
<!-- SLIDE 2: WHAT DO I WANT TO BECOME (FIXED)  -->
<!-- ========================================== -->

<!-- Maine sabkuch 'slide2-container' mein daal diya hai -->
<div class="slide2-container">
    
    <div style="margin-top: 420px; min-height: 300px; position: relative; z-index: 10; max-width: 650px;">
        
        <!-- ORIGINAL TEXT 2 -->
        <div class="originalTextContent2" style="transition: opacity 0.5s ease;">
            <h1 class="display-3 text-white mb-4 animated slideInDown" style="font-family: 'AdineKirnberg', cursive; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">What do I want to become?</h1>
            <p class="fs-5 text-white mb-4 pb-2 animated slideInDown" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.5);">Confused about your future? Discover the best career paths in Engineering, Medical, Commerce, and Arts based on your skills and interests.</p>
        </div>

        <!-- NAYA BOX 2 -->
        <div class="learnMoreBoxContent2" style="display: none; animation: fadeIn 0.8s;">
            <div class="card card-body text-start" style="background-color: rgba(255, 255, 255, 0.95); border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border: 2px solid #4CAF50; max-height: 320px; overflow-y: auto;">
                
                <h4 style="color: #4CAF50; font-weight: 600; margin-bottom: 15px;">Unlock Your True Calling 🚀</h4>
                
                <p style="color: #444; font-size: 1rem; line-height: 1.6; margin-bottom: 10px;">
                    Wondering if you should be a Doctor, Engineer, Entrepreneur, or Artist? It's natural to have big dreams but feel unsure about the exact steps to get there.
                </p>
                
                <p style="color: #444; font-size: 1rem; line-height: 1.6; margin-bottom: 10px;">
                    At GenzDream, we bridge the gap between your passion and reality. We help you explore various career paths deeply, understanding the day-to-day life, required skills, and future scope of each profession.
                </p>

                <div style="background-color: #e8f5e9; padding: 10px; border-radius: 8px; border-left: 4px solid #4CAF50; margin-bottom: 10px;">
                    <p style="color: #2e7d32; font-size: 1rem; font-weight: 600; margin: 0;">
                        Stop guessing and start planning. Dive into our detailed career library and find the perfect match for your unique talents.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- BUTTONS SECTION 2 -->
    <div style="margin-top: 10px; position: relative; z-index: 10;">
        <!-- YAHAN MAIN CHANGE HAI: onclick="toggleSlideBox(this)" laga diya hai -->
        <button onclick="toggleSlideBox(this)" class="btn rounded-pill py-sm-2 px-sm-5 me-3 animated slideInLeft" style="background-color: #4CAF50; border: none; color: black; font-weight: bold;">Learn More</button>
        <a href="careers.php" class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Explore Careers</a>
    </div>

</div>

<!-- NAYA JAVASCRIPT (Jo copies ko bypass karega) -->
<script>
    // Agar function pehle se nahi bana hai, toh banayenge
    if (typeof window.toggleSlideBox !== 'function') {
        window.toggleSlideBox = function(btn) {
            // Jis button par click hua, uska apna dibba (container) dhundho
            var container = btn.closest('.slide2-container');
            
            // Usi dibbe ke andar ka text aur box dhundho
            var origText = container.querySelector('.originalTextContent2');
            var newBox = container.querySelector('.learnMoreBoxContent2');

            // Agar naya box band hai, toh kholo
            if (newBox.style.display === 'none' || newBox.style.display === '') {
                origText.style.display = 'none';
                newBox.style.display = 'block';
                btn.innerText = 'Go Back';
                btn.style.backgroundColor = '#dc3545';
                btn.style.color = 'white';
            } 
            // Agar khula hai, toh band kardo
            else {
                newBox.style.display = 'none';
                origText.style.display = 'block';
                btn.innerText = 'Learn More';
                btn.style.backgroundColor = '#4CAF50';
                btn.style.color = 'black';
            }
        };
    }
</script>

<div style="height: 115px;"></div>
<!-- ========================================== -->
<!-- SLIDE 2: WHAT DO I WANT TO BECOME (END)    -->
<!-- ========================================== -->
                                    <div style="height: 90px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <!-- ========================================== -->
<!-- MAIN TEXT & LEARN MORE BOX SECTION (FIXED) -->
<!-- ========================================== -->
<div style="margin-top: 425px;min-height: 300px; position: relative; z-index: 10; max-width: 650px;">

    <!-- ORIGINAL TEXT (Color White & Shadow Added) -->
    <div id="originalTextContent" style="transition: opacity 0.5s ease;">
        <h1 class="display-3 text-white mb-4 animated slideInDown" style="font-family: 'AdineKirnberg', cursive; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">What should I <br> choose after 10th?</h1>
        <p class="fs-5 text-white mb-4 pb-2 animated slideInDown" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.5);">Find clarity in your career journey. Whether it's Science, Commerce, or Arts, we guide you to make the right choice for a successful future.</p>
    </div>

    <!-- NAYA BOX (Jo Learn More click karne par aayega) -->
    <div id="learnMoreBoxContent" style="display: none; animation: fadeIn 0.8s;">
        <div class="card card-body text-start" style="background-color: rgba(255, 255, 255, 0.95); border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border: 2px solid #4CAF50; max-height: 320px; overflow-y: auto;">
            <h4 style="color: #4CAF50; font-weight: 600; margin-bottom: 15px;">Confused about what to do next? 🤔</h4>
            <p style="color: #444; font-size: 1rem; line-height: 1.6; margin-bottom: 10px;">
                Choosing the right career path after 10th grade can feel overwhelming. Many students are unsure whether Science, Commerce, or Arts is the best choice for their future. With so many opinions from friends, relatives, and society, making the right decision often becomes confusing.
            </p>
            <p style="color: #444; font-size: 1rem; line-height: 1.6; margin-bottom: 10px;">
                But what if you had a platform that could understand your interests, strengths, passions, and long-term goals before recommending the perfect career path? <strong>That's where GenzDream comes in.</strong>
            </p>
            <p style="color: #444; font-size: 1rem; line-height: 1.6; margin-bottom: 10px;">
                <strong>GenzDream</strong> is an AI-powered career guidance platform designed to help students discover the career that truly matches their personality and potential. Instead of relying on guesswork or pressure from others, GenzDream analyzes your skills, interests, and aspirations to provide personalized recommendations.
            </p>
            <div style="background-color: #e8f5e9; padding: 10px; border-radius: 8px; border-left: 4px solid #4CAF50; margin-bottom: 10px;">
                <p style="color: #2e7d32; font-size: 1rem; font-weight: 600; margin: 0;">
                    Your future is too important to leave to chance. Discover your true potential with GenzDream.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- BUTTONS SECTION -->
<div style="margin-top: 10px; position: relative; z-index: 10;">
    <button id="learnMoreBtn" class="btn rounded-pill py-sm-2 px-sm-5 me-3 animated slideInLeft" style="background-color: #4CAF50; border: none; color: black; font-weight: bold;">Learn More</button>
    <a href="" class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Explore Careers</a>
</div>

<!-- JAVASCRIPT & STYLE ANIMATION -->
<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
<script>
    document.getElementById('learnMoreBtn').addEventListener('click', function(e) {
        e.preventDefault();
        var origText = document.getElementById('originalTextContent');
        var newBox = document.getElementById('learnMoreBoxContent');

        if (newBox.style.display === 'none') {
            origText.style.display = 'none';
            newBox.style.display = 'block';
            this.innerText = 'Go Back';
            this.style.backgroundColor = '#dc3545';
            this.style.color = 'white';
        } else {
            newBox.style.display = 'none';
            origText.style.display = 'block';
            this.innerText = 'Learn More';
            this.style.backgroundColor = '#4CAF50';
            this.style.color = 'black';
        }
    });
</script>

<div style="height: 115px;"></div>
</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Highest Paid Jobs Start (NEW ANIMATED) -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Highest Paid Jobs</h1>
                    <p>Hover to see professionals and click to explore real salary details and career paths.</p>
                </div>
                <div class="row g-4 justify-content-center">
                    <?php
                    // Real Fact-Based Top Jobs Data
                    $top_jobs = [
                        'doc' => [
                            'name' => 'Cardiologist', 'img' => 'img/top_cardiologist.png', 'bg' => 'bg-danger', 'text' => 'text-danger', 'icon' => 'fa-heartbeat',
                            'salary' => '₹15 Lakhs to ₹50+ Lakhs / Year', 
                            'detail' => 'Cardiologists and Surgeons deal with highly critical life-saving procedures. After years of rigorous MBBS, MD, and DM degrees, they command the highest salaries in the medical field globally.',
                            'custom_css' => 'left: -23px; bottom: 20px;' // Adjust here for Cardiologist
                        ],
                        'fin' => [
                            'name' => 'Investment Banker', 'img' => 'img/top_banker.png', 'bg' => 'bg-success', 'text' => 'text-success', 'icon' => 'fa-chart-line',
                            'salary' => '₹12 Lakhs to ₹40+ Lakhs / Year', 
                            'detail' => 'Investment Bankers manage large corporate portfolios, mergers, and IPOs. Usually requiring a top-tier MBA, this high-pressure job offers massive financial rewards and bonuses.',
                            'custom_css' => 'left: -20px; bottom: 20px;' // Adjust here for Banker
                        ],
                        'tech' => [
                            'name' => 'AI / Data Scientist', 'img' => 'img/top_ai.png', 'bg' => 'bg-warning', 'text' => 'text-warning', 'icon' => 'fa-laptop-code',
                            'salary' => '₹10 Lakhs to ₹35+ Lakhs / Year', 
                            'detail' => 'With the AI revolution, Data Scientists are in extreme demand. Experts in Machine Learning, Big Data, and Algorithms are currently the highest-paid professionals in the IT sector.',
                            'custom_css' => 'left: -20px; bottom: 20px;' // Adjust here for Tech
                        ],
                        'av' => [
                            'name' => ' Airline Pilot', 'img' => 'img/top_pilot.png', 'bg' => 'bg-info', 'text' => 'text-info', 'icon' => 'fa-plane',
                            'salary' => '₹18 Lakhs to ₹45+ Lakhs / Year', 
                            'detail' => 'Commercial Airline Pilots hold immense responsibility for hundreds of lives. Obtaining a CPL (Commercial Pilot License) is costly, but the career guarantees a highly lucrative and respected lifestyle.',
                            'custom_css' => 'left: -20px; bottom: 20px;' // Adjust here for Pilot
                        ]
                    ];

                    foreach ($top_jobs as $key => $job) {
                        echo '
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                            <!-- Clickable Card -->
                            <div class="facility-item job-card" onclick="toggleJobDetails(\''.$key.'\')">
                                <!-- Hover Image with Individual Custom CSS -->
                                <img src="'.$job['img'].'" class="job-character" alt="'.$job['name'].'" style="'.$job['custom_css'].'">
                                
                                <div class="facility-icon '.$job['bg'].'">
                                    <span class="'.$job['bg'].'"></span>
                                    <i class="fa '.$job['icon'].' fa-3x text-white position-relative" style="z-index: 2;"></i>
                                    <span class="'.$job['bg'].'"></span>
                                </div>
                                <div class="facility-text '.$job['bg'].'">
                                    <h3 class="'.$job['text'].' mb-3">'.$job['name'].'</h3>
                                    <p class="mb-0">Click to view <br> salary details</p>
                                </div>
                            </div>
                        </div>';
                    }
                    ?>
                </div>

                <!-- Hidden Details Sections (Slide Down on Click) -->
                <div class="row mt-4">
                    <div class="col-12">
                        <?php foreach ($top_jobs as $key => $job): ?>
                        <div id="details-<?php echo $key; ?>" class="job-details-box card shadow-lg border-0 p-4" style="border-left: 5px solid <?php echo ($key == 'doc' ? '#dc3545' : ($key == 'fin' ? '#28a745' : ($key == 'tech' ? '#ffc107' : '#17a2b8'))); ?>;">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h3 class="<?php echo $job['text']; ?>"><i class="fa <?php echo $job['icon']; ?> me-2"></i><?php echo $job['name']; ?></h3>
                                    <p class="fs-5 text-muted mt-3"><?php echo $job['detail']; ?></p>
                                </div>
                                <div class="col-md-4 text-center border-start">
                                    <h5 class="text-secondary mb-2">Average Salary in India</h5>
                                    <h4 class="text-dark fw-bold"><?php echo $job['salary']; ?></h4>
                                    <span class="badge rounded-pill <?php echo $job['bg']; ?> px-3 py-2 mt-2 fs-6 text-white">Highly Recommended</span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
            </div>
        </div>

        <script>
            function toggleJobDetails(jobKey) {
                // Pehle sabhi details boxes ko hide karo
                let allBoxes = document.getElementsByClassName('job-details-box');
                let clickedBox = document.getElementById('details-' + jobKey);
                
                let isCurrentlyVisible = (clickedBox.style.display === 'block');

                for(let i = 0; i < allBoxes.length; i++) {
                    allBoxes[i].style.display = 'none';
                }

                // Agar jo click kiya wo pehle se khula nahi tha, toh use display kar do
                if (!isCurrentlyVisible) {
                    clickedBox.style.display = 'block';
                    // Smooth scroll to the details box
                    clickedBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
        </script>
        <!-- Highest Paid Jobs End -->


        <!-- Top Tech Cities Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Top Tech Cities in India</h1>
                    <p>Discover the highest-paying cities for Technology and IT professionals. Hover for a glimpse and click for salary insights.</p>
                </div>
                <div class="row g-4 justify-content-center">
                    <?php
                    // Top IT Cities Data
                    $top_cities = [
                        'blr' => [
                            'name' => 'Bengaluru', 'img' => 'img/city_bengaluru.png', 'bg' => 'bg-danger', 'text' => 'text-danger', 'icon' => 'fa-city',
                            'salary' => '₹8 Lakhs to ₹35+ Lakhs / Year', 
                            'detail' => 'Known as the Silicon Valley of India, Bengaluru hosts the highest number of tech startups and global MNCs. It offers the highest tech packages in the country.',
                            'custom_css' => 'left: -27px; bottom: 30px;' // Adjust here for Bengaluru
                        ],
                        'hyd' => [
                            'name' => 'Hyderabad', 'img' => 'img/city_hyderabad.png', 'bg' => 'bg-success', 'text' => 'text-success', 'icon' => 'fa-building',
                            'salary' => '₹7.5 Lakhs to ₹30+ Lakhs / Year', 
                            'detail' => 'Home to HITEC City, Hyderabad is rapidly growing as a global tech hub. With massive base offices for top MNCs, the salary growth here is tremendous.',
                            'custom_css' => 'left: -47px; bottom: 18px;' // Adjust here for Hyderabad
                        ],
                        'pune' => [
                            'name' => 'Pune', 'img' => 'img/city_pune.png', 'bg' => 'bg-warning', 'text' => 'text-warning', 'icon' => 'fa-laptop-house',
                            'salary' => '₹6 Lakhs to ₹25+ Lakhs / Year', 
                            'detail' => 'An educational and IT powerhouse, Pune offers great tech opportunities with a better work-life balance. It is a massive hub for Software Development.',
                            'custom_css' => 'left: -25px; bottom: 40px;' // Adjust here for Pune
                        ],
                        'ggn' => [
                            'name' => 'Gurugram', 'img' => 'img/city_gurugram.png', 'bg' => 'bg-info', 'text' => 'text-info', 'icon' => 'fa-network-wired',
                            'salary' => '₹7 Lakhs to ₹28+ Lakhs / Year', 
                            'detail' => 'The corporate hub of North India, Gurugram pays premium salaries for roles in Data Science, Cloud Computing, and Tech Consulting.',
                            'custom_css' => 'left: -55px; bottom: 15px;' // Adjust here for Gurugram
                        ]
                    ];

                    foreach ($top_cities as $key => $city) {
                        echo '
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                            <!-- Clickable Card for City -->
                            <div class="facility-item job-card" onclick="toggleCityDetails(\''.$key.'\')">
                                <!-- Hover Image with Individual Custom CSS -->
                                <img src="'.$city['img'].'" class="job-character" alt="'.$city['name'].'" style="'.$city['custom_css'].'">
                                
                                <div class="facility-icon '.$city['bg'].'">
                                    <span class="'.$city['bg'].'"></span>
                                    <i class="fa '.$city['icon'].' fa-3x text-white position-relative" style="z-index: 2;"></i>
                                    <span class="'.$city['bg'].'"></span>
                                </div>
                                <div class="facility-text '.$city['bg'].'">
                                    <h3 class="'.$city['text'].' mb-3">'.$city['name'].'</h3>
                                    <p class="mb-0">Click to view <br> IT salary data</p>
                                </div>
                            </div>
                        </div>';
                    }
                    ?>
                </div>

                <!-- Hidden City Details Sections (Slide Down on Click) -->
                <div class="row mt-4">
                    <div class="col-12">
                        <?php foreach ($top_cities as $key => $city): ?>
                        <div id="city-details-<?php echo $key; ?>" class="city-details-box card shadow-lg border-0 p-4" style="display:none; border-left: 5px solid <?php echo ($key == 'blr' ? '#dc3545' : ($key == 'hyd' ? '#28a745' : ($key == 'pune' ? '#ffc107' : '#17a2b8'))); ?>; animation: slideDown 0.5s ease-out forwards;">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h3 class="<?php echo $city['text']; ?>"><i class="fa <?php echo $city['icon']; ?> me-2"></i>Tech Careers in <?php echo $city['name']; ?></h3>
                                    <p class="fs-5 text-muted mt-3"><?php echo $city['detail']; ?></p>
                                </div>
                                <div class="col-md-4 text-center border-start">
                                    <h5 class="text-secondary mb-2">Average IT Salary</h5>
                                    <h4 class="text-dark fw-bold"><?php echo $city['salary']; ?></h4>
                                    <span class="badge rounded-pill <?php echo $city['bg']; ?> px-3 py-2 mt-2 fs-6 text-white">Top Destination</span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function toggleCityDetails(cityKey) {
                // Pehle sabhi city details boxes ko hide karo
                let allBoxes = document.getElementsByClassName('city-details-box');
                let clickedBox = document.getElementById('city-details-' + cityKey);
                
                let isCurrentlyVisible = (clickedBox.style.display === 'block');

                for(let i = 0; i < allBoxes.length; i++) {
                    allBoxes[i].style.display = 'none';
                }

                // Agar jo click kiya wo pehle se khula nahi tha, toh use display kar do
                if (!isCurrentlyVisible) {
                    clickedBox.style.display = 'block';
                    // Smooth scroll to the details box
                    clickedBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
        </script>
        <!-- Top Tech Cities End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="mb-4">Empowering Gen Z to Build Their Dream Careers</h1>
                        <p>Choosing the right career path after 10th or 12th grade is one of the most critical decisions in a student's life. However, it often comes with immense confusion, peer pressure, and lack of real-world awareness.</p>
                        <p class="mb-4">At <strong>GenzDream</strong>, we bridge the gap between your passion and reality. Using AI-driven assessments, detailed industry roadmaps, and real salary insights, we guide you to discover the perfect profession that matches your unique skills and ambitions. Stop guessing, and start planning your successful future with us today.</p>
                        <div class="row g-4 align-items-center">
                            <div class="col-sm-6">
                                <a class="btn btn-primary rounded-pill py-3 px-5" href="about.php">Discover Our Story</a>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle flex-shrink-0" src="img/founder.jpg" alt="Founder" style="width: 45px; height: 45px; object-fit: cover;">
                                    <div class="ms-3">
                                        <h6 class="text-primary mb-1">Jasvir Singh</h6>
                                        <small>Founder</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                        <div class="row">
                            <div class="col-12 text-center">
                                <!-- Badi Photo: Main student ya career wali -->
                                <img class="img-fluid w-75 rounded-circle bg-light p-3" src="img/about-main.jpg" alt="Career Planning" style="aspect-ratio: 1/1; object-fit: cover;">
                            </div>
                            <div class="col-6 text-start" style="margin-top: -150px;">
                                <!-- Chhoti Photo 1 -->
                                <img class="img-fluid w-100 rounded-circle bg-light p-3" src="img/about-sub1.jpg" alt="Students" style="aspect-ratio: 1/1; object-fit: cover;">
                            </div>
                            <div class="col-6 text-end" style="margin-top: -150px;">
                                <!-- Chhoti Photo 2 -->
                                <img class="img-fluid w-100 rounded-circle bg-light p-3" src="img/about-sub2.jpg" alt="Mentorship" style="aspect-ratio: 1/1; object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Career Comparison Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Career Salary Comparison</h1>
                    <p>Compare the starting, average, and peak salary potentials across different high-demand industries in India.</p>
                </div>
                <div class="row g-4">
                    <?php
                    // Real Salary Comparison Data (Low, Avg, Highest)
                    $careers = [
                        [
                            'title' => 'Business / Entrepreneur', 'img' => 'img/comp_business.jpg', 'cat' => 'Business & Startups', 'badge' => 'Uncapped',
                            'low' => '₹3-5 L', 'avg' => '₹12-15 L', 'high' => '₹50L - 1Cr+'
                        ],
                        [
                            'title' => 'Software Engineer', 'img' => 'img/comp_engineer.jpg', 'cat' => 'Technology / IT', 'badge' => '9.8/10',
                            'low' => '₹4-6 L', 'avg' => '₹10-14 L', 'high' => '₹40-60L+'
                        ],
                        [
                            'title' => 'Medical Doctor / Surgeon', 'img' => 'img/comp_doctor.jpg', 'cat' => 'Healthcare', 'badge' => '9.5/10',
                            'low' => '₹6-8 L', 'avg' => '₹15-18 L', 'high' => '₹50L - 1Cr'
                        ],
                        [
                            'title' => 'Chartered Accountant', 'img' => 'img/comp_ca.jpg', 'cat' => 'Finance & Accounts', 'badge' => '9.2/10',
                            'low' => '₹5-7 L', 'avg' => '₹11-13 L', 'high' => '₹30-45L+'
                        ],
                        [
                            'title' => 'Digital Marketing Expert', 'img' => 'img/comp_marketing.jpg', 'cat' => 'Marketing & Sales', 'badge' => '8.9/10',
                            'low' => '₹3-4 L', 'avg' => '₹8-10 L', 'high' => '₹25-35L+'
                        ],
                        [
                            'title' => 'UI / UX Product Designer', 'img' => 'img/comp_design.jpg', 'cat' => 'Design & Creative', 'badge' => '9.0/10',
                            'low' => '₹4-5 L', 'avg' => '₹9-12 L', 'high' => '₹30-40L+'
                        ]
                    ];

                    foreach ($careers as $index => $career) {
                        echo '
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="classes-item shadow-sm rounded bg-white overflow-hidden">
                                <div class="bg-light rounded-circle w-75 mx-auto p-3 mt-4">
                                    <img class="img-fluid rounded-circle" src="'.$career['img'].'" alt="'.$career['title'].'" style="aspect-ratio: 1/1; object-fit: cover;">
                                </div>
                                <div class="bg-light rounded p-4 pt-5 mt-n5">
                                    <span class="d-block text-center h3 mt-3 mb-4 text-dark fw-bold">'.$career['title'].'</span>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="d-flex align-items-center">
                                            <div class="ms-1">
                                                <h6 class="text-primary mb-0">'.$career['cat'].'</h6>
                                                <small class="text-muted">Salary Package / Year</small>
                                            </div>
                                        </div>
                                        <span class="bg-primary text-white rounded-pill py-2 px-3 fw-bold">'.$career['badge'].'</span>
                                    </div>
                                    <div class="row g-1 text-center">
                                        <div class="col-4">
                                            <div class="border-top border-3 border-danger pt-2">
                                                <h6 class="text-danger mb-1">Low (Entry)</h6>
                                                <small class="fw-bold text-dark">'.$career['low'].'</small>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="border-top border-3 border-success pt-2">
                                                <h6 class="text-success mb-1">Average</h6>
                                                <small class="fw-bold text-dark">'.$career['avg'].'</small>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="border-top border-3 border-warning pt-2">
                                                <h6 class="text-warning mb-1">Highest</h6>
                                                <small class="fw-bold text-dark">'.$career['high'].'</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- Career Comparison End -->

        <!-- Testimonial Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Thanks For Visiting</h1>
                    <p>Your future is in your hands.</p>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item bg-light rounded p-5">
                        <p class="fs-5">Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" style="width: 90px; height: 90px;">
                            <div class="ps-3">
                                <h3 class="mb-1">Client Name</h3>
                                <span>Profession</span>
                            </div>
                            <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-5">
                        <p class="fs-5">Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" style="width: 90px; height: 90px;">
                            <div class="ps-3">
                                <h3 class="mb-1">Client Name</h3>
                                <span>Profession</span>
                            </div>
                            <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-5">
                        <p class="fs-5">Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" style="width: 90px; height: 90px;">
                            <div class="ps-3">
                                <h3 class="mb-1">Client Name</h3>
                                <span>Profession</span>
                            </div>
                            <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->


<?php
include("footer.php");
?>