<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'header.php'; 
?>

<style>
    /* Shared Visual Styles */
    .branch-item { transition: all 0.5s ease-in-out; margin-bottom: 20px; }
    .branch-card { cursor: pointer; transition: transform 0.3s ease; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: flex-start; }
    .branch-card img { max-height: 120px; object-fit: contain; margin-bottom: 15px; }
    .branch-card h4 { margin-top: auto; font-size: 1.1rem; text-align: center; }
    
    .level2-section { display: none; } /* Sabhi detail sections hide rahenge initially */
    
    /* Animations */
    @keyframes slideInLeft { from { opacity: 0; transform: translateX(-50px); } to { opacity: 1; transform: translateX(0); } }
    @keyframes slideInRight { from { opacity: 0; transform: translateX(50px); } to { opacity: 1; transform: translateX(0); } }
    @keyframes slideUp { from { opacity: 0; transform: translateY(40px); } to { opacity: 1; transform: translateY(0); } }
    
    .animate-left { animation: slideInLeft 1s ease-out forwards; }
    .animate-right { animation: slideInRight 1s ease-out forwards; }
    .animate-up { animation: slideUp 1s ease-out forwards; }

    .roadmap-container { display: flex; align-items: center; justify-content: center; gap: 20px; margin: 40px 0; flex-wrap: wrap; }
    .step-box { text-align: center; }
    .arrow { font-size: 2rem; font-weight: bold; }
    .roadmap-icon { font-size: 2.5rem; margin-bottom: 10px; }
    .salary-connector { border-top: 3px solid #333; width: 50px; margin: 10px auto; }
    
    /* Level 1 Card Hover */
    .cat-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; transition: all 0.3s; }
</style>

