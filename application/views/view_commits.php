<?php date_default_timezone_set('america/mexico_city'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Commits</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
    <nav>Lista de commits</nav>
    <div class="container mt-3">
        <?php $count = 0; ?>
        <?php foreach($items as $item):?>
        <?php $count++;?>
            <div class="card-commits">
                <div class="message"><?=$item['commit']['message'];?></div>
                <div>
                    <img class="img-avatar" src="<?=($item['author']['avatar_url']=='')? base_url('assets/img/github.png'):$item['author']['avatar_url'] ?>">
                    <?php
                        $date = new DateTime($item['commit']['author']['date']);
                        $result = $date->format('d-m-Y H:i:s');
                        echo  "<span>".($item['author']['login']=="")? $item['committer']['login'] ." committed on ".$result : $item['author']['login']." committed on ".$result."</span>"
                    ?>
                </div> 
                <button class="btn btn-info" data-toggle="modal" data-target="#modal-<?=$count?>">Detalles</button>             
            </div>
            <div class="modal fade" id="modal-<?=$count?>">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header text-center">
                        <h4 class="modal-title">Detalles de commit</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="more-info">
                            <img class="img-avatar" src="<?=($item['author']['avatar_url']=='')? base_url('assets/img/github.png'):$item['author']['avatar_url'] ?>">
                            <div>Autor: <?=($item['author']['login']=="")? $item['committer']['login'] : $item['author']['login']?></div>
                            <div>Fecha: <?=$result?></div>
                            <div class="message">Commits: <?=$item['commit']['message'];?></div>
                        </div> 
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                </div>
            </div>
        <?php endforeach ?>             
    </div>    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url('assets/js/search.js');?>"></script>
</body>
</html>
