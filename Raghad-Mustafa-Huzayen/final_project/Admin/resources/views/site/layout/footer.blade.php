<footer class="footer-section">
    <div class="container">
        <div class="row">

            <!-- About -->
            <div class="col-md-4">
                <h3 class="text-dark">Yalla Dodge</h3>
                <p><b>
                    Organizing fun and professional weekly dodgeball games for all skill levels.
                </b></p>
            </div>

            <!-- Links -->
            <div class="col-md-3 ml-auto">
                <h3 class="text-dark">Links</h3>
                <ul class="list-unstyled footer-links">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('games.index') }}">Weekly Games</a></li>
                    <li><a href="{{ route('private') }}#schedule-section">Private Games</a></li>
                    <li><a href="{{ route('coaches.index') }}#trainer-section">Our Coaches</a></li>
                </ul>
            </div>

            <!-- Subscribe -->
            <div class="col-md-4">
                <h3 class="text-dark">Stay in touch</h3>
                <p>
                    <b>Follow us on <a href="https://www.instagram.com/jdf.jo/"><b>Instagram</b></a>.</b>
                </p>
                <p>
                    <b>Join our <a href="#"><b>WhatsApp</b></a> community.</b>
                </p>
            </div>

        </div>

        <!-- Copyright -->
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <div class="pt-5">
                    <p class="copyright">
                        <small>
                            &copy; {{ date('Y') }} Yalla Dodge. All Rights Reserved.
                            Design by
                            <a href="https://free-template.co" target="_blank">Raghad Huzayen</a>
                        </small>
                    </p>
                </div>
            </div>
        </div>

    </div>
</footer>
