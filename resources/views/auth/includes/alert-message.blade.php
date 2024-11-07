<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
            @if(isset($user) and $user->submitted == 0)
                {{ __('Dodaj fotografiju i sve podatke i pošalji nam. Skauti i analitičari Reprezentacija.ba će provjeriti podatke, a onda te kontaktirati ako zadovoljavaš kriterije. Prijave bez fotografije i svih podataka se automatski odbijaju.') }}
            @endif
        </div>
    </div>
</div>
