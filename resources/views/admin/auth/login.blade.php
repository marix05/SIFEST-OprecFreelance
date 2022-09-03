@extends('layouts/admin.main')

@section('login')

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-2">Welcome Admin SI FEST</h4>
                    <p class="mb-4">
                        Please sign-in to our account !!!!
                    </p>

                    <form
                        id="formAuthentication"
                        class="mb-3"
                        action="{{ route("admin") }}"
                        method="POST"
                        autocomplete="off"
                    >
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label"
                                >Username</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="username"
                                name="username"
                                placeholder="Enter your username"
                                autofocus
                            />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password"
                                    >Password</label
                                >
                            </div>
                            <div class="input-group input-group-merge">
                                <input
                                    type="password"
                                    id="password"
                                    class="form-control"
                                    name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password"
                                />
                                <span class="input-group-text cursor-pointer"
                                    ><i class="bx bx-hide"></i
                                ></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input
                                class="btn btn-primary d-grid w-100"
                                type="submit"
                                value="Login"
                            >
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>

@endsection