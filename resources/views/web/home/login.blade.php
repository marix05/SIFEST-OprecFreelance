@extends('layouts/web.main')

@section('index')

<section class="login" id="login">
    <div class="wrapper">
        @if(session()->has("success"))
            <div class="alert success">
                <p class="alert_msg">{{ session("success") }}</p>
                <i class="fa-solid fa-xmark alert_toggle"></i>
            </div>
        @endif
        @if(session()->has("error"))
            <div class="alert error">
                <p class="alert_msg">{{ session("error") }}</p>
                <i class="fa-solid fa-xmark alert_toggle"></i>
            </div>
        @endif
        {{-- <img src="{{ asset("img/asset_web/section_frames.png") }}" alt="" style="position: absolute; top:0; left:0;">
        <img src="{{ asset("img/asset_web/section_frames.png") }}" alt="" style="position: absolute; bottom:0; transform:rotate(-180deg); right:0;"> --}}
        <div class="container p_relative py20">
            <div class="title_font text_center mb12">
                <p class="text_big">Login</p>
                <p><span class="fc_red">Freelance SI Fest 2022</span></p>
            </div>
            <div class="form_wrapper box_lt_rb_side p6">
                <i class="box_lt_rb_side_design"></i>
                <form action="{{ route("login") }}" method="post" autocomplete="off">
                    @csrf
                    <div class="form_container pb2">
                        <div class="form_group">
                            <div class="input_wrapper">
                                <div class="input_container">
                                    <div class="icon">
                                        <i class="fa-solid fa-id-card"></i>
                                    </div> 
                                    <div class="input_div">
                                        <p class="input_title title_font">Student ID (NIM)</p>
                                        <input type="text" name="NIM" id="NIM" minlength="14" maxlength="14" class="input" required>
                                    </div>
                                </div>
                                @error('NIM')
                                    <div class="error_msg">
                                        <p class="text_xsm fc_red">
                                            {{ $message }}
                                        </p>
                                    </div>
                                @enderror
                            </div>
                            <div class="input_wrapper">
                                <div class="input_container">
                                    <div class="icon">
                                        <i class="fa-solid fa-lock"></i>
                                    </div> 
                                    <div class="input_div">
                                        <p class="input_title title_font">Password</p>
                                        <input type="password" name="password" id="password" class="input" required maxlength="20">
                                        <i class="password_visibility fa-solid fa-eye"></i>
                                    </div>
                                </div>
                                @error('password')
                                    <div class="error_msg">
                                        <p class="text_xsm fc_red">
                                            {{ $message }}
                                        </p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="btn_container pb4">
                        <button type="submit" class="btn_right form_btn" name="submit">
                            <i class="btn_right_design"></i>
                            Login
                        </button>
                    </div>
                    {{-- <p class="text_sm text_center">
                        Haven't registered yet? 
                        <a href="{{ route("home") }}" class="fw_bold fc_red">
                            Register
                        </a>
                    </p> --}}
                </form>
            </div>
        </div>
    </div>
</section>


@endsection

