<div class="public-container partners">
    <div class="container-r-header">
        <div class="crh-line"></div>
        <h2> {{__('PARTNERI')}} </h2>
    </div>
</div>

<div class="public-container partners">
  <div class="partners-wrapper slider">
      @foreach($partners as $partner)
          <a href="#" class="partners-item slide"><img src="{{ asset('images/partners/'.($partner->image ?? '')) }}" alt=""></a>
      @endforeach
  </div>
</div>
