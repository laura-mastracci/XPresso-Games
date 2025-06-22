<div class="coin-wrap ">
    <button type="button" class="btn coin" data-bs-toggle="modal" data-bs-target="#coinModal">
        <img src="{{ asset('img/pixel-coin.png') }}" alt="coin" class="img-fluid me-2">
    </button>
</div>


<div class="modal fade" id="coinModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content login-box">
        <div class="modal-qualcosa">
          <button type="button" class="btn text-pink" data-bs-dismiss="modal" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
          </svg>
        </button>
      </div>
        <div class="modal-body d-flex align-items-center">
          @livewire('roulette')
        </div>
      </div>
    </div>
  </div>