<!DOCTYPE html>
<html>
<head>
	<title>Categories</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h4>Select category</h4>
		<div class="row">
			<div class="col-md-7">
				<form>
					<select id="student-select" class="form-control">
						<option disabled selected>Select your category</option>
						<option value="art">Art</option>
						<option value="commercial">Commercial</option>
						<option value="science">Science</option>
					</select>
					<br>
					<span id="categ-total" class="text-primary ">No category selected</span>
				</form>
				<table class="table table-bordered table-striped">
					<thead>
						<th>#</th>
						<th>Candidates ID</th>
						<th>Candidates Names</th>
						<th>Centre Name</th>
						<th>Category Name</th>
					</thead>
					<tbody id="tbody2"></tbody>
				</table>
			</div>
		</div>
	</div>
				

<script type="text/javascript">
	let select = document.getElementById('student-select')
	select.addEventListener('change', showCategory);

	function showCategory() {
		let category = select.value;
		let xhr = new XMLHttpRequest();
		url = 'app/students/readCategories.php?category=' + category;
		xhr.open('GET', url, true);

		xhr.onprogress = function() {
			document.getElementById('categ-total').innerHTML = 'Loading......';
		}

		xhr.onload = function() {
			let table= document.getElementById('tbody2');
			if(xhr.status == 200) {
				let result = JSON.parse(xhr.responseText);
				resultLength = result.length;

				let output = '';

				for(var i in result) {
					let rowNumber = i + 1;
	       			output += '<tr>';
	       			output += '<td>' + rowNumber + '</td>'; 
	       			output += '<td>' + result[i].candidates_id + '</td>'; 
	       			output += '<td>' + result[i].candidates_names + '</td>';
	       			output += '<td>' + result[i].centre_name + '</td>';
	       			output += '<td>' + result[i].category_names + '</td>';
	       			output += '</tr>';
				}
				console.log(table);

				document.getElementById('categ-total').innerHTML = resultLength;
				table.innerHTML = output;
			}
				
		}
		xhr.send();
	}
</script>
</body>
</html>