<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>PHP REDIS Admin</title>
    <link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/dashboard.css" rel="stylesheet">
	<script src="<?=base_url();?>assets/js/jquery-1.9.1.min.js"></script>
	<script src="<?=base_url();?>assets/js/jquery.dataTables.bootstrap.js"></script>
	<script src="<?=base_url();?>assets/js/jquery.dataTables.js"></script>
	<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">PHP REDIS Admin</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="<?=site_url("home/index")?>">Dashboard<span class="sr-only">(current)</span></a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="<?=site_url("home/index")."?type=string"?>">String</a></li>
             <li><a href="<?=site_url("home/index")."?type=list"?>">List</a></li>
           	 <li><a href="<?=site_url("home/index")."?type=set"?>">Set</a></li>
             <li><a href="<?=site_url("home/index")."?type=zset"?>">SortSet</a></li>
             <li><a href="<?=site_url("home/index")."?type=hash"?>">Hash</a></li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Redis</h1>
          <div class="row placeholders">
          		Server概况
	          <div class="table-responsive" >
	            <table class="table table-striped">
	            	<tbody>
						<?php foreach($server_info as $key=>$info){?>
		                	<tr><th><?=$key?></th><th><?=$info?></th></tr>
		                <?php }?>
	                </tbody>
	            </table>
	        	</div>
          </div>
          </div>

          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="table-responsive" >
            <table class="table table-striped" id="example">
               <CAPTION>Key信息</CAPTION>
              <thead>
                <tr>
					<th>Key</th><th>类型</th><th>编码</th><th>操作</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($keys as $key){?>
                <tr>
					<td><?=$key['key']?></td>
					<td><?=$key['key_type']?></td>
					<td><?=$key['encoding']?></td>
					<td><a href="<?=site_url("home/delete_key")."?key=".$key['key']?>">Del</a></td>
				</tr>
              <?php }?>
              </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>
    </div>
  </body>
  
	<script type="text/javascript">
		$(document).ready(function() {
			$('#example').DataTable();
		} );
	</script>
</html>