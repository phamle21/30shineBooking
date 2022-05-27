<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col border border-secondary p-5">
                <h1 class="fw-bold text-center">Form test Create Booking</h1>
                <form action="/api/bookings" method="POST" class="fs-2" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Test <br></label>
                        <input type="text" name="stylist_id" class="form-control" id="exampleInputTest1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputTest1" class="form-label">Test <br></label>
                        <input type="text" name="user_id" class="form-control" id="exampleInputTest1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputTest1" class="form-label">Test <br></label>
                        <input type="text" name="store_id" class="form-control" id="exampleInputTest1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputTest1" class="form-label">Test <br></label>
                        <input type="text" name="promotion_id" class="form-control" id="exampleInputTest1">
                    </div>
                    <div class="mb-3">
                        <label for="service_id_list" class="form-label">Test <br></label>
                        <select name="service_id_list[]" class="form-select select2-multi" multiple
                            aria-label="multiple select example">
                            <option value="1">Service 1</option>
                            <option value="2">Service 2</option>
                            <option value="3">Service 3</option>
                            <option value="4">Service 4</option>
                            <option value="5">Service 5</option>
                            <option value="6">Service 6</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    {{-- Script --}}
    <script>
        $('.select2-multi').select2();
    </script>


</body>

</html>
