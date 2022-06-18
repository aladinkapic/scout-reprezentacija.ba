<div class="row mb-3">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::textarea('description', '', ['class' => 'form-control required', 'id' => 'description', 'style' => 'height:200px !important;', 'maxlength' => '500']) !!}
        </div>
    </div>
    <div class="col-md-12 d-flex justify-content-end mt-3">
        <button type="submit" class="btn btn-sm btn-secondary"> <b>{{__('Spremite')}}</b> </button>
    </div>
</div>

@foreach($club->posts as $post)
    <div class="single-post">
        <div class="sp-header">
            <div class="sp-h-iw">
                <img src="@if($club->image != '') {{ asset('images/club-images/'.$club->image) }} @else {{ asset('images/club-images/blank.jpg') }} @endif " alt="">
            </div>
            <div class="sp-h-data">
                <p> {{ $club->title ?? '' }} </p>
                <span> {{ $post->getDate() }} </span>
                <a href="{{ route('system.additional.clubs.edit-post', ['id' => $post->id ]) }}">
                    <div class="edit-it">
                        <i class="fas fa-edit"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="sp-body">
            <p> {!! $post->content ?? '' !!} </p>
        </div>
    </div>
@endforeach


<script>
    $(document).ready(function() {
        $('#description').summernote({
            height: 'auto',
            disableResizeEditor: true,
            toolbar: [ ['font', ['bold', 'italic', 'underline']], ['insert', ['link']] ],
        });
        $('.dropdown-toggle').dropdown();
    });
</script>
