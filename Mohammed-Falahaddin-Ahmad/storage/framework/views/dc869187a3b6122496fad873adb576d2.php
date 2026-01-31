
<?php $__env->startSection('title', 'User Management'); ?>
<?php $__env->startSection('page-title', 'User Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="table-container">

    <div class="table-header">
        <h5 class="mb-0"><i class="fas fa-users me-2"></i> User Management</h5>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
            <i class="fas fa-plus me-2"></i> Add User
        </button>
    </div>

    <div style="padding: 0 2rem;">
        
        <div class="row mb-4 g-3">
            <div class="col-md-5 col-lg-4">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input
                        type="text"
                        class="form-control"
                        id="searchUsers"
                        placeholder="Search by name, email, phone..."
                    >
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Registered</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody id="usersTableBody">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <tr
                    data-name="<?php echo e(strtolower($user->name)); ?>"
                    data-email="<?php echo e(strtolower($user->email)); ?>"
                    data-phone="<?php echo e(strtolower($user->phone ?? '')); ?>">
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->phone ?? '-'); ?></td>
                    <td><?php echo e($user->created_at->format('Y-m-d')); ?></td>
                    <td>
                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->deleted_at): ?>
                            <!-- Restore user if blocked -->
                            <form action="<?php echo e(route('admin.users.restore', $user->id)); ?>" method="POST" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <button type="submit" class="btn btn-sm btn-success" 
                                        onclick="return confirm('Are you sure you want to restore this user?')">
                                    <i class="fas fa-undo"></i>
                                </button>
                            </form>
                        <?php else: ?>
                            <!-- Delete/Block user if active -->
                            <button type="button" 
                                    class="btn btn-sm btn-danger block-user-btn" 
                                    data-user-id="<?php echo e($user->id); ?>"
                                    data-delete-url="<?php echo e(route('admin.users.destroy', $user->id)); ?>">
                                <i class="fas fa-trash"></i>
                            </button>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </td>
                </tr>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </tbody>
        </table>
    </div>

<div class="d-flex justify-content-center mt-4">
    <nav aria-label="User pagination">
        <ul class="pagination pagination-sm">
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($users->onFirstPage()): ?>
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">« Previous</span>
                </li>
            <?php else: ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo e($users->previousPageUrl()); ?>" rel="prev">« Previous</a>
                </li>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($users->hasMorePages()): ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo e($users->nextPageUrl()); ?>" rel="next">Next »</a>
                </li>
            <?php else: ?>
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">Next »</span>
                </li>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </ul>
    </nav>
</div>
</div>

<!-- Hidden Form Outside Modal -->
<form id="addUserForm" action="<?php echo e(route('admin.users.store')); ?>" method="POST" style="display: none;">
    <?php echo csrf_field(); ?>
    <input type="text" name="name" id="modal-name" required>
    <input type="email" name="email" id="modal-email" required>
    <input type="text" name="phone" id="modal-phone">
    <input type="password" name="password" id="modal-password" required>
</form>

<!-- Add User Modal (Display Only) -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="display-name" class="form-control mb-2" placeholder="Name" required>
                <input type="email" id="display-email" class="form-control mb-2" placeholder="Email" required>
                <input type="text" id="display-phone" class="form-control mb-2" placeholder="Phone">
                <input type="password" id="display-password" class="form-control mb-2" placeholder="Password" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitUserForm()">Save User</button>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function submitUserForm() {
    // Copy values from display fields to hidden form
    document.getElementById('modal-name').value = document.getElementById('display-name').value;
    document.getElementById('modal-email').value = document.getElementById('display-email').value;
    document.getElementById('modal-phone').value = document.getElementById('display-phone').value;
    document.getElementById('modal-password').value = document.getElementById('display-password').value;
    
    // Submit the hidden form
    document.getElementById('addUserForm').submit();
}

// Auto-close modal on success
<?php if(session('success')): ?>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = bootstrap.Modal.getInstance(document.getElementById('addUserModal'));
        if (modal) modal.hide();
    });
<?php endif; ?>

document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('searchUsers');
    const rows = document.querySelectorAll('#usersTableBody tr');

    function filterUsers() {
        const search = searchInput.value.toLowerCase();

        rows.forEach(row => {
            const name = row.dataset.name;
            const email = row.dataset.email;
            const phone = row.dataset.phone;

            const matchSearch =
                name.includes(search) ||
                email.includes(search) ||
                phone.includes(search);

            row.style.display = matchSearch ? '' : 'none';
        });
    }

    searchInput.addEventListener('input', filterUsers);

    // Handle SweetAlert for blocking users
    document.querySelectorAll('.block-user-btn').forEach(button => {
        button.addEventListener('click', function() {
            const deleteUrl = this.getAttribute('data-delete-url');

            Swal.fire({
                title: 'Are you sure?',
                text: "This user will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, Delete user!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = deleteUrl;

                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    const csrfInput = document.createElement('input');
                    csrfInput.type = 'hidden';
                    csrfInput.name = '_token';
                    csrfInput.value = csrfToken;

                    const methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'DELETE';

                    form.appendChild(csrfInput);
                    form.appendChild(methodInput);
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Last Backup Edited Final Project 30-1-2026\Edited-FinalProject\resources\views/admin/users.blade.php ENDPATH**/ ?>