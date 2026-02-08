<footer id="footer" class="footer accent-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-about">
                <a href="{{ route('instructor.home') }}" class="logo d-flex align-items-center">
                    <span class="sitename">CodeQuest</span>
                </a>
                <p>
                    Empower learners through knowledge. As an instructor on CodeQuest, you can create courses,
                    design learning paths, track student progress, and make a real impact through education.
                </p>
                <div class="social-links d-flex mt-4">
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>Instructor</h4>
                <ul>
                    <li><a href="{{ route('instructor.home') }}">Home</a></li>
                    <li><a href="{{ route('instructor.generate-course') }}">Generate Course</a></li>
                    <li><a href="{{ route('instructor.edit-course') }}">Edit Course</a></li>
                    <li><a href="{{ route('instructor.profile') }}">Profile</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>Resources</h4>
                <ul>
                    <li><a href="#">Teaching Guidelines</a></li>
                    <li><a href="#">Course Creation Tips</a></li>
                    <li><a href="#">Content Standards</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Support Center</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                <h4>Instructor Support</h4>
                <p>CodeQuest Platform</p>
                <p>Education & Learning Team</p>
                <p>Available Worldwide</p>
                <p class="mt-4">
                    <strong>Email:</strong>
                    <span>instructors@codequest.com</span>
                </p>
                <p>
                    <strong>Help Desk:</strong>
                    <span>support@codequest.com</span>
                </p>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>
            © <span>Copyright</span>
            <strong class="px-1 sitename">CodeQuest</strong>
            <span>All Rights Reserved</span>
        </p>
    </div>

</footer>
