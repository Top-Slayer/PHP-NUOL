<body>
    <div class="m-3">
        <h2>Contact Form</h2>
        <form method="post">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <br>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <br>
            <div>
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" cols="50" required></textarea>
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    echo "<h2>Form Submitted</h2>";
    echo "<p><strong>Name:</strong>" . eval($_POST['name']) . "</p>";
    echo "<p><strong>E-mail:</strong>" . $_POST['email'] . "</p>";
    echo "<p><strong>Message:</strong>" . $_POST['message'] . "</p>";
}
?>