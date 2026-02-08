@extends('layouts.study')

@section('content')
    <main class="main">
        <div class="project-content-wrapper">
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Web Development Fundamentals</a></li>
                    <li class="breadcrumb-item"><a href="#">Module 3: CSS Basics</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Project 1: Build a Portfolio Website</li>
                </ol>
            </nav>

            <div class="project-header">
                <h1>Project 1: Build a Portfolio Website</h1>
                <div class="project-meta">
                    <div class="d-flex flex-wrap gap-3 align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-bar-chart"></i>
                            <span class="badge"
                                style="background: color-mix(in srgb, var(--accent-color), transparent 85%); color: var(--accent-color);">Intermediate</span>
                        </div>

                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-star"></i>
                            <span>50 XP Points</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-award"></i>
                            <span>Portfolio Builder Badge</span>
                        </div>
                    </div>
                </div>
            </div>

            <section class="mb-5">
                <h2 class="mb-4">Project Brief</h2>

                <div class="project-brief-card">
                    <h3><i class="bi bi-lightbulb me-2"></i>What You'll Build</h3>
                    <p>
                        Create a professional personal portfolio website using HTML and CSS. This project will showcase
                        your ability to structure web pages, apply modern styling techniques, and create a responsive
                        layout that looks great on all devices.
                    </p>
                    <p class="mb-0">
                        Your portfolio will serve as a digital resume, highlighting your skills, projects, and contact
                        information in an attractive and user-friendly format.
                    </p>
                </div>

                <div class="project-brief-card">
                    <h3><i class="bi bi-trophy me-2"></i>Learning Goals</h3>
                    <p>By completing this project, you will reinforce:</p>
                    <ul>
                        <li>HTML5 semantic structure and best practices</li>
                        <li>CSS Flexbox for layout and alignment</li>
                        <li>Responsive design with media queries</li>
                        <li>CSS styling techniques (colors, typography, spacing)</li>
                        <li>Navigation menu implementation</li>
                        <li>Form creation and styling</li>
                    </ul>
                </div>

                <div class="project-brief-card">
                    <h3><i class="bi bi-check-circle me-2"></i>Requirements</h3>
                    <p>Your portfolio website must include:</p>
                    <ul>
                        <li><strong>Header with navigation:</strong> Logo/name and links to different sections</li>
                        <li><strong>About section:</strong> Brief introduction about yourself</li>
                        <li><strong>Projects showcase:</strong> Display at least 3 sample projects with images</li>
                        <li><strong>Skills section:</strong> List your technical skills</li>
                        <li><strong>Contact form:</strong> Name, email, message fields</li>
                        <li><strong>Responsive design:</strong> Works on mobile, tablet, and desktop</li>
                        <li><strong>Professional styling:</strong> Consistent color scheme and typography</li>
                    </ul>
                </div>
            </section>

            <section class="mb-5">
                <h2 class="mb-4">Project Instructions</h2>

                <div class="step-card">
                    <div class="d-flex align-items-start">
                        <span class="step-number">1</span>
                        <div class="flex-grow-1">
                            <div class="step-title">Setup Your Project</div>
                            <p>First, let's set up the project structure:</p>
                            <ol>
                                <li>Create a new folder named <code>portfolio</code> on your computer</li>
                                <li>Inside the folder, create two files:
                                    <ul>
                                        <li><code>index.html</code> - Your main HTML file</li>
                                        <li><code>styles.css</code> - Your CSS stylesheet</li>
                                    </ul>
                                </li>
                                <li>Create an <code>images</code> folder for your project images</li>
                            </ol>
                            <div class="tip-box">
                                <strong><i class="bi bi-info-circle me-1"></i>Tip:</strong> Use a code editor like VS
                                Code, Sublime Text, or Atom for the best coding experience.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="step-card">
                    <div class="d-flex align-items-start">
                        <span class="step-number">2</span>
                        <div class="flex-grow-1">
                            <div class="step-title">Build the HTML Structure</div>
                            <p>Create the basic HTML structure in your <code>index.html</code> file:</p>

                            <div class="code-block">
                                <span class="language-label">HTML</span>
                                <button class="copy-btn" onclick="copyCode(this)">
                                    <i class="bi bi-clipboard"></i> Copy
                                </button>
                                <pre><code>&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;My Portfolio&lt;/title&gt;
    &lt;link rel="stylesheet" href="styles.css"&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;header&gt;
        &lt;nav&gt;
            &lt;h1&gt;Your Name&lt;/h1&gt;
            &lt;ul&gt;
                &lt;li&gt;&lt;a href="#about"&gt;About&lt;/a&gt;&lt;/li&gt;
                &lt;li&gt;&lt;a href="#projects"&gt;Projects&lt;/a&gt;&lt;/li&gt;
                &lt;li&gt;&lt;a href="#contact"&gt;Contact&lt;/a&gt;&lt;/li&gt;
            &lt;/ul&gt;
        &lt;/nav&gt;
    &lt;/header&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
                            </div>

                            <div class="tip-box">
                                <strong><i class="bi bi-info-circle me-1"></i>Tip:</strong> Use semantic HTML5 tags
                                like &lt;header&gt;, &lt;nav&gt;, &lt;section&gt;, and &lt;footer&gt; for better
                                structure and SEO.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="step-card">
                    <div class="d-flex align-items-start">
                        <span class="step-number">3</span>
                        <div class="flex-grow-1">
                            <div class="step-title">Style the Header and Navigation</div>
                            <p>Add CSS to make your header look professional:</p>

                            <div class="code-block">
                                <span class="language-label">CSS</span>
                                <button class="copy-btn" onclick="copyCode(this)">
                                    <i class="bi bi-clipboard"></i> Copy
                                </button>
                                <pre><code>* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    line-height: 1.6;
    color: #333;
}

