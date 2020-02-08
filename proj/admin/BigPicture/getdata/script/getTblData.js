 var app = angular.module('tbl', []);
/////////////////////////////////////////////////////////////////////////////////////////////////////
// Controller
app.controller('tblctr', function($scope, $http) {
///////////////////////////////////////////////////[Request]//////////////////////////////////////////////////

	$scope.start = 1;
	// $scope.limit = 5;

	$scope.paggingStartIndex = function(index) {
		$(".btn").attr("id", " ");
		$(".btn"+index).attr("id", "active");

		$scope.start = index;
		let data = $.param({
						start : $scope.start,
						limit : $scope.limit
					});

		var config = {
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            }

		let rows = $http.post("http://localhost/proj/admin/BigPicture/getdata/back/tableData.back.php",data, config)
				.then(function(response) {

					let data = response.data;
					$scope.totalRows = data[0]
					$scope.rows = data[1];

				}, function(response) {
					console.log("something went wrong");
			});
	}
////////////////////////////////////////////////////[editable or not]/////////////////////////////////////////////////
	$scope.edit = false;
	$scope.editThis = function(isSet) {
		$scope.edit = isSet;
	}

////////////////////////////////////////////////////[if editablet then]/////////////////////////////////////////////////
	// $scope.selectStatus = ;
	// $scope.selectStatus = {};

	// $scope.changed = function() {
	var changes = [];
	var npos = [];
		$scope.changed = function(change, pos) {
			$(".rowId"+pos).css("border-left", "10px solid yellow");

			$(".edit").hide();
			$(".save").show();
			$(".save").attr("id", "active");
// if(agree == 1) {
			changes.push(change);
			npos.push(pos);
	

		}


	function sendChange(changes, npos) {
		var data1 = $.param({
				change: changes,
				pos: npos
			})

			var config1 = {
	            headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            }

			$http.post("http://localhost/proj/admin/BigPicture/sendata/sendata.bigpicture.php", data1, config1)
				.then(function() {
					console.log("sent");
				})
			return true;
	}

	changed = false;
	$(".show").click(() => {
		agree=0;
		if($(".save").css("display") != "none") {
			$(".save").hide();
			$(".edit").show();
			 agree = parseInt(prompt("would you like to save\n1. Yes\n2. No\n(Choose 1 or 2)"));
		} 

		if (agree === 1) {
			sendChange(changes, npos);
		}
		
		window.location.href = "http://localhost/proj/admin/BigPicture/index.php";


	}) 
	$(".save").click(() => {
			sendChange(changes, npos);
			// window.location.href = "http://localhost/proj/admin/BigPicture/index.php";

	})  
	$(document).on("click", ".btn", ( ) => {
		agree =0;
		if($(".save").css("display") != "none") {
				 agree = parseInt(prompt("would you like to save\n1. Yes\n2. No\n(Choose 1 or 2)"));
		} 

		if (agree === 1) {
			sendChange(changes, npos);
			window.location.href = "http://localhost/proj/admin/BigPicture/index.php";
		} else {
		window.location.href = "http://localhost/proj/admin/BigPicture/index.php";
		}

	});

	// $(document).on("click", ".show", () => {
	// })


		// 
		
	// }

	

///////////////////////////////////////////////////[sort]//////////////////////////////////////////////////
	$scope.myColOrder = "";
	
	$scope.orderByMe = function (row, isInt=false) {

		if (isInt == true) {
			row = parseInt(row);
		}

		$scope.myColOrder = (row);
	}
/////////////////////////////////////////////////////////[show all rows]///////////////////////////////////////////////////
	// $scope.showAll = true;
	$scope.showAllData = function() {
		if ($scope.showAll != true) {
			$scope.limit = $scope.totalRows;
			$(".btn").hide();
			$scope.paggingStartIndex(1);
		} else {
			$(".btn").show();
			$scope.limit = 5;
			$scope.paggingStartIndex(1);
		}
	}

//////////////////////////////////////////////////////[range - for loop]///////////////////////////////////////////////

// Range funtion for FOR loop
	$scope.range = function(start=0, end=1, step=1) {
		let temp = [];
		start = parseInt(start);
		end = parseInt(end);
		if($scope.totalRows % $scope.limit == 0) {
			for (let i = start ; i < end-1; i=i+step) {
				temp.push(i);
			}
		} else {
			for (let i = start ; i < end; i=i+step) {
				temp.push(i);
			}
		}
		return temp;
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////

})

////////////////////////////////////////////////[filter]/////////////////////////////////////////////////////
app.filter('readableStatus', function() {
	return function(status) {
		switch(status) {
			case '0':
				return "Not Alloted";
			case '1':
				return "Discharge";
			case '2':
				return "Incharge";
		}
	}
})

// always valid total-rows
$(document).ready(() => {
/////////////////////////////////////////////////////////////////////////////////////////////////////
	$(".total-rows").keyup(function() {
		if ($(".total-rows").val() == '') {
			$(".btn").hide();
		} else {
			$(".btn").show();
			$scope.paggingStartIndex($(this).val())
		}
	})
/////////////////////////////////////////////////////////////////////////////////////////////////////
	$(".headingBtn").click(function() {
		$(".headingBtn").attr("id", " ");
		$(this).attr("id", "active");
	})

})
















