<?php
$main = "";
$path = ltrim($_SERVER['REQUEST_URI'], '/');
$elements = explode('/', $path);

$page = strtolower($elements[getenv("URL_DEPTH")]);
$param = isset($elements[getenv("URL_DEPTH") + 1]) ? strtolower($elements[getenv("URL_DEPTH") + 1]) : null;
switch ($page) {
    case "":
        $main.= file_get_contents("content/home.html");
        break;
    default:
        header('HTTP/1.1 404 Not Found');
        $main.= file_get_contents("404.html");
        break;
}
?>

<!DOCTYPE html>
<html lang="en-US" style="height: 100%;">
    <head>
        <title>OPHTemplate</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="Test">
        <meta name="description" content="Test Description">
        <?php require(getenv("APP_ROOT_PATH") . "/common/import.php"); ?>
    </head>
    <body>
        <?php require(getenv("APP_ROOT_PATH") . "/common/header.php"); ?>
        <div id="flex-wrapper">
            <div id="hero">
                <div id="hero-text">
                    <h1>Jeff Geyer</h1>
                    <p>Web Developer</p>
                    <a href="#">Hire Me</a>
                </div>
            </div>
            <main><?php echo $main; ?></main>
            <?php require(getenv("APP_ROOT_PATH") . "/common/footer.php"); ?>
        </div>
    </body>
</html>