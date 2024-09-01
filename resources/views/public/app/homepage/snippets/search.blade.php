<div class="public-container">
    <div class="container-r-header mt-5">
        <div class="crh-line"></div>
        <h2> {{__('PRETRAGA IGRAČA')}} </h2>
    </div>
</div>

<div class="search-players-main-wrapper">
    <div class="field-part">
        <div class="main-field soccer-field">
            <div class="field-border">
                <div class="middle-line"></div>
                <div class="middle-circle"></div>

                <!-- Top side of field -->
                <div class="top-half-circle"></div>
                <div class="big-top-square"></div>
                <div class="small-top-square"></div>

                <!-- Bottom side of field -->
                <div class="bottom-half-circle"></div>
                <div class="big-bottom-square"></div>
                <div class="small-bottom-square"></div>

                <div class="position gk" title="{{ __('Golman (GK)') }}" value="{{ __('Golman (GK)') }}"> <div class="inside-position"></div> </div>
                <div class="position cb" title="{{ __('Stoper (CB)') }}" value="{{ __('Stoper (CB)') }}"> <div class="inside-position"></div> </div>
                <div class="position lb" title="{{ __('Lijevi bek (LB)') }}" value="{{ __('Lijevi bek (LB)') }}"> <div class="inside-position"></div> </div>
                <div class="position rb" title="{{ __('Desni bek (RB)') }}" value="{{ __('Desni bek (RB)') }}"> <div class="inside-position"></div> </div>
                <div class="position dmf" title="{{ __('Zadnji vezni (DMF)') }}" value="{{ __('Zadnji vezni (DMF)') }}"> <div class="inside-position"></div> </div>
                <div class="position cmf" title="{{ __('Centralni vezni (CMF)') }}" value="{{ __('Centralni vezni (CMF)') }}"> <div class="inside-position"></div> </div>
                <div class="position rmf" title="{{ __('Desno krilo (RMF)') }}" value="{{ __('Desno krilo (RMF)') }}"> <div class="inside-position"></div> </div>
                <div class="position lmf" title="{{ __('Lijevo krilo (LMF)') }}" value="{{ __('Lijevo krilo (LMF)') }}"> <div class="inside-position"></div> </div>
                <div class="position amf active" title="{{ __('Ofanzivni vezni (AMF)') }}" value="{{ __('Ofanzivni vezni (AMF)') }}"> <div class="inside-position"></div> </div>
                <div class="position lwf" title="{{ __('Krilni napadač (LWF)') }}" value="{{ __('Krilni napadač (LWF)') }}"> <div class="inside-position"></div> </div>
                <div class="position rwf" title="{{ __('Krilni napadač (RWF)') }}" value="{{ __('Krilni napadač (RWF)') }}"> <div class="inside-position"></div> </div>
                <div class="position cf" title="{{ __('Napadač (CF)') }}" value="{{ __('Napadač (CF)') }}"> <div class="inside-position"></div> </div>
            </div>
        </div>

        <div class="main-field futsal-field d-none">
            <div class="field-border">
                <div class="middle-line"></div>
                <div class="middle-circle"></div>

                <div class="top-curved-area"></div>
                <div class="bottom-curved-area"></div>

                <div class="position f-gk" title="{{ __('Golman') }}" value="{{ __('Golman') }}"> <div class="inside-position"></div> </div>
                <div class="position f-cb" title="{{ __('Igrač') }}" value="{{ __('Igrač') }}"> <div class="inside-position"></div> </div>
                <div class="position f-lw" title="{{ __('Igrač') }}" value="{{ __('Igrač') }}"> <div class="inside-position"></div> </div>
                <div class="position f-rw" title="{{ __('Igrač') }}" value="{{ __('Igrač') }}"> <div class="inside-position"></div> </div>
                <div class="position f-cf" title="{{ __('Igrač') }}" value="{{ __('Igrač') }}"> <div class="inside-position"></div> </div>
            </div>
        </div>
    </div>
    <div class="form-part">
        <form class="search-form search-players-wrapper">
            <div class="form-floating mb-3">
                {!! Form::select('sport', $sports, __('Nogomet'), ['class' => 'form-control pick-a-sport', 'id' => 'sport', 'filter' => 'sportRel.value']) !!}
                <label for="floatingSelect">{{ __('Sport') }}</label>
            </div>

            <div class="form-floating mb-3">
                {!! Form::select('gender', $gender, '', ['class' => 'form-control', 'id' => 'gender', 'filter' => 'genderRel.value']) !!}
                <label for="gender">{{ __('Spol') }}</label>
            </div>

            <div class="form-floating mb-3">
                {!! Form::text('name', '', ['class' => 'form-control', 'id' => 'name', 'filter' => 'name', 'placeholder' => 'Ime i prezime']) !!}
                <label for="name"> {{ __('Ime ili prezime') }} </label>
            </div>

            <div class="form-floating mb-3">
                {!! Form::select('position', $positions, 'Ofanzivni vezni (AMF)', ['class' => 'form-control picked-position', 'id' => 'position', 'filter' => 'positionRel.value']) !!}
                <label for="position"> {{ __('Pozicija') }} </label>
            </div>

            <div class="form-floating mb-3">
                {!! Form::select('birth_year', $range, '', ['class' => 'form-control select-2', 'id' => 'birth_year', 'placeholder' => __('Godište igrača'), 'filter' => 'birth_year']) !!}
                <label for="strongerLimb">{{ __('Godište igrača') }}</label>
            </div>

            <div class="form-floating mb-3">
                {!! Form::select('strongerLimb', $strongerLimb, '', ['class' => 'form-control', 'id' => 'strongerLimb', 'placeholder' => 'Snažnija noga', 'filter' => 'strongerLimbRel.value']) !!}
                <label for="strongerLimb">{{ __('Snažnija noga') }}</label>
            </div>

            <div class="form-floating mb-3">
                {!! Form::select('under_contract', ['' => __('Odaberite'), 'Ne' => __('Ne'), 'Da' => __('Da')], '', ['class' => 'form-control', 'id' => 'under_contract', 'filter' => 'under_contract']) !!}
                <label for="floatingSelect">{{ __('Da li je igrač pod ugovorom?') }}</label>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        {!! Form::select('country', $countries, '', ['class' => 'form-control select-2', 'id' => 'country', 'filter' => 'citizenshipRel.name_ba']) !!}
                        <label for="floatingSelect">{{ __('Država boravišta') }}</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        {!! Form::text('club', '', ['class' => 'form-control', 'id' => 'club', 'filter' => 'clubDataRel.clubRel.title']) !!}
                        <label for="floatingSelect">{{ __('Trenutni klub') }}</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="search-players yellow-btn"> {{ __('PRETRAŽITE') }} </button>
                </div>
            </div>
        </form>
    </div>
</div>
