@extends("layoutforcustomer.extension")

@section("content")
<div class="app-content">

<!--====== Section 1 ======-->
<div class="u-s-p-y-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="breadcrumb">
                <div class="breadcrumb__wrap">
                    <ul class="breadcrumb__list">
                        <li class="has-separator">

                            <a href="{{ route('customer#homepage') }}">Home</a></li>
                        <li class="is-marked">

                            <a href="{{ route('customer#contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Section 1 ======-->




<!--====== Section 3 ======-->
<div class="u-s-p-b-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 u-s-m-b-30">
                    <div class="contact-o u-h-100">
                        <div class="contact-o__wrap">
                            <div class="contact-o__icon"><i class="fas fa-phone-volume"></i></div>

                            <span class="contact-o__info-text-1">LET'S HAVE A CALL</span>

                            <span class="contact-o__info-text-2">(+0) 900 901 904</span>

                            <span class="contact-o__info-text-2">(+0) 900 901 902</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 u-s-m-b-30">
                    <div class="contact-o u-h-100">
                        <div class="contact-o__wrap">
                            <div class="contact-o__icon"><i class="fas fa-map-marker-alt"></i></div>

                            <span class="contact-o__info-text-1">OUR LOCATION</span>

                            <span class="contact-o__info-text-2">4247 Ashford Drive VA-20006</span>

                            <span class="contact-o__info-text-2">Virginia US</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 u-s-m-b-30">
                    <div class="contact-o u-h-100">
                        <div class="contact-o__wrap">
                            <div class="contact-o__icon"><i class="far fa-clock"></i></div>

                            <span class="contact-o__info-text-1">WORK TIME</span>

                            <span class="contact-o__info-text-2">5 Days a Week</span>

                            <span class="contact-o__info-text-2">From 9 AM to 7 PM</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 3 ======-->

<section class="container">
    <div class="row">
        <div class="col-6">
            <img class="img-fluid" src="{{ asset('contact22.jpeg') }}" alt="">
        </div>
        <div class="col-6">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos, nesciunt fugit nulla sunt commodi non ut! Vel iste asperiores repellendus blanditiis! Debitis culpa consectetur quod qui repellendus fugiat temporibus sit?
            Fugiat expedita ea itaque quo, nisi nostrum! Illum maiores quo illo numquam. Repellendus ducimus quam dolore incidunt error voluptates nemo laborum quia. Recusandae repudiandae deleniti, aliquid officia veniam minus omnis.
            Beatae distinctio voluptas rerum mollitia, incidunt necessitatibus. Eius non ratione voluptas soluta nesciunt aut assumenda corporis exercitationem id voluptatum, quisquam tempore itaque rerum saepe beatae doloremque atque commodi voluptates magni.
            Odit nulla facere, officiis ex cumque natus vel necessitatibus dolores sequi, recusandae qui quasi adipisci deleniti accusantium corporis repellat voluptatibus. Nemo praesentium laborum, quae accusantium exercitationem obcaecati officiis soluta provident.
            Beatae esse sint at cum eius dolorem numquam tempora, eum obcaecati, ducimus voluptatem repellendus delectus ipsam blanditiis consectetur, est dolores quod non asperiores accusamus inventore quisquam deserunt odio. Impedit, ab?
            Beatae esse sint at cum eius dolorem numquam tempora, eum obcaecati, ducimus voluptatem repellendus delectus ipsam blanditiis consectetur, est dolores quod non asperiores accusamus inventore quisquam deserunt odio. Impedit, ab?
            Fugit illum asperiores corporis et molestias! Praesentium voluptatum voluptates quibusdam exercitationem ipsa. Explicabo, eaque, recusandae doloremque consequatur quaerat quam aliquam rerum tempora totam, provident sint ipsum libero repellendus sunt porro!</p>
        </div>
    </div>
</section>
<!--====== Section 4 ======-->
<div class="u-s-p-b-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-area u-h-100">
                        <div class="contact-area__heading">
                            <h2>Get In Touch</h2>
                        </div>
                        <form class="contact-f" method="post" action="{{ route('customer#contactdata') }}">
                          @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 u-h-100">
                                    <div class="u-s-m-b-30">

                                        <label for="c-name"></label>

                                        <input name="name" class="input-text input-text--border-radius input-text--primary-style" type="text" id="c-name" placeholder="Name (Required)" ></div>
                                        @error("name") <small class="text-danger"> {{ $message }}</small> @enderror
                                    <div class="u-s-m-b-30">

                              <label for="c-email"></label>

                                        <input name="email" class="input-text input-text--border-radius input-text--primary-style" type="text" id="c-email" placeholder="Email (Required)" ></div>
                                        @error("email") <small class="text-danger"> {{ $message }}</small> @enderror

                                    <div class="u-s-m-b-30">

                                        <label for="c-subject"></label>

                                        <input name="subject" class="input-text input-text--border-radius input-text--primary-style" type="text" id="c-subject" placeholder="Subject (Required)" ></div>
                                        @error("subject") <small class="text-danger"> {{ $message }}</small> @enderror

                                </div>
                                <div class="col-lg-6 col-md-6 u-h-100">
                                    <div class="u-s-m-b-30">

                                        <label for="c-message"></label><textarea name="message" class="text-area text-area--border-radius text-area--primary-style" id="c-message" placeholder="Compose a Message (Required)" ></textarea></div>
                                        @error("message") <small class="text-danger"> {{ $message }}</small> @enderror

                                </div>
                                <div class="col-lg-12">

                                    <button class="btn btn--e-brand-b-2" type="submit">Send Message</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 4 ======-->
</div>
@endsection