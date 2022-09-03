@extends('layouts/web.main')

@section('index')

<section class="register" id="register">
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
                <p class="text_big">Open Recruitment</p>
                <p><span class="fc_red">Freelance SI Fest 2022</span>, Join Now !</p>
            </div>
            <div class="form_wrapper box_lt_rb_side p6">
                <i class="box_lt_rb_side_design"></i>
                <form action="{{ route("home") }}" method="post" autocomplete="off">
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
                        </div>
                    </div>
                    <div class="btn_container pb4">
                        <button type="submit" class="btn_right form_btn" name="submit">
                            <i class="btn_right_design"></i>
                            Register
                        </button>
                    </div>
                </form>
                <p class="text_sm">
                    Bingung mau daftar ke divisi apa?
                    <a href="https://bit.ly/DIVISISIFEST2022" class="fw_bold fc_red" target="_blank">
                        Cari info terkait divisi-divisi yang ada yuk!
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="timeline" id="timeline">
    <div class="wrapper">
        <div class="container p_relative py20">
            <div class="title_feature text_center mb20">Timeline</div>
            <div class="timeline_container">
                <div class="timeline_item">
                    <div class="timeline_dot"></div>
                    <div class="timeline_date fc_red">03 Sep 2022 - 12 Sep 2022</div>
                    <div class="timeline_content box_lt_rb_side">
                        <i class="box_lt_rb_side_design"></i>
                        <span class="title_font">Pendaftaran</span>
                        <p class="text_sm">Pendaftaran dibuka untuk mahasiswa sistem informasi 2022 Fasilkom UNSRI</p>
                    </div>
                </div>
                <div class="timeline_item">
                    <div class="timeline_dot"></div>
                    <div class="timeline_date fc_red">23 Sep 2022 - 24 Sep 2022</div>
                    <div class="timeline_content box_lt_rb_side">
                        <i class="box_lt_rb_side_design"></i>
                        <span class="title_font">Wawancara</span>
                        <p class="text_sm">Wawancara dilakukan pada dua tempat yaitu, fasilkom Indralaya dan fasilkom unsri</p>
                    </div>
                </div>
                <div class="timeline_item">
                    <div class="timeline_dot"></div>
                    <div class="timeline_date fc_red">28 September</div>
                    <div class="timeline_content box_lt_rb_side">
                        <i class="box_lt_rb_side_design"></i>
                        <span class="title_font">Pengumuman Frelance 2022</span>
                        <p class="text_sm">Pengumuman hasil berdasarkan data, hasil wawancara, dan syarat tugas apabila mendaftar di divisi tertentu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="faq" id="faq">
    <div class="wrapper">
        <div class="container p_relative pt12 pb20">
            <div class="title_feature text_center mb20">
                FAQ
                <p class="text_nm fc_red">Frequently Asked Question</p>
            </div>
            <div class="grid_container_space_between">
                <div class="grid_box question_box">
                    <div class="card box_lt_rb_side text_right p4">
                        <i class="box_lt_rb_side_design"></i>
                        <div class="card_header d_flex flex_row_reverse fw_bold">
                            <i class="fa-solid fa-plus ml2 mt1"></i>
                            <span>Apakah sesi wawancara wajib diikuti oleh para calon freelancer SI FEST yang mendaftar?</span>
                        </div>
                        <div class="card_body text_sm pt2 pr5">
                            Wajib yaa, karena pihak dari divisi pilihan kamu ingin mengenal kamu lebih baik 'u'
                        </div>
                    </div>
                    <div class="card box_lt_rb_side text_right p4">
                        <i class="box_lt_rb_side_design"></i>
                        <div class="card_header d_flex flex_row_reverse fw_bold">
                            <i class="fa-solid fa-plus ml2 mt1"></i>
                            <span>Bolehkah saya memilih satu divisi yang saya inginkan saja saat melakukan proses pendaftaran?</span>
                        </div>
                        <div class="card_body text_sm pt2 pr5">
                            Diwajibkan memilih dua yaa, jangan lupa pastiin kalau pilihan kalian itu yang terbaik buat diri kalian 'w'
                        </div>
                    </div>
                    <div class="card box_lt_rb_side text_right p4">
                        <i class="box_lt_rb_side_design"></i>
                        <div class="card_header d_flex flex_row_reverse fw_bold">
                            <i class="fa-solid fa-plus ml2 mt1"></i>
                            <span>Apabila saya hanya mempunyai KRS, apakah KRS harus sudah ditanda tangani oleh dosen pendamping?</span>
                        </div>
                        <div class="card_body text_sm pt2 pr5">
                            Tidak apa-apa selagi KRS yang kamu kirimkan itu benar, tanpa ada pemalsuan dokumen >_<
                        </div>
                    </div>
                </div>
                <div class="grid_box question_box">
                    <div class="card box_rt_lb_side p4">
                        <i class="box_rt_lb_side_design"></i>
                        <div class="card_header d_flex fw_bold">
                            <i class="fa-solid fa-plus mr2 mt1"></i>
                            <span>Apakah perekrutan freelancer ini hanya dibuka untuk para mahasiswa baru sistem informasi angkatan 2022?</span>
                        </div>
                        <div class="card_body text_sm pt2 pl5">
                            Benar banget, tujuanya agar para mahasiswa baru bisa merasakan aktivitas organisasi di kampus lebih dahulu. sekaligus mengembangkan minat dan bakatnya 'u'
                        </div>
                    </div>
                    <div class="card box_rt_lb_side p4">
                        <i class="box_rt_lb_side_design"></i>
                        <div class="card_header d_flex fw_bold">
                            <i class="fa-solid fa-plus mr2 mt1"></i>
                            <span>Apakah pendaftar wajib memiliki pengalaman mengikuti organisasi dalam bidang apapun sebelumnya?</span>
                        </div>
                        <div class="card_body text_sm pt2 pl5">
                            Tetot.. sama sekali nggak yaa, yang terpenting kamu mau belajar dan mau mengembangkan potensi didalam diri kamu
                        </div>
                    </div>
                    <div class="card box_rt_lb_side p4">
                        <i class="box_rt_lb_side_design"></i>
                        <div class="card_header d_flex fw_bold">
                            <i class="fa-solid fa-plus mr2 mt1"></i>
                            <span>Saya melakukan kesalahan dalam mengisi data saya, bagaimana cara agar saya dapat memperbaiki data yang saya kirimkan</span>
                        </div>
                        <div class="card_body text_sm pt2 pl5">
                            Sayangnya kamu tidak bisa mengubah data kamu sendiri ya, tapi ada admin yang siap membantu kamu. Silahkan hubungi admin melalui <a href="" class="fc_red">link berikut</a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

