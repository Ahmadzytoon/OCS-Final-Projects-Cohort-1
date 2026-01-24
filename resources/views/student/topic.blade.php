@extends('layouts.study')

@section('content')
    <main class="main">
        <div class="topic-content-wrapper">
            
            @if(isset($topic))
               <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                    @if(request()->has('id') && auth()->user()->role == 'instructor')
                         <li class="breadcrumb-item"><a href="{{ route('instructor.home') }}">Instructor Home</a></li>
                         <li class="breadcrumb-item"><a href="{{ route('instructor.edit-course', ['id' => $topic->module->course_id ?? 1]) }}">Edit Course</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Preview: {{ $topic->title }}</li>
                    @else
                        <li class="breadcrumb-item"><a href="#">Course</a></li>
                        <li class="breadcrumb-item"><a href="#">Module</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $topic->title }}</li>
                    @endif
                    </ol>
               </nav>

               <div class="topic-header">
                    <h1>{{ $topic->title }}</h1>
                    <div class="topic-meta">
                        <div class="d-flex flex-wrap gap-3 align-items-center">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-chevron-bar-expand"></i>
                                <span>{{ $topic->xp_points ?? 10 }} XP Points</span>
                            </div>
                        </div>
                    </div>
               </div>

               <div class="topic-content">
                   {!! $topic->content !!}
                   
                   @if($topic->summary)
                   <div class="key-takeaways">
                       <h3><i class="bi bi-lightbulb me-2"></i>Key Takeaways</h3>
                       <p>{{ $topic->summary }}</p>
                   </div>
                   @endif
               </div>

               @if($topic->questions && $topic->questions->count() > 0)
               <div class="questions-section mt-5">
                   <h2 class="mb-4">Check Your Understanding</h2>
                   
                   @foreach($topic->questions as $index => $question)
                       @if($question->type == 'multiple_choice')
                           <div class="question-card" id="q-card-{{ $question->id }}">
                               <div class="question-number">Question {{ $index + 1 }}</div>
                               <div class="question-text">{{ $question->question_text }}</div>
           
                               <div class="answer-options" id="options-{{ $question->id }}">
                                   @foreach($question->options as $option)
                                   <label class="answer-option" data-is-correct="{{ $option->is_correct }}">
                                       <input type="radio" name="q{{ $question->id }}" value="{{ $option->id }}">
                                       <span>{{ $option->option_text }}</span>
                                   </label>
                                   @endforeach
                               </div>
           
                               <button class="btn btn-primary mt-3" onclick="checkDynamicAnswer({{ $question->id }})" disabled id="submit-q{{ $question->id }}">
                                   Submit Answer
                               </button>
           
                               <div class="feedback-message" id="feedback-q{{ $question->id }}"></div>
                               @if($question->explanation)
                               <div class="mt-2 small text-muted explanation" id="explanation-q{{ $question->id }}" style="display:none">
                                   <strong>Explanation:</strong> {{ $question->explanation }}
                               </div>
                               @endif
                           </div>
                       @else
                            <div class="task-submission-section mt-5">
                               <div class="question-card">
                                   <h2 class="mb-3">Quest: {{ $question->question_text }}</h2>
                                   <div class="mb-4">
                                       <label for="task-input-{{ $question->id }}" class="form-label" style="font-weight: 600; color: var(--heading-color);">
                                           Your Solution
                                       </label>
                                       <textarea class="form-control" id="task-input-{{ $question->id }}" rows="5"
                                           style="padding: 0.75rem; border: 2px solid color-mix(in srgb, var(--default-color), transparent 85%); border-radius: 8px;"></textarea>
                                   </div>
                                   <div class="d-flex gap-3">
                                       <button class="btn btn-primary" onclick="simulateAIReview({{ $question->id }})">Review by AI</button>
                                   </div>
                                    <div class="mt-4" id="task-feedback-{{ $question->id }}" style="display: none;">
                                       <div class="alert alert-info">
                                           <strong>AI Feedback:</strong> Great job! Your solution looks correct.
                                           @if($question->explanation)
                                           <hr>
                                           <strong>Expected Solution/Hint:</strong> {{ $question->explanation }}
                                           @endif
                                       </div>
                                   </div>
                               </div>
                           </div>
                       @endif
                   @endforeach
               </div>
               @endif

            @else
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Web Development Fundamentals</a></li>
                    <li class="breadcrumb-item"><a href="#">Module 3: CSS Basics</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Understanding CSS Flexbox</li>
                </ol>
            </nav>

            <div class="topic-header">
                <h1>Understanding CSS Flexbox</h1>
                <div class="topic-meta">
                    <div class="d-flex flex-wrap gap-3 align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-chevron-bar-expand"></i>
                            <span>15 XP Points</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-award"></i>
                            <span>1 Badge!</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="topic-content">

                <p>
                    CSS Flexbox is a powerful layout module that makes it easy to design flexible and responsive layout
                    structures.
                    In this topic, you'll learn how to use Flexbox to create modern, adaptive layouts without relying on
                    floats or positioning.
                </p>

                <p>
                    Understanding Flexbox is crucial for modern web development. It simplifies many layout tasks that
                    were previously
                    complex and provides better control over alignment, spacing, and distribution of elements.
                </p>

                <h2>What is Flexbox?</h2>

                <p>
                    Flexbox, or the Flexible Box Layout, is a CSS layout model designed for one-dimensional layouts. It
                    excels at
                    distributing space and aligning content in ways that are responsive and adaptable to different
                    screen sizes.
                </p>

                <p>
                    The main idea behind Flexbox is to give the container the ability to alter its items' width, height,
                    and order
                    to best fill the available space. A flex container expands items to fill available free space or
                    shrinks them
                    to prevent overflow.
                </p>

                <h2>Creating a Flex Container</h2>

                <p>
                    To start using Flexbox, you need to define a flex container. This is done by setting the
                    <code>display</code>
                    property to <code>flex</code> on a parent element.
                </p>

                <div class="code-block">
                    <span class="language-label">CSS</span>
                    <button class="copy-btn" onclick="copyCode(this)">
                        <i class="bi bi-clipboard"></i> Copy
                    </button>
                    <pre><code>.container {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 1rem;
}</code></pre>
                </div>

                <p>
                    Once you apply <code>display: flex</code> to a container, all direct children become flex items. You
                    can then
                    use various Flexbox properties to control their layout.
                </p>

                <h3>Main Flexbox Properties</h3>

                <ul>
                    <li><strong>justify-content:</strong> Aligns items along the main axis (horizontal by default)</li>
                    <li><strong>align-items:</strong> Aligns items along the cross axis (vertical by default)</li>
                    <li><strong>flex-direction:</strong> Defines the direction of the main axis (row or column)</li>
                    <li><strong>gap:</strong> Sets the spacing between flex items</li>
                    <li><strong>flex-wrap:</strong> Controls whether items wrap to multiple lines</li>
                </ul>

                <h2>Practical Example</h2>

                <p>
                    Let's look at a practical example of creating a navigation bar using Flexbox:
                </p>

                <div class="code-block">
                    <span class="language-label">HTML</span>
                    <button class="copy-btn" onclick="copyCode(this)">
                        <i class="bi bi-clipboard"></i> Copy
                    </button>
                    <pre><code>&lt;nav class="navbar"&gt;
  &lt;div class="logo"&gt;Brand&lt;/div&gt;
  &lt;ul class="nav-links"&gt;
    &lt;li&gt;&lt;a href="#"&gt;Home&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="#"&gt;About&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="#"&gt;Contact&lt;/a&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/nav&gt;</code></pre>
                </div>

                <div class="code-block">
                    <span class="language-label">CSS</span>
                    <button class="copy-btn" onclick="copyCode(this)">
                        <i class="bi bi-clipboard"></i> Copy
                    </button>
                    <pre><code>.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem 2rem;
  background: #333;
  color: white;
}

