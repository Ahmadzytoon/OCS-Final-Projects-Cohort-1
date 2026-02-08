@extends('layouts.instructor')
@section('title', 'Code Quest | Add Course')

@section('content')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Generate Course with AI</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('instructor.home') }}">Home</a></li>
                        <li class="current">Course Generator</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- AI Course Generation Form Section -->
        <section class="section">
            <div class="container" data-aos="fade-up">

                <div class="row justify-content-center">
                    <div class="col-lg-8">

                        <div class="card border-0 shadow-sm p-4">
                            <div class="card-body">
                                <h3 class="mb-4 text-center">Let Us Build Your Course</h3>

                                <form action="#" method="POST" enctype="multipart/form-data">

                                    <!-- Thumbnail Upload -->
                                    <div class="mb-5">
                                        <label class="form-label fw-bold mb-3">Course Thumbnail</label>
                                        <div class="ai-upload-box"
                                            onclick="document.getElementById('course-thumbnail').click()">
                                            <i class="bi bi-cloud-arrow-up ai-upload-icon"></i>
                                            <h5>Click to upload image</h5>
                                            <p class="text-muted small">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                            <input type="file" id="course-thumbnail" name="thumbnail" accept="image/*"
                                                class="d-none" onchange="previewImage(this)">
                                            <img id="thumbnail-preview" class="upload-preview" src="#"
                                                alt="Preview">
                                        </div>
                                    </div>

                                    <!-- Course Description -->
                                    <div class="mb-5">
                                        <label for="course-description" class="form-label fw-bold">Describe your
                                            course</label>
                                        <p class="text-muted small mb-3">Be as detailed as possible. Mention the target
                                            audience, key topics, project ideas, and the overall learning goal.</p>
                                        <textarea class="form-control" id="course-description" name="description" rows="10"
                                            placeholder="e.g. A comprehensive guide to Python for absolute beginners. Start with variables and loops, move to functions and objects, and end with a final project building a simple game. I want the tone to be fun and engaging..."
                                            style="resize: vertical;"></textarea>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary btn-lg"
                                            style="padding: 1rem; font-size: 1.2rem;">
                                            <i class="bi bi-stars me-2"></i>Generate Course Structure
                                        </button>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>

    </main>


@endsection

@push('scripts')
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var preview = document.getElementById('thumbnail-preview');
                    preview.src = e.target.result;
                    preview.style.display = 'inline-block';

                    var icon = input.parentElement.querySelector('.ai-upload-icon');
                    var h5 = input.parentElement.querySelector('h5');
                    var p = input.parentElement.querySelector('p');
                    if (icon) icon.style.display = 'none';
                    if (h5) h5.style.display = 'none';
                    if (p) p.style.display = 'none';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
