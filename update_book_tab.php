<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Books</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/browse_books.css">
    <link rel="stylesheet" href="css/global_scrollbar.css">
    <link rel="stylesheet" href="css/delete_book.css">
</head>
<body>
    <div id="updateBooks"  class="tabContent m-3 container">
        
        <h2 class="text-center my-4">Update Books</h2>

        <div style="color: <?= isset($_SESSION['update_success']) ? 'green' : 'red' ?>;">
            <?php 
                if(isset($_SESSION['update_success'])){
                    echo $_SESSION['update_success'];
                    unset($_SESSION['update_success']);
                }else if(isset($_SESSION['update_error'])){
                    echo $_SESSION['update_error'];
                    unset($_SESSION['update_error']);
                }
            ?>
        </div>

        <!-- Full Width Search Bar Section with Thinner Input -->
        <div class="mb-4">
            <form action="books.php" method="GET" class="d-flex w-100">
                <input type="text" id="searchBook" name="searchBook" class="form-control me-2 w-100 py-2" placeholder="Search book">
                <button type="submit" class="btn btn-primary ms-2 py-2">
                    <i class="bi bi-search"></i> Search
                </button>
            </form>
        </div>

        <!-- No Results Alert -->
        <?php if ($bookSearchResult && $bookSearchResult->num_rows == 0): ?>
            <div class="alert alert-warning" role="alert">
                No results found.
            </div>
        <?php endif; ?>

        <!-- Results Table -->
        <table class="table table-bordered table-striped table-hover mt-3" style="text-align: center;">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Publication Date</th>
                    <th>Quantity</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($bookSearchResult)): ?>
                    <?php while ($row = mysqli_fetch_array($bookSearchResult)): ?>
                        <input type="hidden" value="<?= $row['title'] ?>" id="<?= $row['id'] . "-title-update" ?>">
                            <input type="hidden" value="<?= $row['firstName'] ?>" id="<?= $row['id'] . "-firstName-update" ?>">
                            <input type="hidden" value="<?= $row['lastName'] ?>" id="<?= $row['id'] . "-lastName-update" ?>">
                            <input type="hidden" value="<?= $row['description'] ?>" id="<?= $row['id'] . "-description-update" ?>">
                            <input type="hidden" value="<?= $row['genre'] ?>" id="<?= $row['id'] . "-genre-update" ?>">
                            <input type="hidden" value="<?= $row['publicationDate'] ?>" id="<?= $row['id'] . "-publicationDate-update" ?>">
                            <input type="hidden" value="<?= $row['quantity'] ?>" id="<?= $row['id'] . "-quantity-update" ?>">
                            
                        <tr>
                            <td style="text-align: left;"><?= htmlspecialchars($row['title']) ?></td>
                            <td><?= htmlspecialchars($row['firstName'] . " " . $row['lastName']) ?></td>
                            <td><?= htmlspecialchars($row['genre']) ?></td>
                            <td><?= htmlspecialchars($row['publicationDate']) ?></td>
                            <td><?= htmlspecialchars($row['quantity']) ?></td>
                            <td>
                                <button type="button" class="btn"  style="background-color: #47596f; color: white;" onclick="showUpdateForm('<?= $row['id']; ?>')">
                                    Update
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn" style="background-color: #54101d; color: white;" onclick="deletePrompt('<?= $row['id']; ?>')">
                                    Delete
                                </button>


                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div id="update-container"></div>
        <div id="delete-container"></div>
    </div>

    <!-- Add necessary JavaScript files here -->
</body>
</html>
