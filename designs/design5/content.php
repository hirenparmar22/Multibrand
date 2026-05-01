<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi Brand Store | Premium</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            accent-color: #f8f9fa;
        }


        .hero {
            height: 80vh;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('bg.png');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            color: white;
        }

        .maintext {
            filter: blur(2px);
            color: #000;
        }

        .overlap-section {
            margin-top: -100px;
            position: relative;
            z-index: 10;
        }

        .feature-box {

            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            text-align: center;
            height: 100%;
        }

        .feature-box:hover {
            transform: translateY(-10px);
        }

        .brand-logo-strip img {
            filter: grayscale(100%);
            opacity: 0.6;
            transition: 0.3s;
            max-height: 40px;
        }

        .brand-logo-strip img:hover {
            filter: grayscale(0%);
            opacity: 1;
        }

        .navbar-brand {
            font-weight: 800;
            letter-spacing: 1px;
        }

        .brand-box:hover img {
            transform: scale(1.5) rotate(5deg);
        }

        .brand-box:hover {
            border-color: green;
        }
    </style>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent position-absolute w-100">
        <div class="container">
            <a class="navbar-brand" href="#">MYBRAND</a>
            <div class="ms-auto">
                <a href="#" class="btn btn-outline-light btn-sm px-4 rounded-pill">Explore</a>
                <a href="#" class="btn btn-outline-light btn-sm px-4 rounded-pill">Home</a>
                <a href="#" class="btn btn-outline-light btn-sm px-4 rounded-pill">Branda</a>
                <a href="#" class="btn btn-outline-light btn-sm px-4 rounded-pill">Contact</a>

            </div>
        </div>
    </nav>

    <header class="hero">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="maintext display-3 fw-bold mb-4">Elevate Your Style</h1>
                    <p class="lead mb-0 text-light-subtle opacity-75">Top brands ekaj jagya par. Experience the curated
                        collection of international
                        fashion.</p>
                </div>
            </div>
        </div>
    </header>

    <section class="overlap-section container">
        <div class="row g-4">

            <div class="col-md-4 ">
                <div class="feature-box p-4 border rounded border-dark shadow-sm bg-body-secondary">
                    <div class="mb-3 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-bag-check" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                            <path
                                d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                        </svg>
                    </div>
                    <h4>Premium Quality</h4>
                    <p class="text-muted">Handpicked selection from the world's most prestigious labels.</p>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="feature-box p-4 border rounded border-dark shadow-sm bg-body-secondary">
                    <div class="mb-3 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-truck" viewBox="0 0 16 16">
                            <path
                                d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-4 0H1a1.5 1.5 0 0 1-1.5-1.5v-7zM11 11h1a1 1 0 0 0 1-1V7.101a.5.5 0 0 0-.11-.313l-1.48-1.85A.5.5 0 0 0 11.02 5H11v6z" />
                        </svg>
                    </div>
                    <h4>Fast Delivery</h4>
                    <p class="text-muted">Get your luxury items delivered to your doorstep within 24 hours.</p>
                </div>
            </div>


            <div class="col-md-4">
                <div class="feature-box p-4 border rounded border-dark shadow-sm bg-body-secondary">
                    <div class="mb-3 text-primary">
                        <svg xmlns="download.webp" width="40" height="40" fill="currentColor" class="bi bi-shield-lock"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 1a5 5 0 0 1 5 5v2.5a.5.5 0 0 1-1 0V6a4 4 0 1 0-8 0v2.5a.5.5 0 0 1-1 0V6a5 5 0 0 1 5-5zM8 4a1 1 0 1 1 0 2 1 1 0 0 1 0-2zM6.271 10.161a.5.5 0 0 1 .122.636l-.643 1.156a.5.5 0 0 1-.871-.5l.643-1.157a.5.5 0 0 1 .749-.125z" />
                            <path fill-rule="evenodd"
                                d="M11 9.5a3.5 3.5 0 1 0-7 0 3.5 3.5 0 0 0 7 0zm-5 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0z" />
                        </svg>
                    </div>
                    <h4>Secure Payment</h4>
                    <p class="text-muted">Shop with confidence using our 100% encrypted payment gateway.</p>
                </div>
            </div>

        </div>
        </div>
        </div>
    </section>

    <div class="container my-2 pt-5">
        <h6 class="text-center text-uppercase fw-bold text-muted mb-4">Our Trusted Brands</h6>
        <div class="d-flex flex-wrap justify-content-center align-items-center gap-3 brand-logo-strip">

            <div class="brand-box border rounded border-success p-2 d-flex align-items-center justify-content-center"
                style="width: 50px; height: 40px;">
                <img src="download.webp" alt="Brand 4" class="img-fluid" style="max-height: 25px;">
            </div>

            <div class="brand-box border rounded border-success p-2 d-flex align-items-center justify-content-center"
                style="width: 50px; height: 40px;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Logo_NIKE.svg/1200px-Logo_NIKE.svg.png"
                    alt="Rolex" class="img-fluid" style="max-height: 25px;">
            </div>
            <div class="brand-box border rounded  border-success p-2 d-flex align-items-center justify-content-center"
                style="width: 50px; height: 40px;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Zara_Logo.svg/1280px-Zara_Logo.svg.png"
                    alt="Rolex" class="img-fluid" style="max-height: 25px;">
            </div>
            <div class="brand-box border rounded border-success p-2 d-flex align-items-center justify-content-center"
                style="width: 50px; height: 40px;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/H%26M-Logo.svg/1200px-H%26M-Logo.svg.png"
                    alt="Rolex" class="img-fluid" style="max-height: 25px;">
            </div>
            <div class="brand-box border rounded border-success p-2 d-flex align-items-center justify-content-center"
                style="width: 50px; height: 40px;">
                <img src="download.webp" alt="Brand 4" class="img-fluid" style="max-height: 25px;">
            </div>

            <div class="brand-box border rounded  border-success p-2 d-flex align-items-center justify-content-center"
                style="width: 50px; height: 40px;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Logo_NIKE.svg/1200px-Logo_NIKE.svg.png"
                    alt="Rolex" class="img-fluid" style="max-height: 25px;">
            </div>
            <div class="brand-box border rounded border-success p-2 d-flex align-items-center justify-content-center"
                style="width: 50px; height: 40px;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Zara_Logo.svg/1280px-Zara_Logo.svg.png"
                    alt="Rolex" class="img-fluid" style="max-height: 25px;">
            </div>
            <div class="brand-box border rounded border-success p-2 d-flex align-items-center justify-content-center"
                style="width: 50px; height: 40px;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/H%26M-Logo.svg/1200px-H%26M-Logo.svg.png"
                    alt="Rolex" class="img-fluid" style="max-height: 25px;">
            </div>
            <div class="brand-box border rounded border-success p-2 d-flex align-items-center justify-content-center"
                style="width: 60px; height: 50px;">
                <img src="download.webp" alt="Brand 4" class="img-fluid" style="max-height: 25px;">
            </div>

            <div class="brand-box border rounded  border-success p-2 d-flex align-items-center justify-content-center"
                style="width: 50px; height: 40px;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Logo_NIKE.svg/1200px-Logo_NIKE.svg.png"
                    alt="Rolex" class="img-fluid" style="max-height: 25px;">
            </div>



        </div>
    </div>









    <style>
        /* ================= GENERAL & BUTTON SECTION ================= */
        .brand-section {
            position: relative;
            padding: 80px 0;
            background: #f8f9fa;
            overflow: hidden;
        }

        .brand-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
            position: relative;
            z-index: 10;
            /* બટનો લાઈનની ઉપર દેખાય તે માટે */
        }

        .brand-btn {
            display: inline-flex;
            align-items: center;
            height: 55px;
            max-width: 55px;
            /* શરૂઆતમાં માત્ર આઈકોન */
            padding: 0 15px;
            border-radius: 30px;
            border: 1.5px solid #000;
            background-color: #fff;
            cursor: pointer;
            overflow: hidden;
            white-space: nowrap;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        /* Hover Effect: બટન પહોળું થશે */
        .brand-btn:hover {
            max-width: 250px;
            background-color: #000;
            color: #fff;
        }

        .brand-logo {
            width: 25px;
            height: 25px;
            object-fit: contain;
            flex-shrink: 0;
            transition: filter 0.3s ease;
        }

        .brand-btn:hover .brand-logo {
            filter: invert(1);
            /* લોગો સફેદ થઈ જશે */
        }

        .brand-text {
            opacity: 0;
            margin-left: 15px;
            font-family: sans-serif;
            font-weight: 600;
            letter-spacing: 1px;
            transition: opacity 0.3s ease;
        }

        .brand-btn:hover .brand-text {
            opacity: 1;
        }

        /* Green line borders on hover */
        .brand-btn::before,
        .brand-btn::after {
            content: "";
            position: absolute;
            left: 50%;
            width: 0%;
            height: 2px;
            background: #28a745;
            transition: 0.4s;
            transform: translateX(-50%);
        }

        .brand-btn::before {
            top: 0;
        }

        .brand-btn::after {
            bottom: 0;
        }

        .brand-btn:hover::before,
        .brand-btn:hover::after {
            width: 80%;
        }

        /* ================= BACKGROUND TICKER SECTION ================= */
        .brand-section {
            position: relative;
            overflow: hidden;
            padding: 100px 0;
            background: #f8f9fa;
        }

        /* ===== BACKGROUND TICKER ===== */

        /* .ticker-container {
            position: relative;
            top: 50%;
            left: 50%;
            width: 100%;
            transform: translate(-50%, -50%);
            z-index: 1;
            pointer-events: none;
        } */

        .ticker-line {
            display: flex;
            white-space: nowrap;
            font-size: 30px;
            font-weight: 900;
            gap: 50px;
            opacity: 0.3;
            filter: blur(2px);
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            /* transform: translate(-50%, -50%); */
            z-index: 1;
            pointer-events: none;
        }

        .line-one {
            background: #007bff;
            color: #fff;
            transform: translate(-50%, -50%) rotate(5deg);
        }

        .line-two {
            background: #000;
            color: #fff;
            transform: translate(-50%, -50%) rotate(-5deg);
        }

        .scrolling-text {
            display: flex;
            gap: 50px;
            width: max-content;
            animation: scroll-left 25s linear infinite;
        }

        .reverse-scroll {
            animation: scroll-right 25s linear infinite;
        }

        @keyframes scroll-left {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }

        @keyframes scroll-right {
            from {
                transform: translateX(-50%);
            }

            to {
                transform: translateX(0);
            }
        }
    </style>

    <section class="brand-section">

        <div class="ticker-container">
            <div class="ticker-line line-one">
                <div class="scrolling-text">
                    <span class="brand-item">BMW</span><span class="brand-item">ROLEX</span>
                    <span class="brand-item">NIKE</span><span class="brand-item">ZARA</span>
                    <span class="brand-item">ADIDAS</span><span class="brand-item">GUCCI</span>
                    <span class="brand-item">BMW</span><span class="brand-item">ROLEX</span>
                    <span class="brand-item">NIKE</span><span class="brand-item">ZARA</span>
                </div>
            </div>
            <div class="ticker-line line-two">
                <div class="scrolling-text reverse-scroll">
                    <span class="brand-item">PRADA</span><span class="brand-item">LV</span>
                    <span class="brand-item">H&M</span><span class="brand-item">L'ORÉAL</span>
                    <span class="brand-item">PUMA</span><span class="brand-item">DIOR</span>
                    <span class="brand-item">PRADA</span><span class="brand-item">LV</span>
                    <span class="brand-item">H&M</span><span class="brand-item">L'ORÉAL</span>
                </div>
            </div>
        </div>

        <div class="container text-center">
            <h1 class="mb-5 text-uppercase fw-bold" style="letter-spacing: 3px;">Featured Brands</h1>

            <div class="brand-container">
                <button class="brand-btn" style="border-color: #CC0000;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/H%26M-Logo.svg" class="brand-logo"
                        alt="H&M">
                    <span class="brand-text">H&M Fashion</span>
                </button>

                <button class="brand-btn" style="border-color: #000;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg" class="brand-logo"
                        alt="Nike">
                    <span class="brand-text">Nike Sports</span>
                </button>

                <button class="brand-btn" style="border-color: #000;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/f/fd/Zara_Logo.svg" class="brand-logo"
                        alt="Zara">
                    <span class="brand-text">Zara Global</span>
                </button>

                <button class="brand-btn" style="border-color: #004039;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/f/f4/Rolex_logo.svg" class="brand-logo"
                        alt="Rolex">
                    <span class="brand-text">Rolex Luxury</span>
                </button>

                <button class="brand-btn" style="border-color: #0066ad;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/BMW.svg" class="brand-logo" alt="BMW">
                    <span class="brand-text">BMW Luxury</span>
                </button>

                <button class="brand-btn" style="border-color: #cc0000;">
                    <img src="https://www.vectorlogo.zone/logos/tesla/tesla-icon.svg" class="brand-logo" alt="Tesla">
                    <span class="brand-text">Tesla Electric</span>
                </button>
                <button class="brand-btn" style="border-color: #CC0000;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/H%26M-Logo.svg" class="brand-logo"
                        alt="H&M">
                    <span class="brand-text">H&M Fashion</span>
                </button>

                <button class="brand-btn" style="border-color: #000;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg" class="brand-logo"
                        alt="Nike">
                    <span class="brand-text">Nike Sports</span>
                </button>

                <button class="brand-btn" style="border-color: #000;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/f/fd/Zara_Logo.svg" class="brand-logo"
                        alt="Zara">
                    <span class="brand-text">Zara Global</span>
                </button>

                <button class="brand-btn" style="border-color: #004039;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/f/f4/Rolex_logo.svg" class="brand-logo"
                        alt="Rolex">
                    <span class="brand-text">Rolex Luxury</span>
                </button>

                <button class="brand-btn" style="border-color: #0066ad;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/BMW.svg" class="brand-logo" alt="BMW">
                    <span class="brand-text">BMW Luxury</span>
                </button>

                <button class="brand-btn" style="border-color: #cc0000;">
                    <img src="https://www.vectorlogo.zone/logos/tesla/tesla-icon.svg" class="brand-logo" alt="Tesla">
                    <span class="brand-text">Tesla Electric</span>
                </button>

            </div>
        </div>
    </section>





















    <style>
        .review-section {
            overflow: hidden;
            padding: 60px 0;
            background-color: #f4f7f6;
        }

        .scroll-wrapper {
            display: flex;
            width: max-content;
            gap: 20px;
            padding: 20px 0;
        }

        /* Animations */
        .animate-left {
            animation: scrollLeft 50s linear infinite;
        }

        .animate-right {
            animation: scrollRight 50s linear infinite;
        }

        .scroll-wrapper:hover {
            animation-play-state: paused;
        }

        /* Card Styling */
        .review-card {
            width: 350px;
            background: #fff;
            border: none;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .review-card:hover {
            transform: translateY(-10px);
            border: 1px solid #007bff;
        }

        .review-text {
            font-size: 14px;
            line-height: 1.6;
            color: #555;
            height: 90px;
            overflow: hidden;
        }

        .user-name {
            font-weight: 700;
            color: #333;
            margin-top: 15px;
            display: block;
        }

        .star-rating {
            color: #ffc107;
        }

        @keyframes scrollLeft {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        @keyframes scrollRight {
            0% {
                transform: translateX(-50%);
            }

            100% {
                transform: translateX(0);
            }
        }
    </style>


    <section class="review-section ">
        <div class="container-fluid py-3">
            <h2 class="text-center mb-5 fw-bold text-uppercase" style="letter-spacing: 2px;">What Our Clients Say</h2>

            <div class="overflow-hidden">
                <div class="scroll-wrapper animate-left">
                    <div class="review-card">
                        <p class="review-text">The quality of the premium leather bag I ordered exceeded all my
                            expectations. The stitching is perfect and the material feels very luxurious. I have been
                            using it daily for a month now and it still looks brand new. Highly recommended for
                            everyone!</p>
                        <span class="user-name">Aarav Patel</span>
                        <div class="star-rating"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">I was skeptical about buying luxury watches online, but this site proved
                            me wrong. The packaging was incredibly secure and the delivery was on time. The Rolex I
                            received is 100% authentic and came with all original papers. Best experience ever!</p>
                        <span class="user-name">Ishani Shah</span>
                        <div class="star-rating"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">The customer support team is very helpful. I had an issue with the size
                            of my Zara jacket, and they processed my exchange within 24 hours. The new fit is perfect
                            and the fabric is very comfortable for all-day wear. Very satisfied customer here.</p>
                        <span class="user-name">Rohan Mehra</span>
                        <div class="star-rating"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">Nike sneakers from this store are definitely genuine. I compared them
                            with the showroom ones and couldn't find any difference. The grip and comfort are amazing
                            during my morning runs. I will definitely buy my next pair from here only. Keep it up!</p>
                        <span class="user-name">Siddharth Rao</span>
                        <div class="star-rating"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">Shopping for Gucci products has never been this easy. The website is very
                            user-friendly and the high-resolution images really help in choosing the right product. The
                            wallet arrived in a beautiful gift box. It's the perfect place for luxury shoppers.</p>
                        <span class="user-name">Meera Joshi</span>
                        <div class="star-rating"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">The Adidas originals I bought are super stylish and lightweight. Even
                            after long hours of walking, my feet don't feel tired. The color is exactly as shown in the
                            pictures. Delivery was fast and the tracking system kept me updated throughout.</p>
                        <span class="user-name">Kunal Verma</span>
                        <div class="star-rating"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">I bought a Prada handbag for my wife's birthday. She absolutely loves it!
                            The design is timeless and the leather quality is supreme. The payment process was secure
                            and I received a confirmation email instantly. A truly premium shopping destination.</p>
                        <span class="user-name">Vikram Singh</span>
                        <div class="star-rating"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">L'Oréal cosmetics from here are always fresh and authentic. I've had bad
                            experiences elsewhere with near-expiry products, but not here. The packaging protects the
                            glass bottles perfectly during transit. I am a regular buyer and highly recommend them.</p>
                        <span class="user-name">Anjali Das</span>
                        <div class="star-rating"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">The BMW accessories collection is impressive. I bought some interior
                            cleaning kits and they work like magic. My car looks brand new now. The prices are
                            competitive and the quality is top-notch. Great service and fast shipping as well.</p>
                        <span class="user-name">Rahul Khanna</span>
                        <div class="star-rating"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">Tesla branded merchandise is hard to find, but this store has a great
                            variety. The t-shirts are made of high-quality cotton and the print doesn't fade after
                            washing. I am very happy with my purchase and will order again soon. Thank you guys!</p>
                        <span class="user-name">Sameer Gupta</span>
                        <div class="star-rating"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden">
                <div class="scroll-wrapper animate-right">
                    <div class="review-card">
                        <p class="review-text">The delivery person was very professional and followed all safety
                            protocols. My package arrived earlier than expected, which was a pleasant surprise. The item
                            was packed with extra bubble wrap to prevent any damage. 5-star service!</p>
                        <span class="user-name">Pooja Sharma</span>
                        <div class="star-rating"><i class="bi bi-star-half"></i><i class="bi bi-star-half"></i><i
                                class="bi bi-star-half"></i><i class="bi bi-star-half"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">The delivery person was very professional and followed all safety
                            protocols. My package arrived earlier than expected, which was a pleasant surprise. The item
                            was packed with extra bubble wrap to prevent any damage. 5-star service!</p>
                        <span class="user-name">Pooja Sharma</span>
                        <div class="star-rating"><i class="bi bi-star-half"></i><i class="bi bi-star-half"></i><i
                                class="bi bi-star-half"></i><i class="bi bi-star-half"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">The delivery person was very professional and followed all safety
                            protocols. My package arrived earlier than expected, which was a pleasant surprise. The item
                            was packed with extra bubble wrap to prevent any damage. 5-star service!</p>
                        <span class="user-name">Pooja Sharma</span>
                        <div class="star-rating"><i class="bi bi-star-half"></i><i class="bi bi-star-half"></i><i
                                class="bi bi-star-half"></i><i class="bi bi-star-half"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">The delivery person was very professional and followed all safety
                            protocols. My package arrived earlier than expected, which was a pleasant surprise. The item
                            was packed with extra bubble wrap to prevent any damage. 5-star service!</p>
                        <span class="user-name">Pooja Sharma</span>
                        <div class="star-rating"><i class="bi bi-star-half"></i><i class="bi bi-star-half"></i><i
                                class="bi bi-star-half"></i><i class="bi bi-star-half"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">The delivery person was very professional and followed all safety
                            protocols. My package arrived earlier than expected, which was a pleasant surprise. The item
                            was packed with extra bubble wrap to prevent any damage. 5-star service!</p>
                        <span class="user-name">Pooja Sharma</span>
                        <div class="star-rating"><i class="bi bi-star-half"></i><i class="bi bi-star-half"></i><i
                                class="bi bi-star-half"></i><i class="bi bi-star-half"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">The delivery person was very professional and followed all safety
                            protocols. My package arrived earlier than expected, which was a pleasant surprise. The item
                            was packed with extra bubble wrap to prevent any damage. 5-star service!</p>
                        <span class="user-name">Pooja Sharma</span>
                        <div class="star-rating"><i class="bi bi-star-half"></i><i class="bi bi-star-half"></i><i
                                class="bi bi-star-half"></i><i class="bi bi-star-half"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">The delivery person was very professional and followed all safety
                            protocols. My package arrived earlier than expected, which was a pleasant surprise. The item
                            was packed with extra bubble wrap to prevent any damage. 5-star service!</p>
                        <span class="user-name">Pooja Sharma</span>
                        <div class="star-rating"><i class="bi bi-star-half"></i><i class="bi bi-star-half"></i><i
                                class="bi bi-star-half"></i><i class="bi bi-star-half"></i></div>
                    </div>



                    <div class="review-card">
                        <p class="review-text">The delivery person was very professional and followed all safety
                            protocols. My package arrived earlier than expected, which was a pleasant surprise. The item
                            was packed with extra bubble wrap to prevent any damage. 5-star service!</p>
                        <span class="user-name">Pooja Sharma</span>
                        <div class="star-rating"><i class="bi bi-star-half"></i><i class="bi bi-star-half"></i><i
                                class="bi bi-star-half"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">The delivery person was very professional and followed all safety
                            protocols. My package arrived earlier than expected, which was a pleasant surprise. The item
                            was packed with extra bubble wrap to prevent any damage. 5-star service!</p>
                        <span class="user-name">Pooja Sharma</span>
                        <div class="star-rating"><i class="bi bi-star-half"></i><i class="bi bi-star-half"></i><i
                                class="bi bi-star-half"></i><i class="bi bi-star-half"></i></div>
                    </div>

                </div>
            </div>

            <div class="overflow-hidden">
                <div class="scroll-wrapper animate-left">
                    <div class="review-card">
                        <p class="review-text">I love the variety of international brands available on a single
                            platform. It saves me so much time and effort. The size guides are very accurate and helped
                            me pick the right fit for my Adidas sports gear. Highly reliable website.</p>
                        <span class="user-name">Deepak Jha</span>
                        <div class="star-rating"><i class="bi bi-star-half"></i><i class="bi bi-star-half"></i><i
                                class="bi bi-star-half"></i><i class="bi bi-star-half"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">I love the variety of international brands available on a single
                            platform. It saves me so much time and effort. The size guides are very accurate and helped
                            me pick the right fit for my Adidas sports gear. Highly reliable website.</p>
                        <span class="user-name">Deepak Jha</span>
                        <div class="star-rating"><i class="bi bi-star-half"></i><i class="bi bi-star-half"></i><i
                                class="bi bi-star-half"></i><i class="bi bi-star-half"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">I love the variety of international brands available on a single
                            platform. It saves me so much time and effort. The size guides are very accurate and helped
                            me pick the right fit for my Adidas sports gear. Highly reliable website.</p>
                        <span class="user-name">Deepak Jha</span>
                        <div class="star-rating"><i class="bi bi-star-half"></i><i class="bi bi-star-half"></i><i
                                class="bi bi-star-half"></i><i class="bi bi-star-half"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">I love the variety of international brands available on a single
                            platform. It saves me so much time and effort. The size guides are very accurate and helped
                            me pick the right fit for my Adidas sports gear. Highly reliable website.</p>
                        <span class="user-name">Deepak Jha</span>
                        <div class="star-rating"><i class="bi bi-star-half"></i><i class="bi bi-star-half"></i><i
                                class="bi bi-star-half"></i><i class="bi bi-star-half"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">I love the variety of international brands available on a single
                            platform. It saves me so much time and effort. The size guides are very accurate and helped
                            me pick the right fit for my Adidas sports gear. Highly reliable website.</p>
                        <span class="user-name">Deepak Jha</span>
                        <div class="star-rating"><i class="bi bi-star-half"></i><i class="bi bi-star-half"></i><i
                                class="bi bi-star-half"></i><i class="bi bi-star-half"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">I love the variety of international brands available on a single
                            platform. It saves me so much time and effort. The size guides are very accurate and helped
                            me pick the right fit for my Adidas sports gear. Highly reliable website.</p>
                        <span class="user-name">Deepak Jha</span>
                        <div class="star-rating"><i class="bi bi-star-half"></i><i class="bi bi-star-half"></i><i
                                class="bi bi-star-half"></i><i class="bi bi-star-half"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">I love the variety of international brands available on a single
                            platform. It saves me so much time and effort. The size guides are very accurate and helped
                            me pick the right fit for my Adidas sports gear. Highly reliable website.</p>
                        <span class="user-name">Deepak Jha</span>
                        <div class="star-rating"><i class="bi bi-star-half"></i><i class="bi bi-star-half"></i><i
                                class="bi bi-star-half"></i><i class="bi bi-star-half"></i></div>
                    </div>

                    <div class="review-card">
                        <p class="review-text">I love the variety of international brands available on a single
                            platform. It saves me so much time and effort. The size guides are very accurate and helped
                            me pick the right fit for my Adidas sports gear. Highly reliable website.</p>
                        <span class="user-name">Deepak Jha</span>
                        <div class="star-rating"><i class="bi bi-star-half"></i><i class="bi bi-star-half"></i><i
                                class="bi bi-star-half"></i><i class="bi bi-star-half"></i></div>
                    </div>
                    <div class="review-card">
                        <p class="review-text">I love the variety of international brands available on a single
                            platform. It saves me so much time and effort. The size guides are very accurate and helped
                            me pick the right fit for my Adidas sports gear. Highly reliable website.</p>
                        <span class="user-name">Deepak Jha</span>
                        <div class="star-rating"><i class="bi bi-star-half"></i><i class="bi bi-star-half"></i><i
                                class="bi bi-star-half"></i><i class="bi bi-star-half"></i></div>
                    </div>

                </div>
            </div>

        </div>
    </section>




    <style>
        .brand-grid {
            display: grid;
            /* મોબાઈલ અને ડેસ્કટોપ બંનેમાં વ્યવસ્થિત દેખાય તે માટે */
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .brand-square {
            width: 130px;
            height: 130px;
            border: 2px solid #eee;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #fff;
            position: relative;
            margin: auto;
            filter: drop-shadow(0 5px 10px rgba(0, 0, 0, 0.12));
        }

        /* Hover Effect: Border and Thank you Message */
        .brand-square:hover {
            border-color: #007bff;
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .thank-you-msg {
            position: absolute;
            top: -20px;
            font-size: 11px;
            background: #28a745;
            color: #fff;
            padding: 2px 10px;
            border-radius: 10px;
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
            white-space: nowrap;
        }

        .brand-square:hover .thank-you-msg {
            opacity: 1;
            transform: translateX(-50%) scale(1.15);
        }

        .brand-square img {
            width: 65px;
            height: 65px;
            object-fit: contain;
            background-color: #cf9f9f;
            margin-bottom: 8px;
            filter: drop-shadow(0 5px 10px rgba(0, 0, 0, 0.12));
            /* transform: scale(1.2); */
            


        }

        .brand-name {
            font-size: 13px;
            font-weight: 700;
            color:rgb(31, 168, 54);
            text-transform: uppercase;
        }

        .brand-square {
            background-image: url('Gemini_Generated.png');
            background-size: cover;
            background-position: center;

        }
    </style>

    <section class="py-5 bg-white">
        <div class="container py-5">
            <h3 class="text-center mb-5 fw-bold">Explore Our Top 10 Brands</h3>
            <p class="text-center mb-0 fw-bold text-muted">Choose your Brand & Click On It</p>


            <div class="brand-grid row-cols-2 row-cols-md-3 row-cols-lg-4 border border-black py-5">

                <div class="brand-square rounded shadow ">
                    <span class="thank-you-msg">Thank You!</span>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/H%26M-Logo.svg/1200px-H%26M-Logo.svg.png"
                        alt="H&M">
                    <span class="brand-name">H&M</span>
                </div>

                <div class="brand-square rounded shadow">
                    <span class="thank-you-msg">Thank You!</span>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Logo_NIKE.svg/1200px-Logo_NIKE.svg.png"
                        alt="Nike">
                    <span class="brand-name">Nike</span>
                </div>

                <div class="brand-square rounded shadow">
                    <span class="thank-you-msg">Thank You!</span>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Zara_Logo.svg/1280px-Zara_Logo.svg.png"
                        alt="Zara">
                    <span class="brand-name">Zara</span>
                </div>

                <div class="brand-square rounded shadow">
                    <span class="thank-you-msg">Thank You!</span>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Rolex_logo.svg/1200px-Rolex_logo.svg.png"
                        alt="Rolex">
                    <span class="brand-name">Rolex</span>
                </div>

                <div class="brand-square rounded shadow">
                    <span class="thank-you-msg">Thank You!</span>
                    <img src="https://www.vectorlogo.zone/logos/adidas/adidas-icon.svg" alt="Adidas">
                    <span class="brand-name">Adidas</span>
                </div>

                <div class="brand-square rounded shadow">
                    <span class="thank-you-msg">Thank You!</span>
                    <img src="https://www.vectorlogo.zone/logos/gucci/gucci-icon.svg" alt="Gucci">
                    <span class="brand-name">Gucci</span>
                </div>

                <div class="brand-square rounded shadow">
                    <span class="thank-you-msg">Thank You!</span>
                    <img src="https://www.vectorlogo.zone/logos/prada/prada-icon.svg" alt="Prada">
                    <span class="brand-name">Prada</span>
                </div>

                <div class="brand-square rounded shadow">
                    <span class="thank-you-msg">Thank You!</span>
                    <img src="https://www.vectorlogo.zone/logos/louisvuitton/louisvuitton-icon.svg" alt="LV">
                    <span class="brand-name">LV</span>
                </div>

                <div class="brand-square rounded shadow">
                    <span class="thank-you-msg">Thank You!</span>
                    <img src="https://cdn.worldvectorlogo.com/logos/loreal-1.svg" alt="L'Oreal">
                    <span class="brand-name">L'Oréal</span>
                </div>

                <div class="brand-square rounded shadow">
                    <span class="thank-you-msg">Thank You!</span>
                    <img src="https://www.vectorlogo.zone/logos/bmw/bmw-icon.svg" alt="BMW">
                    <span class="brand-name">BMW</span>
                </div>

            </div>

            <div id="details-placeholder" class="text-center text-dark mt-5">
                <p class="text-bold">Select a brand to view more information (Coming Soon...)</p>
            </div>
        </div>
    </section>







    <style>
        .main-footer {
            background-color: #1a1a1a;
            color: #d1d1d1;
            padding-top: 70px;
            padding-bottom: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .footer-title {
            color: #ffffff;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 25px;
            position: relative;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 40px;
            height: 2px;
            background-color: #007bff;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: #d1d1d1;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            color: #007bff;
            padding-left: 8px;
        }

        /* .social-icons a {
            width: 38px;
            height: 38px;
            background-color: #333;
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-right: 10px;
            transition: 0.3s;
            text-decoration: none;
        }

        .social-icons a:hover {
            background-color: #007bff;
            transform: translateY(-3px);
        } */

        .newsletter-form .form-control {
            background-color: #333;
            border: none;
            color: #fff;
            border-radius: 5px 0 0 5px;
        }

        .newsletter-form .btn {
            border-radius: 0 5px 5px 0;
        }

        .footer-bottom {
            border-top: 1px solid #333;
            padding-top: 20px;
            margin-top: 50px;
            font-size: 14px;
        }




        .social-scroll-wrapper {
            display: flex;
            gap: 15px;
            height: 50px;
            /* એક સમયે એક જ આઇકન દેખાય તે માટે */
            overflow: hidden;
            padding: 5px;
            background: transparent;
            width: fit-content;
        }

        /* કોલમ સેટિંગ */
        .social-col {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        /* આઇકન ડિઝાઇન */
        .social-col a {
            width: 40px;
            height: 40px;
            background-color: #333;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            text-decoration: none;
            transition: 0.3s;
            flex-shrink: 0;
        }

        .social-col a:hover {
            background-color: #007bff;
            color: white;
        }

        /* એનિમેશન ૧: ઉપરથી નીચે (Up to Down) */
        .up-to-down {
            animation: scrollUpToDown 4s ease-in-out infinite alternate;
        }

        /* એનિમેશન ૨: નીચેથી ઉપર (Down to Up) */
        .down-to-up {
            animation: scrollDownToUp 4s ease-in-out infinite alternate;
        }

        /* હોવર કરવા પર એનિમેશન અટકાવવા માટે */
        .social-scroll-wrapper:hover .social-col {
            animation-play-state: paused;
        }

        /* Keyframes - ઉપરથી નીચે માટે */
        @keyframes scrollUpToDown {
            0% {
                transform: translateY(-100%);
            }

            100% {
                transform: translateY(0%);
            }
        }

        /* Keyframes - નીચેથી ઉપર માટે */
        @keyframes scrollDownToUp {
            0% {
                transform: translateY(0%);
            }

            100% {
                transform: translateY(-100%);
            }
        }
    </style>




    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <h4 class="text-white fw-bold mb-4">LUXURY<span class="text-primary">BRANDS</span></h4>
                    <p class="mb-4">અમે વિશ્વની શ્રેષ્ઠ લક્ઝરી બ્રાન્ડ્સને એક જ પ્લેટફોર્મ પર લાવીએ છીએ. ગુણવત્તા અને
                        વિશ્વાસ એ અમારી ઓળખ છે. તમારી મનપસંદ બ્રાન્ડ્સ હવે એક ક્લિક દૂર.</p>


                    <div class="social-scroll-wrapper">
                        <div class="social-col up-to-down">
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-instagram"></i></a>
                        </div>

                        <div class="social-col down-to-up">
                            <a href="#"><i class="bi bi-whatsapp"></i></a>
                            <a href="#"><i class="bi bi-instagram"></i></a>
                        </div>

                        <div class="social-col up-to-down">
                            <a href="#"><i class="bi bi-twitter-x"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div>

                        <div class="social-col down-to-up">

                            <a href="#"><i class="bi bi-telegram"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h6 class="footer-title">Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">All Brands</a></li>
                        <li><a href="#">New Arrivals</a></li>
                        <li><a href="#">Customer Reviews</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h6 class="footer-title">Contact Info</h6>
                    <ul class="footer-links">
                        <li><i class="bi bi-geo-alt-fill text-primary me-2"></i> 123, Brand Plaza, Rajkot, Gujarat</li>
                        <li><i class="bi bi-telephone-fill text-primary me-2"></i> +91 98765 43210</li>
                        <li><i class="bi bi-envelope-fill text-primary me-2"></i> info@luxurybrands.com</li>
                        <li><i class="bi bi-clock-fill text-primary me-2"></i> Mon - Sat: 10:00 AM - 08:00 PM</li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6 class="footer-title">Newsletter</h6>
                    <p class="small">નવી ઓફર્સ અને બ્રાન્ડ લોન્ચની અપડેટ મેળવવા માટે સબ્સ્ક્રાઇબ કરો.</p>
                    <form class="newsletter-form mt-3">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Email Address">
                            <button class="btn btn-primary" type="button">Join</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="footer-bottom text-center">
                <div class="row align-items-center">
                    <div class="col-md-6 text-md-start">
                        <p class="mb-0">&copy; 2026 Luxury Brands. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" height="20"
                            class="me-3" alt="Paypal">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" height="15"
                            class="me-3" alt="Visa">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" height="20"
                            alt="Mastercard">
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <style>
        /* બેજનું મેઈન કન્ટેનર */
        .badge-container {
            position: absolute;
            /* પેજની સાથે રહેશે */
            top: 130px;
            right: 30px;
            /* જમણી બાજુ રાખવા માટે */
            width: 120px;
            height: 120px;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* કરકરિયા વાળો આકાર (Zig-Zag Shape) */
        .zigzag-badge {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: #ffc107;
            /* પીળો કલર */
            /* આ કોડ કરકરિયા આકાર બનાવે છે */
            clip-path: polygon(100% 50%, 94% 63%, 98% 76%, 85% 81%, 81% 94%, 68% 93%, 50% 100%, 37% 93%, 24% 94%, 19% 81%, 5% 76%, 10% 63%, 0% 50%, 10% 37%, 5% 24%, 19% 19%, 24% 6%, 37% 7%, 50% 0%, 63% 7%, 76% 6%, 81% 19%, 95% 24%, 90% 37%);
            animation: rotateBadge 10s linear infinite;
            /* ગોળ ફરવા માટે */
        }

        /* અંદરનું લખાણ */
        .badge-text {
            position: relative;
            z-index: 2;
            text-align: center;
            font-weight: bold;
            color: #000;
            font-size: 14px;
            line-height: 1.2;
            pointer-events: none;
            /* ક્લિક આઈકન પર જાય તે માટે */
        }

        /* ગોળ ફરવાનું એનિમેશન */
        @keyframes rotateBadge {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        /* જો બીજી બાજુ (ડાબી બાજુ) પણ જોઈએ તો આ ક્લાસ વાપરો */
        .badge-left {
            right: auto;
            left: 30px;
        }
    </style>

    <div class="badge-container">
        <div class="zigzag-badge"></div>
        <div class="badge-text">BEST<br>QUALITY</div>
    </div>

    <div class="badge-container badge-left">
        <div class="zigzag-badge" style="background-color: #007bff;"></div>
        <div class="badge-text text-white">#1<br>BRAND</div>
    </div>




















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>