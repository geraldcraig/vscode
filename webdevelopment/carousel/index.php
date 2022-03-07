<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="customer.css" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        $('#recipeCarousel').carousel({
  interval: 10000
})

$('.carousel .carousel-item').each(function(){
    var minPerSlide = 4;
    var next = $(this).next();
    if (!next.length) {
    next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
    
    for (var i=0;i<minPerSlide;i++) {
        next=next.next();
        if (!next.length) {
        	next = $(this).siblings(':first');
      	}
        
        next.children(':first-child').clone().appendTo($(this));
      }
});

    </script>
</head>



<body>
<div class="container text-center my-3">
    <h2 class="font-weight-light">Bootstrap 4 Multi Item Carousel</h2>
    <div class="row mx-auto my-auto">
        <div id="recipeCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner " role="listbox">
                <div class="carousel-item active">
                    <div class="col-lg-2 col-md-6">
                        <div class="movie-card m-1"> 
            						<div class="movie-img">
            							<a href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT9i-t0o_ltZf_c5ZQ4F4kbuETdhNDdxsjIYKaofkjTM3BmHTqc" class="img-fluid"></a>
            						</div>
            						<div class="movie-title">
            						<a href="#"><p class="text-white text-sm-center font-small flex-center">IRON MAN 2</p></a>
            					</div>
            				</div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-lg-2 col-md-6">
                       
            <div class="movie-card m-1"> 
						<div class="movie-img">
							<a href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT9i-t0o_ltZf_c5ZQ4F4kbuETdhNDdxsjIYKaofkjTM3BmHTqc" class="img-fluid"></a>
						</div>
						<div class="movie-title">
						<a href="#"><p class="text-white text-sm-center font-small flex-center">IRON MAN 2</p></a>
					</div>
				</div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-lg-2 col-md-6">
            <div class="movie-card m-1"> 
						<div class="movie-img">
							<a href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT9i-t0o_ltZf_c5ZQ4F4kbuETdhNDdxsjIYKaofkjTM3BmHTqc" class="img-fluid"></a>
						</div>
						<div class="movie-title">
						<a href="#"><p class="text-white text-sm-center font-small flex-center">IRON MAN 2</p></a>
					</div>
				</div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-lg-2 col-md-6">
                      
            <div class="movie-card m-1"> 
						<div class="movie-img">
							<a href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT9i-t0o_ltZf_c5ZQ4F4kbuETdhNDdxsjIYKaofkjTM3BmHTqc" class="img-fluid"></a>
						</div>
						<div class="movie-title">
						<a href="#"><p class="text-white text-sm-center font-small flex-center">IRON MAN 2</p></a>
					</div>
				</div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-lg-2 col-md-6">
                    
            <div class="movie-card m-1"> 
						<div class="movie-img">
							<a href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT9i-t0o_ltZf_c5ZQ4F4kbuETdhNDdxsjIYKaofkjTM3BmHTqc" class="img-fluid"></a>
						</div>
						<div class="movie-title">
						<a href="#"><p class="text-white text-sm-center font-small flex-center">IRON MAN 2</p></a>
					</div>
				</div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-lg-2 col-md-6">
                       
            <div class="movie-card m-1"> 
						<div class="movie-img">
							<a href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT9i-t0o_ltZf_c5ZQ4F4kbuETdhNDdxsjIYKaofkjTM3BmHTqc" class="img-fluid"></a>
						</div>
						<div class="movie-title">
						<a href="#"><p class="text-white text-sm-center font-small flex-center">IRON MAN 2</p></a>
					</div>
				</div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev bg-dark w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next bg-dark w-auto" href="#recipeCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <h5 class="mt-2">Advances one slide at a time</h5>
</div>




</body>
</html>