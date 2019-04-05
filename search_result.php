<!doctype html>
<html>
<body>
<div id="search_box">
    <form action="search_result.php" method="post">
        <select name="catgo">
            <option value="title">Title</option>
        </select>
        <input type="text" name="search" size="40"/> <button>Search</button>
    </form>
</div>
<div>
    <?php
    $s = mysqli_connect("localhost", "root", "","Library") or die("Fail to connect");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    print "Success to connect<br>";
    $search_conn = $_POST["search"];
    $q = "SELECT title FROM Library.book WHERE title LIKE $search_conn";
    $result = mysqli_query($s, $q);
    if (!$result){
        die('Invalid query: ' . mysqli_error($s));
    }

    /* numeric array */
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    printf ("%s\n", $row["title"]);
    mysqli_free_result($result);
    mysqli_close($s);
    print "<br><a href='index.php'>Home</a>";
    ?>

</div>
</html>