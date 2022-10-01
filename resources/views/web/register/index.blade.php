@extends('layouts/web.main')

@section('index')

<section>
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

        <div class="container p_relative py20">
            <div class="title_font text_center mb16">
                <p class="text_big">Open Recruitment</p>
                <p><span class="fc_red">Complete your data</span>, before registration closes!</p>
            </div>
            <div class="form_wrapper box_lt_rb_side p6">
                <i class="box_lt_rb_side_design"></i>
                <form action="{{ route('store_register') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="form_container pb2">
                        <div class="form_group">
                            <!-- Data Diri -->

                            <p class="title_font text_h3 mt4 mb2">
                                Personal Data
                            </p>

                            <div class="input_wrapper">
                                <div class="input_container">
                                    <div class="icon">
                                        <i class="fa-solid fa-user"></i>
                                    </div> 
                                    <div class="input_div">
                                        <p class="input_title title_font">Full Name</p>
                                        <input type="text" name="name" id="name" value="{{ $mahasiswa['name'] }}" class="input" required maxlength="60" readonly>
                                    </div>
                                </div>
                                @error('name')
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
                                        <i class="fa-solid fa-id-card"></i>
                                    </div> 
                                    <div class="input_div">
                                        <p class="input_title title_font">Student ID (NIM)</p>
                                        <input type="text" name="NIM" id="NIM" value="{{ $mahasiswa['NIM'] }}" class="input" required maxlength="14" minlength="14" readonly>
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
                                        <i class="fa-solid fa-envelope"></i>
                                    </div> 
                                    <div class="input_div">
                                        <p class="input_title title_font">Email</p>
                                        <input type="email" name="email" id="email" value="{{ old("email") }}" class="input" required maxlength="60">
                                    </div>
                                </div>
                                @error('email')
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
                                        <i class="fa-brands fa-line"></i>
                                    </div> 
                                    <div class="input_div">
                                        <p class="input_title title_font">Id Line</p>
                                        <input type="text" name="line" id="line" value="{{ old("line") }}" class="input" required maxlength="30">
                                    </div>
                                </div>
                                @error('line')
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
                                        <i class="fa-solid fa-graduation-cap"></i>
                                    </div> 
                                    <div class="input_div">
                                        <p class="input_title title_font">Class</p>
                                        <select name="class" id="class" class="input" required>
                                            <option selected value="" disabled hidden></option>
                                            <option {{ old("class") === "SI Reg A" ? "selected" : "" }} value="SI Reg A">SI Reg A</option>
                                            <option {{ old("class") === "SI Reg B" ? "selected" : "" }} value="SI Reg B">SI Reg B</option>
                                            <option {{ old("class") === "SI Reg C" ? "selected" : "" }} value="SI Reg C">SI Reg C</option>
                                            <option {{ old("class") === "SI Bil A" ? "selected" : "" }} value="SI Bil A">SI Bil A</option>
                                            <option {{ old("class") === "SI Bil B" ? "selected" : "" }} value="SI Bil B">SI Bil B</option>
                                        </select>
                                    </div>
                                </div>
                                @error('class')
                                    <div class="error_msg">
                                        <p class="text_xsm fc_red">
                                            {{ $message }}
                                        </p>
                                    </div>
                                @enderror
                            </div>

                            <!-- Domisili -->

                            <p class="title_font text_h3 mt8 mb2">
                                Domicile
                            </p>

                            <div class="input_wrapper">
                                <div class="input_container">
                                    <div class="icon">
                                        <i class="fa-solid fa-map-location-dot"></i>
                                    </div> 
                                    <div class="input_div">
                                        <p class="input_title title_font">Domicile</p>
                                        <input type="text" name="domicile" id="domicile" value="{{ old("domicile") }}" class="input" required>
                                    </div>
                                </div>
                                @error('domicile')
                                    <div class="error_msg">
                                        <p class="text_xsm fc_red">
                                            {{ $message }}
                                        </p>
                                    </div>
                                @enderror
                            </div>

                            <!-- Divisi Pilihan -->

                            <p class="title_font text_h3 mt8 mb2">
                                Division Data
                            </p>

                            <div class="input_wrapper">
                                <div class="input_container">
                                    <div class="icon">
                                        <i class="fa-solid fa-1"></i>
                                    </div> 
                                    <div class="input_div">
                                        <p class="input_title title_font">First Choice</p>
                                        <select name="first_choice" id="first_choice" class="input division_select">
                                            <option selected value="" hidden disabled></option>
                                            <option {{ old("first_choice") === "Competition" ? "selected" : "" }} value="Competition">Competition</option>
                                            <option {{ old("first_choice") === "Seminar" ? "selected" : "" }} value="Seminar">Seminar</option>
                                            <option {{ old("first_choice") === "Buddies" ? "selected" : "" }} value="Buddies">Buddies</option>
                                            <option {{ old("first_choice") === "Sponsorship" ? "selected" : "" }} value="Sponsorship">Sponsorship</option>
                                            <option {{ old("first_choice") === "Media Partner" ? "selected" : "" }} value="Media Partner">Media Partner</option>
                                            <option {{ old("first_choice") === "Marketing" ? "selected" : "" }} value="Marketing">Marketing</option>
                                            <option {{ old("first_choice") === "Design" ? "selected" : "" }} value="Design">Design</option>
                                            <option {{ old("first_choice") === "Videography Photography" ? "selected" : "" }} value="Videography Photography">Videography & Photography</option>
                                            <option {{ old("first_choice") === "Publication" ? "selected" : "" }} value="Publication">Publication</option>
                                            <option {{ old("first_choice") === "Bazaar" ? "selected" : "" }} value="Bazaar">Bazaar</option>
                                            <option {{ old("first_choice") === "Consumption" ? "selected" : "" }} value="Consumption">Consumption</option>
                                            <option {{ old("first_choice") === "Equipment" ? "selected" : "" }} value="Equipment">Equipment</option>
                                        </select>
                                    </div>
                                    @error('first_choice')
                                        <div class="error_msg">
                                            <p class="text_xsm fc_red">
                                                {{ $message }}
                                            </p>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="input_wrapper">
                                <div class="input_container">
                                    <div class="icon">
                                        <i class="fa-solid fa-file-pen"></i>
                                    </div> 
                                    <div class="input_div" style="height: 90px">
                                        <p class="input_title title_font">Reason</p>
                                        <textarea name="first_reason" id="first_reason" class="input" required>{{ old("first_reason") }}</textarea>
                                    </div>
                                </div>
                                <div class="input_info mb4 text_xsm"></div>
                            </div>

                            <div class="input_wrapper">
                                <div class="input_container">
                                    <div class="icon">
                                        <i class="fa-solid fa-2"></i>
                                    </div> 
                                    <div class="input_div">
                                        <p class="input_title title_font">Second Choice</p>
                                        <select name="second_choice" id="second_choice" class="input division_select">
                                            <option selected value="" hidden disabled></option>
                                            <option {{ old("second_choice") === "Competition" ? "selected" : "" }} value="Competition">Competition</option>
                                            <option {{ old("second_choice") === "Seminar" ? "selected" : "" }} value="Seminar">Seminar</option>
                                            <option {{ old("second_choice") === "Buddies" ? "selected" : "" }} value="Buddies">Buddies</option>
                                            <option {{ old("second_choice") === "Sponsorship" ? "selected" : "" }} value="Sponsorship">Sponsorship</option>
                                            <option {{ old("second_choice") === "Media Partner" ? "selected" : "" }} value="Media Partner">Media Partner</option>
                                            <option {{ old("second_choice") === "Marketing" ? "selected" : "" }} value="Marketing">Marketing</option>
                                            <option {{ old("second_choice") === "Design" ? "selected" : "" }} value="Design">Design</option>
                                            <option {{ old("second_choice") === "Videography Photography" ? "selected" : "" }} value="Videography Photography">Videography & Photography</option>
                                            <option {{ old("second_choice") === "Publication" ? "selected" : "" }} value="Publication">Publication</option>
                                            <option {{ old("second_choice") === "Bazaar" ? "selected" : "" }} value="Bazaar">Bazaar</option>
                                            <option {{ old("second_choice") === "Consumption" ? "selected" : "" }} value="Consumption">Consumption</option>
                                            <option {{ old("second_choice") === "Equipment" ? "selected" : "" }} value="Equipment">Equipment</option>
                                        </select>
                                    </div>
                                    @error('second_choice')
                                        <div class="error_msg">
                                            <p class="text_xsm fc_red">
                                                {{ $message }}
                                            </p>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="input_wrapper">
                                <div class="input_container">
                                    <div class="icon">
                                        <i class="fa-solid fa-file-pen"></i>
                                    </div> 
                                    <div class="input_div" style="height: 90px">
                                        <p class="input_title title_font">Reason</p>
                                        <textarea name="second_reason" id="second_reason" class="input">{{ old("second_reason") }}</textarea>
                                    </div>
                                </div>
                                <div class="input_info mb4 text_xsm"></div>
                            </div>

                            <p class="title_font text_h3 mt8 mb2">
                                Create Password
                            </p>

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
                                <div class="error_msg">
                                    <p class="text_xsm fc_red">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </p>
                                </div>
                            </div>

                            <div class="input_wrapper">
                                <div class="input_container">
                                    <div class="icon">
                                        <i class="fa-solid fa-lock"></i>
                                    </div> 
                                    <div class="input_div">
                                        <p class="input_title title_font">Confirm Pasword</p>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="input" required maxlength="20">
                                        <i class="password_visibility fa-solid fa-eye"></i>
                                    </div>
                                </div>
                                <div class="error_msg">
                                    <p class="text_xsm fc_red">
                                        @error('password_confirmation')
                                            {{ $message }}
                                        @enderror
                                    </p>
                                </div>
                            </div>

                            <p class="title_font text_h3 mt8 mb2">
                                Interview
                            </p>

                            <div class="input_wrapper">
                                <div class="input_radio">
                                    <input id="interview_layo" checked type="radio" class="input_interview" name="interview" value="Indralaya">
                                    <label for="interview_layo" class="radio_btn">Indralaya</label>
                                    <input id="interview_plg" type="radio" class="input_interview" name="interview" value="Palembang">
                                    <label for="interview_plg" class="radio_btn">Palembang</label>
                                </div>
                                <div id="interview_timeline" class="mt2 mb4">
                                    Jumat, <span class="fw_bold fc_red">23 Sepetember 2022</span> Fasilkom Indralaya
                                </div>
                            </div>
                            
                            <p class="title_font text_h3 mt8 mb2">
                                Validation
                            </p>

                            <div class="input_wrapper">
                                <div class="input_container focus">
                                    <div class="icon">
                                        <i class="fa-solid fa-city"></i>
                                    </div> 
                                    <div class="input_div">
                                        <p class="input_title title_font">KPM/KRS</p>
                                        <input type="file" accept="image/*" name="identifier" id="identifier" required>
                                    </div>
                                </div>
                                @error('identifier')
                                    <div class="error_msg">
                                        <p class="text_xsm fc_red">
                                            {{ $message }}
                                        </p>
                                    </div>
                                @enderror
                            </div>

                            <label for="verify_data" class="d_flex mb2">
                                <input id="verify_data" type="checkbox" required>
                                <span class="text_sm ml2">Kesempatan mengisi form ini hanya 1 kali!. Saya menyatakan bahwa data yang saya isi sudah sesuai dan benar</span>
                            </label>

                        </div>
                    </div>
                    <div class="btn_container pb4">
                        <button type="submit" class="btn_right form_btn" name="submit">
                            <i class="btn_right_design"></i>
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

