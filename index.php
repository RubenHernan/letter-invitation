<?php
 include("app/result_register.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Invite</title>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="./src/styles.css">
</head>
<body>
    <main>
        <div class="box__letter">
            <div class="box__img animate__animated animate__pulse animate__infinite">
                <img src="./src/img/elefante01.png" alt="letter-info">
            </div>
            <div data-aos="fade-right" data-aos-once="true" data-aos-duration="2000" class="box__img animate__animated animate__fadeIn">
                <img src="./src/img/elefante02.png" alt="letter-info">
            </div>
        </div>
        <div class="box_content"> 
        <form class="form__container" method="post" onsubmit="return validateForm()">
        <div class="box__info">
            <span class="box__title">KINDLY RSVP BELOW BY 30 JUNE 2022</span>
            <div class="box__response">
                <div>
                    <input id="accept" type="radio" name="responde" class="response__input" value="accept" onChange="resetBorderBox()"/>
                    <label for="accept" class="box__icon">
                        <span>JOYFULLY ACCEPT</span>
                    </label>
            </div>
            <div>
                    <input id="decline" type="radio" name="responde" class="response__input" value="decline" onChange="resetBorderBox()"/>
                    <label for="decline" class="box__icon">
                        <span>REGRETFULLY DECLINE</span>
                    </label>
            </div>
            </div>
        </div>
       
        
            <div class="form__number">
                <span class="form__title">NUMBER OF GUESTS:
                </span>
             
                    <select class="form__select form__required" name="number_of_guests" id="" onChange="resetBorderInput(event)">
                        <option value="">Select</option>
                        <option value="0">0 (Not attending)</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
             
            </div>
            <div class="form__guest">
        
                <div class="form__input">
                    <span class="form__title">NAME(S) OF GUESTS:
                    </span>
                    <p>Kindly enter the names for the seating plan.</p>
                    <input onChange="resetBorderInput(event)" type="text" placeholder="Name(s)" name="guest_names" class="form__required">
                </div>
                <div class="form__input">
                    <span class="form__title">DIETARY REQUIREMENTS:</span>
                    <input type="text" placeholder="e.g. Allergies" name="dietary_requirements">
                </div>
                <div class="form__input">
                    <span class="form__title">CONTACT INFO:</span>
                    <div class="box__contact">
                        <input onChange="resetBorderInput(event)" type="text" placeholder="Name" name="contact_name" class="form__required">
                        <input onChange="resetBorderInput(event)" type="tel" placeholder="Phone" name="contact_phone" class="form__required">
                        <input onChange="resetBorderInput(event)" type="email" placeholder="Email" name="contact_email" class="form__required">
                    </div>
                </div>
                <div class="form__btn">
                    <button class="btn" name="register">REPLY NOW</button>
                </div>
            </div>
        </form>
    </div>
    <audio id="song" loop>
        <source src="./src/sound/song.mp3" type="audio/mpeg">
    </audio>
    </main>
    <script>
        function playSong(){
            document.getElementById("song").play();
        }
    </script>
    <script src="./src/main.js" defer></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>
</html>