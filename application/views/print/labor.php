<!DOCTYPE html>
<html>

<head>
    <title>Print out <?= $page_title ?></title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="content">


        <table style="margin-left:40px" class="table1" cellspacing=0>
            <tr height=30px>
                <td>
                    <?php
                    $gambar = null;
                    foreach (explode(',', $radio['file']) as $image) { // 1, 2, 3
                        echo $gambar = "<center><img src='" . base_url() . "assets/file-upload/" . $image . "'width='500px'></center><br>";
                    }
                    ?>
                </td>

            </tr>
        </table>





    </div>
    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            window.print();
        });
        window.onafterprint = function(e) {
            closePrintView();
        };

        function closePrintView() {
            window.location.href = 'javascript:history.go(-1)';
        }
    </script>
</body>

</html>