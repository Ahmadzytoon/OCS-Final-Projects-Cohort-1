<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{ asset('general/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('general/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('general/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('general/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('general/vendor/swiper/swiper-bundle.min.js') }}"></script>

<!-- Main JS File -->
<script src="{{ asset('general/js/main.js') }}"></script>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.hook('commit', ({ component, commit, respond, succeed, fail }) => {
            succeed(({ snapshot, effect }) => {
                setTimeout(() => {
                    if (typeof AOS !== 'undefined') {
                        AOS.refreshHard();
                         AOS.init({
                            duration: 600,
                            easing: 'ease-in-out',
                            once: true,
                            mirror: false
                        });
                    }
                }, 100);
            });
        });
    });

    document.addEventListener('livewire:navigated', () => {
        if (typeof AOS !== 'undefined') {
             AOS.init({
                duration: 600,
                easing: 'ease-in-out',
                once: true,
                mirror: false
            });
        }
    });
</script>