
    // Detect anywhere in the document for the secret code
    document.addEventListener('keydown', function(event) {
        var inputField = document.getElementById('secretCode');
        // Append typed character to the invisible input field
        inputField.value += event.key;
        
        // Check if the secret code is 'hollowpurple' (case insensitive)
        if (inputField.value.toLowerCase().includes('hollowpurple')) {
            var specialThanks = document.getElementById('specialThanks');
            specialThanks.classList.add('show'); // Show the special thanks section
            inputField.value = ''; // Reset the input field
        }
    });

