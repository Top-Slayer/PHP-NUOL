<body>
    <div class="typing-container" id="typing-container">
        <div id="text" class="d-flex justify-content-center align-item-center mt-5"></div>
    </div>

    <script>
        const text = "HI, I'm Top BuRh~~ \n Nothing here!!";
        const formattedText = text.replace(/\n/g, '<br>');
        let index = 0;
        const typingElement = document.getElementById('text');
        let out_text = "";

        function typeText() {
            if (index < formattedText.length) {
                out_text += formattedText.charAt(index);
                typingElement.innerHTML = out_text;
                index++;
                setTimeout(typeText, 150); // Set delay for each character
            } else {
                cursorElement.style.animation = 'none'; // Stop cursor blink when typing is finished
            }
        }

        typeText();
    </script>
</body>