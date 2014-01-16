<table border="1">
	<thead>
	<tr>
		<th>no</th>
		<th>title</th>
		<th>reg_date</th>
	</tr>
	</thead>
	<tbody>
		<?php foreach($list as $article) {?>
		<tr>
			<td><?=$article->no?></td>
			<td><a href="/board/view/<?=$article->id?>"><?=$article->subject?></a></td>
			<td><?=$article->red_date?></td>
		</tr>
		<?php }?>
	</tbody>
</table>
<a href="/board/write">Write</a>