header {
    background: #2c3e50;
    color: white;
    padding: 1rem 0;
    position: sticky;
    top: 0;
    z-index: 100;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
}

nav ul {
    display: flex;
    list-style: none;
    gap: 2rem;
}

nav a {
    color: white;
    text-decoration: none;
    transition: color 0.3s;
}

nav a:hover {
    color: #3498db;
}</code></pre>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="step-card">
                    <div class="d-flex align-items-start">
                        <span class="step-number">4</span>
                        <div class="flex-grow-1">
                            <div class="step-title">Create the About Section</div>
                            <p>Add an about section to introduce yourself:</p>

                            <div class="code-block">
                                <span class="language-label">HTML</span>
                                <button class="copy-btn" onclick="copyCode(this)">
                                    <i class="bi bi-clipboard"></i> Copy
                                </button>
                                <pre><code>&lt;section id="about" class="about"&gt;
    &lt;div class="container"&gt;
        &lt;h2&gt;About Me&lt;/h2&gt;
        &lt;p&gt;Hi! I'm a web developer passionate about creating 
           beautiful and functional websites.&lt;/p&gt;
    &lt;/div&gt;
&lt;/section&gt;</code></pre>
                            </div>

                            <div class="tip-box">
                                <strong><i class="bi bi-info-circle me-1"></i>Tip:</strong> Add a professional photo
                                and customize the text to reflect your personality and skills.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="step-card">
                    <div class="d-flex align-items-start">
                        <span class="step-number">5</span>
                        <div class="flex-grow-1">
                            <div class="step-title">Build the Projects Showcase</div>
                            <p>Display your projects using a grid layout with Flexbox:</p>

                            <div class="code-block">
                                <span class="language-label">HTML</span>
                                <button class="copy-btn" onclick="copyCode(this)">
                                    <i class="bi bi-clipboard"></i> Copy
                                </button>
                                <pre><code>&lt;section id="projects" class="projects"&gt;
    &lt;div class="container"&gt;
        &lt;h2&gt;My Projects&lt;/h2&gt;
        &lt;div class="projects-grid"&gt;
            &lt;div class="project-card"&gt;
                &lt;img src="images/project1.jpg" alt="Project 1"&gt;
                &lt;h3&gt;Project Title&lt;/h3&gt;
                &lt;p&gt;Project description&lt;/p&gt;
            &lt;/div&gt;
            &lt;!-- Repeat for more projects --&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/section&gt;</code></pre>
                            </div>

                            <div class="code-block">
                                <span class="language-label">CSS</span>
                                <button class="copy-btn" onclick="copyCode(this)">
                                    <i class="bi bi-clipboard"></i> Copy
                                </button>
                                <pre><code>.projects-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    margin-top: 2rem;
}

