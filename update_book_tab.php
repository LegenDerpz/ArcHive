<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Books</title>
</head>
<body>
    <div id="updateBooks" class="tabContent col-sm-8 m-3">
        <h3>Update Books</h3>
        <form action="books.php" method="GET">
            <input type="text" id="searchBook" name="searchBook" placeholder="Search book">
            <input type="submit" value="Search">
        </form>
        <?php
            if($bookSearchResult->num_rows == 0){
                echo 'No results found.';
            }
        ?>
        <br>
        <table class="table table-bordered table-striped table-hover" style="text-align: center;">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Publication Date</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($bookSearchResult)){
                        while($row = mysqli_fetch_array($bookSearchResult)){?>
                            <tr>
                                <td style="text-align: left;"><?=$row['title']?></td>
                                <td><?=$row['firstName']." ". $row['lastName']?></td>
                                <td><?=$row['genre']?></td>
                                <td><?=$row['publicationDate']?></td>
                                <td><?=$row['quantity']?></td>
                                <td><input type="submit" value="UPDATE" onclick="showUpdateForm('<?= $row['id']; ?>')"></td>
                                <td><input type="submit" value="DELETE" onclick="deletePrompt('<?= $row['id']; ?>')"></td>
                            </tr>
                    <?php }} ?>
            </tbody>
        </table>
        <div id="update-container"></div>
        <div id="delete-container"></div>
    </div>
</body>
</html>