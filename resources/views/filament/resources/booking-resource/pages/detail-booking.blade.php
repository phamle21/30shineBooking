<x-filament::page>
    <style>
        a {
            color: black !important;
            text-decoration: none !important;
        }

    </style>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">

    <section class="h-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-10 col-xl-8">
                    <div class="card" style="border-radius: 10px;">
                        <div class="card-header px-4 py-5 ">
                            <h5 class="text-muted mb-0">Thanks for your Booking, <span
                                    style="color: #a8729a;">30Shine</span>!</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <p class="lead fw-normal mb-0" style="color: #a8729a;">Receipt</p>
                                <p class="small text-muted mb-0">Invoice Date : {{ date('d/m/Y', strtotime(now())) }}
                                </p>
                            </div> 
                            @foreach ($booking_detail as $v)
                                <div class="card shadow-0 border mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2 ">
                                                <img src={{ $v->service->images->first()->name }}
                                                    class="img-fluid" style="border-radius: 3px" alt="Service_Img">
                                            </div>
                                            <div
                                                class="col-md-4 text-center d-flex justify-content-center align-items-center">
                                                <a href="/admin/services/{{ $v->service_id }}/detail"
                                                    class="text-muted mb-0 text-secondary fs-6">{{ $v->service->name }}</a>
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Time: {{ $v->service->time / 60 }}h
                                                </p>
                                            </div>
                                            <div
                                                class="col-md-4 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Price:
                                                    {{ number_format($v->price) }}VNĐ</p>
                                            </div>
                                        </div>
                                        <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-2">
                                            </div>
                                            <div class="col-md-10">
                                                <div class="d-flex justify-content-around mb-1">
                                                    <p class="text-muted mt-1 mb-0 small ms-xl-5"><b>Stylist</b>:
                                                        {{ $booking->stylist->name }}</p>
                                                    <p class="text-muted mt-1 mb-0 small ms-xl-5"><b>Store</b>:
                                                        {{ $booking->store->name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="d-flex justify-content-between pt-2">
                                <p class="fw-bold mb-0"><b>Booking Details</b></p>
                                <p class="text-muted mb-0"><b class="fw-bold me-4">Total</b>
                                    {{ number_format($booking->total) }}VNĐ</p>
                            </div>

                            <div class="d-flex justify-content-between pt-2">
                                <p class="text-muted mb-0">Invoice Number : {{ $booking->id }}</p>
                                <p class="text-muted mb-0"><b class="fw-bold me-4">Discount</b> Free</p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <p class="text-muted mb-0">Recepits Voucher : {{ $booking->promotion->code }}</p>
                                <p class="text-muted mb-0"><b class="fw-bold me-4">Sale</b>
                                    {{ $booking->promotion->percent }}%</p>
                            </div>
                            <br>
                            <div class="d-flex justify-content-between mb-5">
                                <p class="text-muted mb-0">Description Voucher :
                                    {{ $booking->promotion->description }}</p>
                            </div>
                        </div>
                        <div class="card-footer border-0 px-4 py-5"
                            style="background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                            <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">
                                Total paid: <span
                                    class="h2 mb-0 ms-2">{{ number_format($booking->total - ($booking->total * $booking->promotion->percent) / 100) }}VNĐ</span>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-filament::page>
