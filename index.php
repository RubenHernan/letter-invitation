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

<link rel="stylesheet" href="./src/styles.css">
</head>
<body>
    <main>
        <div class="box__letter">
            <img src="./src/img/letter.png" alt="letter-info">
        </div>
        <div class="box_content"> 
        <form class="form__container" method="post">
        <div class="box__info">
            <span class="box__title">KINDLY RSVP BELOW BY 30 JUNE 2022</span>
            <div class="box__response">
                <div>
                    <input id="accept" type="radio" name="responde" class="response__input" value="accept">
                    <label for="accept" class="box__icon">
                        <span>JOYFULLY ACCEPT</span>
                    </label>
            </div>
            <div>
                    <input id="decline" type="radio" name="responde" class="response__input" value="decline">
                    <label for="decline" class="box__icon">
                        <span>REGRETFULLY DECLINE</span>
                    </label>
            </div>
            </div>
        </div>
       
        
            <div class="form__number">
                <span class="form__title">NUMBER OF GUESTS:
                </span>
             
                    <select class="form__select" name="number_of_guests" id="" required>
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
                    <input type="text" placeholder="Name(s)" name="guest_names">
                </div>
                <div class="form__input">
                    <span class="form__title">DIETARY REQUIREMENTS:</span>
                    <input type="text" placeholder="e.g. Allergies" name="dietary_requirements">
                </div>
                <div class="form__input">
                    <span class="form__title">CONTACT INFO:</span>
                    <div class="box__contact">
                        <input type="text" placeholder="Name" name="contact_name" required>
                        <input type="tel" placeholder="Phone" name="contact_phone" required>
                        <input type="email" placeholder="Email" name="contact_email" required>
                    </div>
                </div>
                <div class="form__btn">
                    <button class="btn" name="register">REPLY NOW</button>
                </div>
            </div>
        </form>
    </div>
    </main>
</body>
</html>