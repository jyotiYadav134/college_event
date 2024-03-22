<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 10;
            padding: 0;
            background-color: #f0f0f0;
        }
        footer {
            background-color: #9DD9F3; 
            color: #fff;
            padding: 50px;
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            flex-wrap: wrap;
        }
        footer section {
            flex: 1;
            margin-right: 20px;
            margin-bottom: 30px;
        }
        footer section:last-child {
            margin-right: 0;
        }
        footer p {
            margin: 0;
            line-height: 1.5;
        }
        .footerSubtext {
            font-size: 0.8em;
        }
        .footerSubtext2 {
            font-size: 0.9em;
        }
        .footerSubtext2 br {
            display: none;
        }
        .footerSubtext2:hover br {
            display: block;
        }
        .social-icons {
            margin-top: 10px;
        }
        .social-icons a {
            margin-right: 10px;
        }
        .social-icons img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <footer>
        <section>
            <div>
                <p>
                    <strong>C</strong><span class="small footerSubtext">ollege</span>
                    <strong>E</strong><span class="small footerSubtext">vent</span>
                    <strong>M</strong><span class="small footerSubtext">anagement</span>
                    <strong>S</strong><span class="small footerSubtext">ystem</span>
                </p>
                <p class="footerSubtext2">
                    Our college Mission is to impart quality technical education and higher moral ethics associated with skilled training to suit the modern day technology with innovative concepts,so as to learn to lead the future with full confidence.
                </p>
            </div>
        </section>
        <section>
            <div>
                <p>
                    Address: Lalitpur <br>
                    Dhobigat, Lalitpur 01-5433044
                </p>
            </div>
        </section>
        <section>
            <div class="social-icons">
                Follow Us:<br>
                <a href="https://www.facebook.com/DAVCollegeNP/"><img src="../images/facebook.png" alt="Facebook"></a>
                <a href="https://www.instagram.com/davcollegenepal/"><img src="../images/instagram.png" alt="Instagram"></a>
                <a href="https://www.youtube.com/@D.A.V.College"><img src="../images/youtube.png" alt="YouTube"></a>
            </div>
        </section>
    </footer>
</body>
</html>
