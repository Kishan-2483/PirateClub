<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIRATES.in - Gourmet Dining Experience</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2a9d8f;
            --secondary-color: #264653;
            --accent-color: #e9c46a;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #28a745;
            --warning-color: #fd7e14;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Playfair Display', Georgia, serif;
            margin: 0;
            padding: 0;
            color: var(--dark-color); 
            background-color: var(--light-color);
            line-height: 1.6;
        }
  
        header {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80') no-repeat center center/cover;
            color: white;
            padding: 2rem;
            text-align: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(to top, var(--light-color), transparent);
        }

        .header-content {
            max-width: 800px;
            margin: 0 auto;
            z-index: 1;
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            font-size: 4rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            font-weight: 700;
        }

        .tagline {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            font-style: italic;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .scroll-down {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 2rem;
            animation: bounce 2s infinite;
            cursor: pointer;
            z-index: 2;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0) translateX(-50%); }
            40% { transform: translateY(-20px) translateX(-50%); }
            60% { transform: translateY(-10px) translateX(-50%); }
        }

        nav {
            position: sticky;
            top: 0;
            background-color: var(--secondary-color);
            padding: 1rem;
            z-index: 100;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .logo i {
            margin-right: 0.5rem;
            color: var(--accent-color);
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            margin: 0 1rem;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a:hover {
            color: var(--accent-color);
            background-color: rgba(255, 255, 255, 0.1);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background-color: var(--accent-color);
            transition: all 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 70%;
            left: 15%;
        }

        .hamburger {
            display: none;
            cursor: pointer;
            color: white;
            font-size: 1.5rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: var(--secondary-color);
            display: inline-block;
            padding-bottom: 1rem;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }

        .about {
            background-color: white;
            padding: 4rem 2rem;
            text-align: center;
        }

        .about-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .about p {
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            color: #555;
        }

        .highlight {
            color: var(--primary-color);
            font-weight: bold;
        }

        .menu {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }

        .menu-item {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }

        .menu-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .menu-item-img {
            height: 200px;
            overflow: hidden;
        }

        .menu-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .menu-item:hover img {
            transform: scale(1.1);
        }

        .menu-item-content {
            padding: 1.5rem;
        }

        .menu-item h3 {
            font-size: 1.4rem;
            margin-bottom: 0.5rem;
            color: var(--secondary-color);
        }

        .menu-item p {
            color: #666;
            margin-bottom: 1rem;
        }

        .price {
            font-weight: bold;
            color: var(--primary-color);
            font-size: 1.2rem;
            margin-bottom: 1rem;
            display: block;
        }

        .item-controls {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1rem;
        }

        .flavor-select {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 1rem;
            font-family: inherit;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
        }

        .quantity-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .quantity-btn:hover {
            background-color: var(--secondary-color);
        }

        .quantity {
            margin: 0 1rem;
            font-weight: bold;
            min-width: 20px;
            text-align: center;
        }

        .order-section {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-top: 3rem;
            position: sticky;
            top: 80px;
        }

        .order-title {
            text-align: center;
            margin-bottom: 1.5rem;
            color: var(--secondary-color);
            font-size: 1.8rem;
        }

        .order-list {
            border: 1px solid #eee;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            max-height: 400px;
            overflow-y: auto;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px dashed #eee;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .order-item-name {
            flex: 2;
        }

        .order-item-quantity {
            flex: 1;
            text-align: center;
        }

        .order-item-price {
            flex: 1;
            text-align: right;
        }

        .order-total {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            font-size: 1.2rem;
            padding: 1rem 0;
            border-top: 2px solid var(--primary-color);
            margin-top: 1rem;
        }

        .empty-order {
            text-align: center;
            color: #888;
            padding: 2rem 0;
        }

        .order-actions {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            flex: 1;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: var(--secondary-color);
            color: white;
        }

        .btn-secondary:hover {
            background-color: #1a252f;
            transform: translateY(-2px);
        }

        .btn-accent {
            background-color: var(--accent-color);
            color: var(--dark-color);
        }

        .btn-accent:hover {
            background-color: #e0b85e;
            transform: translateY(-2px);
        }

        .contact-form, .booking-form {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: var(--secondary-color);
        }

        .form-control {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: inherit;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(42, 157, 143, 0.2);
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            width: 100%;
            padding: 1rem;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }

        .testimonials {
            background-color: #f8f9fa;
            padding: 4rem 2rem;
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .testimonial {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            position: relative;
        }

        .testimonial::before {
            content: '"';
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 4rem;
            color: rgba(42, 157, 143, 0.1);
            font-family: Georgia, serif;
            line-height: 1;
        }

        .testimonial-content {
            margin-bottom: 1.5rem;
            font-style: italic;
            color: #555;
            position: relative;
            z-index: 1;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
        }

        .author-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 1rem;
        }

        .author-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .author-info h4 {
            margin-bottom: 0.2rem;
            color: var(--secondary-color);
        }

        .author-info p {
            color: #888;
            font-size: 0.9rem;
        }

        .gallery {
            padding: 4rem 2rem;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1rem;
            margin-top: 2rem;
        }

        .gallery-item {
            height: 200px;
            overflow: hidden;
            border-radius: 8px;
            position: relative;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover {
            transform: scale(1.03);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-overlay i {
            color: white;
            font-size: 2rem;
        }

        footer {
            background-color: var(--secondary-color);
            color: white;
            padding: 3rem 2rem 1.5rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-column h3 {
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .footer-column h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: var(--accent-color);
        }

        .footer-column p {
            margin-bottom: 1rem;
            color: #ddd;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background-color: var(--accent-color);
            color: var(--dark-color);
            transform: translateY(-3px);
        }

        .quick-links {
            list-style: none;
        }

        .quick-links li {
            margin-bottom: 0.5rem;
        }

        .quick-links a {
            color: #ddd;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .quick-links a:hover {
            color: var(--accent-color);
        }

        .contact-info {
            list-style: none;
        }

        .contact-info li {
            margin-bottom: 1rem;
            display: flex;
            align-items: flex-start;
        }

        .contact-info i {
            margin-right: 1rem;
            color: var(--accent-color);
        }

        .newsletter-form {
            display: flex;
            margin-top: 1rem;
        }

        .newsletter-input {
            flex: 1;
            padding: 0.8rem;
            border: none;
            border-radius: 4px 0 0 4px;
            font-family: inherit;
        }

        .newsletter-btn {
            padding: 0 1.5rem;
            background-color: var(--accent-color);
            color: var(--dark-color);
            border: none;
            border-radius: 0 4px 4px 0;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .newsletter-btn:hover {
            background-color: #e0b85e;
        }

        .copyright {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #aaa;
            font-size: 0.9rem;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            max-width: 800px;
            width: 90%;
            max-height: 90vh;
            overflow: hidden;
            position: relative;
        }

        .modal-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .close-modal {
            position: absolute;
            top: 20px;
            right: 20px;
            color: white;
            font-size: 2rem;
            cursor: pointer;
            background-color: rgba(0, 0, 0, 0.5);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Payment Modal */
        .payment-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .payment-content {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            width: 90%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
        }

        .payment-title {
            text-align: center;
            margin-bottom: 1.5rem;
            color: var(--secondary-color);
            font-size: 1.8rem;
        }

        .payment-methods {
            margin-bottom: 2rem;
        }

        .payment-method {
            display: flex;
            align-items: center;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .payment-method:hover {
            border-color: var(--primary-color);
            background-color: rgba(42, 157, 143, 0.05);
        }

        .payment-method.active {
            border-color: var(--primary-color);
            background-color: rgba(42, 157, 143, 0.1);
        }

        .payment-method i {
            font-size: 1.5rem;
            margin-right: 1rem;
            color: var(--primary-color);
        }

        .payment-details {
            display: none;
            margin-top: 1rem;
            padding: 1rem;
            border: 1px solid #eee;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .payment-details.active {
            display: block;
        }

        .payment-summary {
            margin: 1.5rem 0;
            padding: 1rem;
            border: 1px solid #eee;
            border-radius: 8px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .summary-total {
            font-weight: bold;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #eee;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
                position: absolute;
                top: 70px;
                left: 0;
                width: 100%;
                background-color: var(--secondary-color);
                flex-direction: column;
                padding: 1rem;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .nav-links.active {
                display: flex;
            }

            .nav-links a {
                margin: 0.5rem 0;
            }

            .hamburger {
                display: block;
            }

            h1 {
                font-size: 2.5rem;
            }

            .tagline {
                font-size: 1.2rem;
            }

            .order-section {
                position: static;
                margin-top: 2rem;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }
        }

        /* Animations */
        @keyframes slideIn {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .animate {
            animation: slideIn 0.8s ease forwards;
        }

        .delay-1 { animation-delay: 0.2s; }
        .delay-2 { animation-delay: 0.4s; }
        .delay-3 { animation-delay: 0.6s; }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <h1>THE FOOD PIRATES</h1>
            <p class="tagline">Savor the Flavors of the Seven Seas</p>
            <a href="#about" class="btn btn-accent">Explore Our Menu</a>
        </div>
        <a href="#about" class="scroll-down">
            <i class="fas fa-chevron-down"></i>
        </a>
    </header>

    <nav>
        <div class="nav-container">
            <a href="#" class="logo">
                <i class="fas fa-utensils"></i> PIRATES.in
            </a>
            <div class="hamburger" id="hamburger">
                <i class="fas fa-bars"></i>
            </div>
            <ul class="nav-links" id="navLinks">
                <li><a href="ResturentLogin.php">Login</a></li>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#book-table">Reservations</a></li>
            </ul>
        </div>
    </nav>

    <section id="about" class="about">
        <div class="container">
            <div class="section-title animate">
                <h2>Our Story</h2>
            </div>
            <div class="about-content animate delay-1">
                <p>Founded in 2015, <span class="highlight">THE FOOD PIRATES</span> has been serving culinary treasures from around the world. Our chefs are like modern-day pirates, exploring global cuisines to bring you the most exquisite flavors.</p>
                <p>We believe in using only the <span class="highlight">freshest ingredients</span>, sourced locally whenever possible, to create dishes that are both delicious and memorable. Every meal is an adventure at our restaurant.</p>
                <p>Whether you're looking for a romantic dinner, family gathering, or business lunch, our <span class="highlight">nautical-themed ambiance</span> and exceptional service will make your experience unforgettable.</p>
            </div>
        </div>
    </section>
    
        <section id="menu" class="container">
            <div class="section-title animate">
                <h2>Our Treasure Menu</h2>
            </div>
            
            <div class="menu">
                <!-- Appetizers -->
                <div class="menu-item animate delay-1">
                    <div class="menu-item-img">
                        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1681&q=80" alt="Pizza">
                    </div>
                    <div class="menu-item-content">
                        <h3>Captain's Pizza</h3>
                        <p>Hand-tossed dough with our signature tomato sauce and premium toppings.</p>
                        <span class="price">$12.99</span>
                        <select class="flavor-select">
                            <option>Margherita</option>
                            <option>Pepperoni</option>
                            <option>BBQ Chicken</option>
                            <option>Veggie Supreme</option>
                        </select>
                        <div class="item-controls">
                            <div class="quantity-controls">
                                <button class="quantity-btn" onclick="decrementCount(this)">-</button>
                                <span class="quantity">0</span>
                                <button class="quantity-btn" onclick="incrementCount(this)">+</button>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="menu-item animate delay-2">
                    <div class="menu-item-img">
                        <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1599&q=80" alt="Burger">
                    </div>
                    <div class="menu-item-content">
                        <h3>Blackbeard's Burger</h3>
                        <p>Juicy beef patty with melted cheese, crispy bacon, and secret sauce.</p>
                        <span class="price">$9.99</span>
                        <select class="flavor-select">
                            <option>Classic</option>
                            <option>Double Cheese</option>
                            <option>Mushroom Swiss</option>
                            <option>Spicy Jalapeño</option>
                        </select>
                        <div class="item-controls">
                            <div class="quantity-controls">
                                <button class="quantity-btn" onclick="decrementCount(this)">-</button>
                                <span class="quantity">0</span>
                                <button class="quantity-btn" onclick="incrementCount(this)">+</button>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="menu-item animate delay-3">
                    <div class="menu-item-img">
                        <img src="https://images.unsplash.com/photo-1555949258-eb67b1ef0ceb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Pasta">
                    </div>
                    <div class="menu-item-content">
                        <h3>Mariner's Pasta</h3>
                        <p>Al dente pasta with your choice of sauce and fresh ingredients.</p>
                        <span class="price">$14.99</span>
                        <select class="flavor-select">
                            <option>Alfredo</option>
                            <option>Marinara</option>
                            <option>Pesto</option>
                            <option>Arrabbiata</option>
                        </select>
                        <div class="item-controls">
                            <div class="quantity-controls">
                                <button class="quantity-btn" onclick="decrementCount(this)">-</button>
                                <span class="quantity">0</span>
                                <button class="quantity-btn" onclick="incrementCount(this)">+</button>
                            </div>
                        </div>
                    </div>
                </div>
        
                <!-- Main Courses -->
                <div class="menu-item animate delay-1">
                    <div class="menu-item-img">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1480&q=80" alt="Salad">
                    </div>
                    <div class="menu-item-content">
                        <h3>Treasure Island Salad</h3>
                        <p>Fresh greens with seasonal vegetables, nuts, and house dressing.</p>
                        <span class="price">$8.99</span>
                        <select class="flavor-select">
                            <option>Caesar</option>
                            <option>Greek</option>
                            <option>Asian</option>
                            <option>House</option>
                        </select>
                        <div class="item-controls">
                            <div class="quantity-controls">
                                <button class="quantity-btn" onclick="decrementCount(this)">-</button>
                                <span class="quantity">0</span>
                                <button class="quantity-btn" onclick="incrementCount(this)">+</button>
                            </div>
                        </div>
                    </div>
                </div>
        
                <!-- New Appetizers -->
                <div class="menu-item animate delay-2">
                    <div class="menu-item-img">
                        <img src="https://i.pinimg.com/474x/07/10/55/071055249e27852a2e9341ed25fe239d.jpg" alt="Bruschetta">
                    </div>
                    <div class="menu-item-content">
                        <h3>Ship's Deck Bruschetta</h3>
                        <p>Toasted bread topped with tomatoes, garlic, fresh basil and olive oil.</p>
                        <span class="price">$7.99</span>
                        <select class="flavor-select">
                            <option>Classic Tomato</option>
                            <option>Mushroom & Cheese</option>
                            <option>Avocado & Feta</option>
                            <option>Fig & Goat Cheese</option>
                        </select>
                        <div class="item-controls">
                            <div class="quantity-controls">
                                <button class="quantity-btn" onclick="decrementCount(this)">-</button>
                                <span class="quantity">0</span>
                                <button class="quantity-btn" onclick="incrementCount(this)">+</button>
                            </div>
                        </div>
                    </div>
                </div>
        
                <!-- Beverages -->
                <div class="menu-item animate delay-3">
                    <div class="menu-item-img">
                        <img src="https://i.pinimg.com/474x/a7/16/8d/a7168d758e6f36144aed9a241d119414.jpg" alt="Smoothie">
                    </div>
                    <div class="menu-item-content">
                        <h3>Tropical Storm Smoothie</h3>
                        <p>Refreshing blended fruits with your choice of base and add-ons.</p>
                        <span class="price">$6.99</span>
                        <select class="flavor-select">
                            <option>Strawberry Banana</option>
                            <option>Mango Tango</option>
                            <option>Berry Blast</option>
                            <option>Green Detox</option>
                        </select>
                        <div class="item-controls">
                            <div class="quantity-controls">
                                <button class="quantity-btn" onclick="decrementCount(this)">-</button>
                                <span class="quantity">0</span>
                                <button class="quantity-btn" onclick="incrementCount(this)">+</button>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="menu-item animate delay-1">
                    <div class="menu-item-img">
                        <img src="https://images.unsplash.com/photo-1517701550927-30cf4ba1dba5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Cold Coffee">
                    </div>
                    <div class="menu-item-content">
                        <h3>Captain's Cold Brew</h3>
                        <p>Premium cold brew coffee with customizable flavors and toppings.</p>
                        <span class="price">$5.99</span>
                        <select class="flavor-select">
                            <option>Classic Black</option>
                            <option>Vanilla Sweet Cream</option>
                            <option>Caramel Swirl</option>
                            <option>Mocha Madness</option>
                        </select>
                        <div class="item-controls">
                            <div class="quantity-controls">
                                <button class="quantity-btn" onclick="decrementCount(this)">-</button>
                                <span class="quantity">0</span>
                                <button class="quantity-btn" onclick="incrementCount(this)">+</button>
                            </div>
                        </div>
                    </div>
                </div>
        
                <!-- Bakery Items -->
                <div class="menu-item animate delay-2">
                    <div class="menu-item-img">
                        <img src="https://images.unsplash.com/photo-1550617931-e17a7b70dce2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Muffins">
                    </div>
                    <div class="menu-item-content">
                        <h3>Pirate's Muffins</h3>
                        <p>Freshly baked muffins perfect for breakfast or a snack.</p>
                        <span class="price">$3.99</span>
                        <select class="flavor-select">
                            <option>Blueberry</option>
                            <option>Chocolate Chip</option>
                            <option>Banana Nut</option>
                            <option>Double Chocolate</option>
                        </select>
                        <div class="item-controls">
                            <div class="quantity-controls">
                                <button class="quantity-btn" onclick="decrementCount(this)">-</button>
                                <span class="quantity">0</span>
                                <button class="quantity-btn" onclick="incrementCount(this)">+</button>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="menu-item animate delay-3">
                    <div class="menu-item-img">
                        <img src="https://images.unsplash.com/photo-1563805042-7684c019e1cb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1527&q=80" alt="Dessert">
                    </div>
                    <div class="menu-item-content">
                        <h3>Pirate's Booty Dessert</h3>
                        <p>Decadent chocolate cake with gold leaf and raspberry coulis.</p>
                        <span class="price">$7.99</span>
                        <div class="item-controls">
                            <div class="quantity-controls">
                                <button class="quantity-btn" onclick="decrementCount(this)">-</button>
                                <span class="quantity">0</span>
                                <button class="quantity-btn" onclick="incrementCount(this)">+</button>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="menu-item animate delay-1">
                    <div class="menu-item-img">
                        <img src="https://i.pinimg.com/474x/5c/ae/64/5cae64ad581f68d92250f9a9f09e49ea.jpg" alt="Waffles">
                    </div>
                    <div class="menu-item-content">
                        <h3>Golden Waffles</h3>
                        <p>Crispy golden waffles with your choice of toppings.</p>
                        <span class="price">$8.99</span>
                        <select class="flavor-select">
                            <option>Classic with Maple Syrup</option>
                            <option>Berry Compote</option>
                            <option>Chocolate & Banana</option>
                            <option>Fried Chicken & Honey</option>
                        </select>
                        <div class="item-controls">
                            <div class="quantity-controls">
                                <button class="quantity-btn" onclick="decrementCount(this)">-</button>
                                <span class="quantity">0</span>
                                <button class="quantity-btn" onclick="incrementCount(this)">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="order-section animate">
                <h3 class="order-title">Your Plunder</h3>
                <div id="orderList" class="order-list">
                    <p class="empty-order">No items added yet. Start adding items to your order!</p>
                </div>
                <div id="orderTotal" class="order-total" style="display: none;">
                    <span>Total:</span>
                    <span id="totalAmount">$0.00</span>
                </div>
                <div class="order-actions">
                    <button class="btn btn-secondary" onclick="clearOrder()">Clear Order</button>
                    <button class="btn btn-primary" onclick="showPaymentModal()">Proceed to Payment</button>
                </div>
            </div>
        </section>

    <section id="gallery" class="gallery">
        <div class="container">
            <div class="section-title animate">
                <h2>Gallery</h2>
            </div>
            <div class="gallery-grid">
                <div class="gallery-item animate delay-1">
                    <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Restaurant Interior">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item animate delay-2">
                    <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Chef Preparing Food">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item animate delay-3">
                    <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Plated Dish">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item animate delay-1">
                    <img src="https://images.unsplash.com/photo-1555244162-803834f70033?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Bar Area">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item animate delay-2">
                    <img src="https://images.unsplash.com/photo-1544025162-d76694265947?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1469&q=80" alt="Outdoor Seating">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item animate delay-3">
                    <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Specialty Drink">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact" class="container">
        <div class="section-title animate">
            <h2>Contact Us</h2>
        </div>
        <div class="contact-form animate delay-1">
            <form id="contactForm">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" class="form-control" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </div>
    </section>

    <section id="book-table" class="container">
        <div class="section-title animate">
            <h2>Reservations</h2>
        </div>
        <div class="booking-form animate delay-1">
            <form id="bookingForm">
                <div class="form-group">
                    <label for="reservation-name">Name</label>
                    <input type="text" id="reservation-name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="reservation-email">Email</label>
                    <input type="email" id="reservation-email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="reservation-phone">Phone</label>
                    <input type="tel" id="reservation-phone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="reservation-date">Date</label>
                    <input type="date" id="reservation-date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="reservation-time">Time</label>
                    <input type="time" id="reservation-time" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="reservation-guests">Number of Guests</label>
                    <select id="reservation-guests" class="form-control" required>
                        <option value="1">1 Person</option>
                        <option value="2">2 People</option>
                        <option value="3">3 People</option>
                        <option value="4">4 People</option>
                        <option value="5">5 People</option>
                        <option value="6">6 People</option>
                        <option value="7">7 People</option>
                        <option value="8">8+ People</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="reservation-notes">Special Requests</label>
                    <textarea id="reservation-notes" class="form-control"></textarea>
                </div>
                <button type="submit" class="submit-btn">Book Table</button>
            </form>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div class="footer-column">
                <h3>About PIRATES.in</h3>
                <p>We're a culinary adventure on the high seas of flavor, bringing you the finest dishes from around the world in a unique pirate-themed setting.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-column">
                <h3>Quick Links</h3>
                <ul class="quick-links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#menu">Menu</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#testimonials">Testimonials</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#book-table">Reservations</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Contact Info</h3>
                <ul class="contact-info">
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <span>East Blue, Log Post,Grand Line</span>
                    </li>
                    <li>
                        <i class="fas fa-phone"></i>
                        <span>+91-8299425612</span>
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <span>info@pirates.in</span>
                    </li>
                    <li>
                        <i class="fas fa-clock"></i>
                        <span>Mon-Fri: 11AM - 10PM<br>Sat-Sun: 10AM - 11PM</span>
                    </li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Newsletter</h3>
                <p>Subscribe to our newsletter for special offers and updates.</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Your Email" class="newsletter-input" required>
                    <button type="submit" class="newsletter-btn">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2025 PIRATES.in - All Rights Reserved</p>
        </div>
    </footer>

    <!-- Image Modal -->
    <div class="modal" id="imageModal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal()">&times;</span>
            <img src="" alt="" class="modal-img" id="modalImage">
        </div>
    </div>

    <!-- Payment Modal -->
    <div class="payment-modal" id="paymentModal">
        <div class="payment-content">
            <span class="close-modal" onclick="closePaymentModal()">&times;</span>
            <h3 class="payment-title">Payment Information</h3>
            
            <div class="payment-summary">
                <h4>Order Summary</h4>
                <div id="paymentOrderItems"></div>
                <div class="summary-total">
                    <span>Total:</span>
                    <span id="paymentTotalAmount">$0.00</span>
                </div>
            </div>
            
            <div class="payment-methods">
                <h4>Select Payment Method</h4>
                <div class="payment-method" onclick="selectPaymentMethod(this, 'card')">
                    <i class="far fa-credit-card"></i>
                    <span>Credit/Debit Card</span>
                </div>
                <div class="payment-details" id="cardDetails">
                    <div class="form-group">
                        <label for="card-number">Card Number</label>
                        <input type="text" id="card-number" class="form-control" placeholder="1234 5678 9012 XXXX">
                    </div>
                    <div class="form-group">
                        <label for="card-name">Name on Card</label>
                        <input type="text" id="card-name" class="form-control" placeholder="XZY ZYX">
                    </div>
                    <div class="form-row" style="display: flex; gap: 1rem;">
                        <div class="form-group" style="flex: 1;">
                            <label for="card-expiry">Expiry Date</label>
                            <input type="text" id="card-expiry" class="form-control" placeholder="MM/YY">
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label for="card-cvv">CVV</label>
                            <input type="text" id="card-cvv" class="form-control" placeholder="1XX">
                        </div>
                    </div>
                </div>
                
                <div class="payment-method" onclick="selectPaymentMethod(this, 'paypal')">
                    <i class="fab fa-paypal"></i>
                    <span>PayPal</span>
                </div>
                <div class="payment-details" id="paypalDetails">
                    <p>You will be redirected to PayPal to complete your payment securely.</p>
                </div>
                
                <div class="payment-method" onclick="selectPaymentMethod(this, 'cash')">
                    <i class="fas fa-money-bill-wave"></i>
                    <span>Cash on Delivery</span>
                </div>
                <div class="payment-details" id="cashDetails">
                    <p>Pay with cash when your order arrives.</p>
                </div>
            </div>
            
            <div class="form-group">
                <label for="delivery-address">Delivery Address</label>
                <textarea id="delivery-address" class="form-control" rows="3" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="special-instructions">Special Instructions</label>
                <textarea id="special-instructions" class="form-control" rows="2"></textarea>
            </div>
            
            <button class="btn btn-primary" style="width: 100%;" onclick="processPayment()">Complete Payment</button>
        </div>
    </div>

    <script>
        // Mobile Navigation
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.getElementById('navLinks');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                navLinks.classList.remove('active');
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 70,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Quantity controls
        function incrementCount(button) {
            const quantityElement = button.parentElement.querySelector('.quantity');
            let quantity = parseInt(quantityElement.textContent);
            quantityElement.textContent = quantity + 1;
            updateOrder(button.closest('.menu-item'));
        }

        function decrementCount(button) {
            const quantityElement = button.parentElement.querySelector('.quantity');
            let quantity = parseInt(quantityElement.textContent);
            if (quantity > 0) {
                quantityElement.textContent = quantity - 1;
                updateOrder(button.closest('.menu-item'));
            }
        }

        // Order management
        let orderItems = [];

        function updateOrder(menuItem) {
            const itemName = menuItem.querySelector('h3').textContent;
            const itemPrice = parseFloat(menuItem.querySelector('.price').textContent.replace('$', ''));
            const itemQuantity = parseInt(menuItem.querySelector('.quantity').textContent);
            const flavorSelect = menuItem.querySelector('.flavor-select');
            const itemFlavor = flavorSelect ? flavorSelect.options[flavorSelect.selectedIndex].text : '';

            // Check if item already exists in order
            const existingItemIndex = orderItems.findIndex(item => 
                item.name === itemName && (!flavorSelect || item.flavor === itemFlavor)
            );

            if (itemQuantity > 0) {
                if (existingItemIndex !== -1) {
                    // Update existing item
                    orderItems[existingItemIndex].quantity = itemQuantity;
                } else {
                    // Add new item
                    orderItems.push({
                        name: itemName,
                        flavor: itemFlavor,
                        price: itemPrice,
                        quantity: itemQuantity
                    });
                }
            } else if (existingItemIndex !== -1) {
                // Remove item if quantity is 0
                orderItems.splice(existingItemIndex, 1);
            }

            renderOrder();
        }

        function renderOrder() {
            const orderList = document.getElementById('orderList');
            const orderTotal = document.getElementById('orderTotal');

            if (orderItems.length === 0) {
                orderList.innerHTML = '<p class="empty-order">No items added yet. Start adding items to your order!</p>';
                orderTotal.style.display = 'none';
                return;
            }

            let html = '';
            let total = 0;

            orderItems.forEach(item => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;

                html += `
                    <div class="order-item">
                        <div class="order-item-name">
                            ${item.name}${item.flavor ? ` (${item.flavor})` : ''}
                        </div>
                        <div class="order-item-quantity">
                            ${item.quantity}
                        </div>
                        <div class="order-item-price">
                            $${itemTotal.toFixed(2)}
                        </div>
                    </div>
                `;
            });

            orderList.innerHTML = html;
            document.getElementById('totalAmount').textContent = `$${total.toFixed(2)}`;
            orderTotal.style.display = 'flex';
        }

        function clearOrder() {
            orderItems = [];
            renderOrder();
            
            // Reset all quantity counters
            document.querySelectorAll('.quantity').forEach(element => {
                element.textContent = '0';
            });
        }

        function showPaymentModal() {
            if (orderItems.length === 0) {
                alert('Please add items to your order first!');
                return;
            }

            // Update payment summary
            const paymentOrderItems = document.getElementById('paymentOrderItems');
            let html = '';
            let total = 0;

            orderItems.forEach(item => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;

                html += `
                    <div class="summary-item">
                        <span>${item.quantity} × ${item.name}${item.flavor ? ` (${item.flavor})` : ''}</span>
                        <span>$${itemTotal.toFixed(2)}</span>
                    </div>
                `;
            });

            paymentOrderItems.innerHTML = html;
            document.getElementById('paymentTotalAmount').textContent = `$${total.toFixed(2)}`;

            // Show payment modal
            document.getElementById('paymentModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closePaymentModal() {
            document.getElementById('paymentModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function selectPaymentMethod(element, method) {
            // Remove active class from all payment methods
            document.querySelectorAll('.payment-method').forEach(el => {
                el.classList.remove('active');
            });
            
            // Hide all payment details
            document.querySelectorAll('.payment-details').forEach(el => {
                el.classList.remove('active');
            });
            
            // Add active class to selected method
            element.classList.add('active');
            
            // Show corresponding payment details
            document.getElementById(`${method}Details`).classList.add('active');
        }

        function processPayment() {
            const address = document.getElementById('delivery-address').value;
            if (!address) {
                alert('Please enter a delivery address');
                return;
            }

            const paymentMethod = document.querySelector('.payment-method.active');
            if (!paymentMethod) {
                alert('Please select a payment method');
                return;
            }

            const method = paymentMethod.querySelector('span').textContent;
            const total = document.getElementById('paymentTotalAmount').textContent;
            
            // Here you would typically send the payment details to your server
            // For this demo, we'll just show a success message
            alert(`Payment successful!\nMethod: ${method}\nTotal: ${total}\nThank you for your order!`);
            
            // Clear the order and close the modal
            clearOrder();
            closePaymentModal();
        }

        // Form submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Thank you for your message! We will get back to you soon.');
            this.reset();
        });

        document.getElementById('bookingForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const name = document.getElementById('reservation-name').value;
            alert(`Thank you, ${name}! Your reservation has been confirmed.`);
            this.reset();
        });

        // Image gallery modal
        const galleryItems = document.querySelectorAll('.gallery-item');
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');

        galleryItems.forEach(item => {
            item.addEventListener('click', function() {
                const imgSrc = this.querySelector('img').src;
                modalImg.src = imgSrc;
                modal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            });
        });

        function closeModal() {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside the image
        window.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
            if (e.target === document.getElementById('paymentModal')) {
                closePaymentModal();
            }
        });

        // Animation on scroll
        const animateElements = document.querySelectorAll('.animate');

        function checkAnimation() {
            animateElements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;
                
                if (elementTop < windowHeight - 100) {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }
            });
        }

        // Initial check
        checkAnimation();

        // Check on scroll
        window.addEventListener('scroll', checkAnimation);
    </script>
</body>
</html>