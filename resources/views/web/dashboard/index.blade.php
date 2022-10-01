@extends('layouts/web.main')

@section('index')

<section class="dashboard" id="dashboard">
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
                <p class="text_big">Congrats</p>
                <p><span class="fc_red">You Are a Candidate</span> for Freelance SI Fest 2022</p>
            </div>

            <div class="box_rt_lb_side ease2 px6 py8">
                <i class="box_rt_lb_side_design"></i>
                <div>
                    <p class="title_font text_h3">Informasi Freelance</p>
                    <p class="text_xsm fc_red">** Screenshot laman bila perlu</p>
                    <ol class="mt4 pl4">
                        <li>
                            Calon Freelancer SI FEST 2022 diwajibkan untuk <span class="fw_bold fc_red">mengumpulkan tugas sesuai divisi pilihannya</span> jika ada.
                        </li>
                        
                        <li>
                            Calon Freelancer SI FEST 2022 diwajibkan <span class="fw_bold fc_red">bergabung kedalam grup LINE</span> yang telah disediakan.
                        </li>

                        <li>
                            Wajib <span class="fw_bold fc_red">mengikuti sesi wawancara</span> sesuai dengan tanggal yang telah ditentukan. Info lebih lengkapnya silahkan bergabung ke grup LINE sesuai poin 2.
                        </li>

                        <li>
                            Jika terjadi kesalahan dalam mengirimkan data harap segera <span class="fw_bold fc_red">menghubungi admin</span>.
                        </li>
                    </ol>
                </div>
                
                <div class="mt4">
                    <div class="info_navs mb4" id="info_navs">
                        <a href="javascript:;" class="info_nav active" data-id="1">Tugas Divisi</a>
                        <a href="javascript:;" class="info_nav" data-id="2">Grup LINE</a>
                        <a href="javascript:;" class="info_nav" data-id="3">Hubungi Admin</a>
                    </div>
                    <div class="info_tabs">
                        <div class="info_tab active" data-content="1">
                            <ul class="mt4">
                                <li>
                                    <p class="fw_bold">
                                        <span class="fc_red">Divisi Videography & Photography</span>
                                        <a href="https://drive.google.com/drive/folders/11-nLxklM6kYPQ0aQcJPG_OMZ9bc8ao4a?usp=sharing" target="_blank" style="text-decoration:underline !important">(Submission Link)</a>
                                    </p>
                                    <ul class="pl10 mb2" style="list-style: disc !important">
                                        <li>Mengirimkan satu video terbaik yang pernah dibuat.</li>
                                        <li>Mengirimkan satu video terbaru 6 bulan terakhir yang terbaik.</li>
                                        <li>Mengirimkan satu atau lebih video animasi (opsional)</li>
                                        <li>Mengirimkan satu atau lebih raw footage terbaik menurutmu (opsional)</li>
                                        <li>Mengirimkan satu atau lebih foto terbaik (opsional)</li>
                                    </ul>
                                </li>      
                                <li>
                                    <p class="fw_bold">
                                        <span class="fw_bold fc_red">Divisi Design</span>
                                        <a href="https://drive.google.com/drive/folders/17nwVUrB-tz1nnWZ5Hsl0BVyw0nkwXEq3" target="_blank" style="text-decoration:underline !important">(Submission Link)</a>
                                    </p>
                                    <ul class="pl10 mb2" style="list-style: disc !important">
                                        <li>Mengrimkan satu design terbaik yang pernah dibuat.</li>
                                        <li>Mengirimkan satu design terbaru dengan tema cyber/cyberpunk (poster A4/ banner 3×2 m/ twibbon feed).</li>
                                    </ul>
                                </li>
                                <li>
                                    <p class="fw_bold">
                                        <span class="fw_bold fc_red">Divisi Bazaar</span>
                                        <a href="https://drive.google.com/drive/folders/1-NjbywH72t9UZdWMIO39p2ndlCy1UDfX" target="_blank" style="text-decoration:underline !important">(Submission Link)</a>
                                    </p>
                                    <ul class="pl10 mb2" style="list-style: disc !important">
                                        <li>Membuat list rekomendasi 3 tempat bazaar di Palembang, beserta alasannya (format PDF/.pdf).</li>
                                    </ul>
                                </li>
                                <li>
                                    <p class="fw_bold">
                                        <span class="fw_bold fc_red">Divisi Consumption</span>
                                        <a href="https://drive.google.com/folderview?id=1MTKC8GLmL6GiK_orkGPPTGPFEaRUUbt4" target="_blank" style="text-decoration:underline !important">(Submission Link)</a>
                                    </p>
                                    <ul class="pl10 mb2" style="list-style: disc !important">
                                        <li>Membuat list rekomendasi makanan dan minuman beserta penjualnya yang menurt kamu "Worth It" dan dapat dijadikan konsumsi selama SI FEST 2022 (format PDF/.pdf).</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <div class="info_tab" data-content="2">
                            <p class="fw_bold">
                                Klik atau scan QR code dibawah untuk bergabung kedalam Grup LINE
                            </p>
                            <p class="text_center">
                                <a href="https://line.me/R/ti/g/pryuaYa20z" target="_blank">
                                    <img src="{{ asset("img/assets/qr_oprec_line.png") }}" alt="" style="max-width:250px">
                                </a>
                            </p>
                        </div>

                        <div class="info_tab" data-content="3">
                            <p class="fw_bold">
                                Klik atau scan QR code dibawah untuk terhubung dengan admin
                            </p>
                            <p class="text_center">
                                <a href="https://line.me/ti/p/hYjbvAmsSd" target="_blank">
                                    <img src="{{ asset("img/assets/qr_admin.png") }}" alt="" style="max-width:250px">
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