.nav-links {
  display: flex;
  gap: 2rem;
  list-style: none;
}</code></pre>
                </div>

                <div class="key-takeaways">
                    <h3><i class="bi bi-lightbulb me-2"></i>Key Takeaways</h3>
                    <ul>
                        <li>Flexbox is a one-dimensional layout system perfect for distributing space along a single
                            axis</li>
                        <li>Use <code>display: flex</code> on a parent element to create a flex container</li>
                        <li><code>justify-content</code> controls alignment on the main axis</li>
                        <li><code>align-items</code> controls alignment on the cross axis</li>
                        <li>Flexbox makes responsive layouts much easier to implement</li>
                    </ul>
                </div>

                <h2>Additional Resources</h2>

                <ul>
                    <li><a href="#" target="_blank">MDN Web Docs: CSS Flexbox</a></li>
                    <li><a href="#" target="_blank">CSS-Tricks: A Complete Guide to Flexbox</a></li>
                    <li><a href="#" target="_blank">Flexbox Froggy (Interactive Game)</a></li>
                </ul>

            </div>

            <div class="questions-section mt-5">
                <h2 class="mb-4">Check Your Understanding</h2>
                <p class="text-muted mb-4">Answer these questions to test your knowledge and mark this topic as
                    complete.</p>

                <div class="question-card">
                    <div class="question-number">Question 1 of 5</div>
                    <div class="question-text">What CSS property is used to create a flexbox container?</div>

                    <div class="answer-options">
                        <label class="answer-option">
                            <input type="radio" name="q1" value="a">
                            <span>flex</span>
                        </label>
                        <label class="answer-option">
                            <input type="radio" name="q1" value="b">
                            <span>display: flex</span>
                        </label>
                        <label class="answer-option">
                            <input type="radio" name="q1" value="c">
                            <span>flexbox</span>
                        </label>
                        <label class="answer-option">
                            <input type="radio" name="q1" value="d">
                            <span>flex-container</span>
                        </label>
                    </div>

                    <button class="btn btn-primary mt-3" onclick="submitAnswer(1, 'b')" disabled id="submit-q1">
                        Submit Answer
                    </button>

                    <div class="feedback-message" id="feedback-q1"></div>
                </div>

                <div class="question-card">
                    <div class="question-number">Question 2 of 5</div>
                    <div class="question-text">Which property controls alignment along the main axis?</div>

                    <div class="answer-options">
                        <label class="answer-option">
                            <input type="radio" name="q2" value="a">
                            <span>align-items</span>
                        </label>
                        <label class="answer-option">
                            <input type="radio" name="q2" value="b">
                            <span>justify-content</span>
                        </label>
                        <label class="answer-option">
                            <input type="radio" name="q2" value="c">
                            <span>flex-direction</span>
                        </label>
                        <label class="answer-option">
                            <input type="radio" name="q2" value="d">
                            <span>align-content</span>
                        </label>
                    </div>

                    <button class="btn btn-primary mt-3" onclick="submitAnswer(2, 'b')" disabled id="submit-q2">
                        Submit Answer
                    </button>

                    <div class="feedback-message" id="feedback-q2"></div>
                </div>

                <div class="question-card">
                    <div class="question-number">Question 3 of 5</div>
                    <div class="question-text">What is the default flex-direction value?</div>

                    <div class="answer-options">
                        <label class="answer-option">
                            <input type="radio" name="q3" value="a">
                            <span>column</span>
                        </label>
                        <label class="answer-option">
                            <input type="radio" name="q3" value="b">
                            <span>row</span>
                        </label>
                        <label class="answer-option">
                            <input type="radio" name="q3" value="c">
                            <span>row-reverse</span>
                        </label>
                        <label class="answer-option">
                            <input type="radio" name="q3" value="d">
                            <span>column-reverse</span>
                        </label>
                    </div>

                    <button class="btn btn-primary mt-3" onclick="submitAnswer(3, 'b')" disabled id="submit-q3">
                        Submit Answer
                    </button>

                    <div class="feedback-message" id="feedback-q3"></div>
                </div>

                <div class="mt-4 p-3 bg-light rounded">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">Question Progress</span>
                        <span class="text-muted small" id="question-progress">0 of 3 questions answered</span>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar" role="progressbar" style="width: 0%; background: var(--accent-color);"
                            id="question-progress-bar"></div>
                    </div>
                </div>

            </div>

            <div class="task-submission-section mt-5">
                <div class="question-card">
                    <h2 class="mb-3">Submit Your Quest Solution</h2>
                    <p class="text-muted mb-4">
                        a question
                    </p>

                    <div class="mb-4">
                        <label for="task-input" class="form-label"
                            style="font-weight: 600; color: var(--heading-color);">
                            Code Submission
                        </label>

                        <textarea class="form-control" id="task-input"
                            style="padding: 0.75rem; border: 2px solid color-mix(in srgb, var(--default-color), transparent 85%); border-radius: 8px;"></textarea>
                    </div>

                    <div class="d-flex gap-3 flex-wrap justify-content-between align-items-center">
                        <button class="btn btn-primary flex-grow-1" id="ai-review-btn" onclick="submitForAIReview()">
                            Review by AI
                            <span class="badge bg-light text-dark ms-2" id="ai-trials-badge">3 trials left</span>
                        </button>
                        <button class="btn btn-outline-secondary flex-grow-1" id="instructor-review-btn"
                            onclick="submitForInstructorReview()">
                            <i class="bi bi-person-check me-2"></i>Review by Instructor
                        </button>
                    </div>

                    <div class="mt-4" id="task-feedback" style="display: none;">
                        <div class="alert" role="alert" id="task-feedback-content">
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="completion-section" style="display: none;" id="completion-section">
                <div class="completion-icon">🎉</div>
                <h2>Great work! You've completed this topic.</h2>
                <p class="text-muted mb-4">You answered all questions! • Time spent: Just now</p>

                <div class="d-flex gap-3 justify-content-center">
                    <a href="#" class="btn btn-primary btn-lg">
                        Continue to Next Topic <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                    <button class="btn btn-outline-secondary btn-lg"
                        onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
                        <i class="bi bi-arrow-up me-2"></i>Review This Topic
                    </button>
                </div>
            </div>

            <footer class="d-flex justify-content-between mt-5 pt-4 border-top">
                <a class="btn btn-outline-secondary" disabled>
                    <i class="bi bi-chevron-left me-2"></i>Previous
                </a>

                <a class="btn btn-primary">
                    Next<i class="bi bi-chevron-right ms-2"></i>
                </a>
            </footer>

        </div>

    </main>
