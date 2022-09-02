<x-layouts.whatsapp>

    <!-- Breadcrumb-->
    <div class="bg-gray-200 text-sm">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3">
                    <li class="breadcrumb-item"><a class="fw-light" href="index.html">Home</a></li>
                    <li class="breadcrumb-item fw-light" aria-current="page">User</li>
                    <li class="breadcrumb-item active fw-light" aria-current="page">Texts Messages</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Page Header-->
    <header class="py-4">
        <div class="container-fluid py-2">
            <h1 class="h3 fw-normal mb-0">Whats App Texts Messages From {{"(".$wa_user->name.")"}} </h1>
        </div>
    </header>


    <section class="tables">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">


                        <div class="card-header border-bottom">
                            <form class="row g-3 align-items-center" action="{{route('bot.send-text-message', $wa_user)}}" method="POST">
                                @csrf
                                <div class="col-lg">
                                    <label class="visually-hidden" for="inlineFormInputGroupUsername">Send New Message to: {{"(".$wa_user->name.")"}}</label>
                                    <div class="input-group">
                                        <div class="input-group-text ms-3"> <img
                                                src="{{ asset('whatsapp-assets/svg/send-message.svg') }}" width="20"
                                                height="20" alt="search">
                                        </div>
                                        <input class="form-control" id="new_message" name="new_message" type="text"
                                            placeholder="New Message">
                                    </div>
                                </div>

                                {{-- <div class="col-lg">
                                    <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                                    <select class="form-select" id="inlineFormSelectPref">
                                        <option selected>Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div> --}}

                                <div class="col-lg">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>

                            </form>
                        </div>




                        <div class="card-body">
                            <div class="table-responsive text-center">
                                <table class="table text-sm mb-0 table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>Message Body</th>
                                            <th>Messaging Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($wa_user->textMessages as $textMessage)
                                            <tr>
                                                <th scope="row">{{ $textMessage->id }}</th>
                                                <th scope="row"><a href="#"><img
                                                            src="{{ asset('whatsapp-assets/img/avatar-8.jpg') }}"
                                                            width="30" height="30" alt="smilegirl.ico"></a></th>
                                                <th scope="row">{{ $wa_user->name }}</th>
                                                <td>{{ $textMessage->from_phone_number }}</td>

                                                <td>
                                                    <x-reply-message :message="$textMessage"></x-reply-message>
                                                </td>

                                                <td>{{ $textMessage->message_timestamp }}</td>
                                            </tr>
                                        @endforeach

                                        {{-- <tr>
                                            <th class="border-bottom-0" scope="row">3</th>
                                            <td class="border-bottom-0">Larry</td>
                                            <td class="border-bottom-0">the Bird</td>
                                            <td class="border-bottom-0">@twitter</td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</x-layouts.whatsapp>