{{-- @extends('layouts/web.main')

@section('index')

<section class="dashboard" id="dashboard" style="min-height: 100vh; display:flex; align-items:center">
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
        
        @if (Auth::user()->result)
            <div class="container p_relative py20">
                <div class="title_font text_center mb16">
                    <p class="text_big">Selamat !!!</p>
                    <p class="fc_red">Kamu Dinyatakan Lulus Menjadi Freelance SI FEST 2022</p>
                </div>

                <div class="box_rt_lb_side ease2 px6 py8">
                    <i class="box_rt_lb_side_design"></i>
                    <div>
                        Melalui pesan ini <b class="fc_red">{{ Auth::user()->name }}</b>
                        dinyatakan <b class="fc_red">lulus</b> menjadi Freelance SI FEST 2022 di divisi <b class="fc_red">{{ Auth::user()->result }}</b>.
                        Jangan lupakan komitmen dan tanggung jawab anda. Untuk informasi selanjutnya silahkan bergabung ke grup divisi anda, 

                        @if (Auth::user()->result == "Competition")
                            <a href="https://line.me/R/ti/g/086_xj6sz_" target="_blank" class="fc_red fw_bold" style="text-decoration: underline !important">
                                Grup Competition
                            </a>
                        @elseif (Auth::user()->result == "Seminar")
                            <a href="http://line.me/ti/g/s2ASSnOaWC" target="_blank" class="fc_red fw_bold" style="text-decoration: underline !important">
                                Grup Seminar
                            </a>
                        @elseif (Auth::user()->result == "Buddies")
                            <a href="https://line.me/R/ti/g/G3XBnSfDh-" target="_blank" class="fc_red fw_bold" style="text-decoration: underline !important">
                                Grup Buddies
                            </a>
                        @elseif (Auth::user()->result == "Sponsorship")
                            <a href="https://line.me/R/ti/g/xHcp0ascvv" target="_blank" class="fc_red fw_bold" style="text-decoration: underline !important">
                                Grup Sponsorship
                            </a>
                        @elseif (Auth::user()->result == "Media Partner")
                            <a href="http://line.me/ti/g/MmkwTI1n1a" target="_blank" class="fc_red fw_bold" style="text-decoration: underline !important">
                                Grup Media Partner
                            </a>
                        @elseif (Auth::user()->result == "Marketing")
                            <a href="https://line.me/R/ti/g/Joo4gXE9rR" target="_blank" class="fc_red fw_bold" style="text-decoration: underline !important">
                                Grup Marketing
                            </a>
                        @elseif (Auth::user()->result == "Design")
                            <a href="https://line.me/R/ti/g/5rMhuH-YWx" target="_blank" class="fc_red fw_bold" style="text-decoration: underline !important">
                                Grup Design
                            </a>
                        @elseif (Auth::user()->result == "Videography Photography")
                            <a href="https://line.me/R/ti/g/vlw0u6nstK" target="_blank" class="fc_red fw_bold" style="text-decoration: underline !important">
                                Grup Videography Photography
                            </a>    
                        @elseif (Auth::user()->result == "Publication")
                            <a href="http://line.me/ti/g/lWrWQatczl" target="_blank" class="fc_red fw_bold" style="text-decoration: underline !important">
                                Grup Publication
                            </a>
                        @elseif (Auth::user()->result == "Bazaar")
                            <a href="https://line.me/ti/g/cw-FbpwfYz" target="_blank" class="fc_red fw_bold" style="text-decoration: underline !important">
                                Grup Bazaar
                            </a>
                        @elseif (Auth::user()->result == "Consumption")
                            <a href="https://line.me/R/ti/g/TmHKotDTct" target="_blank" class="fc_red fw_bold" style="text-decoration: underline !important">
                                Grup Consumption
                            </a>
                        @elseif (Auth::user()->result == "Equipment")
                            <a href="https://line.me/ti/g/dwZN_trct5" target="_blank" class="fc_red fw_bold" style="text-decoration: underline !important">
                                Grup Equipment
                            </a>
                        @endif
                        
                    </div>
                </div>
            </div>
        @else 
            <div class="container p_relative py20 fc_red">
                <div class="title_font text_center mb16">
                    <p class="text_big">Mohon Maaf</p>
                    <p class="fc_black">Kamu Dinyatakan Tidak Lulus menjadi Freelance SI FEST 2022</p>
                </div>

                <div class="box_rt_lb_side ease2 px6 py8">
                    <i class="box_rt_lb_side_design"></i>
                    <div>
                        Melalui pesan ini, dengan berat hati <b>{{ Auth::user()->name }}</b>
                        dinyatakan <b>tidak lulus</b> menjadi Freelance SI FEST 2022. 
                        <b>Jangan putus asa dan tetap semangat! Persiapkan diri anda, kami tunggu di oprec HIMSI 2023 !. </b>
                    </div>
                </div>
            </div>
        @endif

    </div>
</section>

@endsection --}}