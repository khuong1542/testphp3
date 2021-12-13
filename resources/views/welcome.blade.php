
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('hospitals.index')}}" class="btn btn-info" s>Hospital</a>
                        <a href="{{route('doctors.index')}}" class="btn btn-info">Doctor</a>
                        <!-- <a href="{{route('products.index')}}" class="btn btn-info">Pro</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script>
        function Delete(){
            return conf = confirm('Bạn chắc chắn muốn xóa!');
        }
    </script>
</body>
</html>