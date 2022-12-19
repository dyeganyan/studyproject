<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Image Upload in laravel 9</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

</head>

<body>

     <div class="container">

        <div class="row pt-5">

            <div class="col-md-12">

                <h1 class="text-ino mb-3 text-center">How to upload image in laravel 9</h1>

              <div class="card">

                <div class="card-header">Upload Images List</div>

                <div class="card-body">

                      <form action="{{url('/upload')}}" method="post" enctype="multipart/form-data">

                        @csrf

                      <div class="form-group mb-3">

                        <input type="file" name="image" id="" class="form-control">

                      </div>

                      <div class="form-group">

                        <input type="submit" value="Upload Image" class="form-control btn btn-info">

                      </div>

                    </form>

                </div>

              </div>

            </div>

        </div>

     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
