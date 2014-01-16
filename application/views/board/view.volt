{{ get_content() }}
<table border="1">
	<thead>
		<tr>
			<th>subject</th>
			<td>
				<?=$article->subject;?>
			</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th colspan='2'>contents</th>
		</tr>
		<tr>
			<td colspan='2'>
				<?=$article->contents;?>
			</td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<th>reg_date</th>
			<td><?=$article->red_date?></td>
		</tr>
	</tfoot>
</table>
<a href="/board">List</a>
<a href="/board/modify/<?=$article->id?>">Modify</a>
<a href="/board/delete/<?=$article->id?>">delete</a>