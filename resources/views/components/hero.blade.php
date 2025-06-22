<section class="hero-section">
        <div class="hero-vid">
            <video loop autoplay muted playsinline  class="hero-video">
            <source src="{{ asset('video/videoplayback.mp4') }}" type="video/mp4">
            </video>
            <div class="container homecontainer justify-content-center align-items-center text-center ">
                <div class="row">
                    <div class=" d-lg-block col-12 ">
                        <div class="hero-info ">
                            <h1 class="fade-in me-5" >{{ __('ui.urXP') }}</h1>
                            
                            <p class="fade-in me-5">{{ __('ui.heroP') }}</p>
                            <a href="{{route('articles.index')}}" class="button-magenta fade-in me-5">
                                {{ __('ui.play') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <h1 class="gaming-text">XP</h1> -->
        </div>
    </section>