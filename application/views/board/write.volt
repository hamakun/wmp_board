{{ get_content() }}
<form method="post" action="/board/save">
<table border="1">
	<thead>
		<tr>
			<th>subject</th>
			<td>
				<input type="text" name="subject" value="<?=$article->subject?>">
			</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th colspan='2'>contents</th>
		</tr>
		<tr>
			<td colspan='2'>
				<textarea name="contents" cols='40' rows='10'><?=$article->contents;?></textarea>
			</td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<th>reg_date</th>
			<td><?=date('Y-m-d')?></td>
		</tr>
	</tfoot>
</table>
<input type="hidden" name="id" value="<?=$article->id?>">
<input type="submit" name="write" value="OK">
</form>
<a href="/board">List</a>