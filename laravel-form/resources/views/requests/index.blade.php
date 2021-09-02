<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Создать') }}</div>
                    <div class="card-body">
                        <a href="feedback/create">Новая заявка</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">{{ __('Предыдущие заявки') }}</div>
                    <div class="card-body">
                        @foreach ($requisition ?? [] as $req)
                            <span>{{ $req->title }}</span>
                            <span>{{ $req->company }}</span>
                            <span>{{ $req->phone }}</span>
                            <span>{{ $req->file }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
