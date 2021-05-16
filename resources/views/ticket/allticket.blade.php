@extends('layoutcity')


@section('city')





<section class="parallax-window" data-parallax="scroll" data-image-src="{{asset("uploads/1.jpg")}}" data-natural-width="1400" data-natural-height="470">
    <div class="parallax-content-1">
			<div class="animated fadeInDown">
				<h1>التذاكر</h1>
			</div>
		</div>
	</section>
	<!-- End section -->





	<main>

		<div id="position">
			<div class="container">
				<ul>
					<li><a href="/">Home</a>
					</li>

					<li>Page active</li>
				</ul>
			</div>
		</div>
		<!-- Position -->

		<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		<!-- End Map -->

		<div class="container margin_60">
			<div class="row">


				<div class="col-lg-12">


                    <div class="isotope-wrapper">
                    <div class="row">
                        @foreach ($Setting as$Settin )

                        @foreach ($Ticket as $Tick)

                        <div class="col-md-4 isotope-item lower_price">
                            <div class="transfer_container">
                                <div class="ribbon_3 popular"><span>Popular</span>
                                </div>
                                <div class="img_container">
                                    <a href="{{url("Ticket/show/{$Tick->id}")}}">
                                        <img src="{{asset("uploads/$Tick->image")}}" width="800" height="533" class="img-fluid" alt="Image">
                                        <div class="short_info">
                                            {{$Tick->city->name}} / {{$Tick->category->name}}<span class="price"><sup>$</sup>



                                                <?php



                                                   $one =  $Tick->price;
                                                    $asd=$Settin->vat_rate;
                                                   $two = $Tick->price_without_vat ;
                                                   $tax = $asd / 100 ;

                                                    $result= $tax *  $two;
                                                    $result2 = $result + $two;
                                                    echo $result2;
                                                  ?>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="transfer_title">
                                    <h3><strong>   {{$Tick->name}}</strong> </h3>
                                    <div class="rating">
                                        <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><small>({{$Tick->qty}})</small>
                                    </div>
                                    <!-- end rating -->


                                    <a href="{{url("Ticket/show/{$Tick->id}")}}">

                                    <div class="wishlist">
                                    </div>

                                   </a>
                                    <!-- End wish list-->
                                </div>
                            </div>
                            <!-- End box tour -->
                        </div>
                        <!-- End col-md-6 -->
                        @endforeach
                        @endforeach

                    </div>
                    <!-- End row -->

                    </div>
                    <!-- End isotope-wrapper -->

                    <hr>

                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><span class="page-link">1<span class="sr-only">(current)</span></span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- end pagination-->

                </div>
                <!-- End col lg 9 -->
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</main>
	<!-- End main -->






@endsection
