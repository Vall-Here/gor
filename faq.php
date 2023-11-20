<?php

$title = 'FAQ';
require_once __DIR__ . '/partials/navbar.php';

?>

<link rel="stylesheet" href="./aris/css/faq.css" />

<div class="faq">
    <div class="accordion">
        <div class="image-box">
            <img src="./aris/img/faq.jpeg" alt="Accordion Image" />
        </div>
        <div class="accordion-text">
            <div class="title">FAQ</div>
            <ul class="faq-text">
                <li>
                    <div class="question-arrow">
                        <span class="question">What do you mean by HTML & CSS?</span>
                        <i class="bx bxs-chevron-down arrow"></i>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Nostrum, doloribus.
                    </p>
                    <span class="line"></span>
                </li>
                <li>
                    <div class="question-arrow">
                        <span class="question">What do you mean by JavaScript?</span>
                        <i class="bx bxs-chevron-down arrow"></i>
                    </div>
                    <p>
                        JavaScript is a text-based programming language
                        used both on the client-side and server-side
                        that allows you to make web pages interactive
                    </p>
                    <span class="line"></span>
                </li>
                <li>
                    <div class="question-arrow">
                        <span class="question">From where you learned HTML & CSS?</span>
                        <i class="bx bxs-chevron-down arrow"></i>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Non, necessitatibus.
                    </p>
                    <span class="line"></span>
                </li>
                <li>
                    <div class="question-arrow">
                        <span class="question">Which code editor do you use?</span>
                        <i class="bx bxs-chevron-down arrow"></i>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Rerum, labore.
                    </p>
                    <span class="line"></span>
                </li>
                <li>
                    <div class="question-arrow">
                        <span class="question">Software you use for video editing?</span>
                        <i class="bx bxs-chevron-down arrow"></i>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Saepe, repudiandae!
                    </p>
                    <span class="line"></span>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    let li = document.querySelectorAll(".faq-text li");
    for (var i = 0; i < li.length; i++) {
        li[i].addEventListener("click", (e) => {
            let clickedLi;
            if (e.target.classList.contains("question-arrow")) {
                clickedLi = e.target.parentElement;
            } else {
                clickedLi = e.target.parentElement.parentElement;
            }
            clickedLi.classList.toggle("showAnswer");
        });
    }
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>