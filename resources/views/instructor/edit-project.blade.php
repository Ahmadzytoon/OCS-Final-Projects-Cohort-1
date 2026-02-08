@extends('layouts.instructor')
@section('title', 'Code Quest | Edit Project')
@section('content')

    <main class="main py-5">
        <div class="container">

            <div class="row mb-4 align-items-center">
                <div class="col-md-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-2">
                            <li class="breadcrumb-item"><a href="{{ route('instructor.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('instructor.edit-course') }}">Web Development
                                    Bootcamp</a></li>
                            <li class="breadcrumb-item active">Edit Project</li>
                        </ol>
                    </nav>
                    <h2 class="mb-0">Edit Project: Build Your First Website</h2>
                </div>
                <div class="col-md-4 text-end">
                    <a href="{{ route('instructor.edit-course') }}" class="btn btn-outline-secondary me-2">Cancel</a>
                    <button class="btn btn-primary">Save Changes</button>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">

                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Project Title</label>
                                <input type="text" class="form-control form-control-lg" value="Build Your First Website">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Short Description</label>
                                <textarea class="form-control" rows="2">Create a personal portfolio page using HTML and CSS.</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Estimated Time (Hours)</label>
                                    <input type="number" class="form-control" value="1">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Difficulty</label>
                                    <select class="form-select">
                                        <option value="beginner" selected>Beginner</option>
                                        <option value="intermediate">Intermediate</option>
                                        <option value="advanced">Advanced</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                            <h5 class="card-title fw-bold">Project Instructions</h5>
                        </div>
                        <div class="card-body">
                            <div class="editor-container">
                                <div class="editor-toolbar">
                                    <button class="editor-btn fw-bold" onclick="formatDoc('bold')">B</button>
                                    <button class="editor-btn fst-italic" onclick="formatDoc('italic')">I</button>
                                    <div class="vr mx-1"></div>
                                    <button class="editor-btn" onclick="formatDoc('formatBlock','h2')">H2</button>
                                    <button class="editor-btn" onclick="formatDoc('formatBlock','h3')">H3</button>
                                    <div class="vr mx-1"></div>
                                    <button class="editor-btn" onclick="formatDoc('insertUnorderedList')"><i
                                            class="bi bi-list-ul"></i></button>
                                    <button class="editor-btn" onclick="formatDoc('insertOrderedList')"><i
                                            class="bi bi-list-ol"></i></button>
                                    <div class="vr mx-1"></div>
                                    <button class="editor-btn" onclick="insertCode()"><i class="bi bi-code-slash"></i>
                                        Code</button>
                                </div>
                                <div class="editor-content" contenteditable="true" id="projectContent">
                                    <h4>Step 1: Setup</h4>
                                    <p>Create a new folder specifically for your project.</p>
                                    <h4>Step 2: HTML Structure</h4>
                                    <p>Create an index.html file...</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                            <h5 class="card-title fw-bold">Requirements</h5>
                        </div>
                        <div class="card-body">
                            <div id="requirementsList" class="mb-4">
                                <div class="row mb-3 requirement-item">
                                    <div class="col-md-12">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text bg-white border-end-0">
                                                <i class="bi bi-check-lg"></i>
                                            </span>
                                            <input type="text" name="requirement[]"
                                                class="form-control border-start-0 rounded-end" required
                                                value="Must use semantic HTML tags">
                                            <button type="button"
                                                class="btn bg-white border border-start-0 text-danger remove-requirement"
                                                style="z-index: 0;">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 requirement-item">
                                    <div class="col-md-12">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text bg-white border-end-0">
                                                <i class="bi bi-check-lg"></i>
                                            </span>
                                            <input type="text" name="requirement[]"
                                                class="form-control border-start-0 rounded-end" required
                                                value="Include at least one image">
                                            <button type="button"
                                                class="btn bg-white border border-start-0 text-danger remove-requirement"
                                                style="z-index: 0;">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 requirement-item">
                                    <div class="col-md-12">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text bg-white border-end-0">
                                                <i class="bi bi-check-lg"></i>
                                            </span>
                                            <input type="text" name="requirement[]"
                                                class="form-control border-start-0 rounded-end" required
                                                value="Use CSS for styling">
                                            <button type="button"
                                                class="btn bg-white border border-start-0 text-danger remove-requirement"
                                                style="z-index: 0;">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="button" id="addRequirement" class="btn btn-outline btn-lg mb-3">
                                <i class="bi bi-plus-circle me-2"></i>Add Requirement
                            </button>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                            <h5 class="card-title fw-bold">Starter Files & Resources</h5>
                        </div>
                        <div class="card-body">
                            <div id="resourcesList" class="mb-4">
                                <div class="row mb-3 resource-file-item">
                                    <div class="col-md-12">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text bg-white border-end-0">
                                                <i class="bi bi-file-earmark-zip"></i>
                                            </span>
                                            <input type="text" name="resource[]"
                                                class="form-control border-start-0 rounded-end" required
                                                value="starter-template.zip">
                                            <button type="button"
                                                class="btn bg-white border border-start-0 text-danger remove-resource"
                                                style="z-index: 0;">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="border rounded p-4 text-center bg-light" style="border-style: dashed !important;">
                                <i class="bi bi-cloud-upload fs-3 text-muted"></i>
                                <p class="mb-2 mt-2">Drag and drop files here</p>
                                <input type="file" id="fileInput" multiple style="display: none;">
                                <button type="button" class="btn btn-sm btn-outline" id="browseFilesBtn">Browse
                                    Files</button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4">
                    <div class="card shadow-sm border-0 sticky-top" style="top: 100px; z-index: 1;">
                        <div class="card-body">

                            <div class="mb-3">
                                <a href="{{ route('instructor.preview-project') }}" target="_blank"
                                    class="btn btn-outline-secondary w-100">
                                    <i class="bi bi-eye me-2"></i>Preview Project
                                </a>
                            </div>
                            <hr>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>
