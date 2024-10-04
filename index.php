<?php
    include('connection.php');
    $sql="select t.image,t.title,t.description,u.fname,u.lname from thought t,register_student u where t.user_id=u.id";
    $result=mysqli_query($conn,$sql);
     
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>book motion Library Services | Home</title>
    <link rel="stylesheet" href="style.css">
    <script src="./jquery/jquery.js"></script>
    <link rel="icon" href="projectimg/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .temp {
            position: sticky;
            top: 0;
            background-color: rgb(255, 255, 255);
            transition: 1s ease-in-out;
            height: 7vw;
            z-index: 1;
        }

        .white {
            color: rgba(0, 0, 0, 0.466);
        }

        .d2{
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body>
    <header>
        <div class="bname">
            book motion library services
        </div>
        <ul class="lin">
            <li><a href="index.php">Home</a></li>
            <li><a href="#abut">About</a></li>
            <li><a href="#blog">thought</a></li>
            <li><a href="#contact">contact us</a></li>
            <div class="dropdown">
                <li><a href="#">more</a></li>
                <div class="dropdown-manu d2" id="d2">
                    <li><a href="studentlogin.php">student log in</a></li>
                    <li><a href="registerstudent.php">student register</a></li>
                    <li><a href="adminlogin.php">admin log in</a></li>
                </div>
            </div>
        </ul>

        <div class="head-cont">
            <h2>explore your self to something new </h2>
            <span>providing access to information and resources, supporting literacy and education, promoting lifelong
                learning, and serving as a community gathering space</span>
        </div>
    </header>
    <main>
        <div class="about">
            <h1 id="abut" class="abt">ABOUT us</h1>
            <table>
                <tr>
                    <td><img src="projectimg/a.png" alt="" class="imga"></td>
                    <td>
                        <a href="#">Join the library</a>
                        <p>
                            Aat vero eros et accumsan et iusto odio dignissim qui blandit praesent luptaum zzelenit
                            augue
                            duis dolore te feugait nulla facilisi. Typi non habent claritatem insitam; est usus legentis
                            in
                        </p>
                    </td>

                </tr>
                <tr>
                    <td><img src="projectimg/b.png" alt="" class="imga"></td>
                    <td><a href="#">Help</a>
                        <p>Secilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptaum
                            zzelenit
                            augue duis dolore te feugait nulla legentis in iis qui facit eorum claritatem vestigatio</p>
                    </td>

                </tr>
                <tr>
                    <td><img src="projectimg/c.png" alt="" class="imga"></td>
                    <td><a href="#">Ask for librarian</a>
                        <p>Secilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptaum
                            zzelenit
                            augue duis dolore te feugait usus legentis in iis qui facit eorum claritatem vestigatio</p>
                    </td>

                </tr>
            </table>
        </div>
        <div class="blog" id="blog">
            <h1 id="blog" class="abt">thought</h1>
            <div class="blog-slide">
               <?php while ($row = mysqli_fetch_assoc($result)) 
                {
                    $image = $row['image'];
                    $title = $row['title'];
                    $des=$row['description'];
                    $fname=$row['fname'];
                    $lname=$row['lname'];
                    ?>
                    <div class="image-slider">
                    <img src="
                    <?php echo $image; ?>
                    " class="userimg" alt="news one" srcset="">
                    <div class="image-fade">
                        <h2><?php echo $title; ?></h2><br>
                        <p><?php echo $des; ?></p>
                        <br>
                        <h3>- <?php echo $fname.' '.$lname; ?></h3>
                    </div>
                </div>
                <?php
                }
                ?>


                <a href="studentlogin.php" id="add-blogs-btn" class="button"> add your thought </a>
            </div>
        </div>
        <div class="populer-books">
            <div class="name">
                <h1 class="abt" id="abt-populer">most populer books</h1>
            </div>
            <div class="book-self">
                <div class="book">
                    <img src="projectimg/book1.jpg" id="book1" alt="book#1" srcset="">
                    <div class="book-info">
                        <h2 class="title">visual history of world</h2><br><br>
                        <p>Jean-Pierre Isbouts is a scholar of humanities and history and a professor at Fielding Graduate University in Santa Barbara, California. He has published widely on the origins of human civilization, including two bestsellers: The Biblical World and In the Footsteps of Jesus, both published by National Geographic.</p>
                    </div>
                </div>
                <div class="books">
                    <div>
                        <img src="projectimg/book2.jpg" class="self-img" srcset="">
                        <div class="book-info">
                            <h4>grand pursuit</h4>
                        </div>
                    </div>
                    <div>
                        <img src="projectimg/book3.jpg" class="self-img" srcset="">
                        <div class="book-info">
                            <h4>cercus stars</h4>
                        </div>
                    </div>
                    <div>
                        <img src="projectimg/book4.jpg" class="self-img" srcset="">
                        <div class="book-info">
                            <h4>downton abbey</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact" id="contact">
            <div>
                <h1 class="abt" id="contact">contact us</h1>
            </div>
            <div class="address">
                <i class="fa-solid fa-location-dot fa-bounce fa-2xl" style="color: #ffffff;"></i>
                <p><br></b>8901 Marmora Road,
                    <br>Glasgow, D04 89GR.
                </p><br><br><br>
                <i class="fa-solid fa-mobile fa-2xl" style="color: #ffffff;"></i>
                <br>
                <p></p>+(0261) 8585263</p>
            </div>
            <div class="icon">
                <i class="fa-brands fa-twitter fa-2xl"></i>
                <i class="fa-brands fa-facebook-f  fa-2xl"></i>
                <i class="fa-brands fa-google-plus-g fa-2xl"></i>
            </div>
            <div class="copyright">
                copyright &copy 2023 |
            </div>
        </div>
    </main>
</body>

<script>
        //manu slid show
        $(document).ready(function () {
            $(function () {
                var lastScrollTop = 0, delta = 5;
                $(window).scroll(function () {
                    var nowScrollTop = $(this).scrollTop();
                    if (Math.abs(lastScrollTop - nowScrollTop) >= delta) {
                        if (nowScrollTop > lastScrollTop) {
                            $("ul").addClass("temp");
                            $("ul li a").addClass("white");
                            $("#d2").removeClass("d2");
                        }
                        else {
                            // $("ul").removeClass("temp");
                            //$("ul li a").removeClass("white");
                        }
                        //edited by nicxx
                        if (nowScrollTop < 100) {
                            $("ul").removeClass("temp");
                            $("ul li a").removeClass("white");
                            $("#d2").addClass("d2");
                        }
                        lastScrollTop = nowScrollTop;
                    }
                });
            });


            // //blog slid show
            let index = 0;
            displayImages();
            function displayImages() {
                let i;
                const images = document.getElementsByClassName("image-slider");
                for (i = 0; i < images.length; i++) {
                    images[i].style.display = "none";
                }
                index++;
                if (index > images.length) {
                    index = 1;
                }
                images[index - 1].style.display = "flex";
                setTimeout(displayImages, 3000);
            }
        })
    </script>
</html>
