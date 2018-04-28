<html>
<head>
<title>jquery filter test</title>
</head>
<body>
<label>Filter: </label> <input id="inputfilter" type="text"></input>
<table id="filterme">
<thead>
<tr>
	<th>
		First Name
	</th>
	<th>Last Name</th>
	<th>Tags</th>
</tr>
</thead>
<tbody>
	<tr>
		<td>David</td>
		<td>Reagan</td>
		<td>me, web, blah</td>
	</tr>
	<tr>
		<td>Bob</td>
		<td>Reagan</td>
		<td>hope, joy, good</td>
	</tr>
	<tr>
		<td>David</td>
		<td>Johe</td>
		<td>wow, no, yes</td>
	</tr>
	<tr>
		<td>Toft</td>
		<td>Smith</td>
		<td>pop, soda, web, blah</td>
	</tr>
	<tr>
		<td>David</td>
		<td>Reagan</td>
		<td>asdf, yah, web, blah</td>
	</tr>
	<tr>
		<td>Dan</td>
		<td>Smith</td>
		<td>heck, this, blah</td>
	</tr>
	<tr>
		<td>Lost</td>
		<td>Man</td>
		<td>web, blah</td>
	</tr>
</table>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#inputfilter").keyup(function(){
		filter = new RegExp($(this).val(),'i');
		$("#filterme tbody tr").filter(function(){
			$(this).each(function(){
				found = false;
				$(this).children().each(function(){
					content = $(this).html();
					if(content.match(filter))
					{
						found = true
					}
				});
				if(!found)
				{
					$(this).hide();
				}
				else
				{
					$(this).show();
				}
			});
		});
	});
});
</script>

</body>
</html>