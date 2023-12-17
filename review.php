<?php  
    require_once 'partials/navbar.php';
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Review</title>
        <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel='stylesheet'>
        <style>
            * {
                padding: 0;
                margin: 0;
                font-family: verdana;
            }
            html {
                font-size: 62.5%;
                scroll-behavior: smooth;
            }

            /* CONTENT */

            .heading {
                text-align: center;
                padding-bottom: 20px;
                text-shadow: 4px 4px 0 rgba(0, 0, 0, 0.2);
                text-transform: uppercase;
                color: #444;
                font-size: 50px;
                letter-spacing: 4px;
            }

            .heading span {
                text-transform: uppercase;
                color: rgb(69, 103, 131);
            }

            .review {
                margin-top: 70px;
                padding-bottom: 50px;
            }

            .review .box-container {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
                gap: 20px;
                width: 90%;
                padding: 0 5%;
            }

            .review .box-container .box {
                border: 2px solid rgb(69, 103, 131);
                box-shadow: 5px 5px 0 rgba(22, 160, 133, 0.2);
                border-radius: 5px;
                padding: 25px;
                background: #fff;
                text-align: center;
                position: relative;
                overflow: hidden;
                z-index: 0;
            }

            .review .box-container .box .img {
                height: 100px;
                width: 100px;
                border-radius: 50%;
                object-fit: cover;
                border: 5px solid #fff;
            }

            .review .box-container .box h3 {
                color: #fff;
                font-size: 22px;
                padding: 5px 0;
            }

            .review .box-container .box .stars {
                color: #fff;
            }

            .review .box-container .box .text {
                color: #777;
                line-height: 1.8;
                font-size: 16px;
                padding-top: 40px;
            }

            .review .box-container .box::before {
                content: "";
                position: absolute;
                top: -40px;
                left: 50%;
                transform: translateX(-50%);
                background: rgb(69, 103, 131);
                border-bottom-left-radius: 50%;
                border-bottom-right-radius: 50%;
                height: 250px;
                width: 120%;
                z-index: -1;
            }

               

                #contact {
                    background-color: #f7f7f7;
                    padding: 80px;
                    border-radius: 20px;
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                }

                #contactForm {
                    background-color: #ffffff;
                    padding: 20px;
                    border-radius: 8px;
                    height: 500px;
                }

                .form-group label {
                    display: block;
                    margin-top: 10px;
                    font-family: roboto;
                }

                form {
                    max-width:400px;
                    margin: auto;
                    padding: 20px;
                    border-radius: 5px;
                }

                .form-group{
                    display:block;
                    justify-content:left;
                }

                .form-group input[type="text"],
                .form-group input[type="email"]
                {
                    padding: 4px 8px;
                    margin-bottom: 20px;
                    border: none;
                    background-color: transparent;
                    border-bottom: 2px solid #a8ee10;
                    /* color: #fff; */
                    font-size: 20px;
                }

                .form-control{
                    padding: 50px;
                    margin-bottom: 20px;
                    border: none;
                    background-color: transparent;
                    border-bottom: 2px solid #a8ee10;
                    /* color: #fff; */
                    font-size: 20px; 
                }

                button{
                    
                    border: none;
                    padding: 13px 17px;
                    border-radius: 10px;
                
                    color: yellowgreen;
                    display: inline-block;
                    cursor: pointer;
                    text-decoration: none;
                    background-color:black;
                }

                button:hover{
                    background-color: #1a7a59;
                }

                .col-md-6{
                    font-size: 20px;
                }

            /* END CONTENT */

        </style>
    </head>

    <body>
        
        <!-- header section ends -->

        <!-- review section starts  -->

        <section class="review" id="review">
            <h1 class="heading"><span>REVIEW</span></h1>

            <div class="box-container">
                <div class="box">
                    <img src="foto/orang1.jpg" alt="" class="img" />
                    <h3>Agus</h3>
                    <div class="stars">
                        <img src="./jizdan/img/rating.png" alt="" width="20px" />
                        <img src="./jizdan/img/rating.png" alt="" width="20px" />
                        <img src="./jizdan/img/rating.png" alt="" width="20px" />
                        <img src="./jizdan/img/rating.png" alt="" width="20px" />
                        <img src="./jizdan/img/rating.png" alt="" width="20px" />
                    </div>
                    <p class="text">
                    good banget sih
                    </p>
                </div>

                <div class="box">
                    <img src="foto/orang2.jpg" alt="" class="img" />
                    <h3>Saskia</h3>
                    <div class="stars">
                        <img src="./jizdan/img/rating.png" alt="" width="20px" />
                        <img src="./jizdan/img/rating.png" alt="" width="20px" />
                        <img src="./jizdan/img/rating.png" alt="" width="20px" />
                        <img src="./jizdan/img/rating.png" alt="" width="20px" />
                        <img src="./jizdan/img/rating.png" alt="" width="20px" />
                    </div>
                    <p class="text">
                    "sportease adalah platform yang berguna bisa mempermudah saya booking lapangan
                    </p>
                </div>

                <div class="box">
                    <img src="foto/orang3.jpg" alt="" class="img" />
                    <h3>Andika</h3>
                    <div class="stars">
                        <img src="./jizdan/img/rating.png" alt="" width="20px" />
                        <img src="./jizdan/img/rating.png" alt="" width="20px" />
                        <img src="./jizdan/img/rating.png" alt="" width="20px" />
                        <img src="./jizdan/img/rating.png" alt="" width="20px" />
                        <img src="./jizdan/img/rating.png" alt="" width="20px" />
                    </div>
                    <p class="text">
                    patut diacungi jempol
                    </p>
                </div>
            </div>
        </section>

        <section id="contact" class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>kirim review</h2>
                <form id="contactForm" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" value="<?=$row_user['username']?>" required>
                    </div>
    
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" name='pertanyaan' placeholder="Enter your message" required></textarea>
                    </div>
                    <div class='nilai'>
                        
                            <div class="rating">
                                <input type="number" name="rating" hidden>
                                <i class='bx bx-star star' style="--i: 0;"></i>
                                <i class='bx bx-star star' style="--i: 0;"></i>
                                <i class='bx bx-star star' style="--i: 0;"></i>
                                <i class='bx bx-star star' style="--i: 0;"></i>
                                <i class='bx bx-star star' style="--i: 0;"></i>
                            </div> 
                    
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100" >send</button>
                </form>
            </div>
        </div>
    </section>
        

        <script
            type="module"
            src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
        ></script>
        <script
            nomodule
            src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
        ></script>
        <script>
            const allStar = document.querySelectorAll('.rating .star')
const ratingValue = document.querySelector('.rating input')

allStar.forEach((item, idx)=> {
	item.addEventListener('click', function () {
		let click = 0
		ratingValue.value = idx + 1

		allStar.forEach(i=> {
			i.classList.replace('bxs-star', 'bx-star')
			i.classList.remove('active')
		})
		for(let i=0; i<allStar.length; i++) {
			if(i <= idx) {
				allStar[i].classList.replace('bx-star', 'bxs-star')
				allStar[i].classList.add('active')
			} else {
				allStar[i].style.setProperty('--i', click)
				click++
			}
		}
	})
})
        </script>

        <!-- footer section ends -->
    </body>
</html>

<?php  require_once "partials/footer.php"?>
