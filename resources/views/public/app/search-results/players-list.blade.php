
<div class="container bootstrap snippets mt-3">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{ asset('js/app.js') }}"></script>

    @include('system.layout.snippets.filters.filter-header', ['var' => $users])
    <table class="table table-bordered" id="filtering">
        <thead>
        <tr>
            <th scope="col" style="text-align:center;">#</th>
            @include('system.layout.snippets.filters.filters_header')
            <th width="120p" class="akcije text-center">{{__('Akcije')}}</th>
        </tr>
        </thead>
        <tbody>
        @php $i=1; @endphp
        @foreach($users as $user)
            <tr>
                <td class="text-center">{{ $i++}}</td>
                <td> {{ $user->name ?? ''}} </td>
                <td> {{ $user->sportRel->value ?? ''}} </td>
                <td> {{ $user->positionRel->value ?? ''}} </td>
                <td> {{ $user->height ?? ''}} </td>
                <td> {{ $user->years_old ?? ''}} </td>
                <td> {{ $user->strongerLimbRel->value ?? ''}} </td>
                <td> {{ $user->genderRel->value ?? ''}} </td>
                <td>
                    <ul class="m-0">
                        @foreach($user->natTeamDataRel as $natTeam)
                            <li> {{ $natTeam->countryRel->title ?? '' }} </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul class="m-0">
                        @foreach($user->clubDataRel as $clubData)
                            <li> {{ $clubData->clubRel->title ?? '' }} </li>
                        @endforeach
                    </ul>
                </td>

                <td class="text-center">
                    <a href="{{route('home.players.preview', ['id' => $user->id, 'what' => 'info'] )}}" title="Pregled korisnika">
                        <button class="btn-dark btn-xs">Pregled</button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @include('system.layout.snippets.filters.pagination', ['var' => $users])
</div>


<div class="container bootstrap snippets bootdey players-list">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                            <tr>
                                <th><span>Ime i prezime</span></th>
                                <th><span>Ugovor</span></th>
                                <th>Datum rođenja</th>
                                <th>Država</th>
                                <th>Pozicija</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2c/20150331_2026_AUT_BIH_2177_Edin_D%C5%BEeko_%28cropped%29.jpg" alt="">
                                    <span class="user-link">Edin Džeko</span>
                                    <span class="user-subhead">FK Željezničar</span>
                                </td>
                                <td>4 godine</td>
                                <td>17.03.1986</td>
                                <td>
                                    Bosna i Hercegovina
                                </td>
                                <td>
                                    Prednji vezni
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
