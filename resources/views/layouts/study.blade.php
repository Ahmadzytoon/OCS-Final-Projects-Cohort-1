<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>
    @include('student.partials.study-navbar')

    @yield('content')

    @include('partials.scripts')

    @stack('scripts')

    <script>
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

        function toggleCompletion() {
            const checkbox = document.getElementById('project-complete');
            checkbox.checked = !checkbox.checked;
            updateSubmitButton();
        }

        document.getElementById('project-complete').addEventListener('change', updateSubmitButton);

        function updateSubmitButton() {
            const checkbox = document.getElementById('project-complete');
            const submitBtn = document.getElementById('submit-btn');
            submitBtn.disabled = !checkbox.checked;
        }

        function submitProject() {
            const successMessage = document.getElementById('success-message');
            const submitBtn = document.getElementById('submit-btn');

            successMessage.style.display = 'block';
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="bi bi-check-circle-fill me-2"></i>Completed';

            successMessage.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });

            console.log('Project marked as complete!');
        }

        function showUploadOption() {
            const uploadSection = document.getElementById('upload-section');
            uploadSection.style.display = 'block';
            uploadSection.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });
        }

        function hideUploadOption() {
            const uploadSection = document.getElementById('upload-section');
            uploadSection.style.display = 'none';
            document.getElementById('project-url').value = '';
            document.getElementById('project-notes').value = '';
        }

        function uploadProject() {
            const projectUrl = document.getElementById('project-url').value.trim();
            const projectNotes = document.getElementById('project-notes').value.trim();

            if (!projectUrl) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Missing URL',
                    text: 'Please provide your GitHub repository URL.',
                    confirmButtonColor: '#059652'
                });
                return;
            }

            if (!projectUrl.includes('github.com')) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid URL',
                    text: 'Please provide a valid GitHub repository URL (e.g., https://github.com/username/repository)',
                    confirmButtonColor: '#059652'
                });
                return;
            }

            const modalEl = document.getElementById('projectSubmissionModal');
            const modal = bootstrap.Modal.getInstance(modalEl);
            modal.hide();

            Swal.fire({
                icon: 'success',
                title: 'Submitted!',
                text: 'Project submitted successfully!\nRepository: ' + projectUrl,
                confirmButtonColor: '#059652'
            });
            console.log('Project submitted:', {
                projectUrl,
                projectNotes,
                submittedAt: new Date().toISOString()
            });

            hideUploadOption();
        }

        function submitGitHubProject() {
            const projectUrl = document.getElementById('project-url').value.trim();
            const projectNotes = document.getElementById('project-notes').value.trim();
            const successMessage = document.getElementById('success-message');

            if (!projectUrl) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Missing URL',
                    text: 'Please provide your GitHub repository URL.',
                    confirmButtonColor: '#059652'
                });
                return;
            }

            if (!projectUrl.includes('github.com')) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid URL',
                    text: 'Please provide a valid GitHub repository URL (e.g., https://github.com/username/repository)',
                    confirmButtonColor: '#059652'
                });
                return;
            }

            Swal.fire({
                icon: 'success',
                title: 'Submitted!',
                text: 'Your project submission has been received.\nRepository: ' + projectUrl,
                confirmButtonColor: '#059652'
            });

            successMessage.style.display = 'block';
            successMessage.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });

            console.log('Project submitted and marked as complete:', {
                projectUrl,
                projectNotes,
                submittedAt: new Date().toISOString(),
                status: 'completed',
                xpEarned: 50,
                badgeEarned: 'Portfolio Builder'
            });

            const submitBtn = event.target;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="bi bi-check-circle-fill me-2"></i>Submitted';
        }
    </script>
</body>

</html>
