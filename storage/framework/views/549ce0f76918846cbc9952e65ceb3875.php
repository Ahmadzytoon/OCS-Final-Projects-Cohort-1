

<?php $__env->startSection('title', 'Home Page'); ?>

<?php $__env->startSection('content'); ?>

<style>
.btn-purple {
  --bs-btn-bg: #6f42c1;      
  --bs-btn-border-color: #6f42c1;
  --bs-btn-hover-bg: #5a32a3; 
  --bs-btn-hover-border-color: #5a32a3;
  --bs-btn-color: #fff;
}

a .btn-purple :hover {
  color: #fff !important;
}

</style>

<!-- Hero Section -->
<section id="hero" class="hero section dark-background">
  <img src="<?php echo e(asset('assets/home/img/hero1.jpg')); ?>" alt="" data-aos="fade-in">

  <div class="container">
    <h2 data-aos="fade-up" data-aos-delay="100">Find Your Perfect Tutor Today</h2>
    <p data-aos="fade-up" data-aos-delay="200">Connect with expert tutors for personalized learning experiences</p>
    <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
      <a href="<?php echo e(route('home.tutors')); ?>" class="btn-get-started me-3">Browse Tutors</a>
    </div>
  </div>
</section>



<!-- /Counts Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="section why-us">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="why-box">
              <h3>Why Choose Tutor Hub?</h3>
              <p>
Tutor Hub makes it easy to connect with qualified and reliable tutors in different subjects.
Our platform is simple to use and designed to support your learning needs.

You can explore clear tutor profiles, compare options, and choose the tutor that fits your goals.
With Tutor Hub, learning becomes more flexible, effective, and accessible.
              <div class="text-center">
                <a href="<?php echo e(route('home.about')); ?>" class="more-btn"><span>Learn More</span> <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Why Box -->

          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

        <div class="col-xl-4">
  <div class="icon-box d-flex flex-column justify-content-center align-items-center">
    <i class="bi bi-clipboard-data"></i>
    <h4>Easy & Efficient Platform</h4>
    <p>Find tutors, schedule sessions, and learn without any hassle.</p>
  </div>
</div><!-- End Icon Box -->

<div class="col-xl-4" data-aos="fade-up" data-aos-delay="300"> 
  <div class="icon-box d-flex flex-column justify-content-center align-items-center">
    <i class="bi bi-gem"></i>
    <h4>High Quality Education</h4>
    <p>Learn from carefully selected tutors who deliver professional and effective teaching.</p>
  </div>
</div><!-- End Icon Box -->

<div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
  <div class="icon-box d-flex flex-column justify-content-center align-items-center">
    <i class="bi bi-inboxes"></i>
    <h4>All Subjects in One Place</h4>
    <p>Access a wide range of subjects and find the right tutor for your academic needs.</p>
  </div>
</div><!-- End Icon Box -->


            </div>
          </div>

        </div>

      </div>

    </section><!-- /Why Us Section -->
<!-- Features Section -->
<section id="features" class="features section">

  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="features-item">
          <i class="bi bi-search" style="color: #ffbb2c;"></i>
          <h3><a href="" class="stretched-link">Find Tutors Easily</a></h3>
        </div>
      </div>

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="features-item">
          <i class="bi bi-clock" style="color: #5578ff;"></i>
          <h3><a href="" class="stretched-link">Flexible Scheduling</a></h3>
        </div>
      </div>

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="300">
        <div class="features-item">
          <i class="bi bi-mortarboard" style="color: #e80368;"></i>
          <h3><a href="" class="stretched-link">Qualified Tutors</a></h3>
        </div>
      </div>

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="400">
        <div class="features-item">
          <i class="bi bi-chat-dots" style="color: #e361ff;"></i>
          <h3><a href="" class="stretched-link">Direct Communication</a></h3>
        </div>
      </div>

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="500">
        <div class="features-item">
          <i class="bi bi-shield-check" style="color: #47aeff;"></i>
          <h3><a href="" class="stretched-link">Safe & Secure</a></h3>
        </div>
      </div>

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="600">
        <div class="features-item">
          <i class="bi bi-star" style="color: #ffa76e;"></i>
          <h3><a href="" class="stretched-link">Top Reviews</a></h3>
        </div>
      </div>

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="700">
        <div class="features-item">
          <i class="bi bi-book" style="color: #11dbcf;"></i>
          <h3><a href="" class="stretched-link">Wide Subject Range</a></h3>
        </div>
      </div>

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="800">
        <div class="features-item">
          <i class="bi bi-camera-video" style="color: #4233ff;"></i>
          <h3><a href="" class="stretched-link">Easy Booking</a></h3>
        </div>
      </div>

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="900">
        <div class="features-item">
          <i class="bi bi-people" style="color: #b2904f;"></i>
          <h3><a href="" class="stretched-link">Community Support</a></h3>
        </div>
      </div>

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1000">
        <div class="features-item">
          <i class="bi bi-lightbulb" style="color: #b20969;"></i>
          <h3><a href="" class="stretched-link">Personalized Learning</a></h3>
        </div>
      </div>

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1100">
        <div class="features-item">
          <i class="bi bi-calendar-check" style="color: #ff5828;"></i>
          <h3><a href="" class="stretched-link">Interactive Learning</a></h3>
        </div>
      </div>

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1200">
        <div class="features-item">
          <i class="bi bi-trophy" style="color: #29cc61;"></i>
          <h3><a href="" class="stretched-link">Achieve Goals</a></h3>
        </div>
      </div>

    </div>

  </div>

