<div class="container-fluid">

    <div class="row mt-2">
        <div class="col-12 col-md-3 mb-3">
            <input type="text" class="form-control" placeholder="Search cards" aria-label="Search cards"
                onkeyup="searchFilter()">
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">

        <div class="col">
            <div class="card h-100">
                <img src="https://source.unsplash.com/random?orientation=landscape&sig=123" class="card-img-top"
                    style="width:100% ; height:15vw ; object-fit:cover;" alt="...">
                <div class="card-body  d-flex flex-column">
                    <h5 class="card-title">Random Card One</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet.</p>
                    <a href="#" class="btn btn-primary btn-dark align-self-end mt-auto stretched-link">Details</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100">
                <img src="https://source.unsplash.com/random??orientation=landscape&sig=234" class="card-img-top"
                    style="width:100% ; height:15vw ; object-fit:cover;" alt="...">
                <div class="card-body  d-flex flex-column">
                    <h5 class="card-title">Random Card Two</h5>
                    <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto,
                        maxime.
                    </p>
                    <a href="#" class="btn btn-primary btn-dark align-self-end mt-auto stretched-link">Details</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100">
                <img src="https://source.unsplash.com/random?orientation=landscape&sig=124" class="card-img-top"
                    style="width:100% ; height:15vw ; object-fit:cover;" alt="...">
                <div class="card-body  d-flex flex-column">
                    <h5 class="card-title">Random Card Three</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia molestiae
                        suscipit nesciunt. Error, quas nihil.</p>
                    <a href="#" class="btn btn-primary btn-dark align-self-end mt-auto stretched-link">Details</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100">
                <img src="https://source.unsplash.com/random??orientation=landscape&sig=546" class="card-img-top"
                    style="width:100% ; height:15vw ; object-fit:cover;" alt="...">
                <div class="card-body  d-flex flex-column">
                    <h5 class="card-title">Random Card Four</h5>
                    <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam
                        tenetur
                        quas
                        blanditiis recusandae cumque quidem ex voluptas officiis? Nesciunt, expedita.</p>
                    <a href="#" class="btn btn-primary btn-dark align-self-end mt-auto stretched-link">Details</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100">
                <img src="https://source.unsplash.com/random?orientation=landscape&sig=634" class="card-img-top"
                    style="width:100% ; height:15vw ; object-fit:cover;" alt="...">
                <div class="card-body  d-flex flex-column">
                    <h5 class="card-title">Random Card Five Double</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad natus voluptate
                        vero,
                        rem dolor praesentium aspernatur, odio, eveniet eligendi nostrum esse repellendus earum
                        ipsum
                        totam.
                    </p>
                    <a href="#" class="btn btn-primary btn-dark align-self-end mt-auto stretched-link">Details</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100">
                <img src="https://source.unsplash.com/random?orientation=landscape" class="card-img-top"
                    style="width:100% ; height:15vw ; object-fit:cover;" alt="...">
                <div class="card-body  d-flex flex-column">
                    <h5 class="card-title">Random Card Six double</h5>
                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora
                        consequuntur
                        corrupti repellendus cum ea laborum, dolores perspiciatis numquam atque culpa. A facere, qui
                        provident laudantium rem temporibus aspernatur cumque ratione.</p>
                    <a href="#" class="btn btn-primary btn-dark align-self-end mt-auto stretched-link">Details</a>
                </div>
            </div>
        </div>

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
