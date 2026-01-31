<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - CodeLearn</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://img.icons8.com/color/96/000000/code.png">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="">
                <i class="fas fa-code text-primary"></i> Code<span>Learn</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="courses.html">Courses</a>
                    </li>
                </ul>
                
                <div class="d-flex align-items-center">
                    <!-- User dropdown (shown when logged in) -->
                    <div class="dropdown" id="userDropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i> John Doe
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="profile.html"><i class="fas fa-user me-2"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#" id="logoutBtn"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Payment Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Progress Steps -->
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-center">
                                    <div class="bg-primary rounded-circle p-3 d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                        <span class="text-white fw-bold">1</span>
                                    </div>
                                    <p class="mb-0 fw-bold">Course Details</p>
                                </div>
                                
                                <div class="flex-grow-1 mx-3">
                                    <div class="progress" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 50%"></div>
                                    </div>
                                </div>
                                
                                <div class="text-center">
                                    <div class="bg-primary rounded-circle p-3 d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                        <span class="text-white fw-bold">2</span>
                                    </div>
                                    <p class="mb-0 fw-bold">Payment</p>
                                </div>
                                
                                <div class="flex-grow-1 mx-3">
                                    <div class="progress" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                                    </div>
                                </div>
                                
                                <div class="text-center">
                                    <div class="bg-light rounded-circle p-3 d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                        <span class="text-muted fw-bold">3</span>
                                    </div>
                                    <p class="mb-0 text-muted">Confirmation</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <!-- Order Summary -->
                        <div class="col-lg-5 mb-5 mb-lg-0">
                            <div class="card border-0 shadow-lg h-100">
                                <div class="card-body p-4">
                                    <h4 class="fw-bold mb-4">Order Summary</h4>
                                    
                                    <!-- Course Details -->
                                    <div class="d-flex mb-4">
                                        <div class="flex-shrink-0">
                                            <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" 
                                                 alt="Course" class="rounded" width="80" height="80" style="object-fit: cover;">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="fw-bold mb-1">Complete Web Development Bootcamp</h5>
                                            <p class="text-muted small mb-2">by Michael Johnson</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-primary fw-bold">$89.99</span>
                                                <span class="badge bg-primary">Web Development</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <hr>
                                    
                                    <!-- Pricing Details -->
                                    <div class="mb-4">
                                        <h5 class="fw-bold mb-3">Price Details</h5>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Course Price</span>
                                            <span>$89.99</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Discount</span>
                                            <span class="text-success">-$10.00</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Tax</span>
                                            <span>$5.40</span>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between fw-bold">
                                            <span>Total</span>
                                            <span>$85.39</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Features -->
                                    <div>
                                        <h5 class="fw-bold mb-3">What's Included</h5>
                                        <ul class="list-unstyled">
                                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Lifetime access to course</li>
                                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> 42 hours of video content</li>
                                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Downloadable resources</li>
                                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Certificate of completion</li>
                                            <li><i class="fas fa-check text-success me-2"></i> 30-day money-back guarantee</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Payment Form -->
                        <div class="col-lg-7">
                            <div class="card border-0 shadow-lg">
                                <div class="card-body p-4">
                                    <h4 class="fw-bold mb-4">Payment Details</h4>
                                    
                                    <form id="paymentForm">
                                        <!-- Payment Method -->
                                        <div class="mb-4">
                                            <label class="form-label fw-bold mb-3">Select Payment Method</label>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="form-check card payment-card">
                                                        <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard" checked>
                                                        <label class="form-check-label w-100" for="creditCard">
                                                            <div class="d-flex align-items-center">
                                                                <i class="fas fa-credit-card fa-2x text-primary me-3"></i>
                                                                <div>
                                                                    <h6 class="fw-bold mb-0">Credit/Debit Card</h6>
                                                                    <p class="text-muted small mb-0">Pay with Visa, Mastercard, etc.</p>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check card payment-card">
                                                        <input class="form-check-input" type="radio" name="paymentMethod" id="paypal">
                                                        <label class="form-check-label w-100" for="paypal">
                                                            <div class="d-flex align-items-center">
                                                                <i class="fab fa-paypal fa-2x text-primary me-3"></i>
                                                                <div>
                                                                    <h6 class="fw-bold mb-0">PayPal</h6>
                                                                    <p class="text-muted small mb-0">Pay with your PayPal account</p>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Card Details -->
                                        <div id="creditCardForm">
                                            <div class="mb-3">
                                                <label for="cardHolder" class="form-label">Card Holder Name</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                    <input type="text" class="form-control" id="cardHolder" placeholder="John Doe" required>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="cardNumber" class="form-label">Card Number</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-credit-card"></i>
                                                    </span>
                                                    <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456" maxlength="19" required>
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-4">
                                                <div class="col-md-6 mb-3 mb-md-0">
                                                    <label for="expiryDate" class="form-label">Expiry Date</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-calendar-alt"></i>
                                                        </span>
                                                        <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY" maxlength="5" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="cvv" class="form-label">CVV</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-lock"></i>
                                                        </span>
                                                        <input type="text" class="form-control" id="cvv" placeholder="123" maxlength="3" required>
                                                        <button class="btn btn-outline-secondary" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="3-digit security code on back of card">
                                                            <i class="fas fa-question-circle"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- PayPal Form (hidden by default) -->
                                        <div id="paypalForm" class="d-none">
                                            <div class="alert alert-info">
                                                <p class="mb-0">You will be redirected to PayPal to complete your payment after clicking "Pay Now".</p>
                                            </div>
                                            <div class="text-center">
                                                <i class="fab fa-paypal fa-4x text-primary mb-3"></i>
                                                <p>PayPal is a safer, easier way to pay online without revealing your card details.</p>
                                            </div>
                                        </div>
                                        
                                        <!-- Billing Address (Optional) -->
                                        <div class="mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="differentAddress">
                                                <label class="form-check-label" for="differentAddress">
                                                    Billing address is different from account address
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div id="billingAddress" class="d-none">
                                            <h5 class="fw-bold mb-3">Billing Address</h5>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="billingStreet" class="form-label">Street Address</label>
                                                    <input type="text" class="form-control" id="billingStreet">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="billingCity" class="form-label">City</label>
                                                    <input type="text" class="form-control" id="billingCity">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="billingState" class="form-label">State/Province</label>
                                                    <input type="text" class="form-control" id="billingState">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="billingZip" class="form-label">ZIP/Postal Code</label>
                                                    <input type="text" class="form-control" id="billingZip">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Terms & Conditions -->
                                        <div class="mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="terms" required>
                                                <label class="form-check-label" for="terms">
                                                    I agree to the <a href="#" class="text-decoration-none">Terms of Service</a> and authorize CodeLearn to charge my payment method for the total amount shown.
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <!-- Submit Button -->
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary btn-lg">
                                                <i class="fas fa-lock me-2"></i> Pay $85.39 Now
                                            </button>
                                        </div>
                                        
                                        <!-- Security Info -->
                                        <div class="text-center mt-4">
                                            <p class="text-muted small">
                                                <i class="fas fa-lock text-success me-1"></i>
                                                Your payment is secure and encrypted
                                            </p>
                                            <div class="d-flex justify-content-center gap-3">
                                                <img src="https://img.icons8.com/color/48/000000/visa.png" alt="Visa" width="40">
                                                <img src="https://img.icons8.com/color/48/000000/mastercard.png" alt="Mastercard" width="40">
                                                <img src="https://img.icons8.com/color/48/000000/amex.png" alt="Amex" width="40">
                                                <img src="https://img.icons8.com/color/48/000000/discover.png" alt="Discover" width="40">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            <!-- Back to Course -->
                            <div class="text-center mt-4">
                                <a href="course-details.html" class="text-decoration-none">
                                    <i class="fas fa-arrow-left me-2"></i> Back to Course Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="text-white mb-4">
                        <i class="fas fa-code"></i> Code<span>Learn</span>
                    </h5>
                    <p class="text-light">Empowering aspiring developers worldwide with quality programming education since 2020.</p>
                    <div class="d-flex mt-4">
                        <a href="#" class="text-light me-3"><i class="fab fa-facebook-f fa-lg"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-linkedin-in fa-lg"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-white mb-4">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="index.html">Home</a></li>
                        <li class="mb-2"><a href="courses.html">Courses</a></li>
                        <li class="mb-2"><a href="#">About Us</a></li>
                        <li class="mb-2"><a href="#">Contact</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-white mb-4">Categories</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">HTML/CSS</a></li>
                        <li class="mb-2"><a href="#">JavaScript</a></li>
                        <li class="mb-2"><a href="#">PHP/Laravel</a></li>
                        <li class="mb-2"><a href="#">Databases</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-4 col-md-12">
                    <h5 class="text-white mb-4">Newsletter</h5>
                    <p class="text-light mb-3">Subscribe to get updates on new courses and special offers.</p>
                    <form class="d-flex">
                        <input type="email" class="form-control me-2" placeholder="Your email">
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </form>
                </div>
            </div>
            
            <hr class="my-5 bg-light">
            
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="text-light mb-0">&copy; 2023 CodeLearn. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="text-light me-3">Privacy Policy</a>
                    <a href="#" class="text-light">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
   <script src="{{ asset('assets/js/script.js') }}"></script>
    
    <!-- Additional script for payment page -->
    <script>
        // Toggle payment methods
        document.querySelectorAll('input[name="paymentMethod"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const creditCardForm = document.getElementById('creditCardForm');
                const paypalForm = document.getElementById('paypalForm');
                
                if (this.id === 'creditCard') {
                    creditCardForm.classList.remove('d-none');
                    paypalForm.classList.add('d-none');
                } else {
                    creditCardForm.classList.add('d-none');
                    paypalForm.classList.remove('d-none');
                }
            });
        });
        
        // Toggle billing address
        document.getElementById('differentAddress').addEventListener('change', function() {
            const billingAddress = document.getElementById('billingAddress');
            if (this.checked) {
                billingAddress.classList.remove('d-none');
            } else {
                billingAddress.classList.add('d-none');
            }
        });
        
        // Format expiry date input
        document.getElementById('expiryDate').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            
            e.target.value = value.substring(0, 5);
        });
        
        // Initialize tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
</body>
</html>