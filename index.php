<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['send'])){
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $subject = htmlentities($_POST['subject']);
    $message = htmlentities($_POST['message']);

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ptravyy@gmail.com'; // Your G-Mail Address
        $mail->Password = 'cctrenzylubjwpwq'; // Your Gmail Password or App Password
        $mail->Port = 587; // Use 587 for TLS or 465 for SSL
        $mail->SMTPSecure = 'tls'; // Use 'tls' or 'ssl'
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress('ptravyy@gmail.com');
        $mail->Subject = "$email ($subject)";
        $mail->Body = $message;
        $mail->send();
        header("Location: index.php?email_sent=1"); // Change 'contact.php' to 'index.php'
        exit(); // Make sure to exit after header redirection
    } catch (Exception $e) {
        echo "Pesan tidak dapat dikirim!. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Rovy Saputra Nugeraha Profile Web. Let's interact with him....">
    <meta name="author" content="Devcrud">
    <title>Rovy Saputra Nugeraha</title>
    <!-- Favicon -->
    <link href="gambar/logo.png" rel="icon">
    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + JohnDoe main styles -->
	<link rel="stylesheet" href="assets/css/johndoe.css">
    <style>
    /* CSS untuk mengatur tata letak spinner dan teks */
    .spinner-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: rgba(255, 255, 255, 0.8); /* Warna latar belakang dengan kejelasan 80% */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
    }

    .spinner {
        /* Gaya spinner Anda */
        border: 5px solid #f3f3f3; /* Warna latar belakang dari spinner */
        border-top: 5px solid #c99314; /* Warna atas dari spinner */
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
        margin-bottom: 10px; /* Jarak antara spinner dan teks */
    }

    .loading-text {
        /* Gaya teks Loading */
        font-size: 1.5em; /* Ukuran teks */
        color:#c99314; /* Warna teks sesuaikan dengan warna spinner */
        text-align: center; /* Pusatkan teks */
    }

    /* Animasi putaran spinner */
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