.project-card {
    flex: 1 1 300px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    overflow: hidden;
    transition: transform 0.3s;
}

.project-card:hover {
    transform: translateY(-5px);
}

.project-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}</code></pre>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="step-card">
                    <div class="d-flex align-items-start">
                        <span class="step-number">6</span>
                        <div class="flex-grow-1">
                            <div class="step-title">Add a Contact Form</div>
                            <p>Create a contact form for visitors to reach you:</p>

                            <div class="code-block">
                                <span class="language-label">HTML</span>
                                <button class="copy-btn" onclick="copyCode(this)">
                                    <i class="bi bi-clipboard"></i> Copy
                                </button>
                                <pre><code>&lt;section id="contact" class="contact"&gt;
    &lt;div class="container"&gt;
        &lt;h2&gt;Contact Me&lt;/h2&gt;
        &lt;form&gt;
            &lt;input type="text" placeholder="Your Name" required&gt;
            &lt;input type="email" placeholder="Your Email" required&gt;
            &lt;textarea placeholder="Your Message" rows="5" required&gt;&lt;/textarea&gt;
            &lt;button type="submit"&gt;Send Message&lt;/button&gt;
        &lt;/form&gt;
    &lt;/div&gt;
&lt;/section&gt;</code></pre>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="step-card">
                    <div class="d-flex align-items-start">
                        <span class="step-number">7</span>
                        <div class="flex-grow-1">
                            <div class="step-title">Make It Responsive</div>
                            <p>Add media queries to ensure your portfolio looks great on all devices:</p>

                            <div class="code-block">
                                <span class="language-label">CSS</span>
                                <button class="copy-btn" onclick="copyCode(this)">
                                    <i class="bi bi-clipboard"></i> Copy
                                </button>
                                <pre><code>@media (max-width: 768px) {
    nav {
        flex-direction: column;
        gap: 1rem;
    }
    
    nav ul {
        flex-direction: column;
        gap: 0.5rem;
        text-align: center;
    }
    
    .projects-grid {
        flex-direction: column;
    }
}</code></pre>
                            </div>

                            <div class="tip-box">
                                <strong><i class="bi bi-info-circle me-1"></i>Tip:</strong> Test your website on
                                different screen sizes using browser developer tools (F12).
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mb-5">
                <h2 class="mb-4">Project Resources</h2>

                <div class="resource-card">
                    <div class="resource-info">
                        <div class="resource-icon">
                            <i class="bi bi-file-code"></i>
                        </div>
                        <div>
                            <h4 class="mb-1">Starter Code</h4>
                            <p class="mb-0 text-muted small">HTML and CSS template to get you started</p>
                        </div>
                    </div>
                    <a href="#" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-download me-2"></i>Download
                    </a>
                </div>

                <div class="resource-card">
                    <div class="resource-info">
                        <div class="resource-icon">
                            <i class="bi bi-images"></i>
                        </div>
                        <div>
                            <h4 class="mb-1">Sample Images</h4>
                            <p class="mb-0 text-muted small">Placeholder images for your projects</p>
                        </div>
                    </div>
                    <a href="#" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-download me-2"></i>Download
                    </a>
                </div>

                <div class="resource-card">
                    <div class="resource-info">
                        <div class="resource-icon">
                            <i class="bi bi-book"></i>
                        </div>
                        <div>
                            <h4 class="mb-1">CSS Flexbox Guide</h4>
                            <p class="mb-0 text-muted small">Complete reference for Flexbox properties</p>
                        </div>
                    </div>
                    <a href="#" class="btn btn-outline-secondary btn-sm" target="_blank">
                        <i class="bi bi-box-arrow-up-right me-2"></i>View
                    </a>
                </div>

                <div class="resource-card">
                    <div class="resource-info">
                        <div class="resource-icon">
                            <i class="bi bi-palette"></i>
                        </div>
                        <div>
                            <h4 class="mb-1">Color Palette Generator</h4>
                            <p class="mb-0 text-muted small">Find the perfect colors for your portfolio</p>
                        </div>
                    </div>
                    <a href="#" class="btn btn-outline-secondary btn-sm" target="_blank">
                        <i class="bi bi-box-arrow-up-right me-2"></i>Open
                    </a>
                </div>
            </section>

            <section class="mb-5">
                <h2 class="mb-4">Submit Your Project</h2>

                <div class="completion-card">
                    <h3 class="mb-3"><i class="bi bi-github me-2"></i>Submit Your GitHub Repository</h3>


                    <div class="mb-3">
                        <label for="project-url" class="form-label">
                            GitHub Repository URL <span class="text-danger">*</span>
                        </label>
                        <input type="url" class="form-control" id="project-url">
                    </div>

                    <div class="mb-4">
                        <label for="project-notes" class="form-label">Additional Notes (Optional)</label>
                        <textarea class="form-control" id="project-notes" rows="3"></textarea>
                    </div>

                    <button class="btn btn-primary btn-lg" onclick="submitGitHubProject()">
                        Submit Project
                    </button>

                    <div class="mt-4 p-3 bg-light rounded" style="display: none;" id="success-message">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 1.5rem;"></i>
                            <div>
                                <strong>Congratulations!</strong> You've completed this project and earned 50 XP and
                                the Portfolio Builder Badge!
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <footer class="d-flex justify-content-between mt-5 pt-4 border-top">
                <a class="btn btn-outline-secondary" disabled>
                    <i class="bi bi-chevron-left me-2"></i>Previous
                </a>
                <a class="btn btn-primary">
                    Next <i class="bi bi-chevron-right ms-2"></i>
                </a>
            </footer>

        </div>
    </main>
