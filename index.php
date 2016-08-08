<?php
include_once 'config.php';
include_once 'functions.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php
    if (!empty($_GET['page'])) {
        $page = $link->query("SELECT * FROM pages WHERE link='{$_GET['page']}'");
        if($link->error){
            echo 'Mysql error: '.$link->error;
            exit();
        }
        $page = $page->fetch_assoc();
        echo "<meta name='keywords' content='{$page['keywords']}'>";
        echo "<meta name='description' content='{$page['description']}'>";
        echo "<title>{$page['title']}</title>";
    }else{
        echo "<title>Main page</title>";
    }
    ?>
</head>
<body>
<div id="menu">
    <p>Navigation</p>
    <?php echo menuShow(pagesArray($link)) ?>
</div>
<?php
if (!empty($_GET['page'])) {
    echo "<h1>{$page['header']}</h1>";
    echo "<p>{$page['text']}</p>";
}
?>

</body>
</html>