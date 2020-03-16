<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#03a6f3">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../owl.carousel.min.css">
        <link rel="stylesheet" type="text/css" href="../styles.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
    </head>
    <body>
        <main>
            <section class = "author-sec">
                <div class="container">
                    <div class="slider-content">
                            <h1>author.Name</h1>
                             <!-- Author Picture -->
                             <div class="author-picture">
                                <img src = = author.Picture  > width="300" height="400" title="" />
                            </div>
                            <!-- Author-Bio -->
                            <div class="author-bio">
                                <p class="bio light"> author.Bio</p>
                            </div>
                            <ul>
                                <li>
                                     <!-- Author-Born -->
                                      (author.Born)
                                        <div class="author-born">
                                            <span class="born lead" >Born In</span><span class="tab light">:</span>
                                            <span class="born light">=author.Born</span>
                                        </div>

                                </li>
                                <li>
                                    <!-- Author-Website -->
                                     (author.Website)
                                        <div class="author-website">
                                            <span class="born lead" >Website</span><span class="tab light">:</span>
                                            <span class="born light"><a href="= author.Website  >">= author.Website  > </a></span>
                                        </div>

                                </li>
                                <li>
                                    <!-- Author-Genre -->
                                     (author.Genre)
                                        <div class="author-genre">
                                            <span class="born lead" >Genre</span><span class="tab light">:</span>
                                            <span class="born light"> = author.Genre  ></span>
                                        </div>

                                </li>
                                <li>
                                    <!-- Author-Genre -->
                                     (author.Influences)
                                        <div class="author-influences">
                                            <span class="born lead" >Influences</span><span class="tab light">:</span>
                                            <span class="born light">= author.Influences  ></span>
                                        </div>

                                </li>
                                <li>
                                     <!-- Author-Twitter -->
                                     (author.Twitter)
                                        <div class="author-twitter">
                                            <a target="_blank" href="= author.Twitter  >"><img src="https://c866088.ssl.cf3.rackcdn.com/assets/twitter30x30.png" border=0></a>
                                        </div>

                                </li>
                            </ul>

                    </div>
                </div>
            </section>
            <section class="related-books">
                <div class="container">
                     author.forEach(author
                        <h2>Books by = author.Name  ></h2>
                    <div class="recomended-sec">
                            <div class="row">
                                 book.forEach(book
                                    <div class="col-lg-3 col-md-6">
                                        <div class="item">
                                            <!-- <img src = = book.Cover  > width="141" height="218" title="" /> -->
                                            <h3>= book.Title  ></h3>
                                            <h6><span class="price">$= book.Price  ></span></h6>
                                            <div class="hover">
                                                <a href="/bookDetails/=book._id >">
                                                    <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>
