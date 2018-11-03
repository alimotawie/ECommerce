@extends('layouts.header-footer')

@section('title' , 'Contact US' )

@section('content')

    <!-- Content
		============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <!-- Contact Info
         ============================================= -->
                <div class="row bottommargin-sm">

                    <div class="col-md-6 col-sm-6 bottommargin clearfix">
                        <div class="feature-box fbox-center fbox-bg fbox-plain">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-map-marker2"></i></a>
                            </div>
                            <h3>Our Headquarters<span class="subtitle">Melbourne, Australia</span></h3>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 bottommargin clearfix">
                        <div class="feature-box fbox-center fbox-bg fbox-plain">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-phone3"></i></a>
                            </div>
                            <h3>Speak to Us<span class="subtitle">(123) 456 7890</span></h3>
                        </div>
                    </div>


                </div><!-- Contact Info End -->

                <!-- Contact Form
                ============================================= -->

                <div class="col_half col-lg-offset-3 ">

                    <div class="fancy-title title-dotted-border col-lg-offset-3">
                        <h3>Send us an Email</h3>
                    </div>

                    <div class="contact-widget" data-alert-type="inline">

                        <div class="contact-form-result"></div>

                        <form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail.php" method="post">

                            <div class="form-process"></div>

                            <div class="col_one_third">
                                <label for="template-contactform-name">Name <small>*</small></label>
                                <input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required" />
                            </div>

                            <div class="col_one_third">
                                <label for="template-contactform-email">Email <small>*</small></label>
                                <input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control" />
                            </div>

                            <div class="col_one_third col_last">
                                <label for="template-contactform-phone">Phone</label>
                                <input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control" />
                            </div>

                            <div class="clear"></div>

                            <div class="col_full">
                                <label for="template-contactform-subject">Subject <small>*</small></label>
                                <input type="text" id="template-contactform-subject" name="template-contactform-subject" value="" class="required sm-form-control" />
                            </div>


                            <div class="clear"></div>

                            <div class="col_full">
                                <label for="template-contactform-message">Message <small>*</small></label>
                                <textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
                            </div>

                            <div class="col_full hidden">
                                <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                            </div>

                            <div class="col_full">
                                <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d nomargin">Submit Comment</button>
                            </div>

                        </form>
                    </div>

                </div><!-- Contact Form End -->


            </div>

        </div>

    </section><!-- #content end -->


@endsection