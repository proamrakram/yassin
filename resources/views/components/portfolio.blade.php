<div class="container-xxl">

    @if ($wauser->imageMessages->count() > 0)
        <div class="row mt-2">
            <div class="col-12 col-md-3 mb-3">
                <input type="text" class="form-control" placeholder="Search cards" aria-label="Search cards"
                    onkeyup="searchFilter()">
            </div>
        </div>
    @endif


    <div class="row row-cols-1 row-cols-md-4 g-4">

        @foreach ($wauser->imageMessages as $image)
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset('storage') . '/' .  $image->imageAttachment->image_url}}" class="card-img-top"
                        style="width:100% ; height:15vw ; object-fit:cover;" alt="...">
                    <div class="card-body  d-flex flex-column">
                        <span class="card-title"><strong>Name: </strong>{{ '(' . $image->senderMessage->name . ')' }}</span>
                        <span class="card-title"><strong>Phone Number: </strong>{{ '(' . $image->from_phone_number . ')' }}</span>
                        <span class="card-title"><strong>Mime Type: </strong>{{ '(' . $image->mime_type . ')' }}</span>
                        <span class="card-title"><strong>Message Date: </strong>{{ '(' . $image->message_timestamp . ')' }}</span>
                        <span class="card-title"><strong>Image ID: </strong>{{ '(' . $image->image_id . ')' }}</span>
                        <span class="card-title"><strong>Message ID: </strong>{{ '(' . $image->message_id . ')' }}</span>

                        <a href="#" class="btn btn-primary btn-dark align-self-end mt-auto ">Reply</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>



<!-- This is Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script>


<!-- this is javascript-->
<script>
    var searchFilter = () => {
        const input = document.querySelector(".form-control");
        const cards = document.getElementsByClassName("col");
        console.log(cards[1])
        let filter = input.value
        for (let i = 0; i < cards.length; i++) {
            let title = cards[i].querySelector(".card-body");
            if (title.innerText.toLowerCase().indexOf(filter.toLowerCase()) > -1) {
                cards[i].classList.remove("d-none")
            } else {
                cards[i].classList.add("d-none")
            }
        }
    }
</script>
