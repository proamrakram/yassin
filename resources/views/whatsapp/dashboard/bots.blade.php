<x-layouts.whatsapp>

    <!-- Breadcrumb-->
    <div class="bg-gray-200 text-sm">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3">
                    <li class="breadcrumb-item"><a class="fw-light" href="index.html">Home</a></li>
                    <li class="breadcrumb-item active fw-light" aria-current="page">Bots </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Page Header-->
    <header class="py-4">
        <div class="container-fluid py-2">
            <h1 class="h3 fw-normal mb-0">Whats App Bots</h1>
        </div>
    </header>


    <section class="tables">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom">

                            <form class="row g-3 align-items-center">

                                <div class="col-lg">
                                    <label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>
                                    <div class="input-group">
                                        <img src="{{ asset('whatsapp-assets/icons/search.ico') }}" width="30"
                                            height="30" alt="search">

                                        <div class="input-group-text ms-3">@</div>
                                        <input class="form-control" id="inlineFormInputGroupUsername" type="text"
                                            placeholder="Username">
                                    </div>
                                </div>

                                <div class="col-lg">
                                    <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                                    <select class="form-select" id="inlineFormSelectPref">
                                        <option selected>Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

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
                                            <th>Wa_Ba_ID</th>
                                            <th>Phone Number</th>
                                            <th>Phone Number ID</th>
                                            <th>Messaging Product</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($bots as $bot)
                                            <tr>
                                                <th scope="row">{{$bot->id}}</th>
                                                <th scope="row"><a href="#"><img src="{{asset('whatsapp-assets/icons/whatsapp.ico')}}" width="50" height="50" alt="smilebot.ico"></a></th>
                                                <th scope="row">{{$bot->name}}</th>
                                                <td>{{$bot->whats_app_business_account_id}}</td>
                                                <td>{{$bot->phone_number}}</td>
                                                <td>{{$bot->phone_number_id}}</td>
                                                <td>{{$bot->messaging_product}}</td>
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
