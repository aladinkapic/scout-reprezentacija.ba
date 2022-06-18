<div class="row mb-3">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::textarea('summernoteDesc', '', ['class' => 'form-control required', 'id' => 'summernoteDesc', 'style' => 'height:200px !important;']) !!}
        </div>
    </div>
    <div class="col-md-12 d-flex justify-content-end mt-3">
        <button type="submit" class="btn btn-sm btn-secondary"> <b>{{__('Spremite')}}</b> </button>
    </div>
</div>

@foreach($loggedUser->posts as $post)
    <div class="single-post">
        <div class="sp-header">
            <div class="sp-h-iw">
                <img src="@if($loggedUser->image != '') {{ asset('images/profile-images/'.$loggedUser->image) }} @else {{ asset('images/user.png') }} @endif " alt="">
            </div>
            <div class="sp-h-data">
                <p> {{ $loggedUser->name ?? '' }} </p>
                <span> {{ $post->getDate() }} </span>
                <a href="{{ route('system.users.edit-post', ['id' => $post->id ]) }}">
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
        $('#summernoteDesc').summernote({
            height: 'auto',
            disableResizeEditor: true,
            toolbar: [
                // ['style', ['style']],
                ['font', ['bold', 'italic', 'underline']],
                // ['color', ['color']],
                // ['para', ['ul', 'ol', 'paragraph']],
                // ['table', ['table']],
                ['insert', ['link' /*, 'picture', 'hr' */]]
            ],
        });
        $('.dropdown-toggle').dropdown();
    });
</script>
