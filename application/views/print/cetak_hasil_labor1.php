<!DOCTYPE html>
<html>

<head>
    <title>HASIL LABOR</title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .table1 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid;

        }


        .garisbawah {
            border-bottom: 1px solid;
        }

        .gariskanan {
            border-right: 1px solid;
        }

        .box {
            border-bottom: 1px solid;
            width: 1px;
            height: 1px;

        }


        .block,

        li {
            border: 1px solid black;
            padding: .1em;
            width: 29px;
        }

        .block {
            display: block;
        }

        span,
        ul {
            border: 1px solid black;
            padding: .1em;
            width: 50px;

        }


        ul {
            display: inline-flex;
            list-style: none;
            padding: 0;
        }

        .inline {
            display: inline;
        }

        .clsFirstImg {

            position: relative;
            float: left;
        }

        .clsSecondImg {

            position: absolute;
            top: 300px;
            right: 150px;

        }
    </style>
</head>

<body>
    
    <div class="content" id="labor" style="page-break-after:always;">

        <!-- <h2 class="center">
            HASIL LABORATORIUM
        </h2>
        <hr> -->
        <?php if (count($labor1) > 0) {
            foreach ($labor1 as $data2) { ?>
                <table width=100% class="table1" cellspacing=0>
                    <?php
                    $gambar1 = null;
                    foreach (explode(',', $data2['file']) as $image) { // 1, 2, 3
                        echo $gambar1 = "<center><img src='" . base_url() . "assets/file-upload/" . $image . "'width='100%'></center><br>";
                    }
                    ?>
                </table>
            <?php }
        } else { ?>
            <script type="text/javascript">
                document.getElementById('labor').style.display = 'none';
            </script>
        <?php } ?>

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