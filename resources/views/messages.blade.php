<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <script src="https://kit.fontawesome.com/de52212229.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <style>
        .min-vh-100 {
            min-height: 100vh;
        }

        body {
            overflow-x: hidden;
        }
    </style>
</head>
<body>

    @include('header2')
    <div class="container-fluid min-vh-100">
        <div class="row min-vh-100">
            <div class="col-4">
                <div class="card min-vh-100">
                    <div class="card-header">
                        <h4>Messages</h4>
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                        @foreach($users as $key => $user)
                            @if ($latestMessages->has($key))
                                <li class="list-group-item">
                                    <a href="#">
                                        <div class="d-flex">
                                            <img src="https://via.placeholder.com/150" alt="profile" style="width: 50px; height: 50px; border-radius: 50%;">
                                            <div class="ms-3">
                                                <h5>{{ $user->first_name }} {{ $user->last_name }}</h5>
                                                <p>{{ optional($latestMessages[$key])->message }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="card min-vh-100" >
                    <div class="card-body">
                    @if($receiver_chats == "0" && $sender_chats == "0")
                        <div class="d-flex justify-content-center">
                            <h4>Select a conversation</h4>
                        </div>
                    @else
                    @foreach($sender_chats as $chat)
                        <div class="d-flex flex-row-reverse">
                            <p>{{ $chat->message }}</p>
                        </div>
                    @endforeach

                    @foreach($receiver_chats as $chat)
                        <div>
                            <p>{{ $chat->message }}</p>
                        </div>
                    @endforeach
                    @endif
                    </div>

                    @if(!$chats == "0")
                    <div class="card-footer">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Type a message">
                                <button class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>