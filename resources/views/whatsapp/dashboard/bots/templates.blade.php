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
                                    <label class="visually-hidden" for="inlineFormInputGroupUsername">Template
                                        Name</label>
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

                                <div class="col-lg-1">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>

                                <x-create-template></x-create-template>


                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive text-center">
                                <table class="table text-sm mb-0 table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Components</th>
                                            <th>Language</th>
                                            <th>Status</th>
                                            <th>Category</th>
                                            <th>Template ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($bot->templates as $template)
                                            <tr>
                                                <th scope="row">{{ $template->id }}</th>
                                                <th scope="row">{{ $template->name }}</th>
                                                <td>components</td>
                                                <td>{{ $template->language }}</td>
                                                <td>{{ $template->status }}</td>
                                                <td>{{ $template->category }}</td>
                                                <td>{{ $template->template_id }}</td>
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
