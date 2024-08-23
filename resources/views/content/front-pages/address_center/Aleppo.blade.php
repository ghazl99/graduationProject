<style>
    :root {
        --main-color: #696cff;
        --main-color-alt: #1787e0;
        --main-trans: 0.3s;
        --main-padd: 100px;
    }

/* title mian */
.main-title{
    text-align: center;
    margin: 40px 0 60px 0;
    position: relative;
}
.main-title::after{
    position: absolute;
    content: '';
    width: 70px;
    height: 5px;
    background: #696cff;
    bottom: -20px;
    left: 50%;
    transform: translateX(-50%);
}
/* enquiry */
.services {
    /* padding-top: var(--main-padd);*/
    padding-bottom: var(--main-padd);
    position: relative;
    /* width: 100%; */
    /* background-color: #ececec; */
}
.services .container1 {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
    gap: 40px;
    margin: 100px 200px 0px 200px ;
}

.services .box {
    box-shadow: 0 12px 20px 0 rgba(0, 0, 0, 0.13), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
    counter-increment: services;
    transition: var(--main-trans);
    position: relative;
}

.services .box::before {
    content: '';
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    height: 3px;
    top: -3px;
    background-color: var(--main-color);
    width: 0;
    transition: var(--main-trans);
}

.services .box:hover {
    transform: translateY(-10px);
}

.services .box:hover::before {
    width: 100%;
}

.services .box>i {
    margin: 40px auto 20px;
    display: block;
    text-align: center;
}

.services .box>h3 {
    text-align: center;
    margin: 20px 0 40px;
    font-size: 25px;
    color: var(--main-color);
}

.services .box .info {
    padding: 15px;
    position: relative;
    text-align: right;
}

.services .box .info a {
    color: var(--main-color);
}
.services .box:hover .info::before{
  color: white;
}

.services .box .info::before {
    content: '0' counter(services);
    position: absolute;
    background-color: #e7e7ff;
    color: #696cff;
    left: 0;
    top: 0;
    height: 100%;
    width: 100px;
    font-size: 30px;
    font-weight: bold;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-right: 15px;
    transition: var(--main-trans);
}
.services .box:hover .info::before {
    background: var(--main-color);
}
.services .box .info::after {
    content: '';
    position: absolute;
    background-color: #B6BBC4;
    top: 0;
    left: 80px;
    width: 50px;
    height: calc(100% + 0.4px);
    transform: skewX(-30deg);
}
.services .box i{
  transition: var(--main-trans);
}
.services .box:hover i{
  color: #696cff;
}
.services .box .info::before {
    content: '0' counter(services);
    position: absolute;
    background-color: #9798b7;
    color: #c8cdd6;
    left: 0;
    top: 0;
    height: 100%;
    width: 100px;
    font-size: 30px;
    font-weight: bold;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-right: 15px;
    transition: var(--main-trans);
}
@media(max-width:768px) {
  .services .container1{
      margin: 0 50px 0 50px;
    }
}
@media(max-width:450px) {
    .services .container1{
      margin: 0;
    }
}
    /* @media(max-width:768px) {
      .item .container1 .box::before,
    .item .container1 .box::after {
        content: '';
        position: absolute;
        background-color: #f3f3f3;
        right: 0;
        top: 0;
        height: 450px;
        border-radius: 10px;
        transition: var(--main-trans);
    }
    } */
    /* hero */
    .heroImge{
        /* margin-top: 100px; */
        width: 100%;
        height: 80vh;
      }
      .heroDiv{
        width: 100%;
        height: 100%;
        position: relative;
      }
      .heroDiv h1{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(-50%);
        color: white;
        z-index: 9;
        font-size: 56px
      }
      .heroImge .heroDiv::before{
        position: absolute;
        content: '';
        width: 100%;
        height: 100%;
        background: #696cff;
        opacity: 0.4;
        top: 0;
        z-index: 5;
      }
      .heroImge img{
        width: 100%;
        height: 100%;
      }
    </style>

    <section class="heroImge">
      <div class="heroDiv">
        <img src="{{asset('assets/img/front-pages/landing-page/truck3.jpg')}}" alt="">
        <h1> حلب</h1>
      </div>
  <section id="landingReviews" class="section-py bg-body landing-reviews pb-0">

      <div class="services" id="services">
        <h2 class="main-title ">المراكز</h2>
        <div class="container1">

          <div class="box">
              <i class="bx bxs-file bx-lg me-2"></i>
              <h3>الجميلية</h3>
              <div class="info">
                {{-- <a href="{{ Route('categories') }}">تفاصيل</a> --}}
              </div>
          </div>
          <div class="box">
            <i class="bx bxs-map-pin bx-lg me-2"></i>
            <h3>الفرقان</h3>
            <div class="info">
              {{-- <a href="{{ Route('fletmap-page') }}">تفاصيل</a> --}}
            </div>
         </div>
          <div class="box">
              <i class="bx bxs-map bx-lg me-2"></i>
              <h3>الشهباء</h3>
              <div class="info">
                  {{-- <a  href="{{ Route('address-page') }}">تفاصيل</a> --}}
              </div>
          </div>
          <div class="box">
            <i class="bx bxs-map bx-lg me-2"></i>
            <h3>حمدانية</h3>
            <div class="info">
                {{-- <a  href="{{ Route('address-page') }}">تفاصيل</a> --}}
            </div>
        </div>
        </div>
      </div>
  </section>
    </section>