@endsection

@push('scripts')

<!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script>
        function checkDynamicAnswer(qId) {
            const selectedOption = document.querySelector(`input[name="q${qId}"]:checked`);
            if(!selectedOption) return;
            
            const label = selectedOption.closest('.answer-option');
            const isCorrect = label.getAttribute('data-is-correct') == '1';
            const feedback = document.getElementById(`feedback-q${qId}`);
            const explanation = document.getElementById(`explanation-q${qId}`);
            
            document.querySelectorAll(`input[name="q${qId}"]`).forEach(el => el.disabled = true);
            document.getElementById(`submit-q${qId}`).disabled = true;
            
            if(isCorrect) {
                label.classList.add('correct');
                feedback.className = 'feedback-message correct show';
                feedback.innerHTML = '<strong><i class="bi bi-check-circle me-2"></i>Correct!</strong>';
            } else {
                label.classList.add('incorrect');
                feedback.className = 'feedback-message incorrect show';
                feedback.innerHTML = '<strong><i class="bi bi-x-circle me-2"></i>Incorrect.</strong>';
            }
            
            if(explanation) explanation.style.display = 'block';
        }
        
        function simulateAIReview(qId) {
            document.getElementById(`task-feedback-${qId}`).style.display = 'block';
        }

        document.addEventListener('change', function(e) {
            if(e.target.matches('input[type="radio"]')) {
                const name = e.target.name;
                if(name.startsWith('q')) {
                    const qId = name.substring(1);
                    const btn = document.getElementById(`submit-q${qId}`);
                    if(btn) btn.disabled = false;
                    
                    const container = document.getElementById(`options-${qId}`);
                    if(container) {
                        container.querySelectorAll('.answer-option').forEach(opt => opt.classList.remove('selected'));
                        e.target.closest('.answer-option').classList.add('selected');
                    }
                }
            }
        });
    </script>
    
    <script>
        let answeredQuestions = 0;
        const totalQuestions = 3;

        document.querySelectorAll('input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', function () {
                if(this.closest('.topic-content-wrapper').querySelector('.questions-section') && !{{ isset($topic) ? 'true' : 'false' }}) {
                    const questionNum = this.name.replace('q', '');
                    const btn = document.getElementById('submit-q' + questionNum);
                    if(btn) {
                        btn.disabled = false;
       
                        const parent = this.closest('.answer-options');
                        parent.querySelectorAll('.answer-option').forEach(opt => opt.classList.remove('selected'));
                        this.closest('.answer-option').classList.add('selected');
                    }
                }
            });
        });

        function submitAnswer(questionNum, correctAnswer) {
            const selectedAnswer = document.querySelector(`input[name="q${questionNum}"]:checked`);
            if (!selectedAnswer) return;

            const feedback = document.getElementById(`feedback-q${questionNum}`);
            const submitBtn = document.getElementById(`submit-q${questionNum}`);
            const answerOptions = document.querySelectorAll(`input[name="q${questionNum}"]`);

            answerOptions.forEach(opt => opt.disabled = true);
            submitBtn.disabled = true;

            if (selectedAnswer.value === correctAnswer) {
                selectedAnswer.closest('.answer-option').classList.add('correct');
                feedback.className = 'feedback-message correct show';
                feedback.innerHTML = '<strong><i class="bi bi-check-circle me-2"></i>Correct!</strong> Good job. Yes, <code>display: flex</code> makes an element a flex container.';

                answeredQuestions++;
                updateProgress();
            } else {
                selectedAnswer.closest('.answer-option').classList.add('incorrect');
                feedback.className = 'feedback-message incorrect show';
                feedback.innerHTML = '<strong><i class="bi bi-x-circle me-2"></i>Not quite.</strong> The correct answer is: <strong>display: flex</strong>';
            }
        }

        function updateProgress() {
            const progressText = document.getElementById('question-progress');
            const progressBar = document.getElementById('question-progress-bar');
            
            if(progressText && progressBar) {
                progressText.textContent = `${answeredQuestions} of ${totalQuestions} questions answered`;
                progressBar.style.width = `${(answeredQuestions / totalQuestions) * 100}%`;
   
                if (answeredQuestions === totalQuestions) {
                    setTimeout(() => {
                        const comp = document.getElementById('completion-section');
                        if(comp) {
                            comp.style.display = 'block';
                            comp.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    }, 1000);
                }
            }
        }

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

        const themeToggle = document.getElementById('theme-toggle');
        if(themeToggle) {
            const htmlElement = document.documentElement;
   
            const currentTheme = localStorage.getItem('theme') || 'light';
            if (currentTheme === 'dark') {
                htmlElement.classList.add('dark-mode');
                themeToggle.querySelector('i').classList.replace('bi-moon-stars', 'bi-sun');
            }
   
            themeToggle.addEventListener('click', function () {
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
        }

        let aiTrialsLeft = 3;

        function submitForAIReview() {
            const taskInput = document.getElementById('task-input');
            if(taskInput) {
                const taskFeedback = document.getElementById('task-feedback');
                const taskFeedbackContent = document.getElementById('task-feedback-content');
                const aiTrialsBadge = document.getElementById('ai-trials-badge');
                const aiReviewBtn = document.getElementById('ai-review-btn');
   
                if (!taskInput.value.trim()) {
                    taskFeedbackContent.className = 'alert alert-warning';
                    taskFeedbackContent.innerHTML = '<i class="bi bi-exclamation-triangle me-2"></i><strong>Please enter your task submission</strong> before requesting a review.';
                    taskFeedback.style.display = 'block';
                    return;
                }
   
                if (aiTrialsLeft <= 0) {
                    taskFeedbackContent.className = 'alert alert-danger';
                    taskFeedbackContent.innerHTML = '<i class="bi bi-x-circle me-2"></i><strong>No AI trials left.</strong> Please submit to instructor for review.';
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
                taskFeedbackContent.innerHTML = '<strong>AI Review:</strong> Your submission has been analyzed. Good effort! Consider improving the flexbox alignment and adding more responsive breakpoints. Try using <code>justify-content: space-between</code> for better spacing.';
                taskFeedback.style.display = 'block';
   
                taskFeedback.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        }

        function submitForInstructorReview() {
            const taskInput = document.getElementById('task-input');
            if(taskInput) {
                const taskFeedback = document.getElementById('task-feedback');
                const taskFeedbackContent = document.getElementById('task-feedback-content');
   
                if (!taskInput.value.trim()) {
                    taskFeedbackContent.className = 'alert alert-warning';
                    taskFeedbackContent.innerHTML = '<i class="bi bi-exclamation-triangle me-2"></i><strong>Please enter your task submission</strong> before requesting a review.';
                    taskFeedback.style.display = 'block';
                    return;
                }
   
                taskFeedbackContent.className = 'alert alert-success';
                taskFeedbackContent.innerHTML = '<i class="bi bi-check-circle me-2"></i><strong>Submitted to Instructor!</strong> Your task has been sent for review. You will receive feedback within 24-48 hours via email and in your dashboard.';
                taskFeedback.style.display = 'block';
   
                taskFeedback.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        }
    </script>

@endpush
