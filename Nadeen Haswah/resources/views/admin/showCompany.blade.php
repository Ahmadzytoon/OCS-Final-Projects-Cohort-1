@extends('admin.layout.master')

@section('title', 'company')

@section('content')
    <div class="page-inner">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Nav Pills With Icon (Horizontal Tabs)</h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills nav-secondary  nav-pills-no-bd nav-pills-icons justify-content-center"
                        id="pills-tab-with-icon" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab-icon" data-bs-toggle="pill"
                                href="#pills-home-icon" role="tab" aria-controls="pills-home-icon" aria-selected="true">
                                <i class="icon-home"></i>
                                Company Information
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab-icon" data-bs-toggle="pill" href="#pills-profile-icon"
                                role="tab" aria-controls="pills-profile-icon" aria-selected="false">
                                <i class="fas fa-user-tie"></i>
                                Manager
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab-icon" data-bs-toggle="pill" href="#pills-contact-icon"
                                role="tab" aria-controls="pills-contact-icon" aria-selected="false">
                                <i class="fas fa-users"></i>
                                Employees
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab-icon" data-bs-toggle="pill"
                                href="#pills-Knowledge-icon" role="tab" aria-controls="pills-contact-icon"
                                aria-selected="false">
                                <i class="far fa-envelope"></i>
                                Knowledge items
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab-icon" data-bs-toggle="pill" href="#pills-News-icon"
                                role="tab" aria-controls="pills-contact-icon" aria-selected="false">
                                <i class="fas fa-globe"></i>
                                News
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content mt-2 mb-3" id="pills-with-icon-tabContent">
                        <div class="tab-pane fade show active" id="pills-home-icon" role="tabpanel"
                            aria-labelledby="pills-home-tab-icon">
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the
                                Semantics, a large language ocean.</p>

                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                                It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                        </div>
                        <div class="tab-pane fade" id="pills-profile-icon" role="tabpanel"
                            aria-labelledby="pills-profile-tab-icon">
                            <div class="col-md-12">
                                <div class="card card-profile">
                                    <div class="card-header" style="background-image: url('assets/img/blogpost.jpg')">
                                        <div class="profile-picture">
                                            <div class="avatar avatar-xl">
                                                <img src="{{ asset('admin/assets/img/profile.jpg') }}" alt="..."
                                                    class="avatar-img rounded-circle" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="user-profile text-center">
                                            <div class="name">Hizrian, 19</div>
                                            <div class="job">Frontend Developer</div>
                                            <div class="desc">A man who hates loneliness</div>
                                            <div class="social-media">
                                                <a class="btn btn-info btn-twitter btn-sm btn-link" href="#">
                                                    <span class="btn-label just-icon"><i class="icon-social-twitter"></i>
                                                    </span>
                                                </a>
                                                <a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#">
                                                    <span class="btn-label just-icon"><i class="icon-social-facebook"></i>
                                                    </span>
                                                </a>
                                                <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#">
                                                    <span class="btn-label just-icon"><i class="icon-social-instagram"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="view-profile">
                                                <a href="#" class="btn btn-secondary w-100">View Full Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row user-stats text-center">
                                            <div class="col">
                                                <div class="number">125</div>
                                                <div class="title">Post</div>
                                            </div>
                                            <div class="col">
                                                <div class="number">25K</div>
                                                <div class="title">Followers</div>
                                            </div>
                                            <div class="col">
                                                <div class="number">134</div>
                                                <div class="title">Following</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact-icon" role="tabpanel"
                            aria-labelledby="pills-contact-tab-icon">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>profile pic</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Email</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="avatar">
                                                    <img src="{{ asset('admin/assets/img/jm_denis.jpg') }}" alt="..."
                                                        class="avatar-img rounded-circle" />
                                                </div>
                                            </td>
                                            <td>Ahmad Nixon</td>
                                            <td>Admin</td>
                                            <td>ahamd@gmail.com</td>
                                            <td>
                                                <div class="form-button-action ">
                                                    <button type="button" data-bs-toggle="tooltip" title=""
                                                        class="btn  btn-success btn-round  btn-sm"
                                                        data-original-title="Edit Task">View</button>
                                                    <button type="button" data-bs-toggle="tooltip" title=""
                                                        class="btn  btn-danger btn-round  btn-sm"
                                                        data-original-title="Edit Task">Delete</button>
                                                </div>
                                            </td>
                                        </tr>






                                    </tbody>
                                </table>
                            </div>


                        </div>
                        <div class="tab-pane fade" id="pills-Knowledge-icon" role="tabpanel"
                            aria-labelledby="pills-contact-tab-icon">
                            <p>Pityful a rethoric question ran over her cheek, then she continued her way. On her way she
                                met a copy. The copy warned the Little Blind Text, that where it came from it would have
                                been rewritten a thousand times and everything that was left from its origin would be the
                                word "and" and the Little Blind Text should turn around and return to its own, safe country.
                            </p>

                            <p> But nothing the copy said could convince her and so it didn’t take long until a few
                                insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her
                                into their agency, where they abused her for their</p>
                        </div>
                        <div class="tab-pane fade" id="pills-News-icon" role="tabpanel"
                            aria-labelledby="pills-contact-tab-icon">
                            <p>Pityful a rethoric question ran over her cheek, then she continued her way. On her way she
                                met a copy. The copy warned the Little Blind Text, that where it came from it would have
                                been rewritten a thousand times and everything that was left from its origin would be the
                                word "and" and the Little Blind Text should turn around and return to its own, safe country.
                            </p>

                            <p> But nothing the copy said could convince her and so it didn’t take long until a few
                                insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her
                                into their agency, where they abused her for their</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('js')
    <!-- Datatables -->
    <script src="{{ asset('admin/assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <!-- Kaiadmin JS -->
    <script src="{{ asset('admin/assets/js/kaiadmin.min.js') }}"></script>
    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{ asset('admin/assets/js/setting-demo2.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#basic-datatables").DataTable({});

            $("#multi-filter-select").DataTable({
                pageLength: 5,
                initComplete: function() {
                    this.api()
                        .columns()
                        .every(function() {
                            var column = this;
                            var select = $(
                                    '<select class="form-select"><option value=""></option></select>'
                                )
                                .appendTo($(column.footer()).empty())
                                .on("change", function() {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                    column
                                        .search(val ? "^" + val + "$" : "", true, false)
                                        .draw();
                                });

                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function(d, j) {
                                    select.append(
                                        '<option value="' + d + '">' + d + "</option>"
                                    );
                                });
                        });
                },
            });

            // Add Row
            $("#add-row").DataTable({
                pageLength: 5,
            });

            var action =
                '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            $("#addRowButton").click(function() {
                $("#add-row")
                    .dataTable()
                    .fnAddData([
                        $("#addName").val(),
                        $("#addPosition").val(),
                        $("#addOffice").val(),
                        action,
                    ]);
                $("#addRowModal").modal("hide");
            });
        });
    </script>

@endsection
