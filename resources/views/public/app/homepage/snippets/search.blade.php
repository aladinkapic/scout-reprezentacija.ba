<div class="search">
    <div class="search-wrapper">
        <div class="search-header">
            <div class="title">{{ __('Pretražite igrače') }}</div>
            <div class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi laboriosam, deleniti
                officiis beatae iste doloremque ea suscipit, quidem in, rem iusto illo ipsam recusandae maiores tempore
                voluptatem id non error?
            </div>
        </div>

        <div class="search-instance">
            <div class="field">
                <div class="soccer-field">
                    <div class="pitch-lines"></div>
                    <div class="half-circle-1"></div>
                    <div class="half-circle-2"></div>
                    <div class="box16"></div>
                    <div class="center"></div>
                    <div class="position gk"></div>
                    <div class="position cb"></div>
                    <div class="position rb"></div>
                    <div class="position lb"></div>
                    <div class="position dm"></div>
                    <div class="position cm"></div>
                    <div class="position rm"></div>
                    <div class="position lm"></div>
                    <div class="position am"></div>
                    <div class="position rw"></div>
                    <div class="position lw"></div>
                    <div class="position ss"></div>
                    <div class="position st"></div>
                </div>
            </div>
            <form class="search-form search-players-wrapper">
                <div class="form-floating mb-3">
                    {!! Form::select('sport', $sports, '', ['class' => 'form-control pick-a-sport', 'id' => 'sport', 'filter' => 'sportRel.value']) !!}
                    <label for="floatingSelect">{{ 'Sport' }}</label>
                </div>

                <div class="form-floating mb-3">
                    {!! Form::text('name', '', ['class' => 'form-control', 'id' => 'name', 'filter' => 'name', 'placeholder' => 'Ime i prezime']) !!}
                    <label for="name"> {{ __('Ime ili prezime') }} </label>
                </div>

                <div class="form-floating mb-3">
                    {!! Form::select('position', $positions, '', ['class' => 'form-control picked-position', 'id' => 'position', 'filter' => 'positionRel.value']) !!}
                    <label for="position"> {{ __('Pozicija') }} </label>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            {!! Form::text('height', '', ['class' => 'form-control', 'id' => 'height', 'filter' => 'height', 'placeholder' => 'Visina (cm)', 'min' => '0', 'max' => '250', 'step' => '1']) !!}
                            <label for="height"> {{ __('Visina (cm)') }} </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            {!! Form::text('years_old', '', ['class' => 'form-control', 'id' => 'years_old', 'filter' => 'years_old', 'placeholder' => 'Broj godina igrača', 'min' => '0', 'max' => '250', 'step' => '1']) !!}
                            <label for="years_old"> {{ __('Starost igrača') }} </label>
                        </div>
                    </div>
                </div>

                <div class="form-floating mb-3">
                    {!! Form::select('strongerLimb', $strongerLimb, '', ['class' => 'form-control', 'id' => 'strongerLimb', 'placeholder' => 'Snažnija noga', 'filter' => 'strongerLimbRel.value']) !!}
                    <label for="strongerLimb">{{ __('Snažnija noga') }}</label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="Da li je igrač pod ugovorom?">
                        <option selected disabled>Odaberi</option>
                        <option value="1">Da</option>
                        <option value="2">Ne</option>
                    </select>
                    <label for="floatingSelect">Da li je igrač pod ugovorom?</label>
                </div>

                <div class="form-floating mb-3">
                    {!! Form::select('gender', $gender, '', ['class' => 'form-control', 'id' => 'gender', 'filter' => 'genderRel.value']) !!}
                    <label for="gender">{{ __('Spol igrača') }}</label>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            {!! Form::select('country', $countries, '', ['class' => 'form-control select-2', 'id' => 'country', 'filter' => 'natTeamDataRel.countryRel.title']) !!}
                            <label for="floatingSelect">{{ __('Odaberi državu') }}</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            {!! Form::select('club', $clubs, '', ['class' => 'form-control select-2', 'id' => 'club', 'filter' => 'clubDataRel.clubRel.title']) !!}
                            <label for="floatingSelect">{{ __('Trenutni klub') }}</label>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-primary w-100 search-players"> {{ __('Pretražite') }} </button>
            </form>
        </div>
    </div>
</div>


<br>
