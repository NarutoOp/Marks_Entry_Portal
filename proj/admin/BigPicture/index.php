<?php

session_start();
session_regenerate_id();
if (isset($_SESSION['aid'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style/bigpict.style.css?v=<?= time(); ?>">
	<!-- <link rel="stylesheet" href="./../../chat/style/chat.style.css?v=<?=time();?>"> -->

	<title>Big Picture Of Allotement</title>
	<!-- jQuery -->
	<script src="./../../../nocdn/jq.min.js"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
	<!-- angular -->
	<script src="./../../../nocdn/angu.uncomp.js"></script>
	<!-- <script src="./../../../nocdn/ng.min.js"></script> -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.js"></script> -->

</head>
<body>
	
	<div 
	    class="navbar" 
	    style="
		    height: 100px;
		    width: 110%;
		    background: #04359C;
		    transform: rotate(-1.5deg);
		    position: fixed;
		    top:-20px;
		    left: -10px; 
			z-index: 999;
			transition: all 0.5s;
			transition-timing-function: ease-in-out;
			box-shadow: 0px 0px 20px #04359C;
		    ">  
				<div class="msg">Big Picture of Allotement</div>
		 
    </div>
		
		<div class="onLoad"  data-ng-app="tbl" data-ng-init="edit=true">

			<div class="outer-table h-center" data-ng-controller="tblctr">
				<div class="main-head">
					<span class="heading1">
						<input type="checkbox" data-ng-model="showAll" value="true" data-ng-click = "showAllData()"> <span class="pre-msg">Show all Rows</span> 
					</span>

					<span class="heading2">
						<span class="pre-msg">Rows Per Page : </span> <input type="number" class="total-rows" data-ng-init="limit=10" data-ng-model="limit" step="1" min="1" max="20"> 
					</span>
					<span class="heading3">
						<span class="pre-msg">Search Row :</span> <input type="text" class="dataSearch" data-ng-model="dataSearch" placeholder="  Enter Data">
					</span>
					<span class="heading4">
						<button id='active' class="show headingBtn" data-ng-click="editThis(false)">Show</button> /
						<button class="edit headingBtn" data-ng-click="editThis(true)">Edit</button>
						<button class="save headingBtn" style="display: none;" data-ng-click="">Save</button>
					</span>
				</div>

				<br><br><br><br>
				<table class="tbl">
					<thead>
						<tr>
							<th data-ng-click="orderByMe('id',true)" style="border-left: 10px solid #04359C">
								Sr.No
							</th>
							<th data-ng-click="orderByMe('status')">
								Status
							</th>
							<th data-ng-click="orderByMe('email')">
								E-Mail
							</th>
							<th data-ng-click="orderByMe('program')">
								Program
							</th>
							<th data-ng-click="orderByMe('dept_name')">
								Department
							</th>
							<th data-ng-click="orderByMe('exam_name')">
								Exam
							</th>
							<th data-ng-click="orderByMe('sub_id')">
								Subject ID
							</th>
							<th data-ng-click="orderByMe('block_id')">
								Block ID
							</th>
							<th data-ng-click="orderByMe('role')">
								Role
							</th>
							<th data-ng-click="orderByMe('exam_type')">
								Exam Type
							</th>
						</tr>
					</thead>
					<tbody>
						<tr data-ng-repeat="row in rows | orderBy : myColOrder | filter:dataSearch | limitTo: limit ">
							<td class="rowId{{row.id}} rowId" data-ng-class="{'greenBorder':row.status==2, 'orangeBorder': row.status==1, 'redBorder':row.status==0 }">{{row.id}}</td>
							<td data-ng-show="edit">
								
								<form action="" name="selectForm" class="selectForm" data-ng-init="selectStatus=row.status">
									<select name="select" data-ng-change="changed(selectStatus, row.id)" data-ng-class="{'green':selectStatus==2, 'orange': selectStatus==1, 'red':selectStatus==0 }" data-ng-model="selectStatus" id="select"   >
										<option data-ng-selected = "row.status == 0" value="0">Not Alloted</option>
										<option data-ng-selected = "row.status == 1" value="1">Discharge</option>
										<option data-ng-selected = "row.status == 2" value="2">Incharge</option>
									</select>
								</form>

							</td>
							<td data-ng-show="!edit"> 
								{{ row.status | readableStatus }}
							</td>
							<td>{{row.email}}</td>
							<td>{{row.program}}</td>
							<td>{{row.dept_name}}</td>
							<td>{{row.exam_name}}</td>
							<td>{{row.sub_id}}</td>
							<td>{{row.block_id}}</td>
							<td>{{row.role}}</td>
							<td>{{row.exam_type}}</td>

						</tr>
					</tbody>
				</table>
				<div class="pagging">
					<ul>
						<li ><button value="1" class ="btn1 btn" id="active"  data-ng-click=paggingStartIndex(1) data-ng-init="paggingStartIndex(1)">1</button></li>
						<li data-ng-repeat="n in range(2, (totalRows/limit+2))">
							<button value=n class="btn btn{{n}}" data-ng-click=paggingStartIndex(n)>{{n}}</button>
						</li>

						<!-- <li ><button value="3" data-ng-click=paggingStartIndex(3)>3</button></li>
						<li ><button value="4" data-ng-click=paggingStartIndex(4)>4</button></li>
						<li ><button value="5" data-ng-click=paggingStartIndex(5)>5</button></li>
						<li ><button value="6" data-ng-click=paggingStartIndex(6)>6</button></li>
						<li ><button value="7" data-ng-click=paggingStartIndex(7)>7</button></li>					 -->
					</ul>
				</div>

			</div>

			<div class="add">
				<a href="./../index.php"><div class="addNew">+</div></a>
			</div>

			<?php
				include $_SERVER['DOCUMENT_ROOT'].'/proj/chat/chat.php';
			 ?>

		</div>

	

	<?php
	include './../../navnheader/header.php';
	?>

	<script src="./../../onload.js"></script>
	<script src="getdata/script/getTblData.js"></script>
	<script src="script/pagging.bigpicture.js"></script>
	<script src="script/style.bigpicture.js"></script>
	<!-- chat -->
	<!-- <script src="./../../chat/script/chat.sc.js"></script> -->


	<script>
		shuterClose();

		$(document).ready(() => {
			shuterOpen("hide");
		})
	</script>
</body>
</html>

<?php
}else {
	echo '<h1 style="position: absolute;top: 50%; left: 50%; transform: translate(-50%, -50%);text-transform: capitalize;font-size: 30px">You are not logged in !!!<br>Please click <a href="./../../index.php" style="text-decoration: none;color: blue">here</a> to Login</h1>';
 }
?>
