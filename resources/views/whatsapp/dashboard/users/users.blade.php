<x-layouts.whatsapp>
    <!-- Breadcrumb-->
    <div class="bg-gray-200 text-sm">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3">
                    <li class="breadcrumb-item"><a class="fw-light" href="index.html">Home</a></li>
                    <li class="breadcrumb-item active fw-light" aria-current="page">Users </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Page Header-->
    <header class="py-4">
        <div class="container-fluid py-2">
            <h1 class="h3 fw-normal mb-0">Whats App Users</h1>
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
                                            <th>Bot ID</th>
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>Texts Messages</th>
                                            <th>Images Messages</th>
                                            <th>Videos Messages</th>
                                            <th>Documents Messages</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($wa_users as $wa_user)
                                            <tr>
                                                <th scope="row">{{ $wa_user->id }}</th>
                                                <td>{{ $wa_user->bot_id }}</td>
                                                <td>{{ $wa_user->name }}</td>
                                                <td>{{ $wa_user->phone_number }}</td>
                                                <td><a href=""><img src="{{ asset('whatsapp-assets/icons/text-message.ico') }}" width="30" height="30" alt="text-message"></a></td>
                                                <td><a href=""><img src="{{ asset('whatsapp-assets/icons/image-message.ico') }}" width="30" height="30" alt="image-message"></a></td>
                                                <td><a href=""><img src="{{ asset('whatsapp-assets/icons/video-message.ico') }}" width="30" height="30" alt="video-message"></a></td>
                                                <td><a href=""><img src="{{ asset('whatsapp-assets/icons/document-message.ico') }}" width="30" height="30" alt="document-message"></a></td>
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
