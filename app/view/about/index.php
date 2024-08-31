<style>
    #header_about {
        height: 100vh;
    }
    #header_about .row .col-lg-6 #title {
        letter-spacing: 2px; 
        line-height: 55px;
        font-size: 45px;
    }
    #header_about .row {
        margin-top: 0px;
    }
    @media (max-width: 992px) {
        #header_about .row .col-lg-6 #title {
            font-size: 40px;
            line-height: 45px;
        }
        #header_about .row {
            margin-top: 120px;
        }
    }
    @media (max-width: 768px) {
        #header_about .row {
            margin-top: 50px;
        }
        #header_about .row .col-lg-6 #title {
            font-size: 25px;
            letter-spacing: 1px; 
            line-height: unset;
        }
    }
</style>

<div class="" style="background: url('../app/public/img/wp.jpg'); background-size: cover; background-position: unset; background-repeat: no-repeat;">
    <header id="header_about" class="container-sm d-flex align-items-center justify-content-lg-start justify-content-center">
        <div class="row mx-0">
            <div class="col-lg-6 col-12 d-flex align-items-center justify-content-start pt-4 flex-column order-2 order-lg-1">
                <h1 class="text-light text-uppercase" id="title">We Design Impactful Digital Product</h1>
                <div class="mt-lg-4 mt-2">
                    <p class="mb-0 text-light" style="letter-spacing: 1px;">At Techworms, we combine creativity with technology to design web solutions that are not only visually appealing, but also deliver exceptional user experiences. With a dedication to understanding each client's unique needs, we deliver designs that reflect your brand personality and optimize functionality for optimal results. From the initial idea to the end, we are experienced and dedicated to making each project a digital work of art that tells your story in the most effective and engaging way.</p>
                </div>
            </div>
            <div class="col-lg-6 col-12 order-1 order-lg-2">
                <div class="rounded-3" style="overflow: hidden;">
                    <img src="../app/public/img/about_wp.png" alt="" class="w-100 h-100">
                </div>
            </div>
        </div>
    </header>
</div>