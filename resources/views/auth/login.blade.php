<x-layout>
    <div class="wrapper-log shape-wrap">
        <div class="wrap-bg">
            <div class="absolute">
                <div class="absolute inset-0 justify-center">
                    <div id="shape1" class="bg-shape1 bg-shape  bg-teal opacity-50 bg-blur"></div>
                    <div id="shape2" class="bg-shape2 bg-shape  bg-primary opacity-50 bg-blur"></div>
                    <div id="shape1" class="bg-shape2 bg-shape   bg-teal opacity-50 bg-blur"></div>


                </div>

            </div>
            <div class="login-box">
                <form class="text-center" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2 class="title-font log-fnt fs-1 no-shdw ">{{ __('ui.login') }}</h2>
                    <div class="input-box ms-2">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" name="email" placeholder="{{ __('ui.email') }}" class="input pixel-font  no-shdw " style="letter-spacing: 2px;" required>
                        <!-- <label>Email</label> -->
                    </div>
                    <div class="input-box ms-2">
                        <span class="icon"><ion-icon id="show-pwd" name="eye-off-outline"></ion-icon></span>
                        <input id="pwd" type="password" name="password" placeholder="{{ __('ui.password') }}" class="input pixel-font  no-shdw " style="letter-spacing: 2px;" required>
                        <!-- <label>Password</label> -->
                    </div>
                    <div class="remember-forgot d-flex gap-3">
           <div class="remember-link " style="display: flex; align-items: center; gap:4px">
                    <input type="checkbox" id="cbx" class="hidden-xs-up " style="width: 30%;">
                    <label for="cbx" class="cbx "></label>
                     <span>{{ __('ui.remember') }}</span>
            </div>
                        <div class="forgot-link  " >
                            <p class="mb-0 ">{{ __('ui.passwordDimenticata') }}</p>
                            <a href="/forgot-password " class="pixel-font neonscore clk-here">{{ __('ui.cliccaQui') }}</a>
                        </div>
                    </div>
                    <button type="submit" class="button-magenta ">{{ __('ui.login') }}</button>
                    <div class="register-link pixel-font ">
                        {{ __('ui.nonSeiRegistrato') }}
                        <a  class="pixel-font" href="{{ route('register') }}">{{ __('ui.registrati') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