@endsection

@push('scripts')
    <script>
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
                alert('Please provide your GitHub repository URL.');
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
                text: 'Project submitted for review!\n\nYour GitHub repository has been sent to the instructor. You will receive detailed feedback within 48 hours via email and in your dashboard.',
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

        let aiTrialsLeft = 3;

        function submitForAIReview() {
            const taskInput = document.getElementById('task-input');
            const taskFeedback = document.getElementById('task-feedback');
            const taskFeedbackContent = document.getElementById('task-feedback-content');
            const aiTrialsBadge = document.getElementById('ai-trials-badge');
            const aiReviewBtn = document.getElementById('ai-review-btn');

            if (!taskInput.value.trim()) {
                taskFeedbackContent.className = 'alert alert-warning';
                taskFeedbackContent.innerHTML =
                    '<i class="bi bi-exclamation-triangle me-2"></i><strong>Please enter your task submission</strong> before requesting a review.';
                taskFeedback.style.display = 'block';
                return;
            }

            if (aiTrialsLeft <= 0) {
                taskFeedbackContent.className = 'alert alert-danger';
                taskFeedbackContent.innerHTML =
                    '<i class="bi bi-x-circle me-2"></i><strong>No AI trials left.</strong> Please submit to instructor for review.';
                taskFeedback.style.display = 'block';
                return;
            }

            aiTrialsLeft--;
            aiTrialsBadge.textContent = `${aiTrialsLeft} trial${aiTrialsLeft !== 1 ? 's' : ''} left`;

            if (aiTrialsLeft === 0) {
                aiReviewBtn.disabled = true;
                aiReviewBtn.classList.add('disabled');
            }

            taskFeedbackContent.className = 'alert alert-info';
            taskFeedbackContent.innerHTML =
                '<strong>AI Review:</strong> Your submission has been analyzed. Good effort! Consider improving the flexbox alignment and adding more responsive breakpoints. Try using <code>justify-content: space-between</code> for better spacing.';
            taskFeedback.style.display = 'block';

            taskFeedback.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });
        }

        function submitForInstructorReview() {
            const taskInput = document.getElementById('task-input');
            const taskFeedback = document.getElementById('task-feedback');
            const taskFeedbackContent = document.getElementById('task-feedback-content');

            if (!taskInput.value.trim()) {
                taskFeedbackContent.className = 'alert alert-warning';
                taskFeedbackContent.innerHTML =
                    '<i class="bi bi-exclamation-triangle me-2"></i><strong>Please enter your task submission</strong> before requesting a review.';
                taskFeedback.style.display = 'block';
                return;
            }

            taskFeedbackContent.className = 'alert alert-success';
            taskFeedbackContent.innerHTML =
                '<i class="bi bi-check-circle me-2"></i><strong>Submitted to Instructor!</strong> Your task has been sent for review. You will receive feedback within 24-48 hours via email and in your dashboard.';
            taskFeedback.style.display = 'block';

            taskFeedback.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });
        }
    </script>
@endpush
