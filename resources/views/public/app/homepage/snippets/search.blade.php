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


                <div class="position gk" title="Golman (GK)" value="Golman (GK)"> <div class="inside-position"></div> </div>
                <div class="position cb" title="Stoper (CB)" value="Stoper (CB)"> <div class="inside-position"></div> </div>
                <div class="position lb" title="Lijevi bek (LB)" value="Lijevi bek (LB)"> <div class="inside-position"></div> </div>
                <div class="position rb" title="Desni bek (RB)" value="Desni bek (RB)"> <div class="inside-position"></div> </div>
                <div class="position dmf" title="Zadnji vezni (DMF)" value="Zadnji vezni (DMF)"> <div class="inside-position"></div> </div>
                <div class="position cmf" title="Centralni vezni (CMF)" value="Centralni vezni (CMF)"> <div class="inside-position"></div> </div>
                <div class="position rmf" title="Desno krilo (RMF)" value="Desno krilo (RMF)"> <div class="inside-position"></div> </div>
                <div class="position lmf" title="Lijevo krilo (LMF)" value="Lijevo krilo (LMF)"> <div class="inside-position"></div> </div>
                <div class="position amf active" title="Ofanzivni vezni (AMF)" value="Ofanzivni vezni (AMF)"> <div class="inside-position"></div> </div>
                <div class="position lwf" title="Krilni napadač (LWF)" value="Krilni napadač (LWF)"> <div class="inside-position"></div> </div>
                <div class="position rwf" title="Krilni napadač (RWF)" value="Krilni napadač (RWF)"> <div class="inside-position"></div> </div>
                <div class="position cf" title="Napadač (CF)" value="Napadač (CF)"> <div class="inside-position"></div> </div>
            </div>
        </div>

        <div class="main-field futsal-field d-none">
            <div class="field-border">
                <div class="middle-line"></div>
                <div class="middle-circle"></div>

                <div class="top-curved-area"></div>
                <div class="bottom-curved-area"></div>

                <div class="position f-gk" title="Golman" value="Golman"> <div class="inside-position"></div> </div>
                <div class="position f-cb" title="Stoper" value="Igrač"> <div class="inside-position"></div> </div>
                <div class="position f-lw" title="Lijevo krilo" value="Igrač"> <div class="inside-position"></div> </div>
                <div class="position f-rw" title="Desno krilo" value="Igrač"> <div class="inside-position"></div> </div>
                <div class="position f-cf" title="Napadač" value="Igrač"> <div class="inside-position"></div> </div>
            </div>
        </div>
    </div>
    <div class="form-part">
        <form class="search-form search-players-wrapper">
            <div class="form-floating mb-3">
                {!! Form::select('sport', $sports, 'Nogomet', ['class' => 'form-control pick-a-sport', 'id' => 'sport', 'filter' => 'sportRel.value']) !!}
                <label for="floatingSelect">{{ 'Sport' }}</label>
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
                {!! Form::select('birth_year', $range, '', ['class' => 'form-control select-2', 'id' => 'birth_year', 'placeholder' => 'Godište igrača', 'filter' => 'birth_year']) !!}
                <label for="strongerLimb">{{ __('Godište igrača') }}</label>
            </div>

            <div class="form-floating mb-3">
                {!! Form::select('strongerLimb', $strongerLimb, '', ['class' => 'form-control', 'id' => 'strongerLimb', 'placeholder' => 'Snažnija noga', 'filter' => 'strongerLimbRel.value']) !!}
                <label for="strongerLimb">{{ __('Snažnija noga') }}</label>
            </div>

            <div class="form-floating mb-3">
                {!! Form::select('under_contract', ['' => 'Odaberite', 'Ne' => 'Ne', 'Da' => 'Da'], '', ['class' => 'form-control', 'id' => 'under_contract', 'filter' => 'under_contract']) !!}
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
                        {!! Form::select('club', $clubs, '', ['class' => 'form-control select-2', 'id' => 'club', 'filter' => 'clubDataRel.clubRel.title']) !!}
                        <label for="floatingSelect">{{ __('Trenutni klub') }}</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="search-players"> {{ __('PRETRAŽITE') }} </button>
                </div>
            </div>

{{--            <button type="button" class="btn btn-primary search-players"> {{ __('Pretražite') }} </button>--}}
        </form>
    </div>
</div>

{{--<div class="search" id="search-home-players">--}}
{{--    <div class="search-wrapper">--}}
{{--        <div class="search-instance">--}}
{{--            <div class="field">--}}
{{--                <div class="soccer-field">--}}
{{--                    <div class="pitch-lines"></div>--}}
{{--                    <div class="half-circle-1"></div>--}}
{{--                    <div class="half-circle-2"></div>--}}
{{--                    <div class="box16"></div>--}}
{{--                    <div class="center"></div>--}}
{{--                    <div class="position gk"></div>--}}
{{--                    <div class="position cb"></div>--}}
{{--                    <div class="position rb"></div>--}}
{{--                    <div class="position lb"></div>--}}
{{--                    <div class="position dm"></div>--}}
{{--                    <div class="position cm"></div>--}}
{{--                    <div class="position rm"></div>--}}
{{--                    <div class="position lm"></div>--}}
{{--                    <div class="position am"></div>--}}
{{--                    <div class="position rw"></div>--}}
{{--                    <div class="position lw"></div>--}}
{{--                    <div class="position ss"></div>--}}
{{--                    <div class="position st"></div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


{{--<br>--}}
