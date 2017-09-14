@extends('layouts.main')

@section('title', '| Informacija')

@section('stylesheet')
    <link href="{{  url('css\parsley.css') }}" rel="stylesheet" type="text/css" media="all">
@endsection

@section('body_class', 'pm_dark_type single-post pm_overflow_visible background-info')

@section('content')
    <br>
    <!-- Content -->
    <div class="pm_wrapper pm_container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-10 col-md-offset-1">
                <div class="pm_standard_output_cont">
                    <div class="pm_media_output_cont">
                        <div class="some_info-nav">
                            <div class="pm_slides_title_and_likes_container pm_slides_title_and_likes_container2">
                                <div class="pm_slide_likes_wrapper">
                                    <div class="pm_add_like_button like-post button-bg">
                                        <i class="pm_likes_icon fa fa-heart-o"></i>
                                        <span class="pm_likes_counter">0</span>
                                    </div>
                                </div>
                                <div class="pm_slide_likes_wrapper">
                                    <div class="pm_add_like_button comment-post button-bg">
                                        <i class="pm_likes_icon fa fa-comments"></i>
                                        <span class="pm_likes_counter">0</span>
                                    </div>
                                </div>
                                <div class="pm_slide_likes_wrapper">
                                    <div class="pm_slide_title_wrapper">Winter is Coming</div>
                                </div>
                            </div>
                            <br style="clear: both;"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 main-frame">
                    <div class="pm_content_standard">
                        <div class="row">
                            <div class="col-lg-8">
                                <img class="info-image" src="{{ url('img\clipart\blog\blog-standard.jpg') }}" alt="">
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="info-top">
                                    <div class="info-header">
                                        <h3 class="headline-small">
                                            Fallow Deer
                                            <span class="headline-lt"><br>LT: Danielius</span>
                                        </h3>

                                    </div>
                                    <div class="info-top-intro">
                                        <b>Veiklos žymės:</b>
                                        <ul>
                                            <li>Ragais nutrinti medžiai</li>
                                            <li>Nugraužti medelių kamienai, nukandžiotos šakelės</li>
                                            <li>Išminti takai</li>
                                            <li>Iškapstyti ar išgulėti žolėje guoliai</li>
                                            <li>Krūvelės išmatų</li>
                                            <li>Pėdos sniege, minkštoje žemėje</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-lg-12">

                                    <div id="accordion-group" data-accordion-group>
                                        <div class="accordion page-sections" data-accordion>
                                            <div class="acc-title" data-control>
                                                <i class="fa fa-paw fa-md"></i>
                                                Pagrindiniai duomenys
                                                <div class="acc-introduction">Sužinok apie gyvūno ūgį, svorį ir įpročius</div>
                                            </div>
                                            <div class="acc-container" data-content>
                                                <div class="acc-body">Yes, when buying an Ambassador watch you will have a three
                                                    year warranty that covers any manufacturing defects.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion page-sections" data-accordion>
                                            <div class="acc-title" data-control>
                                                <i class="fa fa-tree fa-md"></i>
                                                Rezervatai
                                                <div class="acc-introduction">Sužinok kur galima rasti šį gyvūną</div>
                                            </div>
                                            <div class="acc-container" data-content>
                                                <div class="acc-body">Yes, when buying an Ambassador watch you will have a three
                                                    year warranty that covers any manufacturing defects.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion page-sections" data-accordion>
                                            <div class="acc-title" data-control>
                                                <i class="fa fa-info-circle fa-md"></i>
                                                Faktai ir įdomybės
                                                <div class="acc-introduction">Naudinga info medžiotojui</div>
                                            </div>
                                            <div class="acc-container" data-content>
                                                <div class="acc-body col-lg-12">
                                                    <div>
                                                    Kadangi Lietuvoje laisvėje gyvena negausiai, ši rūšis didesnės įtakos miško
                                                    ir laukų ekosistemoms nedaro. <br>
                                                    Iš numestų ragų gaminami papuošalai, sagės, peilių kotai, dekoratyviniai
                                                    baldai.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div id="accordion-group" data-accordion-group>
                            <div class="accordion" data-accordion>
                                <div class="acc-title" data-control>
                                    <span>1.</span>
                                    Does your watch come with a warranty?
                                </div>
                                <div class="acc-container" data-content>
                                    <div class="acc-body">Yes, when buying an Ambassador watch you will have a three
                                        year warranty that covers any manufacturing defects.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion" data-accordion>
                                <div class="acc-title" data-control>
                                    <span>2.</span>
                                    Are your watches waterproof?
                                </div>
                                <div class="acc-container" data-content>
                                    <div class="acc-body">Yes. Our watches are waterproof up to 3ATM.</div>
                                </div>
                            </div>
                        </div>

                        <div class="post-more-main">
                            <div class="post-more-wrapper">
                                <img class="post-more-image" src="img\clipart\blog\thumbs\blog09.jpg" width="150"/>
                                <div class="post-more-title"><b>Patarimas:</b> Kaip prisėlinti gyvuną</div>
                                <div class="post-more-text">Turite eiti labai tyliai ir nekelti jokio triukšmo<br>
                                    Venkite aukštų krūmų ir atviro lauko. Kad jūsų nepamatytų.
                                </div>
                            </div>
                        </div>

                        <div class="post-more-main post-more-simple-main">
                            <div class="post-more-wrapper">
                                <div class="post-more-title"><b>Patarimas:</b> Kaip prisėlinti gyvuną</div>
                                <div class="post-more-text">Turite eiti labai tyliai ir nekelti jokio triukšmo<br>
                                    Venkite aukštų krūmų ir atviro lauko. Kad jūsų nepamatytų.
                                </div>
                            </div>
                            <div class="post-more-info">
                                <img class="post-more-simple-avatar" src="img\clipart\avatar-1.jpg" alt="">
                            </div>
                        </div>

                        <br style="clear: both;"/>




                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-top: 20px;">
                                <div class="video-box youtube-img col-md-10 col-lg-6">
                                    <div class="youtube-play">
                                        <img src="img/video/youtube-play.png" class="img-responsive intro-img2"
                                             style="padding-top: 10px;" alt="TheHunter:Call of the Wild youtube video">
                                    </div>
                                    <img src="img/video/hirschfelden-video.jpg" class="img-responsive youtube-border"
                                         data-video="http://www.youtube-nocookie.com/embed/Exc2b_AZJ7U?&amp;autoplay=1&amp;rel=0&amp;fs=1&amp;showinfo=0&amp;autohide=3&amp;modestbranding=1">
                                    <h5>Hirschfelden (video pristatymas)</h5>
                                </div>

                            </div>
                        </div>

                        <br style="clear: both;"/>


                    </div>
                    <hr>

                    <div class="pm_post_comments_standard pm_simple_layout">
                        <div id="comments">
                            <div class="pm_comments_wrapper">
                                <ul class="pm_comments_list">

                                    <li class="comment">
                                        <div class="pm_comment_container">
                                            <div class="pm_comment_wrapper">
                                                <div class="pm_comment_avatar">
                                                    <img class="avatar" src="img\clipart\avatar-1.jpg" alt="">
                                                </div>
                                                <div class="pm_comment_info">
                                                    <span class="pm_comment_author">Amy K.</span>
                                                    <span class="pm_comment_date">January 18, 2016</span>
                                                </div>
                                                <div class="pm_comment_text">
                                                    <p>Wow! So creative and unique theme!</p>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </li>

                                    <li class="comment">
                                        <div class="pm_comment_container">
                                            <div class="pm_comment_wrapper">
                                                <div class="pm_comment_avatar">
                                                    <img class="avatar" src="img\clipart\avatar-2.jpg" alt="">
                                                </div>
                                                <div class="pm_comment_info">
                                                    <span class="pm_comment_author">Steve</span>
                                                    <span class="pm_comment_date">January 18, 2016</span>
                                                </div>
                                                <div class="pm_comment_text">
                                                    <p>Really amazing theme BY photographers FOR photographers!</p>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </li>

                                </ul>
                            </div><!-- pm_comments_wrapper -->

                            <div class="comment-respond">
                                <form id="forma" data-parsley-validate class="comment-form">
                                    <div class="pm_comment_input_wrapper">
                                        <textarea class="pm_comment_respond_field" name="comment"
                                                  placeholder="Parašyti komentarą: ..." rows="1" cols="45" required
                                                  minlength="5"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div><!-- comments -->
                    </div><!-- pm_post_comments_standard -->
                </div>
                <div class="btn-toolbar">
                    <div class="col-lg-2">
                        <button id="submit-button" type="submit"
                                class="pm_send_comment_button pm_load_more stilius_mygtukas">
                            <i class="pm_likes_icon fa fa-floppy-o fa-lg"></i>
                            <span class="pm_likes_counter"> Išsaugoti</span>
                        </button>
                    </div>
                    <div class="col-lg-1 offset-lg-9">
                        <button id="go-to-top" type="button"
                                class="pm_send_comment_button pm_load_more stilius_mygtukas">
                            <i class="pm_likes_icon fa fa-arrow-up fa-lg"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div><!-- pm_row -->
    </div><!-- pm_wrapper -->
@endsection

@section('script')
    {{--Postams priedai--}}
    <script type="text/javascript" src="{{  url('js\post-addon.js') }}"></script>

    {{--Tikrina ar suvestas tekstas teisingas--}}
    <script type="text/javascript" src="{{  url('js\parsley.js') }}"></script>
@endsection