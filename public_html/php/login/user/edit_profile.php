<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Admin for Credential Changes</title>
    <style>
        body {
            background-color: #ffcc00; /* Bright yellow background */
            font-family: 'Comic Sans MS', cursive, sans-serif; /* Comic Sans for chaos */
            overflow: hidden; /* Prevent scroll */
        }

        h1 {
            text-align: center;
            color: #ff007f; /* Hot pink color */
            transform: rotate(-10deg); /* Rotate heading */
            animation: bounce 2s infinite; /* Bouncing effect */
        }

        p {
            margin: 20px;
            font-size: 24px;
            color: #00ff00; /* Bright green */
            text-shadow: 3px 3px #000; /* Black shadow for text */
            animation: shake 0.5s infinite; /* Shaking effect */
            transform: skewY(10deg); /* Skew text */
        }

        .weird-image {
            width: 150px;
            position: absolute;
            animation: spin 5s linear infinite; /* Spinning image */
        }

        .weird-image:nth-child(1) {
            left: 10%;
            top: 10%;
        }

        .weird-image:nth-child(2) {
            right: 15%;
            bottom: 20%;
            transform: rotate(180deg); /* Rotate image */
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff0000; /* Bright red button */
            color: white;
            border: none;
            border-radius: 5px;
            transform: rotate(45deg);
            animation: blink 1s infinite; /* Blinking button */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(45deg); /* Center button */
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes shake {
            0% { transform: translate(1px, 1px); }
            25% { transform: translate(-1px, -2px); }
            50% { transform: translate(-3px, 0); }
            75% { transform: translate(3px, 2px); }
            100% { transform: translate(0, 0); }
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes blink {
            0% { opacity: 1; }
            50% { opacity: 0; }
            100% { opacity: 1; }
        }

        .random-things {
            position: fixed;
            top: 10px;
            right: 10px;
            color: purple;
            font-size: 30px;
            transform: skewX(20deg); /* Skew random things */
            animation: fade 3s infinite; /* Fade effect */
        }

        @keyframes fade {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }

        /* Add chaotic betlog styling */
        .betlog {
            position: absolute;
            color: #ff4500; /* Orange red */
            font-size: 100px;
            opacity: 0.3;
            transform: rotate(-30deg);
            animation: wobble 2s infinite; /* Wobbling effect */
        }

        @keyframes wobble {
            0% { transform: rotate(-30deg); }
            50% { transform: rotate(30deg); }
            100% { transform: rotate(-30deg); }
        }
    </style>
</head>
<body>

    <h1>Contact Admin to Change Your Credentials!</h1>

    <p>Why are you even here? Is it about a rubber duck? Quack!</p>
    <p>If you have a pet llama, please send a postcard!</p>
    <p>Did you know that honey never spoils? Just like your password!</p>

    <img src="https://placekitten.com/150/150" alt="Weird Image" class="weird-image">
    <img src="https://placekitten.com/150/150" alt="Weird Image" class="weird-image">

    <button class="button">Click Me!</button>

    <div class="random-things">🌈✨🍕🦄🚀</div>

    <p style="transform: rotate(5deg);">Contact the admin via smoke signals if you wish to change your credentials!</p>
    <p style="transform: rotate(-5deg);">Or you can just yell into the void!</p>

    <p style="text-align: right; transform: scale(1.5);">This is absolutely useless!</p>

    <!-- Random placement of 'betlog' -->
    <div class="betlog" style="top: 50px; left: 10%;">betlog</div>
    <div class="betlog" style="top: 200px; right: 5%;">betlog</div>
    <div class="betlog" style="top: 400px; left: 50%; font-size: 150px;">betlog</div>
    <div class="betlog" style="top: 600px; right: 30%; transform: rotate(60deg);">betlog</div>
    <div class="betlog" style="top: 800px; left: 20%; font-size: 80px;">betlog</div>
    <div class="betlog" style="top: 300px; left: 60%; opacity: 0.5;">betlog</div>
    <div class="betlog" style="top: 700px; right: 25%; font-size: 90px;">betlog</div>
    <div class="betlog" style="top: 900px; left: 15%; transform: rotate(-45deg);">betlog</div>
    <div class="betlog" style="top: 1000px; right: 10%; font-size: 110px;">betlog</div>
    <div class="betlog" style="top: 1100px; left: 35%; font-size: 120px;">betlog</div>

</body>
</html>
