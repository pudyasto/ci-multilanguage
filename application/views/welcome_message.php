<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	.body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	.container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>
<div class="container">
    <div class="body">
        <?php
            echo form_label($this->lang->line('choose_language'));
            echo "<br>";
            echo form_dropdown($form['language']['name'],$form['language']['data'] ,$form['language']['value'] ,$form['language']['attr']);
            echo form_error('language','<div class="note">','</div>'); 
        ?>
    </div>
    <h1><?=$this->lang->line('choose_language');?></h1>

    <div id="body">
        <p><?=$this->lang->line('description_1_message');?></p>
        <p><?=$this->lang->line('description_2_message');?></p>
    </div>
</div>
    
<div class="container">
    <div class="body">
        <ul>
            <?php
                foreach ($main_menu as $value) {
                    echo "<li>".$value['name'] . " - " . $value['description']."</li>";
                        echo "<ul>";
                        foreach ($sub_menu as $sub_value) {
                            if($sub_value['mainmenuid'] == $value['id']){
                                echo "<li>".$sub_value['name'] . " - " . $sub_value['description']."</li>";
                            }
                        }
                        echo "</ul>";
                }
            ?>
        </ul>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    $(function(){        
        $("#language").change(function(){
            set_language();
        });
    });
    
    function set_language(){
        var lang = $("#language").val();
        $.ajax({
            type: "POST",
            url: "<?=site_url('welcome/set_language');?>",
            data: {"lang":lang},
            success: function(resp){  
                location.reload();
            },
            error:function(event, textStatus, errorThrown) {
                console.log("Error !", 'Error Message: ' + textStatus + ' , HTTP Error: ' + errorThrown, "error");
            }
      });
    }
</script>
</body>
</html>