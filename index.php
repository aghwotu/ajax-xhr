<!DOCTYPE html>
<html>
<head>
	<title>Ajax</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body >
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4>View all student records</h4>
				<table class="table table-striped table-bordered">
					<thead>
						<th>#</th>
						<th>Candidates ID</th>
						<th>Candidates Names</th>
						<th>Centre Name</th>
						<th>Category Name</th>
					</thead>
					<tbody id="tbody1"></tbody>
				</table>
			</div>
		</div>
	</div>


<script type="text/javascript">
	
	// bind a page load event listener to the DOM
	document.addEventListener('DOMContentLoaded', function() {
		getAllCategories();
	});
	function getAllCategories() {
		let xhr = new XMLHttpRequest();
		let url = 'app/students/readAll.php';
		// var url = 'sample.txt';
       	xhr.open('GET', url, true);

       	xhr.onload = function() {
       		let table = document.getElementById('tbody1');
       		if(xhr.status == 200) {
       			let result = JSON.parse(xhr.responseText);
       			resultLength = result.length;
	       		console.log(result);

	       		let output = '';
	       		for(i = 0; i < resultLength; i++) {
	       			let rowNumber = i + 1;
	       			output += '<tr>';
	       			output += '<td>' + rowNumber + '</td>'; 
	       			output += '<td>' + result[i].candidates_id + '</td>'; 
	       			output += '<td>' + result[i].candidates_names + '</td>';
	       			output += '<td>' + result[i].centre_name + '</td>';
	       			output += '<td>' + result[i].category_names + '</td>';
	       			output += '</tr>';
	       		}

	       		table.innerHTML = output;
	       		
       		}        
       	}

       	xhr.send();
	}
</script>
</body>
</html>