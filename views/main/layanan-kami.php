<section class="bg-half bg-light d-table w-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="page-next-level">
                    <h4 class="title"> Layanan Kami</h4>
                    <div class="page-next">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb bg-white rounded shadow mb-0">
                                <li class="breadcrumb-item"><a href="index.html">Ruang Hati</a></li>
                                <li class="breadcrumb-item"><a href="index-shop.html">Layanan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Webbinar</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!--end section-->
<div class="position-relative">
    <div class="shape overflow-hidden text-white">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<section class="section bg-light">
    <div class="container">
        <div class="row">
            <?php foreach ($seminar as $itemSeminar) {  ?>
                <div class="col-lg-6 mt-4 pt-2">
                    <div class="card event-schedule rounded border">
                        <div class="card-body">
                            <div class="media">
                                <ul class="date text-center text-primary mr-3 mb-0 list-unstyled">
                                    <li class="day font-weight-bold mb-2">11</li>
                                    <li class="month font-weight-bold">OCT</li>
                                </ul>
                                <div class="media-body content">
                                    <h4><a href="javascript:void(0)" class="text-dark title"><?= $itemSeminar->nama_seminar ?></a></h4>
                                    <p class="text-muted location-time"><span class="text-dark h6">Address:</span> Hall 3, Sinchang-dong, Kwangju, <span class="text-danger">South Korea</span> <br> <span class="text-dark h6">Time:</span> 10:30AM to 11:15AM</p>
                                    <a href="#tickets" class="btn btn-sm btn-outline-primary mouse-down">Buy Ticket</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</section>