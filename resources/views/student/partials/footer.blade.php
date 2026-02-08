<footer id="footer" class="footer accent-background">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-about">
                <a href="{{ route('visitor.home') }}" class="logo d-flex align-items-center">
                    <img src="{{ asset('general/img/logo_2.png') }}" alt="">
                </a>
                <p>CodeQuest is a learning platform where students master programming through structured, text-based
                    quests, real challenges, and guided practice.</p>
                <div class="social-links d-flex mt-4">
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="{{ route('student.home') }}">Home</a></li>
                    <li><a href="{{ route('student.courses') }}">Browse Courses</a></li>
                    <li><a href="{{ route('student.my-courses') }}">My Courses</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>What We Offer</h4>
                <ul>
                    <li><a href="#">Programming Courses</a></li>
                    <li><a href="#">Text-Based Learning</a></li>
                    <li><a href="#">Practice Quests</a></li>
                    <li><a href="#">Skill Assessments</a></li>
                    <li><a href="#">Progress Tracking</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                <h4>Contact Us</h4>
                <p>CodeQuest Team</p>
                <p>Online Learning Platform</p>
                <p>Worldwide</p>
                <p class="mt-4"><strong>Email:</strong> <span>support@codequest.com</span></p>
                <p><strong>For Instructors:</strong> <span>instructors@codequest.com</span></p>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">CodeQuest</strong> <span>All Rights Reserved</span>
        </p>
        <div class="credits">
        </div>
    </div>

</footer>
