    <!-- User Card Column -->
    <div class="col-md-4 col-lg-3">
        <div class="card" style="height: fit-content;">
            <img class="card-img-top" src="{{ asset('admin/assets/img/waad.png') }}" alt="user image">
            <div class="card-body">
                <h5>
                    Example
                </h5>
                <h6>Email:
                    example@gmail.com
                </h6>
                <h6>Role:
                    example
                </h6>
                <h6>Registered at:
                    8th Oct 2025
                </h6>
                <button type="button" class="btn btn-outline-danger mb-2" onclick='disableUser("example")'>Disable

                </button>
                <button type="button" class="btn btn-outline-primary mb-2" onclick='updateUserRole("example")'>Set
                    Admin
                </button>
            </div>
        </div>
    </div>


    <script>
        function disableUser( /*id,*/ userName) {
            Swal.fire({
                title: 'Disable ' + userName + '\'s account?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Unenroll',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // window.location.href = '#';
                }
            });
        }

        // if (urlParams.get('deleted') === '1') {
        //     let name = urlParams.get('name');
        //     Swal.fire({
        //         icon: 'success',
        //         title: 'Updated',
        //         text: name + 'deleted successfully',
        //         confirmButtonColor: '#28a745',
        //         timer: 3000
        //     }).then(() => {
        //         window.history.replaceState({}, document.title, window.location.pathname);
        //     });
        // }

        window.updateUserRole = function( /*id, newRole, */ name) {
            // let actionText = name + ' will lose admin privileges';
            if ( /*newRole == 'admin'*/ 1) {
                actionText = "set " + name + " as an admin";
            }
            Swal.fire({
                title: 'Are you sure?',
                text: actionText,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes',
                cancelButtonText: 'Close'
            }).then((result) => {
                if (result.isConfirmed) {
                    // window.location.href =
                    //     'update-user.php?id=' + id +
                    //     '&role=' + newRole;
                }
            });
        };
    </script>
