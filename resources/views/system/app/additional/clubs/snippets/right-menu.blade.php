<div class="col-md-3 border-left">
    <div class="row">
        <div class="col-md-12">

            <div class="card" title=" {{ __('Osnovne informacije') }} ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="club-image-wrapper">
                                <img class="mp-club-image" src="@if($club->image != '') {{ asset('images/club-images/'.$club->image) }} @else {{ asset('images/club-images/blank.jpg') }} @endif " alt="">

                                <label for="club_image" title="{{ __('Promijenite sliku grba') }}"> <div class="hover-effect"></div> </label>
                                <input type="file" name="club_image" class="image club_image d-none" id="club_image">
                                <input type="hidden" name="club_image_id" id="club_image_id" value="{{ $club->id ?? '' }}">
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="{{ route('system.additional.clubs.edit', ['id' => $club->id ]) }}">
                                <div class="btn btn-sm btn-info w-100 text-white">
                                    <b> {{ __('Uredite informacije') }} </b>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
