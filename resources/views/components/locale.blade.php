<form action="{{ route('setLocale') }}" method="POST" id="language-form" class="d-inline mx-auto">
    @csrf
    <select name="locale" onchange="document.getElementById('language-form').submit();" class="form-select lang-dwn d-inline w-auto">
        @foreach ($availableLocales as $lang)
            <option value="{{ $lang }}" @if (app()->getLocale() === $lang) selected @endif>
                {{ strtoupper($lang) }}
            </option>
        @endforeach
    </select>
</form>
