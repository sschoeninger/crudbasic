
<h2>New User</h2>

<br>

<?=get('message')?>

<form action="pages/forms/create_user.php" method="POST" role="form">

    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name">
    </div>

    <div class="form-group">
        <label for="">Last Name</label>
        <input type="text" class="form-control" name="sobrenome" placeholder="Last Name">
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" placeholder="Email">
    </div>

    <div class="form-group">
        <label for="">Password</label>
        <input type="text" class="form-control" name="password" placeholder="Password">
    </div>


    <button type="submit" class="btn btn-primary">Add</button>
</form>



