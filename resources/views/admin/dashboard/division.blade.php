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
                                    Semangat Admin Divisi {{ $nav["active"] }} 🎉
                                </h5>
                                <p class="mb-4">
                                    <span class="fw-bold text-primary fs-2">{{ $users->count() }}</span> orang telah terdaftar menjadi calon freelancer {{ $nav["active"] }}
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
                                    <th class="text-center">First Choice</th>
                                    <th class="text-center">Second Choice</th>
                                    <th class="text-center">KPM/KRS</th>
                                    <th class="text-center">Result</th>
                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($users as $user)
                                    <tr>
                                        <td><div>{{ $user['name'] }}</div></td>
                                        <td><div>{{ $user['NIM'] }}</div></td>
                                        <td><div>{{ $user['domicile'] }}</div></td>
                                        <td><div>{{ $user['first_choice'] }}</div></td>
                                        <td><div>{{ $user['second_choice'] }}</div></td>
                                        <td><div class="text-center"><img src="/KRS_KPM/{{ $user['identifier'] }}" class="table_img img_modal_toggle"></div></td>
                                        <td><div>{{ $user['result'] === Null ? "Not yet recruited" : $user['result'] }}</div></td>
                                        <td>
                                            <div class="d-flex flex-column gap-2">
                                                @if ($user['result'] === Null)
                                                    <button value={{ $user['id'] }} class="btn btn-warning recruit_btn_modal d-flex align-items-center">
                                                        <i class='bx bx-select-multiple me-1'></i>Recruit
                                                    </button>
                                                @elseif ($user["result"] === $division)
                                                    <button value={{ $user['id'] }} class="btn btn-danger cancel_recruitment_btn_modal d-flex align-items-center">
                                                        <i class='bx bx-select-multiple me-1'></i>Cancel Recruitment
                                                    </button>
                                                @endif

                                                <button value={{ $user['id'] }} class="btn btn-primary detail_btn_modal d-flex align-items-center">
                                                    <i class='bx bx-info-circle me-1'></i> Detail
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

<div class="modal fade" id="recruit_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Recruit User</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <form action="{{ route("update_result", $division) }}" method="post" autocomplete="off">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="recruit_name">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="recruit_name" readonly required/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="recruit_NIM">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" name="NIM" class="form-control" id="recruit_NIM" readonly required/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="recruit_result">Division</label>
                        <div class="col-sm-10">
                            <select name="result" class="form-select" aria-label="Default select example" id="recruit_result" required>
                                <option value="" id="recruit_first_choice"></option>
                                <option value="" id="recruit_second_choice"></option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-warning d-flex align-items-center">
                            <i class='bx bx-select-multiple me-1'></i>Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cancel_recruitment_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cancel Recruit</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <form action="{{ route("update_result", $division) }}" method="post" autocomplete="off">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="cancel_name">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="cancel_name" readonly required/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="cancel_NIM">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" name="NIM" class="form-control" id="cancel_NIM" readonly required/>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-danger d-flex align-items-center">
                            <i class='bx bx-select-multiple me-1'></i> Cancel Recruitment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detail_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1200px; width:100%; margin:auto; padding:5%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Data User</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-xl-4 d-flex align-items-center justify-content-center">
                        <img src="" id="detail_identifier" style="width: 100%; max-width:300px;">
                    </div>
                    <div class="col-12 col-md-6 col-xl-8">
                        <ul class="nav nav-pills mb-3" id="choice_tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills_biodata-tab" data-bs-toggle="pill" data-bs-target="#pills_biodata" type="button" role="tab" aria-controls="pills_biodata" aria-selected="true">Biodata</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills_choices-tab" data-bs-toggle="pill" data-bs-target="#pills_choices" type="button" role="tab" aria-controls="pills_choices" aria-selected="false">Choices</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="choices_tab_ontent">
                            <div class="tab-pane fade show active" id="pills_biodata" role="tabpanel" aria-labelledby="pills_biodata-tab" tabindex="0">
                                <div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="detail_name">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" class="form-control" id="detail_name" readonly required/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="detail_NIM">NIM</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="NIM" class="form-control" id="detail_NIM" readonly required/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="detail_email">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="email" class="form-control" id="detail_email" readonly required/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="detail_class">Class</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="class" class="form-control" id="detail_class" readonly required/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="detail_domicile">Domicile</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="domicile" class="form-control" id="detail_domicile" readonly required/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="detail_interview">Interview</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="interview" class="form-control" id="detail_interview" readonly required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills_choices" role="tabpanel" aria-labelledby="pills_choices-tab" tabindex="0">
                                <div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="detail_first_choice">First choice</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="first_choice" class="form-control" id="detail_first_choice" readonly required/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div>
                                            <p id="detail_first_reason" style="overflow-wrap: break-word"></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="detail_second_choice">Second choice</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="second_choice" class="form-control" id="detail_second_choice" readonly required/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div>
                                            <p id="detail_second_reason" style="overflow-wrap: break-word"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