</section>


    <!-- Courses Section -->
    <section id="courses" class="courses section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Courses</h2>
        <p>Popular Courses</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="course-item">
              <img src="<?php echo e(asset('assets/home/img/course-1.jpg')); ?>" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="category">Web Development</p>
                  <p class="price">$169</p>
                </div>

                <h3><a href="course-details.html">Website Design</a></h3>
                <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="<?php echo e(asset('assets/home/img/trainers/trainer-1-2.jpg')); ?>" class="img-fluid" alt="">
                    <a href="" class="trainer-link">Antonio</a>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bi bi-person user-icon"></i>&nbsp;50
                    &nbsp;&nbsp;
                    <i class="bi bi-heart heart-icon"></i>&nbsp;65
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="course-item">
              <img src="<?php echo e(asset('assets/home/img/course-2.jpg')); ?>" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="category">Marketing</p>
                  <p class="price">$250</p>
                </div>

                <h3><a href="course-details.html">Search Engine Optimization</a></h3>
                <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="<?php echo e(asset('assets/home/img/trainers/trainer-2-2.jpg')); ?>" class="img-fluid" alt="">
                    <a href="" class="trainer-link">Lana</a>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bi bi-person user-icon"></i>&nbsp;35
                    &nbsp;&nbsp;
                    <i class="bi bi-heart heart-icon"></i>&nbsp;42
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="course-item">
              <img src="<?php echo e(asset('assets/home/img/course-3.jpg')); ?>" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="category">Content</p>
                  <p class="price">$180</p>
                </div>

                <h3><a href="course-details.html">Copywriting</a></h3>
                <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="<?php echo e(asset('assets/home/img/trainers/trainer-3-2.jpg')); ?>" class="img-fluid" alt="">
                    <a href="" class="trainer-link">Brandon</a>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bi bi-person user-icon"></i>&nbsp;20
                    &nbsp;&nbsp;
                    <i class="bi bi-heart heart-icon"></i>&nbsp;85
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->

        </div>

      </div>

    </section><!-- /Courses Section -->

    
   <!-- Tutors Section -->
    <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Tutors</h2>
        <p>Popular Tutors</p>
      </div><!-- End Section Title -->
<section id="trainers-index" class="section trainers-index ">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
        <div class="member">
          <img src="<?php echo e(asset('assets/home/img/trainers/trainer-1.jpg')); ?>" class="img-fluid" alt="Tutor Jane Doe">
          <div class="member-content">
            <h4>Jane Doe</h4>
            <span>Mathematics</span>
            <p>
              Experienced Math tutor with 5+ years teaching high school and college students. Focused on building strong foundations.
            </p>
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
        <div class="member">
          <img src="<?php echo e(asset('assets/home/img/trainers/trainer-2.jpg')); ?>" class="img-fluid" alt="Tutor John Smith">
          <div class="member-content">
            <h4>John Smith</h4>
            <span>English & Literature</span>
            <p>
              Passionate English tutor helping students improve reading, writing, and comprehension skills for exams and assignments.
            </p>
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
        <div class="member">
          <img src="<?php echo e(asset('assets/home/img/trainers/trainer-3.jpg')); ?>" class="img-fluid" alt="Tutor Alice Lee">
          <div class="member-content">
            <h4>Alice Lee</h4>
            <span>Physics</span>
            <p>
              Physics tutor with hands-on teaching approach, making complex topics simple and fun. Works with high school and university students.
            </p>
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</section>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
<script src="https://unpkg.com/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravelpro\admindashboard_laravel\resources\views/home/index.blade.php ENDPATH**/ ?>