</head>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    <div class="spinner-container" id="spinnerContainer">
        <div class="spinner"></div>
        <p class="loading-text">Loading...</p>
    </div>

    <!-- jQuery (diperlukan untuk Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Kode JavaScript untuk menghilangkan spinner setelah halaman dimuat -->
    <script>
        // Hapus spinner dan teks setelah halaman dimuat
        $(document).ready(function(){
            setTimeout(function(){
                $("#spinnerContainer").fadeOut(1000); // Menghilangkan spinner dalam waktu 1 detik (1000 milidetik)
            }, 2000); // Setelah 2 detik, hapus spinner dan teks
        });
    </script>
    <a href="https://www.linkedin.com/in/rovy-saputra-nugeraha-a54195292/" class="btn btn-primary btn-component" data-spy="affix" data-offset-top="600"><i class="ti-shift-left-alt"></i> Portofolio ||</a>
    <header class="header">
        <div class="container">
            <ul class="social-icons pt-3">
                <li class="social-item"><a class="social-link text-light" href="https://www.facebook.com/rovy.saputra.14"><i class="ti-facebook" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link text-light" href="https://twitter.com/ptra_vy"><i class="ti-twitter" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link text-light" href="https://www.linkedin.com/in/rovy-saputra-nugeraha-a54195292/"><i class="ti-linkedin" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link text-light" href="https://instagram.com/ptra.vy"><i class="ti-instagram" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link text-light" href="https://github.com/rovy-saputra-nugeraha"><i class="ti-github" aria-hidden="true"></i></a></li>
            </ul>  
            <div class="header-content">
                <h4 class="header-subtitle" >Hello, I am</h4>
                <h1 class="header-title">Rovy Saputra</h1>
                <h1 class="header-title">Nugeraha</h1>
                <h6 class="header-mono" >Junior Frond end Designer | Developer</h6>
                <button class="btn btn-primary btn-rounded" onclick="printResume()"><i class="ti-printer pr-2"></i>Print Resume</button>
                <!-- Script File pdf -->
                <script>
                    function printResume() {
                        // Gantilah 'nama_file_resume.pdf' dengan URL atau path file PDF Anda
                        var pdfUrl = 'PDF/CV.pdf';

                        // Buka file PDF dalam jendela baru
                        var newWindow = window.open(pdfUrl, '_blank');

                        // Tunggu file PDF selesai dimuat sebelum mencetak
                        newWindow.onload = function () {
                            newWindow.print();
                        };
                    }
                </script>
            </div>
        </div>
    </header>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white" data-spy="affix" data-offset-top="510">
        <div class="container">
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse mt-sm-20 navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="#home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#resume" class="nav-link">Resume</a>
                    </li>
                    <li class="nav-item">
                        <a href="#freelance" class="nav-link">Free Lance</a>
                    </li>
                </ul>
                <ul class="navbar-nav brand">
                    <img src="assets/imgs/rovy.jpg" alt="" class="brand-img">
                    <li class="brand-txt">
                        <h5 class="brand-title">Rovy Saputra Nugeraha</h5>
                        <div class="brand-subtitle">Web Programming | Developer</div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#portfolio" class="nav-link">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a href="#prestasi" class="nav-link">Certificate</a>
                    </li>
                    <li class="nav-item">
                        <a href="#blog" class="nav-link">Blog</a>
                    </li>
                    <li class="nav-item last-item">
                        <a href="#contact" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div id="about" class="row about-section">
            <div class="col-lg-4 about-card">
                <h3 class="font-weight-light">Who am I ?</h3>
                <span class="line mb-5"></span>
                <h5 class="mb-3"><p align="justify">Hello, I am Rovy Saputra Nugeraha, Information Engineering Student at Raja Ali Haji Maritime University (UMRAH). As a junior developer, I will continue to learn from all the activities I have carried out so far, with the aim of becoming someone who is able to compete in the world of work.</p>
                <button class="btn btn-outline-danger" onclick="printCV()"><i class="icon-down-circled2 "></i>Download My CV</button>
                <!-- Script CV pdf -->
                <script>
                    function printCV() {
                        // Gantilah 'nama_file_resume.pdf' dengan URL atau path file PDF Anda
                        var pdfUrl = 'PDF/CV.pdf';

                        // Buka file PDF dalam jendela baru
                        var newWindow = window.open(pdfUrl, '_blank');
                    }
                </script>
               
            </div>
            <div class="col-lg-4 about-card">
                <h3 class="font-weight-light">Personal Info</h3>
                <span class="line mb-5"></span>
                <ul class="mt40 info list-unstyled">
                    <li><span>Birthdate</span> : October 10, 2002</li>
                    <li><span>Email</span> : ptravyy@gmail.com</li>
                    <li><span>Phone</span> : +62 81261461477</li>
                    <li><span>Website</span> : www.ptravy.com </li>
                    <li><span>Address</span> :  Tanjungpinang City</li>
                </ul>
                <ul class="social-icons pt-3">
                    <li class="social-item"><a class="social-link" href="https://www.facebook.com/rovy.saputra.14"><i class="ti-facebook" aria-hidden="true"></i></a></li>
                    <li class="social-item"><a class="social-link" href="https://twitter.com/ptra_vy"><i class="ti-twitter" aria-hidden="true"></i></a></li>
                    <li class="social-item"><a class="social-link" href="https://www.linkedin.com/in/rovy-saputra-nugeraha-a54195292/"><i class="ti-linkedin" aria-hidden="true"></i></a></li>
                    <li class="social-item"><a class="social-link" href="https://instagram.com/ptra.vy"><i class="ti-instagram" aria-hidden="true"></i></a></li>
                    <li class="social-item"><a class="social-link" href="https://github.com/rovy-saputra-nugeraha"><i class="ti-github" aria-hidden="true"></i></a></li>
                </ul>  
            </div>
            <div class="col-lg-4 about-card">
                <h3 class="font-weight-light">My Expertise</h3>
                <span class="line mb-5"></span>
                <div class="row">
                    <div class="col-1 text-danger pt-1"><i class="ti-widget icon-lg"></i></div>
                    <div class="col-10 ml-auto mr-3">
                        <h6>UI/UX Design</h6>
                        <p class="subtitle">Junior UI/UX Design Developer</p>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 text-danger pt-1"><i class="ti-html5 icon-lg"></i></div>
                    <div class="col-10 ml-auto mr-3">
                        <h6>Web Development</h6>
                        <p class="subtitle">Junior Web Developer</p>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 text-danger pt-1"><i class="ti-stats-up icon-lg"></i></div>
                    <div class="col-10 ml-auto mr-3">
                        <h6>Digital Marketing</h6>
                        <p class="subtitle">Digital Marketing Junior Developer</p>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 text-danger pt-1"><i class="ti-android icon-lg"></i></div>
                    <div class="col-10 ml-auto mr-3">
                        <h6>Mobile Programming</h6>
                        <p class="subtitle">Junior Mobile Programming</p>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 text-danger pt-1"><i class="ti-stack-overflow icon-lg"></i></div>
                    <div class="col-10 ml-auto mr-3">
                        <h6>Junior Programming</h6>
                        <p class="subtitle">Junior Programming</p>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 text-danger pt-1"><i class="ti-stats-down icon-lg"></i></div>
                    <div class="col-10 ml-auto mr-3">
                        <h6>Data Analysis</h6>
                        <p class="subtitle">Data Analysis Junior Developer</p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Resume Section-->
    <section class="section" id="resume">
        <div class="container">
            <h1 class="mb-5"><span class="text-danger">My</span> Resume</h1>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                       <div class="card-header">
                            <div class="mt-2">
                                <h4>Expertise</h4>
                                <span class="line"></span>  
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="title text-danger">2023 - Present</h6>
                            <P>Data Analysis</P>
                            <P class="subtitle">In various studies that I have carried out, I have carried out research related to problems faced by an agency, where in this case I carried out data analysis needed to solve these problems. In this case, I encountered a problem related to estimating drug stock in pharmacies, how existing drugs remain available without experiencing stock shortages.</P>
                            <hr>
                            <h6 class="title text-danger">2022 - 2023</h6>
                            <P>Web Developer</P>
                            <P class="subtitle">Being part of technological advances made me learn how to create a system that can be used by many people and can provide benefits, various types of systems that I have built such as Employee Information Systems, Ferry Ticket Ordering, New Student Registration, Pharmacy Information Systems and Systems Information about Raja Ali Haji Maritime University.</P>
                            <hr>
                            <h6 class="title text-danger">2021 - 2022</h6>
                            <P>Programmer</P>
                            <P class="subtitle">As an information engineering student, I learned how to become a programmer. I learned to create program code that can be used for several purposes using the C++, C and Python programming languages.</P>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                       <div class="card-header">
                            <div class="mt-2">
                                <h4>Education</h4>
                                <span class="line"></span>  
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="title text-danger">2021 - Present</h6>
                            <P>Bachelor 1 in Informatics Engineering</P>
                            <P class="subtitle">Being part of the undergraduate students of information engineering at Raja Ali Haji Maritime University, made me a young programmer who is creative and has integrity.</P>
                            <hr>
                            <h6 class="title text-danger">2018 - 2021</h6>
                            <P>Lingga 1 State High School</P>
                            <P class="subtitle">Being part of the students at SMA Negeri 1 Lingga makes me want to continue to progress and develop into a better person.</P>
                            <hr>
                            <h6 class="title text-danger">2016 - 2018</h6>
                            <P>Lingga 1 State Junior High School</P>
                            <P class="subtitle">Becoming a student at SMP Negeri 1 Lingga was the beginning of my search for identity in the ever-growing world of education. Becoming an outstanding student is a dream for all students who are currently studying.</P>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                       <div class="card-header">
                            <div class="pull-left">
                                <h4 class="mt-2">Skills</h4>
                                <span class="line"></span>  
                            </div>
                        </div>
                        <div class="card-body pb-2">
                           <h6>HTML 5 &amp; CSS3</h6>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h6>SQL</h6>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h6>PHP</h6>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 60%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h6>JavaScript</h6>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h6>Python</h6>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h6>C</h6>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                       <div class="card-header">
                            <div class="pull-left">
                                <h4 class="mt-2">Languages</h4>
                                <span class="line"></span>  
                            </div>
                        </div>
                        <div class="card-body pb-2">
                            <h6>Indonesian</h6>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h6>Melayu</h6>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h6>English</h6>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h6>Mandarin</h6>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 2%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-dark text-center">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6 col-lg-3">
                    <div class="row ">
                        <div class="col-5 text-right text-light border-right py-3">
                            <div class="m-auto"><i class="ti-alarm-clock icon-xl"></i></div>
                        </div>
                        <div class="col-7 text-left py-3">
                            <h1 class="text-danger font-weight-bold font40">200</h1>
                            <p class="text-light mb-1">Hours Worked</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-5 text-right text-light border-right py-3">
                            <div class="m-auto"><i class="ti-layers-alt icon-xl"></i></div>
                        </div>
                        <div class="col-7 text-left py-3">
                            <h1 class="text-danger font-weight-bold font40">15</h1>
                            <p class="text-light mb-1">Project Finished</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-5 text-right text-light border-right py-3">
                            <div class="m-auto"><i class="ti-face-smile icon-xl"></i></div>
                        </div>
                        <div class="col-7 text-left py-3">
                            <h1 class="text-danger font-weight-bold font40">20</h1>
                            <p class="text-light mb-1">Happy Clients</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-5 text-right text-light border-right py-3">
                            <div class="m-auto"><i class="ti-heart-broken icon-xl"></i></div>
                        </div>
                        <div class="col-7 text-left py-3">
                            <h1 class="text-danger font-weight-bold font40">15k</h1>
                            <p class="text-light mb-1">Coffee Drinked</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="service">
        <div class="container">
            <h1 class="mb-5 pb-4"><span class="text-danger">My</span> Services</h1>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="card mb-5">
                       <div class="card-header has-icon">
                            <i class="ti-alert text-danger" aria-hidden="true"></i>
                        </div>
                        <div class="card-body px-4 py-3">
                            <h5 class="mb-3 card-title text-dark">Bug Solutions</h5>
                            <P class="subtitle">Trying to solve bug problems and looking for solutions that can be used to overcome problems in an information system.</P>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card mb-5">
                       <div class="card-header has-icon">
                            <i class="ti-world text-danger" aria-hidden="true"></i>
                        </div>
                        <div class="card-body px-4 py-3">
                            <h5 class="mb-3 card-title text-dark">Web Designer</h5>
                            <P class="subtitle">Designing web-based information systems. By using a framework that can make it easier for clients to get the desired system.</P>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card mb-5">
                       <div class="card-header has-icon">
                            <i class="ti-stats-up text-danger" aria-hidden="true"></i>
                        </div>
                        <div class="card-body px-4 py-3">
                            <h5 class="mb-3 card-title text-dark">Data Analysis</h5>
                            <P class="subtitle">Try to solve problems related to data and try to help solve them quickly, of course with satisfactory service.</P>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card mb-5">
                       <div class="card-header has-icon">
                            <i class="ti-bar-chart text-danger" aria-hidden="true"></i>
                        </div>
                        <div class="card-body px-4 py-3">
                            <h5 class="mb-3 card-title text-dark">Accounting</h5>
                            <P class="subtitle">Perform calculations with an accounting system to analyze data quickly and efficiently.</P>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card mb-5">
                       <div class="card-header has-icon">
                            <i class="ti-android text-danger" aria-hidden="true"></i>
                        </div>
                        <div class="card-body px-4 py-3">
                            <h5 class="mb-3 card-title text-dark">Mobile Programing</h5>
                            <P class="subtitle">Designing mobile systems for interaction with users.</P>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card mb-5">
                       <div class="card-header has-icon">
                            <i class="ti-jsfiddle text-danger" aria-hidden="true"></i>
                        </div>
                        <div class="card-body px-4 py-3">
                            <h5 class="mb-3 card-title text-dark">Cyber Security</h5>
                            <P class="subtitle">Trying to overcome information system security quickly and safely.</P>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <div class="container" align="center" id="freelance">
            <h1 class="mb-5 pb-4"><span class="text-danger">Need</span> Help?</h1>
        </div>

    <section class="section bg-dark py-5">
        <div class="container text-center">
            <h1 class="text-light mb-2 font-weight-normal">I Am Available For Free Lance</h1>
            <button class="btn bg-primary w-lg" onclick="window.location.href='https://wa.me/6281261461477'">Hire me</button>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="section bg-custom-gray" id="portfolio">
        <div class="container">
            <h1 class="mb-5"><span class="text-danger">My</span> Portfolio</h1>
            <div class="portfolio">
                <div class="filters">
                    <a href="#" data-filter=".new" class="active">
                        New
                    </a>
                    <a href="#" data-filter=".advertising">
                        Project
                    </a>
                    <a href="#" data-filter=".branding">
                        Branding
                    </a>
                    <a href="#" data-filter=".web">
                        Web
                    </a>
                </div>
                <div class="portfolio-container"> 
                    <div class="col-md-10 col-lg-4 web new">
                        <div class="portfolio-item">
                            <img src="gambar/webumrah.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">
                            <div class="content-holder">
                                <a class="img-popup" href="gambar/webumrah.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">WEB</h6>
                                    <p class="subtitle">Raja Ali Haji Maritime University.</p>

                                </div>
                            </div>   
                        </div>             
                    </div>
                    <div class="col-md-6 col-lg-4 web new">
                        <div class="portfolio-item">
                            <img src="gambar/chat.png" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">
                            <div class="content-holder">
                                <a class="img-popup" href="gambar/chat.png"></a>
                                <div class="text-holder">
                                    <h6 class="title">WEB</h6>
                                    <p class="subtitle">Chat Client Server.</p>
                                </div>
                            </div> 
                        </div>                         
                    </div>
                    <div class="col-md-6 col-lg-4 advertising new">
                        <div class="portfolio-item">
                            <img src="gambar/spl.png" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">                         
                            <div class="content-holder">
                                <a class="img-popup" href="gambar/spl.png"></a>
                                <div class="text-holder">
                                    <h6 class="title">PROJECT</h6>
                                    <p class="subtitle">System of Linear Equations.</p>
                                </div>
                            </div>    
                        </div>              
                    </div> 
                    <div class="col-md-6 col-lg-4 web">
                        <div class="portfolio-item">
                            <img src="gambar/apotik.png" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">
                            <div class="content-holder">
                                <a class="img-popup" href="gambar/apotik.png"></a>
                                <div class="text-holder">
                                    <h6 class="title">WEB</h6>
                                    <p class="subtitle">Prediction of Drug Stock in a Pharmacy.</p>
                                </div>
                            </div>
                        </div>                                                     
                    </div>

                    <div class="col-md-6 col-lg-4 advertising"> 
                        <div class="portfolio-item">
                            <img src="gambar/ferry.png" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">                               
                            <div class="content-holder">
                                <a class="img-popup" href="gambar/ferry.png"></a>
                                <div class="text-holder">
                                    <h6 class="title">PROJECT</h6>
                                    <p class="subtitle">Ferry Ticket Reservation.</p>
                                </div>
                            </div>
                        </div>                                                       
                    </div> 
                    <div class="col-md-6 col-lg-4 web new">
                        <div class="portfolio-item">
                            <img src="gambar/websd.png" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">  
                           <div class="content-holder">
                                <a class="img-popup" href="gambar/websd.png"></a>
                                <div class="text-holder">
                                    <h6 class="title">WEB</h6>
                                    <p class="subtitle">Re-registration of New Students.</p>
                                </div>
                            </div>
                        </div>                                                     
                    </div>
                    <div class="col-md-6 col-lg-4 advertising new">
                        <div class="portfolio-item">
                            <img src="gambar/simpeg.JPG" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">       
                           <div class="content-holder">
                                <a class="img-popup" href="gambar/simpeg.JPG"></a>
                                <div class="text-holder">
                                    <h6 class="title">PROJECT</h6>
                                    <p class="subtitle">Human Resources Information System.</p>
                                </div>
                            </div>
                        </div>                                                       
                    </div> 
                    
                    <div class="col-md-6 col-lg-4 advertising new"> 
                        <div class="portfolio-item">
                            <img src="gambar/login.png" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">            
                            <div class="content-holder">
                                <a class="img-popup" href="gambar/login.png"></a>
                                <div class="text-holder">
                                    <h6 class="title">PROJECT</h6>
                                    <p class="subtitle">Account Login System.</p>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-6 col-lg-4 branding new">
                        <div class="portfolio-item">
                            <img src="gambar/informasi.png" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">                        
                            <div class="content-holder">
                                <a class="img-popup" href="gambar/informasi.png"></a>
                                <div class="text-holder">
                                    <h6 class="title">BRANDING</h6>
                                    <p class="subtitle">Sistem Informasi UMRAH.</p>
                                </div>
                            </div> 
                        </div>
                    </div> 
                    <div class="col-md-6 col-lg-4 branding">
                        <div class="portfolio-item">
                            <img src="gambar/code.png" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">  
                            <div class="content-holder">
                                <a class="img-popup" href="gambar/code.png"></a>
                                <div class="text-holder">
                                    <h6 class="title">BRANDING</h6>
                                    <p class="subtitle">Jagoan Code.</p>
                                </div>
                            </div>
                        </div>                                                     
                    </div> 
                    
                    <div class="col-md-6 col-lg-4 branding new">
                        <div class="portfolio-item">
                            <img src="gambar/kampusmerdeka.png" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">   
                            <div class="content-holder">
                                <a class="img-popup" href="gambar/kampusmerdeka.png"></a>
                                <div class="text-holder">
                                    <h6 class="title">BRANDING</h6>
                                    <p class="subtitle">Kampus Merdeka.</p>
                                </div>
                            </div>
                        </div>                                                    
                    </div> 
                    <div class="col-md-6 col-lg-4 branding">
                        <div class="portfolio-item">
                            <img src="gambar/github.png" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">                      
                            <div class="content-holder">
                                <a class="img-popup" href="gambar/github.png"></a>
                                <div class="text-holder">
                                    <h6 class="title">BRANDING</h6>
                                    <p class="subtitle">Sosial Media</p>
                                </div>
                            </div>
                        </div>                                                      
                    </div> 
                    <div class="col-md-6 col-lg-4 branding">
                        <div class="portfolio-item">
                            <img src="gambar/analisis.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">          
                            <div class="content-holder">
                                <a class="img-popup" href="gambar/analisis.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">BRANDING</h6>
                                    <p class="subtitle">Analisis Data</p>
                                </div>
                            </div>
                        </div>                                                   
                    </div>
                </div> 
            </div>  
        </div>            
    </section>
    <!-- End of portfolio section -->

     <!-- Sertifikat -->
     <section class="section" id="prestasi">
        <div class="container">
            <h2 class="mb-5">Certificate of <span class="text-danger">Appreciation </span></h2>
            <div class="row">
                <div class="blog-card">
                    <div class="img-holder">
                        <img src="gambar/gemastik.png" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                    </div>
                    <div class="content-holder">
                        <h6 class="title">GEMASTIK XV</h6>

                        <p class="post-details">
                            <a href="#">By: ptravy</a>
                            <a href="#"><i class="ti-heart text-danger"></i> 50</a>
                            <a href="#"><i class="ti-comment"></i> 3</a>
                        </p>
                        
                        <p>EVENT 2022 National Student Achievements in the ICT Field About GEMASTIK XV. GEMASTIK or National Student Show for Information and Communication Technology, is a program of the National Achievement Center of the Ministry of Education, Culture, Research and Technology.</p>
                        <button class="btn btn-outline-danger" onclick="printGemas()"><i class="icon-down-circled2 "></i>Download Certificate</button>
                        <!-- Script CV pdf -->
                        <script>
                            function printGemas() {
                                // Gantilah 'nama_file_resume.pdf' dengan URL atau path file PDF Anda
                                var pdfUrl = 'PDF/Gemas.pdf';

                                // Buka file PDF dalam jendela baru
                                var newWindow = window.open(pdfUrl, '_blank');
                            }
                        </script>
                        <a href="https://gemastik.ub.ac.id/#:~:text=EVENT%20Pagelaran%20Mahasiswa%20Nasional%20Bidang,Kebudayaan%2C%20Riset%2C%20dan%20Teknologi." class="read-more">Read more<i class="ti-angle-double-right"></i></a>
                    </div>
                </div><!-- end of blog wrapper -->
            </div>
            <div class="row">
                <div class="blog-card">
                    <div class="img-holder">
                        <img src="gambar/react.png" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                    </div>
                    <div class="content-holder">
                        <h6 class="title">REACT JS AT DEACOURSE</h6>

                        <p class="post-details">
                            <a href="#">By: ptravy</a>
                            <a href="#"><i class="ti-heart text-danger"></i> 50</a>
                            <a href="#"><i class="ti-comment"></i> 3</a>
                        </p>
                        
                        <p>Learn React Js with an experienced mentor and with his guidance to become a developer who can make maximum contributions. with Dea to train React Js skills.</p>
                        <button class="btn btn-outline-danger" onclick="printReact()"><i class="icon-down-circled2 "></i>Download Certificate</button>
                        <!-- Script CV pdf -->
                        <script>
                            function printReact() {
                                // Gantilah 'nama_file_resume.pdf' dengan URL atau path file PDF Anda
                                var pdfUrl = 'PDF/REACT.pdf';

                                // Buka file PDF dalam jendela baru
                                var newWindow = window.open(pdfUrl, '_blank');
                            }
                        </script>
                        <a href="#" class="read-more">Read more<i class="ti-angle-double-right"></i></a>
                    </div>
                </div><!-- end of blog wrapper -->
            </div>
            <div class="row">
                <div class="blog-card">
                    <div class="img-holder">
                        <img src="gambar/uiux.png" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                    </div>
                    <div class="content-holder">
                        <h6 class="title">Learning UX for Beginners</h6>

                        <p class="post-details">
                            <a href="#">By: ptravy</a>
                            <a href="#"><i class="ti-heart text-danger"></i> 50</a>
                            <a href="#"><i class="ti-comment"></i> 3</a>
                        </p>
                        
                        <p>Together with the best mentor in my work class, I learned how to become a UX designer as a beginner who wanted to deepen UX design.</p>
                        <button class="btn btn-outline-danger" onclick="printUI()"><i class="icon-down-circled2 "></i>Download Certificate</button>
                        <!-- Script CV pdf -->
                        <script>
                            function printUI() {
                                // Gantilah 'nama_file_resume.pdf' dengan URL atau path file PDF Anda
                                var pdfUrl = 'PDF/UIUX.pdf';

                                // Buka file PDF dalam jendela baru
                                var newWindow = window.open(pdfUrl, '_blank');
                            }
                        </script>
                        <a href="#" class="read-more">Read more<i class="ti-angle-double-right"></i></a>
                    </div>
                </div><!-- end of blog wrapper -->
            </div>
        </div>
    </section>

    <section class="section" id="blog">
        <div class="container">
            <h2 class="mb-5">Latest <span class="text-danger">News</span></h2>
            <div class="row">
                <div class="blog-card">
                    <div class="img-holder">
                        <img src="gambar/pmm4.jpg" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                    </div>
                    <div class="content-holder">
                        <h6 class="title">Independent Student Exchange Batch 4</h6>

                        <p class="post-details">
                            <a href="#">By: ptravy</a>
                            <a href="#"><i class="ti-heart text-danger"></i> 50</a>
                            <a href="#"><i class="ti-comment"></i> 3</a>
                        </p>
                        
                        <p>"The Independent Student Exchange Program for the year 2023 (PMM 3) is a student mobility initiative lasting for one semester, designed to provide a learning experience at various universities in Indonesia while strengthening unity amidst diversity. PMM 3 aims to involve 204 receiving Higher Education Institutions (HEIs) and accommodate 15,505 participating students in the program.The program encompasses six key elements: 
                            <br>1. Student exchange facilitated through inter-island cluster transitions.
                            <br>2. Recognition of learning outcomes with a credit transfer of up to 20 credit hours.
                            <br>3. Facilitation of student exchanges between State Universities (PTN) and Private Higher Education Institutions (PTS), fostering a two-way exchange.
                            <br>4. Participation open to students in their 3rd, 5th, and 7th semesters during the program's duration.
                            <br>5. Exploration of unity in diversity through the Nusantara Module.
                            <br>6. Mechanisms for academic exchange within similar academic disciplines and between vocational programs."</p>

                        <a href="https://pmm.kampusmerdeka.kemdikbud.go.id/pages/info/program/pmm_4/" class="read-more">Read more <i class="ti-angle-double-right"></i></a>
                    </div>
                </div><!-- end of blog wrapper -->

                <!-- blog-card -->
                <div class="blog-card">
                    <div class="img-holder">
                        <img src="gambar/teknik.jpg" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                    </div>
                    <div class="content-holder">
                        <h6 class="title">Informatics Engineering student at Raja Ali Haji Maritime University (UMRAH).</h6>

                        <p class="post-details">
                            <a href="#">By: ptravy</a>
                            <a href="#"><i class="ti-heart text-danger"></i> 200</a>
                            <a href="#"><i class="ti-comment"></i> 20</a>
                        </p>
                        
                        <p>The UMRAH Faculty of Engineering, currently comprising three Departments—Electrical Engineering, Informatics Engineering, and Ship Engineering—focuses on the development and provision of high-quality human resources. It plays a vital role in formulating strategies for higher education development in Indonesia, particularly emphasizing the maritime industry. Based on existing potential and opportunities, the UMRAH Faculty of Engineering actively contributes to producing graduates well-versed in science and technology. The aim is to enhance competitiveness and economic self-reliance by leveraging sustainable maritime resources through the application of Industry 4.0 technologies.</p>

                        <a href="#" class="read-more">Read more <i class="ti-angle-double-right"></i></a>
                    </div>
                </div><!-- end of blog wrapper -->
                <!-- blog-card -->
                <div class="blog-card">
                    <div class="img-holder">
                        <img src="gambar/genre.jpg" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                    </div>
                    <div class="content-holder">
                        <h4 class="title">Genre Ambassador of Lingga Regency.</h4>

                        <p class="post-details">
                            <a href="#">By: redaksi selingga</a>
                            <a href="#"><i class="ti-heart text-danger"></i> 73</a>
                            <a href="#"><i class="ti-comment"></i> 5</a>
                        </p>
                        
                        <p>Selingga.com (25/09) Dabo. In response to current teenage issues, the National Population and Family Planning Agency (BKKBN) continues to develop the Family Planning Generation (GenRe) program. Currently, BKKBN of the Kepulauan Riau Province collaborates with OPDKB and the GenRe Forum of Regencies/Cities, conducting the virtual selection of GenRe Ambassadors for the Kepulauan Riau region in 2020. The event was participated by 7 regencies/cities across the Kepri Province, featuring a Virtual Creative Festival and Appreciation for the Virtual GenRe Ambassadors of Kepulauan Riau in 2020. In the selection event for the GenRe Ambassadors of Kepri Province in 2020, held on Thursday (24/09), Lingga Regency emerged as the second winner. Lians Dwi Santy, the Head of Population Control and Family Planning at the Health Office of Lingga Regency, expressed after the final selection of the GenRe Ambassadors for the Kepri Province, which took place virtually at Hotel Gapura, Dabo Singkep, Lingga Regency. She mentioned that the event could serve as motivation for the younger generation of students.</p>

                        <a href="https://selingga.com/lingga-runner-up-i-putri-dan-best-costum-putra-putri-pada-pemilihan-duta-genre-provinsi-kepri/" class="read-more">Read more <i class="ti-angle-double-right"></i></a>
                    </div>
                </div><!-- end of blog wrapper -->

            </div>
        </div>
    </section>

    <div class="section contact" id="contact">
        <div id="map" class="map"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="contact-form-card">
                        <h4 class="contact-title">Send a message</h4>
                        <form class="display-grid row-gap-1-rem" method="post">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="name" type="text" class="form-control" placeholder="Name" autocomplete="off" required/><br>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="email" type="email" class="form-control" placeholder="Email" autocomplete="off" required />
                                    </div><br>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="subject" type="text" class="form-control" placeholder="Subject" autocomplete="off" required />
                                    </div><br>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="message" placeholder="Pesan" style="height: 150px" required></textarea>
                                    </div><br>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit" name="send">Kirim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="contact-info-card">
                        <h4 class="contact-title" id="#contact">Get in touch</h4>
                        <div class="row mb-2">
                            <div class="col-1 pt-1 mr-1">
                                <i class="ti-mobile icon-md"></i>
                            </div>
                            <div class="col-10 ">
                                <h6 class="d-inline">Phone : <br> <span class="text-muted">+62 81261461477</span></h6>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-1 pt-1 mr-1">
                                <i class="ti-map-alt icon-md"></i>
                            </div>
                            <div class="col-10">
                                <h6 class="d-inline">Address :<br> <span class="text-muted">Jl. Merpati Gang Murai No.5</span></h6>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-1 pt-1 mr-1">
                                <i class="ti-envelope icon-md"></i>
                            </div>
                            <div class="col-10">
                                <h6 class="d-inline">Email :<br> <span class="text-muted">ptravyy@gmail.com</span></h6>
                            </div>
                        </div>
                        <ul class="social-icons pt-4">
                            <li class="social-item"><a class="social-link text-dark" href="https://www.facebook.com/rovy.saputra.14"><i class="ti-facebook" aria-hidden="true"></i></a></li>
                            <li class="social-item"><a class="social-link text-dark" href="https://twitter.com/ptra_vy"><i class="ti-twitter" aria-hidden="true"></i></a></li>
                            <li class="social-item"><a class="social-link text-dark" href="https://www.linkedin.com/in/rovy-saputra-nugeraha-a54195292/"><i class="ti-linkedin" aria-hidden="true"></i></a></li>
                            <li class="social-item"><a class="social-link text-dark" href="https://instagram.com/ptra.vy"><i class="ti-instagram" aria-hidden="true"></i></a></li>
                            <li class="social-item"><a class="social-link text-dark" href="https://github.com/rovy-saputra-nugeraha"><i class="ti-github" aria-hidden="true"></i></a></li>
                        </ul> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="footer py-3">
        <div class="container">
            <p class="medium mb-0 text-light" align="center">
                &copy; <script>document.write(new Date().getFullYear())</script> Created By <a href="#" target="_blank"><span class="text-danger" title="Bootstrap 4 Themes and Dashboards">Ptra_Vy</span></a> 
            </p>
        </div>
    </footer>

	<!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
    <script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Isotope  -->
    <script src="assets/vendors/isotope/isotope.pkgd.js"></script>

    <!-- JohnDoe js -->
    <script src="assets/js/johndoe.js"></script>

</body>
</html>