<div class="container py-5" style="min-height: 80vh;">
    <!-- HEADING & BACK BUTTON -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <button id="backBtn" class="btn btn-outline-danger px-4 rounded-pill" style="display:none; font-weight: bold;" onclick="location.reload()">
            <i class="fas fa-arrow-left me-2"></i> Go Back
        </button>
        <h1 class="text-center flex-grow-1" style="font-family: 'AdineKirnberg', cursive; font-size: 3.5rem; color: #333;">Explore Careers</h1>
    </div>

    <!-- LEVEL 1: 9 MAIN CATEGORIES -->
    <div id="level1-main">
        <div class="row g-4">
            <?php
            $main_categories = [
                'eng' => ['title' => 'Engineering ⚙️', 'img' => 'img/engineer.png', 'color' => 'primary', 'btn' => 'success'],
                'med' => ['title' => 'Medical 🩺', 'img' => 'img/doctor.png', 'color' => 'success', 'btn' => 'primary'],
                'edu' => ['title' => 'Education 👩‍🏫', 'img' => 'img/teacher.png', 'color' => 'warning', 'btn' => 'info'],
                'bus' => ['title' => 'Business 💼', 'img' => 'img/businessman.png', 'color' => 'secondary', 'btn' => 'dark'],
                'com' => ['title' => 'Commerce 💰', 'img' => 'img/commercer.png', 'color' => 'success', 'btn' => 'warning'],
                'law' => ['title' => 'Law & Judiciary ⚖️', 'img' => 'img/law.png', 'color' => 'dark', 'btn' => 'danger'],
                'des' => ['title' => 'Creative Arts 🎨', 'img' => 'img/art.png', 'color' => 'info', 'btn' => 'primary'],
                'gov' => ['title' => 'Government ✈️', 'img' => 'img/india.png', 'color' => 'danger', 'btn' => 'success'],
                'media' => ['title' => 'Media & Comm 📺', 'img' => 'img/media.png', 'color' => 'primary', 'btn' => 'secondary']
            ];

            foreach($main_categories as $key => $cat) {
                echo '
                <div class="col-md-4">
                    <div class="card h-100 mb-4 shadow-sm border-0 cat-card" onclick="showLevel2(\''.$key.'\')" style="cursor:pointer; background-color: #f8f9fa;">
                        <div class="row g-0 align-items-center h-100 p-2">
                            <div class="col-sm-4 text-center"><img src="'.$cat['img'].'" class="img-fluid" style="max-height: 100px;"></div>
                            <div class="col-sm-8">
                                <div class="card-body text-center p-3">
                                    <h4 class="mb-3">'.$cat['title'].'</h4>
                                    <button class="btn btn-'.$cat['btn'].' rounded-pill px-3 btn-sm">Explore</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>

    <!-- LEVEL 2 & 3: ALL CAREER BRANCHES DYNAMICALLY GENERATED -->
    <?php
    // MASTER DATA ARRAY
    $career_data = [
        'eng' => [
            'title' => 'Which Engineer do you want to become? 🚀', 'theme_color' => '#007bff', 'text_class' => 'text-primary',
            'branches' => [
                'civil' => ['name' => 'Civil Engineer', 'img' => 'img/civil.png', 'college' => 'B.Tech Civil'],
                'cs' => ['name' => 'Computer Science', 'img' => 'img/computerscience.png', 'college' => 'B.Tech CSE'],
                'electrical' => ['name' => 'Electrical Engineer', 'img' => 'img/electrical.png', 'college' => 'B.Tech Electrical'],
                'aerospace' => ['name' => 'Aerospace Eng.', 'img' => 'img/aerospace.png', 'college' => 'B.Tech Aerospace'],
                'cyber' => ['name' => 'Cybersecurity', 'img' => 'img/cybersecurity.png', 'college' => 'B.Tech Cyber Sec'],
                'mechanical' => ['name' => 'Mechanical Eng.', 'img' => 'img/mechanical.png', 'college' => 'B.Tech Mechanical'],
                'biomedical' => ['name' => 'Biomedical Eng.', 'img' => 'img/biomedical.png', 'college' => 'B.Tech Biomedical'],
                'petroleum' => ['name' => 'Petroleum Eng.', 'img' => 'img/petrolium.png', 'college' => 'B.Tech Petroleum'],
                'datascience' => ['name' => 'Data Science', 'img' => 'img/datascience.png', 'college' => 'B.Tech Data Science']
            ]
        ],
        'med' => [
            'title' => 'Which Medical Field do you want to choose? 🩺', 'theme_color' => '#28a745', 'text_class' => 'text-success',
            'branches' => [
                'mbbs' => ['name' => 'General Physician', 'img' => 'img/mbbs.png', 'college' => 'MBBS Degree'],
                'bds' => ['name' => 'Dentist (BDS)', 'img' => 'img/dentist.png', 'college' => 'BDS Degree'],
                'ayurveda' => ['name' => 'Ayurvedic (BAMS)', 'img' => 'img/ayurvedic.png', 'college' => 'BAMS Degree'],
                'cardio' => ['name' => 'Cardiologist', 'img' => 'img/cardiologist.png', 'college' => 'MBBS + MD/DM'],
                'pediatrician' => ['name' => 'Pediatrician', 'img' => 'img/pediatrician.png', 'college' => 'MBBS + MD'],
                'obgyn' => ['name' => 'OB/GYN', 'img' => 'img/ob.png', 'college' => 'MBBS + MS'],
                'ortho' => ['name' => 'Orthopedic Surgeon', 'img' => 'img/orthopedic.png', 'college' => 'MBBS + MS'],
                'oncologist' => ['name' => 'Oncologist', 'img' => 'img/oncologist.png', 'college' => 'MBBS + DM'],
                'psychiatrist' => ['name' => 'Psychiatrist', 'img' => 'img/psychiatrist.png', 'college' => 'MBBS + MD'],
                'dermatologist' => ['name' => 'Dermatologist', 'img' => 'img/dermatologist.png', 'college' => 'MBBS + MD'],
                'radiologist' => ['name' => 'Radiologist', 'img' => 'img/radiologist.png', 'college' => 'MBBS + MD'],
                'bpt' => ['name' => 'Physiotherapist', 'img' => 'img/physiotherapy.png', 'college' => 'BPT Degree']
            ]
        ],
        'edu' => [
            'title' => 'Which Teaching Profession inspires you? 👩‍🏫', 'theme_color' => '#ffc107', 'text_class' => 'text-warning',
            'branches' => [
                'school_teacher' => ['name' => 'School Teacher', 'img' => 'img/teacher.png', 'college' => 'B.Ed / D.Ed'],
                'professor' => ['name' => 'Professor', 'img' => 'img/professor.png', 'college' => 'Master\'s + PhD + NET'],
                'lecturer' => ['name' => 'Lecturer', 'img' => 'img/lecturer.png', 'college' => 'Master\'s Degree'],
                'principal' => ['name' => 'Principal', 'img' => 'img/principal.png', 'college' => 'M.Ed + Experience'],
                'special_educator' => ['name' => 'Special Educator', 'img' => 'img/specialeducator.png', 'college' => 'B.Ed in Special Ed.'],
                'tutor' => ['name' => 'Tutor', 'img' => 'img/tutor.png', 'college' => 'Subject Expertise'],
                'counselor' => ['name' => 'Education Counselor', 'img' => 'img/educationcouncelor.png', 'college' => 'MA in Psychology'],
                'online_edu' => ['name' => 'Online Educator', 'img' => 'img/onlineedu.png', 'college' => 'Digital Tools + Degree']
            ]
        ],
        'bus' => [
            'title' => 'Explore Business & Management Roles 💼', 'theme_color' => '#6c757d', 'text_class' => 'text-secondary',
            'branches' => [
                'business_mgr' => ['name' => 'Business Manager', 'img' => 'img/businessmanager.png', 'college' => 'BBA / MBA'],
                'marketing_mgr' => ['name' => 'Marketing Manager', 'img' => 'img/marketing.png', 'college' => 'MBA in Marketing'],
                'hr_mgr' => ['name' => 'HR Manager', 'img' => 'img/hr.png', 'college' => 'MBA in HR'],
                'operations_mgr' => ['name' => 'Operations Manager', 'img' => 'img/operations.png', 'college' => 'MBA Operations'],
                'business_analyst' => ['name' => 'Business Analyst', 'img' => 'img/businessanalyst.png', 'college' => 'B.Tech / BBA + Analytics'],
                'entrepreneur' => ['name' => 'Entrepreneur', 'img' => 'img/entrepreneur.png', 'college' => 'Idea + Execution'],
                'project_mgr' => ['name' => 'Project Manager', 'img' => 'img/projectmanager.png', 'college' => 'PMP Certification'],
                'product_mgr' => ['name' => 'Product Manager', 'img' => 'img/productmanager.png', 'college' => 'Tech + Management']
            ]
        ],
        'com' => [
            'title' => 'Explore Commerce & Finance Careers 💰', 'theme_color' => '#28a745', 'text_class' => 'text-success',
            'branches' => [
                'ca' => ['name' => 'Chartered Accountant (CA)', 'img' => 'img/ca.png', 'college' => 'ICAI Certification'],
                'cs' => ['name' => 'Company Secretary (CS)', 'img' => 'img/secretary.png', 'college' => 'ICSI Certification'],
                'cma' => ['name' => 'Cost & Mgmt Acc. (CMA)', 'img' => 'img/cma.png', 'college' => 'ICMAI Certification'],
                'accountant' => ['name' => 'Accountant', 'img' => 'img/accountant.png', 'college' => 'B.Com / M.Com'],
                'investment_banker' => ['name' => 'Investment Banker', 'img' => 'img/investment.png', 'college' => 'MBA Finance / CFA'],
                'fin_analyst' => ['name' => 'Financial Analyst', 'img' => 'img/financial.png', 'college' => 'CFA / MBA'],
                'auditor' => ['name' => 'Auditor', 'img' => 'img/auditor.png', 'college' => 'B.Com + Auditing Cert'],
                'tax_consultant' => ['name' => 'Tax Consultant', 'img' => 'img/tax.png', 'college' => 'CA / LLB Taxation']
            ]
        ],
        'law' => [
            'title' => 'Which Legal Profession suits you? ⚖️', 'theme_color' => '#343a40', 'text_class' => 'text-dark',
            'branches' => [
                'lawyer' => ['name' => 'Advocate/Lawyer', 'img' => 'img/lawyer.png', 'college' => 'LLB / BA-LLB'],
                'judge' => ['name' => 'Judge', 'img' => 'img/judge.png', 'college' => 'LLB + PCS(J) Exam'],
                'corp_lawyer' => ['name' => 'Corporate Lawyer', 'img' => 'img/corporate.png', 'college' => 'LLB + Corporate Law'],
                'legal_advisor' => ['name' => 'Legal Advisor', 'img' => 'img/legal.png', 'college' => 'LLB + Experience'],
                'public_prosecutor' => ['name' => 'Public Prosecutor', 'img' => 'img/prosecuter.png', 'college' => 'LLB + Govt Exam'],
                'civil_judge' => ['name' => 'Civil Judge', 'img' => 'img/civill.png', 'college' => 'LLB + Judiciary Exam'],
                'legal_consultant' => ['name' => 'Legal Consultant', 'img' => 'img/legal_cons.png', 'college' => 'LLB / LLM'],
                'ip_lawyer' => ['name' => 'IP Lawyer', 'img' => 'img/ip.png', 'college' => 'LLB + IP Specialization']
            ]
        ],
        'des' => [
            'title' => 'Explore Creative Arts & Design 🎨', 'theme_color' => '#17a2b8', 'text_class' => 'text-info',
            'branches' => [
                'graphic_des' => ['name' => 'Graphic Designer', 'img' => 'img/graphic.png', 'college' => 'B.Des / Diploma'],
                'uiux' => ['name' => 'UI/UX Designer', 'img' => 'img/ui.png', 'college' => 'HCI / Design Degree'],
                'fashion' => ['name' => 'Fashion Designer', 'img' => 'img/fashion.png', 'college' => 'NIFT / B.Des'],
                'interior' => ['name' => 'Interior Designer', 'img' => 'img/interior.png', 'college' => 'B.Sc Interior Design'],
                'animator' => ['name' => 'Animator', 'img' => 'img/animator.png', 'college' => 'B.Sc Animation'],
                'game_des' => ['name' => 'Game Designer', 'img' => 'img/game.png', 'college' => 'Game Design Degree'],
                'product_des' => ['name' => 'Product Designer', 'img' => 'img/product.png', 'college' => 'B.Des (Product)'],
                'multimedia' => ['name' => 'Multimedia Artist', 'img' => 'img/multimedia.png', 'college' => 'BFA / Visual Arts']
            ]
        ],
        'gov' => [
            'title' => 'Serve the Nation: Govt Services ✈️', 'theme_color' => '#dc3545', 'text_class' => 'text-danger',
            'branches' => [
                'ias' => ['name' => 'IAS Officer', 'img' => 'img/ias.png', 'college' => 'Any Degree + UPSC CSE'],
                'ips' => ['name' => 'IPS Officer', 'img' => 'img/ips.png', 'college' => 'Any Degree + UPSC CSE'],
                'ifs' => ['name' => 'IFS Officer', 'img' => 'img/ifs.png', 'college' => 'Any Degree + UPSC CSE'],
                'army' => ['name' => 'Army Officer', 'img' => 'img/army.png', 'college' => 'NDA / CDS Exam'],
                'navy' => ['name' => 'Navy Officer', 'img' => 'img/navy.png', 'college' => 'NDA / B.Tech + INET'],
                'airforce' => ['name' => 'Air Force Officer', 'img' => 'img/air.png', 'college' => 'NDA / AFCAT'],
                'police' => ['name' => 'Police Officer', 'img' => 'img/police.png', 'college' => 'State Police Exams'],
                'bank_po' => ['name' => 'Bank PO', 'img' => 'img/bankpo.png', 'college' => 'Any Degree + IBPS/SBI PO']
            ]
        ],
        'media' => [
            'title' => 'Explore Media & Communication 📺', 'theme_color' => '#007bff', 'text_class' => 'text-primary',
            'branches' => [
                'journalist' => ['name' => 'Journalist', 'img' => 'img/journalist.png', 'college' => 'B.A. Mass Comm'],
                'anchor' => ['name' => 'News Anchor', 'img' => 'img/anchor.png', 'college' => 'Journalism Degree'],
                'creator' => ['name' => 'Content Creator', 'img' => 'img/content.png', 'college' => 'Skills + Creativity'],
                'digital_mkt' => ['name' => 'Digital Marketer', 'img' => 'img/digitalmarketer.png', 'college' => 'BBA / Certifications'],
                'pr_mgr' => ['name' => 'PR Manager', 'img' => 'img/pr.png', 'college' => 'Public Relations Degree'],
                'director' => ['name' => 'Film Director', 'img' => 'img/director.png', 'college' => 'Film School Degree'],
                'video_editor' => ['name' => 'Video Editor', 'img' => 'img/video.png', 'college' => 'Multimedia Course'],
                'social_media' => ['name' => 'Social Media Mgr', 'img' => 'img/social.png', 'college' => 'Digital Mkt Course']
            ]
        ]
    ];

    // GENERATE SEPARATE HTML BLOCKS FOR EACH CATEGORY (Keeps them completely decoupled as requested)
    foreach ($career_data as $cat_key => $cat_data) {
        $theme = $cat_data['theme_color'];
        $text_cls = $cat_data['text_class'];
        
        echo '<div id="level2-'.$cat_key.'" class="level2-section mt-5">';
        echo '<h3 id="title-'.$cat_key.'" class="mb-5 text-center">'.$cat_data['title'].'</h3>';
        
        // Branches Row
        echo '<div class="row g-4 justify-content-center">';
        foreach ($cat_data['branches'] as $branch_key => $b) {
            echo '<div class="col-lg-3 col-md-4 col-sm-6 branch-item item-'.$cat_key.'" id="card-'.$cat_key.'-'.$branch_key.'">
                    <div class="card shadow-sm border-0 branch-card text-center p-3" onclick="focusBranch(\''.$cat_key.'\', \''.$branch_key.'\', \''.addslashes($b['name']).'\', \''.$theme.'\')">
                        <img src="'.$b['img'].'" class="img-fluid" onerror="this.src=\'img/engineer.png\'"> <!-- Fallback Image -->
                        <h4>'.$b['name'].'</h4>
                    </div>
                  </div>';
        }
        echo '</div>'; // End Branches Row

        // Details Section for each branch in this category
        foreach ($cat_data['branches'] as $branch_key => $b) {
            echo '<div id="details-'.$cat_key.'-'.$branch_key.'" class="details-container-'.$cat_key.' mt-5" style="display:none;">
                    <div class="row align-items-center mb-5">
                        <div class="col-md-6 animate-left text-center"><img src="'.$b['img'].'" class="img-fluid rounded shadow" style="max-width: 80%;" onerror="this.src=\'img/engineer.png\'"></div>
                        <div class="col-md-6 animate-right">
                            <p class="fs-5 text-muted">A career as a '.$b['name'].' requires dedication, skill-building, and specific educational qualifications. It is a highly rewarding path with excellent growth opportunities in modern industries.</p>
                        </div>
                    </div>
                    
                    <div class="p-5 shadow-lg rounded-3 border-top border-5 bg-white animate-up" style="border-color: '.$theme.' !important;">
                        <h3 class="text-center mb-5 fw-bold" style="color: '.$theme.';">Roadmap to '.$b['name'].' 🎓</h3>
                        <div class="roadmap-container">
                            <div class="step-box"><i class="fas fa-school roadmap-icon" style="color: '.$theme.';"></i><h5>10th</h5><p style="font-size:0.8rem;">Build Basic Foundation</p></div>
                            <div class="arrow" style="color: '.$theme.';">➜</div>
                            <div class="step-box"><i class="fas fa-book-open roadmap-icon" style="color: '.$theme.';"></i><h5>11-12th</h5><p>Choose Relevant Stream</p></div>
                            <div class="arrow" style="color: '.$theme.';">➜</div>
                            <div class="step-box"><i class="fas fa-graduation-cap roadmap-icon" style="color: '.$theme.';"></i><h5>Higher Ed.</h5><p>'.$b['college'].'</p></div>
                        </div>
                        
                        <h3 class="text-center mt-5 mb-4">Average Salary Details 💰</h3>
                        <div class="row text-center">
                            <div class="col-md-4"><div class="salary-connector" style="border-color: '.$theme.';"></div><h5>Starting</h5><p>₹4-8 LPA</p></div>
                            <div class="col-md-4"><div class="salary-connector" style="border-color: '.$theme.';"></div><h5>Mid-Level</h5><p>₹8-15 LPA</p></div>
                            <div class="col-md-4"><div class="salary-connector" style="border-color: '.$theme.';"></div><h5>Senior/Expert</h5><p>₹15-30+ LPA</p></div>
                        </div>
                    </div>
                  </div>';
        }
        
        echo '</div>'; // End Level 2 Section
    }
    ?>

</div>

<script>
    // Show specific category Level 2
    function showLevel2(categoryKey) {
        document.getElementById('level1-main').style.display = 'none';
        document.getElementById('backBtn').style.display = 'inline-block';
        
        // Hide all Level 2 sections first
        let allSections = document.getElementsByClassName('level2-section');
        for(let i=0; i<allSections.length; i++) {
            allSections[i].style.display = 'none';
        }
        
        // Show only the selected category
        document.getElementById('level2-' + categoryKey).style.display = 'block';
    }

    // Smart function to handle branch clicks independently based on Category Prefix
    function focusBranch(catKey, branchKey, branchName, themeColor) {
        // Change title
        document.getElementById('title-' + catKey).innerText = "Selected Field: " + branchName;
        
        // Hide all other cards in this specific category, expand the clicked one
        let branches = document.getElementsByClassName('item-' + catKey);
        for(let i=0; i<branches.length; i++) { 
            let card = branches[i].querySelector('.branch-card');
            if(branches[i].id !== 'card-' + catKey + '-' + branchKey) {
                branches[i].style.display = 'none'; 
            } else {
                branches[i].className = 'col-md-12 branch-item item-' + catKey; 
                card.style.border = '2px solid ' + themeColor;
            }
        }
        
        // Hide all detail containers of THIS category
        let allDetails = document.getElementsByClassName('details-container-' + catKey);
        for(let i=0; i<allDetails.length; i++) {
            allDetails[i].style.display = 'none';
        }
        
        // Show the specific detail container
        document.getElementById('details-' + catKey + '-' + branchKey).style.display = 'block';
        
        // Scroll down smoothly
        window.scrollTo({ top: 250, behavior: 'smooth' });
    }
</script>

<?php include 'footer.php'; ?>