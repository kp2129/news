<div class="nav-container">
    <div class="left-side">
        <a href="index.php" class="nav-logo">NEWS</a>


        <form action="index.php" method="get" class="topic-container">
            <button type="submit" class="topic-button">Ziņas</button>
            <button type="submit" class="topic-button" name="topic" value="Technology">Technology</button>
            <button type="submit" class="topic-button" name="topic" value="Science">Science</button>
            <button type="submit" class="topic-button" name="topic" value="Business">Business</button>
            <button type="submit" class="topic-button" name="topic" value="Health">Health</button>
        </form>



    </div>
    <div class="right-side">
        <?php
        session_start();
        if(isset($_SESSION['UId'])){
            if($_SESSION['role'] == 1){
                echo '<button id="log-button" class="admin-button button-style">Admin Panel</button>';

            }
            echo '<button id="log-button" class="logout-button button-style"> Log out</button>';
        }else{
            echo '<button id="log-button" class="login-button button-style"> Pieslēgties</button>';
        }
        ?>
        <button class="filter-button s-button-style">
            <img src="svg/filter.svg" alt="filter">
        </button>
        <button class="search-button s-button-style">
            <img src="svg/search.svg" alt="search">
        </button>
    </div>
</div>