<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>View PDF With Jquery</h1>
        <div id="viewpdf"></div>
    </div>
    <script scr="<?= base_url() ?>/vendor/jquery/jquery.min.js"></script>
    <script scr="<?= base_url() ?>/vendor/jquery/pdfobject.min.js"></script>
    <script>
        var viewer = $('#viewpdf');
        PDFObject.embed('<?= base_url() ?>/file/modul1.pdf', viewer);
    </script>
</body>

</html>