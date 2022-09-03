@extends('layouts/admin.main')

@section('index')

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

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
                                    Saat ini sudah ada <span class="fw-bold">50</span> akun yang terdaftar di website ini
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
                                    <th class="text-center">Domicile</th>
                                    <th class="text-center">KPM/KRS</th>
                                    <th class="text-center">First Choice</th>
                                    <th class="text-center">Second Choice</th>
                                    <th class="text-center">Wawancara</th>
                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <!-- Name  -->
                                    <td>
                                        <i class="fab fa-angular fa-lg me-3"></i>
                                        <strong>Albert Cook</strong>
                                    </td>
                                    <!-- NIM -->
                                    <td>Aaaa@gmail.com</td>
                                    <!-- Domicilie -->
                                    <td>
                                        <a href="https://wa.me/0812312321" target="_blank">628321312</a>
                                    </td>
                                    <!-- KPM/KRS -->
                                    <td class="text-center">
                                        <img src="{{ asset("img/assets/qr_oprec_line.png") }}" alt="" class="table_img img_modal_toggle">
                                    </td>
                                    <!-- First Choice -->
                                    <td>Universitas Sriwijaya Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, culpa?</td>
                                    <!-- Second Choice -->
                                    <td>2020-05-12</td>
                                    <!-- Wawancar -->
                                    <td>Palembang</td>
                                    <!-- Action -->
                                    <td>
                                        <div class="d-flex flex-column gap-2">

                                            <button
                                                type="button"
                                                class="btn btn-warning d-flex align-items-center"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editModal"
                                            >
                                                <i class='bx bx-edit-alt me-1'></i> Edit
                                            </button>

                                            
                                        </div>
                                    </td>
                                </tr>
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

<div class="modal fade" id="evidenceImgModal" tabindex="-1" aria-hidden="true">
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
                        <img id="evidenceImg" src="" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
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
                <form action="" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Message</label>
                        <div class="col-sm-10">
                            <textarea
                            id="basic-default-message"
                            class="form-control"
                            placeholder="Hi, Do you have a moment to talk Joe?"
                            aria-label="Hi, Do you have a moment to talk Joe?"
                            aria-describedby="basic-icon-default-message2"
                            ></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button
                            type="submit"
                            class="btn btn-warning d-flex align-items-center"
                        >
                            <i class='bx bx-edit-alt me-1'></i> edit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
