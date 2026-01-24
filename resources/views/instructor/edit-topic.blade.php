@extends('layouts.instructor')
@section('title', 'Code Quest | ' . ($topic ? 'Edit Topic' : 'Create New Topic'))
@section('content')
    <main class="main py-5">
        <div class="container">

            <form id="topicForm" action="{{ route('instructor.save-topic') }}" method="POST">
                @csrf
                <input type="hidden" name="topic_id" value="{{ $topic->id ?? '' }}">
                <input type="hidden" name="module_id" value="{{ $moduleId ?? ($topic->module_id ?? '') }}">
                <input type="hidden" name="content" id="hiddenContent">

                <div class="row mb-4 align-items-center">
                    <div class="col-md-8">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-2">
                                <li class="breadcrumb-item"><a href="{{ route('instructor.home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('instructor.edit-course', ['id' => $topic ? $topic->module->course_id : (\App\Models\Module::find($moduleId)->course_id ?? '')]) }}">Course Editor</a></li>
                                <li class="breadcrumb-item active">Edit Topic</li>
                            </ol>
                        </nav>
                        <h2 class="mb-0">{{ $topic ? 'Edit Topic: ' . $topic->title : 'Create New Topic' }}</h2>
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="{{ route('instructor.edit-course', ['id' => $topic ? $topic->module->course_id : (\App\Models\Module::find($moduleId)->course_id ?? '')]) }}" class="btn btn-outline-secondary me-2">Cancel</a>
                        <button type="button" class="btn btn-primary" onclick="submitForm()">Save Changes</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8">

                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Topic Title</label>
                                    <input type="text" name="title" class="form-control form-control-lg" value="{{ $topic->title ?? '' }}" placeholder="Enter topic title" required>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                                <h5 class="card-title fw-bold">Topic Content</h5>
                            </div>
                            <div class="card-body">
                                <div class="editor-container">
                                    <div class="editor-toolbar">
                                        <button type="button" class="editor-btn fw-bold" onclick="formatDoc('bold')" title="Bold">B</button>
                                        <button type="button" class="editor-btn fst-italic" onclick="formatDoc('italic')" title="Italic">I</button>
                                        <div class="vr mx-1"></div>
                                        <button type="button" class="editor-btn" onclick="formatDoc('formatBlock','h2')" title="Heading 2">H2</button>
                                        <button type="button" class="editor-btn" onclick="formatDoc('formatBlock','h3')" title="Heading 3">H3</button>
                                        <div class="vr mx-1"></div>
                                        <button type="button" class="editor-btn" onclick="formatDoc('insertUnorderedList')" title="Bullet List"><i class="bi bi-list-ul"></i></button>
                                        <button type="button" class="editor-btn" onclick="formatDoc('insertOrderedList')" title="Numbered List"><i class="bi bi-list-ol"></i></button>
                                        <div class="vr mx-1"></div>
                                        <button type="button" class="editor-btn" onclick="insertCode()" title="Insert Code Block"><i class="bi bi-code-slash"></i> Code</button>
                                    </div>
                                    <div class="editor-content" contenteditable="true" id="topicContent">
                                        {!! $topic->content ?? '<p>Start writing your topic content here...</p>' !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                                <h5 class="card-title fw-bold">Key Takeaways</h5>
                            </div>
                            <div class="card-body">
                                <textarea class="form-control" name="summary" rows="4" placeholder="Enter key points for the student to remember...">{{ $topic->summary ?? '' }}</textarea>
                                <small class="text-muted">Displayed in a highlighted box at the end of the topic.</small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h4 class="mb-3">Quiz Questions</h4>
                        </div>

                        <div id="questions-container">
                            @if(isset($topic) && $topic->questions)
                                @foreach($topic->questions as $index => $question)
                                    <div class="question-card" id="question-{{ $index }}">
                                        <input type="hidden" name="questions[{{ $index }}][id]" value="{{ $question->id }}">
                                        <input type="hidden" name="questions[{{ $index }}][type]" value="{{ $question->type }}">
                                        <div class="question-actions">
                                            <button type="button" class="btn btn-sm btn-link text-danger" onclick="deleteQuestion('question-{{ $index }}')"><i class="bi bi-trash"></i></button>
                                        </div>
                                        <div class="mb-3">
                                            <span class="badge bg-light text-dark border">{{ $question->type == 'multiple_choice' ? 'Multiple Choice' : 'Quest' }}</span>
                                        </div>
                                        
                                        @if($question->type == 'multiple_choice')
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Question Text</label>
                                                <textarea class="form-control" name="questions[{{ $index }}][text]" rows="2" placeholder="Enter your question...">{{ $question->question_text }}</textarea>
                                            </div>
                                            <label class="form-label fw-bold">Answer Options</label>
                                            <div class="options-container" id="options-question-{{ $index }}">
                                                @foreach($question->options as $optIndex => $option)
                                                    <div class="option-item">
                                                        <input type="radio" name="temp_correct_{{ $index }}" {{ $option->is_correct ? 'checked' : '' }} onchange="setCorrect(this)">
                                                        <input type="hidden" name="questions[{{ $index }}][options][{{ $optIndex }}][is_correct]" value="{{ $option->is_correct ? '1' : '0' }}" class="is-correct-val">
                                                        <input type="text" name="questions[{{ $index }}][options][{{ $optIndex }}][text]" class="form-control" value="{{ $option->option_text }}" placeholder="Option">
                                                        <button type="button" class="btn btn-sm btn-outline-danger border-0" onclick="removeOption(this)"><i class="bi bi-x-lg"></i></button>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" class="btn btn-sm btn-link text-decoration-none px-0 mb-3" onclick="addOption('options-question-{{ $index }}', {{ $index }}, {{ $question->options->count() }})">+ Add Option</button>
                                        @else
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Quest Description</label>
                                                <input type="text" name="questions[{{ $index }}][text]" class="form-control" value="{{ $question->question_text }}" placeholder="Describe the task instructions here...">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Expected Solution</label>
                                                <input type="text" name="questions[{{ $index }}][explanation]" class="form-control" value="{{ $question->explanation }}" placeholder="Describe the correct answer/code here">
                                            </div>
                                        @endif
                                        
                                        @if($question->type == 'multiple_choice')
                                        <div>
                                            <label class="form-label fw-bold">Explanation (Optional)</label>
                                            <textarea class="form-control" name="questions[{{ $index }}][explanation]" rows="2" placeholder="Explain why the answer is correct...">{{ $question->explanation }}</textarea>
                                        </div>
                                        @endif
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-outline" id="addQuestionBtn" onclick="addQuestion()">
                                <i class="bi bi-plus-lg me-1"></i> Add Multiple Choice Question
                            </button>
                            <button type="button" class="btn btn-outline" id="addQuestBtn" onclick="addQuest()">
                                <i class="bi bi-code-square me-1"></i> Add Task
                            </button>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="card shadow-sm border-0 sticky-top" style="top: 100px; z-index: 1;">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label text-muted small text-uppercase fw-bold">Preview</label>
                                    @if($topic)
                                    <a href="{{ route('instructor.preview-topic', ['id' => $topic->id]) }}" target="_blank"
                                        class="btn btn-outline-secondary w-100">
                                        <i class="bi bi-eye me-2"></i>Preview Topic
                                    </a>
                                    @else
                                    <button class="btn btn-outline-secondary w-100" disabled>Save to Preview</button>
                                    @endif
                                </div>
                                <hr>
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-primary" onclick="submitForm()">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </main>
@endsection

@push('scripts')
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        function formatDoc(cmd, value) {
            document.execCommand(cmd, false, value);
        }

        function insertCode() {
            Swal.fire({
                title: 'Insert Code Block',
                html: '<textarea id="swal-code-input" class="swal2-textarea" placeholder="Paste your code here..." rows="10" style="font-family: monospace; font-size: 14px;"></textarea>',
                showCancelButton: true,
                confirmButtonText: 'Insert',
                width: '600px',
                preConfirm: () => {
                    return document.getElementById('swal-code-input').value;
                }
            }).then((result) => {
                if (result.isConfirmed && result.value) {
                    const code = result.value;
                    const codeId = 'code-' + Date.now();
                    const codeHtml =
                        `<div style="background:#f8f9fa; padding:15px; border-radius:4px; font-family:monospace; margin: 10px 0; border: 1px solid #dee2e6;" id="${codeId}"><pre style="margin: 0; white-space: pre-wrap; word-wrap: break-word;">${code.replace(/</g, '&lt;').replace(/>/g, '&gt;')}</pre></div>`;

                    const editor = document.getElementById('topicContent');
                    editor.focus();

                    const selection = window.getSelection();
                    if (selection.rangeCount > 0) {
                        const range = selection.getRangeAt(0);
                        range.deleteContents();
                        const div = document.createElement('div');
                        div.innerHTML = codeHtml;
                        range.insertNode(div.firstChild);
                    } else {
                        editor.innerHTML += codeHtml;
                    }
                }
            });
        }

        let questionCount = {{ isset($topic) ? $topic->questions->count() : 0 }};

        function addQuestion() {
            const index = questionCount;
            questionCount++;
            const qId = `question-${index}`;
            const groupName = `temp_correct_${index}_${Date.now()}`; 

            const questionCard = document.createElement('div');
            questionCard.className = 'question-card';
            questionCard.id = qId;
            questionCard.innerHTML = `
                <input type="hidden" name="questions[${index}][type]" value="multiple_choice">
                <div class="question-actions">
                    <button type="button" class="btn btn-sm btn-link text-danger" onclick="deleteQuestion('${qId}')"><i class="bi bi-trash"></i></button>
                </div>
                <div class="mb-3">
                    <span class="badge bg-light text-dark border">Multiple Choice</span>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Question Text</label>
                    <textarea class="form-control" name="questions[${index}][text]" rows="2" placeholder="Enter your question..."></textarea>
                </div>
                <label class="form-label fw-bold">Answer Options</label>
                <div class="options-container" id="options-${qId}">
                    <div class="option-item">
                        <input type="radio" name="${groupName}" checked onchange="setCorrect(this)">
                        <input type="hidden" name="questions[${index}][options][0][is_correct]" value="1" class="is-correct-val">
                        <input type="text" name="questions[${index}][options][0][text]" class="form-control" placeholder="Option 1">
                        <button type="button" class="btn btn-sm btn-outline-danger border-0" onclick="removeOption(this)"><i class="bi bi-x-lg"></i></button>
                    </div>
                    <div class="option-item">
                        <input type="radio" name="${groupName}" onchange="setCorrect(this)">
                        <input type="hidden" name="questions[${index}][options][1][is_correct]" value="0" class="is-correct-val">
                        <input type="text" name="questions[${index}][options][1][text]" class="form-control" placeholder="Option 2">
                        <button type="button" class="btn btn-sm btn-outline-danger border-0" onclick="removeOption(this)"><i class="bi bi-x-lg"></i></button>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-link text-decoration-none px-0 mb-3" onclick="addOption('options-${qId}', ${index})">+ Add Option</button>
                
                <div>
                    <label class="form-label fw-bold">Explanation (Optional)</label>
                    <textarea class="form-control" name="questions[${index}][explanation]" rows="2" placeholder="Explain why the answer is correct..."></textarea>
                </div>
            `;

            document.getElementById('questions-container').appendChild(questionCard);
        }

        function addQuest() {
            const index = questionCount;
            questionCount++;
            const qId = `question-${index}`;

            const questCard = document.createElement('div');
            questCard.className = 'question-card';
            questCard.id = qId;

            questCard.innerHTML = `
                <input type="hidden" name="questions[${index}][type]" value="task">
                <div class="question-actions">
                    <button type="button" class="btn btn-sm btn-link text-danger" onclick="deleteQuestion('${qId}')"><i class="bi bi-trash"></i></button>
                </div>
                <div class="mb-3">
                    <span class="badge bg-light text-dark border">Quest</span>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Quest Description</label>
                    <input type="text" name="questions[${index}][text]" class="form-control" placeholder="Describe the task instructions here...">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Expected Solution</label>
                    <input type="text" name="questions[${index}][explanation]" class="form-control" placeholder="Describe the correct answer/code here">
                </div>
            `;

            document.getElementById('questions-container').appendChild(questCard);
        }

        function deleteQuestion(id) {
            Swal.fire({
                title: 'Delete Question?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(id).remove();
                }
            })
        }

        function addOption(containerId, questionIndex, existingCount = null) {
            const container = document.getElementById(containerId);
            const count = uniqueId();
         
            const optIndex = Date.now() + Math.floor(Math.random() * 1000);
            
            const firstRadio = container.querySelector('input[type="radio"]');
            const groupName = firstRadio ? firstRadio.name : `temp_correct_${questionIndex}_new`;

            const html = `
                <div class="option-item">
                    <input type="radio" name="${groupName}" onchange="setCorrect(this)">
                    <input type="hidden" name="questions[${questionIndex}][options][${optIndex}][is_correct]" value="0" class="is-correct-val">
                    <input type="text" name="questions[${questionIndex}][options][${optIndex}][text]" class="form-control" placeholder="New Option">
                    <button type="button" class="btn btn-sm btn-outline-danger border-0" onclick="removeOption(this)"><i class="bi bi-x-lg"></i></button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
        }

        function removeOption(btn) {
            const row = btn.closest('.option-item');
            const container = row.parentElement;
            if (container.querySelectorAll('.option-item').length > 2) {
                row.remove();
            } else {
                Swal.fire('Cannot delete', 'A multiple choice question must have at least 2 options.', 'error');
            }
        }

        function setCorrect(radio) {
            const container = radio.closest('.options-container');
            const hiddenInputs = container.querySelectorAll('.is-correct-val');
            hiddenInputs.forEach(input => input.value = '0');

            const hiddenInput = radio.nextElementSibling;
            if(hiddenInput.classList.contains('is-correct-val')) {
                hiddenInput.value = '1';
            }
        }
        
        function uniqueId() {
            return Math.floor(Math.random() * 1000000);
        }

        function submitForm() {
            const content = document.getElementById('topicContent').innerHTML;
            document.getElementById('hiddenContent').value = content;
            
           
            const form = document.getElementById('topicForm');
            if(!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            Swal.fire({
                title: 'Saving...',
                didOpen: () => {
                    Swal.showLoading()
                }
            });

            form.submit();
        }
    </script>
@endpush
