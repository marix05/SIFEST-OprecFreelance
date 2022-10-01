@extends('layouts/admin.main')

@section('index')

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        @if(session()->has("success"))
            <div class="bs-toast toast toast-placement-ex m-2 bg-primary top-0 start-50 translate-middle-x show" id="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="bx bx-bell me-2"></i>
                    <div class="me-auto fw-semibold">Success</div>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session("success") }}
                </div>
            </div>
        @endif
        @if(session()->has("error"))
            <div class="bs-toast toast toast-placement-ex m-2 bg-danger top-0 start-50 translate-middle-x show" id="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="bx bx-bell me-2"></i>
                    <div class="me-auto fw-semibold">Error</div>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session("error") }}
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">
                                    Semangat Admin Open Recruitment Freelance SI FEST 2022! 🎉
                                </h5>
                                <p class="mb-4">
                                    <span class="fw-bold text-primary fs-2">{{ $users->count() }}</span> orang telah terdaftar menjadi calon freelancer
                                </p>

                                <a
                                    href="#user_table;"
                                    class="btn btn-sm btn-outline-primary"
                                    >Lihat Data User</a
                                >
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img
                                    src="{{ url("admin_assets/img/illustrations/man-with-laptop-light.png") }}"
                                    height="140"
                                    alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <!-- Hoverable Table rows -->
                <div class="card" style="overflow-x: hidden">
                    <h5 class="card-header">Participant List</h5>
                    <div class="text-nowrap">
                        <table id="datatable" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">NIM</th>
                                    <th class="text-center">Line</th>
                                    <th class="text-center">First Choice</th>
                                    <th class="text-center">Second Choice</th>
                                    <th class="text-center">KPM/KRS</th>
                                    <th class="text-center">Interview</th>
                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($users as $user)
                                    <tr>
                                        <td><div>{{ $user['name'] }}</div></td>
                                        <td><div>{{ $user['NIM'] }}</div></td>
                                        <td><div><a href="https://line.me/R/ti/p/{{ $user['line'] }}" target="_blank">{{ $user['line'] }}</a></div></td>
                                        <td><div>{{ $user['first_choice'] }}</div></td>
                                        <td><div>{{ $user['second_choice'] }}</div></td>
                                        <td><div class="text-center"><img src="/KRS_KPM/{{ $user['identifier'] }}" class="table_img img_modal_toggle"></div></td>
                                        <td><div>{{ $user['interview'] }}</div></td>
                                        <td>
                                            <div class="d-flex flex-column gap-2">
                                                <button value={{ $user['id'] }} class="btn btn-warning edit_btn_modal d-flex align-items-center">
                                                    <i class='bx bx-edit-alt me-1'></i> Edit
                                                </button>
                                                <button value={{ $user['id'] }} class="btn btn-danger delete_btn_modal d-flex align-items-center">
                                                    <i class='bx bx-trash-alt me-1'></i> Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/ Hoverable Table rows -->
            </div>
        </div>

    </div>
    <!-- / Content -->
</div>


<div class="modal fade" id="identifier_img_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <img id="identifier_img" src="" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete User Data (Khusus Admin Inti dan Utama)</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('delete_data') }}" method="post" autocomplete="off">
                    @csrf
                    @method('delete')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="delete_name">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="delete_name" readonly required/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="delete_NIM">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" name="NIM" class="form-control" id="delete_NIM" readonly required/>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-danger d-flex align-items-center">
                            <i class='bx bx-trash-alt me-1'></i> Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User Data (Khusus Admin Inti dan Utama)</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <form action="{{ route("edit_data") }}" method="post" autocomplete="off">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="edit_name">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="edit_name" readonly required/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="edit_NIM">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" name="NIM" class="form-control" id="edit_NIM" readonly required/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="edit_interview">Interview</label>
                        <div class="col-sm-10">
                            <select name="interview" class="form-select" aria-label="Default select example" id="edit_interview" readonly required>
                                <option value="Indralaya">Indralaya</option>
                                <option value="Palembang">Palembang</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="edit_password">New Password</label>
                        <div class="col-sm-10">
                            <input type="text" name="password" class="form-control" id="edit_password"/>
                            <div class="error_msg">
                                <p class="ms-2 text-danger fs-6"></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-warning d-flex align-items-center">
                            <i class='bx bx-edit-alt me-1'></i> Save Change
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection