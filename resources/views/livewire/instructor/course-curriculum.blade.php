<div>
    <div class="row">
        <div class="col-12">
            <h3 class="mb-4">Course Curriculum</h3>

            @foreach($modules as $module)
                <div class="module-item" data-aos="fade-up">
                    <div class="module-header" data-bs-toggle="collapse"
                        data-bs-target="#module{{ $module->id }}Content">
                        <div class="module-title-section">
                            <span class="module-number">{{ $module->order }}</span>
                            <input type="text" class="module-title-input" value="{{ $module->title }}" readonly>
                        </div>
                        <div class="module-actions">
                            <button class="btn btn-sm btn-primary"
                                wire:click.stop="editModule({{ $module->id }})">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger"
                                wire:click.stop="deleteModule({{ $module->id }})" wire:confirm="Are you sure you want to delete this module?">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div id="module{{ $module->id }}Content" class="collapse show">
                        <div class="module-content">
                            <!-- Topics -->
                            @foreach($module->topics as $topic)
                                <div class="topic-item">
                                    <div class="topic-icon">
                                        <i class="bi bi-file-earmark-text"></i>
                                    </div>
                                    <div class="topic-details">
                                        <div class="topic-title">{{ $topic->title }}</div>
                                        <div class="topic-meta">{{ $topic->xp_points }} XP • {{ $topic->questions->count() }} questions</div>
                                    </div>
                                    <div class="topic-actions">
                                        <a class="btn btn-sm btn-primary btn-icon"
                                            href="{{ route('instructor.edit-topic', ['id' => $topic->id]) }}">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button class="btn btn-sm btn-outline-danger btn-icon"
                                            wire:click="deleteTopic({{ $topic->id }})" wire:confirm="Are you sure you want to delete this topic?">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach

                            <a href="{{ route('instructor.edit-topic') }}?module_id={{ $module->id }}">
                                <div class="mt-3">
                                    <button class="add-content-btn">
                                        <i class="bi bi-plus-circle me-2"></i>Add Topic
                                    </button>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="row mt-4">
                <div class="col-md-6 mb-3">
                    <button class="btn btn-primary w-100" wire:click="openAddModuleModal">
                        <i class="bi bi-plus-circle me-2"></i>Add Module
                    </button>
                </div>
                <div class="col-md-6 mb-3">
                    <a class="btn btn-primary w-100"
                        href="{{ route('instructor.edit-project') }}?course_id={{ $course->id }}">
                        <i class="bi bi-tools me-2"></i>Add Project
                    </a>
                </div>
            </div>

        </div>
    </div>


    <div class="modal fade" id="addModuleModal" tabindex="-1" aria-labelledby="addModuleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModuleModalLabel">Add New Module</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="moduleTitle" class="form-label">Module Title *</label>
                        <input type="text" class="form-control" id="moduleTitle" wire:model="moduleTitle">
                        @error('moduleTitle') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="moduleDescription" class="form-label">Module Description</label>
                        <textarea class="form-control" id="moduleDescription" wire:model="moduleDescription" rows="3"></textarea>
                        @error('moduleDescription') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" wire:click="saveModule">Add Module</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModuleModal" tabindex="-1" aria-labelledby="editModuleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModuleModalLabel">Edit Module</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editModuleTitle" class="form-label">Module Title *</label>
                        <input type="text" class="form-control" id="editModuleTitle" wire:model="moduleTitle">
                        @error('moduleTitle') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="editModuleDescription" class="form-label">Module Description</label>
                        <textarea class="form-control" id="editModuleDescription" wire:model="moduleDescription" rows="3"></textarea>
                        @error('moduleDescription') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" wire:click="updateModule">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('open-add-module-modal', () => {
                var modal = new bootstrap.Modal(document.getElementById('addModuleModal'));
                modal.show();
            });

            @this.on('open-edit-module-modal', () => {
                var modal = new bootstrap.Modal(document.getElementById('editModuleModal'));
                modal.show();
            });

            @this.on('close-modal', () => {
                var addModalEl = document.getElementById('addModuleModal');
                var addModal = bootstrap.Modal.getInstance(addModalEl);
                if (addModal) addModal.hide();

                var editModalEl = document.getElementById('editModuleModal');
                var editModal = bootstrap.Modal.getInstance(editModalEl);
                if (editModal) editModal.hide();
            });

            @this.on('show-toast', (event) => {
                 Swal.fire({
                    icon: event.type,
                    title: event.message,
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
            });
        });
    </script>
</div>
