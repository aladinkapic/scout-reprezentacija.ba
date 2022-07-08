<header>
    <div class="menu-wrapper">
        <div class="mw-logo">
            <a href="{{ route('homepage') }}">
                <img src="/images/menu/logo.png" />
            </a>
        </div>

        <div class="mobile-burger">
            <div class="fas fa-bars"></div>
        </div>

        <div class="mw-links">
            <div class="single-link">
                <a href=""> {{ __('Naslovna') }} </a>
            </div>
            <div class="single-link">
                <a href=""> {{ __('Igrači') }} </a>
            </div>
            <div class="single-link">
                <a href=""> {{ __('Prijavite se') }} </a>
            </div>
        </div>
    </div>
</header>

<div class="mobile-menu">
    <div class="mm-header">
        <i class="fas fa-times"></i>
    </div>

    <div class="mm-body">
        <div class="single-link">
            <a href=""> {{ __('Naslovna') }} </a>
        </div>
        <div class="single-link">
            <a href=""> {{ __('Igrači') }} </a>
        </div>
        <div class="single-link">
            <a href=""> {{ __('Prijavite se') }} </a>
        </div>
    </div>

    <div class="mm-footer">
        <a href="#">
            <i class="icon ion-social-instagram"></i> <ion-icon name="star"></ion-icon>
        </a>
        <a href="#">
            <i class="icon ion-social-snapchat"></i>
        </a>
        <a href="#">
            <i class="icon ion-social-twitter"></i>
        </a>
        <a href="#">
            <i class="icon ion-social-facebook"></i>
        </a>
    </div>
</div>
