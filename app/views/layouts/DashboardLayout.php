<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inkwell</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&family=Neucha&family=Raleway:wght@500;600;700;800;900&display=swap" rel="stylesheet">
    <script defer src="/js/app.js"></script>
</head>

<body>
    <?= component("components.Navbar") ?>
    {{ content }}

    <footer>
        <p>&copy; <?php echo date("Y"); ?>
            <span style="font-weight: 500;">Inkwell</span> &nbsp; | &nbsp; Created by
            <a style="font-weight: 500;" href="https://github.com/AneesMuzzafer">
                Anees Muzzafer Shah
            </a>
        </p>
    </footer>
</body>

</html>
