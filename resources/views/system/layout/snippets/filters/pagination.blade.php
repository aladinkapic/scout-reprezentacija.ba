<div class="row pt-3">
    <div class="col-md-12 d-flex justify-content-end">
        {{ $var->appends(request()->query())->links() }}
    </div>
</div>
