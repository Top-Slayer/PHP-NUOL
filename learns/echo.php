<h1> GG ez</h1>

<form method='post' action=''>
   <input type="text" name="title" id="title"/>
   <button type="submit">Submit</button>
</form>

<?php 
    if ($_POST) 
    {
        echo $_POST['title'];
    }
    else {
        echo "BRUH HACKER";
    }
?>