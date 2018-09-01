<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<title>My Assets</title>



	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

   
	<link href="../album.css" rel="stylesheet">

	
    
    
</head>


<body>
	<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-sm-3 col-md-9 mr-0" href="#">Hello <?=currentUser()->getEmail()?></a>
		<input class="form-control form-control-dark w-100" type="text" placeholder="Search key..." aria-label="Search">
		<button type="button" class="btn btn-default btn-lg">
			<!-- aria-hidden hides decorative icons from screen readers -->
			<span aria-hidden="true"></span> Search
		</button>
	</nav>	


	<div class="container-fluid">
		<div class="row">
			<nav class="col-md-2 d-none d-md-block bg-light sidebar">
				<div class="sidebar-sticky">
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link" href="<?=$router->pathFor('main')?>">
								<span data-feather="shopping-cart"></span>
								Inventory ENGR
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=$router->pathFor('sur')?>">
								<span data-feather="users"></span>
								Surplus
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=$router->pathFor('miss')?>">
								<span data-feather="layers"></span>
								Missing
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=$router->pathFor('transf')?>">
								<span data-feather="bar-chart-2"></span>
								Transfer
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="<?=$router->pathFor('myassets')?>">
								<span data-feather="miss"></span>
								My Assets <span class="sr-only"></span>
							</a>
						</li>
						
					</ul>

					<?php if(currentUser()->getRole()==0){ ?>
					<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
						<span>More</span>
						<a class="d-flex align-items-center text-muted" href="#">
							<span data-feather="plus-circle"></span>
						</a>
					</h6>
					<ul class="nav flex-column mb-2">
						
						<li class="nav-item">
							<a class="nav-link" href="<?=$router->pathFor('admin')?>">
								<span data-feather="file-text"></span>
								Updates
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=$router->pathFor('users')?>">
								<span data-feather="file-text"></span>
								Users
							</a>
						</li>
					</ul>
					
					<?php } ?>
					<br><a href="<?=$router->pathFor('sign_out')?>">( Sign out )</a>
				</div>
			</nav>



			<main role="main" class="col-md-0 ml-sm-auto col-lg-10 px-0">


				<h4>Personal Records</h4>
				<div class="table-responsive">
					<table class="table table-striped table-sm">
						<thead>

							<tr>
								<th>Asset Id</th>
								<th>Tag number</th>
								<th>Start date</th>
								<th>End Date</th>
								<th>Status</th>
								<th>Comment</th>
								<th> </th>
							</tr>
						</thead>

						<?php foreach ($all as $al) { ?>
						<tr>
							<td><?=$al->getId()?></td>
							<td><?=$al->getTagNum()?></td>
							<td><?=$al->getStartDate('y/m/d')?></td>
							<?php if($al->getEndDate('y/m/d')==NULL){ ?>
							<td>Still in used</td>
							<?php } ?>
							<td><?=$al->getEndDate('y/m/d')?></td>
							<td> </td>
							<td>
								<button type="button" class="btn btn-default btn-sm">
						          Edit 
						        </button>
							</td>

						</tr>
						<?php } ?>
					</table>
				</div>

				

			</main>

		</div>
	</div>



	
</body>
</html>
