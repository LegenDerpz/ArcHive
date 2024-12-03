<?php
    require_once 'config/db_config.php';
    require_once 'config/session_config.php';
    require_once 'non_views/search_books.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/browse_books.css">
    <link rel="stylesheet" href="css/global_scrollbar.css">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="wrapper ">
        <aside id="sidebar">
            <div class="d-flex">
                <a class="toggle-btn" href="#" id="sidebar-button">
                    <i class="lni lni-grid-alt"></i>
                </a>
                <div class="sidebar-logo">
                    <a href="#">ArcHive</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="home.php" class="sidebar-link">
                        <i class="bi bi-house-door"></i> <!-- Home icon -->
                        <span>Home</span>
                    </a>
                </li>
                <?php 
                    if (isset($_SESSION['loggedUserType']) && $_SESSION['loggedUserType'] == 'ADMIN') {
                        include_once 'admin_tabs.php';
                    }
                ?>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" onclick="openTab(event, 'browseBooks', 'browseTab', 'booksPage')" id="browseTab">
                        <i class="bi bi-collection"></i> <!-- Books icon -->
                        <span>Browse Books</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="account.php" class="sidebar-link">
                        <i class="bi bi-person"></i> <!-- Account icon -->
                        <span>Account</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" id="logoutBtn" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <?php
            if (isset($_SESSION['loggedUserType']) && $_SESSION['loggedUserType'] == 'ADMIN') {
                include_once 'add_book_tab.php';
                include_once 'update_book_tab.php';
            }
        ?>

    <div class="main p-3">
        <div id="browseBooks" class="tabContent m-3">
            <h2>Browse Books</h2>
            <form action="books.php" method="GET">
                <input type="text" id="browseBook" name="browseBook" placeholder="Search book">
                <input type="submit" value="Search">
            </form>
            <?php
                if($bookBrowseResult->num_rows == 0){
                    echo 'No results found.';
                }
            ?>
            <br>
            <div id="genras">
            
            <?php 
                //Genres Section
                $allGenresQuery = "SELECT genre FROM genres";
                $allGenresResult = mysqli_query($conn, $allGenresQuery);
                $genreHeaderResult = mysqli_query($conn, $allGenresQuery);

                if($allGenresResult->num_rows > 0){
                    if(isset($genreHeaderResult)){
                        while($g_row = mysqli_fetch_array($genreHeaderResult)){

                            $currentGenre = $g_row['genre'];

                            $genreFilteredAllBooksQuery = "
                            SELECT b.id, b.title, a.firstName, a.lastName, b.genre, b.publicationDate, b.quantity, b.imageLocation, b.description FROM book b
                            INNER JOIN authors a ON b.authorId=a.id
                            WHERE genre LIKE '%$currentGenre%' && (b.title LIKE '$bookBrowse%' or a.firstName LIKE '$bookBrowse%' or a.lastName LIKE '$bookBrowse%')";

                            $genreFilteredAllBooksResult = mysqli_query($conn, $genreFilteredAllBooksQuery);
            ?>
            
                            <?php 
                                if(isset($genreFilteredAllBooksResult)){
                                    if($genreFilteredAllBooksResult->num_rows > 0){ 
                            ?>
                            <div class="flex flex-col">
                                <h3 class="genre-header"><?= $g_row['genre'] ?></h3>
                                <div class="btn-slide-container flex justify-end mb-4 gap-2">
                                    <button class="bg-neutral-300 w-8 h-8 rounded-full"><</button>
                                    <button class="bg-neutral-300 w-8 h-8 rounded-full">></button>
                                </div>  
                                <div id="<?= $currentGenre; ?>" class="flex overflow-auto gap-6 p-4">
                                                              <?php }
                                    while($row = mysqli_fetch_array($genreFilteredAllBooksResult)){
                                        $location = $_ENV['IMAGE_LOCATION'] . $row['imageLocation'];
                                        $nullLocation = $row['id'] . "/";
                
                                        //If image is null, not found/assigned, or does not exist, assign a placeholder image
                                        if($row['imageLocation'] == '' || $row['imageLocation'] == $nullLocation || !file_exists($location)){
                                            $location = $_ENV['IMAGE_LOCATION'] . "default/placeholder_thumbnail.png";
                                        }
                                ?>
                                    <!-- Book Image and Label Container -->
                                    <div style="text-align: center;">
                                        <input type="hidden" value="<?= $row['title'] ?>" id="<?= $row['id'] . "-title" ?>">
                                        <input type="hidden" value=
                                            "
                                                <?php 
                                                    $imgLocation = $_ENV['IMAGE_LOCATION'] . $row['imageLocation'];
                                                    if($row['imageLocation'] == '' || $row['imageLocation'] == $nullLocation || !file_exists($location)){
                                                        $imgLocation = $_ENV['IMAGE_LOCATION'] . "default/placeholder_thumbnail.png";
                                                    }
                                                    echo $imgLocation;
                                                ?>
                                            " 
                                            id="<?= $row['id'] . "-image" ?>"
                                        >
                                        <input type="hidden" value="<?= $row['description'] ?>" id="<?= $row['id'] . "-description" ?>">
                                        <input type="hidden" value="<?= $row['genre'] ?>" id="<?= $row['id'] . "-genre" ?>">
                                        <input type="hidden" value="<?= $row['firstName'] . " " . $row['lastName'] ?>" id="<?= $row['id'] . "-author" ?>">
                                        <input type="hidden" value="<?= $row['publicationDate'] ?>" id="<?= $row['id'] . "-pubDate" ?>">
                                        <input type="hidden" value="<?= $row['quantity'] ?>" id="<?= $row['id'] . "-quantity" ?>">

                                        <div class="min-w-40 thumbnail">
                                                <a onclick="borrowPrompt('<?= $row['id']; ?>')">
                                                    <img class="w-32 h-40" src="<?=$location?>" alt="Thumbnail"><br>
                                                </a>
                                                <p class="text-sm w-32"><?= $row['title'] ?></p>
                                            </div>
                                    </div>
                                <?php 
                                    }
                                    //Reset table data index to 0 to recreate the table
                                    mysqli_data_seek($genreFilteredAllBooksResult, 0);
                                } ?>
                                </div>
                            </div>
            <?php }}} ?>
            </div>
            <div id="borrow-container"></div>
        </div>
    </div>
    <script src="borrow_book.js"></script>
    <script src="update_book.js"></script>
    <script src="delete_book.js"></script>
    <script src="tabs.js"></script>
    <script src="logout.js"></script>
    <script src="home_sample.js"></script>
    <script>
        // This is the script for horizontal scroll on each genras
        const genrasContainer =document.getElementById("genras");

        const btnSlides = document.getElementsByClassName("btn-slide-container");
                                        
        for (let index = 0; index < btnSlides.length; index++) {
            const genras = btnSlides[index];
            
            const left = genras.children[0];
            const right = genras.children[1];

            left.addEventListener('click', () => {
                genrasContainer.children[index].children[2].scrollBy({left: -600, behavior: "smooth"})
            });

            right.addEventListener('click', () => {
                genrasContainer.children[index].children[2].scrollBy({left: 600, behavior: "smooth"})
            });
        }
    </script>
    <script>
        // window.onload = function(){
        //     setTimeout(() => {
        //         document.getElementById('sidebar-button').click();
        //     }, 300);
        // }
    </script>
</body>
</html>