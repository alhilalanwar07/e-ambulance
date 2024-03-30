<div>
    @section('title', __('Kontak'))
    <!-- Contact 1 - Bootstrap Brain Component -->
    <section class="bg-light py-3 py-md-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="mb-4 display-5 text-center">Kontak</h2>
                    <p class="text-secondary mb-5 text-center">
                        Berikut informasi kontak e-ambulance - SIP Puskesmas Tanggetada.
                    </p>
                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-lg-center">
                {{-- whatsapp, telpon, email --}}
                <div class="row justify-content-center justify-content-lg-center">
                    <div class="col-md-3 mb-4">
                        <div class="card text-left bg-primary text-white">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Alamat</h5>
                                <div class="rounded-circle bg-white me-2" style="width: 30px; height: 30px;">
                                    <img src="https://img.icons8.com/ios-glyphs/30/000000/home.png" alt="phone"></div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Desa Palewai, Kec. Tanggetada</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card text-left bg-success text-white">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title">WhatsApp</h5>
                                <div class="rounded-circle bg-white me-2" style="width: 30px; height: 30px;">
                                    <img src="https://img.icons8.com/ios-glyphs/30/000000/whatsapp--v1.png" alt="whatsapp">
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">+62 857-1234-5678</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card text-left bg-warning text-white">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Telepon</h5>
                                <div class="rounded-circle bg-white me-2" style="width: 30px; height: 30px;">
                                    <img src="https://img.icons8.com/material-rounded/30/000000/phone--v2.png" alt="telepon">
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">021-1234-5678</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card text-left bg-danger text-white">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Email</h5>
                                <div class="rounded-circle bg-white me-2" style="width: 30px; height: 30px;">
                                    <img src="https://img.icons8.com/ios-glyphs/30/000000/email.png" alt="email">
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">admin@sip-puskesmas.com</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row justify-content-lg-center">
                <div class="col-12 col-lg-12">
                    <div class="bg-white border rounded shadow-sm overflow-hidden">

                        <form action="#!">
                            <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
                                {{-- <div class="col-12"> --}}
                                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d254658.98363560913!2d121.43651835742493!3d-4.211152540181541!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbd56bdd7044c7b%3A0xbf306f5fa285aab8!2sPuskesmas%20Tanggetada!5e0!3m2!1sen!2sid!4v1711266601511!5m2!1sen!2sid" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                {{-- </div> --}}
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
