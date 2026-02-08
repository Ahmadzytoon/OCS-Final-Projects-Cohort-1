    <nav class="project-navbar">
        <div class="container">
            <div class="row align-items-center g-3">
                <div class="col-md-3">
                    <a href="#" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-arrow-left me-2"></i>Back to Course
                    </a>
                </div>

                <div class="col-md-6">
                    <div class="project-progress-indicator">
                        <div class="text-muted small mb-1">Project 1 of 5</div>
                        <div class="project-progress-mini" style="max-width: 250px; margin: 0 auto;">
                            <div class="progress-fill" style="width: 20%;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="d-flex gap-2 justify-content-end align-items-center">
                        <button class="btn btn-outline-secondary btn-sm" id="theme-toggle"
                            title="Toggle Dark/Light Mode">
                            <i class="bi bi-moon-stars"></i>
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </nav>

    <script>
        const currentTheme = localStorage.getItem('theme') || 'light';
        if (currentTheme === 'dark') {
            htmlElement.classList.add('dark-mode');
            themeToggle.querySelector('i').classList.replace('bi-moon-stars', 'bi-sun');
        }

        themeToggle.addEventListener('click', function() {
            htmlElement.classList.toggle('dark-mode');
            const icon = this.querySelector('i');

            if (htmlElement.classList.contains('dark-mode')) {
                icon.classList.replace('bi-moon-stars', 'bi-sun');
                localStorage.setItem('theme', 'dark');
            } else {
                icon.classList.replace('bi-sun', 'bi-moon-stars');
                localStorage.setItem('theme', 'light');
            }
        });

        const themeToggle = document.getElementById('theme-toggle');
        const htmlElement = document.documentElement;

        const currentTheme = localStorage.getItem('theme') || 'light';
        if (currentTheme === 'dark') {
            htmlElement.classList.add('dark-mode');
            themeToggle.querySelector('i').classList.replace('bi-moon-stars', 'bi-sun');
        }

        themeToggle.addEventListener('click', function() {
            htmlElement.classList.toggle('dark-mode');
            const icon = this.querySelector('i');

            if (htmlElement.classList.contains('dark-mode')) {
                icon.classList.replace('bi-moon-stars', 'bi-sun');
                localStorage.setItem('theme', 'dark');
            } else {
                icon.classList.replace('bi-sun', 'bi-moon-stars');
                localStorage.setItem('theme', 'light');
            }
        });

        function copyCode(button) {
            const codeBlock = button.closest('.code-block');
            const code = codeBlock.querySelector('code').textContent;

            navigator.clipboard.writeText(code).then(() => {
                const originalHTML = button.innerHTML;
                button.innerHTML = '<i class="bi bi-check"></i> Copied!';
                setTimeout(() => {
                    button.innerHTML = originalHTML;
                }, 2000);
            });
        }
    </script>
