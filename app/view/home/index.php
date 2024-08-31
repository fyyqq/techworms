<style>
    #header {
        height: 100vh;
    }
    #header div {
        width: 50%;
    }
    #header div .btn {
        background-color: royalblue;
        letter-spacing: 1px;
        padding: 10px 30px;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
        transition: box-shadow .2s ease-in-out;
        border: unset;
    }
    #header div .btn:hover {
        box-shadow: unset;
    }
    #header div h1 {
        font-size: 55px;
        letter-spacing: 5px;
        font-weight: bold;
    }
    #header div p {
        font-size: 18px;
        letter-spacing: 1px;
    }
    
    /* Media Size */
    @media (max-width: 992px) {
        #header div {
            width: 100%;
        }
        #header div h1 {
            font-weight: bold;
            font-size: 45px;
        }
        #header div p {
            font-size: 17px;
        }
    }

    @media (max-width: 768px) {
        #header div h1 {
            font-weight: bold;
            font-size: 35px;
        }
        #header div p {
            font-size: 16px;
        }
    }
</style>
<div class="" style="background: url('../app/public/img/wp.jpg'); background-size: cover; background-position: unset; background-repeat: no-repeat;">
    <header id="header" class="container-sm d-flex align-items-center justify-content-lg-start justify-content-center">
        <div class="d-flex align-items-start justify-content-center flex-column px-md-0 px-4">
            <h1 class="text-light text-uppercase lh-sm">Top Web Design Agency
            We Grow Brands Online</h1>
            <p class="text-light">Custom Websites, Branding & Digital Marketing Solutions</p>
            <a href="<?= BASE_URL ?>/about" class="btn rounded-pill text-light fw-bold mt-3">About Us</a>
        </div>
    </header>
</div>