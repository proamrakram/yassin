<x-layouts.whatsapp>



    <!-- Breadcrumb-->
    <div class="bg-gray-200 text-sm">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3">
                    <li class="breadcrumb-item"><a class="fw-light" href="index.html">Home</a></li>
                    <li class="breadcrumb-item fw-light" aria-current="page">User</li>
                    <li class="breadcrumb-item active fw-light" aria-current="page">Images</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Page Header-->
    <header class="py-4">
        <div class="container-fluid py-2">
            <h1 class="h3 fw-normal mb-0">Whats App Images Gallery From {{ '(' . $wa_user->name . ')' }} </h1>
        </div>
    </header>

    <div class="card-header border-bottom">
        <form class="row g-3 align-items-center" action="{{ route('bot.send-image-message', $wa_user) }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="col-lg">
                <div>
                    <label class="ms-3" for="imageLable"><strong>Send New Message to:</strong>
                        {{ '(' . $wa_user->name . ')' }}</label>
                </div>

                <div class="input-group">
                    <div class="input-group-text ms-3"> <img src="{{ asset('whatsapp-assets/svg/send-message.svg') }}"
                            width="20" height="20" alt="search"> </div>
                    <input type="file" id="new_image_message" name="new_image_message" accept=".jpg, .jpeg, .png"
                        class="form-control imageInput">
                </div>
                <div class="input-group preview">
                    <small class="ms-3 text-danger">No Image File currently selected for upload</small>
                </div>
            </div>

            <div class="col-lg">
                <button class="btn btn-primary" type="submit">Submit</button>
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

        </form>
    </div>

    <x-portfolio :wauser="$wa_user"></x-portfolio>



    <script>
        const input = document.querySelector('.imageInput');
        const preview = document.querySelector('.preview');

        // input.style.opacity = 0;

        input.addEventListener('change', updateImageDisplay);

        const fileTypes = [
            "image/apng",
            "image/bmp",
            "image/gif",
            "image/jpeg",
            "image/pjpeg",
            "image/png",
            "image/svg+xml",
            "image/tiff",
            "image/webp",
            "image/x-icon"
        ];

        function validFileType(file) {
            return fileTypes.includes(file.type);
        }

        function returnFileSize(number) {
            if (number < 1024) {
                return `${number} bytes`;
            } else if (number >= 1024 && number < 1048576) {
                return `${(number / 1024).toFixed(1)} KB`;
            } else if (number >= 1048576) {
                return `${(number / 1048576).toFixed(1)} MB`;
            }
        }

        function updateImageDisplay() {

            while (preview.firstChild) {
                preview.removeChild(preview.firstChild);
            }

            const curFiles = input.files;

            if (curFiles.length === 0) {
                const para = document.createElement('small');
                para.textContent = 'No image file currently selected for upload';
                para.style.color = 'red';
                para.style.marginLeft = "16px";
                preview.appendChild(para);
            } else {

                for (const file of curFiles) {

                    const para = document.createElement('small');

                    if (validFileType(file)) {
                        para.textContent = `File name ${file.name}, file size ${returnFileSize(file.size)}.`;
                        para.style.color = "blue";
                        para.style.marginLeft = "16px";

                        // const image = document.createElement('img');
                        // image.src = URL.createObjectURL(file);
                        // preview.appendChild(image);
                        preview.appendChild(para);
                    } else {
                        para.textContent = `File name ${file.name}: Not a valid file type. Update your selection.`;
                        para.style.color = 'red';
                        para.style.marginLeft = "16px";
                        preview.appendChild(para);
                    }

                }
            }
        }
    </script>







</x-layouts.whatsapp>
