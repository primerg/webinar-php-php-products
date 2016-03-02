<h1>Users</h1>

<div id="users" class="list-mngt">
 
<input class="search" placeholder="Search" />
<button class="sort" data-sort="name">
Sort by name
</button>

<table class="users table-condensed table-bordered">
	<tbody class="list">
	  <?php foreach ($user_list as $user) { ?>
	  <tr>
	  	<td class="id"><?php echo $user->id ?></td>
	    <td class="name"><?php echo $user->username ?></td>
	    <td class="email"><?php echo $user->email ?></td>
	  </tr>
	  <?php } ?>
	</tbody>
</table>

</div>

<script src="http://listjs.com/no-cdn/list.js"></script>

<script type="text/javascript">
	var options = {
	  valueNames: [ 'name', 'email' ]
	};

	var userList = new List('users', options);
</script>

