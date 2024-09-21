@extends('public.layout.layout')

@section('content')
    <div class="my__profile__wrapper">
        @include('public.users.snippets.left_menu')

        <div class="content__part">
            <div class="content__menu">
                <h4>{{ __('Nastupi za reprezentaciju') }}</h4>

                <div class="cm__btns_w">
                    <a href="{{ route('profile.career-data.national-teams.new-national-team') }}" title="{{ __('Unesite informacije o nastupima za reprezentaciju') }}">
                        <button class="cm__btn"> <i class="fas fa-plus"></i> <p>{{ __('Unos') }}</p></button>
                    </a>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col" class="text-center" width="40px">#</th>
                    <th scope="col">{{ __('Država') }}</th>
                    <th scope="col">{{ __('Sezona debija') }}</th>
                    <th scope="col" class="text-center" width="120px">{{ __('Akcije') }}</th>
                </tr>
                </thead>
                <tbody>
                @php $counter = 1; @endphp
                @foreach(Auth()->user()->natTeamDataRel as $data)
                    <tr>
                        <th scope="row" class="text-center" width="40px">{{ $counter++ }}</th>
                        <td>{{ $data->countryRel->name_ba ?? '' }}</td>
                        <td>{{ $data->seasonRel->value ?? '' }}</td>
                        <td class="d-flex justify-content-center" width="120px">
                            <a href="{{ route('profile.career-data.national-teams.edit-national-team-data', ['id' => $data->id ]) }}">
                                <button class="table__btn"> <i class="fas fa-edit"></i> <p>{{ __('Uredi') }}</p></button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! Form::open(array('route' => 'profile.info.career.update', 'method' => 'post', 'id' => 'js-form')) !!}



            {{--            <div class="row mt-4">--}}
            {{--                <div class="col-md-12 d-flex justify-content-end">--}}
            {{--                    <button class="btn btn-profile">{{ __('Ažurirajte') }}</button>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {!! Form::close(); !!}
        </div>
    </div>
@endsection


@section('additional-scripts')
    <!-- Crop images -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
@endsection
