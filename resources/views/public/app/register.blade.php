@extends('public.layout.layout')

@section('content')
    <div class="register">
        <div class="header-text">Kreiraj svoj profil na skaut platformi Reprezentacija.ba</div>
        <div class="welcome-text">Napiši koje si godište, za koji klub igraš i još što misliš da je važno. Skauti
            Reprezentacija.ba će provjeriti ove podatke, te će te kontaktirati ako ispunjavaš naše kriterije. Govorimo
            bosanski, engleski, njemački, talijanski, francuski, švedski...
        </div>
        <form class="search-form" id="js-form" method="POST"
              action={{ "http://" . env('API_LINK') . "/api/users/create-profile" }}>
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Npr. Edin Džeko">
                <label for="name">
                    Ime i prezime
                </label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email"
                       placeholder="Npr. igrac@reprezentacija.ba">
                <label for="name">
                    E-mail
                </label>
            </div>
            <div class="form-floating mb-3">
                {!! Form::select('sport', $sports, '', ['class' => 'form-control', 'id' => 'sport']) !!}
                <label for="floatingSelect">Sport</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Npr. 061 123 456">
                <label for="name">
                    Broj telefona
                </label>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="birth_date" name="birth_date"
                       placeholder="Unesi svoj datum rođenja">
                <label for="name">
                    Datum rođenja
                </label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="club" name="club" aria-label="Klub">
                    <option selected disabled>Odaberi</option>
                    <option value="1">FK Željezničar</option>
                    <option value="1">FK Sarajevo</option>
                    <option value="1">FK Velež</option>
                </select>
                <label for="floatingSelect">Klub</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="living_place" name="living_place"
                       placeholder="Npr. Edin Džeko">
                <label for="name">
                    Grad u kojem živiš
                </label>
            </div>
            <div class="form-floating mb-3">
                {!! Form::select('country', $countries, '', ['class' => 'form-control select-2', 'id' => 'country']) !!}
            </div>
            <div class="form-floating mb-3">
                {!! Form::select('citizenship', $countries, '', ['class' => 'form-control select-2', 'id' => 'citizenship']) !!}
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" id="note" name="note" rows="3"></textarea>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">Kreiraj svoj profil</button>
            </div>
        </form>
    </div>
@endsection