@endsection

@push('scripts')
    <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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


                    const editor = document.getElementById('projectContent');
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

        document.getElementById('addRequirement').addEventListener('click', function() {
            const container = document.getElementById('requirementsList');
            const newRequirement = document.createElement('div');
            newRequirement.className = 'row mb-3 requirement-item';
            newRequirement.innerHTML = `
                <div class="col-md-12">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-check-lg"></i>
                        </span>
                        <input type="text" name="requirement[]" class="form-control border-start-0" required>
                        <button type="button" class="btn bg-white border border-start-0 text-danger remove-requirement" style="z-index: 0;">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            `;
            container.appendChild(newRequirement);
        });

        document.addEventListener('click', function(e) {
            if (e.target.closest('.remove-requirement')) {
                e.target.closest('.requirement-item').remove();
            }
        });

        const fileInput = document.getElementById('fileInput');
        const browseFilesBtn = document.getElementById('browseFilesBtn');

        browseFilesBtn.addEventListener('click', function() {
            fileInput.click();
        });

        fileInput.addEventListener('change', function(e) {
            const files = e.target.files;
            if (files.length > 0) {
                const container = document.getElementById('resourcesList');
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const newResource = document.createElement('div');
                    newResource.className = 'row mb-3 resource-file-item';
                    newResource.innerHTML = `
                        <div class="col-md-12">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-file-earmark-zip"></i>
                                </span>
                                <input type="text" name="resource[]"
                                    class="form-control border-start-0 rounded-end" required
                                    value="${file.name}">
                                <button type="button"
                                    class="btn bg-white border border-start-0 text-danger remove-resource"
                                    style="z-index: 0;">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    `;
                    container.appendChild(newResource);
                }
                fileInput.value = '';
            }
        });

        document.addEventListener('click', function(e) {
            if (e.target.closest('.remove-resource')) {
                Swal.fire({
                    title: 'Delete Resource?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        e.target.closest('.resource-file-item').remove();
                    }
                });
            }
        });
    </script>
@endpush
