@extends('template_client_erit')
@section('content')

<!-- SECTION -->
<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
					@foreach($produits as $article)	
					<div class="product-preview">
								<img src="/img/{{$article->image}}" alt="">
					</div>
					@endforeach
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
						@foreach($produits as $article)
							<div class="product-preview">
								<img src="/img/{{$article->image}}" alt="">
							</div>
						@endforeach
						</div>
					</div>
					<!-- /Product thumb imgs -->

					@foreach($produits as $article)
					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{$article->nom}}</h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link" href="#">10 Review(s) | Add your review</a>
							</div>
							<div>
								<h3 class="product-price">{{$article->prix}}</h3>
								<span class="product-available">{{$article->quantite}} In Stock</span>
							
							</div>
							
							<div class="product-options">
								<label>
									Size
									<select class="input-select">
										<option value="0">default</option>
									</select>
								</label>
								<label>
									Color
									<select class="input-select">
										<option value="0">default</option>
									</select>
								</label>
							</div>

							<div class="add-to-cart">
								<div class="qty-label">
									Qty
									<div  class="input-number">
										<input type="number" id="1" value="1">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
								<form method="POST" action="{{url('ajouter_panier')}}" enctype="multipart/form-data">
												@csrf
											<div class="add-to-cart">
												<input type="hidden" name="quantite" value="1">
												<input type="hidden" name="id" value="{{$article->id}}">
												<button class="add-to-cart-btn" type="submit"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
								</form>		
								</div>

						

							<!--@foreach($produits_m_categ as $categorie)
							<ul class="product-links">
								<li>Category:</li>
								<li><a href="#">{{$categorie->nom}}</a></li>
							</ul>
							@endforeach
							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					 /Product details -->
					@endforeach

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							

							<!-- product tab content -->
							<div class="tab-content">
								

								

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
										
										
										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
												<form class="review-form">
													<input class="input" type="text" placeholder="Your Name">
													<input class="input" type="email" placeholder="Your Email">
													<textarea class="input" placeholder="Your Review"></textarea>
													<div class="input-rating">
														<span>Your Rating: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
														</div>
													</div>
													<button class="primary-btn">Submit</button>
												</form>
											</div>
										</div>
										<!-- /Review Form -->
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Related Products</h3>
						</div>
					</div>

					@foreach($produits_m_categ as $article)
					<!-- product -->
					<div class="col-md-3 col-xs-6">
						
						<div class="product">
							<div class="product-img">
								<img src="/img/{{$article->image}}" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">{{ $article->nom}}</p>
								<h3 class="product-name"><a href="#">{{$article->nom}}</a></h3>
								<h4 class="product-price">{{$article->prix}} </h4>
								<div class="product-rating">
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
									
        <a class="quick-view" href="{{ route('produits.show', $article->id) }}"><i class="fa fa-eye"></i> <span class="tooltipp">quick view</span></a>
    								</div>
							</div>
							<form method="POST" action="{{url('ajouter_panier')}}" enctype="multipart/form-data">
								@csrf
								<div class="add-to-cart">
												<input type="hidden" name="quantite" value="1">
												<input type="hidden" name="id" value="{{$article->id}}">
												<button class="add-to-cart-btn" type="submit"><i class="fa fa-shopping-cart"></i> add to cart</button>
								</div>
											
							</form>
						</div>
					</div>
					<!-- /product -->
					@endforeach

					

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->
		@endsection
