<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="css/bookstyles.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../bookdetailcss.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900" rel="stylesheet">
        <title>book.Title | Geek Text</title>
    </head>

    <body>
      <section class="title">
          <main>
            <!-- Nav Bar -->
            <nav class="navbar header navbar-expand-lg navbar-dark">

              <a class="navbar-brand" href="">Geek Text</a>

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="">Cart</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="">Sign Up</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="">Login</a>
                  </li>
                </ul>
              </div>
            </nav>
      </section>

            <section class="product-sec">
                    <div class="container">
                        <h1>Book Title</h1>
                        <!-- Beginning of the book detail -->
                        <div class="row">
                            <div class="col-md-6 slider-sec">
                                <div id="myCarousel" class="carousel slide">
                                    <div class="carousel-inner">
                                        <div class="active item carousel-item" data-slide-number="0">
                                            <div class="book">
                                                <!-- Book cover -->
                                                <div class="product-cover">
                                                    <img id = "myImg" src = <%= book.Cover %> width="333" height="500" title="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- The Modal -->
                                <div id="myModal" class="modal">
                                        <span class="close">&times;</span>
                                        <img class="modal-content" id="img01">
                                        <div id="caption"></div>
                                    </div>
                            </div>
                            <div class="col-md-6 slider-content">
                                <!-- main table -->
                                <!-- Book Description -->
                                <div class="product-description">
                                    <p class="description"><%= book.Description %></p>
                                </div>
                                <ul>
                                    <li>
                                        <!-- Book Author -->
                                        <span class="name">Author</span><span class="clm">:</span>
                                        <span class="tab"><a href="authordetails.php"><%= book.Author %></a></span>
                                    </li>
                                    <li>
                                        <!-- Book Publisher -->
                                        <span class="name">Publisher</span><span class="clm">:</span>
                                        <span class="tab"><%= book.Publisher %></span>
                                    </li>
                                    <li>
                                        <!-- Book ISBN -->
                                        <span class="name">ISBN</span><span class="clm">:</span>
                                        <span class="tab"> <%= book.ISBN %></span>
                                    </li>
                                    <li>
                                        <!-- Book Genre -->
                                        <span class="name">Genre</span><span class="clm">:</span>
                                        <span class="tab"> <%= book.Genre %></span>

                                    </li>
                                    <li>
                                        <!-- Book AvgReview -->
                                        <span class="name">Avg. Rating</span><span class="clm">:</span>
                                        <!-- <%if(reviews.length == 0){%>
                                            <span class="tab">N/A</span>
                                        <%} else {%>
                                            <% var count = 0; %>
                                            <% var average = 0; %>
                                            <% var sum = 0; %>
                                            <% reviews.forEach(review => {%>

                                                <% count = count + 1; %>
                                                <%for (i = 0; i < review.Rating; i++){%>
                                                    <% sum = sum + 1; %>
                                                <%}%>
                                            <% })%>

                                            <% average = sum / count; %>
                                            <%for (i = 0; i < average; i++){%>
                                                <span class="fa fa-star checked tab"></span>
                                            <%}%>
                                            <%for (i = 0; i < Math.floor(5 - average); i++){%>
                                                <span class="fa fa-star tab" ></span>
                                            <%}%>
                                        <% }%> -->

                                    </li>
                                    <li>
                                        <!-- Book Publication Date -->
                                        <span class="name">Published On</span><span class="clm">:</span>
                                        <span class="tab"><%= book.PublicationDate %></span>

                                    </li>
                                    <li>
                                        <!-- Book price -->

                                        <span class="name">Price</span><span class="clm">:</span>
                                        <span class="tab final">$<%= book.Price %></span>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
            </section>
        </main>
        <footer class="footer">

        </footer>
    </body>
</html>
