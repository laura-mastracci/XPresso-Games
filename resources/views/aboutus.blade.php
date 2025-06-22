<x-layout>
    <div class="container my-3">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center text-capitalize title-font text-white">{{ __('ui.chiSiamo') }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h2 class="title-font text-white">{{ __('ui.ourProject') }}</h2>
                    <p class= "text-white">{{ __('ui.ourProject1') }}
                    </p>
                    <p class= "text-white">
                   {{ __('ui.ourProject2') }}
                    </p>
                    <p class= "text-white">
                    {{ __('ui.ourProject3') }}
                    </p>
                </div>
            </div>
    </div>
    <div class="container-fluid band">
        <div class="row text-white text-center py-3">
           <div class="col-md-3 col-12 mt-2 d-flex flex-column align-items-center">
                <a class="face laura"></a>
                <h3 class="Name">Laura</h3>
                <a class="linkedin" href="http://www.linkedin.com/in/laura-mastracci-dev" class="mb-2">linkedin</a>
                <p class="card-text mb-3">{{ __('ui.fullStackDev') }}</p>
        </div>
            <div class="col-md-3 col-12 d-flex flex-column align-items-center">
                <a class="face luigi"></a>
                <h3 class="Name">Luigi</h3>
                <a class="linkedin" href="" class="mb-2">linkedin</a>
                <p class="card-text mb-3">{{ __('ui.frontEndDev') }}</p>
            </div>    
            <div class="col-md-3 col-12 d-flex flex-column align-items-center">
                <a class="face matteo"></a>
                <h3 class="Name">Matteo</h3>
                <a class="linkedin" href="" class="mb-2">linkedin</a>
                <p class="card-text mb-3">{{ __('ui.fullStackDev') }}</p>
            </div>
            <div class=" col-md-3 col-12 d-flex flex-column align-items-center">
                <a class="face lorenzo"></a>
                <h3 class="Name">Lorenzo</h3>
                <a class="linkedin" href="https://www.linkedin.com/in/lorenzo-miglietta-85b3a728a?lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_view_base_contact_details%3BD7J2qgjcSxWs9%2FJre72ZPg%3D%3D" class="mb-2">linkedin</a>
                <p class="card-text mb-3">{{ __('ui.backEndDev') }}</p>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
                <div class="col-6">
                    <h2 class="title-font text-white text-start">{{ __('ui.chiSiamo') }}</h2>
                    <p class= "text-white text-start">{{ __('ui.chiSiamo1') }}
                        </p>
                      <p class= "text-white text-start">   
                    {{ __('ui.chiSiamo2') }}
                    </p>
                    <p class= "text-white text-start">
                    {{ __('ui.chiSiamo3') }}
                    </p>
                </div>
                <div class="col-6 ">
                    <h2 class="title-font text-white text-end">{{ __('ui.sponsoredBy') }}:</h2>
                    <div class="logoAulab">
                        

                    </div>
                </div>
            </div>
    </div>
</x-layout>